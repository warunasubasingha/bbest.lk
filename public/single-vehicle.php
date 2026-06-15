<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/single-vehicle.css">
    <title>Single Vehicle</title>
    <style>
    </style>
</head>
<body>


    <header class="top-header" id="topHeader">
        <div class="w topbar">

            <!-- Middle -->
            <a class="single-brand" href="index.php" aria-label="Home">
            <img src="img/bbest_logo.webp" alt="Bbest.lk Logo">
            </a>
        </div>
    </header>


    <section class="spd-hero">
        <div class="spd-shell first-shell">
            
            <!-- TOP MEDIA CARD -->
            <div class="spd-media-card">
        <!-- bottom agent info -->
      <div class="spd-agent-strip">
        <div class="spd-topbar-left fsb">
          <button class="spd-icon-btn" type="button" aria-label="Back">
            <img src="img/icons/go_to_back.webp" alt="" class="goToBack">
          </button>

          <div class="spd-agent-right">
            <div class="spd-status">Available Now</div>
          </div>

          <div class="views">
            <img src="img/icons/eye.svg" alt="">
            <span>413</span>
          </div>
        </div>
  
      </div>

      

      <!-- media stage -->
      <div class="spd-media-stage">
        <div class="spd-media-panel is-show" data-panel="image">
          <img
            class="spd-main-image"
            src="img/5056.webp"
            alt="Property main image"
          >


          <!-- media left controls -->
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

        </div>

        <div class="spd-media-panel" data-panel="video">
          <video
            class="spd-video"
            controls
            playsinline
            poster="https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=1400&auto=format&fit=crop"
          >
            <source src="" type="video/mp4">
          </video>

          <div class="spd-empty-note">
            Add your property video URL here
          </div>
        </div>

        <div class="spd-media-panel" data-panel="view360">
          <iframe
            class="spd-iframe"
            src="https://kuula.co/share/L4dn9/collection/7H3yk?logo=1&info=0&logosize=54&fs=1&vr=1&sd=1&initload=0&thumbs=1"
            title="360 Property View"
            loading="lazy"
            allowfullscreen
          ></iframe>
        </div>
      </div>

      
    </div>

    <!-- SOCIAL / ACTION ROW -->
    <div class="fsb spd-social-row">
        <button type="button" class="spd-social-btn">
          <div class="likeBtn"><img src="img/icons/heart.svg" alt=""></div>
          <span>138</span>
        </button>

        <button type="button" class="spd-social-btn">
          <div class="likeBtn"><img src="img/icons/comment.svg" alt=""></div>
          <span>Comment</span>
        </button>

        <button type="button" class="spd-social-btn">
          <div class="likeBtn"><img src="img/icons/save.svg" alt=""></div>
          <span>List</span>
        </button>
    </div>
  </div>
</section>

<section>
  <div class="spd-shell">

    <div class="fsb location-main">
      <div class="fa">
        <div><img src="img/location.png" alt="" class="location-image"></div>
        <span class="spd-agent-name mainLocation">Moratuwa - Lakshapathiya</span>
      </div>
      <span class="spd-list-btn">Colombo</span>
    </div>

    <div class="fsb location-main">
      <div class="fcc">
        <div class="spd-agent-badge"><img src="img/icons/honda.png" alt=""></div>
        <span class="property-main">-</span>
        <h3 class="spd-agent-name">Vezel RX - CAP 2012</h3>
      </div>
      <span class="spd-list-btn">Used</span>
    </div>

    

    
    <div class="property-indetails-border">
      <div class="fsb property-indetails">
        <div class="fa property-id">
          <span>Vehicle :</span>
          <span>POST ID 2400</span>
        </div>
        <span>|</span>
        <div class="fa property-id property-id-right">
          <span>List :</span>
          <span>Owner</span>
        </div>
      </div>
      <div class="fsb property-indetails">
        <div class="fa property-id">
          <span>Posted :</span>
          <span>02 Days Ago</span>
        </div>
        <span>|</span>
        <div class="fa property-id property-id-right">
          <span>Update :</span>
          <span>No</span>
        </div>
      </div>

    </div>
  </div>

</section>


<section class="spd-shell vehicle-top-strip">

  <div class="vehicle-top-row">

    <div class="vehicle-top-item">
      <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
        <!-- calendar body -->
        <path d="M5 4h14c1.1 0 2 .9 2 2v13c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>

        <!-- top header cut line -->
        <path d="M3 9h18v2H3z"/>

        <!-- binding rings -->
        <path d="M7 2h2v4H7z"/>
        <path d="M15 2h2v4h-2z"/>

        <!-- date dots -->
        <circle cx="8" cy="14" r="1"/>
        <circle cx="12" cy="14" r="1"/>
        <circle cx="16" cy="14" r="1"/>
        <circle cx="8" cy="18" r="1"/>
        <circle cx="12" cy="18" r="1"/>
      </svg>
      <div class="subDetails">
        <span>2012</span>
        <span class="zs1">Years</span>
      </div>
    </div>

    <div class="vehicle-top-item">
      <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
        <!-- outer meter -->
        <path d="M12 5C6.48 5 2 9.48 2 15h2a8 8 0 1 1 16 0h2c0-5.52-4.48-10-10-10z"/>
        
        <!-- inner tick / center -->
        <circle cx="12" cy="15" r="1.4"/>
        
        <!-- needle -->
        <path d="M13 14.2l4.2-4.2-1.4-1.4-4.2 4.2z"/>
      </svg>
      <div class="subDetails">
        <span>75,000 km</span>
        <span class="zs1">Milage</span>
      </div>
    </div>

    <div class="vehicle-top-item">
      <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
        <!-- pump body -->
        <path d="M6 4h8c1.1 0 2 .9 2 2v13c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>

        <!-- display -->
        <rect x="8" y="7" width="4" height="3" rx="0.8"/>

        <!-- hose -->
        <path d="M14 7h2l2 2v6c0 1.1-.9 2-2 2h-1"/>

        <!-- nozzle -->
        <path d="M18 9l2 2"/>

        <!-- base -->
        <path d="M5 20h10"/>

        <!-- fuel drop -->
        <path d="M10 12c-.7.9-1.2 1.6-1.2 2.2a1.2 1.2 0 0 0 2.4 0c0-.6-.5-1.3-1.2-2.2z"/>
      </svg>
      <div class="subDetails">
        <span>Hybrid</span>
        <span class="zs1">Fuel</span>
      </div>
    </div>

    <div class="vehicle-top-item">
      <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
          <!-- base platform -->
          <path d="M6 18h12v2H6z"/>

          <!-- gear stick -->
          <path d="M11 8h2v10h-2z"/>

          <!-- knob -->
          <circle cx="12" cy="6" r="2"/>

          <!-- shift lines -->
          <path d="M12 10h4"/>
          <path d="M16 10v3"/>
          <path d="M12 13h4"/>
      </svg>
      <div class="subDetails">
        <span>Auto</span>
        <span class="zs1">Transmission</span>
      </div>
    </div>

    <div class="vehicle-top-item">
     <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
        <!-- car body -->
        <path d="M4 14l2-5c.3-.8 1-1.3 1.9-1.3h8.2c.9 0 1.6.5 1.9 1.3l2 5v4c0 .6-.4 1-1 1h-1a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H5c-.6 0-1-.4-1-1v-4z"/>

        <!-- windshield -->
        <path d="M8 9h8l1.2 3H6.8z"/>

        <!-- headlights -->
        <circle cx="7.5" cy="14.5" r="1"/>
        <circle cx="16.5" cy="14.5" r="1"/>

        <!-- grill line -->
        <path d="M10 13h4"/>
      </svg>
      <div class="subDetails">
        <span>Hatchback</span>
        <span class="zs1">Body Type</span>
      </div>
    </div>

    <div class="vehicle-top-item">
     <svg viewBox="0 0 24 24" class="pc-mini-ic" aria-hidden="true">
        <!-- engine block -->
        <path d="M4 10h10c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2v-5c0-1.1.9-2 2-2z"/>

        <!-- top engine cover -->
        <path d="M8 6h5l2 2v2H8z"/>

        <!-- pipe -->
        <path d="M16 12h3l2 2v2h-2"/>

        <!-- inner detail -->
        <circle cx="8" cy="14" r="1.2"/>
        <circle cx="12" cy="14" r="1.2"/>
      </svg>
      <div class="subDetails">
        <span>1500CC</span>
        <span class="zs1">Engine</span>
      </div>
    </div>

  </div>

  
</section>

<!-- Important Note -->
<div class="important-note">
  <label>Important Note</label>
  <p class="vehicle-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>



<div class="vehicle-deal-tags">
  <span>Negotiable</span>
  <span>Finance Available</span>
  <span>1st Owner</span>
  <span>Only Cash Option</span>
</div>





<section class="spd-shell vehicle-price-finance-v2">

  <!-- PRICE TABLE -->
  <div class="v2-price-box">

    <div class="v2-row main">
      <span>Full Price</span>
      <strong>Rs. 5,800,000</strong>
    </div>

    <div class="v2-row">
      <span>Available Finance</span>
      <span class="mid">55,000 × 48</span>
      <strong>2,640,000</strong>
    </div>

    <div class="v2-row">
      <span>Hand</span>
      <strong>3,000,000</strong>
    </div>

    <div class="v2-row discount">
      <span>Price Discount</span>
      <strong>300,000</strong>
    </div>

  </div>



  <!-- FINANCE BOX -->
  <div class="v2-loan-box">
    <div class="v2-loan-head fcc">
      <span class="badge">Apply For Lease</span>
    </div>
    

    <div class="v2-loan-body">

      <div class="v2-loan-row">
        <span>Down Payment</span>
        <span class="mid">40%</span>
        <strong>2,500,000</strong>
      </div>

      <div class="v2-loan-row">
        <span>Licence Duration</span>
        <strong>5 Years</strong>
      </div>

    </div>

    <div class="v2-loan-month">
      <span>Monthly</span>
      <strong>48,000</strong>
    </div>

    <div class="applyDiv fcc"><button class="v2-apply-btn">APPLY NOW</button></div>

  </div>

</section>

<div class="vehicle-info-card">

  <!-- Title -->
  <h3 class="section-title">Basic Information</h3>

  <!-- Info Table -->
  <div class="info-table">
    <div><span>Color</span><b>Black</b></div>
    <div><span>Doors</span><b>4</b></div>
    <div><span>Seats</span><b>5</b></div>
    <div><span>Driving Type</span><b>RWD</b></div>
    <div><span>Register Year</span><b>2013</b></div>
    <div><span>Emission Standard</span><b>Euro 05</b></div>
    <div><span>Import Type</span><b>Reconditioned</b></div>
    <div><span>Warranty</span><b>No</b></div>
    <div><span>Fuel Average</span><b>15 KM/L</b></div>
  </div>

  <!-- Description -->
<div class="vehicle-desc-card">

  <div class="desc-header">
    <h3>Description</h3>
  </div>

  <p class="vehicle-description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
  </p>
  <button class="desc-more">More</button>

</div>

  <!-- Options -->
  <h3 class="section-title">Options</h3>

  <div class="options-grid">
    <label><div class="option-grid-img"><img src="img/icons/aa.png" alt=""></div> Power Steering</label>
    <label><div class="option-grid-img"><img src="img/icons/ab.png" alt=""></div> Power Window</label>
    <label><div class="option-grid-img"><img src="img/icons/ac.png" alt=""></div> Power Mirror</label>
    <label><div class="option-grid-img"><img src="img/icons/ad.png" alt=""></div> Airbags</label>
    <label><div class="option-grid-img"><img src="img/icons/ae.png" alt=""></div> ABS</label>
    <label><div class="option-grid-img"><img src="img/icons/af.png" alt=""></div> Reverse Camera</label>
    <label><div class="option-grid-img"><img src="img/icons/ag.png" alt=""></div> Parking Sensors</label>
    <label><div class="option-grid-img"><img src="img/icons/ah.png" alt=""></div> USB / Bluetooth</label>
    <label><div class="option-grid-img"><img src="img/icons/ai.png" alt=""></div> Alloy Wheels</label>
    <label><div class="option-grid-img"><img src="img/icons/aj.png" alt=""></div> Fog / LED Lights</label>
    <label><div class="option-grid-img"><img src="img/icons/ak.png" alt=""></div> Auto Parking</label>
    <label><div class="option-grid-img"><img src="img/icons/al.png" alt=""></div> Power Boot</label>
  </div>

  <!-- Conditions -->
  <h3 class="section-title">Conditions</h3>

  <div class="conditions-table">
    <div><span>Interior</span><b>Excellent</b></div>
    <div><span>Exterior</span><b>Good</b></div>
    <div><span>Tyre</span><b>80%</b></div>
    <div><span>Battery</span><b>100%</b></div>
    <div><span>AC</span><b>Excellent</b></div>
    <div><span>Engine</span><b>Good</b></div>
    <div><span>Paint</span><b>New Paint</b></div>
    <div><span>Modification</span><b>Original</b></div>
  </div>

</div>




<!-- Documents -->
<div class="vehicle-doc-card">

  <div class="doc-header">
    <h3>Documents</h3>
    <span class="doc-tag">Ownership - Open Papers</span>
  </div>

  <div class="doc-row">
    <span>CR Book</span>
    <span class="status ok">Available</span>
    <button>View</button>
  </div>

  <div class="doc-row">
    <span>Revenue License</span>
    <span class="status ok">Valid (2025.05.14)</span>
    <button>View</button>
  </div>

  <div class="doc-row">
    <span>Insurance</span>
    <span class="status ok">Valid (2025.06.15)</span>
    <button>View</button>
  </div>

  <div class="doc-row">
    <span>Eco Test</span>
    <span class="status pending">Pass (2026.04.30)</span>
    <button class="request">Request</button>
  </div>

  <!-- Note -->
  <div class="doc-note">
    <b>Note:</b>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Integer vel sem vel velit commodo fermentum.
  </div>

</div>


<section class="spd-shell agent-card-wrap">

  <div class="agent-card">

    <div class="agent-top">
      <div class="agent-top-left">
        <div class="agent-avatar">
          <img src="img/man.webp" alt="Agent Profile">
        </div>

        <div class="agent-meta">
          <h3 class="agent-name">Buddhika Dissanayaka</h3>

          <div class="agent-badges">
            <span class="agent-badge">Verified Agent</span>
            <span class="spd-badge-dot" aria-hidden="true"></span>
          </div>

          <div class="agent-company">B Best Property</div>
        </div>
      </div>

      <div class="agent-top-right">
        <button type="button" class="agent-follow-btn">Follow Agent</button>
      </div>
    </div>

    <div class="agent-stats-box">
      <div class="agent-stat">
        <strong>120</strong>
        <span>List</span>
      </div>

      <div class="agent-stat">
        <strong>45</strong>
        <span>Sold</span>
      </div>

      <div class="agent-stat">
        <div class="fcc">
          <strong>4.8</strong>
          <img src="img/icons/star.svg" alt="">
        </div>
        <span>Rating</span>
      </div>
    </div>

    <div class="agent-sub-row">
      <div class="agent-sub-item">Member : 2026</div>
      <div class="agent-sub-item">Respond in 5 minutes</div>
    </div>

    <div class="agent-action-list">
      <a href="tel:0761877028" class="agent-action-btn">
        <div class="agent-action-icon"><img src="img/icons/call.svg" alt=""></div>
        <span>Call 076 187 70 28</span>
      </a>

      <a href="https://wa.me/94761877028" target="_blank" rel="noopener" class="agent-action-btn">
        <div class="agent-action-icon"><img src="img/icons/whatsapp.svg" alt=""></div>
        <span>WhatsApp Chat / Call</span>
      </a>

      <a href="mailto:agent@example.com" class="agent-action-btn">
        <div class="agent-action-icon"><img src="img/icons/e-mail.svg" alt=""></div>
        <span>E-mail</span>
      </a>

      <button type="button" class="agent-action-btn">
        <span>View All List</span>
      </button>
    </div>

  </div>

</section>

<section class="spd-shell visit-wrap">

  <div class="qf-head">
    <h3 class="qf-title">Inform Your Visit Time Here</h3>
  </div>

  <!-- VISIT TIME -->
  <div class="visit-time-box">
    
    <div class="visit-time-left">
      <label class="visit-checkbox">
      <input type="checkbox">
      <span class="visit-day">Today</span>
    </label>
      

      <span class="visit-hours">10AM – 5PM</span>

      <span class="visit-note">Call 2 Hours Before</span>
    </div>

    <div class="visit-time-right">
      <button class="visit-date-btn">Other Date ▼</button>
    </div>
  </div>

  <!-- INQUIRY BOX -->
  <div class="visit-form-box">
    
    <div class="fa">
      <div class="fcc">
        <img src="img/icons/e-mail.svg" alt="" class="inquiryImage">
      </div>
      <span class="inquaryTitle">Send Inquiry</span>
    </div>

    <div class="visit-field">
      <label>Offers</label>
      <input type="text" placeholder="Enter your offer">
    </div>

    <div class="visit-field">
      <label>Visit Information</label>
      <input type="text" placeholder="Your Name">
    </div>

    <div class="visit-field">
      <input type="text" placeholder="Phone Number">
    </div>

    <div class="visit-field">
      <label>Your Message</label>
      <textarea id="inquiryMessage" placeholder="Write your message here..."></textarea>
    </div>

      <div class="visit-tags">
        <button type="button" class="visit-tag">I’m interested in this Vehicle.</button>
        <button type="button" class="visit-tag">Is this Vehicle still available?</button>
        <button type="button" class="visit-tag">Can I schedule a visit?</button>
        <button type="button" class="visit-tag">Please share more details.</button>
        <button type="button" class="visit-tag">Is the price negotiable?</button>
        <button type="button" class="visit-tag">Can you send the exact location?</button>
        <button type="button" class="visit-tag">I can’t visit, please share more photos/videos.</button>
        <button type="button" class="visit-tag">Is bank loan available?</button>
        <button type="button" class="visit-tag">Are the legal documents clear?</button>
        <button type="button" class="visit-tag">I’m a serious buyer, please contact me.</button>
      </div>
    </div>

    <!-- submit -->
    <button class="visit-submit-btn">
      ✉ Send Inquiry
    </button>

    <div class="visit-note-bottom">
      Agent will contact you soon!
    </div>

  </div>

</section>

<section class="spd-shell sp-wrap">



  <!-- new -->

  <div class="sp-head">
    <h2 class="sp-main-title">Similar Vehicle Added</h2>
  </div>

  <div class="similar-tabs">
    <button class="similar-tab is-active" data-tab="price">Similar Price</button>
    <button class="similar-tab" data-tab="brand">Similar brand</button>
    <button class="similar-tab" data-tab="model">Similar Model</button>
    <button class="similar-tab" data-tab="near">Near By vehicle</button>
  </div>


  <div class="sp-group similar-panel is-show" data-panel="price">
    <h3 class="sp-group-title">Similar Price</h3>
    <div class="sp-grid">
      <article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Colombo</div>
    <div class="sp-price">LKR 5,800,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2012</div>
      <div class="sp-meta-item">Km: 75,000</div>
      <div class="sp-meta-item">Fuel: Hybrid</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Honda Vezel RX</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>


<article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Gampaha</div>
    <div class="sp-price">LKR 6,200,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2015</div>
      <div class="sp-meta-item">Km: 60,000</div>
      <div class="sp-meta-item">Fuel: Petrol</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Toyota Axio</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>
    </div>
  </div>

  <div class="sp-group similar-panel" data-panel="brand">
    <h3 class="sp-group-title">Similar Brand</h3>
    <div class="sp-grid">
      <article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Colombo</div>
    <div class="sp-price">LKR 5,800,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2012</div>
      <div class="sp-meta-item">Km: 75,000</div>
      <div class="sp-meta-item">Fuel: Hybrid</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Honda Vezel RX</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>


<article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Gampaha</div>
    <div class="sp-price">LKR 6,200,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2015</div>
      <div class="sp-meta-item">Km: 60,000</div>
      <div class="sp-meta-item">Fuel: Petrol</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Toyota Axio</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>
    </div>
  </div>

  <div class="sp-group similar-panel" data-panel="model">
    <h3 class="sp-group-title">Similar Model</h3>
    <div class="sp-grid">
      <article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Colombo</div>
    <div class="sp-price">LKR 5,800,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2012</div>
      <div class="sp-meta-item">Km: 75,000</div>
      <div class="sp-meta-item">Fuel: Hybrid</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Honda Vezel RX</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>


<article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Gampaha</div>
    <div class="sp-price">LKR 6,200,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2015</div>
      <div class="sp-meta-item">Km: 60,000</div>
      <div class="sp-meta-item">Fuel: Petrol</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Toyota Axio</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>
    </div>
  </div>

   <div class="sp-group similar-panel" data-panel="near">
    <h3 class="sp-group-title">Near By Vehicle</h3>
    <div class="sp-grid">
      <article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1549924231-f129b911e442?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Colombo</div>
    <div class="sp-price">LKR 5,800,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2012</div>
      <div class="sp-meta-item">Km: 75,000</div>
      <div class="sp-meta-item">Fuel: Hybrid</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Honda Vezel RX</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>


<article class="sp-card">
  <div class="sp-thumb-wrap">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop" alt="Vehicle">
    <span class="sp-badge">FOR SALE</span>
  </div>

  <div class="sp-body">
    <div class="sp-location">📍 Gampaha</div>
    <div class="sp-price">LKR 6,200,000</div>

    <div class="sp-meta">
      <div class="sp-meta-item">Year: 2015</div>
      <div class="sp-meta-item">Km: 60,000</div>
      <div class="sp-meta-item">Fuel: Petrol</div>
      <div class="sp-meta-item">Auto</div>
    </div>

    <div class="sp-road">🚗 Toyota Axio</div>

    <div class="sp-actions">
      <button type="button" class="sp-btn sp-btn-view">👁 View</button>
      <button type="button" class="sp-btn sp-btn-call">📞 Call</button>
    </div>
  </div>
</article>
    </div>
  </div>
  <!-- new close -->
</section>

<div class="bottom-contact">
  
  <a href="#" class="contact-btn whatsapp">
    <img src="img/icons/whatsapp.svg" alt="WhatsApp">
    <span>WhatsApp</span>
  </a>

  <a href="tel:+94123456789" class="contact-btn call">
    <img src="img/icons/call.svg" alt="Call">
    <span>Call</span>
  </a>

  <a href="sms:+94123456789" class="contact-btn message">
    <img src="img/icons/message-footer.svg" alt="Message">
    <span>Message</span>
  </a>

</div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const tools = document.querySelectorAll(".spd-tool");
    const panels = document.querySelectorAll(".spd-media-panel");

    function showPanel(type) {
        tools.forEach(btn => {
        btn.classList.toggle("is-active", btn.dataset.media === type);
        });

        panels.forEach(panel => {
        panel.classList.toggle("is-show", panel.dataset.panel === type);
        });
    }

    tools.forEach(btn => {
        btn.addEventListener("click", () => {
        showPanel(btn.dataset.media);
        });
    });

    showPanel("image");
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const messageBox = document.getElementById("inquiryMessage");
  const quickMessages = document.querySelectorAll(".visit-tag");

  quickMessages.forEach(btn => {
    btn.addEventListener("click", () => {
      messageBox.value = btn.textContent.trim();
      messageBox.focus();
    });
  });
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

<script>
document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".similar-tab");
  const panels = document.querySelectorAll(".similar-panel");

  tabs.forEach(tab => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.tab;

      tabs.forEach(btn => btn.classList.remove("is-active"));
      tab.classList.add("is-active");

      panels.forEach(panel => {
        panel.classList.toggle("is-show", panel.dataset.panel === target);
      });
    });
  });
});
</script>