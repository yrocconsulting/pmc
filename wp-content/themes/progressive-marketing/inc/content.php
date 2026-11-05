<?php
/**
 * Site content: case studies, industries, Driveby steps, FAQs.
 *
 * Content lives here (not in the database) so it is versioned in Git and
 * deployed with the theme. Edit this file to change copy or add a case study.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Case studies. Numbers come from the before/after geo-grid reports.
 * ARP = average ranking position (lower is better).
 * SOLV = share of local voice (% of grid points where the profile ranks in the top 3).
 */
function pmc_case_studies() {
	return array(
		'mansfield-chiropractor' => array(
			'title'     => 'Mansfield Chiropractor',
			'location'  => 'Mansfield, TX',
			'industry'  => 'medical-clinics',
			'label'     => 'Chiropractic & wellness',
			'headline'  => 'From #8 to #1 citywide for “chiropractor near me” in about a month.',
			'summary'   => 'A local chiropractic clinic offering chiropractic care, medically supervised weight loss, IV nutrient therapy, electrical muscle stimulation, therapeutic ultrasound, and personalized physical rehabilitation.',
			'approach'  => 'PMC Driveby ran its location-based ranking system across the clinic’s service area for its two highest-value searches.',
			'highlight' => array( 'value' => '#8 → #1', 'label' => '“Chiropractor near me”' ),
			'results'   => array(
				array(
					'keyword' => 'Chiropractor near me',
					'before'  => 'Rank 8 · ARP 7.61 · 1.23% SOLV',
					'after'   => 'Rank 1.5 · ARP 2.67 · 71.61% SOLV',
					'image'   => 'mansfield-chiropractor-near-me.webp',
				),
				array(
					'keyword' => 'Chiropractor',
					'before'  => 'Rank 8 · 1.23% SOLV',
					'after'   => 'Rank 2 · 67.9% SOLV',
					'image'   => 'mansfield-chiropractor.webp',
				),
			),
		),
		'rockwall-wellness-center' => array(
			'title'     => 'Rockwall Wellness Center',
			'location'  => 'Rockwall, TX',
			'industry'  => 'medical-clinics',
			'label'     => 'Wellness & IV therapy',
			'headline'  => 'A national wellness brand went from 1.23% to 76.54% share of local voice.',
			'summary'   => 'A wellness center offering TRT, PRP, IV therapies (Myers’ Cocktail, Immune Booster IV), bioidentical hormone replacement, and wellness programs.',
			'approach'  => 'Driveby targeted the center’s core “near me” search and a high-margin service keyword. The service keyword moved from position 13 to position 5 after one week.',
			'highlight' => array( 'value' => '76.54%', 'label' => 'Share of local voice' ),
			'results'   => array(
				array(
					'keyword' => 'Wellness center near me',
					'before'  => 'Rank 7 · 1.23% SOLV',
					'after'   => 'Rank 2 · 76.54% SOLV',
					'image'   => 'rockwall-wellness-center-near-me.webp',
				),
				array(
					'keyword' => 'Immune Booster IV',
					'before'  => 'Rank 13 · 1.23% SOLV',
					'after'   => 'Rank 5 · 32.1% SOLV (after 7 days)',
					'image'   => 'rockwall-immune-booster-iv.webp',
				),
			),
		),
		'gilbert-weight-loss-clinic' => array(
			'title'     => 'Weight Loss & Hormone Therapy Clinic',
			'location'  => 'Gilbert, AZ',
			'industry'  => 'medical-clinics',
			'label'     => 'Weight loss & HRT',
			'headline'  => 'A weight loss clinic came out of nowhere to rank across its whole service area.',
			'summary'   => 'A clinic offering medically supervised weight loss, hormone replacement therapy, peptide therapy, IV therapy, and metabolic health services.',
			'approach'  => 'Driveby expanded the clinic’s service radius and built keyword authority for its two most important services.',
			'highlight' => array( 'value' => '100%', 'label' => 'Grid coverage on both keywords' ),
			'results'   => array(
				array(
					'keyword' => 'Weight loss service',
					'before'  => 'ARP 6.63 · 20.99% SOLV',
					'after'   => 'ARP 2.85 · 76.54% SOLV',
					'image'   => 'gilbert-weight-loss-service.webp',
				),
				array(
					'keyword' => 'Hormone replacement therapy',
					'before'  => 'ARP 9.67 · 1.23% SOLV',
					'after'   => 'ARP 3.3 · 61.73% SOLV',
					'image'   => 'gilbert-hormone-replacement-therapy.webp',
				),
			),
		),
		'grapevine-animal-clinic' => array(
			'title'     => 'Animal Clinic',
			'location'  => 'Grapevine, TX',
			'industry'  => 'veterinary-clinics',
			'label'     => 'Veterinary',
			'headline'  => 'An animal hospital took over the map: 97.53% share of local voice.',
			'summary'   => 'A full-service animal hospital offering wellness exams, emergency care, diagnostics, surgery, dental cleanings, and vaccinations.',
			'approach'  => 'Driveby focused on the two searches pet owners use most when choosing a vet.',
			'highlight' => array( 'value' => '97.53%', 'label' => '“Animal hospital near me”' ),
			'results'   => array(
				array(
					'keyword' => 'Animal hospital near me',
					'before'  => 'Rank 8 · ARP 7.81 · 1.23% SOLV',
					'after'   => 'Rank 1 · ARP 1.69 · 97.53% SOLV',
					'image'   => 'grapevine-animal-hospital-near-me.webp',
				),
				array(
					'keyword' => 'Animal hospital',
					'before'  => 'Rank 8 · ARP 6.48 · 2.47% SOLV',
					'after'   => 'Rank 1 · ARP 2.06 · 91.36% SOLV',
					'image'   => 'grapevine-animal-hospital.webp',
				),
			),
		),
	);
}

/**
 * Industries served. Keys match the page slugs under /industries/.
 */
function pmc_industries() {
	return array(
		'medical-clinics'    => array(
			'name'      => 'Medical Clinics',
			'short'     => 'Chiropractors, med spas, weight loss, hormone therapy, primary care, dental.',
			'icon'      => 'medical',
			'hero'      => 'More new patients start on Google Maps. Make sure they find you first.',
			'lead'      => 'Patients compare the clinics Google shows them, read a few reviews, and call. If your practice isn’t in the top three on the map, most of them never see you. PMC Driveby puts your Google Business Profile where patients are choosing.',
			'customers' => 'patients',
			'searches'  => array( 'chiropractor near me', 'med spa near me', 'weight loss clinic', 'hormone replacement therapy', 'IV therapy near me', 'urgent care' ),
			'points'    => array(
				array( 'Win the “near me” search', 'Rank for the searches patients make from their phone, across your whole service area, not just the block around your office.' ),
				array( 'Rank for each service line', 'Weight loss, HRT, IV therapy, and other high-value services each get their own keyword tracking and visibility.' ),
				array( 'See it on the grid', 'Before-and-after geo-grid reports show exactly where you rank across town for every tracked keyword.' ),
			),
		),
		'auto-dealerships'   => array(
			'name'      => 'Auto Dealerships',
			'short'     => 'New and used car sales, service departments, body shops.',
			'icon'      => 'auto',
			'hero'      => 'Put your dealership at the top of the map when buyers are ready to visit.',
			'lead'      => 'Car shoppers search “dealership near me,” compare a handful of lots on the map, and drive to one. Service customers do the same. PMC Driveby builds your Google Business Profile’s visibility for the searches that bring buyers and service customers onto your lot.',
			'customers' => 'buyers',
			'searches'  => array( 'car dealership near me', 'used cars near me', 'truck dealer', 'auto service near me', 'oil change near me', 'car financing' ),
			'points'    => array(
				array( 'Sales and service', 'Grow visibility for both your sales and service departments, so each Google profile ranks for what it offers.' ),
				array( 'Your whole market', 'Rank across the surrounding towns and zip codes your buyers drive in from, not just your street.' ),
				array( 'Clear reporting', 'Geo-grid reports show average ranking position and share of local voice for every keyword we track.' ),
			),
		),
		'hotels'             => array(
			'name'      => 'Hotels',
			'short'     => 'Independent hotels, boutique properties, and franchised locations.',
			'icon'      => 'hotel',
			'hero'      => 'Get booked directly by travelers searching the map.',
			'lead'      => 'Travelers open Google Maps, search “hotels near me” or near a venue, and book one of the first few properties they see. Ranking higher on the map means more direct calls and bookings, and less dependence on the online travel agencies.',
			'customers' => 'guests',
			'searches'  => array( 'hotels near me', 'hotel near [venue]', 'pet friendly hotel', 'extended stay hotel', 'hotel with pool', 'cheap hotels near me' ),
			'points'    => array(
				array( 'More direct bookings', 'Higher map visibility sends more travelers to your own phone line and booking page.' ),
				array( 'Rank near demand drivers', 'Improve visibility around airports, venues, hospitals, and highways where travelers search.' ),
				array( 'Measured results', 'Before-and-after grid reports show how your ranking changes across the area.' ),
			),
		),
		'veterinary-clinics' => array(
			'name'      => 'Veterinary Clinics',
			'short'     => 'General practice, animal hospitals, emergency and specialty vets.',
			'icon'      => 'vet',
			'hero'      => 'Pet owners start looking before they call. Make sure they find you.',
			'lead'      => 'When pet owners look for a vet, they compare nearby clinics, the animals they treat, services, hours, and reviews before they call. PMC Driveby moves your clinic into the top of Google Maps for the searches that bring in new clients.',
			'customers' => 'pet owners',
			'searches'  => array( 'vet near me', 'animal hospital near me', 'emergency vet', 'dog vaccinations', 'pet dental cleaning', 'exotic animal vet' ),
			'points'    => array(
				array( 'Own “animal hospital near me”', 'Our Grapevine client went from rank 8 to rank 1 and 97.53% share of local voice in about a month.' ),
				array( 'Growth360™ for vets', 'Our veterinary program pairs Driveby with reputation monitoring and monthly executive reporting.' ),
				array( 'A free evaluation first', 'Start with a complimentary seven-day Executive Evaluation™. No sales presentation.' ),
			),
			'program'   => array(
				'name' => 'Growth360™ for Veterinary Clinics',
				'url'  => '/growth360/',
				'cta'  => 'Start my Executive Evaluation',
			),
		),
	);
}

/**
 * How PMC Driveby works.
 */
function pmc_driveby_steps() {
	return array(
		array( 'Connect your profile', 'Tell us your business name exactly as it appears on Google. Your address has to be public on your Google Business Profile for Driveby to work.' ),
		array( 'Baseline scan', 'We map where you rank today on a geo-grid across your service area for your most important keywords.' ),
		array( 'Driveby goes to work', 'Our location-based ranking system builds visibility across your service radius and strengthens your authority for each target keyword.' ),
		array( 'Watch the map turn green', 'Before-and-after grid reports show your average ranking position and share of local voice. Most clients see major movement in 30–45 days.' ),
	);
}

/**
 * FAQs. Also output as FAQPage structured data on pages that show them.
 */
function pmc_faqs() {
	return array(
		array( 'What is PMC Driveby?', 'PMC Driveby is a location-based ranking system for Google Business Profiles. It improves where your business appears on Google Maps and in local search for the keywords your customers use, across your whole service area.' ),
		array( 'How fast will I see results?', 'Our optimization process runs 30–45 days, and many clients see movement much sooner. A Rockwall wellness center moved from position 13 to position 5 for “Immune Booster IV” in seven days.' ),
		array( 'What do you need from me to start?', 'Your business name as it appears on Google and a Google Business Profile with a public address. If your business doesn’t appear in our signup form, your address may be hidden on Google. Contact us and we’ll help.' ),
		array( 'What are ARP and SOLV?', 'ARP is your average ranking position across every point on the map grid (lower is better). SOLV, share of local voice, is the percentage of grid points where you rank in the top 3. Every report shows both, before and after.' ),
		array( 'Is there a free trial?', 'Yes. You can start a free 7-day PMC Driveby trial. Veterinary clinics can also start with a complimentary Growth360™ Executive Evaluation™.' ),
		array( 'Which businesses do you work with?', 'We focus on medical clinics, auto dealerships, hotels, and veterinary clinics, and Driveby works for most businesses that serve customers from a physical location.' ),
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
