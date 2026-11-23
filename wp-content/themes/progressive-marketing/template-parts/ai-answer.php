<?php
/**
 * Illustrative AI assistant answer that recommends "your business".
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="ai-demo" data-ai-demo data-reveal>
	<div class="ai-tabs" role="tablist" aria-label="Example searches">
		<button type="button" role="tab" aria-selected="true" data-q="Who’s the best animal hospital near me?" data-a="Based on reviews and local results, <b>Your Clinic</b> is a top choice nearby. Pet owners consistently mention gentle care, clear pricing, and same-day appointments. It ranks first on Google Maps in your area and holds a 4.9-star rating.">Veterinary</button>
		<button type="button" role="tab" aria-selected="false" data-q="Which dealership near me has the best service department?" data-a="<b>Your Dealership</b> stands out. Customers highlight honest service advisors and fast turnaround, it appears at the top of local results for auto service, and its reviews are consistently strong.">Automotive</button>
		<button type="button" role="tab" aria-selected="false" data-q="Where can I get IV therapy near me today?" data-a="<b>Your Wellness Center</b> offers same-day IV therapy, including Myers’ Cocktail and Immune Booster IV. It’s highly rated nearby and lists online booking on its website.">Medical</button>
		<button type="button" role="tab" aria-selected="false" data-q="What’s a good hotel near the convention center?" data-a="<b>Your Hotel</b> is one of the closest well-reviewed options. Guests praise the location, quiet rooms, and helpful staff, and you can book directly on its website.">Hotels</button>
	</div>
	<div class="ai-window">
		<div class="ai-bar"><span></span><span></span><span></span><em>AI assistant</em></div>
		<div class="ai-chat">
			<p class="ai-q" data-ai-q>Who’s the best animal hospital near me?</p>
			<div class="ai-a">
				<span class="ai-avatar"><?php echo pmc_icon( 'ai' ); // phpcs:ignore ?></span>
				<p data-ai-a>Based on reviews and local results, <b>Your Clinic</b> is a top choice nearby. Pet owners consistently mention gentle care, clear pricing, and same-day appointments. It ranks first on Google Maps in your area and holds a 4.9-star rating.</p>
			</div>
		</div>
	</div>
	<p class="fine-print">Illustration. AI assistants draw on your map listing, reviews, and website. We optimize all three.</p>
</div>
