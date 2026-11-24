<?php
/**
 * Industry categories and the industries inside each one.
 *
 * URL pattern:
 *   /industries/                       all categories
 *   /industries/{category}/            category page, lists its industries
 *   /industries/{category}/{industry}/ one industry
 *
 * Pages are created automatically on deploy for anything listed here.
 * To add an industry, add one line to a category's 'industries' list:
 *   'slug' => array( 'Plural name', 'singular business noun', array( 4 real searches ), 'One-line future' ),
 *
 * 'featured' categories appear on the home page and in the main menu.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * All industry categories.
 */
function pmc_industries() {
	static $cache = null;
	if ( null !== $cache ) {
		return $cache;
	}
	$cache = array(
		'medical-wellness'       => array(
			'name'       => 'Medical & Wellness',
			'icon'       => 'medical',
			'featured'   => true,
			'future'     => 'A schedule full of the patients you want to treat.',
			'short'      => 'Chiropractors, med spas, weight loss, hormone therapy, dental, and more.',
			'hero'       => 'Picture a schedule that fills itself with the patients you want.',
			'lead'       => 'Patients compare a few clinics on the map, read reviews, and call. In your future, yours is the clinic they see first, trust immediately, and book without a second thought.',
			'customers'  => 'patients',
			'image'      => 'page-medical.jpg',
			'moments'    => array(
				array( 'Every service line has demand', 'Each treatment you offer ranks on its own, so you grow the services that matter most.' ),
				array( 'Your reputation does the selling', 'New patients arrive already confident, because every review they read points to you.' ),
				array( 'You see growth coming', 'Monthly reporting shows visibility, reputation, and position against nearby practices.' ),
			),
			'industries' => array(
				'chiropractors'      => array( 'Chiropractors', 'chiropractic practice', array( 'chiropractor near me', 'back pain doctor', 'sports chiropractor', 'walk-in chiropractor' ), 'New patients choose your practice before they ever call.' ),
				'med-spas'           => array( 'Med Spas', 'med spa', array( 'med spa near me', 'botox near me', 'lip filler', 'laser hair removal' ), 'Your treatment calendar fills with clients who already trust you.' ),
				'weight-loss-clinics' => array( 'Weight Loss Clinics', 'weight loss clinic', array( 'weight loss clinic near me', 'medical weight loss', 'semaglutide near me', 'weight loss doctor' ), 'Patients ready to change their lives find your clinic first.' ),
				'hormone-therapy'    => array( 'Hormone Therapy Clinics', 'hormone therapy clinic', array( 'hormone replacement therapy', 'TRT clinic near me', 'bioidentical hormones', 'menopause doctor' ), 'The clinic people trust with something this personal.' ),
				'iv-therapy'         => array( 'IV Therapy', 'IV therapy clinic', array( 'IV therapy near me', 'hydration therapy', 'Myers cocktail', 'vitamin IV drip' ), 'Walk-ins and bookings, all from people who found you first.' ),
				'dentists'           => array( 'Dentists', 'dental practice', array( 'dentist near me', 'emergency dentist', 'teeth whitening', 'dental implants' ), 'A full schedule of patients who picked you on purpose.' ),
				'physical-therapy'   => array( 'Physical Therapy', 'physical therapy clinic', array( 'physical therapy near me', 'sports physical therapy', 'PT clinic', 'injury rehab' ), 'Referrals still help, but now patients find you on their own.' ),
				'urgent-care'        => array( 'Urgent Care', 'urgent care center', array( 'urgent care near me', 'walk-in clinic', 'urgent care open now', 'x-ray near me' ), 'When it’s urgent, your doors are the ones they choose.' ),
				'primary-care'       => array( 'Primary Care', 'primary care practice', array( 'primary care doctor near me', 'family doctor', 'doctor accepting new patients', 'internal medicine' ), 'Families choose you as their doctor for years to come.' ),
				'dermatology'        => array( 'Dermatology', 'dermatology practice', array( 'dermatologist near me', 'skin doctor', 'acne treatment', 'skin cancer screening' ), 'Your appointment book reflects your reputation.' ),
				'optometrists'       => array( 'Optometrists', 'eye care practice', array( 'optometrist near me', 'eye exam near me', 'glasses near me', 'contact lens exam' ), 'Eye exams booked by people who saw you first.' ),
				'mental-health'      => array( 'Mental Health & Counseling', 'counseling practice', array( 'therapist near me', 'counseling near me', 'marriage counseling', 'anxiety therapist' ), 'The people who need you can find you, and feel safe reaching out.' ),
			),
		),
		'automotive'             => array(
			'name'       => 'Automotive',
			'icon'       => 'auto',
			'featured'   => true,
			'program'    => 'automotive',
			'future'     => 'Buyers decide on you before they reach the lot.',
			'short'      => 'Dealerships, repair and body shops, tires, detailing, and more.',
			'hero'       => 'Become the obvious choice before the customer ever visits.',
			'lead'       => 'Decisions happen before the showroom or service bay. Drivers search, compare reviews, and form a preference long before they call. In your future, that preference is you.',
			'customers'  => 'drivers',
			'image'      => 'page-auto.jpg',
			'moments'    => array(
				array( 'Every department wins', 'Sales, service, and parts each rank for what they offer, so the whole business stays busy.' ),
				array( 'Your reviews earn the visit', 'Review Guard catches reputation risks early, so drivers see a business they can trust.' ),
				array( 'Your whole market knows you', 'You rank across the towns and zip codes customers drive in from, not just your street.' ),
			),
			'industries' => array(
				'car-dealerships'     => array( 'New Car Dealerships', 'dealership', array( 'car dealership near me', 'new cars for sale', 'car lease deals', 'certified dealer' ), 'Buyers decide on your lot before they leave the house.' ),
				'used-car-dealers'    => array( 'Used Car Dealers', 'used car lot', array( 'used cars near me', 'used trucks for sale', 'buy here pay here', 'certified pre-owned' ), 'Shoppers trust your inventory before the test drive.' ),
				'auto-repair'         => array( 'Auto Repair Shops', 'repair shop', array( 'auto repair near me', 'mechanic near me', 'check engine light', 'brake repair' ), 'Drivers with a problem call you first, and come back.' ),
				'collision-body-shops' => array( 'Collision & Body Shops', 'body shop', array( 'body shop near me', 'collision repair', 'auto body repair', 'dent repair' ), 'After an accident, yours is the shop they trust.' ),
				'tire-shops'          => array( 'Tire Shops', 'tire shop', array( 'tire shop near me', 'new tires', 'flat tire repair', 'wheel alignment' ), 'The obvious stop when the tire light comes on.' ),
				'oil-change'          => array( 'Oil Change & Quick Lube', 'quick lube', array( 'oil change near me', 'quick oil change', 'synthetic oil change', 'oil change open now' ), 'Drivers pull into your bay, not the one down the street.' ),
				'auto-detailing'      => array( 'Auto Detailing', 'detailing shop', array( 'car detailing near me', 'mobile detailing', 'ceramic coating', 'interior detailing' ), 'Your schedule books out with drivers who saw your work first.' ),
				'car-washes'          => array( 'Car Washes', 'car wash', array( 'car wash near me', 'touchless car wash', 'unlimited car wash', 'hand car wash' ), 'Members who chose you, and keep coming back.' ),
				'rv-boat-dealers'     => array( 'RV & Boat Dealers', 'dealership', array( 'RV dealer near me', 'boats for sale', 'used RVs', 'boat dealer' ), 'Big-ticket buyers start their search with you.' ),
				'towing'              => array( 'Towing', 'towing company', array( 'tow truck near me', 'towing service', 'roadside assistance', '24 hour towing' ), 'When someone’s stuck, your number is the one they call.' ),
			),
		),
		'hospitality'            => array(
			'name'       => 'Hospitality',
			'icon'       => 'hotel',
			'featured'   => true,
			'future'     => 'Direct bookings from travelers who found you first.',
			'short'      => 'Hotels, inns, vacation rentals, campgrounds, and venues.',
			'hero'       => 'Imagine travelers booking you directly, every night.',
			'lead'       => 'Travelers open the map, search near where they need to be, and book one of the first places they see. In your future, that’s you, booked directly instead of through a travel site.',
			'customers'  => 'guests',
			'image'      => 'page-hotels.jpg',
			'moments'    => array(
				array( 'Direct bookings grow', 'Higher map visibility sends guests to your own phone and booking page.' ),
				array( 'You own the demand nearby', 'Rank around the airports, venues, and attractions that bring people to town.' ),
				array( 'Your rating stays an asset', 'Review Guard flags problems early, so your star rating keeps winning the click.' ),
			),
			'industries' => array(
				'hotels'                => array( 'Hotels', 'hotel', array( 'hotels near me', 'hotel near the airport', 'pet friendly hotel', 'hotel with pool' ), 'Travelers book you directly, every night.' ),
				'boutique-hotels'       => array( 'Boutique Hotels', 'boutique hotel', array( 'boutique hotel', 'unique hotels near me', 'romantic getaway', 'downtown hotel' ), 'Guests looking for something special find you first.' ),
				'motels-inns'           => array( 'Motels & Inns', 'inn', array( 'motel near me', 'cheap hotels near me', 'inn near me', 'roadside motel' ), 'Road-trippers pull in because they found you on the map.' ),
				'extended-stay'         => array( 'Extended Stay', 'extended-stay property', array( 'extended stay hotel', 'weekly rates hotel', 'corporate housing', 'long term stay' ), 'Long-stay guests choose you for weeks at a time.' ),
				'bed-and-breakfasts'    => array( 'Bed & Breakfasts', 'bed and breakfast', array( 'bed and breakfast near me', 'B&B', 'country inn', 'weekend getaway' ), 'Your rooms fill with guests who fell for you online.' ),
				'vacation-rentals'      => array( 'Vacation Rentals', 'vacation rental company', array( 'vacation rentals near me', 'cabin rentals', 'beach house rental', 'short term rental' ), 'More direct bookings, fewer platform fees.' ),
				'rv-parks-campgrounds'  => array( 'RV Parks & Campgrounds', 'campground', array( 'RV park near me', 'campground near me', 'RV sites', 'glamping' ), 'Campers reserve their spot with you before they hit the road.' ),
				'event-wedding-venues'  => array( 'Event & Wedding Venues', 'venue', array( 'wedding venues near me', 'event space', 'banquet hall', 'party venue' ), 'Couples and planners tour your venue first.' ),
			),
		),
		'veterinary-pet'         => array(
			'name'       => 'Veterinary & Pet',
			'icon'       => 'vet',
			'featured'   => true,
			'program'    => 'veterinary',
			'future'     => 'The business pet owners trust before they call.',
			'short'      => 'Vet clinics, animal hospitals, groomers, boarding, and more.',
			'hero'       => 'Pet owners start looking before they call. Make sure they find you.',
			'lead'       => 'Pet owners compare nearby options, the animals they serve, hours, and reviews before they call. In your future, they finish that search already sure it’s you.',
			'customers'  => 'pet owners',
			'image'      => 'page-vet.jpg',
			'moments'    => array(
				array( 'First on the map', 'Our Grapevine animal clinic client went from rank 8 to rank 1 for “animal hospital near me” in about a month.' ),
				array( 'Confidence before the call', 'Pet owners see a clear, consistent picture of your business everywhere they look.' ),
				array( 'Leadership sees the whole picture', 'Monthly reporting on visibility, reputation, and positioning against nearby competitors.' ),
			),
			'industries' => array(
				'veterinary-clinics'   => array( 'Veterinary Clinics', 'veterinary clinic', array( 'vet near me', 'veterinarian', 'dog vaccinations', 'cat vet' ), 'The clinic pet owners trust before they call.' ),
				'animal-hospitals'     => array( 'Animal Hospitals', 'animal hospital', array( 'animal hospital near me', 'pet surgery', 'pet dental cleaning', 'vet hospital' ), 'The map’s clear first choice for pet care.' ),
				'emergency-vets'       => array( 'Emergency Vets', 'emergency animal hospital', array( 'emergency vet near me', '24 hour vet', 'pet ER', 'after hours vet' ), 'In the scariest moment, they find you instantly.' ),
				'mobile-vets'          => array( 'Mobile Vets', 'mobile vet practice', array( 'mobile vet near me', 'house call vet', 'in-home pet euthanasia', 'mobile pet vaccinations' ), 'Pet owners invite you home because they found you first.' ),
				'pet-groomers'         => array( 'Pet Groomers', 'grooming salon', array( 'dog groomer near me', 'mobile dog grooming', 'cat grooming', 'puppy groom' ), 'A grooming book that stays full, week after week.' ),
				'dog-boarding-daycare' => array( 'Boarding & Daycare', 'boarding facility', array( 'dog boarding near me', 'doggy daycare', 'kennel near me', 'pet sitting' ), 'Owners trust you with family while they’re away.' ),
				'dog-trainers'         => array( 'Dog Trainers', 'training business', array( 'dog trainer near me', 'puppy training classes', 'obedience training', 'board and train' ), 'New clients find you the week they bring their puppy home.' ),
				'pet-stores'           => array( 'Pet Stores', 'pet store', array( 'pet store near me', 'dog food near me', 'pet supplies', 'aquarium store' ), 'Local pet owners shop with you, not just online.' ),
			),
		),
		'home-services'          => array(
			'name'       => 'Home Services',
			'icon'       => 'home',
			'future'     => 'The first call homeowners make, every time.',
			'short'      => 'Roofers, HVAC, plumbers, electricians, landscaping, and more.',
			'hero'       => 'When something breaks, homeowners call you first.',
			'lead'       => 'Homeowners search the moment something goes wrong, call one of the first names on the map, and stick with whoever shows up and does it right. In your future, that first call is yours.',
			'customers'  => 'homeowners',
			'image'      => 'page-home-services.jpg',
			'moments'    => array(
				array( 'Your phone rings in a crisis', 'Emergency searches like “near me” and “open now” land on your profile first.' ),
				array( 'Your service area, covered', 'You rank across every neighborhood you serve, not just around your shop address.' ),
				array( 'Reviews that win the bid', 'Review Guard keeps fake and unfair reviews from undercutting the work you’re proud of.' ),
			),
			'industries' => array(
				'roofers'           => array( 'Roofers', 'roofing company', array( 'roofer near me', 'roof repair', 'roof replacement', 'storm damage roof' ), 'After every storm, homeowners call you first.' ),
				'hvac'              => array( 'HVAC', 'HVAC company', array( 'AC repair near me', 'furnace repair', 'HVAC company', 'heating and cooling' ), 'When the AC quits, your phone rings.' ),
				'plumbers'          => array( 'Plumbers', 'plumbing company', array( 'plumber near me', 'emergency plumber', 'water heater repair', 'drain cleaning' ), 'The plumber homeowners trust at 2 a.m.' ),
				'electricians'      => array( 'Electricians', 'electrical contractor', array( 'electrician near me', 'electrical repair', 'panel upgrade', 'EV charger installation' ), 'Homeowners call you first, and refer you after.' ),
				'landscaping'       => array( 'Landscaping & Lawn Care', 'landscaping company', array( 'landscaping near me', 'lawn care service', 'lawn mowing', 'landscape design' ), 'Your routes fill up with neighbors who found you first.' ),
				'pest-control'      => array( 'Pest Control', 'pest control company', array( 'pest control near me', 'exterminator', 'termite inspection', 'bed bug treatment' ), 'The first call when something’s crawling.' ),
				'cleaning-services' => array( 'Cleaning Services', 'cleaning company', array( 'house cleaning near me', 'maid service', 'move out cleaning', 'deep cleaning' ), 'Recurring clients who chose you on sight.' ),
				'pool-services'     => array( 'Pool Services', 'pool company', array( 'pool cleaning near me', 'pool repair', 'pool service', 'pool builder' ), 'Pool owners trust you with their backyard.' ),
				'garage-doors'      => array( 'Garage Doors', 'garage door company', array( 'garage door repair', 'garage door installation', 'garage door opener', 'broken spring repair' ), 'Stuck door, your number, same-day job.' ),
				'remodeling'        => array( 'Remodeling & Contractors', 'remodeling company', array( 'kitchen remodel near me', 'bathroom remodel', 'general contractor', 'home renovation' ), 'Big projects start with a search, and end with your crew.' ),
			),
		),
		'professional-services'  => array(
			'name'       => 'Professional Services',
			'icon'       => 'briefcase',
			'future'     => 'Clients trust you before the first meeting.',
			'short'      => 'Law firms, CPAs, financial advisors, insurance, real estate, and more.',
			'hero'       => 'Be the firm people trust before they ever meet you.',
			'lead'       => 'People choose a lawyer, accountant, or advisor by searching, reading reviews, and calling the firm that feels safest. In your future, that firm is yours.',
			'customers'  => 'clients',
			'image'      => 'page-professional.jpg',
			'moments'    => array(
				array( 'Found for the work you want', 'Rank for the specific services that bring in your best clients, not just your firm name.' ),
				array( 'Trust, before the consultation', 'A strong, protected reputation makes the first call an easy decision.' ),
				array( 'Clear reporting', 'Monthly reporting shows where you rank, how your reputation is trending, and what to do next.' ),
			),
			'industries' => array(
				'law-firms'           => array( 'Law Firms', 'law firm', array( 'lawyer near me', 'personal injury lawyer', 'family law attorney', 'DUI lawyer' ), 'When it matters most, clients call your firm first.' ),
				'accountants'         => array( 'Accountants & CPAs', 'accounting firm', array( 'CPA near me', 'tax preparer', 'bookkeeping services', 'small business accountant' ), 'Tax season starts with clients who found you first.' ),
				'financial-advisors'  => array( 'Financial Advisors', 'advisory firm', array( 'financial advisor near me', 'retirement planning', 'wealth management', 'fiduciary advisor' ), 'Trust starts before the first meeting.' ),
				'insurance-agencies'  => array( 'Insurance Agencies', 'agency', array( 'insurance agent near me', 'car insurance quote', 'home insurance', 'life insurance agent' ), 'Locals choose a real agent nearby, and it’s you.' ),
				'real-estate-agents'  => array( 'Real Estate Agents', 'brokerage', array( 'realtor near me', 'homes for sale', 'sell my house', 'real estate agent' ), 'Buyers and sellers start the conversation with you.' ),
				'mortgage-brokers'    => array( 'Mortgage Brokers', 'mortgage office', array( 'mortgage broker near me', 'home loan', 'refinance rates', 'first time home buyer' ), 'Borrowers trust you with the biggest number in their lives.' ),
				'property-management' => array( 'Property Management', 'property management company', array( 'property management near me', 'rental management', 'HOA management', 'apartments for rent' ), 'Owners and renters find you first.' ),
			),
		),
		'beauty-personal-care'   => array(
			'name'       => 'Beauty & Personal Care',
			'icon'       => 'sparkle',
			'future'     => 'A book that stays full with clients who chose you.',
			'short'      => 'Salons, barbershops, nail salons, spas, lash and brow, and more.',
			'hero'       => 'Picture a book that stays full, week after week.',
			'lead'       => 'New clients scroll the map, look at your photos and reviews, and book whoever looks best. In your future, that’s you, with regulars who keep coming back.',
			'customers'  => 'clients',
			'image'      => 'page-beauty.jpg',
			'moments'    => array(
				array( 'Walk-ins and bookings', 'Rank for the services people book most, from color to cuts to treatments.' ),
				array( 'Your work speaks first', 'A protected rating and a strong profile let your reputation do the selling.' ),
				array( 'Momentum that spreads', 'Ripple turns happy clients into the people who send you their friends.' ),
			),
			'industries' => array(
				'hair-salons'    => array( 'Hair Salons', 'salon', array( 'hair salon near me', 'balayage', 'haircut near me', 'hair color' ), 'A chair that stays booked with clients who chose you.' ),
				'barbershops'    => array( 'Barbershops', 'barbershop', array( 'barber near me', 'fade haircut', 'beard trim', 'walk-in barber' ), 'The shop people walk into, and keep coming back to.' ),
				'nail-salons'    => array( 'Nail Salons', 'nail salon', array( 'nail salon near me', 'gel manicure', 'pedicure near me', 'acrylic nails' ), 'Walk-ins and regulars, all from people who saw you first.' ),
				'day-spas'       => array( 'Day Spas & Massage', 'spa', array( 'spa near me', 'massage near me', 'couples massage', 'facial near me' ), 'Your treatment rooms stay full.' ),
				'lash-brow'      => array( 'Lash & Brow Studios', 'studio', array( 'lash extensions near me', 'brow lamination', 'microblading', 'lash lift' ), 'Clients book you because your work speaks first.' ),
				'tattoo-studios' => array( 'Tattoo Studios', 'tattoo studio', array( 'tattoo shop near me', 'tattoo artist', 'fine line tattoo', 'tattoo removal' ), 'Your books fill with clients who found your art.' ),
			),
		),
		'fitness-recreation'     => array(
			'name'       => 'Fitness & Recreation',
			'icon'       => 'dumbbell',
			'future'     => 'New members who walk in already sold.',
			'short'      => 'Gyms, yoga and Pilates, martial arts, trainers, and entertainment.',
			'hero'       => 'Imagine every class and membership filling itself.',
			'lead'       => 'People decide where to work out, train, or spend a Saturday by searching nearby and picking the place with the best reviews. In your future, that’s your front door.',
			'customers'  => 'members',
			'image'      => 'page-fitness.jpg',
			'moments'    => array(
				array( 'Found when they’re ready', 'Rank when people search the moment they decide to start.' ),
				array( 'Trust before the trial', 'Strong, protected reviews make the first visit an easy yes.' ),
				array( 'Members bring members', 'Ripple turns your community into your best marketing.' ),
			),
			'industries' => array(
				'gyms'              => array( 'Gyms', 'gym', array( 'gym near me', '24 hour gym', 'gym membership', 'women’s gym' ), 'New members walk in already sold.' ),
				'yoga-pilates'      => array( 'Yoga & Pilates', 'studio', array( 'yoga studio near me', 'pilates near me', 'hot yoga', 'reformer pilates' ), 'Classes fill with students who found you first.' ),
				'martial-arts'      => array( 'Martial Arts', 'martial arts school', array( 'martial arts near me', 'karate for kids', 'jiu jitsu', 'boxing gym' ), 'Families choose your school for years.' ),
				'personal-trainers' => array( 'Personal Trainers', 'training studio', array( 'personal trainer near me', 'small group training', 'strength coach', 'fitness coach' ), 'Clients who are ready to commit find you first.' ),
				'dance-studios'     => array( 'Dance Studios', 'dance studio', array( 'dance studio near me', 'dance classes for kids', 'ballet classes', 'adult dance classes' ), 'Every season starts with a full roster.' ),
				'entertainment'     => array( 'Family Entertainment', 'entertainment center', array( 'things to do near me', 'trampoline park', 'escape room', 'bowling alley' ), 'When families look for something to do, they find you.' ),
			),
		),
		'restaurants-food'       => array(
			'name'       => 'Restaurants & Food',
			'icon'       => 'utensils',
			'future'     => 'Full tables from diners who picked you from the map.',
			'short'      => 'Restaurants, cafés, bakeries, bars, catering, and food trucks.',
			'hero'       => 'Picture full tables from diners who chose you first.',
			'lead'       => 'Hungry people open the map, scan photos and stars, and go. In your future, you’re the place they pick, and the place they tell their friends about.',
			'customers'  => 'diners',
			'image'      => 'page-restaurants.jpg',
			'moments'    => array(
				array( 'Found at mealtime', 'Rank for “near me” and “open now” searches right when people are deciding.' ),
				array( 'A rating you can count on', 'Review Guard keeps fake and abusive reviews from dragging your stars down.' ),
				array( 'Word of mouth, on purpose', 'Ripple turns regulars into the reason new diners walk in.' ),
			),
			'industries' => array(
				'restaurants'    => array( 'Restaurants', 'restaurant', array( 'restaurants near me', 'dinner near me', 'brunch near me', 'restaurant open now' ), 'Tables fill with diners who picked you from the map.' ),
				'cafes-coffee'   => array( 'Cafés & Coffee Shops', 'café', array( 'coffee shop near me', 'café near me', 'breakfast near me', 'latte near me' ), 'Your morning rush starts with people who found you first.' ),
				'bakeries'       => array( 'Bakeries', 'bakery', array( 'bakery near me', 'custom cakes', 'cupcakes near me', 'donuts near me' ), 'Orders roll in from people who saw you first.' ),
				'bars-breweries' => array( 'Bars & Breweries', 'bar', array( 'bars near me', 'brewery near me', 'happy hour', 'sports bar' ), 'Your taps stay busy with locals and visitors alike.' ),
				'catering'       => array( 'Catering', 'catering company', array( 'catering near me', 'event catering', 'wedding catering', 'corporate catering' ), 'Planners call you first for the big day.' ),
				'food-trucks'    => array( 'Food Trucks', 'food truck', array( 'food trucks near me', 'food truck catering', 'tacos near me', 'street food' ), 'Wherever you park, people find you.' ),
			),
		),
		'retail'                 => array(
			'name'       => 'Retail',
			'icon'       => 'bag',
			'future'     => 'Shoppers who choose your store over the website.',
			'short'      => 'Boutiques, furniture, jewelers, florists, hardware, and specialty shops.',
			'hero'       => 'Make your store the one locals choose over the website.',
			'lead'       => 'Even online shoppers search for a store nearby when they want it today, want to see it in person, or want advice. In your future, they find your doors first.',
			'customers'  => 'shoppers',
			'image'      => 'page-retail.jpg',
			'moments'    => array(
				array( 'Found when they want it today', 'Rank for “near me” and product searches when shoppers are ready to buy.' ),
				array( 'Trusted on sight', 'A strong, protected rating makes the drive to your store an easy decision.' ),
				array( 'Customers who spread the word', 'Ripple turns your best customers into a steady stream of new ones.' ),
			),
			'industries' => array(
				'boutiques'        => array( 'Boutiques', 'boutique', array( 'boutique near me', 'women’s clothing store', 'gift shop', 'local boutique' ), 'Shoppers walk in because they found you first.' ),
				'furniture-stores' => array( 'Furniture Stores', 'furniture store', array( 'furniture store near me', 'mattress store', 'sofas near me', 'outdoor furniture' ), 'Big purchases start with your showroom.' ),
				'jewelers'         => array( 'Jewelers', 'jewelry store', array( 'jewelry store near me', 'engagement rings', 'watch repair', 'custom jewelry' ), 'The moments that matter start in your store.' ),
				'florists'         => array( 'Florists', 'flower shop', array( 'florist near me', 'flower delivery', 'wedding flowers', 'same day flowers' ), 'Every occasion starts with a call to you.' ),
				'hardware-garden'  => array( 'Hardware & Garden Centers', 'store', array( 'hardware store near me', 'garden center near me', 'plant nursery near me', 'paint store' ), 'Weekend projects start at your store.' ),
				'specialty-retail' => array( 'Specialty Retail', 'shop', array( 'bike shop near me', 'liquor store near me', 'music store', 'hobby shop' ), 'Locals choose you over the big box and the website.' ),
			),
		),
	);
	return $cache;
}

/**
 * Featured categories (home page, main menu).
 */
function pmc_featured_industries() {
	return array_filter(
		pmc_industries(),
		function ( $c ) {
			return ! empty( $c['featured'] );
		}
	);
}

/**
 * One industry, expanded to named keys, or null.
 *
 * @param string $cat  Category slug.
 * @param string $slug Industry slug.
 */
function pmc_subindustry( $cat, $slug ) {
	$cats = pmc_industries();
	if ( empty( $cats[ $cat ]['industries'][ $slug ] ) ) {
		return null;
	}
	$r = $cats[ $cat ]['industries'][ $slug ];
	return array(
		'slug'     => $slug,
		'name'     => $r[0],
		'singular' => $r[1],
		'searches' => $r[2],
		'line'     => $r[3],
	);
}

/**
 * URL helpers.
 *
 * @param string $cat  Category slug.
 * @param string $slug Optional industry slug.
 */
function pmc_industry_url( $cat, $slug = '' ) {
	return home_url( '/industries/' . $cat . '/' . ( $slug ? $slug . '/' : '' ) );
}

/**
 * Total number of industries listed.
 */
function pmc_industry_count() {
	$n = 0;
	foreach ( pmc_industries() as $c ) {
		$n += count( $c['industries'] );
	}
	return $n;
}

/**
 * Representative searches for a category: the top search of each industry.
 *
 * @param string $cat Category slug.
 * @param int    $n   How many.
 */
function pmc_category_searches( $cat, $n = 6 ) {
	$out = array();
	foreach ( pmc_industries()[ $cat ]['industries'] as $r ) {
		$out[] = $r[2][0];
	}
	return array_slice( $out, 0, $n );
}
