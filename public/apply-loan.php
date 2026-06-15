<?php require_once __DIR__ . '/../includes/lang.php'; ?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(html_lang_attr()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/apply-loan.css">
    <title><?= htmlspecialchars(t('apply_loan_title')) ?></title>
    <style>
    </style>
</head>
<body>
    <section class="loan-page-wrap">

  <!-- TOP BAR -->
  <div class="loan-topbar">
    <button class="loan-back-btn" onclick="history.back()">←</button>
    <span class="loan-home-icon">🏠</span>
    <h2><?= htmlspecialchars(t('bank_loan_dashboard')) ?></h2>

    <div class="loan-user">
      <img src="img/man.webp" alt="User">
      <span>Rajith Perera</span>
      <span>⌄</span>
    </div>
  </div>

  <!-- BANK HERO -->
  <div class="loan-bank-hero">
    <div class="loan-hero-slider">
      <div class="loan-hero-slide is-active" style="background-image:url('https://images.unsplash.com/photo-1560472355-536de3962603?q=80&w=1400&auto=format&fit=crop');"></div>
      <div class="loan-hero-slide" style="background-image:url('https://images.unsplash.com/photo-1560472355-536de3962603?q=80&w=1400&auto=format&fit=crop');"></div>
      <div class="loan-hero-slide" style="background-image:url('https://images.unsplash.com/photo-1560472355-536de3962603?q=80&w=1400&auto=format&fit=crop');"></div>
    </div>

    <div class="loan-bank-overlay">
      <div class="loan-bank-info">
        <div class="loan-bank-logo">BOC</div>
        <div>
          <h3>BOC</h3>
          <p>Bank of Ceylon</p>
        </div>
      </div>

      <div class="loan-hero-dots">
        <button class="loan-dot is-active" data-slide="0"></button>
        <button class="loan-dot" data-slide="1"></button>
        <button class="loan-dot" data-slide="2"></button>
      </div>
    </div>
  </div>

  <!-- BANK TABS -->
  <div class="loan-bank-tabs">
    <button class="loan-bank-tab is-active">🟡 BOC ⌄</button>
    <button class="loan-bank-tab">Sampath Bank</button>
    <button class="loan-bank-tab">HNB</button>
    <button class="loan-bank-tab">People's Bank</button>
    <button class="loan-bank-tab">LOLC •••</button>
  </div>

  <!-- BRANCH -->
  <div class="loan-card">
    <h3 class="loan-section-title"><?= htmlspecialchars(t('branches')) ?></h3>

    <button class="loan-branch-select">
      <span>📍 Panadura – Keselwatta</span>
      <span>⌄</span>
    </button>

    <div class="loan-officer-card">
      <div class="loan-officer-left">
        <div class="loan-officer-logo">🏦</div>
        <div>
          <h3>Sampath – Keselwatta Branch</h3>
          <h4>Meera Dasanayaka</h4>
          <p>Loan Officer</p>
        </div>
      </div>

      <img src="img/man.webp" class="loan-officer-img" alt="Officer">
    </div>

    <div class="loan-contact-row">
      <a href="tel:0112356789" class="loan-contact-btn dark">📞 <?= htmlspecialchars(t('hotline')) ?></a>
      <a href="tel:+94112356789" class="loan-contact-btn">📞 +94 11 2 35 6789</a>
      <a href="mailto:bank@example.com" class="loan-contact-btn">✉ <?= htmlspecialchars(t('email_label')) ?></a>
      <a href="tel:+94112356789" class="loan-contact-btn dark">📞 <?= htmlspecialchars(t('call_direct')) ?></a>
    </div>
  </div>

  <!-- CALCULATOR CARD -->
  <div class="loan-card">

    <div class="loan-range-block">
      <div class="loan-row-title">
        <strong>▦ <?= htmlspecialchars(t('loan_amount')) ?></strong>
        <span>LKR <b id="loanAmountText">1,000,000</b> ›</span>
      </div>
      <input type="range" id="loanAmount" min="100000" max="30000000" step="100000" value="1000000">
      <div class="loan-small-text">100 Lak</div>
    </div>

    <div class="loan-range-block">
      <div class="loan-row-title">
        <strong>💰 <?= htmlspecialchars(t('down_payment')) ?> <span id="downPercentBadge">40%</span></strong>
        <span>LKR <b id="downPaymentText">400,000</b></span>
      </div>
      <input type="range" id="downPayment" min="10" max="90" step="5" value="40">
      <div class="loan-small-text">Loan Amount</div>
    </div>

    <!-- Loan time -->
    <div class="loan-time-row">
      <h3><?= htmlspecialchars(t('loan_time')) ?> <span>(Years)</span></h3>
      <button>10 Years ›</button>
    </div>

    <input type="range" class="loan-time-range" min="1" max="30" step="1" value="10">

    <div class="loan-range-labels">
      <span>1-10+</span>
      <span>10+ Years</span>
    </div>

    <div class="loan-monthly-box">
      LKR <span id="monthlyPayment">85,535</span> / Month ✎ ⚙
    </div>

    <div class="loan-product-tabs">
      <button class="loan-product-btn is-active">🏠 Home Loan</button>
      <button class="loan-product-btn">🌄 Land Loan</button>
      <button class="loan-product-btn">🏢 Property Loan</button>
      <button class="loan-product-btn">🚗 Vehicle Lease</button>
    </div>

    <button class="loan-apply-main-btn"><?= htmlspecialchars(t('apply_for_loan')) ?></button>
  </div>

</section>



<section class="loan-apply-section">

  <div class="loan-topbar loan-apply-topbar">
    <h2 class="loan-application-title"><?= htmlspecialchars(t('loan_application')) ?></h2>

    <div class="loan-user">
      <img src="img/man.webp" alt="User">
      <span>Rajith Perera</span>
      <span>⌄</span>
    </div>
  </div>

  <div class="loan-apply-card">

    <!-- Progress -->
      <div class="loan-apply-progress">
      <button class="loan-progress-active">👤 <?= htmlspecialchars(t('personal_details')) ?></button>
      <span class="loan-progress-line"></span>
      <span class="loan-progress-text"><?= htmlspecialchars(t('submit_save')) ?></span>
      <span class="loan-progress-arrow">›</span>
    </div>

    

    <!-- Form -->
    <div class="loan-form-box">

      <label class="loan-form-label">👤 <?= htmlspecialchars(t('full_name')) ?></label>
      <input type="text" placeholder="👤 <?= htmlspecialchars(t('full_name')) ?>">

      <div class="loan-form-row">
        <div class="loan-form-left">
          <span>▦ Birth</span>
          <input type="text" placeholder="Select birthdate">
        </div>
        <button class="loan-scan-btn">📷 <?= htmlspecialchars(t('id_scan')) ?></button>
      </div>

      <div class="loan-field-group">
        <label>📍 <?= htmlspecialchars(t('address')) ?></label>
        <input type="text" placeholder="📍 <?= htmlspecialchars(t('address')) ?>">
      </div>

      <div class="loan-mobile-row">
        <span>▣ <?= htmlspecialchars(t('mobile_number')) ?></span>
        <span class="loan-country">🇱🇰</span>
        <input type="text" value="+94 | 77 123 4567">
        <span>›</span>
      </div>

      <input type="email" placeholder="✉ Email">

      <div class="loan-select-row loan-employment" onclick="toggleEmployment(event)">

  <span>💼 Employment</span>
  <strong id="employmentSelected">Government ⌄</strong>

  <div class="loan-select-popup" id="employmentDropdown">

    <div class="loan-popup-grid">

      <div class="loan-popup-col">
        <div class="loan-popup-title">Government</div>

        <div class="loan-popup-item" onclick="selectJob('Government','Businessman',event)">Businessman</div>
        <div class="loan-popup-item" onclick="selectJob('Government','Web Developer',event)">Web Developer</div>
        <div class="loan-popup-item" onclick="selectJob('Government','Doctor',event)">Doctor</div>
        <div class="loan-popup-item" onclick="selectJob('Government','Lawyer',event)">Lawyer</div>
        <div class="loan-popup-item" onclick="selectJob('Government','Teacher',event)">Teacher</div>
        <div class="loan-popup-item" onclick="selectJob('Government','Other',event)">Other</div>
      </div>

      <div class="loan-popup-col">
        <div class="loan-popup-title">Private</div>

        <div class="loan-popup-item" onclick="selectJob('Private','Businessman',event)">Businessman</div>
        <div class="loan-popup-item" onclick="selectJob('Private','Web Developer',event)">Web Developer</div>
        <div class="loan-popup-item" onclick="selectJob('Private','Doctor',event)">Doctor</div>
        <div class="loan-popup-item" onclick="selectJob('Private','Lawyer',event)">Lawyer</div>
        <div class="loan-popup-item" onclick="selectJob('Private','Teacher',event)">Teacher</div>
        <div class="loan-popup-item" onclick="selectJob('Private','Other',event)">Other</div>
      </div>

    </div>

  </div>
</div>

      <div class="loan-income-box">
        <div class="loan-income-top">
          <span>₹ Monthly Average Income...</span>
          <strong>LKR 100,000</strong>
        </div>
        <textarea placeholder="Enter any additional notes..." maxlength="1000"></textarea>
        <div class="loan-count">0 / 1000⌄</div>
      </div>

      <div class="loan-action-row">
        <button>❔ Help</button>
        <button>▤ View Application</button>
        <button class="loan-submit-green">▣ Submit & Save</button>
      </div>

    </div>

    <!-- Status -->
    <div class="loan-status-card">
      <h3>⚙ Sampath Bank – Keselwatta</h3>

      <div class="loan-status-line">
        <div class="loan-status-item active">
          <strong>✓ Submitted</strong>
        </div>

        <div class="loan-status-bar"></div>

        <div class="loan-status-item process">
          <strong>● Processing</strong>
          <span>It will get 48 Hours</span>
        </div>

        <div class="loan-status-bar green"></div>

        <!-- <div class="loan-status-item done">
          <strong>✓ Manager Reply</strong>
        </div> -->

        <button class="loan-status-item done" onclick="openChat()">
          <strong>✓ Manager Reply</strong>
        </button>
      </div>
    </div>

  </div>

</section>

<div class="loan-chat-box" id="chatBox">

  <div class="loan-chat-header">
    <span>Manager Chat</span>
    <span onclick="closeChat()" style="cursor:pointer;">✖</span>
  </div>

  <div class="loan-chat-body" id="chatMessages">
    <div>👨‍💼 Manager: Hello! How can I help you?</div>
  </div>

  <div class="loan-chat-input">
    <input type="text" id="chatInput" placeholder="Type message...">
    <button onclick="sendMessage()">Send</button>
  </div>

</div>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const amount = document.getElementById("loanAmount");
  const down = document.getElementById("downPayment");
  const time = document.querySelector(".loan-time-range");

  const amountText = document.getElementById("loanAmountText");
  const downText = document.getElementById("downPaymentText");
  const downBadge = document.getElementById("downPercentBadge");
  const monthlyText = document.getElementById("monthlyPayment");
  const timeBtn = document.querySelector(".loan-time-row button");

  const interestRate = 15; // You can change bank interest rate here

  function formatMoney(num){
    return Number(num).toLocaleString("en-US");
  }

  function calculateLoan(){
    const totalAmount = Number(amount.value);
    const downPercent = Number(down.value);
    const years = Number(time.value);

    const downPayment = totalAmount * downPercent / 100;
    const loanBalance = totalAmount - downPayment;

    const monthlyRate = interestRate / 100 / 12;
    const months = years * 12;

    let monthly = 0;

    if(monthlyRate > 0){
      monthly = loanBalance * monthlyRate * Math.pow(1 + monthlyRate, months) /
        (Math.pow(1 + monthlyRate, months) - 1);
    } else {
      monthly = loanBalance / months;
    }

    amountText.textContent = formatMoney(totalAmount);
    downText.textContent = formatMoney(Math.round(downPayment));
    downBadge.textContent = downPercent + "%";
    monthlyText.textContent = formatMoney(Math.round(monthly));
    timeBtn.innerHTML = years + " Years ›";
  }

  amount.addEventListener("input", calculateLoan);
  down.addEventListener("input", calculateLoan);
  time.addEventListener("input", calculateLoan);

  calculateLoan();
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".loan-hero-slider");
  const slides = document.querySelectorAll(".loan-hero-slide");
  const dots = document.querySelectorAll(".loan-dot");

  let currentSlide = 0;
  let slideTimer;

  function showSlide(index){
    slider.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach((dot, i) => {
      dot.classList.toggle("is-active", i === index);
    });

    currentSlide = index;
  }

  function nextSlide(){
    showSlide((currentSlide + 1) % slides.length);
  }

  function startSlider(){
    slideTimer = setInterval(nextSlide, 3500);
  }

  dots.forEach(dot => {
    dot.addEventListener("click", () => {
      clearInterval(slideTimer);
      showSlide(Number(dot.dataset.slide));
      startSlider();
    });
  });

  showSlide(0);
  startSlider();
});
</script>


<script>
const employmentDropdown = document.getElementById("employmentDropdown");
const employmentSelected = document.getElementById("employmentSelected");
const employmentBox = document.querySelector(".loan-employment");

function toggleEmployment(event){
  event.stopPropagation();
  employmentDropdown.classList.toggle("active");
  employmentBox.classList.toggle("is-open");
}

function selectJob(type, job, event){
  event.stopPropagation();

  employmentSelected.innerText = type + " - " + job + " ⌄";

  employmentDropdown.classList.remove("active");
  employmentBox.classList.remove("is-open");
}

// close outside
document.addEventListener("click", function(e){
  if(!e.target.closest(".loan-employment")){
    employmentDropdown.classList.remove("active");
    employmentBox.classList.remove("is-open");
  }
});
</script>


<script>
function openChat(){
  document.getElementById("chatBox").classList.add("active");
}

function closeChat(){
  document.getElementById("chatBox").classList.remove("active");
}

function sendMessage(){
  const input = document.getElementById("chatInput");
  const messages = document.getElementById("chatMessages");

  if(input.value.trim() === "") return;

  const msg = document.createElement("div");
  msg.innerHTML = "🙋 You: " + input.value;

  messages.appendChild(msg);
  messages.scrollTop = messages.scrollHeight;

  input.value = "";

  // fake reply
  setTimeout(() => {
    const reply = document.createElement("div");
    reply.innerHTML = "👨‍💼 Manager: We will get back to you soon.";
    messages.appendChild(reply);
    messages.scrollTop = messages.scrollHeight;
  }, 1000);
}
</script>
