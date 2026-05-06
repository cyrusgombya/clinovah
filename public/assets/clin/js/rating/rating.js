// Initialize the script after the DOM content has fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Initialize all rating systems
    initializeStarRating();
    initializeFaceRating();
    initializeNumberRating();
    initializeSliderRating();
});

// Star Rating
function initializeStarRating() {
    const ratingStars = [...document.getElementsByClassName("rating-star")];
    const ratingResult = document.querySelector(".rating-value");

    if (ratingResult) {
        printRatingResult(ratingResult, 0);
    }

    executeStarRating(ratingStars, ratingResult);
}

function executeStarRating(stars, result) {
    const starClassActive = "rating-star fa-solid fa-star";
    const starClassUnactive = "rating-star fa-regular fa-star";
    const starsLength = stars.length;

    stars.forEach(star => {
        star.onclick = () => {
            let i = stars.indexOf(star);

            if (star.className.indexOf(starClassUnactive) !== -1) {
                printRatingResult(result, i + 1);
                for (; i >= 0; --i) stars[i].className = starClassActive;
            } else {
                printRatingResult(result, i);
                for (; i < starsLength; ++i) stars[i].className = starClassUnactive;
            }
        };
    });
}

function printRatingResult(result, num = 0) {
    if (result) {
        result.textContent = `${num}`;
    } else {
        console.error("Rating result element not found");
    }
}

// Face Rating
function initializeFaceRating() {
    document.querySelectorAll('.feedback li').forEach(entry => {
        entry.addEventListener('click', e => {
            if (!entry.classList.contains('active')) {
                document.querySelector('.feedback li.active').classList.remove('active');
                entry.classList.add('active');
            }
            e.preventDefault();
        });
    });
}

// Number Rating
function initializeNumberRating() {
    const ratingCard = document.querySelector(".rating_card");
    const backCard = document.querySelector(".back-card");
    const ratingButton = document.querySelector(".rating-button");
    const ratingContainer = document.querySelector(".ratings");
    const ratings = document.querySelectorAll(".rating");
    let rating;

    ratingContainer?.addEventListener("click", (e) => {
        rating = e.target.dataset.rating;
        if (rating) {
            resetNumberRating(ratings);
            ratings[rating]?.classList.add("rating-selected");
        }
    });

    ratingButton?.addEventListener("click", () => {
        if (rating !== undefined) {
            ratingCard?.classList.add("hidden");
            backCard?.classList.remove("hidden");

            const result = document.querySelector(".result");
            if (result) {
                result.textContent = `You selected ${rating} out of 5`;
            }
        }
    });
}

function resetNumberRating(ratings) {
    ratings.forEach(rating => {
        rating.classList.remove("rating-selected");
    });
}

// Slider Rating
function initializeSliderRating() {
    new FaceRating("#face-rating");
}

class FaceRating {
    constructor(qs) {
        this.input = document.querySelector(qs);
        if (this.input) {
            this.input.addEventListener("input", this.update.bind(this));
            this.face = this.input.previousElementSibling;
            this.update();
        }
    }

    update(e) {
        let value = this.input.defaultValue;

        // When manually set
        if (e) value = e.target.value;
        // When initiated
        else this.input.value = value;

        const min = this.input.min || 0;
        const max = this.input.max || 100;
        const percentRaw = ((value - min) / (max - min)) * 100;
        const percent = +percentRaw.toFixed(2);

        this.input.style.setProperty("--percent", `${percent}%`);

        // Face and range fill colors
        const maxHue = 120;
        const hueExtend = 30;
        const hue = Math.round((maxHue * percent) / 100);

        let hue2 = hue - hueExtend;
        if (hue2 < 0) hue2 += 360;

        const hues = [hue, hue2];
        hues.forEach((h, i) => {
            this.face?.style.setProperty(`--face-hue${i + 1}`, h);
        });

        this.input.style.setProperty("--input-hue", hue);

        // Emotions
        const duration = 1;
        const delay = -((duration * 0.99) * percent) / 100;
        const parts = ["right", "left", "mouth-lower", "mouth-upper"];

        parts.forEach(p => {
            const el = this.face?.querySelector(`[data-${p}]`);
            el?.style.setProperty(`--delay-${p}`, `${delay}s`);
        });

        // Aria label
        const faces = [
            "Sad face",
            "Slightly sad face",
            "Straight face",
            "Slightly happy face",
            "Happy face"
        ];
        let faceIndex = Math.floor((faces.length * percent) / 100);
        if (faceIndex === faces.length) faceIndex--;

        this.face?.setAttribute("aria-label", faces[faceIndex]);
    }
}
