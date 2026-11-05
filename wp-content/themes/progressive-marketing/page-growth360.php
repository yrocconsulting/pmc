<?php
/**
 * Growth360™ for Veterinary Clinics (/growth360/).
 * Moved from vet.progressivemarketing.pro. The evaluation button goes to HighLevel.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();

$eval_url = pmc_opt( 'vet_eval_url' ) ? pmc_opt( 'vet_eval_url' ) : pmc_trial_url();
$video    = pmc_opt( 'vet_video_url' );
$cases    = pmc_case_studies_for( 'veterinary-clinics' );
?>

<section class="hero">
	<div class="container hero-split">
		<div class="hero-copy">
			<p class="eyebrow eyebrow-light">Growth360™ for Veterinary Clinics</p>
			<h1>Your veterinary clinic. The local choice.</h1>
			<p class="lead">Growth360™ helps established veterinary clinics improve local search visibility, understand their online reputation, and make it easier for pet owners to choose their practice.</p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $eval_url ); ?>">Start my Executive Evaluation <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
			<p class="hero-note"><?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No consultation required <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No Zoom <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No sales presentation</p>
		</div>
		<div class="hero-visual">
			<div class="brief-card">
				<div class="brief-top">
					<span>Confidential</span>
					<span>Veterinary Clinics Edition · V1.0</span>
				</div>
				<p class="brief-title">Executive Brief™</p>
				<ol class="brief-list">
					<li><span>01</span> Client Discoverability™</li>
					<li><span>02</span> Client Confidence™</li>
					<li><span>03</span> Executive Growth Intelligence™</li>
				</ol>
				<p class="brief-caption">A focused assessment of visibility, reputation, competitive positioning, and growth readiness.</p>
			</div>
		</div>
	</div>
</section>

<?php if ( $video ) : ?>
<section class="section section-tight">
	<div class="container narrow">
		<figure class="video-wrap">
			<video controls preload="metadata" playsinline>
				<source src="<?php echo esc_url( $video ); ?>" type="video/mp4">
				<a href="<?php echo esc_url( $video ); ?>">Watch the Growth360™ overview</a>
			</video>
			<figcaption>Watch the Growth360™ overview.</figcaption>
		</figure>
	</div>
</section>
<?php endif; ?>

<section class="section<?php echo $video ? ' section-flush-top' : ''; ?>">
	<div class="container split">
		<div>
			<p class="eyebrow">How pet owners choose a veterinarian</p>
			<h2 class="section-title">Pet owners start looking before they call.</h2>
		</div>
		<div class="prose">
			<p>When pet owners look for a veterinarian, they often compare nearby clinics, the animals they treat, available services, office hours, and reviews before calling or requesting an appointment. Clear, accurate information helps them decide whether your clinic is a fit.</p>
			<p class="callout-q">Can pet owners find your veterinary clinic when they search for the services you offer?</p>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<p class="eyebrow">The Growth360™ Framework</p>
		<h2 class="section-title">Three connected drivers of sustainable growth.</h2>
		<p class="lead-sm">Growth360™ connects how pet owners find your veterinary clinic, what helps them feel confident reaching out, and what practice leaders need to decide where to focus.</p>
		<div class="pillars">
			<div class="pillar">
				<span class="pillar-tag">01 / Discover</span>
				<h3>Client Discoverability™</h3>
				<p>Improve local search visibility for the services and locations pet owners look for.</p>
			</div>
			<div class="pillar">
				<span class="pillar-tag">02 / Trust</span>
				<h3>Client Confidence™</h3>
				<p>Give pet owners a clearer picture of your clinic before they call or request an appointment.</p>
			</div>
			<div class="pillar">
				<span class="pillar-tag">03 / Decide</span>
				<h3>Executive Growth Intelligence™</h3>
				<p>Focus reporting on measurable outcomes and strategic priorities.</p>
			</div>
		</div>
		<p class="flow"><strong>Make it easier for pet owners to find, evaluate, and contact your clinic.</strong> <span>Discoverability → Confidence → Intelligence</span></p>
	</div>
</section>

<section class="section">
	<div class="container">
		<p class="eyebrow">The Executive Evaluation™</p>
		<h2 class="section-title">Useful insight before any sales conversation.</h2>
		<p class="lead-sm">Growth360™ begins with a complimentary evaluation lasting approximately seven days. Share your clinic details so we can assess local search visibility, online reputation, and how your practice compares with nearby clinics.</p>
		<ol class="steps">
			<li class="step"><span class="step-num">01</span><h3>Submit clinic details</h3><p>A short, focused intake. No consultation call or presentation.</p></li>
			<li class="step"><span class="step-num">02</span><h3>Seven-day evaluation</h3><p>We assess local presence, competitive conditions, and readiness.</p></li>
			<li class="step"><span class="step-num">03</span><h3>Receive the brief</h3><p>Your personalized Growth360™ Executive Brief™ arrives by email.</p></li>
			<li class="step"><span class="step-num">04</span><h3>Make an informed decision</h3><p>If the fit is right, we explain why. If not, you receive a practical roadmap.</p></li>
		</ol>
		<p class="note-box"><strong>Approximately seven days.</strong> Every participating clinic receives either next steps for joining Growth360™ or a Growth360™ Roadmap™ with practical priorities for the practice.</p>
	</div>
</section>

<section class="section section-soft">
	<div class="container split">
		<div>
			<p class="eyebrow">Fit</p>
			<h2 class="section-title">Is your clinic ready for Growth360™?</h2>
			<p class="lead-sm">The program is designed for established clinics that serve their local community and want to measure how their visibility and reputation change over time.</p>
		</div>
		<ul class="checklist">
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>Established website.</strong> A practice website with current veterinary services, animals treated, locations, and contact information.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>Public Google Business Profile.</strong> A verified presence with a publicly visible address.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>At least 10 positive reviews.</strong> An existing foundation of client confidence.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>Commitment to the local market.</strong> A clear intention to serve the surrounding community.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>Desire for measurable growth.</strong> A long-term view rather than a short-term tactic.</div></li>
		</ul>
	</div>
</section>

<section class="section">
	<div class="container">
		<p class="eyebrow">One program</p>
		<h2 class="section-title">From periodic marketing to an operating system.</h2>
		<p class="lead-sm">Growth360™ brings local visibility, online reputation, and reporting into one program so clinic leaders can see what is changing and decide where to focus.</p>
		<div class="compare">
			<div class="compare-col compare-old">
				<h3>Fragmented approach</h3>
				<ul>
					<li>Visibility efforts without continuous monitoring</li>
					<li>Client feedback reviewed one comment at a time</li>
					<li>Marketing reports that emphasize activity</li>
				</ul>
			</div>
			<div class="compare-col compare-new">
				<h3>The Growth360™ system</h3>
				<ol>
					<li><strong>PMC Driveby™.</strong> Continuous improvement and monitoring of local visibility.</li>
					<li><strong>PMC Reputation Shield™.</strong> Ongoing reputation monitoring and review-risk identification.</li>
					<li><strong>Executive reporting.</strong> Monthly trends, reputation health, positioning, and recommendations.</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<?php if ( $cases ) : ?>
<section class="section section-soft">
	<div class="container">
		<p class="eyebrow">Proof</p>
		<h2 class="section-title">What PMC Driveby did for an animal hospital</h2>
		<?php foreach ( $cases as $cs_slug => $cs ) : ?>
			<?php get_template_part( 'template-parts/case-study', null, array( 'slug' => $cs_slug, 'cs' => $cs ) ); ?>
		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>

<section class="section section-navy">
	<div class="container">
		<p class="eyebrow eyebrow-light">Our promise</p>
		<h2 class="section-title">Clarity without pressure.</h2>
		<ul class="promise-list">
			<li><strong>No sales presentation</strong> before receiving something of value.</li>
			<li><strong>No pressure</strong> to become a client.</li>
			<li><strong>No recommendations</strong> based on what benefits us.</li>
			<li><strong>An honest evaluation</strong> designed to help you make an informed decision.</li>
		</ul>
	</div>
</section>

<section class="section">
	<div class="container split split-center">
		<div>
			<p class="eyebrow">Veterinary Clinics Edition</p>
			<h2 class="section-title">See what pet owners find when they look for your clinic.</h2>
			<p class="lead-sm">Start your complimentary Growth360™ Executive Evaluation™. Your personalized Executive Brief™ will be delivered directly to your inbox.</p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $eval_url ); ?>">Start my Executive Evaluation <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
			<p class="fine-print">No consultation required. No sales presentation.</p>
		</div>
		<aside class="contact-cards">
			<?php if ( pmc_opt( 'rep_name' ) ) : ?>
			<div class="contact-card rep">
				<img src="<?php echo esc_url( pmc_img( 'dan-mikals.jpg' ) ); ?>" width="120" height="160" alt="<?php echo esc_attr( pmc_opt( 'rep_name' ) ); ?>" loading="lazy">
				<div>
					<p class="eyebrow">Have additional questions?</p>
					<p class="rep-name"><?php echo esc_html( pmc_opt( 'rep_name' ) ); ?></p>
					<p><?php echo wp_kses_post( pmc_phone_link() ); ?></p>
					<?php if ( pmc_opt( 'email' ) ) : ?>
						<p><a href="mailto:<?php echo esc_attr( antispambot( pmc_opt( 'email' ) ) ); ?>"><?php echo esc_html( antispambot( pmc_opt( 'email' ) ) ); ?></a></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</aside>
	</div>
</section>

<?php
get_footer();
