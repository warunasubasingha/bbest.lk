<?php
// Simple manual translations helper
// Usage: t('key') — returns translated string for current language (EN, SI, TA)

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$LANG = $_SESSION['lang'] ?? 'EN';

$TRANSLATIONS = [
    // Header / common
    'home_title' => ['EN' => 'Home Page', 'SI' => 'ගෙදර පිටුව', 'TA' => 'முகப்பு'],
    'search' => ['EN' => 'Search', 'SI' => 'සෙවීම', 'TA' => 'தேடல்'],
    'login_or_signup' => ['EN' => 'Login or Sign Up', 'SI' => 'පුරන්න හෝ ලියාපදිංචි වන්න', 'TA' => 'உள்ளே செல்லவும் அல்லது பதிவு செய்க'],
    'continue_with_email' => ['EN' => 'Continue with E-mail', 'SI' => 'ඊමේල් සමඟ ඉදිරියට යන්න', 'TA' => 'மின்னஞ்சலுடன் தொடரவும்'],
    'continue_with_phone' => ['EN' => 'Continue with Phone Number', 'SI' => 'දුරකථන අංක සමඟ ඉදිරියට යන්න', 'TA' => 'தொலைபேசி எண்ணுடன் தொடரவும்'],
    'register_new_account' => ['EN' => 'Register New Account', 'SI' => 'නව ගිණුම ලියාපදිංචි කරන්න', 'TA' => 'புதிய கணக்கை பதிவு செய்யவும்'],
    'terms_privacy' => ['EN' => 'By continuing, you agree to our Terms & Privacy Policy.', 'SI' => 'ඔබ ඉදිරියට යන විට, අපේ නියමයන් සහ පෞද්ගලිකත්ව ප්‍රතිපත්තියට එකඟ වෙයි.', 'TA' => 'தொடருவதன் மூலம், நீங்கள் எங்கள் விதிமுறைகள் மற்றும் தனியுரிமை கொள்கைக்கு உடன்படுகிறீர்கள்.'],

    // Categories
    'property' => ['EN' => 'Property', 'SI' => 'ප්‍රමාණය', 'TA' => 'தொழில்'],
    'vehicles' => ['EN' => 'Vehicles', 'SI' => 'වාහන', 'TA' => 'வாகனங்கள்'],
    'property_services' => ['EN' => 'Property services', 'SI' => 'දේපල සේවාවන්', 'TA' => 'தகவல் சேவைகள்'],
    'vehicle_service' => ['EN' => 'Vehicle Service', 'SI' => 'වාහන සේවය', 'TA' => 'வாகன சேவை'],

    // Footer / Bottom nav
    'about_us' => ['EN' => 'About Us', 'SI' => 'අප ගැන', 'TA' => 'எங்களை பற்றி'],
    'about_web' => ['EN' => 'About Web', 'SI' => 'ජාලය පිළිබඳ', 'TA' => 'இணையம் பற்றி'],
    'list' => ['EN' => 'List', 'SI' => 'ලැයිස්තුව', 'TA' => 'பட்டியல்'],
    'filter' => ['EN' => 'Filter', 'SI' => 'පෙරහන්', 'TA' => 'வடிகட்டு'],
    'search_district_city' => ['EN' => 'Search district or city...', 'SI' => 'දිස්ත්‍රික්කය හෝ නගරය සෙවීම...', 'TA' => 'மாவட்டம் அல்லது நகரத்தைத் தேடவும்...'],
    'register_account' => ['EN' => 'Register Account', 'SI' => 'ගිණුම ලියාපදිංචි කරන්න', 'TA' => 'கணக்கை பதிவு செய்யவும்'],
    'register' => ['EN' => 'Register', 'SI' => 'ලියාපදිංචි කරන්න', 'TA' => 'பதிவு செய்க'],
    'list_button' => ['EN' => 'List', 'SI' => 'ලැයිස්තුව', 'TA' => 'பட்டியல்'],
    'buy_list' => ['EN' => 'Buy List', 'SI' => 'මිලදී ගැනීම් ලැයිස්තුව', 'TA' => 'வாங்கு பட்டியல்'],
    'location' => ['EN' => 'Location', 'SI' => 'ස්ථානය', 'TA' => 'இடம்'],
    'select_district_city' => ['EN' => 'Select District & City', 'SI' => 'දිස්ත්‍රික්කය සහ නගරය තෝරන්න', 'TA' => 'மாவட்டம் மற்றும் நகரத்தை தேர்ந்தெடுக்கவும்'],
    'enter_price' => ['EN' => 'Enter Price', 'SI' => 'මිල ඇතුළත් කරන්න', 'TA' => 'விலையை உள்ளிடுக'],
    'reset' => ['EN' => 'Reset', 'SI' => 'අලුත් කරන්න', 'TA' => 'மீட்டமைக்கவும்'],
    'done' => ['EN' => 'Done', 'SI' => 'සාමතිය', 'TA' => 'முடிந்தது'],
    'view_details' => ['EN' => 'View Details', 'SI' => 'විස්තර බලන්න', 'TA' => 'விவரங்களைப் பார்க்க'],
    'apply_now' => ['EN' => 'APPLY NOW', 'SI' => 'දැන් ඉල්ලන්න', 'TA' => 'இப்போதே விண்ணப்பிக்க'],
    'home' => ['EN' => 'Home', 'SI' => 'ගෙදර', 'TA' => 'முகப்பு'],
    'notification' => ['EN' => 'Notification', 'SI' => 'දැනුම්දීම්', 'TA' => 'அறிவிப்பு'],
    'message' => ['EN' => 'Message', 'SI' => 'පණිවිඩය', 'TA' => 'செய்தி'],
    'call' => ['EN' => 'Call', 'SI' => 'කතා කරන්න', 'TA' => 'அழை'],
    'whatsapp' => ['EN' => 'WhatsApp', 'SI' => 'Whatsapp', 'TA' => 'வாட்ஸ்அப்'],
    'like' => ['EN' => 'Like', 'SI' => 'අනුමත කිරීම', 'TA' => 'பிடிப்பு'],
    'comment' => ['EN' => 'Comment', 'SI' => 'කියවන්න', 'TA' => 'கருத்து'],
    'share' => ['EN' => 'Share', 'SI' => 'හුවමාරු', 'TA' => 'பகிர்'],
    'continue_with_google' => ['EN' => 'Continue with Google', 'SI' => 'Google සමඟ දිගටම', 'TA' => 'Google உடன் தொடரவும்'],
    'enter_email_or_phone' => ['EN' => 'Enter your email or phone', 'SI' => 'ඔබගේ ඊමේල් හෝ දුරකථනය ඇතුළත් කරන්න', 'TA' => 'உங்கள் மின்னஞ்சல் அல்லது தொலைபேசி எண்ணை உள்ளிடவும்'],
    'signup' => ['EN' => "Sign Up", 'SI' => 'ලියාපදිංචි වන්න', 'TA' => 'பதிவு செய்ய'],
    'email' => ['EN' => 'E-mail', 'SI' => 'ඊ-තැපැල්', 'TA' => 'மின்னஞ்சல்'],
    'messaging' => ['EN' => 'Messaging', 'SI' => 'පණිවිඩ', 'TA' => 'செய்திகள்'],
    'view_map' => ['EN' => 'View Map', 'SI' => 'සිතියම් බලන්න', 'TA' => 'வரைபடத்தை பார்க்க'],
    'view_more_details' => ['EN' => 'View More Details', 'SI' => 'තව විස්තර බලන්න', 'TA' => 'மேலும் விவரங்களைப் பார்க்க'],
    'upgrade_now' => ['EN' => 'Upgrade Now', 'SI' => 'දැන් උත්ක්‍රාම වන්න', 'TA' => 'இப்போதே மேம்படுத்தல்'],
    'reviews' => ['EN' => 'Reviews', 'SI' => 'සමාලෝචන', 'TA' => 'பரிசீலனைகள்'],
    'follow' => ['EN' => 'Follow', 'SI' => 'අනුගමනය කරන්න', 'TA' => 'பின்தொடர'],
    'verified_player' => ['EN' => 'Verified Player', 'SI' => 'සහතික කළ ක්‍රීඩකය', 'TA' => 'சரிபார்க்கப்பட்ட வீரர்'],
    'orders' => ['EN' => 'Orders', 'SI' => 'ඇණවුම්', 'TA' => 'ஆர்டர்கள்'],
    'offers' => ['EN' => 'Offers', 'SI' => 'පැOffer', 'TA' => 'சலுகைகள்'],
    'quotation' => ['EN' => 'Quotation', 'SI' => 'වquot', 'TA' => 'தொகை'],
    'ad_center' => ['EN' => 'Ad Center', 'SI' => 'වෙළඳ දැන්වීම් මධ්‍යස්ථානය', 'TA' => 'விளம்பர மையம்'],
    'edit_profile' => ['EN' => 'Edit Profile', 'SI' => 'පැතිකඩ සංස්කරණය', 'TA' => 'சுயவிவரத்தை திருத்தவும்'],
    'payments' => ['EN' => 'Payments', 'SI' => 'ගෙවීම්', 'TA' => 'கட்டணங்கள்'],
    'verification_center' => ['EN' => 'Verification Center', 'SI' => 'තහවුරු කිරීම මධ්‍යස්ථානය', 'TA' => 'சரிபார்ப்பு மையம்'],
    'help_support' => ['EN' => 'Help & Support', 'SI' => 'උදව් සහ සහයෝගීතාව', 'TA' => 'உதவி மற்றும் ஆதரவு'],
    'security' => ['EN' => 'Security', 'SI' => 'ආරක්ෂාව', 'TA' => 'பாதுகாப்பு'],
    'settings' => ['EN' => 'Settings', 'SI' => 'සැකසුම්', 'TA' => 'அமைப்புகள்'],
    'logout' => ['EN' => 'Logout', 'SI' => 'පිටවීම', 'TA' => 'வெளியேறு'],
    'customer_profile' => ['EN' => 'Customer Profile', 'SI' => 'පාරිභෝගික පැතිකඩ', 'TA' => 'வாடிக்கையாளர் சுயவிவரம்'],
    'apply_loan_title' => ['EN' => 'Apply Loan', 'SI' => 'ණය බාරගන්න', 'TA' => 'கடன் விண்ணப்பம்'],
    'bank_loan_dashboard' => ['EN' => 'Bank Loan Dashboard', 'SI' => 'බැංකු ණය පුවරුව', 'TA' => 'வங்கி கடன் டாஷ்போர்ட்'],
    'branches' => ['EN' => 'Branches', 'SI' => 'ශාඛා', 'TA' => ' கிளைகள்'],
    'hotline' => ['EN' => 'Hotline', 'SI' => 'හොට්ලයින්', 'TA' => 'ஹாட்லைன்'],
    'call_direct' => ['EN' => 'Call Direct', 'SI' => 'පරම ප්‍රවේශය', 'TA' => ' நேரில் அழைப்பு'],
    'apply_for_loan' => ['EN' => 'Apply for Loan', 'SI' => 'ණය සඳහා අයදුම් කරන්න', 'TA' => 'கடனுக்கு விண்ணப்பிக்கவும்'],
    'loan_amount' => ['EN' => 'Loan Amount', 'SI' => 'ණය මුදල', 'TA' => 'கடன் தொகை'],
    'down_payment' => ['EN' => 'Down Payment', 'SI' => 'මුල්ගෙවීම', 'TA' => 'முதலில் செலுத்துதல்'],
    'loan_time' => ['EN' => 'Loan Time', 'SI' => 'ණය කාලය', 'TA' => 'கடன் காலம்'],
    'loan_application' => ['EN' => 'Loan Application', 'SI' => 'ණය අයදුම්පත්', 'TA' => 'கடன் விண்ணப்பம்'],
    'personal_details' => ['EN' => 'Personal Details', 'SI' => 'පුද්ගලික විස්තර', 'TA' => 'பயனர் விவரங்கள்'],
    'submit_save' => ['EN' => 'Submit & Save', 'SI' => 'ඉදිරිපත් කරන්න සහ සුරකින්න', 'TA' => 'சமர்ப்பிக்கவும் & சேமிக்கவும்'],
    'full_name' => ['EN' => 'Full Name', 'SI' => 'සම්පූර්ණ නම', 'TA' => 'முழு பெயர்'],
    'id_scan' => ['EN' => 'ID Card Scan', 'SI' => 'හැඳුනුම්පත් ස්කැන්', 'TA' => 'அடையாள அட்டை ஸ்கேன்'],
    'address' => ['EN' => 'Address', 'SI' => 'ලිපිනය', 'TA' => 'முகவரி'],
    'mobile_number' => ['EN' => 'Mobile Number', 'SI' => 'ජංගම දුරකථන අංකය', 'TA' => 'மொபைல் எண்'],
    'email_label' => ['EN' => 'E-mail', 'SI' => 'ඊ-තැපැල්', 'TA' => 'மின்னஞ்சல்'],
    'employment' => ['EN' => 'Employment', 'SI' => 'රැකීම', 'TA' => 'வேலை வாய்ப்பு'],
    'company_profile' => ['EN' => 'Company Profile', 'SI' => 'සමාගම පැතිකඩ', 'TA' => 'நிறுவனத்தின் சுயவிவரம்'],
    'company_overview' => ['EN' => 'Company Overview', 'SI' => 'සමාගම් හැඳින්වීම', 'TA' => 'நிறுவனத்தின் மேல் கண்ணோட்டம்'],
    'about_company' => ['EN' => 'About Company', 'SI' => 'සමාගම පිළිබඳ', 'TA' => 'நிறுவனம் பற்றி'],
    'view_more_details' => ['EN' => 'View More Details', 'SI' => 'තව විස්තර බලන්න', 'TA' => 'மேலும் விவரங்களைப் பார்க்க'],
    'contact_us_now' => ['EN' => 'Contact Us Now', 'SI' => 'දැන් අපව අමතන්න', 'TA' => 'இப்போது எங்களை தொடர்பு கொள்ளுங்கள்'],
    'verified_dealer' => ['EN' => 'Verified Dealer', 'SI' => 'සහතික කරන ලද වෙළඳ', 'TA' => 'சரிபார்க்கப்பட்ட வணிகர்'],
    'years_exp' => ['EN' => 'Years Exp.', 'SI' => 'අවුරුදු පළපුරුද්ද', 'TA' => 'அனுபவம் ஆண்டுகள்'],
    'projects' => ['EN' => 'Projects', 'SI' => 'ව්‍යාපෘති', 'TA' => 'திட்டங்கள்'],
    'branches_label' => ['EN' => 'Branches', 'SI' => 'ශාඛා', 'TA' => 'கிளைகள்'],
    'team_members' => ['EN' => 'Team Members', 'SI' => 'කණ්ඩායම් සාමාජිකයින්', 'TA' => 'அணி உறுப்பினர்கள்'],
    'view_all_services' => ['EN' => 'View All Services', 'SI' => 'සියලුම සේවාවන් බලන්න', 'TA' => 'அனைத்து சேவைகளையும் காண்க'],
];

function t($key)
{
    global $TRANSLATIONS, $LANG;
    if (!isset($TRANSLATIONS[$key])) return $key;
    $lang = $LANG ?? ($_SESSION['lang'] ?? 'EN');
    if (isset($TRANSLATIONS[$key][$lang])) return $TRANSLATIONS[$key][$lang];
    // fallback to English
    return $TRANSLATIONS[$key]['EN'] ?? $key;
}

function html_lang_attr()
{
    $map = ['EN' => 'en', 'SI' => 'si', 'TA' => 'ta'];
    $lang = $_SESSION['lang'] ?? 'EN';
    return $map[$lang] ?? 'en';
}

?>
