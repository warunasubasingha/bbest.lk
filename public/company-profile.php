<?php require_once __DIR__ . '/../includes/lang.php'; ?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(html_lang_attr()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/company-profile.css">
    <title><?= htmlspecialchars(t('company_profile')) ?></title>
    <style>
     
    </style>
</head>
<body>
 <section class="company-profile-hero">

  <div class="company-cover">

    <!-- Left Icons -->
    <button class="spd-icon-btn" type="button" aria-label="Back">
      <img src="img/icons/go_to_back.webp" alt="" class="goToBack">
    </button>

    <div class="company-share">
      <span><?= htmlspecialchars(t('share') ?? 'Share') ?></span>
      <button type="button"><img src="img/icons/share.svg" alt=""></button>
    </div>

    <button class="company-menu-btn" type="button">☰</button>

    <div class="company-main-info">

      <div class="company-logo-box">
        <img src="img/construction-company-logo.webp" alt="ACB Construction">
      </div>

      <div class="company-details">
        <h1>ACB Construction (Pvt) Ltd</h1>

        <div class="company-badges">
          <span class="verified-badge">🛡 <?= htmlspecialchars(t('verified_dealer')) ?></span>
          <span># 48</span>
          <span>(120 Reviews)</span>
        </div>

        <div class="company-location">
          <span>📍</span>
          <div>
            <strong><?= htmlspecialchars(t('head_office') ?? 'Colombo - No 33, Galle Road, Wallawatta') ?></strong>
            <p><?= htmlspecialchars(t('head_office_label') ?? 'Head Office') ?></p>
          </div>
        </div>
      </div>

    </div>

    <div class="company-stats-row">

      <div class="company-stat">
        <div class="fsb">
          <span>🏅</span>
          <strong>12+</strong>
        </div>
        <p>Years Exp.</p>
      </div>

      <div class="company-stat">
        <div class="fsb">
          <span>👥</span>
          <strong>Registered</strong>
        </div>
        <p>Company</p>
      </div>

      <div class="company-stat">
        <div class="fsb">
          <span>📄</span>
          <strong>100K+</strong>
        </div>
        <p>Projects</p>
      </div>

      <div class="company-stat">
        <div class="fsb">
          <span>🏢</span>
          <strong>10+</strong>
        </div>
        <p>Branches</p>
      </div>

      <div class="company-stat">
        <div class="fsb">
          <span>👥</span>
          <strong>250+</strong>
        </div>
        <p>Team Members</p>
      </div>

    </div>

  </div>

</section>

<section class="company-slider-tabs">

  <!-- IMAGE SLIDER -->
  <div class="company-image-slider">
    <div class="company-slide-track" id="companySlideTrack">

      <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1400&auto=format&fit=crop" alt="Company Image">
      <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1400&auto=format&fit=crop" alt="Company Image">
      <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1400&auto=format&fit=crop" alt="Company Image">
      <img src="https://images.unsplash.com/photo-1518005020951-eccb494ad742?q=80&w=1400&auto=format&fit=crop" alt="Company Image">

    </div>

    <div class="company-slider-dots" id="companySliderDots">
      <button class="is-active" data-slide="0"></button>
      <button data-slide="1"></button>
      <button data-slide="2"></button>
      <button data-slide="3"></button>
    </div>
  </div>

  <!-- TABS -->
  <div class="company-profile-tabs">
    <button class="company-tab is-active" data-tab="overview">Overview</button>
    <button class="company-tab" data-tab="info">Company Information</button>
    <button class="company-tab" data-tab="branches">Branches</button>
    <button class="company-tab" data-tab="projects">Projects</button>
  </div>

  <!-- TAB CONTENTS -->
  <div class="company-tab-content is-show" id="overview">
    <div class="company-tab-content is-show" id="overview">

  <div class="co-section-title">Company Overview</div>

  <div class="co-overview-grid">
    <div class="co-stat-card">🏅 <b>12+</b><span>Years Experience</span></div>
    <div class="co-stat-card">📁 <b>100K+</b><span>Projects Completed</span></div>
    <div class="co-stat-card">🏢 <b>10+</b><span>Branches</span></div>
    <div class="co-stat-card">👥 <b>250+</b><span>Team Members</span></div>
  </div>

  <div class="co-card">
    <h3>🏢 <?= htmlspecialchars(t('about_company')) ?></h3>
    <p>
      <?= htmlspecialchars(t('company_about_paragraph') ?? 'ACB Construction (Pvt) Ltd is a leading construction company in Sri Lanka, delivering high-quality construction solutions for residential, commercial, industrial and infrastructure sectors. With over a decade of experience, a skilled team, and modern technology, we turn visions into reality.') ?>
    </p>
  </div>

  <div class="co-card">
    <h3>🏢 Company Information</h3>

    <div class="co-info-list">
      <div><span>Company Name</span><b>ACB Construction (Pvt) Ltd</b></div>
      <div><span>Registration No.</span><b>PV 123456</b></div>
      <div><span>Business Reg. No.</span><b>BR/2020/12345</b></div>
      <div><span>VAT No.</span><b>123456789V</b></div>
      <div><span>Incorporated Year</span><b>2012</b></div>
      <div><span>Company Type</span><b>Private Limited Company</b></div>
      <div><span>Industry</span><b>Construction & Engineering</b></div>
      <div><span>Company Size</span><b>250+ Employees</b></div>
      <div><span>Head Office</span><b>No. 33, Galle Road, Wallawatta, Colombo 06.</b></div>
      <div><span>Phone</span><b>+94 11 234 5678</b></div>
      <div><span>Email</span><b>info@acbconstruction.lk</b></div>
      <div><span>Website</span><b>www.acbconstruction.lk</b></div>
    </div>

    <div class="co-social">
      <a href="#">f</a>
      <a href="#">◎</a>
      <a href="#">in</a>
      <a href="#">▶</a>
    </div>
  </div>

  <div class="co-card">
    <h3>⚙️ Our Vision</h3>
    <p>To be the most trusted and innovative construction company in Sri Lanka, recognized for excellence, sustainability and contribution to nation building.</p>
  </div>

  <div class="co-card">
    <h3>🎯 Our Mission</h3>
    <p>To deliver superior construction solutions using advanced technology and best practices while ensuring customer satisfaction, quality, safety and timely delivery.</p>
  </div>

  <div class="co-card">
    <h3>💎 Our Core Values</h3>

    <div class="co-values">
      <p><b>Integrity</b><br>We conduct our business with honesty and transparency.</p>
      <p><b>Quality</b><br>We deliver the highest standards in every project.</p>
      <p><b>Safety</b><br>We prioritize the safety of our team and clients.</p>
      <p><b>Innovation</b><br>We embrace new technologies and creative solutions.</p>
      <p><b>Sustainability</b><br>We are committed to environmentally responsible construction.</p>
      <p><b>Customer Focus</b><br>We build lasting relationships through trust and satisfaction.</p>
    </div>
  </div>

</div>
  </div>

  <div class="company-tab-content" id="info">
   

  <div class="co-card">
    <h3>🏢 Company Information</h3>

    <div class="co-info-list">
      <div><span>Years of Experience</span><b>12+ Years</b></div>
      <div><span>Projects Completed</span><b>100K+</b></div>
      <div><span>Ongoing Projects</span><b>25+</b></div>
      <div><span>Team Members</span><b>250+</b></div>
      <div><span>Branches</span><b>10+</b></div>
      <div><span>Service Areas</span><b>Island Wide</b></div>
      <div><span>Certifications</span><b>ISO 9001:2015,<br>ISO 14001:2015</b></div>
      <div><span>Company Rating</span><b>⭐ 4.8 (120 Reviews)</b></div>
      <div><span>Response Time</span><b>Within 1 Hour</b></div>
      <div><span>Customer Satisfaction</span><b>98%</b></div>
      <div><span>Average Project Duration</span><b>6 – 18 Months</b></div>
    </div>
  </div>

  <div class="co-card">
    <h3>🛠 Our Main Services</h3>

    <div class="co-service-grid">
      <div><strong>🏠 Building Construction</strong><span>Residential, Commercial & Industrial Buildings</span></div>
      <div><strong>🚧 Road & Bridge Construction</strong><span>Highways, Roads, Bridges & Flyovers</span></div>
      <div><strong>🏗 Renovation & Remodeling</strong><span>Building Renovation & Remodeling Services</span></div>
      <div><strong>⚡ Electrical & Plumbing</strong><span>Electrical Installation & Plumbing Solutions</span></div>
      <div><strong>🏢 Project Management</strong><span>Planning, Execution & Monitoring</span></div>
      <div><strong>📐 Design & Consultation</strong><span>Architecture Design & Engineering</span></div>
    </div>

    <button class="co-main-btn"><?= htmlspecialchars(t('view_all_services')) ?> →</button>
  </div>

  <div class="co-card">
    <h3>🛡 Why Choose Us?</h3>
    <ul class="co-check-list">
      <li>Quality & Safety Focused</li>
      <li>Timely Project Delivery</li>
      <li>Experienced & Skilled Team</li>
      <li>Modern Technology & Innovation</li>
      <li>Customer Satisfaction Guaranteed</li>
    </ul>
  </div>

  <div class="co-card">
    <h3>👥 Company Quick Info</h3>

    <div class="co-quick-grid">
      <div><strong>🕒 Working Hours</strong><span>Mon - Sat<br>8.00 AM - 6.00 PM</span></div>
      <div><strong>💬 Quick Contact</strong><span>+94 77 123 4567</span></div>
      <div><strong>✉ Email Us</strong><span>info@acbconstruction.lk</span></div>
      <div><strong>📍 Our Location</strong><span>Wallawatta,<br>Colombo 06.</span></div>
    </div>
  </div>

  <div class="co-card">
    <h3>⬇ Downloads</h3>

    <div class="co-download-row">
      <span>📄 Company Profile (PDF)</span>
      <button>⬇</button>
    </div>

    <div class="co-download-row">
      <span>📄 Brochure (PDF)</span>
      <button>⬇</button>
    </div>
  </div>

  <div class="co-cta-card">
    <h3>Let’s Build Your Dream Project Together!</h3>
    <p>We are here to help you with quality and trust.</p>
    <button>📞 Contact Us Now</button>
  </div>


  </div>

  <div class="company-tab-content" id="branches">
    <section class="branch-section">

  <!-- CARD 01 -->
  <article class="branch-card">

    <div class="branch-img">
      <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="branch-content">

      <div class="branch-top">
        <h3>ABC Construction (Pvt) Ltd</h3>
        <span>Piliyandala Branch</span>
      </div>

      <div class="branch-address">
        📍 No 30, Piliyandala, Suwarapola
      </div>

      <div class="branch-row">

        <a href="tel:+94771234567" class="branch-btn">
          📞 Call
        </a>

        <a href="#" class="branch-map">
          📍 View Map
        </a>

      </div>

      <div class="branch-bottom">

        <div class="branch-time">
          🕒 Opening : 9 AM - 5 PM
        </div>

        <div class="branch-actions">
          <button>🔗</button>
          <button>➕</button>
        </div>

      </div>

    </div>

  </article>


  <!-- CARD 02 -->
  <article class="branch-card">

    <div class="branch-img">
      <img src="https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="branch-content">

      <div class="branch-top">
        <h3>ABC Construction (Pvt) Ltd</h3>
        <span>Colombo Branch</span>
      </div>

      <div class="branch-address">
        📍 No 12, Galle Road, Colombo 04
      </div>

      <div class="branch-row">

        <a href="tel:+94774567890" class="branch-btn">
          📞 Call
        </a>

        <a href="#" class="branch-map">
          📍 View Map
        </a>

      </div>

      <div class="branch-bottom">

        <div class="branch-time">
          🕒 Opening : 8 AM - 6 PM
        </div>

        <div class="branch-actions">
          <button>🔗</button>
          <button>➕</button>
        </div>

      </div>

    </div>

  </article>


  <!-- CARD 03 -->
  <article class="branch-card">

    <div class="branch-img">
      <img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?q=80&w=1200&auto=format&fit=crop" alt="">
    </div>

    <div class="branch-content">

      <div class="branch-top">
        <h3>ABC Construction (Pvt) Ltd</h3>
        <span>Kandy Branch</span>
      </div>

      <div class="branch-address">
        📍 No 45, Peradeniya Road, Kandy
      </div>

      <div class="branch-row">

        <a href="tel:+94775678901" class="branch-btn">
          📞 Call
        </a>

        <a href="#" class="branch-map">
          📍 View Map
        </a>

      </div>

      <div class="branch-bottom">

        <div class="branch-time">
          🕒 Opening : 9 AM - 4 PM
        </div>

        <div class="branch-actions">
          <button>🔗</button>
          <button>➕</button>
        </div>

      </div>

    </div>

  </article>

</section>
  </div>

  <div class="company-tab-content" id="projects">

  <section class="project-section">
    <div class="project-head">
      <h3>🏗 ONGOING PROJECTS</h3>
      <button>+ Add Project</button>
    </div>

    <div class="project-grid">

      <article class="project-card">
        <div class="project-img">
          <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&auto=format&fit=crop">
          <span>ONGOING</span>
        </div>

        <div class="project-body">
          <h4>Bahirawamalla Housing Project</h4>

          <div class="project-meta">
            <span>📍 Bahirawamalla, Sri Lanka</span>
            <span>📅 Dec 2025</span>
          </div>

          <p>A premium residential housing project featuring 20 luxury houses with modern architectural designs.</p>

          <div class="project-thumbs">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&auto=format&fit=crop">
            <span>+8</span>
          </div>

          <div class="project-progress">
            <div><span style="width:65%"></span></div>
            <b>65%</b>
          </div>

          <div class="project-actions">
            <button class="openProjectDetails">👁 View More Details</button>
            <button>✎ Edit</button>
            <button>🗑</button>
          </div>
        </div>
      </article>

      <article class="project-card">
        <div class="project-img">
          <img src="https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=1200&auto=format&fit=crop">
          <span>ONGOING</span>
        </div>

        <div class="project-body">
          <h4>Nugegoda Apartment Project</h4>

          <div class="project-meta">
            <span>📍 Nugegoda, Sri Lanka</span>
            <span>📅 Aug 2025</span>
          </div>

          <p>Modern apartment complex with 15 luxury units, rooftop pool and modern facilities.</p>

          <div class="project-thumbs">
            <img src="https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498f?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=300&auto=format&fit=crop">
            <span>+6</span>
          </div>

          <div class="project-progress">
            <div><span style="width:40%"></span></div>
            <b>40%</b>
          </div>

          <div class="project-actions">
            <button class="openProjectDetails">👁 View More Details</button>
            <button>✎ Edit</button>
            <button>🗑</button>
          </div>
        </div>
      </article>

    </div>
  </section>


  <section class="project-section">
    <div class="project-head">
      <h3>🏆 COMPLETED PROJECTS</h3>
      <button>+ Add Project</button>
    </div>

    <div class="project-grid">

      <article class="project-card completed">
        <div class="project-img">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&auto=format&fit=crop">
          <span>COMPLETED</span>
        </div>

        <div class="project-body">
          <h4>Piliyandala House</h4>

          <div class="project-meta">
            <span>📍 Piliyandala, Sri Lanka</span>
            <span>📅 May 2024</span>
          </div>

          <p>Beautiful 2-storey luxury house with modern architecture and high quality finishing.</p>

          <div class="project-thumbs">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&auto=format&fit=crop">
            <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=300&auto=format&fit=crop">
            <span>+10</span>
          </div>

          <div class="project-info-box">
            <div>💰 <b>LKR 45M</b><span>Project Value</span></div>
            <div>⏱ <b>12 Months</b><span>Duration</span></div>
            <div>✓ <b>15 May 2024</b><span>Completed On</span></div>
          </div>

          <div class="project-actions">
            <button class="openProjectDetails">👁 View More Details</button>
            <button>✎ Edit</button>
            <button>🗑</button>
          </div>
        </div>
      </article>

    </div>
  </section>


  </div>

</section>

<!-- pop Up -->
 <div class="project-modal" id="projectModal">
  <div class="project-modal-bg" id="closeProjectModal"></div>

  <div class="project-modal-box">
    <button class="project-modal-close" id="projectModalClose">×</button>

    <div class="project-modal-hero">
      <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&auto=format&fit=crop">
      <span>ONGOING PROJECT</span>
    </div>

    <div class="project-modal-content">
      <h2>Bahirawamalla Housing Project</h2>
      <p class="project-modal-location">📍 Bahirawamalla, Sri Lanka</p>

      <div class="project-modal-stats">
        <div><b>65%</b><span>Progress</span></div>
        <div><b>20</b><span>Luxury Houses</span></div>
        <div><b>Dec 2025</b><span>Expected Finish</span></div>
        <div><b>LKR 850M</b><span>Investment</span></div>
      </div>

      <h3>Project Description</h3>
      <p>
        This premium residential housing project includes luxury homes, landscaped gardens,
        smart home features, modern architecture and world-class amenities.
      </p>

      <h3>Facilities</h3>
      <div class="project-modal-tags">
        <span>Luxury Houses</span>
        <span>Modern Design</span>
        <span>Parking Area</span>
        <span>Security</span>
        <span>Garden</span>
        <span>Smart Home</span>
      </div>

      <h3>Gallery</h3>
      <div class="project-modal-gallery">
        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=300&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&auto=format&fit=crop">
      </div>

      <button class="project-contact-btn">Contact Company</button>
    </div>
  </div>
</div>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.querySelector(".company-menu-btn");
  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      if (confirm("Are you sure you want to log out?")) {
        window.location.href = "logout.php";
      }
    });
  }

  const track = document.getElementById("companySlideTrack");
  const dots = document.querySelectorAll("#companySliderDots button");

  let currentSlide = 0;
  let sliderTimer;

  function showSlide(index){
    currentSlide = index;
    track.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach((dot, i) => {
      dot.classList.toggle("is-active", i === index);
    });
  }

  function nextSlide(){
    showSlide((currentSlide + 1) % dots.length);
  }

  dots.forEach(dot => {
    dot.addEventListener("click", () => {
      clearInterval(sliderTimer);
      showSlide(Number(dot.dataset.slide));
      sliderTimer = setInterval(nextSlide, 4000);
    });
  });

  sliderTimer = setInterval(nextSlide, 4000);

  const tabs = document.querySelectorAll(".company-tab");
  const contents = document.querySelectorAll(".company-tab-content");

  tabs.forEach(tab => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.tab;

      tabs.forEach(btn => btn.classList.remove("is-active"));
      contents.forEach(content => content.classList.remove("is-show"));

      tab.classList.add("is-active");
      document.getElementById(target).classList.add("is-show");
    });
  });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("projectModal");
  const openBtns = document.querySelectorAll(".openProjectDetails");
  const closeBtn = document.getElementById("projectModalClose");
  const bg = document.getElementById("closeProjectModal");

  openBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      modal.classList.add("is-show");
      document.body.style.overflow = "hidden";
    });
  });

  function closeProjectModal(){
    modal.classList.remove("is-show");
    document.body.style.overflow = "";
  }

  closeBtn.addEventListener("click", closeProjectModal);
  bg.addEventListener("click", closeProjectModal);
});
</script>
