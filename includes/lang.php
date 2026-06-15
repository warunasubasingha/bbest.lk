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
