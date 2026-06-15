<?php require_once __DIR__ . '/../includes/lang.php'; ?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(html_lang_attr()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/customer-profile.css">
    <title><?= htmlspecialchars(t('customer_profile')) ?></title>
</head>
<body>
  <div class="agent-cover-card">

  <!-- Top Header -->
  <div class="agent-topbar">

    <!-- Left Icons -->
    <button class="spd-icon-btn" type="button" aria-label="Back">
      <img src="img/icons/go_to_back.webp" alt="" class="goToBack">
    </button>

    <!-- Profile -->
    <div class="agent-profile-box">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Agent">

      <div class="agent-info">
        <div class="agent-verify">
          <span>✔</span>
           <?= htmlspecialchars(t('verified_player')) ?>
        </div>

        <h3>B Best Property</h3>

        <div class="agent-stats">
          <span>10K Followers</span>
          <span>Rating 4.8★</span>
        </div>
      </div>
    </div>

    <!-- RIGHT AREA -->
    <div class="agent-right-actions">

      <!-- 3 dots -->
      <button class="agent-more-btn" id="profileMenuBtn" type="button">
        ⋮
      </button>

    </div>

  </div>

  <!-- popup -->
   <div class="profile-menu" id="profileMenu">
  <div class="profile-stats">
    <div><strong>24,000</strong><span>View Profile</span></div>
    <div><strong>25,040</strong><span>Ad Click</span></div>
    <div><strong>30,000</strong><span>Like</span></div>
    <div><strong>24,100</strong><span>Comments</span></div>
  </div>

  <div class="premium-box">
    <div>
      <h3>Upgrade to Premium</h3>
      <p>Unlock premium features and grow your business faster.</p>
    </div>
    <button>Upgrade Now ›</button>
  </div>

  <div class="menu-grid">
    <button><?= htmlspecialchars(t('orders')) ?></button>
    <button><?= htmlspecialchars(t('offers')) ?></button>
    <button><?= htmlspecialchars(t('quotation')) ?></button>
    <button><?= htmlspecialchars(t('ad_center')) ?></button>
    <button><?= htmlspecialchars(t('edit_profile')) ?></button>
    <button><?= htmlspecialchars(t('payments')) ?></button>
    <button><?= htmlspecialchars(t('verification_center')) ?></button>
    <button><?= htmlspecialchars(t('buy_list')) ?></button>
  </div>

  <div class="menu-list">
    <button><?= htmlspecialchars(t('help_support')) ?> <span>›</span></button>
    <button><?= htmlspecialchars(t('security')) ?> <span>›</span></button>
    <button><?= htmlspecialchars(t('settings')) ?> <span>›</span></button>
  </div>

  <button class="logout-btn"><?= htmlspecialchars(t('logout')) ?></button>
</div>




  <!-- Cover Slider -->
  <div class="agent-cover-slider">

    <button class="cover-arrow left">‹</button>

    <!-- ADD IDs TO IMAGE + DOTS -->

    <img id="agentSliderImage"
    src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop"
    alt="Cover">

    <div class="cover-dots" id="coverDots">
      <span class="active"></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

</div>


<div class="agent-profile-section">

  <!-- Top -->
  <div class="agent-profile-top">

    <div class="agent-profile-left">

      <div class="agent-role">
        <span>Profile :</span> Real Estate
      </div>

      <div class="agent-services">
        <label><input type="checkbox" checked> Buy & Sale</label>
        <label><input type="checkbox" checked> Property Marketing</label>
        <label><input type="checkbox" checked> Property Brokering</label>
      </div>

      <!-- BIO -->
      <div class="agent-text-box">
        <h3>BIO</h3>

        <p>
          Experienced real estate professional specializing in residential and commercial properties across Colombo and surrounding areas. Helping clients buy, sell, and invest with trusted guidance, market knowledge, and smooth transaction support.
        </p>
      </div>
      <div class="fsb agent-follow-btn">
        <button>Reviews</button>
        <button>+ Follow</button>
      </div>

      <!-- LOCATION -->
       <div class="fsb location-map">
         <div class="agent-location">
           📍 Colombo - Panadura
         </div>
         <!-- MAP -->
         <div class="agent-map-box">
   
           <div class="agent-mini-map">
             🗺
           </div>
   
           <button class="view-map-btn">
             View Map
           </button>
   
         </div>
       </div>

    </div>

    

  </div>

  <!-- ACTION BUTTONS -->
  <div class="agent-action-row">

    <button class="fcc"><img src="img/icons/call.svg" alt="" class="contact-imgs"> Call</button>
    <button class="fcc"><img src="img/icons/whatsapp.svg" alt="" class="contact-imgs"> WhatsApp</button>
    <button class="fcc"><img src="img/icons/e-mail.svg" alt="" class="contact-imgs"> E-mail</button>
    <button class="fcc"><img src="img/icons/message.svg" alt="" class="contact-imgs"> Messaging</button>

  </div>

  <!-- SOCIAL -->
  <div class="fsb agent-social-row">

    <a href="#"><img src="img/icons/fb.svg" alt=""></a>
    <a href="#"><img src="img/icons/instagram.svg" alt=""></a>
    <a href="#"><img src="img/icons/linkedin.svg" alt=""></a>
    <a href="#"><img src="img/icons/twitter.svg" alt=""></a>
    <a href="#"><img src="img/icons/youtube.svg" alt=""></a>
    <a href="#"><img src="img/icons/website.svg" alt=""></a>

  </div>

  <!-- ABOUT -->
  <div class="agent-text-box about-box">

    <h3>About Us</h3>

    <p>
      We provide trusted real estate services including property sales, rentals, investment consultation, and marketing solutions. Our mission is to connect buyers and sellers through transparent communication, strong market expertise, and professional customer support.
    </p>

  </div>

</div>
<div class="agent-text-box media">
  <h3>Media Profile</h3>
</div>


<div class="agent-media-tabs">
  <button class="media-tab" data-media="photos">Photos</button>
  <button class="media-tab" data-media="videos">Videos</button>
  <button class="media-tab" data-media="views360">360°</button>
</div>

<div class="agent-media-panel" id="photos">
  <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop" alt="">
  <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop" alt="">
  <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop" alt="">
</div>

<div class="agent-media-panel" id="videos">
  <video controls src="video/property-video-1.mp4"></video>
  <video controls src="video/property-video-2.mp4"></video>
</div>

<div class="agent-media-panel" id="views360">
  <iframe src="https://kuula.co/share/L4dn9/collection/7H3yk?logo=1&info=0&fs=1" loading="lazy"></iframe>
</div>

<div class="agent-services-card">

  <h3 class="agent-section-title">Our Services</h3>

  <div class="agent-service-row">
    <label>
      <input type="checkbox" checked>
      <span>Property Buy and Sale</span>
    </label>
    <button>View More Details</button>
  </div>

  <div class="agent-service-row">
    <label>
      <input type="checkbox" checked>
      <span>Property Marketing</span>
    </label>
    <button>View More Details</button>
  </div>

  <div class="agent-service-row">
    <label>
      <input type="checkbox">
      <span>FB Ads and Boosting</span>
    </label>
    <button>View More Details</button>
  </div>

</div>

<div class="catalog-section">

  <!-- TOP -->
  <div class="catalog-topbar">

    <h2>Catalog</h2>

    <div class="catalog-tabs">
      <button class="catalog-tab active">Property</button>
      <button class="catalog-tab">Property Services</button>
    </div>

  </div>


  <!-- HOUSE -->
  <div class="catalog-group">

    <div class="catalog-group-head">
      <h3>House</h3>
      <a href="#">View All</a>
    </div>

    <div class="catalog-post-grid">

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>
      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

    </div>

  </div>


  <!-- LAND -->
  <div class="catalog-group">

    <div class="catalog-group-head">
      <h3>Land</h3>
      <a href="#">View All</a>
    </div>

    <div class="catalog-post-grid">

     <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

    </div>

  </div>


  <!-- PANADURA -->
  <div class="catalog-group">

    <div class="catalog-group-head">
      <h3>Panadura House For Sale</h3>
      <a href="#">View All</a>
    </div>

    <div class="catalog-post-grid">

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

     <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

     <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

      <article class="catalog-post property-card">
  <div class="property-card-img">
    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1200&auto=format&fit=crop" alt="Property">
    <span class="property-badge">FOR SALE</span>
  </div>

  <div class="property-card-body">
    <h4>📍 Moratuwa - Lakshapathiya</h4>
    <strong>LKR 98M</strong>

    <div class="property-meta">
      <span>Perch: 11</span>
      <span>Bed: 3</span>
      <span>Bath: 3</span>
      <span>Sqft: 3000</span>
    </div>

    <div class="property-road">🛣 6 mins to Galle Road</div>

    <div class="property-actions">
      <button class="view-btn">👁 View</button>
      <button class="call-btn">📞 Call</button>
    </div>
  </div>
</article>

    </div>

  </div>

</div>
</body>
</html>

<script>
  /* =========================
   AGENT COVER SLIDER
========================= */

const sliderImages = [
  "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop",

  "https://images.unsplash.com/photo-1494526585095-c41746248156?q=80&w=1600&auto=format&fit=crop",

  "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1600&auto=format&fit=crop",

  "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=1600&auto=format&fit=crop",

  "https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=1600&auto=format&fit=crop"
];

const sliderImage = document.getElementById("agentSliderImage");
const dots = document.querySelectorAll("#coverDots span");

const prevBtn = document.querySelector(".cover-arrow.left");
const nextBtn = document.querySelector(".cover-arrow.right");

let currentSlide = 0;

/* SHOW SLIDE */
function showSlide(index){

  sliderImage.style.opacity = 0;

  setTimeout(() => {

    sliderImage.src = sliderImages[index];

    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");

    sliderImage.style.opacity = 1;

  }, 180);
}

/* NEXT */
function nextSlide(){

  currentSlide++;

  if(currentSlide >= sliderImages.length){
    currentSlide = 0;
  }

  showSlide(currentSlide);
}

/* PREV */
function prevSlide(){

  currentSlide--;

  if(currentSlide < 0){
    currentSlide = sliderImages.length - 1;
  }

  showSlide(currentSlide);
}

/* BUTTON EVENTS */
nextBtn.addEventListener("click", nextSlide);
prevBtn.addEventListener("click", prevSlide);

/* AUTO SLIDE */
setInterval(() => {
  nextSlide();
}, 5000);

/* DOT CLICK */
dots.forEach((dot, index) => {

  dot.addEventListener("click", () => {

    currentSlide = index;
    showSlide(currentSlide);

  });

});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {

  const tabs = document.querySelectorAll(".media-tab");
  const panels = document.querySelectorAll(".agent-media-panel");

  /* DEFAULT SHOW PHOTOS */
  const defaultTab = document.querySelector('[data-media="photos"]');
  const defaultPanel = document.getElementById("photos");

  defaultTab.classList.add("is-active");
  defaultPanel.classList.add("is-show");

  /* TAB CLICK */
  tabs.forEach(tab => {

    tab.addEventListener("click", () => {

      const target = tab.dataset.media;
      const panel = document.getElementById(target);

      tabs.forEach(btn => btn.classList.remove("is-active"));
      panels.forEach(box => box.classList.remove("is-show"));

      tab.classList.add("is-active");
      panel.classList.add("is-show");

    });

  });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("profileMenuBtn");
  const menu = document.getElementById("profileMenu");

  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    menu.classList.toggle("is-open");
  });

  menu.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  document.addEventListener("click", () => {
    menu.classList.remove("is-open");
  });

  const logoutBtn = menu.querySelector(".logout-btn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", () => {
      window.location.href = "logout.php";
    });
  }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const backBtn = document.querySelector(".goToBack");

  backBtn.addEventListener("click", () => {
    if (document.referrer !== "") {
      window.history.back(); // go to previous page
    } else {
      window.location.href = "index.php"; // fallback if no history
    }
  });
});
</script>

