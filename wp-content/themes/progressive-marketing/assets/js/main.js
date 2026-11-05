/* Progressive Marketing Concepts theme scripts. */
(function () {
	'use strict';

	// Mobile navigation.
	var toggle = document.querySelector('[data-nav-toggle]');
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

	// Header shadow once the page scrolls.
	var header = document.querySelector('[data-header]');
	if (header) {
		var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 8); };
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	// Before/after rank grid on the home page.
	var card = document.querySelector('[data-grid-card]');
	if (!card) { return; }
	var dots = card.querySelectorAll('.dot');
	var label = card.querySelector('[data-grid-label]');
	var rank = card.querySelector('[data-grid-rank]');
	var solv = card.querySelector('[data-grid-solv]');
	var btn = card.querySelector('[data-grid-toggle]');
	var after = false;
	var timer = null;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	function render(state) {
		after = state;
		card.classList.toggle('is-after', after);
		dots.forEach(function (d) {
			var r = after ? d.dataset.after : d.dataset.before;
			d.textContent = r;
			d.className = 'dot ' + (after ? d.dataset.a : bandFor(r));
		});
		label.textContent = after ? 'After Driveby' : 'Before Driveby';
		rank.textContent = after ? '1' : '8';
		solv.textContent = after ? '97.53%' : '1.23%';
		btn.textContent = after ? 'Show before' : 'Show after';
		btn.setAttribute('aria-pressed', after ? 'true' : 'false');
	}

	function bandFor(r) {
		var n = r === '20+' ? 21 : parseInt(r, 10);
		if (n <= 3) { return 'r1'; }
		if (n <= 6) { return 'r2'; }
		if (n <= 10) { return 'r3'; }
		return 'r4';
	}

	function cycle() {
		render(!after);
		timer = window.setTimeout(cycle, after ? 4200 : 2600);
	}

	btn.addEventListener('click', function () {
		window.clearTimeout(timer);
		render(!after);
	});

	if (!reduce && 'IntersectionObserver' in window) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting && timer === null) {
					timer = window.setTimeout(cycle, 1400);
				}
			});
		}, { threshold: 0.4 });
		io.observe(card);
	}
})();
