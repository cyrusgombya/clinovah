document.body.style.overflow = "hidden";

setTimeout(function () {
  var loaders = document.getElementsByClassName("loader-wrapper");
  for (var i = 0; i < loaders.length; i++) {
    loaders[i].style.display = "none";
  }
  document.body.style.overflow = "auto";
}, 3500);

// Initially prevent scrolling
// document.body.style.overflow = "hidden";

// // Wait until the full page is loaded
// window.onload = function () {
//   var loaders = document.getElementsByClassName("loader-wrapper");
//   for (var i = 0; i < loaders.length; i++) {
//     loaders[i].style.display = "none";
//   }
//   // Enable scrolling again
//   document.body.style.overflow = "auto";
// };
