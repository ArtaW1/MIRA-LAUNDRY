const toggler = document.querySelector(".toggler-btn");
toggler.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("collapsed");
});


// SHOW POPUP
function showPopup(popupId) {
  document.querySelector(popupId).classList.add("active");
}

// HIDE POPUP
function hidePopup(popupId) {
  document.querySelector(popupId).classList.remove("active");
}

// DAFTARAKUN POPUP
document.querySelector("#tambahakun").addEventListener("click", function() {
  showPopup("#formakun");
});
document.querySelector("#formakun .close-btn").addEventListener("click", function() {
  hidePopup("#formakun");
});
document.querySelector("#formakun .batalakun").addEventListener("click", function() {
  hidePopup("#formakun");
});

// DAFTAR PRODUK POPUP
document.querySelector("#tambahproduk").addEventListener("click", function() {
  showPopup("#formproduk");
});
document.querySelector("#formproduk .close-btn").addEventListener("click", function() {
  hidePopup("#formproduk");
});
document.querySelector("#formproduk .batalakun").addEventListener("click", function() {
  hidePopup("#formproduk");
});



// // $(function() {
//   $('#datepicker').datepicker();
// });