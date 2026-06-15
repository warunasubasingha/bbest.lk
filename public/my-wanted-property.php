<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wanted Property</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/my-wanted-property.css" />
</head>

<style>
/* Category */

/* 15 categories -> wrap into 4 lines */
.catgrid{
  display:flex;
  flex-wrap: wrap;
  gap: 10px;
}

/* each item same size */
.catbtn{
  flex: 1 1 calc(25% - 10px);   /* 4 per row */
  min-width: 0;
  height: 64px;
  border-radius: 14px;
  border: 1px solid rgba(36,78,115,.18);
  background: linear-gradient(180deg, rgba(78,152,217,.16), #fff);
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding: 10px 12px;
  cursor:pointer;
  color: var(--dark-blue);
  font-weight: 400; /* normal */
}

.catimg{
  width: 26px;
  height: 26px;
  object-fit: contain;
}

.cattxt{
  flex:1;
  text-align:center;
  font-size: 14px;
  white-space: nowrap;
  overflow:hidden;
  text-overflow: ellipsis;
}
.caret{ opacity:.7;font-size: 18px; }

/* Panel will be inserted in grid as a full row block */
.catpanel{
  display:none;
  width: 100%;
  margin-top: 0; /* we handle spacing via gap */
  border: 1px solid rgba(36,78,115,.18);
  border-radius: 14px;
  background:#fff;
  overflow:hidden;
}
.catpanel.open{ display:block; }

/* main list buttons */
.mainlist{ padding: 10px; display:flex; flex-direction:column; gap: 10px; }

.mainbtn{
  width: 100%;
  height: 44px;
  border-radius: 12px;
  border: 1px solid rgba(36,78,115,.18);
  background:#fff;
  color: var(--dark-blue);
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding: 0 12px;
  cursor:pointer;
  font-weight: 400;
}
.mainbtn .mcaret{ opacity:.7; transition: transform .18s ease; }
.mainitem.open .mainbtn .mcaret{ transform: rotate(180deg); }

/* sub links */
.sublist{
  display:none;
  padding: 8px 10px 12px;
  border-left: 3px solid rgba(78,152,217,.35);
  margin-left: 10px;
  margin-top: -6px;
}
.mainitem.open .sublist{ display:block; }

.sublist a{
  display:block;
  padding: 10px 10px;
  border-radius: 12px;
  border: 1px solid rgba(36,78,115,.12);
  background:#fbfdff;
  color: var(--dark-blue);
  text-decoration:none;
  font-weight: 400;
  margin-bottom: 8px;
}
.sublist a:last-child{ margin-bottom: 0; }
.sublist a:hover{ background: rgba(78,152,217,.10); }

/* Responsive 320px */
@media (max-width: 600px){
  .cattxt{ font-size: 12px; }
}

/* Under 400px: show only 5 items + More button */
@media (max-width: 400px){

  /* 3 columns so 5 items can fit nicely + More */
  .catbtn{
    padding: 8px 10px;
    height: auto !important;
    width: 13%;
    flex: auto;
  }

  /* Hide items when collapsed */
  .catbtn.is-hidden{
    display:none !important;
  }

  /* More button style (same size) */
  .catmore{
    justify-content:center;
    gap: 8px;
  }
  /* .catgrid {flex-wrap: nowrap;} */
  .catbtn span {
    font-size: 7px;
    
  }
  .caret {font-size: 20px !important;}
}




/* ===== Category bar like image ===== */
.catbar{
  width:100%;
  border: 1px solid rgba(36,78,115,.18);
  background: #fff;
  border-radius: 16px;
  padding: 10px;
  display:flex;
  flex-wrap: wrap;
  gap: 10px;
}

/* 6 tiles per row on small screens: More + 5 categories */
.cat-tile{
  flex: 1 1 calc((100% - 50px) / 6); /* 6 items with 10px gaps */
  min-width: 0;
  height: 86px;
  border-radius: 5px;
  border: 1px solid rgba(36,78,115,.18);
  background: linear-gradient(180deg, rgba(78,152,217,.16), #fff);
  display:flex;
  flex-direction: column;
  align-items:center;
  justify-content:center;
  gap: 6px;
  cursor:pointer;
  color: var(--dark-blue);
  font-weight: 400; /* normal */
}

.cat-ic{
  width: 38px;
  height: 38px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.cat-ic img{ width: 38px; height: 38px; object-fit: contain; display:block; }
.cat-ic svg{ width: 30px; height: 30px; fill: var(--dark-blue); opacity:.9; }
.cat-name {
   font-weight: 400;
}
.cat-ic svg{ width: 30px; height: 30px; fill: var(--dark-blue); opacity:.9; }
.vehicle-cat-name {
   font-weight: 800;
}

.cat-name , .vehicle-cat-name{
  font-size: 12px;
  line-height: 1.1;
  text-align:center;
  white-space: nowrap;
  overflow:hidden;
  text-overflow: ellipsis;
  max-width: 100%;
 
}

.cat-pill{
  padding: 4px 0;
  border-radius: 999px;
  border: 1px solid rgba(36,78,115,.16);
  background: rgba(78,152,217,.12);
  color: var(--dark-blue);
  font-weight: 400;
  width: 100%;
}

/* Hide extra cats until expanded */
.cat-tile.is-extra{ display:none; }
.catbar.is-expanded .cat-tile.is-extra{ display:flex; }

/* More tile */
.cat-more .cat-pill{ background: rgba(36,78,115,.10); }

/* ===== Responsive (320px) ===== */
@media (max-width: 360px){
  .catbar{ gap: 8px; padding: 8px; }
  .cat-tile{
    flex: 1 1 calc((100% - 40px) / 6);
    height: 82px;
    border-radius: 14px;
  }
  .cat-ic{ width: 34px; height: 34px; }
  .cat-ic img{ width: 34px; height: 34px; }
  .cat-name , .vehicle-cat-name{ font-size: 11px; }
  .cat-pill{ font-size: 10px; padding: 3px 8px; }
}

/* ===== Popup near clicked ===== */
.catpop{
  position: fixed;
  z-index: 5000;
  display:none;
  width: min(340px, 92vw);
  background: #fff;
  border: 1px solid rgba(36,78,115,.20);
  border-radius: 16px;
  box-shadow: 0 24px 50px rgba(0,0,0,.18);
  overflow: hidden;
}
.catpop.open{ display:block; }

.catpop-head{
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding: 10px 12px;
  border-bottom: 1px solid rgba(36,78,115,.12);
}
.catpop-title{ color: var(--dark-blue); font-weight: 400; }
.catpop-x{
  border: 1px solid rgba(36,78,115,.18);
  background:#fff;
  border-radius: 12px;
  padding: 6px 10px;
  cursor:pointer;
  color: var(--dark-blue);
  font-weight: 400;
}

/* Tabs: For Sale / For Rent / For Lease */
.catpop-tabs{
  display:flex;
  gap: 8px;
  padding: 10px 3px;
  border-bottom: 1px solid rgba(36,78,115,.12);
}
.cattab{
  flex:1;
  height: 34px;
  border-radius: 999px;
  border: 1px solid rgba(36,78,115,.18);
  color:#fff;
  cursor:pointer;
  background: var(--dark-blue);
  font-weight: 800;
  font-size: 9px;
}
.cattab.is-active{
  font-size: 12px;
}

/* List */
.catpop-list{
  max-height: 260px;
  overflow:auto;
  padding: 10px 12px 14px;
}
.catpop-item{
  width: 100%;
  text-align:left;
  padding: 10px 12px;
  border-radius: 14px;
  border: 1px solid rgba(36,78,115,.12);
  background:#fbfdff;
  color: var(--dark-blue);
  cursor:pointer;
  margin-bottom: 8px;
  font-weight: 400;
  font-size: 13px;
}
.catpop-item:last-child{ margin-bottom: 0; }
.catpop-item:hover{ background: rgba(78,152,217,.10); }

@media screen and (max-width:400px) {
  .cat-tile {
   height: auto; 

  }
  .cat-ic img {
    width: 75%;
  }
  .cat-name , .vehicle-cat-name , .cat-pill {
    font-size: 6px;
  }
  .catbar {
    gap: 5px;
  }
}

.js-pill .pill-inner{
  display: inline-block;
  transform: translateY(0);
  transition: transform .35s ease;
  will-change: transform;
}

.js-pill.is-anim .pill-inner{
  transform: translateY(-200%);
}

.js-pill{position:relative;display:inline-block;overflow:hidden;vertical-align:middle}
.js-pill .pill-inner{display:inline-block;transform:translateY(0);transition:transform .35s ease;will-change:transform}
.js-pill.is-anim .pill-inner{transform:translateY(-200%)}

.cat-ic-vehicle > img { 
  width: 100%;
}

/* Tick right, text left */
.catpop-check{
  display:flex;
  align-items:center;
  justify-content:space-between;  /* push ends */
  gap:12px;
  padding:10px 12px;
  cursor:pointer;
  width:100%;
}

.catpop-check-text{
  flex:1;                 /* stay left and take space */
  text-align:left;
}

.catpop-check input{
  width:18px;
  height:18px;
  flex:0 0 auto;          /* keep right */
  cursor:pointer;
  margin-left:12px;
}

.catpop-check:hover{
  background:rgba(0,0,0,0.04);
  border-radius:10px;
}


/* location */

/* =========================
   LOCATION UI (Accordion) - CSS
========================= */

/* Wrapper (you already have these, keep if needed) */
.filter-sec{ padding: 18px 0; }
.filter-row{ margin-bottom: 12px; }
.filter-bottum{
  border: 2px solid rgba(36, 78, 115, 0.25);
  border-radius: 14px;
  background: linear-gradient(rgba(78, 152, 217, 0.18), rgb(255, 255, 255));
  padding: 4px 14px;
  color: rgb(36, 78, 115);
  cursor: pointer;
  margin-left: 5px;
}
.filter-icon {
  width: 20px;
}

/* Location button */
.loc-btn{
  width:100%;
  display:flex;
  align-items:center;
  justify-content: space-between;
  gap: 10px;
  border:2px solid rgba(36,78,115,.25);
  border-radius: 14px;
  background: linear-gradient(180deg, rgba(78,152,217,.18), #fff);
  padding: 14px;
  color: #244E73;
  font-weight: 900;
  cursor: pointer;
}
.loc-title{ font-weight: 900; }
.loc-value{
  flex: 1;
  text-align: center;
  font-weight: 400;
  opacity: .9;
}
.loc-caret{ font-size: 14px; opacity:.8; }

/* Panel */
.loc-panel{
  margin-top: 10px;
  border:2px solid rgba(36,78,115,.18);
  border-radius: 14px;
  background:#fff;
  overflow: hidden;
  display:none;
}
.loc-panel.open{ display:block; }

/* District list */
.dist-list{
  list-style:none;
  padding: 0;
  margin: 0;
  max-height: 320px;
  overflow:auto;
  -webkit-overflow-scrolling: touch;
}

/* District row */
.dist-item{
  border-bottom: 1px solid #edf2f7;
}
.dist-item:last-child{ border-bottom: none; }

/* District button */
.dist-btn{
  width:100%;
  text-align:left;
  background:#f7fbff;
  padding: 12px 12px;
  font-weight: 600;
  color: #244E73;
  border: none;
  display:flex;
  align-items:center;
  justify-content:space-between;
  cursor:pointer;
  font-size: 16px;
}
.dist-btn:active{ transform: scale(.99); }

/* Caret rotate when open */
.dist-btn .caret{
  transition: transform .18s ease;
  opacity: .8;
}
.dist-item.open .dist-btn .caret{
  transform: rotate(180deg);
}

/* Cities list (hidden until open) */
.city-ul{
  list-style:none;
  padding: 10px 12px 14px;
  margin: 0;
  display:none;
  background:#fff;
}
.dist-item.open .city-ul{ display:block; }

/* City item */
.city-li{
  padding: 10px 10px;
  border-radius: 12px;
  font-weight: 400;
  border: 1px solid rgba(36,78,115,.12);
  color: #244E73;
  background:#fff;
  cursor:pointer;
  margin-bottom: 8px;
}
.city-li:last-child{ margin-bottom: 0; }
.city-li:hover{ background: rgba(78,152,217,.12); }
.city-li:active{ transform: scale(.99); }

/* Selected city */
.city-li.active{
  background: rgba(78,152,217,.22);
  border-color: rgba(36,78,115,.25);
}

/* Search input inside location panel */
.loc-search{
  padding: 10px 12px;
  border-bottom: 1px solid #edf2f7;
  background: #fff;
}

.loc-search input{
  width: 100%;
  height: 42px;
  padding: 0 12px;
  border-radius: 12px;
  border: 1px solid rgba(36,78,115,.18);
  outline: none;
  font-size: 14px;
  color: var(--dark-blue);
  background: #f7fbff;
  font-weight: 500;
}

.loc-search input:focus{
  border-color: rgba(36,78,115,.35);
  box-shadow: 0 8px 20px rgba(36,78,115,.08);
}


/* Mobile tweaks */
@media (max-width: 600px){
  .loc-value{ font-size: 14px; }
  .dist-btn{ padding: 12px 10px; }
  .city-ul{ padding: 10px 10px 12px; }
}

.message-card {
  display: flex;
  align-items: center;
  min-height: 100px;
  border: 1px solid var(--line);
  border-radius: 26px;
  padding: 27px 29px;
  background: #fff;
  box-shadow: 0 4px 10px rgba(5,15,55,.12);
  margin-top: 20px;
}
.message-icon {
  width: 78px;
  height: 78px;
  flex: 0 0 78px;
    flex-basis: 78px;
  border-radius: 50%;
  background: var(--blue);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 44px;
}
@media (max-width: 390px) {
  .message-icon {
    width: 38px;
    height: 38px;
    flex-basis: 38px;
    font-size: 21px;
  }
}
@media (max-width: 480px) {
  .message-icon {
    width: 44px;
    height: 44px;
    flex-basis: 44px;
    font-size: 25px;
  }
}
@media (max-width: 700px) {
  .message-icon {
    width: 62px;
    height: 62px;
    flex-basis: 62px;
    font-size: 35px;
  }
}

@media (max-width: 390px) {
  .message-card strong {
    font-size: 21px;
  }
}
@media (max-width: 480px) {
  .message-card strong {
    font-size: 24px;
  }
}
@media (max-width: 700px) {
  .message-card strong {
    font-size: 35px;
  }
}
.message-card strong {
  display: block;
  font-size: 43px;
  line-height: 1;
  font-weight: 800;
}
@media (max-width: 390px) {
  .message-card span:not(.message-icon) {
    font-size: 12px;
  }
}
@media (max-width: 480px) {
  .message-card span:not(.message-icon) {
    font-size: 14px;
    margin-top: 7px;
  }
}
@media (max-width: 700px) {
  .message-card span:not(.message-icon) {
    font-size: 21px;
    margin-top: 10px;
  }
}
.message-card span:not(.message-icon) {
  display: block;
  font-size: 25px;
  margin-top: 14px;
  font-weight: 500;
}

.message-count {
  margin-left: 40px;
}

.profile-btn{
  width: 42px;
  height: 42px;
  border-radius: 50%;
  overflow:hidden;
  border: 2px solid var(--dark-blue);
  cursor:pointer;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  background:#fff;
}
.profile-btn img{ width:100%; height:100%; object-fit:cover; }
@media (max-width: 480px) {
  profile-btn{ width: 40px !important; height: 40px; }
}

.date-filter-wrap {
  position: relative;
  display: inline-flex;
}

.date-filter-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.date-arrow {
  font-size: 12px;
  line-height: 1;
  transition: transform 0.2s ease;
}

.date-filter-wrap.open .date-arrow {
  transform: rotate(180deg);
}

.date-dropdown {
  position: absolute;
  top: calc(100% + 8px);
  right: 0;
  z-index: 1000;
  min-width: 170px;
  padding: 8px;
  border: 1px solid rgba(36, 78, 115, 0.18);
  border-radius: 14px;
  background: #ffffff;
  box-shadow: 0 18px 40px rgba(5, 15, 55, 0.16);
  display: none;
}

.date-filter-wrap.open .date-dropdown {
  display: block;
}

.date-dropdown button {
  width: 100%;
  border: 0;
  background: transparent;
  color: #244e73;
  padding: 10px 12px;
  border-radius: 10px;
  text-align: left;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
}

.date-dropdown button:hover {
  background: rgba(78, 152, 217, 0.12);
}

.date-dropdown button.is-selected {
  background: rgba(78, 152, 217, 0.2);
  color: #020a35;
  font-weight: 800;
}

@media (max-width: 480px) {
  .date-dropdown {
    right: 0;
    min-width: 150px;
  }

  .date-dropdown button {
    font-size: 12px;
    padding: 9px 10px;
  }
}
.wanted-home-icon > img {
  width: 100%;
  margin: 4px;
}
</style>
<body>
  <main class="wanted-page">
    <header class="wanted-header" aria-label="Page header">
      <button class="plain-icon" type="button" aria-label="Back">
        <div><img src="img/icons/go_to_back.webp" alt=""></div>
      </button>

      <a class="wanted-logo" href="index.php" aria-label="Bbest home">
        <div><img src="img/bbest_logo.webp" alt=""></div>
      </a>

      <a href="customer-profile.php" class="profile-btn">
        <img src="img/man.webp" alt="Profile">
      </a>
    </header>

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

<!-- Location List  and Fillter-->
<section class="filter-sec">
  <div class="w">
    <div class="filter-wrap">

      <!-- Location Button -->
      <div class="filter-row">
        <div class="fsb">
          <button class="loc-btn" id="locOpen" type="button" aria-expanded="false">
            <span class="loc-title">Location</span>
            <span class="loc-value" id="locValue">Select District & City</span>
            <span class="loc-caret">▾</span>
          </button>
        </div>

        <!-- Location Panel (Accordion List) -->
        <div class="loc-panel" id="locPanel">
  
          <!-- Search input -->
          <div class="fcc loc-search">
            <input type="text" id="locSearch" placeholder="Search district or city..." autocomplete="off">
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

<!-- ✅ ONE shared popup (shows near clicked category) -->
<div class="catpop" id="catPop" aria-hidden="true">
  <div class="catpop-head">
    <div class="catpop-title" id="catPopTitle">Category</div>
    <button class="catpop-x" id="catPopClose" type="button" aria-label="Close">✕</button>
  </div>
  <div class="catpop-tabs" id="catPopTabs"></div>
  <div class="catpop-list" id="catPopList"></div>
</div>

<section class="quick-stats">
  <div class="quick-stat-card">
    <div class="quick-stat-icon">
      <svg viewBox="0 0 24 24">
        <path d="M6 2h9l5 5v15H6V2Zm8 1.8V8h4.2L14 3.8ZM8 11h8v2H8v-2Zm0 4h8v2H8v-2Z"/>
      </svg>
    </div>
    <strong>300</strong>
    <span>Total Ad</span>
  </div>

  <div class="quick-stat-card">
    <div class="quick-stat-icon">
      <svg viewBox="0 0 24 24">
        <path d="M4 4h16v12H8.7L4 20.7V4Zm2 2v9.9l1.9-1.9H18V6H6Z"/>
      </svg>
    </div>
    <strong>12</strong>
    <span>Responses</span>
  </div>

  <div class="quick-stat-card">
    <div class="quick-stat-icon">
      <svg viewBox="0 0 24 24">
        <path d="M20 2H4a2 2 0 0 0-2 2v18l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM6 9h12v2H6V9Zm0-3h12v2H6V6Zm0 6h8v2H6v-2Z"/>
      </svg>
    </div>
    <strong>13</strong>
    <span>Messages</span>
  </div>

  <button class="quick-stat-card post-property-card" type="button">
    <div class="post-plus">+</div>
    <span>Post You<br>Property Ad</span>
  </button>
</section>

    <section class="section-head wanted-inline-head">
      <h2>My Wanted Ads</h2>
      <a href="#">View All <svg viewBox="0 0 24 24"><path d="m9.2 4.2 7.8 7.8-7.8 7.8-1.8-1.8 6-6-6-6 1.8-1.8Z"/></svg></a>
    </section>

    <!-- Handmade guide version: all tabs are inside the same card -->
    <article class="wanted-tab-card">
      <nav class="wanted-tabs" aria-label="Wanted ad filters">
        <button class="wanted-tab is-active" type="button">All Ads</button>
        <button class="wanted-tab" type="button">Urgent Ads</button>
        <button class="wanted-tab" type="button">Today</button>
        <button class="wanted-tab" type="button">Nearby</button>

        <div class="date-filter-wrap">
          <button class="wanted-tab date-filter-btn" id="dateFilterBtn" type="button">
            Date
            <span class="date-arrow">▾</span>
          </button>

          <div class="date-dropdown" id="dateDropdown">
            <button type="button" data-value="7">Last 7 days</button>
            <button type="button" data-value="14">Last 14 Days</button>
            <button type="button" data-value="30">Last 30 Days</button>
            <button type="button" data-value="90">Last 3 Months</button>
          </div>
        </div>
      </nav>

      <div class="wanted-card-body">
        <div class="wanted-card-top">
          <span class="wanted-home-icon" aria-hidden="true">
            <img src="img/icons/house.svg" alt="">
          </span>

          <div class="wanted-main-info">
            <div class="wanted-pill-row">
              <span class="wanted-chip chip-primary">Want to be Buy</span>
              <span class="wanted-time">2h ago</span>
              <span class="wanted-status">ACTIVE</span>
            </div>

            <div class="wanted-type-row">
              <span class="wanted-chip">House</span>
              <span class="wanted-subtype">- Single Story House</span>
            </div>

            <h3>Looking For 3BR Single Story House.</h3>
            <p class="wanted-budget">Budget : <strong>Rs 55M - Rs 80M</strong></p>

            <div class="wanted-note">
              <strong>NOTE :</strong>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nisi illo amet! Sit tempore ducimus quidem natus consequatur odit eos vel, eius voluptate inventore quae provident consequuntur doloremque obcaecati.</p>
            </div>
          </div>
        </div>

        <div class="wanted-location-box">
          <svg viewBox="0 0 24 24"><path d="M12 2.5a7 7 0 0 0-7 7c0 5.2 7 12 7 12s7-6.8 7-12a7 7 0 0 0-7-7Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/></svg>
          <div>
            <strong>Colombo - 5</strong>
            <span>Ariya - Rajagiriya / Colombo / New Town</span>
          </div>
          <div class="shareToOut">
            <em>5km Around</em>
            <a href="#">Share <img src="img/icons/share-white.svg" alt=""></a>
          </div>
        </div>

        <div class="fsb">
          <div class="wanted-seller-row">
            <span class="seller-avatar"><img src="img/man.webp" alt=""></span>
            <div class="seller-info">
              <strong>Buddhika Dissanayaka</strong>
              <span>By</span>
            </div>
          </div>

          
        </div>

        <div class="wanted-bottom-actions">
          <button class="bookmark-btn" type="button" aria-label="Save ad">
            <svg viewBox="0 0 24 24"><path d="M6 3h12v18l-6-4-6 4V3Z"/></svg>
          </button>
          <a href="single-property.php">View Details</a>
          <button class="responceMainBTN" type="button">Response</button>
          <a href="tel:+94770000000">
            <svg viewBox="0 0 24 24"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.2 1.3.4 2.7.7 4.1.7.7 0 1.3.6 1.3 1.3v3.5c0 .7-.6 1.3-1.3 1.3C10.4 21.8 2.2 13.6 2.2 3.3 2.2 2.6 2.8 2 3.5 2H7c.7 0 1.3.6 1.3 1.3 0 1.4.2 2.8.7 4.1.1.4 0 .9-.3 1.2l-2.1 2.2Z"/></svg>
            Call
          </a>
        </div>
      </div>
    </article>

    <section class="responses-title responseAll">
      <div class="fsb">
        <h2>Responses</h2>
        <a href="#" class="za1">View All <svg viewBox="0 0 24 24"><path d="m9.2 4.2 7.8 7.8-7.8 7.8-1.8-1.8 6-6-6-6 1.8-1.8Z"/></svg></a>
      </div>
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
      
   
        <div class="pc-details">
          <div class="fa">
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
             <span class="main-details-btn">View Details</span>
           </a>
        </div>
  
  

     

      <!-- Action buttons -->
      <div class="response-actions">
          <a href="single-property.php">View Details</a>
          <button type="button"><svg viewBox="0 0 24 24"><path d="M4 4h16v12H8.7L4 20.7V4Z"/></svg>Chat</button>
          <a href="tel:+94770000000"><svg viewBox="0 0 24 24"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.2 1.3.4 2.7.7 4.1.7.7 0 1.3.6 1.3 1.3v3.5c0 .7-.6 1.3-1.3 1.3C10.4 21.8 2.2 13.6 2.2 3.3 2.2 2.6 2.8 2 3.5 2H7c.7 0 1.3.6 1.3 1.3 0 1.4.2 2.8.7 4.1.1.4 0 .9-.3 1.2l-2.1 2.2Z"/></svg>Call</a>
          <button class="bookmark-btn" type="button" aria-label="Save ad">
              <svg viewBox="0 0 24 24"><path d="M6 3h12v18l-6-4-6 4V3Z"/></svg>
          </button>
        </div>

    </div>
  </div>
  
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
        <div class="pc-details">
          <div class="fa">
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
             <span class="main-details-btn">View Details</span>
           </a>
        </div>
  

     

      <!-- Action buttons -->
      <div class="response-actions">
          <a href="single-property.php">View Details</a>
          <button type="button"><svg viewBox="0 0 24 24"><path d="M4 4h16v12H8.7L4 20.7V4Z"/></svg>Chat</button>
          <a href="tel:+94770000000"><svg viewBox="0 0 24 24"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.2 1.3.4 2.7.7 4.1.7.7 0 1.3.6 1.3 1.3v3.5c0 .7-.6 1.3-1.3 1.3C10.4 21.8 2.2 13.6 2.2 3.3 2.2 2.6 2.8 2 3.5 2H7c.7 0 1.3.6 1.3 1.3 0 1.4.2 2.8.7 4.1.1.4 0 .9-.3 1.2l-2.1 2.2Z"/></svg>Call</a>
          <button class="bookmark-btn" type="button" aria-label="Save ad">
              <svg viewBox="0 0 24 24"><path d="M6 3h12v18l-6-4-6 4V3Z"/></svg>
          </button>
        </div>

    </div>
  </div>
    </section>
  </main>

  <script src="wanted-property.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const backButton = document.querySelector(".plain-icon");

    if (backButton) {
      backButton.addEventListener("click", function () {
        window.history.back();
      });
    }
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
</script>

<script>
document.querySelectorAll(".wanted-tab").forEach(function(tab){
  tab.addEventListener("click", function(){
    document.querySelectorAll(".wanted-tab").forEach(function(item){ item.classList.remove("is-active"); });
    tab.classList.add("is-active");
  });
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".wanted-tab");
  const dateWrap = document.querySelector(".date-filter-wrap");
  const dateBtn = document.getElementById("dateFilterBtn");
  const dateDropdown = document.getElementById("dateDropdown");
  const dateOptions = document.querySelectorAll(".date-dropdown button");

  if (!dateWrap || !dateBtn || !dateDropdown) return;

  dateBtn.addEventListener("click", function (e) {
    e.stopPropagation();

    tabs.forEach(function (tab) {
      tab.classList.remove("is-active");
    });

    dateBtn.classList.add("is-active");
    dateWrap.classList.toggle("open");
  });

  dateOptions.forEach(function (option) {
    option.addEventListener("click", function (e) {
      e.stopPropagation();

      dateOptions.forEach(function (btn) {
        btn.classList.remove("is-selected");
      });

      option.classList.add("is-selected");

      dateBtn.innerHTML = option.textContent + ' <span class="date-arrow">▾</span>';

      dateWrap.classList.remove("open");

      const selectedValue = option.getAttribute("data-value");
      console.log("Selected date filter:", selectedValue);
    });
  });

  document.addEventListener("click", function () {
    dateWrap.classList.remove("open");
  });
});
</script>


<!-- Response -->
 <Script>
   document.addEventListener("DOMContentLoaded", function() {
  const responseBtn = document.querySelector(".responceMainBTN");
  const responseSection = document.querySelector(".responseAll");

  if(responseBtn && responseSection){
    responseBtn.addEventListener("click", function(){
      responseSection.style.display = "block"; // show the section
      responseSection.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const responseBtn = document.querySelector(".responceMainBTN");
  const responseSection = document.querySelector(".responseAll");

  if(responseBtn && responseSection){
    // initial hidden styles
    responseSection.style.maxHeight = "0";
    responseSection.style.overflow = "hidden";
    responseSection.style.transition = "max-height 0.5s ease, opacity 0.5s ease";
    responseSection.style.opacity = "0";

    responseBtn.addEventListener("click", function(){
      if(responseSection.style.maxHeight === "0px" || responseSection.style.maxHeight === "0") {
        // show section
        responseSection.style.maxHeight = responseSection.scrollHeight + "px";
        responseSection.style.opacity = "1";
      } else {
        // hide section
        responseSection.style.maxHeight = "0";
        responseSection.style.opacity = "0";
      }
    });
  }
});
 </Script>

</body>
</html>
