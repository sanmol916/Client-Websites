/* ============================================================
   R.S Ayurveda Herbal - Order flow
   Flow: Buy Now  ->  Order Form  ->  WhatsApp confirm button
   No COD / No online payment gateway. Order is placed via WhatsApp.
   ============================================================ */

// ---- CONFIG ----
const WHATSAPP_NUMBER = "919582771432"; // country code 91 + 9582771432

// ---- ELEMENTS ----
const modal        = document.getElementById("modal");
const modalClose   = document.getElementById("modalClose");
const stepForm     = document.getElementById("stepForm");
const stepConfirm  = document.getElementById("stepConfirm");
const orderForm    = document.getElementById("orderForm");
const selProduct   = document.getElementById("selProduct");
const selPrice     = document.getElementById("selPrice");
const orderSummary = document.getElementById("orderSummary");
const waSend       = document.getElementById("waSend");
const backToForm   = document.getElementById("backToForm");

let currentOrder = { product: "", price: "" };

// ---- YEAR ----
document.getElementById("year").textContent = new Date().getFullYear();

// ---- OPEN MODAL ON BUY NOW ----
document.querySelectorAll("[data-buy]").forEach(btn => {
  btn.addEventListener("click", () => {
    currentOrder.product = btn.getAttribute("data-buy");
    currentOrder.price   = btn.getAttribute("data-price") || "";
    selProduct.textContent = currentOrder.product;
    selPrice.textContent   = currentOrder.price;
    showStep("form");
    openModal();
  });
});

// ---- MODAL CONTROLS ----
function openModal(){
  modal.classList.add("open");
  modal.setAttribute("aria-hidden","false");
  document.body.style.overflow = "hidden";
}
function closeModal(){
  modal.classList.remove("open");
  modal.setAttribute("aria-hidden","true");
  document.body.style.overflow = "";
}
modalClose.addEventListener("click", closeModal);
modal.addEventListener("click", e => { if(e.target === modal) closeModal(); });
document.addEventListener("keydown", e => { if(e.key === "Escape") closeModal(); });

function showStep(which){
  if(which === "form"){ stepForm.classList.remove("hidden"); stepConfirm.classList.add("hidden"); }
  else { stepForm.classList.add("hidden"); stepConfirm.classList.remove("hidden"); }
}
backToForm.addEventListener("click", () => showStep("form"));

// ---- VALIDATION ----
function setError(id, msg){
  const field = document.getElementById(id).closest(".field");
  const err   = field.querySelector(".err");
  if(msg){ field.classList.add("invalid"); err.textContent = msg; }
  else { field.classList.remove("invalid"); err.textContent = ""; }
}

function validateForm(data){
  let ok = true;
  if(!data.name || data.name.trim().length < 2){ setError("fName","Please enter your name"); ok=false; } else setError("fName");
  if(!/^[6-9]\d{9}$/.test(data.mobile)){ setError("fMobile","Enter a valid 10-digit mobile number"); ok=false; } else setError("fMobile");
  if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)){ setError("fEmail","Enter a valid email address"); ok=false; } else setError("fEmail");
  if(!data.address || data.address.trim().length < 8){ setError("fAddress","Please enter your full address"); ok=false; } else setError("fAddress");
  if(!/^\d{6}$/.test(data.pin)){ setError("fPin","Enter a valid 6-digit pin code"); ok=false; } else setError("fPin");
  return ok;
}

// only allow digits in mobile & pin
["fMobile","fPin"].forEach(id => {
  document.getElementById(id).addEventListener("input", e => {
    e.target.value = e.target.value.replace(/\D/g,"");
  });
});

// ---- SUBMIT FORM -> BUILD WHATSAPP MESSAGE ----
orderForm.addEventListener("submit", e => {
  e.preventDefault();
  const data = {
    name:    document.getElementById("fName").value.trim(),
    mobile:  document.getElementById("fMobile").value.trim(),
    email:   document.getElementById("fEmail").value.trim(),
    address: document.getElementById("fAddress").value.trim(),
    pin:     document.getElementById("fPin").value.trim(),
  };

  if(!validateForm(data)) return;

  // Build order summary shown in confirm step
  orderSummary.innerHTML = `
    <div class="row"><span class="k">Product</span><span class="v">${esc(currentOrder.product)} ${esc(currentOrder.price)}</span></div>
    <div class="row"><span class="k">Name</span><span class="v">${esc(data.name)}</span></div>
    <div class="row"><span class="k">Mobile</span><span class="v">${esc(data.mobile)}</span></div>
    <div class="row"><span class="k">Email</span><span class="v">${esc(data.email)}</span></div>
    <div class="row"><span class="k">Address</span><span class="v">${esc(data.address)}</span></div>
    <div class="row"><span class="k">Pin Code</span><span class="v">${esc(data.pin)}</span></div>
  `;

  // Build WhatsApp message
  const message =
`*NEW ORDER - R.S Ayurveda Herbal*
--------------------------------
*Product:* ${currentOrder.product} ${currentOrder.price}

*Name:* ${data.name}
*Mobile:* ${data.mobile}
*Email:* ${data.email}
*Address:* ${data.address}
*Pin Code:* ${data.pin}
--------------------------------
Please confirm my order. Thank you!`;

  waSend.setAttribute("href", `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`);
  waSend.setAttribute("target","_blank");
  waSend.setAttribute("rel","noopener");

  showStep("confirm");
});

// ---- GENERAL WHATSAPP LINKS (float + footer, no order details) ----
const generalMsg = encodeURIComponent("Hi R.S Ayurveda Herbal, I would like to know more about Horse Power Gold Max.");
const generalLink = `https://wa.me/${WHATSAPP_NUMBER}?text=${generalMsg}`;
["waFloat","footerWa"].forEach(id => {
  const el = document.getElementById(id);
  if(el){ el.setAttribute("href", generalLink); el.setAttribute("target","_blank"); el.setAttribute("rel","noopener"); }
});

// ---- helper: escape HTML ----
function esc(str){
  return String(str)
    .replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")
    .replace(/"/g,"&quot;").replace(/'/g,"&#039;");
}
