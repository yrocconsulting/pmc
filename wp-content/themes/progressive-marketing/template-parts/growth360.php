<?php
/**
 * Growth360™ edition page (veterinary, automotive, ...).
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, ed }
 */

defined( 'ABSPATH' ) || exit;
$slug     = $args['slug'];
$ed       = $args['ed'];
$override = 'veterinary' === $slug ? pmc_opt( 'vet_eval_url' ) : ( 'automotive' === $slug ? pmc_opt( 'auto_eval_url' ) : '' );
$eval_url = $override ? $override : $ed['eval_url'];
$cases    = pmc_case_studies_for( $ed['industry'] );
$biz      = $ed['business'];
?>
<section class="page-hero hero-dark">
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container hero-split">
		<div data-reveal>
			<p class="eyebrow">Growth360™ for <?php echo esc_html( $ed['name'] ); ?></p>
			<h1><?php echo esc_html( $ed['headline'] ); ?></h1>
			<p class="lead"><?php echo esc_html( $ed['lead'] ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $eval_url ); ?>">Start my Executive Evaluation <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
			<p class="hero-note"><?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No consultation required <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No Zoom <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No sales presentation</p>
		</div>
		<div class="brief-card" data-reveal>
			<div class="brief-top"><span>Confidential</span><span><?php echo esc_html( $ed['edition'] ); ?></span></div>
			<p class="brief-title">Executive Brief™</p>
			<ol class="brief-list">
				<?php foreach ( $ed['pillars'] as $i => $p ) : ?>
					<li><span>0<?php echo (int) $i + 1; ?></span> <?php echo esc_html( $p ); ?></li>
				<?php endforeach; ?>
			</ol>
			<p class="brief-caption">A focused assessment of visibility, reputation, competitive positioning, and growth readiness.</p>
		</div>
	</div>
</section>

<?php if ( $ed['video'] ) : ?>
<section class="section section-tight">
	<div class="container narrow">
		<figure class="video-wrap" data-reveal>
			<video controls preload="none" playsinline poster="<?php echo esc_url( pmc_img( 'video-poster.jpg' ) ); ?>">
				<source src="<?php echo esc_url( $ed['video'] ); ?>" type="video/mp4">
				<a href="<?php echo esc_url( $ed['video'] ); ?>">Watch the Growth360™ overview</a>
			</video>
			<figcaption>Watch the Growth360™ overview.</figcaption>
		</figure>
	</div>
</section>
<?php endif; ?>

<section class="section">
	<div class="container split">
		<?php pmc_heading( 'The reality', $ed['reality_t'] ); ?>
		<div class="prose" data-reveal>
			<p><?php echo esc_html( $ed['reality'] ); ?></p>
			<p class="callout-q"><?php echo esc_html( $ed['question'] ); ?></p>
		</div>
	</div>
</section>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'The Growth360™ Framework', 'Three drivers of *sustainable growth.*' ); ?>
		<div class="outcomes">
			<div class="outcome" data-reveal><span class="outcome-num">01 · Discover</span><h3><?php echo esc_html( $ed['pillars'][0] ); ?></h3><p>Improve local search visibility for the services and locations <?php echo esc_html( $ed['customers'] ); ?> look for.</p></div>
			<div class="outcome" data-reveal style="--r:1"><span class="outcome-num">02 · Trust</span><h3><?php echo esc_html( $ed['pillars'][1] ); ?></h3><p>Build confidence before the first call or visit, with a clear, consistent picture of your <?php echo esc_html( $biz ); ?>.</p></div>
			<div class="outcome" data-reveal style="--r:2"><span class="outcome-num">03 · Decide</span><h3><?php echo esc_html( $ed['pillars'][2] ); ?></h3><p>Focus reporting on measurable outcomes and strategic priorities.</p></div>
		</div>
		<p class="flow" data-reveal>Discoverability <span>→</span> Confidence <span>→</span> Intelligence</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'The Executive Evaluation™', 'Useful insight *before any sales conversation.*', 'Growth360™ begins with a complimentary evaluation lasting approximately seven days. Share your ' . $biz . '’s details and we assess local visibility, online reputation, and how you compare with nearby competitors.' ); ?>
		<ol class="process">
			<li class="process-step" data-reveal><span class="process-num">01</span><h3>Submit your details</h3><p>A short, focused intake. No consultation call or presentation.</p></li>
			<li class="process-step" data-reveal style="--r:1"><span class="process-num">02</span><h3>Seven-day evaluation</h3><p>We assess local presence, competitive conditions, and readiness.</p></li>
			<li class="process-step" data-reveal style="--r:2"><span class="process-num">03</span><h3>Receive the brief</h3><p>Your personalized Growth360™ Executive Brief™ arrives by email.</p></li>
			<li class="process-step" data-reveal style="--r:3"><span class="process-num">04</span><h3>Decide with clarity</h3><p>If the fit is right, we explain why. If not, you receive a practical Growth360™ Roadmap™.</p></li>
		</ol>
	</div>
</section>

<section class="section section-paper">
	<div class="container split">
		<?php pmc_heading( 'Readiness', 'Is your ' . $biz . ' *ready?*', 'Growth360™ is built for established businesses that serve their local market and want to measure change over time.' ); ?>
		<ul class="checklist" data-reveal>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>An established website</strong> with current services, locations, and contact information.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>A public Google Business Profile</strong> with a visible address.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>At least 10 positive reviews,</strong> a foundation of customer confidence.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>Commitment to the local market</strong> and the community you serve.</div></li>
			<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div><strong>A desire for measurable growth,</strong> not a short-term tactic.</div></li>
		</ul>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'After enrollment', 'From periodic marketing *to an operating system.*' ); ?>
		<div class="compare" data-reveal>
			<div class="compare-col compare-old">
				<h3>Fragmented approach</h3>
				<ul>
					<li>Visibility efforts without continuous monitoring</li>
					<li>Reviews handled one at a time</li>
					<li>Reports that emphasize activity</li>
				</ul>
			</div>
			<div class="compare-col compare-new">
				<h3>The Growth360™ system</h3>
				<ol>
					<li><strong>PMC Driveby™.</strong> Continuous improvement and monitoring of local visibility.</li>
					<li><strong>PMC Review Guard™.</strong> Ongoing reputation monitoring and review-risk identification.</li>
					<li><strong>Executive reporting.</strong> Monthly trends, reputation health, positioning, and recommendations.</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<?php if ( $cases ) : ?>
<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'Proof', 'What the map looks like *after.*' ); ?>
		<?php foreach ( $cases as $cs_slug => $cs ) : ?>
			<?php get_template_part( 'template-parts/case-study', null, array( 'slug' => $cs_slug, 'cs' => $cs ) ); ?>
		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>

<section class="section section-dark">
	<div class="container">
		<?php pmc_heading( 'Our promise', 'Clarity *without pressure.*' ); ?>
		<ul class="promise-list" data-reveal>
			<li><strong>No sales presentation</strong> before you receive something of value.</li>
			<li><strong>No pressure</strong> to become a client.</li>
			<li><strong>No recommendations</strong> based on what benefits us.</li>
			<li><strong>An honest evaluation</strong> so you can decide with confidence.</li>
		</ul>
	</div>
</section>

<?php
get_template_part(
	'template-parts/cta',
	null,
	array(
		'title' => $ed['closing'],
		'text'  => 'Start your complimentary Growth360™ Executive Evaluation. Your personalized Executive Brief™ arrives in your inbox.',
		'url'   => $eval_url,
		'label' => 'Start my Executive Evaluation',
	)
);
