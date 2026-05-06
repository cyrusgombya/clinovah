document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.ba-slider').forEach(function (cur) {
        // Adjust the slider
        var width = cur.offsetWidth + 'px';
        var resizeImg = cur.querySelector('.resize img');
        if (resizeImg) {
            resizeImg.style.width = width;
        }
        // Bind dragging events
        var handle = cur.querySelector('.handle');
        var resize = cur.querySelector('.resize');
        if (handle && resize) {
            drags(handle, resize, cur);
        }
    });

    // This JS for the change of image in hair_color.html
    document.querySelectorAll('.main-color li img').forEach(function (img) {
        img.addEventListener('click', function () {
            var _img_src = this.getAttribute('data-src');
            console.log(_img_src);

            var mainBox = this.closest('.main-box');
            if (mainBox) {
                var largeImage = mainBox.querySelector('.large-image');
                if (largeImage) {
                    largeImage.setAttribute('src', _img_src);
                }
            }
        });
    });
});

window.addEventListener('resize', function () {
    document.querySelectorAll('.ba-slider').forEach(function (cur) {
        var width = cur.offsetWidth + 'px';
        var resizeImg = cur.querySelector('.resize img');
        if (resizeImg) {
            resizeImg.style.width = width;
        }
    });
});

function drags(dragElement, resizeElement, container) {
    dragElement.addEventListener('mousedown', startDrag);
    dragElement.addEventListener('touchstart', startDrag);

    function startDrag(e) {
        e.preventDefault();
        dragElement.classList.add('draggablle');
        resizeElement.classList.add('resizable');

        var startX = e.pageX || e.touches[0].pageX;
        var dragWidth = dragElement.offsetWidth;
        var posX = dragElement.offsetLeft + dragWidth - startX;
        var containerOffset = container.offsetLeft;
        var containerWidth = container.offsetWidth;
        var minLeft = containerOffset + 10;
        var maxLeft = containerOffset + containerWidth - dragWidth - 10;

        function moveDrag(e) {
            e.preventDefault();
            var moveX = e.pageX || e.touches[0].pageX;
            var leftValue = moveX + posX - dragWidth;

            if (leftValue < minLeft) {
                leftValue = minLeft;
            } else if (leftValue > maxLeft) {
                leftValue = maxLeft;
            }

            var widthValue = ((leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth) + '%';
            document.querySelectorAll('.draggablle').forEach(function (el) {
                el.style.left = widthValue;
            });
            document.querySelectorAll('.resizable').forEach(function (el) {
                el.style.width = widthValue;
            });
        }

        function endDrag() {
            dragElement.classList.remove('draggablle');
            resizeElement.classList.remove('resizable');
            document.removeEventListener('mousemove', moveDrag);
            document.removeEventListener('touchmove', moveDrag);
            document.removeEventListener('mouseup', endDrag);
            document.removeEventListener('touchend', endDrag);
        }

        document.addEventListener('mousemove', moveDrag);
        document.addEventListener('touchmove', moveDrag);
        document.addEventListener('mouseup', endDrag);
        document.addEventListener('touchend', endDrag);
    }
}

//   document.addEventListener("DOMContentLoaded", function () {
//     GLightbox({
//       selector: '.glightbox'
//     });
//   });


// lightGallery(document.getElementById('animated-thumbnails-gallery'), {
//     thumbnail: true,
//     selector: 'a',
//     plugins: [lgThumbnail],
// });

document.querySelectorAll('.animated-thumbnails-gallery').forEach((gallery) => {
  lightGallery(gallery, {
      // selector: 'a, div',
      selector: '.lg-item',
    plugins: [lgThumbnail],
    thumbnail: true
  });
});

lightGallery(document.getElementById('instagram-gallery'), {
    selector: '.lg-item',
    thumbnail: true,
    download: false
});



