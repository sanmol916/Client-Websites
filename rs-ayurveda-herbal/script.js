/* ============================================================
   R.S Ayurveda Herbal - Horse Power Gold Max
   Flow: Choose variant + pack -> Buy Now -> Order Form -> WhatsApp
   No COD / No online payment gateway. Order placed via WhatsApp.
   ============================================================ */

// ---- CONFIG ----
const WHATSAPP_NUMBER = "919582771432"; // 91 + 9582771432

// ---- PRODUCT DATA (edit prices here) ----
const PRODUCTS = {
  Oil: {
    label: "Horse Power Gold Max Oil",
    img: "assets/oil.png",
    qty: "1 Bottle",
    price: 999,
    old: 1499,
  },
  Capsules: {
    label: "Horse Power Gold Max Capsules",
    img: "assets/capsule.png",
    qty: "30 Capsules",
    price: 1499,
    old: 1999,
  },
};

let selectedType = "Oil";

const rupee = n => "₹" + n.toLocaleString("en-IN");

// ---- ELEMENTS ----
const $ = id => document.getElementById(id);
const psPrice    = $("psPrice");
const psOld      = $("psOld");
const psSave     = $("psSave");
const packNote   = $("packNote");
const galleryMain= $("galleryMain");
const mbPrice    = $("mbPrice");
const mbType     = $("mbType");

document.getElementById("year").textContent = new Date().getFullYear();

/* ========== PRODUCT SELECTION ========== */
function updatePrice(){
  const p = PRODUCTS[selectedType];
  const save = p.old - p.price;
  psPrice.textContent = rupee(p.price);
  psOld.textContent   = rupee(p.old);
  psSave.textContent  = "You save " + rupee(save);
  if(packNote) packNote.textContent = p.label + " — " + p.qty;
  mbPrice.textContent = rupee(p.price);
  mbType.textContent  = selectedType + " • " + p.qty;
}

function setMainImage(src, emoji){
  galleryMain.classList.remove("loaded");
  galleryMain.innerHTML = `
    <img src="${src}" alt="Selected product"
         onload="this.closest('.img-placeholder').classList.add('loaded')"
         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';this.closest('.img-placeholder').classList.remove('loaded')" />
    <div class="ph-label"><span>${emoji||"📸"}</span>MAIN IMAGE<br /><small>${src}</small></div>`;
}

// type toggle
document.querySelectorAll(".type-btn").forEach(btn=>{
  btn.addEventListener("click",()=>{
    document.querySelectorAll(".type-btn").forEach(b=>b.classList.remove("active"));
    btn.classList.add("active");
    selectedType = btn.dataset.type;
    setMainImage(btn.dataset.img, selectedType==="Oil"?"🧴":"💊");
    // sync gallery thumbs active
    document.querySelectorAll(".thumb").forEach(t=>t.classList.toggle("active", t.dataset.img===btn.dataset.img));
    updatePrice();
  });
});

// gallery thumbs
document.querySelectorAll(".thumb").forEach(t=>{
  t.addEventListener("click",()=>{
    document.querySelectorAll(".thumb").forEach(x=>x.classList.remove("active"));
    t.classList.add("active");
    setMainImage(t.dataset.img);
  });
});

updatePrice();

/* ========== URGENCY BADGES (advertisement) ========== */
(function urgency(){
  const lv = $("liveVisitors"), sr = $("soldRecent");
  let visitors = 2100 + Math.floor(Math.random()*400);
  let sold = 140 + Math.floor(Math.random()*40);
  lv.textContent = visitors.toLocaleString("en-IN");
  sr.textContent = sold;
  setInterval(()=>{
    visitors += Math.floor(Math.random()*7)-3;
    if(visitors < 1800) visitors = 1800;
    lv.textContent = visitors.toLocaleString("en-IN");
  }, 3000);
  setInterval(()=>{ sold += Math.random()>.6?1:0; sr.textContent = sold; }, 9000);
})();

/* ========== NAV / HAMBURGER ========== */
const nav = $("nav"), hamburger = $("hamburger");
hamburger.addEventListener("click",()=>nav.classList.toggle("open"));
nav.querySelectorAll("a").forEach(a=>a.addEventListener("click",()=>nav.classList.remove("open")));

/* ========== FAQ ACCORDION ========== */
document.querySelectorAll(".faq-q").forEach(q=>{
  q.addEventListener("click",()=>{
    const item = q.closest(".faq-item");
    const ans = item.querySelector(".faq-a");
    const isOpen = item.classList.contains("open");
    document.querySelectorAll(".faq-item").forEach(i=>{i.classList.remove("open");i.querySelector(".faq-a").style.maxHeight=null;});
    if(!isOpen){ item.classList.add("open"); ans.style.maxHeight = ans.scrollHeight + "px"; }
  });
});

/* ========== ORDER MODAL FLOW ========== */
const modal       = $("modal");
const modalClose  = $("modalClose");
const stepForm    = $("stepForm");
const stepConfirm = $("stepConfirm");
const orderForm   = $("orderForm");
const selProduct  = $("selProduct");
const selPrice    = $("selPrice");
const orderSummary= $("orderSummary");
const waSend      = $("waSend");
const backToForm  = $("backToForm");

let currentOrder = { product:"", price:"" };

function openBuy(){
  const p = PRODUCTS[selectedType];
  currentOrder.product = p.label + " (" + p.qty + ")";
  currentOrder.price   = rupee(p.price);
  selProduct.textContent = currentOrder.product;
  selPrice.textContent   = currentOrder.price;
  showStep("form");
  openModal();
}
$("buyNowBtn").addEventListener("click", openBuy);
$("mobileBuyBtn").addEventListener("click", openBuy);

function openModal(){ modal.classList.add("open"); modal.setAttribute("aria-hidden","false"); document.body.style.overflow="hidden"; }
function closeModal(){ modal.classList.remove("open"); modal.setAttribute("aria-hidden","true"); document.body.style.overflow=""; }
modalClose.addEventListener("click", closeModal);
modal.addEventListener("click", e=>{ if(e.target===modal) closeModal(); });
document.addEventListener("keydown", e=>{ if(e.key==="Escape") closeModal(); });

function showStep(which){
  if(which==="form"){ stepForm.classList.remove("hidden"); stepConfirm.classList.add("hidden"); }
  else { stepForm.classList.add("hidden"); stepConfirm.classList.remove("hidden"); }
}
backToForm.addEventListener("click",()=>showStep("form"));

// validation
function setError(id,msg){
  const field = $(id).closest(".field");
  const err = field.querySelector(".err");
  if(msg){ field.classList.add("invalid"); err.textContent=msg; } else { field.classList.remove("invalid"); err.textContent=""; }
}
function validateForm(d){
  let ok=true;
  if(!d.name || d.name.trim().length<2){ setError("fName","Please enter your name"); ok=false; } else setError("fName");
  if(!/^[6-9]\d{9}$/.test(d.mobile)){ setError("fMobile","Enter a valid 10-digit mobile number"); ok=false; } else setError("fMobile");
  if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(d.email)){ setError("fEmail","Enter a valid email address"); ok=false; } else setError("fEmail");
  if(!d.address || d.address.trim().length<8){ setError("fAddress","Please enter your full address"); ok=false; } else setError("fAddress");
  if(!/^\d{6}$/.test(d.pin)){ setError("fPin","Enter a valid 6-digit pin code"); ok=false; } else setError("fPin");
  return ok;
}
["fMobile","fPin"].forEach(id=>{ $(id).addEventListener("input",e=>{ e.target.value=e.target.value.replace(/\D/g,""); }); });

orderForm.addEventListener("submit", e=>{
  e.preventDefault();
  const d = {
    name:$("fName").value.trim(), mobile:$("fMobile").value.trim(), email:$("fEmail").value.trim(),
    address:$("fAddress").value.trim(), pin:$("fPin").value.trim(),
  };
  if(!validateForm(d)) return;

  orderSummary.innerHTML = `
    <div class="row"><span class="k">Product</span><span class="v">${esc(currentOrder.product)} ${esc(currentOrder.price)}</span></div>
    <div class="row"><span class="k">Name</span><span class="v">${esc(d.name)}</span></div>
    <div class="row"><span class="k">Mobile</span><span class="v">${esc(d.mobile)}</span></div>
    <div class="row"><span class="k">Email</span><span class="v">${esc(d.email)}</span></div>
    <div class="row"><span class="k">Address</span><span class="v">${esc(d.address)}</span></div>
    <div class="row"><span class="k">Pin Code</span><span class="v">${esc(d.pin)}</span></div>`;

  const message =
`*NEW ORDER - R.S Ayurveda Herbal*
--------------------------------
*Product:* ${currentOrder.product} ${currentOrder.price}

*Name:* ${d.name}
*Mobile:* ${d.mobile}
*Email:* ${d.email}
*Address:* ${d.address}
*Pin Code:* ${d.pin}
--------------------------------
Please confirm my order. Thank you!`;

  waSend.href = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
  waSend.target = "_blank"; waSend.rel = "noopener";
  showStep("confirm");
});

/* ========== GENERAL WHATSAPP LINKS ========== */
const generalLink = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent("Hi R.S Ayurveda Herbal, I would like to know more about Horse Power Gold Max.")}`;
["waFloat","footerWa"].forEach(id=>{ const el=$(id); if(el){ el.href=generalLink; el.target="_blank"; el.rel="noopener"; } });

/* ============================================================
   REVIEW SYSTEM  (seed reviews + user reviews in localStorage)
   ============================================================ */
const STORAGE_KEY = "rs_ayurveda_reviews";

const SEED_REVIEWS = [
  { name:"Akbar",   rating:5, title:"Good value", body:"Good valuable product. Feeling more energetic. Will order again.", date:"2026-06-20", verified:true },
  { name:"Rakesh S.",rating:5, title:"Really works", body:"Using the capsules for a month, noticed good stamina improvement.", date:"2026-06-14", verified:true },
  { name:"Imran",   rating:4, title:"Nice", body:"Packaging was discreet and delivery fast. Product is genuine.", date:"2026-06-08", verified:true },
  { name:"Deepak",  rating:5, title:"Highly recommend", body:"Ordering on WhatsApp was super easy. No payment hassle. Happy customer.", date:"2026-05-30", verified:true },
  { name:"Sunil K.",rating:5, title:"Best ayurvedic", body:"Tried the oil variant, results are good. Feeling more confident.", date:"2026-05-22", verified:true },
  { name:"Vikas",   rating:4, title:"Value for money", body:"Good product for the price. Genuine ayurvedic ingredients.", date:"2026-05-11", verified:true },
];

// baseline stats to match reference-style credibility
const BASE_STATS = { 5:235, 4:13, 3:8, 2:4, 1:1 };

function loadUserReviews(){
  try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; }
  catch(e){ return []; }
}
function saveUserReviews(list){ localStorage.setItem(STORAGE_KEY, JSON.stringify(list)); }

function allReviews(){
  // newest user reviews first, then seed
  return [...loadUserReviews().slice().reverse(), ...SEED_REVIEWS];
}

function computeStats(){
  const counts = {5:BASE_STATS[5],4:BASE_STATS[4],3:BASE_STATS[3],2:BASE_STATS[2],1:BASE_STATS[1]};
  // add user reviews to counts
  loadUserReviews().forEach(r=>{ counts[r.rating] = (counts[r.rating]||0)+1; });
  let total=0, sum=0;
  for(let s=1;s<=5;s++){ total+=counts[s]; sum+=s*counts[s]; }
  const avg = total ? (sum/total) : 0;
  return { counts, total, avg };
}

function starStr(n){ return "★★★★★".slice(0,n) + "☆☆☆☆☆".slice(0,5-n); }

function renderReviews(){
  const { counts, total, avg } = computeStats();
  $("rsAvg").textContent = avg.toFixed(2);
  $("rsCount").textContent = total.toLocaleString("en-IN");
  $("rsStars").textContent = starStr(Math.round(avg));
  $("avgRatingTop").textContent = avg.toFixed(1);
  $("reviewCountTop").textContent = total.toLocaleString("en-IN");

  // bars
  $("rsBars").innerHTML = [5,4,3,2,1].map(s=>{
    const pct = total ? Math.round(counts[s]/total*100) : 0;
    return `<div class="rs-bar-row">
      <span class="lbl">${s} ★</span>
      <span class="rs-bar-track"><span class="rs-bar-fill" style="width:${pct}%"></span></span>
      <span class="cnt">${counts[s]}</span>
    </div>`;
  }).join("");

  // list
  const list = allReviews();
  $("reviewList").innerHTML = list.map(r=>`
    <div class="review-card">
      <div class="review-head">
        <div class="review-avatar">${esc((r.name||"?").charAt(0).toUpperCase())}</div>
        <div>
          <div class="review-name">${esc(r.name)} ${r.verified?'<span class="verified">Verified</span>':""}</div>
          <div class="review-date">${formatDate(r.date)}</div>
        </div>
      </div>
      <div class="review-stars">${starStr(r.rating)}</div>
      ${r.title?`<div class="review-title">${esc(r.title)}</div>`:""}
      <div class="review-body">${esc(r.body)}</div>
    </div>`).join("");
}

function formatDate(d){
  try { return new Date(d).toLocaleDateString("en-IN",{day:"numeric",month:"short",year:"numeric"}); }
  catch(e){ return d; }
}

// write-a-review UI
const reviewForm = $("reviewForm");
const writeReviewBtn = $("writeReviewBtn");
const cancelReview = $("cancelReview");
const starInput = $("starInput");
let chosenRating = 0;

writeReviewBtn.addEventListener("click",()=>{
  reviewForm.classList.toggle("hidden");
  if(!reviewForm.classList.contains("hidden")) reviewForm.scrollIntoView({behavior:"smooth",block:"center"});
});
cancelReview.addEventListener("click",()=>reviewForm.classList.add("hidden"));

starInput.querySelectorAll("span").forEach(star=>{
  star.addEventListener("mouseenter",()=>paintStars(+star.dataset.val));
  star.addEventListener("click",()=>{ chosenRating=+star.dataset.val; paintStars(chosenRating); $("ratingErr").textContent=""; });
});
starInput.addEventListener("mouseleave",()=>paintStars(chosenRating));
function paintStars(n){ starInput.querySelectorAll("span").forEach(s=>s.classList.toggle("on", +s.dataset.val<=n)); }

reviewForm.addEventListener("submit", e=>{
  e.preventDefault();
  const name = $("rvName").value.trim();
  const title= $("rvTitle").value.trim();
  const text = $("rvText").value.trim();
  if(!chosenRating){ $("ratingErr").textContent="Please select a star rating"; $("ratingErr").style.display="block"; return; }
  if(name.length<2 || text.length<3){ alert("Please enter your name and review text."); return; }

  const list = loadUserReviews();
  list.push({ name, rating:chosenRating, title, body:text, date:new Date().toISOString().slice(0,10), verified:false });
  saveUserReviews(list);

  // reset
  $("rvName").value=""; $("rvTitle").value=""; $("rvText").value="";
  chosenRating=0; paintStars(0);
  reviewForm.classList.add("hidden");
  renderReviews();
  $("reviews").scrollIntoView({behavior:"smooth"});
});

renderReviews();

/* ========== IMAGE PLACEHOLDERS: hide label once a real image loads ========== */
(function initImagePlaceholders(){
  // section/product/benefit/step images
  document.querySelectorAll(".img-placeholder img").forEach(img=>{
    const mark = () => { const box = img.closest(".img-placeholder"); if(box && img.naturalWidth > 0) box.classList.add("loaded"); };
    if(img.complete) mark();
    img.addEventListener("load", mark);
  });
  // logo images: hide the "RS" text fallback when the real logo loads
  document.querySelectorAll(".logo-img").forEach(img=>{
    const fb = img.nextElementSibling;
    const ok = () => { if(img.naturalWidth > 0 && fb) fb.style.display = "none"; };
    if(img.complete) ok();
    img.addEventListener("load", ok);
  });
})();

/* ========== helper ========== */
function esc(str){
  return String(str).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;");
}
