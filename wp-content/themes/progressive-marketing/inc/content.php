<?php
/**
 * Site content.
 *
 * Voice: about 85% the client's future (what their business looks like after
 * working with us), about 15% the services that get them there. Write in the
 * second person, future or present tense, concrete and calm. No invented stats:
 * every number on the site comes from a real client report.
 *
 * Content lives here (not in the database) so it is versioned in Git and
 * deployed with the theme.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * The three primary services. Keys are the page slugs under /services/.
 *
 * 'draft' => true marks copy that still needs details from PMC. It shows a
 * small "draft" badge to logged-in editors only.
 */
function pmc_services() {
	return array(
		'driveby-review-guard' => array(
			'name'     => 'Driveby & Review Guard',
			'tagline'  => 'Found first. Trusted on sight.',
			'icon'     => 'pin',
			'future'   => 'Your business sits at the top of Google Maps across your whole market, and the reviews customers read there make the decision easy, because the fake and abusive ones don’t stay up.',
			'summary'  => 'PMC Driveby™ moves your Google Business Profile into the top three on the map for the searches that bring in customers. PMC Review Guard™, included with every Driveby plan, watches every new review around the clock and reports damaging 1- and 2-star reviews for removal, usually within 30 minutes.',
			'parts'    => array(
				array( 'PMC Driveby™', 'Location-based ranking that expands where you show up in the top three, keyword by keyword, across your whole service area, with continuous monitoring to keep you there.' ),
				array( 'PMC Review Guard™, included', 'Included with every Driveby plan at no extra cost. Around-the-clock monitoring of your Google reviews. New 1- and 2-star reviews that look fake, spammy, abusive, off-topic, or from competitors and non-customers are reported, escalated, and tracked until Google decides. No login to your Google account required.' ),
				array( 'Executive reporting', 'Monthly trends, reputation health, competitive positioning, and recommendations. What changed, why, and what to do next.' ),
			),
			'steps'    => array(
				array( 'Watch', 'Every new review on your Google Business Profile is monitored, day and night.' ),
				array( 'Report', 'Damaging 1- and 2-star reviews are typically reported within 30 minutes of appearing.' ),
				array( 'Escalate', 'Reviews move through ongoing reporting and escalation, not a single attempt.' ),
				array( 'Track', 'You see each review’s status until it’s resolved.' ),
			),
			'outcomes' => array(
				'Customers searching “near me” see you first, from every part of town.',
				'A fake review or a competitor’s attack stops being an emergency.',
				'Your star rating reflects the business you actually run.',
			),
			'draft'    => false,
		),
		'ripple'               => array(
			'name'     => 'Ripple',
			'tagline'  => 'Your customers become your media.',
			'icon'     => 'ripple',
			'future'   => 'Every ad, email, and post you already pay for starts a chain reaction: customers enter, share with friends, and those friends share again, so your name travels further than your budget.',
			'summary'  => 'Ripple turns the media you already run into earned media. You choose a reward for entering and a reward for sharing; we build the branded campaign and landing page; your ads, email list, and social followers feed it. Every person who enters can bring in more, and every step of the chain is tracked.',
			'parts'    => array(
				array( 'You pick the incentive', 'What a customer gets for entering, and what they get for sharing. That’s the whole brief.' ),
				array( 'We build the campaign', 'A branded campaign and landing page, built for you. Nothing for your team to set up or integrate.' ),
				array( 'Your media fuels it', 'Point the ads, email list, and social following you already have at the campaign, and let the sharing take it further.' ),
				array( 'Every step is measured', 'Which ads seeded it, how far it spread, the value of the earned media, your top amplifiers, and the channels and platforms that worked best.' ),
			),
			'steps'    => array(
				array( 'Seed', 'Your existing ads, emails, and posts bring in the first wave.' ),
				array( 'Share', 'Each person who enters is rewarded for sharing with people they know.' ),
				array( 'Spread', 'Their friends enter and share too, generation after generation.' ),
				array( 'Measure', 'Every person is traced back to the share that brought them.' ),
			),
			'outcomes' => array(
				'More customers from the advertising you already pay for.',
				'People hear about you from someone they trust, before they ever search.',
				'Lower cost to win each new customer, campaign after campaign.',
			),
			'draft'    => false,
		),
		'website-builds'       => array(
			'name'     => 'Website Builds',
			'tagline'  => 'A website that closes.',
			'icon'     => 'browser',
			'future'   => 'Visitors land on a site that feels unmistakably yours, answers their questions, earns their trust, and turns them into booked appointments.',
			'summary'  => 'Every website we build is custom: designed from scratch around your brand, your market, and the customers you want more of. No templates, no two alike. Each one is built to convert the attention Driveby and Ripple create, and structured so search engines understand exactly what you do and where you do it.',
			'parts'    => array(
				array( 'Custom from the first sketch', 'Designed around your brand and your customers, never a recycled theme.' ),
				array( 'Built to convert', 'Clear offers, real proof, and one obvious next step on every page.' ),
				array( 'Built to be found', 'Clean, fast pages with structured data, so search engines understand exactly what you do and where you do it.' ),
				array( 'Built to last', 'Fast, secure, mobile-first, and easy for your team to update.' ),
			),
			'steps'    => array(
				array( 'Discover', 'We learn your business, your market, and who you want more of.' ),
				array( 'Design', 'A custom design shaped around your brand, reviewed with you.' ),
				array( 'Build', 'Fast, accessible, mobile-first, and structured for search engines.' ),
				array( 'Launch', 'Go live, connect it to your visibility and reputation work, and keep improving.' ),
			),
			'outcomes' => array(
				'Your website becomes your best salesperson, working every hour of the day.',
				'Customers get their questions answered and book without picking up the phone.',
				'Every dollar you spend on visibility lands somewhere that converts.',
			),
			'draft'    => false,
		),
	);
}

/**
 * Future-state pillars used on the home page.
 */
function pmc_futures() {
	return array(
		array( 'Found first', 'When someone nearby needs what you do, your name is at the top of the map and in the conversation.' ),
		array( 'Trusted on sight', 'Your reviews, your profile, and your website all say the same thing: this is the safe choice.' ),
		array( 'Chosen, again and again', 'The phone rings with the right customers. Appointments book themselves. Growth stops depending on luck.' ),
	);
}

/**
 * "A day in your future": illustrative moments shown in the phone feed and timeline.
 * These are illustrations, labeled as such on the page, not client data.
 */
function pmc_future_day() {
	return array(
		array( '7:42 AM', 'call', 'New call from Google Maps', '“Saw you were top-rated. Do you have anything today?”' ),
		array( '9:15 AM', 'star', 'New 5-star review', '“Found them on the map, booked in two minutes.”' ),
		array( '11:03 AM', 'calendar', 'Appointment booked online', 'From your website, after reading your FAQ.' ),
		array( '1:30 PM', 'pin', 'Top 3 across town', 'Your weekly map report: top three from one side of town to the other.' ),
		array( '3:48 PM', 'shield', 'Fake review reported', 'A competitor’s 1-star review flagged for removal within 30 minutes.' ),
		array( '5:20 PM', 'ripple', 'Your campaign is spreading', 'Customers shared your offer, and their friends are sharing it too.' ),
	);
}

/**
 * Case studies. Numbers come from before/after geo-grid reports.
 * ARP = average ranking position (lower is better).
 * SOLV = share of local voice (% of grid points ranking in the top 3).
 * Each image shows the "before" grid on the left half and "after" on the right.
 */
function pmc_case_studies() {
	return array(
		'mansfield-chiropractor'     => array(
			'title'     => 'Mansfield Chiropractor',
			'location'  => 'Mansfield, TX',
			'industry'  => 'medical-clinics',
			'label'     => 'Chiropractic & wellness',
			'headline'  => 'Number one citywide for “chiropractor near me,” in about a month.',
			'summary'   => 'A local clinic offering chiropractic care, medically supervised weight loss, IV nutrient therapy, electrical muscle stimulation, therapeutic ultrasound, and physical rehabilitation.',
			'approach'  => 'PMC Driveby ran across the clinic’s service area for its two highest-value searches.',
			'highlight' => array( 'value' => '#8 → #1', 'label' => '“Chiropractor near me”' ),
			'results'   => array(
				array( 'keyword' => 'Chiropractor near me', 'before' => 'Rank 8 · ARP 7.61 · 1.23% SOLV', 'after' => 'Rank 1.5 · ARP 2.67 · 71.61% SOLV', 'image' => 'mansfield-chiropractor-near-me.webp' ),
				array( 'keyword' => 'Chiropractor', 'before' => 'Rank 8 · 1.23% SOLV', 'after' => 'Rank 2 · 67.9% SOLV', 'image' => 'mansfield-chiropractor.webp' ),
			),
		),
		'rockwall-wellness-center'   => array(
			'title'     => 'Rockwall Wellness Center',
			'location'  => 'Rockwall, TX',
			'industry'  => 'medical-clinics',
			'label'     => 'Wellness & IV therapy',
			'headline'  => 'From 1.23% to 76.54% share of local voice.',
			'summary'   => 'A wellness center offering TRT, PRP, IV therapies, bioidentical hormone replacement, and wellness programs.',
			'approach'  => 'Driveby targeted the center’s core “near me” search and a high-margin service. The service keyword moved from position 13 to 5 in one week.',
			'highlight' => array( 'value' => '76.54%', 'label' => 'Share of local voice' ),
			'results'   => array(
				array( 'keyword' => 'Wellness center near me', 'before' => 'Rank 7 · 1.23% SOLV', 'after' => 'Rank 2 · 76.54% SOLV', 'image' => 'rockwall-wellness-center-near-me.webp' ),
				array( 'keyword' => 'Immune Booster IV', 'before' => 'Rank 13 · 1.23% SOLV', 'after' => 'Rank 5 · 32.1% SOLV (after 7 days)', 'image' => 'rockwall-immune-booster-iv.webp' ),
			),
		),
		'gilbert-weight-loss-clinic' => array(
			'title'     => 'Weight Loss & Hormone Therapy Clinic',
			'location'  => 'Gilbert, AZ',
			'industry'  => 'medical-clinics',
			'label'     => 'Weight loss & HRT',
			'headline'  => 'Out of nowhere to visible across the entire service area.',
			'summary'   => 'A clinic offering medically supervised weight loss, hormone replacement therapy, peptide therapy, IV therapy, and metabolic health.',
			'approach'  => 'Driveby expanded the clinic’s service radius and built authority for its two most important services.',
			'highlight' => array( 'value' => '100%', 'label' => 'Grid coverage on both keywords' ),
			'results'   => array(
				array( 'keyword' => 'Weight loss service', 'before' => 'ARP 6.63 · 20.99% SOLV', 'after' => 'ARP 2.85 · 76.54% SOLV', 'image' => 'gilbert-weight-loss-service.webp' ),
				array( 'keyword' => 'Hormone replacement therapy', 'before' => 'ARP 9.67 · 1.23% SOLV', 'after' => 'ARP 3.3 · 61.73% SOLV', 'image' => 'gilbert-hormone-replacement-therapy.webp' ),
			),
		),
		'grapevine-animal-clinic'    => array(
			'title'     => 'Animal Clinic',
			'location'  => 'Grapevine, TX',
			'industry'  => 'veterinary-clinics',
			'label'     => 'Veterinary',
			'headline'  => 'The map’s clear first choice: 97.53% share of local voice.',
			'summary'   => 'A full-service animal hospital offering wellness exams, emergency care, diagnostics, surgery, dental cleanings, and vaccinations.',
			'approach'  => 'Driveby focused on the two searches pet owners use most when choosing a vet.',
			'highlight' => array( 'value' => '97.53%', 'label' => '“Animal hospital near me”' ),
			'results'   => array(
				array( 'keyword' => 'Animal hospital near me', 'before' => 'Rank 8 · ARP 7.81 · 1.23% SOLV', 'after' => 'Rank 1 · ARP 1.69 · 97.53% SOLV', 'image' => 'grapevine-animal-hospital-near-me.webp' ),
				array( 'keyword' => 'Animal hospital', 'before' => 'Rank 8 · ARP 6.48 · 2.47% SOLV', 'after' => 'Rank 1 · ARP 2.06 · 91.36% SOLV', 'image' => 'grapevine-animal-hospital.webp' ),
			),
		),
	);
}

/**
 * Industries. Keys match page slugs under /industries/.
 */
function pmc_industries() {
	return array(
		'medical-clinics'    => array(
			'name'      => 'Medical Clinics',
			'icon'      => 'medical',
			'future'    => 'A schedule full of the patients you want to treat.',
			'short'     => 'Chiropractic, med spa, weight loss, hormone therapy, primary care, dental.',
			'hero'      => 'Picture a schedule that fills itself with the patients you want.',
			'lead'      => 'Patients compare a few clinics on the map, read reviews, and call. In your future, yours is the clinic they see first, trust immediately, and book without a second thought.',
			'customers' => 'patients',
			'searches'  => array( 'chiropractor near me', 'med spa near me', 'weight loss clinic', 'hormone replacement therapy', 'IV therapy near me', 'urgent care' ),
			'moments'   => array(
				array( 'Every service line has demand', 'Weight loss, HRT, IV therapy: each one ranks on its own, so you grow the services that matter most.' ),
				array( 'Your reputation does the selling', 'New patients arrive already confident, because every review they read points to you.' ),
				array( 'You see growth coming', 'Monthly reporting shows visibility, reputation, and position against nearby clinics.' ),
			),
		),
		'auto-dealerships'   => array(
			'name'      => 'Auto Dealerships',
			'icon'      => 'auto',
			'future'    => 'Buyers decide on you before they reach the lot.',
			'short'     => 'New and used sales, service departments, body shops.',
			'hero'      => 'Become the obvious choice before the customer ever visits.',
			'lead'      => 'Decisions happen before the showroom. Shoppers search, compare reviews, and form a preference long before they call. In your future, that preference is you.',
			'customers' => 'buyers',
			'searches'  => array( 'car dealership near me', 'used cars near me', 'truck dealer', 'auto service near me', 'oil change near me', 'car financing' ),
			'moments'   => array(
				array( 'Sales and service both win', 'Each department’s profile ranks for what it sells, so the lot and the service lane stay busy.' ),
				array( 'Your reviews earn the visit', 'Review Guard catches reputation risks early, so shoppers see a dealership they can trust.' ),
				array( 'Your whole market knows you', 'You rank across the towns and zip codes buyers drive in from, not just your street.' ),
			),
			'program'   => 'automotive',
		),
		'hotels'             => array(
			'name'      => 'Hotels',
			'icon'      => 'hotel',
			'future'    => 'Direct bookings from travelers who found you first.',
			'short'     => 'Independent, boutique, and franchised properties.',
			'hero'      => 'Imagine travelers booking you directly, every night.',
			'lead'      => 'Travelers open the map, search near where they need to be, and book one of the first properties they see. In your future, that’s you, booked directly instead of through a travel site.',
			'customers' => 'guests',
			'searches'  => array( 'hotels near me', 'hotel near [venue]', 'pet friendly hotel', 'extended stay hotel', 'hotel with pool', 'hotels near the airport' ),
			'moments'   => array(
				array( 'Direct bookings grow', 'Higher map visibility sends travelers to your own phone and booking page.' ),
				array( 'You own the demand nearby', 'Rank around the airports, venues, and hospitals that bring travelers to town.' ),
				array( 'Your rating stays an asset', 'Review Guard flags problems early, so your star rating keeps winning the click.' ),
			),
		),
		'veterinary-clinics' => array(
			'name'      => 'Veterinary Clinics',
			'icon'      => 'vet',
			'future'    => 'The clinic pet owners trust before they call.',
			'short'     => 'General practice, animal hospitals, emergency and specialty.',
			'hero'      => 'Your veterinary clinic. The local choice.',
			'lead'      => 'Pet owners compare nearby clinics, the animals they treat, hours, and reviews before they call. In your future, they finish that search already sure it’s you.',
			'customers' => 'pet owners',
			'searches'  => array( 'vet near me', 'animal hospital near me', 'emergency vet', 'dog vaccinations', 'pet dental cleaning', 'exotic animal vet' ),
			'moments'   => array(
				array( 'First on the map', 'Our Grapevine client went from rank 8 to rank 1 for “animal hospital near me” in about a month.' ),
				array( 'Confidence before the call', 'Pet owners see a clear, consistent picture of your clinic everywhere they look.' ),
				array( 'Leadership sees the whole picture', 'Monthly executive reporting on visibility, reputation, and positioning.' ),
			),
			'program'   => 'veterinary',
		),
	);
}

/**
 * Growth360™ editions (industry programs with a free Executive Evaluation).
 * Keys match page slugs under /growth360/.
 */
function pmc_growth360_editions() {
	return array(
		'veterinary' => array(
			'name'       => 'Veterinary Clinics',
			'edition'    => 'Veterinary Clinics Edition · V1.0',
			'headline'   => 'Your veterinary clinic. The local choice.',
			'lead'       => 'Growth360™ helps established veterinary clinics improve local search visibility, understand their online reputation, and make it easier for pet owners to choose their practice.',
			'customer'   => 'pet owner',
			'customers'  => 'pet owners',
			'business'   => 'clinic',
			'pillars'    => array( 'Client Discoverability™', 'Client Confidence™', 'Executive Growth Intelligence™' ),
			'reality_t'  => 'Pet owners start looking before they call.',
			'reality'    => 'When pet owners look for a veterinarian, they compare nearby clinics, the animals they treat, services, hours, and reviews before calling. Clear, accurate information helps them decide whether your clinic is a fit.',
			'question'   => 'Can pet owners find your clinic when they search for the services you offer?',
			'closing'    => 'See what pet owners find when they look for your clinic.',
			'video'      => 'https://assets.cdn.filesafe.space/0bvlnDHyDCoHlrLzW8oG/media/6aecc9b342ff25478cd79f59.mp4',
			'eval_url'   => 'https://vet.progressivemarketing.pro/trial-form',
			'industry'   => 'veterinary-clinics',
		),
		'automotive' => array(
			'name'       => 'Automotive',
			'edition'    => 'Founding Dealer Edition · V1.0',
			'headline'   => 'Become the obvious choice.',
			'lead'       => 'Growth360™ is an executive growth system that helps established dealerships become easier to find, trust, and choose.',
			'customer'   => 'buyer',
			'customers'  => 'buyers',
			'business'   => 'dealership',
			'pillars'    => array( 'Customer Discoverability™', 'Customer Confidence™', 'Executive Growth Intelligence™' ),
			'reality_t'  => 'Decisions happen before the showroom.',
			'reality'    => 'Customers search, compare reviews, and form preferences before they contact a dealer. The dealerships at the top of local results earn more of that consideration.',
			'question'   => 'You cannot earn a customer who never finds you.',
			'closing'    => 'See your dealership through the eyes of the market.',
			'video'      => 'https://assets.cdn.filesafe.space/0bvlnDHyDCoHlrLzW8oG/media/6ae8b645c9d5b7168d96c643.mp4',
			'eval_url'   => 'https://danm.progressivemarketing.pro/trial-form',
			'industry'   => 'auto-dealerships',
		),
	);
}

/**
 * FAQs, written as the questions people actually ask.
 * Output as FAQPage structured data wherever they appear.
 */
function pmc_faqs() {
	return array(
		array( 'What does Progressive Marketing Concepts do?', 'We help established local businesses become the obvious choice in their market. Our three services are PMC Driveby™ & Review Guard™ (top-three Google Maps visibility, with fast removal reporting for fake or abusive reviews included), Ripple (sharing campaigns that turn your existing media into earned media), and custom websites built to turn visitors into customers.' ),
		array( 'What is PMC Driveby?', 'PMC Driveby is a location-based ranking system for Google Business Profiles. It moves your business into the top three on Google Maps for the keywords your customers search, across your whole service area, and keeps monitoring it there.' ),
		array( 'What is PMC Review Guard?', 'Review Guard is included with every PMC Driveby plan. It monitors your Google reviews around the clock. New 1- and 2-star reviews that appear fake, spammy, abusive, off-topic, or from competitors or non-customers are typically reported within 30 minutes, then escalated and tracked. No login to your Google account is required.' ),
		array( 'Can every negative review be removed?', 'No. Google makes the final decision, and genuine reviews that follow its policies stay up. Review Guard makes sure the ones that break the rules are reported fast and followed through.' ),
		array( 'What is Ripple?', 'Ripple turns the ads, emails, and social posts you already run into a sharing campaign. Customers get a reward you choose for entering and for sharing, their friends join and share in turn, and every step is tracked back to its source. It’s a media campaign, not a referral scheme: no recruiting and no commissions.' ),
		array( 'How fast will I see results?', 'Our Driveby optimization runs 30 to 45 days, and many clients see movement sooner. One wellness center moved from position 13 to 5 for a key service in seven days.' ),
		array( 'How do I know it’s working?', 'Every keyword gets a before-and-after geo-grid report showing your average ranking position (ARP) and share of local voice (SOLV, the share of the map where you rank in the top three), plus monthly executive reporting.' ),
		array( 'Is there a way to try it first?', 'Yes. You can start a free 7-day PMC Driveby trial, or a complimentary Growth360™ Executive Evaluation for veterinary clinics and dealerships. There’s no sales presentation.' ),
		array( 'What’s included in a website build?', 'Every site is designed from scratch around your brand and the customers you want more of. It loads fast, works beautifully on phones, turns visitors into calls and bookings, and gives search engines clear, structured information about your business.' ),
		array( 'Which businesses do you work with?', 'Established local businesses, especially medical clinics, auto dealerships, hotels, and veterinary clinics. You need a public Google Business Profile and a commitment to your local market.' ),
	);
}

/**
 * Testimonials.
 */
function pmc_testimonials() {
	return array(
		array(
			'quote'   => 'I was blown away with how fast the results came. I went from ranking 8, 9, and 10, to ranking 3, 4, and 5 within 7 days! If you’re looking to drive traffic through your GBP and get your phone ringing, give PMC Driveby a call. You won’t regret that you did.',
			'name'    => 'Frank Riley',
			'company' => 'Riley Roofing and Gutters',
		),
	);
}

/**
 * The path from today to that future (shown as numbered steps).
 */
function pmc_process() {
	return array(
		array( 'See where you stand', 'A free evaluation or 7-day Driveby trial maps where you rank today, keyword by keyword, across your market.' ),
		array( 'Claim the map', 'Driveby lifts your Google Business Profile into the top three across your service area, while Review Guard, included with Driveby, protects your rating.' ),
		array( 'Spread the momentum', 'Ripple turns your customers into your media, and a custom website turns all that attention into booked customers.' ),
		array( 'Watch it compound', 'Monthly executive reporting shows what changed and where to focus next. Most clients see major movement in 30–45 days.' ),
	);
}
