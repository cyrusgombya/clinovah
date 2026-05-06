
document.addEventListener("DOMContentLoaded", function () {
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
          document.querySelector(".profile-pic").src = e.target.result;
        };
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  
    document.querySelector(".file-upload").addEventListener("change", function () {
      readURL(this);
    });
  });