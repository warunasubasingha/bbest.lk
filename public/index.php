<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/lang.php';

// Handle language selection via GET or POST
if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    if(in_array($lang, ['EN','SI','TA'])){
        $_SESSION['lang'] = $lang;
    }
}

// Default language
$currentLang = $_SESSION['lang'] ?? 'EN';

// Get logged-in user data
$user = null;
if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT u.*, p.display_name, p.profile_image AS custom_image FROM users u LEFT JOIN user_profiles p ON p.user_id = u.id WHERE u.id = ? LIMIT 1");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="<?= htmlspecialchars(html_lang_attr()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
    <title><?= htmlspecialchars(t('home_title')) ?></title>
    <style>
      #d1000 {background: linear-gradient(to bottom, var(--dark-blue), var(--light-blue));}
      #d1000 > span {color: #fefefe;}
    </style>
</head>
<body>
  <!-- header -->
<header class="top-header" id="topHeader">
  <div class="w topbar">
    <!-- Left -->
     <div class="fsb">
      <button class="icon-btn menu-btn" id="menuToggle" type="button" aria-label="Open menu">
      ☰
    </button>
    <!-- Language dropdown -->
    <div class="lang-dd" id="langDd">
      <button class="lang-btn" id="langBtn" type="button" aria-expanded="false">
        <span id="langCurrent"><?= htmlspecialchars($currentLang) ?></span>
        <span class="lang-caret">▾</span>
      </button>

      <div class="lang-menu" id="langMenu" role="menu" aria-hidden="true">
        <a href="?lang=EN" class="lang-item" role="menuitem">EN</a>
        <a href="?lang=SI" class="lang-item" role="menuitem">සි</a>
        <a href="?lang=TA" class="lang-item" role="menuitem">தமி</a>
      </div>
    </div>

     </div>
    
    <!-- Middle -->
    <a class="brand" href="index.php" aria-label="<?= htmlspecialchars(t('home_title')) ?>">
      <img src="img/bbest_logo.webp" alt="Bbest.lk Logo">
    </a>

    <!-- Right -->
    <div class="topbar-right">
      <button class="icon-btn search-btn" id="searchToggle" type="button" aria-label="<?= htmlspecialchars(t('search')) ?>" aria-expanded="false">
        <img src="img/icons/search.svg" alt="">
      </button>

      <?php if ($user): ?>
        <?php 
          $profilePic = $user['profile_image'] ?? $user['custom_image'] ?? 'img/man.webp';
          $targetProfilePage = ($user['user_type'] === 'company') ? 'company-profile.php' : 'customer-profile.php';
        ?>
        <a class="profile-btn" href="<?= htmlspecialchars($targetProfilePage) ?>" aria-label="View Profile">
          <img src="<?= htmlspecialchars($profilePic) ?>" alt="Profile" style="border-radius: 50%; object-fit: cover;">
        </a>
      <?php else: ?>
        <button class="profile-btn" id="loginPopupOpen" type="button" aria-label="<?= htmlspecialchars(t('login_or_signup')) ?>">
          <img src="img/man.webp" alt="Profile">
        </button>
      <?php endif; ?>
    </div>
  </div>

  <!-- pop up sign up -->
   <!-- Login / Sign Up Popup -->
<div class="login-modal" id="loginModal" aria-hidden="true">
  <div class="login-backdrop" id="loginBackdrop"></div>

  <div class="login-card" role="dialog" aria-modal="true">
    <button class="login-close" id="loginClose" type="button" aria-label="Close">✕</button>

    <div class="login-logo">
      <img src="img/bbest_logo.webp" alt="Bbest.lk Logo">
    </div>

    <h3 class="login-title"><?= htmlspecialchars(t('login_or_signup')) ?></h3>
    <p class="login-subtitle"><?= htmlspecialchars(t('search')) ?> <?= htmlspecialchars(t('home_title')) ?></p>

    <button class="login-option phone-login" type="button">
      <span class="login-icon">✉</span>
      <span><?= htmlspecialchars(t('continue_with_email')) ?></span>
    </button>


    <button class="login-option phone-login" type="button">
      <span class="login-icon">☎</span>
      <span><?= htmlspecialchars(t('continue_with_phone')) ?></span>
    </button>

    <button class="login-option register-btn" type="button" onclick="openRegister()">
      <span class="login-icon">📝</span>
      <span><?= htmlspecialchars(t('register_new_account')) ?></span>
    </button>

    <p class="login-note">
      <?= htmlspecialchars(t('terms_privacy')) ?>
    </p>
  </div>

  <div id="registerModal" class="register-modal">
  <div class="register-card">

    <button class="close-btn" onclick="closeRegister()">✕</button>

    <h2>Register Account</h2>

    <!-- STEP 1 -->
    <div id="step1">
      <input type="text" id="emailPhone" placeholder="Email or Phone">

      <button onclick="sendOTP()">Get Code</button>
    </div>

    <!-- STEP 2 -->
    <div id="step2" style="display:none;">
      <input type="text" id="otp" placeholder="Enter Code">
      <button onclick="verifyOTP()">Verify</button>
    </div>

    <!-- STEP 3 -->
    <div id="step3" style="display:none;">
      <input type="password" id="password" placeholder="Password">
      <input type="password" id="confirmPassword" placeholder="Confirm Password">

      <select id="userType">
        <option value="owner">Owner</option>
        <option value="agent">Agent</option>
        <option value="company">Company</option>
      </select>

      <button onclick="registerUser()">Register</button>
    </div>

  </div>
</div>
</div>

  <!-- Search drawer -->
  <div class="search-drawer" id="searchDrawer" aria-hidden="true">
    <div class="w search-inner">
      <div class="search-box">
        <input id="searchInput" type="text" placeholder="<?= htmlspecialchars(t('search')) ?>..." autocomplete="off">
        <button class="search-go" id="searchGo" type="button" aria-label="Go">
          <img src="img/icons/search.svg" alt="">
        </button>
      </div>
    </div>
  </div>

  <!-- Category row + Language dropdown (RIGHT) -->
  <div class="cat-row">
    <div class="w cat-row-inner">

      <nav class="cat-nav" aria-label="Categories">
        <a class="cat-item" id="d1000" href="index.php">
          <img src="img/icons/1.png" alt="">
          <span><?= htmlspecialchars(t('property')) ?></span>
        </a>

        <a class="cat-item" id="d1001" href="vehicle.php">
          <img src="img/icons/2.png" alt="">
          <span><?= htmlspecialchars(t('vehicles')) ?></span>
        </a>

        <a class="cat-item" href="property-services.php">
          <img src="img/icons/3.png" alt="">
          <span><?= htmlspecialchars(t('property_services')) ?></span>
        </a>

        <a class="cat-item" href="vehicle-services.php">
          <img src="img/icons/4.png" alt="">
          <span><?= htmlspecialchars(t('vehicle_service')) ?></span>
        </a>
      </nav>

      

    </div>
  </div>
</header>

<!-- stories -->
<section class="ad-area w">
  <div class="ad-wrap-stories">

    <!-- ALWAYS visible New Ad -->
    <div class="ad-card ad-new ad-new-sticky" onclick="openUploadModal()">
      <div class="ad-plus">+</div>
      <div class="ad-new-text">Add New Ad</div>
    </div>

    

    <!-- Stories slider -->
    <div class="ad-slider" id="adSlider">
      <div class="ad-track" id="adTrack">

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/man.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_1.webp" alt="Ad 1">
        </div>

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/women.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_2.webp" alt="Ad 2">
        </div>

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/man.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_1.webp" alt="Ad 3">
        </div>

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/women.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_2.webp" alt="Ad 4">
        </div>

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/man.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_1.webp" alt="Ad 5">
        </div>

        <div class="ad-card ad-slide">
          <a href="customer-profile.php" class="ad-profile"><img src="img/women.webp" alt="Customer"></a>
          <img class="ad-img" src="img/land_2.webp" alt="Ad 6">
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ✅ CATEGORY BAR (5 + More) + pill slideshow + dropdown list (10 dummy items) -->
<section class="cp">
  <div class="w">
    <div class="catbar" id="catBar">

      
      <!-- 5 visible categories -->
      <button class="cat-tile" type="button" data-cat="House">
        <span class="cat-ic"><img src="img/icons/house.svg" alt=""></span>
        <span class="cat-name">House</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile" type="button" data-cat="Land">
        <span class="cat-ic"><img src="img/icons/land.svg" alt=""></span>
        <span class="cat-name">Land</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile" type="button" data-cat="Apartment">
        <span class="cat-ic"><img src="img/icons/apartment.svg" alt=""></span>
        <span class="cat-name">Apartment</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile" type="button" data-cat="Commercial">
        <span class="cat-ic"><img src="img/icons/commercial.svg" alt=""></span>
        <span class="cat-name">Commercial</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Annex">
        <span class="cat-ic"><img src="img/icons/annex.svg" alt=""></span>
        <span class="cat-name">Annex</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <!-- EXTRA categories (hidden until More) -->
      <button class="cat-tile is-extra" type="button" data-cat="Villa">
        <span class="cat-ic"><img src="img/icons/villa.svg" alt=""></span>
        <span class="cat-name">Villa</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>
      
      <button class="cat-tile is-extra" type="button" data-cat="Office">
        <span class="cat-ic"><img src="img/icons/office.svg" alt=""></span>
        <span class="cat-name">Office</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Shop">
        <span class="cat-ic"><img src="img/icons/shop.svg" alt=""></span>
        <span class="cat-name">Shop</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Warehouse">
        <span class="cat-ic"><img src="img/icons/warehouse.svg" alt=""></span>
        <span class="cat-name">Warehouse</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Factory">
        <span class="cat-ic"><img src="img/icons/factory.svg" alt=""></span>
        <span class="cat-name">Factory</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Hotel / Guest House">
        <span class="cat-ic"><img src="img/icons/hotel.svg" alt=""></span>
        <span class="cat-name">Hotel</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Resort">
        <span class="cat-ic"><img src="img/icons/resort.svg" alt=""></span>
        <span class="cat-name">Resort</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Agricultural Land">
        <span class="cat-ic"><img src="img/icons/agricultural.svg" alt=""></span>
        <span class="cat-name">Agri Land</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <button class="cat-tile is-extra" type="button" data-cat="Other">
        <span class="cat-ic"><img src="img/icons/other_lands.svg" alt=""></span>
        <span class="cat-name">Other</span>
        <span class="cat-pill js-pill">For Sale</span>
      </button>

      <!-- MORE (always visible - first) -->
      <button class="cat-tile cat-more" id="catMoreBtn" type="button" aria-expanded="false">
        <span class="cat-ic">
          <!-- menu icon -->
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"/></svg>
        </span>
        <span class="cat-name">More</span>
        <span class="cat-pill">All</span>
      </button>
      

    </div>
  </div>
</section>

<!-- ✅ ONE shared popup (shows near clicked category) -->
<div class="catpop" id="catPop" aria-hidden="true">
  <div class="catpop-head">
    <div class="catpop-title" id="catPopTitle">Category</div>
    <button class="catpop-x" id="catPopClose" type="button" aria-label="Close">✕</button>
  </div>
  <div class="catpop-tabs" id="catPopTabs"></div>
  <div class="catpop-list" id="catPopList"></div>
</div>

<!-- Wanted Slider Row -->
<div class="wanted-row">
  <h3 class="want-title">Post Here Anything as you want</h3>
  <div class="wanted-bar" aria-label="Wanted vehicles">
    <!-- Always visible button -->
    <button class="wanted-btn" type="button">
      <span class="wanted-btn-text">Wanted</span>
    </button>

    <!-- Right side slider -->
    <div class="wanted-slider" id="wantedSlider">
      <div class="wanted-track" id="wantedTrack">
        <a href="my-wanted-property.php" class="wanted-card">
          <span class="wanted-thumb">
            <img src="img/icons/1.png" alt="Van">
          </span>
          <span class="wanted-name">02 Story House - For rent</span>
        </a>

        <a href="my-wanted-property.php" class="wanted-card">
          <span class="wanted-thumb">
            <img src="img/icons/land.svg" alt="Car">
          </span>
          <span class="wanted-name">Land - For Sale</span>
        </a>

        <a href="my-wanted-property.php" class="wanted-card">
          <span class="wanted-thumb">
            <img src="img/icons/apartment.svg" alt="Bus">
          </span>
          <span class="wanted-name">Apartment - For Sale</span>
        </a>

      </div>
    </div>
  </div>
</div>


<!-- Location List  and Fillter-->
<section class="filter-sec">
  <div class="w">
    <div class="filter-wrap">

      <!-- Location Button -->
      <div class="filter-row">
        <div class="fsb">
          <button class="loc-btn" id="locOpen" type="button" aria-expanded="false">
            <span class="loc-title"><?= htmlspecialchars(t('location')) ?></span>
            <span class="loc-value" id="locValue"><?= htmlspecialchars(t('select_district_city')) ?></span>
            <span class="loc-caret">▾</span>
          </button>

          <button class="filter-bottum">
            <img src="img/icons/23.png" alt="" class="filter-icon">
            <span><?= htmlspecialchars(t('filter')) ?></span>
          </button>
        </div>

        <!-- Location Panel (Accordion List) -->
        <div class="loc-panel" id="locPanel">
  
          <!-- Search input -->
          <div class="fcc loc-search">
            <input type="text" id="locSearch" placeholder="<?= htmlspecialchars(t('search_district_city')) ?>" autocomplete="off">
          </div>

          <ul class="dist-list" id="distList"></ul>

        </div>

        <div class="loc-panel" id="locPanel" aria-hidden="true">
          <ul class="dist-list" id="distList"></ul>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Location Pole -->
<section>
  <div class="w">
    <div class="loc-panel" id="locPanel">
      <ul class="dist-list" id="distList"></ul>
    </div>
  
    <!-- 2) KM Pole -->
    <div class="filter-row km-row" id="kmWrap">
  
      
      <div class="km-pole dual">
  
        <!-- base track + selected range -->
        <div class="km-track"></div>
        <div class="km-fill" id="kmFill"></div>
        
        <!-- 2 sliders -->
        <input class="km-range km-minR" id="kmMin" type="range" min="0" max="26" step="1" value="0">
        <input class="km-range km-maxR" id="kmMax" type="range" min="0" max="26" step="1" value="26">
        
        
        <!-- labels above dots -->
        <div class="km-bubble" id="minBubble">1km</div>
        <div class="km-bubble" id="maxBubble">15km</div>
        
      </div>
      <div class="km-labels">
        <span class="km-min">0km</span>
        <span class="km-max">25km</span>
      </div>
    </div>

  </div>
</section>

<!-- 3) Min / Max price -->
<section>
  <div class="filter-row price-row">
        <button class="price-field" id="minPriceBtn" type="button">
      <span class="price-label"><?= htmlspecialchars(t('min_price') ?? 'Min Price') ?></span>
      <span class="price-val" id="minPriceText">Any</span>
    </button>
  
    <button class="price-field" id="maxPriceBtn" type="button">
      <span class="price-label">Max Price</span>
      <span class="price-val" id="maxPriceText">Any</span>
    </button>
  </div>
</section>

<!-- PRICE POPUP (NEW) -->
<section>
  <div class="w pmodal" id="priceModal" aria-hidden="true">
    <div class="pmodal-backdrop" id="priceBackdrop"></div>
  
    <div class="pmodal-card" role="dialog" aria-modal="true" aria-labelledby="priceTitle">
      <div class="pmodal-top">
        <div class="pmodal-title" id="priceTitle"><?= htmlspecialchars(t('enter_price')) ?></div>
        <button class="pmodal-x" id="priceClose" type="button" aria-label="Close">✕</button>
      </div>
  
      <!-- Currency -->
      <div class="seg-row" role="group" aria-label="Currency">
        <button class="seg-btn is-active" type="button" data-cur="LKR">LKR</button>
        <button class="seg-btn" type="button" data-cur="USD">$</button>
      </div>
  
      <!-- Amount input -->
      <div class="pinput-wrap">
        <span class="pcur" id="curPrefix">LKR</span>
        <input
          id="priceInput"
          class="pinput"
          type="text"
          inputmode="numeric"
          autocomplete="off"
          placeholder="0"
        />
        <span class="psuf" id="unitSuffix">L</span>
      </div>
  
      <!-- Unit buttons -->
      <div class="unit-row" role="group" aria-label="Unit">
        <button class="unit-btn is-active" type="button" data-unit="L" data-name="Lak">Lak</button>
        <button class="unit-btn" type="button" data-unit="M" data-name="Million">Million</button>
        <button class="unit-btn" type="button" data-unit="C" data-name="Crore">Crore</button>
        <button class="unit-btn" type="button" data-unit="B" data-name="Billion">Billion</button>
      </div>
  
      <!-- Footer buttons -->
      <div class="pmodal-actions">
        <button class="btn-lite" id="priceReset" type="button"><?= htmlspecialchars(t('reset')) ?></button>
        <button class="btn-main" id="priceDone" type="button"><?= htmlspecialchars(t('done')) ?></button>
      </div>
    </div>
  </div>
</section>

<!-- post card -->
<section class="cp cp-bottom">
    
  <!--card-->
  <div class="w post-card-sketch">

    <!-- 1) MEDIA AREA -->
    <div class="pc-media">
      <div class="pc-img">

        <!-- IMAGE -->
        <img src="img/main_image.webp" alt="Ad Image" id="propertyImage">

        <!-- VIDEO -->
        <video id="propertyVideo" class="pc-video" controls>
          <source src="video/property/property-01.mp4" type="video/mp4">
        </video>

        <!-- 360 VIEW -->
        <iframe 
          id="property360"
          class="pc-360-view"
          src="https://kuula.co/share/L4dn9/collection/7H3yk?logo=1&info=0&logosize=54&fs=1&vr=1&sd=1&initload=0&thumbs=1"
          frameborder="0"
          allowfullscreen>
        </iframe>

      </div>

      <!-- Top left: user -->
      <div class="pc-user">
        <a href="customer-profile.php" class="pc-avatar">
          <img src="img/man.webp" alt="User">
        </a>

        <div class="pc-user-meta">
          <a href="customer-profile.php" class="pc-user-name">John Doe</a>
          <div class="pc-user-sub">
            <span class="pc-dot"></span>
            <span>Post ID 1234</span>
            <span class="pc-sep">•</span>
            <span>27 mins ago</span>
          </div>
        </div>
      </div>

      <!-- Bottom left: media icons + title -->
      <div class="pc-bottom-left">
        <div class="pc-media-icons">
          <!-- Photo -->
          <span class="pc-ic-badge" title="Photo" id="photoBtn">
            <svg viewBox="0 0 24 24" class="pc-ic" aria-hidden="true">
              <path d="M4 6h4l1-2h6l1 2h4a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm8 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2.2a2.8 2.8 0 1 1 0-5.6 2.8 2.8 0 0 1 0 5.6z"/>
            </svg>
          </span>

          <!-- Video -->
          <span class="pc-ic-badge" title="Video" id="videoBtn">
            <svg viewBox="0 0 24 24" class="pc-ic" aria-hidden="true">
              <path d="M3 6a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v3l5-3v12l-5-3v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6z"/>
            </svg>
          </span>

          <!-- 360 -->
          <span class="pc-360" id="view360Btn">360°</span>
        </div>
      </div>

      <!-- Bottom right: price -->
      <div class="pc-price">
        <span class="pc-price-label">LKR :</span>
        <span class="pc-price-val">100M</span>
      </div>
    </div>

    <!-- 2) DETAILS AREA -->
    <div class="pc-body">
      
      <div class="fsb">
        <div>
          <div class="fsb">
            <div><img src="img/location.png" alt="" class="location-image"></div>
            <span class="pc-title">Moratuwa - Lakshapathiya</span>
          </div>
          <!-- row: Perch + bed + bath + sqf -->
          <div class="purpose">
            <span class="purpose-idea">For Sale</span>
            <span>-</span>
            <span class="purpose-idea">Land</span>
          </div>
          <div class="pc-stats">
            <div class="pc-stat"><span class="pc-stat-lbl">Perch:</span> 10.95</div>
    
            <div class="pc-stat pc-stat-ic">
              <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
                <path d="M4 11V7a2 2 0 0 1 2-2h6a4 4 0 0 1 4 4v2h2a2 2 0 0 1 2 2v4h-2v-2H6v2H4v-6z"/>
              </svg>
              <span>3</span>
            </div>
    
            <div class="pc-stat pc-stat-ic">
              <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
                <path d="M7 3h10v2H7V3zm-1 4h12v11a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V7zm3 2v9h6V9H9z"/>
              </svg>
              <span>2</span>
            </div>
    
            <div class="pc-stat"><span class="pc-stat-lbl">Sqf:</span> 1830</div>
          </div>
          
          
          <!-- Visit time row -->
          <a href="single-property.php" class="fcc main-details">
             <span class="main-details-btn"><?= htmlspecialchars(t('view_details')) ?></span>
           </a>
        </div>
    
          <!-- Loan box + apply -->
          <div class="pc-loan-row">
            <div class="pc-loan-box">
              <div class="pc-loan-top">
                <span class="pc-loan-lbl">Loan</span>
    
                <button class="pc-loan-chip is-active" type="button">
                  <img src="img/icons/lolc.jpg" alt="">
                </button>
              </div>
    
              <div class="pc-loan-mid">
                <div class="pc-loan-month">Monthly</div>
                <div class="pc-loan-amt">Rs 245,000</div>
              </div>
    
              <a class="pc-apply" href="apply-loan.php"><?= htmlspecialchars(t('apply_now')) ?></a>
            </div>
          </div>
      </div>

     

      <!-- Action buttons -->
      <div class="fsb pc-actions">
        <button class="pc-btn" type="button"><?= htmlspecialchars(t('list_button')) ?></button>

        <a class="pc-btn pc-btn-call" href="tel:+94770000000">
          <img src="img/icons/call.svg" alt="" class="pc-btn-ic">
          <?= htmlspecialchars(t('call')) ?>
        </a>

        <a class="pc-btn pc-btn-whatsapp" href="https://wa.me/94770000000" target="_blank" rel="noopener">
          <img src="img/icons/whatsapp.svg" alt="" class="pc-btn-ic">
          <?= htmlspecialchars(t('whatsapp')) ?>
        </a>
      </div>

      <!-- Like / Comment / Share row -->
      <div class="pc-social">
        <button type="button" class="pc-social-btn fcc">
          <img src="img/icons/like.svg" alt="" class="pc-btn-ic">
          <span>Like</span>
        </button>
        <button type="button" class="pc-social-btn fcc">
          <img src="img/icons/comment.svg" alt="" class="pc-btn-ic">
          Comment
        </button>
        <button type="button" class="pc-social-btn fcc">
          <img src="img/icons/share.svg" alt="" class="pc-btn-ic">
          Share
        </button>
      </div>

    </div>
  </div>

</section>

<!-- Bottom Nav Footer -->
<footer class="bb-footer" aria-label="Bottom navigation">
  <nav class="w bb-nav">
    <div class="fsb ftd1">
      <a class="fcc bb-item is-active" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- home -->
          <img src="img/icons/home-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt">Home</span>
      </a>
  
      <a class="fcc bb-item" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- users -->
          <img src="img/icons/about-us-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt"><?= htmlspecialchars(t('about_us')) ?></span>
      </a>
  
      <a class="fcc bb-item" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- chat -->
          <img src="img/icons/about-web-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt"><?= htmlspecialchars(t('about_web')) ?></span>
      </a>
    </div>

    <!-- Center + button -->
    <button class="bb-center" type="button" aria-label="Add">
      <span class="bb-plus" aria-hidden="true">+</span>
    </button>

    <div class="fsb ftd1">
      <a class="fcc bb-item" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- list -->
          <img src="img/icons/list-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt"><?= htmlspecialchars(t('list')) ?></span>
      </a>
  
      <a class="fcc bb-item" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- bell -->
          <img src="img/icons/notification-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt"><?= htmlspecialchars(t('notification')) ?></span>
      </a>
  
      <a class="fcc bb-item" href="#">
        <span class="bb-ic" aria-hidden="true">
          <!-- message -->
          <img src="img/icons/message-footer.svg" alt="" class="footer-icon">
        </span>
        <span class="bb-txt"><?= htmlspecialchars(t('message')) ?></span>
      </a>
    </div>

  </nav>
</footer>

<!-- sign up -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const loginPopupOpen = document.getElementById("loginPopupOpen");
  const loginModal = document.getElementById("loginModal");
  const loginBackdrop = document.getElementById("loginBackdrop");
  const loginClose = document.getElementById("loginClose");

  function openLoginPopup() {
    if (!loginModal) return;
    loginModal.classList.add("open");
    loginModal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  function closeLoginPopup() {
    if (!loginModal) return;
    loginModal.classList.remove("open");
    loginModal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  if (loginPopupOpen) {
    loginPopupOpen.addEventListener("click", openLoginPopup);
  }

  if (loginClose) {
    loginClose.addEventListener("click", closeLoginPopup);
  }

  if (loginBackdrop) {
    loginBackdrop.addEventListener("click", closeLoginPopup);
  }

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeLoginPopup();
    }
  });

  const googleLoginBtn = document.querySelector(".google-login");
  const phoneLoginBtn = document.querySelector(".phone-login");

  if (googleLoginBtn) {
    googleLoginBtn.addEventListener("click", () => {
      alert("Google login coming soon");
      // window.location.href = "google-login.php";
    });
  }

  if (phoneLoginBtn) {
    phoneLoginBtn.addEventListener("click", () => {
      alert("Phone number login coming soon");
      // window.location.href = "phone-login.php";
    });
  }
});
</script>
<script>
window.onload = function () {
  google.accounts.id.initialize({
    client_id: "YOUR_GOOGLE_CLIENT_ID",
    callback: handleGoogleLogin
  });

  google.accounts.id.renderButton(
    document.getElementById("googleSignInBtn"),
    {
      theme: "outline",
      size: "large",
      width: 320,
      text: "continue_with"
    }
  );
};

function handleGoogleLogin(response) {
  const userData = parseJwt(response.credential);

  console.log("User ID:", userData.sub);
  console.log("Email:", userData.email);
  console.log("Name:", userData.name);
  console.log("Profile Image:", userData.picture);

  alert("Login Success: " + userData.email);

  // Example: show profile image in your header
  const profileImg = document.querySelector(".profile-btn img");
  if (profileImg && userData.picture) {
    profileImg.src = userData.picture;
  }

  // Example: save basic data in browser
  localStorage.setItem("user_email", userData.email);
  localStorage.setItem("user_name", userData.name);
  localStorage.setItem("user_picture", userData.picture);

  // Close popup after login
  const loginModal = document.getElementById("loginModal");
  if (loginModal) {
    loginModal.classList.remove("open");
    loginModal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  // Optional: redirect after login
  // window.location.href = "customer-profile.php";
}

function parseJwt(token) {
  const base64Url = token.split(".")[1];
  const base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
  const jsonPayload = decodeURIComponent(
    atob(base64)
      .split("")
      .map(function (c) {
        return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
      })
      .join("")
  );

  return JSON.parse(jsonPayload);
}
</script>


<!-- Register form -->


<script>
function openRegister(){
  document.getElementById("registerModal").style.display = "flex";
}

function closeRegister(){
  document.getElementById("registerModal").style.display = "none";
}

// STEP 1: SEND OTP
function sendOTP(){
  let val = document.getElementById("emailPhone").value.trim();
  if(!val){
    alert("Please enter an email or phone number");
    return;
  }

  fetch("register.php?action=send_otp", {
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:"emailPhone="+encodeURIComponent(val)
  })
  .then(res=>res.text())
  .then(data=>{
    if(data.startsWith("Error:")){
      alert(data.replace("Error: ", ""));
    } else {
      alert(data);
      document.getElementById("step1").style.display="none";
      document.getElementById("step2").style.display="block";
    }
  });
}

// STEP 2: VERIFY OTP
function verifyOTP(){
  let val = document.getElementById("emailPhone").value.trim();
  let otp = document.getElementById("otp").value.trim();
  if(!otp){
    alert("Please enter the verification code");
    return;
  }

  fetch("register.php?action=verify_otp", {
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:"emailPhone="+encodeURIComponent(val)+"&otp="+encodeURIComponent(otp)
  })
  .then(res=>res.text())
  .then(data=>{
    if(data.startsWith("Error:")){
      alert(data.replace("Error: ", ""));
    } else {
      alert(data);
      document.getElementById("step2").style.display="none";
      document.getElementById("step3").style.display="block";
    }
  });
}

// STEP 3: FINAL REGISTER
function registerUser(){
  let val = document.getElementById("emailPhone").value.trim();
  let pass = document.getElementById("password").value;
  let cpass = document.getElementById("confirmPassword").value;
  let type = document.getElementById("userType").value;

  if(pass.length < 6){
    alert("Password must be at least 6 characters long");
    return;
  }

  if(pass !== cpass){
    alert("Passwords do not match");
    return;
  }

  fetch("register.php?action=final_register", {
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:"emailPhone="+encodeURIComponent(val)+"&password="+encodeURIComponent(pass)+"&type="+encodeURIComponent(type)
  })
  .then(res=>res.text())
  .then(data=>{
    if(data.startsWith("Error:")){
      alert(data.replace("Error: ", ""));
    } else {
      alert("Registration Successful!");
      closeRegister();
      window.location.reload();
    }
  });
}
</script>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", () => {

  /* =========================
     SEARCH DRAWER
  ========================= */
  const header = document.getElementById("topHeader");
  const searchToggle = document.getElementById("searchToggle");
  const searchDrawer = document.getElementById("searchDrawer");
  const searchInput = document.getElementById("searchInput");
  const searchGo = document.getElementById("searchGo");

  function openSearch(){
    if(!header || !searchToggle || !searchDrawer || !searchInput) return;

    header.classList.add("is-search-open");
    searchToggle.setAttribute("aria-expanded", "true");
    searchDrawer.setAttribute("aria-hidden", "false");

    setTimeout(() => searchInput.focus(), 80);
  }

  function closeSearch(){
    if(!header || !searchToggle || !searchDrawer) return;

    header.classList.remove("is-search-open");
    searchToggle.setAttribute("aria-expanded", "false");
    searchDrawer.setAttribute("aria-hidden", "true");
  }

  function doSearch(){
    if(!searchInput) return;

    const q = searchInput.value.trim();
    if(!q) return;

    alert("Searching: " + q);
    // window.location.href = `search.php?q=${encodeURIComponent(q)}`;
  }

  if(searchToggle){
    searchToggle.addEventListener("click", (e) => {
      e.stopPropagation();

      if(header && header.classList.contains("is-search-open")){
        closeSearch();
      }else{
        openSearch();
      }
    });
  }

  if(searchGo){
    searchGo.addEventListener("click", doSearch);
  }

  if(searchInput){
    searchInput.addEventListener("keydown", (e) => {
      if(e.key === "Enter") doSearch();
      if(e.key === "Escape") closeSearch();
    });
  }

  document.addEventListener("click", (e) => {
    if(!header) return;
    if(!header.classList.contains("is-search-open")) return;

    if(!header.contains(e.target)){
      closeSearch();
    }
  });



  /* =========================
     LANGUAGE DROPDOWN
  ========================= */
  const langDd = document.getElementById("langDd");
  const langBtn = document.getElementById("langBtn");
  const langMenu = document.getElementById("langMenu");
  const langCurrent = document.getElementById("langCurrent");

  const LANGS = [
    { code: "EN", label: "EN", google: "en" },
    { code: "SI", label: "සි", google: "si" },
    { code: "TA", label: "தமி", google: "ta" }
  ];

  function openLang(){
    if(!langDd || !langBtn || !langMenu) return;

    langDd.classList.add("is-open");
    langBtn.setAttribute("aria-expanded", "true");
    langMenu.setAttribute("aria-hidden", "false");
  }

  function closeLang(){
    if(!langDd || !langBtn || !langMenu) return;

    langDd.classList.remove("is-open");
    langBtn.setAttribute("aria-expanded", "false");
    langMenu.setAttribute("aria-hidden", "true");
  }

  function renderMenu(selectedCode){
    if(!langMenu) return;

    const others = LANGS.filter(lang => lang.code !== selectedCode);

    langMenu.innerHTML = others.map(lang => `
      <button class="lang-item" type="button" data-lang="${lang.code}">
        ${lang.label}
      </button>
    `).join("");

    langMenu.querySelectorAll(".lang-item").forEach(btn => {
      btn.addEventListener("click", (e) => {
        e.stopPropagation();
        setLanguage(btn.dataset.lang);
        closeLang();
      });
    });
  }

  function setLanguage(code){
    const chosen = LANGS.find(lang => lang.code === code) || LANGS[0];

    if(langCurrent){
      langCurrent.textContent = chosen.label;
    }

    localStorage.setItem("site_lang", chosen.code);
    renderMenu(chosen.code);

    changeGoogleLanguage(chosen.google);
  }

  function changeGoogleLanguage(lang){
    let tries = 0;

    const interval = setInterval(() => {
      const select = document.querySelector(".goog-te-combo");

      tries++;

      if(select){
        select.value = lang;
        select.dispatchEvent(new Event("change"));
        clearInterval(interval);
      }

      if(tries > 20){
        clearInterval(interval);
      }
    }, 300);
  }

  if(langBtn){
    langBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      if(langDd && langDd.classList.contains("is-open")){
        closeLang();
      }else{
        openLang();
      }
    });
  }

  document.addEventListener("click", () => closeLang());

  document.addEventListener("keydown", (e) => {
    if(e.key === "Escape"){
      closeSearch();
      closeLang();
    }
  });

  const savedLang = localStorage.getItem("site_lang") || "EN";
  setLanguage(savedLang);

});
</script>



<script>
/* =========================
   Category bar + More + pill slideshow (SMOOTH SLIDE) + popup (3 tabs)
   ✅ Updated: different subitems per category
========================= */

/* -------------------------
   ✅ Smooth sliding pill text
------------------------- */
const PILL_ROTATE = ["For Sale", "For Rent", "For Lease"];
const pillEls = Array.from(document.querySelectorAll(".js-pill"));
let pillIndex = 0;

pillEls.forEach(el => {
  if (!el.querySelector(".pill-inner")) {
    const inner = document.createElement("span");
    inner.className = "pill-inner";
    inner.textContent = (el.textContent || "").trim() || PILL_ROTATE[0];
    el.textContent = "";
    el.appendChild(inner);
  }
});

function rotatePillsSmooth(){
  pillIndex = (pillIndex + 1) % PILL_ROTATE.length;
  pillEls.forEach(el => {
    const inner = el.querySelector(".pill-inner");
    el.classList.add("is-anim");
    setTimeout(() => {
      inner.textContent = PILL_ROTATE[pillIndex];
      el.classList.remove("is-anim");
    }, 350);
  });
}
setInterval(rotatePillsSmooth, 2000);


/* -------------------------
   More expand/collapse
------------------------- */
const catBar = document.getElementById("catBar");
const catMoreBtn = document.getElementById("catMoreBtn");

catMoreBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  const expanded = catBar.classList.toggle("is-expanded");
  catMoreBtn.setAttribute("aria-expanded", expanded ? "true" : "false");
  catMoreBtn.querySelector(".cat-name").textContent = expanded ? "Less" : "More";
  catMoreBtn.querySelector(".cat-pill").textContent = expanded ? "Hide" : "All";
});


/* -------------------------
   Popup elements
------------------------- */
const catPop = document.getElementById("catPop");
const catPopTitle = document.getElementById("catPopTitle");
const catPopTabs = document.getElementById("catPopTabs");
const catPopList = document.getElementById("catPopList");
const catPopClose = document.getElementById("catPopClose");

const TABS = ["For Sale", "For Rent", "For Lease"];

let activeCat = "";
let activeTab = "For Sale";

/* -------------------------
   ✅ Different subcategories per main category
   (10 items each tab, and each tab can be different too)
------------------------- */
// ✅ Full subcategory dataset (as you requested) — use this as SUBCATS
const SUBCATS = {
  "House": {
    "For Sale": [
      "Single Storey House",
      "Two Storey House",
      "Three Storey House",
      "Luxury House",
      "Modern House",
      "Newly Built House",
      "Used / Pre-owned House",
      "Old House",
      "House with Land",
      "House with Shop / Commercial Front",
      "House with Separate Annex",
      "House (Incomplete / Under Construction)",
      "House (Facing Main Road)",
      "House (Corner Plot)",
      "Gated Community House",
      "Townhouse"
    ],
    "For Rent": [
      "Full House",
      "Family House",
      "Furnished House",
      "Semi Furnished House",
      "Unfurnished House",
      "Short Term House (Daily / Weekly)",
      "Long Term House (Monthly / Yearly)",
      "Upper Floor House",
      "Downstairs / Ground Floor House",
      "Shared House (Shared Kitchen/Facilities)"
    ],
    "For Lease": [
      "House Lease (Residential)",
      "House Lease (Commercial Use)",
      "Long Term Lease House (5–30 Years)"
    ]
  },

  "Land": {
    "For Sale": [
      "Residential Land",
      "Commercial Land",
      "Industrial Land",
      "Agricultural Land",
      "Bare Land / Plot",
      "Subdivided Plot / Lot",
      "Road Front Land",
      "Main Road Facing Land",
      "Corner Land",
      "Land with Building / Old House",
      "Beachfront Land",
      "River / Lake Side Land",
      "Hilltop / Scenic Land",
      "Investment Land"
    ],
    "For Rent": [
      "Land for Temporary Use",
      "Land for Parking",
      "Land for Storage / Yard",
      "Land for Events / Functions"
    ],
    "For Lease": [
      "Land Lease (Residential)",
      "Land Lease (Commercial)",
      "Land Lease (Industrial)",
      "Land Lease (Agricultural / Cultivation)",
      "Long Term Land Lease (5–99 Years)"
    ]
  },

  "Apartment / Condominium": {
    "For Sale": [
      "Studio Apartment",
      "1 Bedroom Apartment",
      "2 Bedroom Apartment",
      "3 Bedroom Apartment",
      "4+ Bedroom Apartment",
      "Condominium Unit",
      "Luxury Condominium",
      "Penthouse",
      "Duplex Apartment",
      "Serviced Apartment (Sale)"
    ],
    "For Rent": [
      "Studio (Rent)",
      "1 Bedroom (Rent)",
      "2 Bedroom (Rent)",
      "3 Bedroom (Rent)",
      "Furnished Apartment",
      "Semi Furnished Apartment",
      "Unfurnished Apartment",
      "Serviced Apartment (Rent)",
      "Short Stay Apartment (Daily/Weekly)",
      "Long Term Apartment (Monthly/Yearly)"
    ],
    "For Lease": [
      "Apartment Lease (Long Term)",
      "Condominium Lease (Long Term)",
      "Corporate Lease Apartment",
      "Serviced Apartment Lease"
    ]
  },

  "Commercial Property": {
    "For Sale": [
      "Commercial Building",
      "Office Building",
      "Shop Building",
      "Showroom Building",
      "Mixed-Use Building",
      "Commercial Land with Building",
      "Supermarket / Retail Space (Building)",
      "Restaurant / Cafe Property",
      "Hotel Building (Small)",
      "Business Premises (General)"
    ],
    "For Rent": [
      "Office Space",
      "Co-working / Shared Office",
      "Shop / Retail Space",
      "Showroom",
      "Restaurant / Cafe Space",
      "Commercial Hall / Function Space",
      "Bank / Finance Suitable Space",
      "Medical / Clinic Space",
      "Salon / Spa Space",
      "Ground Floor Commercial",
      "Upper Floor Commercial"
    ],
    "For Lease": [
      "Commercial Building Lease",
      "Long Term Shop Lease",
      "Long Term Office Lease",
      "Showroom Lease",
      "Restaurant Lease",
      "Business Lease (Turnkey Space)"
    ]
  },

  "Industrial Property": {
    "For Sale": [
      "Factory",
      "Warehouse",
      "Industrial Building",
      "Workshop",
      "Production / Manufacturing Unit",
      "Industrial Yard / Open Storage Yard",
      "Industrial Land (with Utilities)",
      "Cold Room / Cold Storage Facility"
    ],
    "For Rent": [
      "Warehouse Space",
      "Factory Space",
      "Workshop Space",
      "Industrial Yard (Rent)",
      "Cold Storage (Rent)"
    ],
    "For Lease": [
      "Factory Lease (Long Term)",
      "Warehouse Lease (Long Term)",
      "Industrial Yard Lease",
      "Industrial Land Lease",
      "Manufacturing Unit Lease"
    ]
  },

  "Villa": {
    "For Sale": [
      "Luxury Villa",
      "Beach Villa",
      "Lake / River Side Villa",
      "Garden Villa",
      "Holiday Villa",
      "Private Pool Villa",
      "Gated Community Villa"
    ],
    "For Rent": [
      "Holiday Villa (Daily)",
      "Short Term Villa (Daily/Weekly)",
      "Long Term Villa (Monthly/Yearly)",
      "Furnished Villa",
      "Pool Villa (Rent)",
      "Beach Villa (Rent)"
    ],
    "For Lease": [
      "Villa Lease (Long Term)",
      "Holiday Villa Lease (Seasonal/Long)"
    ]
  },

  "Hotel / Resort": {
    "For Sale": [
      "Hotel",
      "Resort",
      "Boutique Hotel",
      "Guest House",
      "Villa Hotel / Villa Collection",
      "Eco Resort / Eco Lodge",
      "Beach Resort",
      "Apartment Hotel / Serviced Residence",
      "Tourism Property (Operating Business)"
    ],
    "For Rent": [
      "Hotel (Rent Basis)",
      "Restaurant Area (Hotel)",
      "Banquet / Hall (Hotel)",
      "Rooms / Floors (Rent)",
      "Tourism Property (Rent)"
    ],
    "For Lease": [
      "Full Hotel Lease",
      "Resort Lease",
      "Guest House Lease",
      "Boutique Hotel Lease",
      "Management Lease / Operator Lease",
      "Restaurant Lease (Within Hotel/Resort)",
      "Banquet Hall Lease"
    ]
  },

  "Annex / Portion": {
    "For Sale": [
      "Annex (Separate Unit)",
      "Portion (Upper Floor)",
      "Portion (Downstairs)",
      "Duplex Portion",
      "House with Separate Portion (Deed/Unit)"
    ],
    "For Rent": [
      "Annex (Family)",
      "Annex (Single)",
      "Furnished Annex",
      "Semi Furnished Annex",
      "Unfurnished Annex",
      "Portion (Upper Floor) Rent",
      "Portion (Downstairs) Rent",
      "Short Term Annex (Daily/Weekly)",
      "Long Term Annex (Monthly/Yearly)"
    ],
    "For Lease": [
      "Annex Lease (Long Term)",
      "Portion Lease (Long Term)"
    ]
  },

  "Boarding / Hostel": {
    "For Sale": [
      "Hostel Building",
      "Boarding House",
      "Staff Quarters Building",
      "Student Accommodation Building"
    ],
    "For Rent": [
      "Boys Hostel",
      "Girls Hostel",
      "Mixed Hostel",
      "Student Boarding",
      "Worker Hostel",
      "Staff Accommodation",
      "Single Rooms (Boarding)",
      "Shared Rooms (Boarding)",
      "Bed Space / Sharing Basis"
    ],
    "For Lease": [
      "Hostel Lease (Building)",
      "Boarding House Lease",
      "Staff Quarters Lease",
      "Long Term Accommodation Lease"
    ]
  },

  "Agricultural Property": {
    "For Sale": [
      "Paddy Field",
      "Coconut Land",
      "Tea Estate",
      "Rubber Estate",
      "Cinnamon Land",
      "Pepper / Spice Land",
      "Fruit Farm / Orchard",
      "Farm Land (General)",
      "Plantation Land (General)",
      "Agricultural Land with House",
      "Agricultural Land with Well/Water Source"
    ],
    "For Rent": [
      "Cultivation Land (Short Term)",
      "Farm Land (Seasonal Rent)",
      "Agricultural Plot (Rent)"
    ],
    "For Lease": [
      "Agricultural Land Lease",
      "Paddy Field Lease",
      "Plantation Lease (Tea/Rubber/Coconut)",
      "Farm Lease (Long Term)",
      "Orchard Lease",
      "Livestock / Farm Yard Lease"
    ]
  },

  "New Development / Project": {
    "For Sale": [
      "Apartment Project Units",
      "Condominium Project Units",
      "Housing Scheme Units",
      "Townhouse Project Units",
      "Villa Project Units",
      "Land Development Plots (Project)",
      "Off-Plan Units",
      "Ready-to-Move Units"
    ],
    "For Rent": [
      "Project Rental Units",
      "Brand-New Unit for Rent",
      "Serviced Residence (Project) Rent"
    ],
    "For Lease": [
      "Project Lease Units (Long Term)",
      "Commercial Units in Project (Lease)",
      "Shop/Office Units in Project (Lease)",
      "Bulk Lease (Multiple Units)"
    ]
  }
};

/* ✅ Helper to safely get items per category + tab */
function getItemsFor(activeCat, activeTab){
  const catObj = SUBCATS[activeCat];
  if(catObj && Array.isArray(catObj[activeTab]) && catObj[activeTab].length){
    return catObj[activeTab]; // return all items (not limited)
  }
  return []; // if missing
}


// fallback if category not found
function makeDummyItems(tabName){
  return Array.from({length: 10}).map((_, i) => `${tabName} - Item ${i+1}`);
}

// ✅ NEW: get subitems by selected category + tab
function getItemsFor(activeCat, activeTab){
  const catObj = SUBCATS[activeCat];
  if(catObj && catObj[activeTab] && catObj[activeTab].length){
    return catObj[activeTab].slice(0, 10);
  }
  return makeDummyItems(activeTab);
}

// Render tabs + list
function renderPopup(){
  catPopTabs.innerHTML = "";
  TABS.forEach(t => {
    const b = document.createElement("button");
    b.type = "button";
    b.className = "cattab" + (t === activeTab ? " is-active" : "");
    b.textContent = t;
    b.addEventListener("click", (e) => {
      e.stopPropagation();
      activeTab = t;
      renderPopup();
    });
    catPopTabs.appendChild(b);
  });

  catPopList.innerHTML = "";
  getItemsFor(activeCat, activeTab).forEach(txt => {
    const btn = document.createElement("button");
    btn.type = "button";
    btn.className = "catpop-item";
    btn.textContent = txt;
    btn.addEventListener("click", () => {
      console.log("Selected:", activeCat, activeTab, txt);
      closePop();
    });
    catPopList.appendChild(btn);
  });
}

function openPopForButton(btn){
  activeCat = btn.dataset.cat || "Category";
  activeTab = "For Sale";
  catPopTitle.textContent = activeCat;

  renderPopup();

  const r = btn.getBoundingClientRect();
  catPop.classList.add("open");
  catPop.setAttribute("aria-hidden", "false");

  const popW = catPop.offsetWidth;
  const popH = catPop.offsetHeight;

  let left = r.left + (r.width / 2) - (popW / 2);
  left = Math.max(8, Math.min(left, window.innerWidth - popW - 8));

  let top = r.bottom + 8;
  if(top + popH > window.innerHeight - 8){
    top = r.top - popH - 8;
    top = Math.max(8, top);
  }

  catPop.style.left = left + "px";
  catPop.style.top  = top  + "px";
}

function closePop(){
  catPop.classList.remove("open");
  catPop.setAttribute("aria-hidden", "true");
}

catBar.addEventListener("click", (e) => {
  const btn = e.target.closest(".cat-tile");
  if(!btn) return;
  if(btn.id === "catMoreBtn") return;

  if(catPop.classList.contains("open") && activeCat === (btn.dataset.cat || "")){
    closePop();
    return;
  }

  openPopForButton(btn);
});

catPopClose.addEventListener("click", closePop);
document.addEventListener("click", (e) => {
  if(!catPop.classList.contains("open")) return;
  if(catPop.contains(e.target)) return;
  if(catBar.contains(e.target)) return;
  closePop();
});
document.addEventListener("keydown", (e) => {
  if(e.key === "Escape") closePop();
});

window.addEventListener("resize", () => {
  if(catPop.classList.contains("open")) closePop();
});
window.addEventListener("scroll", () => {
  if(catPop.classList.contains("open")) closePop();
}, {passive:true});
</script>




<script>
/* =========================
   LOCATION UI (Accordion) - JS
   Option B - Clean & Working
========================= */

/* 1) District -> Cities Database */
const SL = {
  "Colombo": [
    "Colombo","Pettah","Fort","Borella","Rajagiriya","Nugegoda","Maharagama","Kotte",
    "Battaramulla","Wellawatte","Dehiwala","Mount Lavinia","Ratmalana","Kolonnawa",
    "Angoda","Mulleriyawa","Malabe","Homagama","Kaduwela","Athurugiriya",
    "Pannipitiya","Kahathuduwa","Moratuwa","Piliyandala"
  ],
  "Gampaha": [
    "Gampaha","Negombo","Katunayake","Wattala","Ja-Ela","Ragama","Kelaniya",
    "Kiribathgoda","Kadawatha","Delgoda","Dompe","Mirigama","Minuwangoda",
    "Nittambuwa","Veyangoda","Seeduwa","Ekala","Kandana","Hendala"
  ],
  "Kalutara": [
    "Kalutara","Panadura","Wadduwa","Horana","Bandaragama","Mathugama",
    "Aluthgama","Beruwala","Payagala","Ingiriya","Bulathsinhala","Millaniya"
  ],
  "Kandy": [
    "Kandy","Peradeniya","Katugastota","Kundasale","Gampola","Nawalapitiya",
    "Akurana","Poojapitiya","Digana","Menikhinna","Galagedara"
  ],
  "Matale": ["Matale","Dambulla","Sigiriya","Rattota","Ukuwela","Pallepola"],
  "Nuwara Eliya": ["Nuwara Eliya","Hatton","Talawakele","Lindula","Ragala","Kotagala","Maskeliya"],
  "Galle": ["Galle","Hikkaduwa","Unawatuna","Ahangama","Weligama","Ambalangoda","Baddegama","Elpitiya","Karapitiya"],
  "Matara": ["Matara","Weligama","Mirissa","Akuressa","Deniyaya","Hakmana","Kamburupitiya"],
  "Hambantota": ["Hambantota","Tangalle","Tissamaharama","Ambalantota","Weeraketiya","Beliatta","Lunugamvehera"],
  "Kurunegala": ["Kurunegala","Kuliyapitiya","Narammala","Pannala","Polgahawela","Wariyapola","Ibbagamuwa","Melsiripura"],
  "Puttalam": ["Puttalam","Chilaw","Wennappuwa","Marawila","Dankotuwa","Anamaduwa","Mundel"],
  "Anuradhapura": ["Anuradhapura","Kekirawa","Mihintale","Medawachchiya","Thambuttegama","Galenbindunuwewa"],
  "Polonnaruwa": ["Polonnaruwa","Hingurakgoda","Medirigiriya","Kaduruwela"],
  "Badulla": ["Badulla","Bandarawela","Ella","Hali-Ela","Mahiyanganaya","Passara","Diyatalawa"],
  "Monaragala": ["Monaragala","Wellawaya","Buttala","Bibile","Kataragama"],
  "Ratnapura": ["Ratnapura","Balangoda","Embilipitiya","Pelmadulla","Kuruwita","Godakawela"],
  "Kegalle": ["Kegalle","Mawanella","Warakapola","Rambukkana","Ruwanwella","Dehiowita"],
  "Jaffna": ["Jaffna","Nallur","Chavakachcheri","Point Pedro","Velanai"],
  "Kilinochchi": ["Kilinochchi","Pooneryn"],
  "Mannar": ["Mannar","Madhu"],
  "Mullaitivu": ["Mullaitivu"],
  "Vavuniya": ["Vavuniya"],
  "Trincomalee": ["Trincomalee","Kinniya","Kantale","Nilaveli"],
  "Batticaloa": ["Batticaloa","Eravur","Kalkudah","Pasikudah"],
  "Ampara": ["Ampara","Kalmunai","Akkaraipattu","Sammanthurai"]
};

/* 2) Elements */
const locOpen   = document.getElementById("locOpen");
const locPanel  = document.getElementById("locPanel");
const distList  = document.getElementById("distList");
const locValue  = document.getElementById("locValue");
const locSearch = document.getElementById("locSearch");

/* 3) State */
let openDistrict = "";
let selectedDistrict = "";
let selectedCity = "";

/* 4) Open/Close panel */
function openLoc(){
  locPanel.classList.add("open");
  locPanel.setAttribute("aria-hidden","false");
  locOpen.setAttribute("aria-expanded","true");
  setTimeout(()=> locSearch?.focus(), 80);
}
function closeLoc(){
  locPanel.classList.remove("open");
  locPanel.setAttribute("aria-hidden","true");
  locOpen.setAttribute("aria-expanded","false");
}

/* Toggle panel */
locOpen.addEventListener("click", (e)=>{
  e.stopPropagation();
  locPanel.classList.contains("open") ? closeLoc() : openLoc();
});

/* Close when clicking outside */
document.addEventListener("click", ()=>{
  if(locPanel.classList.contains("open")) closeLoc();
});

/* Prevent inside clicks closing */
locPanel.addEventListener("click", (e)=> e.stopPropagation());

/* Helpers */
function norm(s){ return String(s || "").toLowerCase().trim(); }

/* 5) Render accordion with optional filter */
function renderAccordion(filterText = ""){
  distList.innerHTML = "";

  const q = norm(filterText);

  Object.keys(SL).forEach((district) => {
    const distMatch = q && norm(district).includes(q);

    // filter cities
    let cities = SL[district];
    let filteredCities = cities;

    if(q && !distMatch){
      filteredCities = cities.filter(c => norm(c).includes(q));
      if(filteredCities.length === 0) return; // no match at all
    }

    const li = document.createElement("li");
    const shouldOpen = q ? true : (openDistrict === district);
    li.className = "dist-item" + (shouldOpen ? " open" : "");

    /* District Button */
    const btn = document.createElement("button");
    btn.type = "button";
    btn.className = "dist-btn";
    btn.innerHTML = `<span>${district}</span><span class="caret">▾</span>`;

    btn.addEventListener("click", ()=>{
      // in search mode keep open
      if(q) return;

      openDistrict = (openDistrict === district) ? "" : district;
      renderAccordion(locSearch?.value || "");
    });

    /* Cities List */
    const cityUl = document.createElement("ul");
    cityUl.className = "city-ul";

    filteredCities.forEach((city) => {
      const cityLi = document.createElement("li");
      cityLi.className = "city-li" + ((selectedDistrict === district && selectedCity === city) ? " active" : "");
      cityLi.textContent = city;

      cityLi.addEventListener("click", ()=>{
        selectedDistrict = district;
        selectedCity = city;

        locValue.textContent = `${district} - ${city}`;
        openDistrict = district;

        closeLoc();
        renderAccordion(locSearch?.value || "");
      });

      cityUl.appendChild(cityLi);
    });

    li.appendChild(btn);
    li.appendChild(cityUl);
    distList.appendChild(li);
  });

  // If nothing found
  if(!distList.children.length){
    distList.innerHTML = `<li style="padding:14px;color:#6d7a88;font-weight:600;">No results</li>`;
  }
}

/* 6) Search event */
locSearch.addEventListener("input", () => {
  renderAccordion(locSearch.value);
});

/* Init */
renderAccordion();






/* =========================
   2) KM Slider (Dual Range)
========================= */
const KM_POINTS = [
  0, 0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9,
  1,2,3,4,5,6,7,8,9,10,12,14,16,18,20,22,25
]; // index 0..26 (27 points)

const kmWrap    = document.getElementById("kmWrap");
const kmMin     = document.getElementById("kmMin");
const kmMax     = document.getElementById("kmMax");
const kmFill    = document.getElementById("kmFill");
const minBubble = document.getElementById("minBubble");
const maxBubble = document.getElementById("maxBubble");

let lockTimer = null;

/* format: 0 => 0km, 0.1 => 100m, 1 => 1km */
function fmt(v){
  if (typeof v !== "number" || Number.isNaN(v)) return "0km";
  if (v === 0) return "0km";
  if (v < 1) return `${Math.round(v * 1000)}m`;
  return `${v}km`;
}

function clampIndex(i){
  const n = Number(i);
  if (Number.isNaN(n)) return 0;
  return Math.max(0, Math.min(KM_POINTS.length - 1, n));
}

/* bubble text + arrows based on position */
function setBubble(bubbleEl, pct, labelText){
  bubbleEl.innerHTML = `
    <span class="arr l">&lt;</span>
    <span class="lbl">${labelText}</span>
    <span class="arr r">&gt;</span>
  `;

  // reset classes
  bubbleEl.classList.remove("only-left", "only-right");

  // edges: show only one arrow
  if (pct <= 18) {
    bubbleEl.classList.add("only-right"); // show >
  } else if (pct >= 82) {
    bubbleEl.classList.add("only-left");  // show <
  }
}

/* keep bubbles inside pole on small screens */
function clampBubblesMobile(minPct, maxPct){
  if (!window.matchMedia("(max-width: 500px)").matches) return;

  const pole = kmWrap.querySelector(".km-pole.dual");
  if (!pole) return;

  const pad = 10;
  const poleW = pole.getBoundingClientRect().width;

  const minW = minBubble.offsetWidth || 0;
  const maxW = maxBubble.offsetWidth || 0;

  // convert % -> px inside pole
  const minCenterPx = (minPct / 100) * poleW;
  const maxCenterPx = (maxPct / 100) * poleW;

  // clamp center positions (because bubble uses translateX(-50%))
  const minClamped = Math.max(pad + (minW/2), Math.min(poleW - pad - (minW/2), minCenterPx));
  const maxClamped = Math.max(pad + (maxW/2), Math.min(poleW - pad - (maxW/2), maxCenterPx));

  minBubble.style.left = `${minClamped}px`;
  maxBubble.style.left = `${maxClamped}px`;
}

function updateRange(){
  // get indices
  let a = clampIndex(kmMin.value);
  let b = clampIndex(kmMax.value);

  // keep min <= max
  if(a > b){
    const tmp = a; a = b; b = tmp;
    kmMin.value = a;
    kmMax.value = b;
  }

  const lastIndex = KM_POINTS.length - 1; // 26
  const minPct = (a / lastIndex) * 100;
  const maxPct = (b / lastIndex) * 100;

  // range fill
  kmFill.style.left  = `${minPct}%`;
  kmFill.style.width = `${maxPct - minPct}%`;

  // values (never undefined)
  const minVal = KM_POINTS[a] ?? 0;
  const maxVal = KM_POINTS[b] ?? 25;

  // bubble labels + arrows
  setBubble(minBubble, minPct, fmt(minVal));
  setBubble(maxBubble, maxPct, fmt(maxVal));

  // default bubble positions by %
  minBubble.style.left = `${minPct}%`;
  maxBubble.style.left = `${maxPct}%`;

  // ✅ under 500px keep inside with 10px padding
  clampBubblesMobile(minPct, maxPct);

  // after 2 seconds, only change bar color
  kmWrap.classList.remove("is-after2s");
  clearTimeout(lockTimer);
  lockTimer = setTimeout(() => {
    kmWrap.classList.add("is-after2s");
  }, 2000);
}

// Events
kmMin.addEventListener("input", updateRange);
kmMax.addEventListener("input", updateRange);

// Re-clamp on resize (important when rotate phone)
window.addEventListener("resize", () => updateRange());

// ✅ first load: 0km and 25km
kmMin.value = 0;
kmMax.value = KM_POINTS.length - 1;
updateRange();

// ===== Price Modal v2 (Min/Max) =====
// =====================
// PRICE MODAL (Fixed JS)
// =====================
document.addEventListener("DOMContentLoaded", () => {

  // Elements
  const priceModal     = document.getElementById("priceModal");
  const priceBackdrop  = document.getElementById("priceBackdrop");
  const priceClose     = document.getElementById("priceClose");
  const priceInput     = document.getElementById("priceInput");
  const priceDone      = document.getElementById("priceDone");
  const priceReset     = document.getElementById("priceReset");

  const minPriceBtn    = document.getElementById("minPriceBtn");
  const maxPriceBtn    = document.getElementById("maxPriceBtn");
  const minPriceText   = document.getElementById("minPriceText");
  const maxPriceText   = document.getElementById("maxPriceText");

  const curPrefix      = document.getElementById("curPrefix");
  const unitSuffix     = document.getElementById("unitSuffix");

  const curBtns  = [...document.querySelectorAll(".seg-btn")];
  const unitBtns = [...document.querySelectorAll(".unit-btn")];

  // State
  let activeTarget = "min";   // "min" | "max"
  let selectedCur  = "LKR";   // default currency
  let selectedUnit = "";      // default NO unit

  // Safe set UI helpers
  function setCurrency(cur){
    selectedCur = cur;
    if(curPrefix) curPrefix.textContent = (cur === "USD") ? "$" : "LKR";

    curBtns.forEach(b => b.classList.toggle("is-active", b.dataset.cur === cur));
  }

  function setUnit(unit){
    selectedUnit = unit || "";
    if(unitSuffix) unitSuffix.textContent = selectedUnit;

    // active button only if unit exists
    unitBtns.forEach(b => b.classList.toggle("is-active", b.dataset.unit === selectedUnit));
  }

  // Parse text like: "LKR 120M", "$ 200L", "Any"
  function loadFromText(text){
    const t = (text || "").trim();
    if(!t || t.toLowerCase() === "any"){
      priceInput.value = "";
      setCurrency("LKR"); // keep default
      setUnit("");        // no unit
      return;
    }

    // Currency
    if(t.startsWith("$")) setCurrency("USD");
    else setCurrency("LKR");

    // Extract number + suffix
    // Examples: "LKR 120M", "$ 1500", "LKR 250L"
    const numMatch = t.match(/(\d+)/);
    priceInput.value = numMatch ? numMatch[1] : "";

    const unitMatch = t.match(/([LMCB])\s*$/);
    setUnit(unitMatch ? unitMatch[1] : "");
  }

  function openPriceModal(target){
    if(!priceModal) return;

    activeTarget = target;
    priceModal.classList.add("open");
    priceModal.setAttribute("aria-hidden", "false");

    // Load current value into modal
    const currentText = (target === "min") ? minPriceText?.textContent : maxPriceText?.textContent;
    loadFromText(currentText);

    setTimeout(() => priceInput?.focus(), 80);
  }

  function closePriceModal(){
    if(!priceModal) return;
    priceModal.classList.remove("open");
    priceModal.setAttribute("aria-hidden", "true");
  }

  // Allow only numbers
  if(priceInput){
    priceInput.addEventListener("input", () => {
      priceInput.value = priceInput.value.replace(/\D/g, "");
    });
  }

  // Currency buttons
  curBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      setCurrency(btn.dataset.cur || "LKR");
    });
  });

  // Unit buttons
  unitBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      setUnit(btn.dataset.unit || "");
    });
  });

  // Open modal (min/max)
  minPriceBtn?.addEventListener("click", () => openPriceModal("min"));
  maxPriceBtn?.addEventListener("click", () => openPriceModal("max"));

  // Close actions
  priceBackdrop?.addEventListener("click", closePriceModal);
  priceClose?.addEventListener("click", closePriceModal);

  // RESET button
  priceReset?.addEventListener("click", () => {
    if(priceInput) priceInput.value = "";
    setCurrency("LKR");
    setUnit(""); // no unit selected
    setTimeout(() => priceInput?.focus(), 50);
  });

  // DONE button
  priceDone?.addEventListener("click", () => {
    const num = (priceInput?.value || "").trim();

    // Empty = Any
    if(!num){
      if(activeTarget === "min" && minPriceText) minPriceText.textContent = "Any";
      if(activeTarget === "max" && maxPriceText) maxPriceText.textContent = "Any";
      closePriceModal();
      return;
    }

    const prefix = (selectedCur === "USD") ? "$" : "LKR";
    const suffix = selectedUnit ? selectedUnit : "";
    const out = `${prefix} ${num}${suffix}`;

    if(activeTarget === "min" && minPriceText) minPriceText.textContent = out;
    if(activeTarget === "max" && maxPriceText) maxPriceText.textContent = out;

    closePriceModal();
  });

  // ESC close
  document.addEventListener("keydown", (e) => {
    if(e.key === "Escape") closePriceModal();
  });

  // Initial UI state (important)
  setCurrency("LKR");
  setUnit(""); // ❗ no default unit

});
</script>

<script>
/* =========================
   CATEGORY AUTO SLIDER
========================= */

const catSlider = document.getElementById("catSlider");
const catNav = document.getElementById("catNav");

// 1) Duplicate items for smooth infinite loop
catNav.innerHTML += catNav.innerHTML;

// 2) Auto scroll speed
let catPos = 0;
let catSpeed = 0.5; // slower = smoother

function autoSlideCat(){
  catPos += catSpeed;
  catNav.style.transform = `translateX(-${catPos}px)`;

  // When first half moved out → reset position
  if (catPos >= catNav.scrollWidth / 2) {
    catPos = 0;
  }

  requestAnimationFrame(autoSlideCat);
}

autoSlideCat();

/* Pause on hover (desktop) */
catSlider.addEventListener("mouseenter", () => catSpeed = 0);
catSlider.addEventListener("mouseleave", () => catSpeed = 0.5);

/* Pause on mobile swipe */
catSlider.addEventListener("touchstart", () => catSpeed = 0);
catSlider.addEventListener("touchend", () => catSpeed = 0.5);


</script>

<script>
  // 6) Price toggle: default LKR, click shows USD
  const priceToggle = document.getElementById("priceToggle");
  const priceCurrency = document.getElementById("priceCurrency");
  const priceValue = document.getElementById("priceValue");

  // Example base prices (replace with real data)
  const LKR_TEXT = "100M";      // you can also store numeric
  const USD_TEXT = "$ 312,000"; // example

  let isUSD = false;

  priceToggle?.addEventListener("click", () => {
    isUSD = !isUSD;
    if(isUSD){
      priceCurrency.textContent = "USD";
      priceValue.textContent = USD_TEXT;
    }else{
      priceCurrency.textContent = "LKR";
      priceValue.textContent = LKR_TEXT;
    }
  });
</script>

<script>
const priceToggle = document.getElementById("priceToggle");
const priceCurrency = document.getElementById("priceCurrency");
const priceValue   = document.getElementById("priceValue");

const LKR_TEXT = "100M";
const USD_TEXT = "$312K";

let isUSD = false;

priceToggle?.addEventListener("click", ()=>{
    isUSD = !isUSD;
    if(isUSD){
        priceCurrency.textContent = "USD";
        priceValue.textContent = USD_TEXT;
    } else {
        priceCurrency.textContent = "LKR";
        priceValue.textContent = LKR_TEXT;
    }
});
</script>

<script>
  const actions = document.querySelector(".post-actions.v2");
  const commentBox = document.getElementById("commentBox");
  const commentInput = document.getElementById("commentInput");
  const toast = document.getElementById("toast");

  function showToast(msg="Link copied"){
    toast.textContent = msg;
    toast.classList.add("show");
    clearTimeout(showToast._t);
    showToast._t = setTimeout(()=> toast.classList.remove("show"), 1400);
  }

  async function copyText(text){
    try{
      await navigator.clipboard.writeText(text);
      return true;
    }catch(e){
      // fallback
      const ta = document.createElement("textarea");
      ta.value = text;
      document.body.appendChild(ta);
      ta.select();
      const ok = document.execCommand("copy");
      document.body.removeChild(ta);
      return ok;
    }
  }

  document.querySelectorAll(".post-actions.v2 .act-btn").forEach(btn=>{
    btn.addEventListener("click", async ()=>{
      const type = btn.dataset.act;

      // SAVE + LIKE => toggle + color change
      if(type === "save" || type === "like"){
        btn.classList.toggle("is-active");
        btn.setAttribute("aria-pressed", btn.classList.contains("is-active") ? "true" : "false");
        return;
      }

      // COMMENT => open box, no color change
      if(type === "comment"){
        const open = !commentBox.classList.contains("is-open");
        commentBox.classList.toggle("is-open", open);
        btn.setAttribute("aria-expanded", open ? "true" : "false");
        if(open) setTimeout(()=> commentInput.focus(), 50);
        return;
      }

      // SHARE => copy link, no color change
      if(type === "share"){
        const url = actions.getAttribute("data-share-url") || window.location.href;
        const ok = await copyText(url);
        showToast(ok ? "Link copied" : "Copy failed");
        return;
      }
    });
  });

  // Optional: Enter to send comment
  document.getElementById("commentSend").addEventListener("click", ()=>{
    const text = commentInput.value.trim();
    if(!text) return;
    // Here you can send to backend
    console.log("Comment:", text);
    commentInput.value = "";
    showToast("Comment sent");
  });

  commentInput.addEventListener("keydown", (e)=>{
    if(e.key === "Enter") document.getElementById("commentSend").click();
    if(e.key === "Escape") commentBox.classList.remove("is-open");
  });
</script>

<script>
  /* =========================
   Bottom footer: hide on scroll down, show when stop
========================= */
const bbFooter = document.querySelector(".bb-footer");

let lastY = window.scrollY;
let stopTimer = null;

function showFooter(){
  if(!bbFooter) return;
  bbFooter.classList.remove("is-hidden");
}

function hideFooter(){
  if(!bbFooter) return;
  bbFooter.classList.add("is-hidden");
}

// show at landing
showFooter();

window.addEventListener("scroll", () => {
  const y = window.scrollY;

  // if scrolling down => hide
  if (y > lastY + 2) hideFooter();

  // if scrolling up => you can keep hidden OR show (your choice)
  // If you also want show on scroll up, uncomment this:
  // if (y < lastY - 2) showFooter();

  lastY = y;

  // when user stops scrolling => show again
  clearTimeout(stopTimer);
  stopTimer = setTimeout(() => {
    showFooter();
  }, 550); // change delay if you want (ms)
}, { passive: true });

</script>

<script>
  const photoBtn = document.getElementById("photoBtn");
const videoBtn = document.getElementById("videoBtn");
const view360Btn = document.getElementById("view360Btn");

const image = document.getElementById("propertyImage");
const video = document.getElementById("propertyVideo");
const view360 = document.getElementById("property360");

function hideAll(){
  image.style.display="none";
  video.style.display="none";
  view360.style.display="none";
  video.pause();
}

photoBtn.addEventListener("click",function(){
  hideAll();
  image.style.display="block";
});

videoBtn.addEventListener("click",function(){
  hideAll();
  video.style.display="block";
  video.play();
});

view360Btn.addEventListener("click",function(){
  hideAll();
  view360.style.display="block";
});
</script>

<script>
/* =========================
   WANTED AUTO SLIDER
========================= */
const wantedSlider = document.getElementById("wantedSlider");
const wantedTrack  = document.getElementById("wantedTrack");

if (wantedSlider && wantedTrack) {
  const originalItems = Array.from(wantedTrack.children);

  // duplicate items for smooth loop
  originalItems.forEach(item => {
    wantedTrack.appendChild(item.cloneNode(true));
  });

  let wantedIndex = 0;
  const totalOriginal = originalItems.length;
  let wantedPaused = false;

  function goWantedSlide(index, animate = true){
    wantedTrack.style.transition = animate ? "transform 450ms ease" : "none";
    wantedTrack.style.transform = `translateX(-${index * 100}%)`;
  }

  function nextWantedSlide(){
    if (wantedPaused) return;

    wantedIndex++;
    goWantedSlide(wantedIndex, true);

    if (wantedIndex === totalOriginal) {
      setTimeout(() => {
        wantedIndex = 0;
        goWantedSlide(wantedIndex, false);
      }, 470);
    }
  }

  let wantedTimer = setInterval(nextWantedSlide, 2500);

  wantedSlider.addEventListener("mouseenter", () => wantedPaused = true);
  wantedSlider.addEventListener("mouseleave", () => wantedPaused = false);
  wantedSlider.addEventListener("touchstart", () => wantedPaused = true, { passive: true });
  wantedSlider.addEventListener("touchend", () => wantedPaused = false, { passive: true });
}
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const wantedBtn = document.querySelector(".wanted-btn");

    if (wantedBtn) {
      wantedBtn.addEventListener("click", function () {
        window.location.href = "wanted-property.php";
      });
    }
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
  const wantedSlider = document.getElementById("wantedSlider");

  if (wantedSlider) {
    wantedSlider.addEventListener("click", function () {
      window.location.href = "wanted-property.php";
    });
  }
});
</script>



<script>
 const loanSlides = [
  { img: "img/icons/lolc.jpg", price: "Rs 245,000" },
  { img: "img/icons/boc.png", price: "Rs 185,000" }
];

let currentLoanSlide = 0;

const loanImg = document.querySelector(".pc-loan-chip img");
const loanAmount = document.querySelector(".pc-loan-amt");

function showLoanSlide(index) {
  loanImg.style.transform = "translateY(-20px)";
  loanImg.style.opacity = "0";

  loanAmount.style.transform = "translateY(-20px)";
  loanAmount.style.opacity = "0";

  setTimeout(() => {
    loanImg.src = loanSlides[index].img;
    loanAmount.textContent = loanSlides[index].price;

    loanImg.style.transform = "translateY(20px)";
    loanAmount.style.transform = "translateY(20px)";

    setTimeout(() => {
      loanImg.style.transform = "translateY(0)";
      loanImg.style.opacity = "1";

      loanAmount.style.transform = "translateY(0)";
      loanAmount.style.opacity = "1";
    }, 50);
  }, 300);
}

loanImg.style.transition = "all 0.4s ease";
loanAmount.style.transition = "all 0.4s ease";

setInterval(() => {
  currentLoanSlide = (currentLoanSlide + 1) % loanSlides.length;
  showLoanSlide(currentLoanSlide);
}, 3000);
</script>


