// Selectors
var grid = document.querySelector('.grid');
var msnry;
var imgAll = document.querySelectorAll('.grid-item');
var imgCardiologist = document.querySelectorAll('.cardiologist');
var imgDentist = document.querySelectorAll('.dentist');
var imgNeurologist = document.querySelectorAll('.neurologist');
var imgOsteopaths = document.querySelectorAll('.osteopaths');
var imgPhysicians = document.querySelectorAll('.physicians');

// Buttons
const tabsUl = document.getElementById('filter-tab-group');
const lis = tabsUl.children;

// Initialize Masonry after images load
imagesLoaded(grid, function () {
    setTimeout(() => {
        msnry = new Masonry(grid, {
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true
        });
    }, 1000);
});

// Toggle active tab
function toggleClass(selectedElem, allElems, className) {
    [...allElems].forEach(elem => {
        elem.querySelector(".tab-filter").classList.remove(className);
    });
    selectedElem.classList.add(className);
}

// Show/hide images based on filter
function showImages(showImg) {
    imgAll.forEach(img => img.style.display = "none");
    showImg.forEach(img => img.style.display = "block");
}

// Event listener for filter buttons
tabsUl.addEventListener('click', (event) => {
    let selectedTab = event.target.closest(".tab-filter");
    if (!selectedTab) return;

    toggleClass(selectedTab, lis, 'active');

    // Filter logic based on button ID
    switch (selectedTab.id) {
        case "all":
            showImages(imgAll);
            break;
        case "cardiologist":
            showImages(imgCardiologist);
            break;
        case "dentist":
            showImages(imgDentist);
            break;
        case "neurologist":
            showImages(imgNeurologist);
            break;
        case "osteopaths":
            showImages(imgOsteopaths);
            break;
        case "physicians":
            showImages(imgPhysicians);
            break;
        default:
            break;
    }

    msnry.layout();
});


