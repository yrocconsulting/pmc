/* Progressive Marketing Concepts theme scripts. No dependencies. */
(function () {
	'use strict';

	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var $ = function (sel, root) { return (root || document).querySelector(sel); };
	var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };

	/* Mobile navigation */
	var toggle = $('[data-nav-toggle]');
	if (toggle) {
		toggle.addEventListener('click', function () {
			var open = document.body.classList.toggle('nav-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && document.body.classList.contains('nav-open')) {
				document.body.classList.remove('nav-open');
				toggle.setAttribute('aria-expanded', 'false');
				toggle.focus();
			}
		});
	}

	/* Header state + scroll progress */
	var header = $('[data-header]');
	var root = document.documentElement;
	var ticking = false;
	function onScroll() {
		if (ticking) { return; }
		ticking = true;
		window.requestAnimationFrame(function () {
			var max = root.scrollHeight - window.innerHeight;
			root.style.setProperty('--progress', max > 0 ? (window.scrollY / max).toFixed(4) : 0);
			if (header) { header.classList.toggle('is-scrolled', window.scrollY > 8); }
			ticking = false;
		});
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	/* Reveal on scroll */
	var revealEls = $$('[data-reveal], .process-step');
	if ('IntersectionObserver' in window && !reduce) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					io.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
		revealEls.forEach(function (el) { io.observe(el); });
	} else {
		revealEls.forEach(function (el) { el.classList.add('is-visible'); });
	}

	/* Hero spotlight follows the pointer */
	$$('[data-spotlight]').forEach(function (el) {
		el.addEventListener('pointermove', function (e) {
			var r = el.getBoundingClientRect();
			el.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100).toFixed(1) + '%');
			el.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100).toFixed(1) + '%');
		});
	});

	/* Service cards: glow follows the pointer */
	$$('.svc-card').forEach(function (el) {
		el.addEventListener('pointermove', function (e) {
			var r = el.getBoundingClientRect();
			el.style.setProperty('--cx', (e.clientX - r.left) + 'px');
			el.style.setProperty('--cy', (e.clientY - r.top) + 'px');
		});
	});

	/* Phone feed: start when visible, replay every so often */
	var phone = $('[data-phone]');
	if (phone) {
		var clock = $('[data-clock]', phone);
		if (clock) {
			var d = new Date();
			d.setDate(d.getDate() + 90);
			clock.textContent = d.toLocaleDateString(undefined, { weekday: 'long', month: 'long', day: 'numeric' });
		}
		if (reduce || !('IntersectionObserver' in window)) {
			phone.classList.add('is-live');
		} else {
			var pio = new IntersectionObserver(function (entries) {
				if (entries[0].isIntersecting) {
					phone.classList.add('is-live');
					pio.disconnect();
					window.setInterval(function () {
						phone.classList.remove('is-live');
						void phone.offsetWidth; // restart animations
						phone.classList.add('is-live');
					}, 14000);
				}
			}, { threshold: 0.3 });
			pio.observe(phone);
		}
	}

	/* Ripple illustration: play when visible, replay on click */
	$$('[data-ripple]').forEach(function (fig) {
		function play() {
			fig.classList.remove('is-live');
			void fig.getBoundingClientRect();
			fig.classList.add('is-live');
		}
		var btn = $('[data-ripple-replay]', fig);
		if (btn) { btn.addEventListener('click', play); }
		if (reduce || !('IntersectionObserver' in window)) { play(); return; }
		var rio = new IntersectionObserver(function (entries) {
			if (entries[0].isIntersecting) { play(); rio.disconnect(); }
		}, { threshold: 0.4 });
		rio.observe(fig);
	});

	/* Hero switch: today vs. 90 days from now */
	$$('[data-future-toggle]').forEach(function (ft) {
		var buttons = $$('[data-ft]', ft);
		var auto = null;
		function set(future) {
			ft.classList.toggle('is-future', future);
			buttons.forEach(function (b) {
				b.setAttribute('aria-pressed', (b.getAttribute('data-ft') === 'future') === future ? 'true' : 'false');
			});
		}
		buttons.forEach(function (b) {
			b.addEventListener('click', function () {
				window.clearInterval(auto);
				set(b.getAttribute('data-ft') === 'future');
			});
		});
		if (reduce || !('IntersectionObserver' in window)) { return; }
		var fio = new IntersectionObserver(function (entries) {
			if (!entries[0].isIntersecting) { return; }
			fio.disconnect();
			window.setTimeout(function () { set(true); }, 1200);
			auto = window.setInterval(function () { set(!ft.classList.contains('is-future')); }, 5200);
		}, { threshold: 0.35 });
		fio.observe(ft);
	});

	/* Day timeline: arrows, drag to scroll, progress bar */
	$$('[data-day]').forEach(function (day) {
		var track = $('[data-day-track]', day);
		var bar = $('[data-day-progress]', day);
		if (!track) { return; }
		function step(dir) {
			var card = track.querySelector('.day-card');
			var w = card ? card.getBoundingClientRect().width + 16 : 300;
			track.scrollBy({ left: dir * w, behavior: reduce ? 'auto' : 'smooth' });
		}
		var prev = $('[data-day-prev]', day);
		var next = $('[data-day-next]', day);
		if (prev) { prev.addEventListener('click', function () { step(-1); }); }
		if (next) { next.addEventListener('click', function () { step(1); }); }
		function progress() {
			var max = track.scrollWidth - track.clientWidth;
			var p = max > 0 ? track.scrollLeft / max : 1;
			if (bar) { bar.style.width = (20 + p * 80).toFixed(1) + '%'; }
		}
		track.addEventListener('scroll', progress, { passive: true });
		progress();
		var down = false, startX = 0, startLeft = 0, moved = false;
		track.addEventListener('pointerdown', function (e) {
			if (e.pointerType !== 'mouse') { return; }
			down = true; moved = false; startX = e.clientX; startLeft = track.scrollLeft;
			track.classList.add('is-dragging');
		});
		window.addEventListener('pointermove', function (e) {
			if (!down) { return; }
			var dx = e.clientX - startX;
			if (Math.abs(dx) > 3) { moved = true; }
			track.scrollLeft = startLeft - dx;
		});
		window.addEventListener('pointerup', function () {
			if (!down) { return; }
			down = false;
			track.classList.remove('is-dragging');
		});
		track.addEventListener('click', function (e) { if (moved) { e.preventDefault(); } }, true);
		track.addEventListener('keydown', function (e) {
			if (e.key === 'ArrowRight') { e.preventDefault(); step(1); }
			if (e.key === 'ArrowLeft') { e.preventDefault(); step(-1); }
		});
	});

	/* Count-up stats */
	var counters = $$('[data-count]');
	if (counters.length && 'IntersectionObserver' in window && !reduce) {
		var cio = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) { return; }
				var el = entry.target;
				var target = parseFloat(el.getAttribute('data-count'));
				var suffix = el.getAttribute('data-suffix') || '';
				var decimals = (String(target).split('.')[1] || '').length;
				var start = null;
				var dur = 1400;
				function step(ts) {
					if (!start) { start = ts; }
					var p = Math.min((ts - start) / dur, 1);
					var eased = 1 - Math.pow(1 - p, 3);
					el.textContent = (target * eased).toFixed(decimals) + suffix;
					if (p < 1) { window.requestAnimationFrame(step); }
				}
				window.requestAnimationFrame(step);
				cio.unobserve(el);
			});
		}, { threshold: 0.6 });
		counters.forEach(function (el) { cio.observe(el); });
	}

	/* Before/after compare sliders */
	$$('[data-compare]').forEach(function (el) {
		var range = $('.cs-range', el);
		if (!range) { return; }
		function set(v) { el.style.setProperty('--pos', v + '%'); }
		range.addEventListener('input', function () { set(range.value); });
		// Gentle hint animation the first time a slider scrolls into view.
		if (!reduce && 'IntersectionObserver' in window) {
			var hio = new IntersectionObserver(function (entries) {
				if (!entries[0].isIntersecting) { return; }
				hio.disconnect();
				var t0 = null;
				function hint(ts) {
					if (!t0) { t0 = ts; }
					var p = (ts - t0) / 1600;
					if (p >= 1 || el.dataset.touched) { if (!el.dataset.touched) { set(50); } return; }
					set((50 + Math.sin(p * Math.PI * 2) * 22).toFixed(1));
					window.requestAnimationFrame(hint);
				}
				window.setTimeout(function () { window.requestAnimationFrame(hint); }, 400);
			}, { threshold: 0.6 });
			hio.observe(el);
		}
		range.addEventListener('pointerdown', function () { el.dataset.touched = '1'; });
		range.addEventListener('keydown', function () { el.dataset.touched = '1'; });
	});

	/* Tabs (industry futures) */
	$$('[data-tabs]').forEach(function (wrap) {
		var tabs = $$('[role="tab"]', wrap);
		function select(tab) {
			tabs.forEach(function (t) {
				var on = t === tab;
				t.setAttribute('aria-selected', on ? 'true' : 'false');
				t.tabIndex = on ? 0 : -1;
				var panel = document.getElementById(t.getAttribute('aria-controls'));
				if (panel) { panel.hidden = !on; }
			});
		}
		tabs.forEach(function (tab, i) {
			tab.addEventListener('click', function () { select(tab); });
			tab.addEventListener('keydown', function (e) {
				var next = null;
				if (e.key === 'ArrowRight') { next = tabs[(i + 1) % tabs.length]; }
				if (e.key === 'ArrowLeft') { next = tabs[(i - 1 + tabs.length) % tabs.length]; }
				if (next) { e.preventDefault(); next.focus(); select(next); }
			});
		});
	});

	/* AI answer demo: switch question, type out the answer */
	$$('[data-ai-demo]').forEach(function (demo) {
		var q = $('[data-ai-q]', demo);
		var a = $('[data-ai-a]', demo);
		var buttons = $$('.ai-tabs button', demo);
		var timer = null;
		var auto = null;
		var idx = 0;

		function type(html) {
			window.clearInterval(timer);
			if (reduce) { a.innerHTML = html; return; }
			var tmp = document.createElement('div');
			tmp.innerHTML = html;
			var text = tmp.textContent;
			var i = 0;
			a.classList.add('is-typing');
			a.textContent = '';
			timer = window.setInterval(function () {
				i += 3;
				a.textContent = text.slice(0, i);
				if (i >= text.length) {
					window.clearInterval(timer);
					a.innerHTML = html;
					a.classList.remove('is-typing');
				}
			}, 18);
		}
		function show(n, user) {
			idx = n;
			buttons.forEach(function (b, j) { b.setAttribute('aria-selected', j === n ? 'true' : 'false'); });
			q.textContent = buttons[n].getAttribute('data-q');
			type(buttons[n].getAttribute('data-a'));
			if (user) { window.clearInterval(auto); }
		}
		buttons.forEach(function (b, n) { b.addEventListener('click', function () { show(n, true); }); });

		if (!reduce && 'IntersectionObserver' in window) {
			var aio = new IntersectionObserver(function (entries) {
				if (!entries[0].isIntersecting) { return; }
				aio.disconnect();
				show(0);
				auto = window.setInterval(function () { show((idx + 1) % buttons.length); }, 9000);
			}, { threshold: 0.5 });
			aio.observe(demo);
		}
	});
})();
