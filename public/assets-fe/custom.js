mainImg = document.getElementById("mainImg");

thumb1 = document.getElementById("thumb1");
thumb1Src = document.getElementById("thumb1").src;
thumb2 = document.getElementById("thumb2");
thumb2Src = document.getElementById("thumb2").src;
thumb3 = document.getElementById("thumb3");
thumb3Src = document.getElementById("thumb3").src;
thumb4 = document.getElementById("thumb4");
thumb4Src = document.getElementById("thumb4").src;
thumb5 = document.getElementById("thumb5");
thumb5Src = document.getElementById("thumb5").src;
thumb6 = document.getElementById("thumb6");
thumb6Src = document.getElementById("thumb6").src;
thumb7 = document.getElementById("thumb7");
thumb7Src = document.getElementById("thumb7").src;

thumb1.addEventListener("click", function () {
  mainImg.src = thumb1Src;
});
thumb2.addEventListener("click", function () {
  mainImg.src = thumb2Src;
});
thumb3.addEventListener("click", function () {
  mainImg.src = thumb3Src;
});
thumb4.addEventListener("click", function () {
  mainImg.src = thumb4Src;
});
thumb5.addEventListener("click", function () {
  mainImg.src = thumb5Src;
});
thumb6.addEventListener("click", function () {
  mainImg.src = thumb6Src;
});
thumb7.addEventListener("click", function () {
  mainImg.src = thumb7Src;
});
