

//========================================
//        NAVBAR FIXED WHEN SCROLL
//========================================
$(window).on("scroll", function () {
    var scrolling = $(this).scrollTop();
    if (scrolling > 100) {
        $(".header-part").addClass("header-fixed");
    } else {
        $(".header-part").removeClass("header-fixed");
    }
});


//========================================
//     HEADER SEARCH ADVANCE OPTION
//========================================
$('.option-btn').on('click', function () {
    $('.header-search').toggleClass('active');
    $('.header-option').slideToggle('slow');
});


//========================================
//       HEADER RESPONSIVE SEARCH
//========================================
$('.search-btn').on('click', function () {
    $('.header-form').slideToggle('slow');
    $(this).children('.fa-search').toggleClass('fa-times');
});


//========================================
//          SIDEBAR MENU SLIDE
//========================================
$('.sidebar-btn').on('click', function () {
    $('.sidebar-part').addClass('active');
    $('.sidebar-cross').on('click', function () {
        $('.sidebar-part').removeClass('active');
    });
});


//========================================
//         FILTER SIDEBAR SLIDE
//========================================
$('.filter-btn').on('click', function () {
    $('.filter-sidebar').addClass('active');
});

$('.filter-cross').on('click', function () {
    $('.filter-sidebar').removeClass('active');
});

// Remove active class if clicking outside of filter-container
$(document).on('click', function (e) {
    if (!$(e.target).closest('.filter-container, .filter-btn').length) {
        $('.filter-sidebar').removeClass('active');
    }
});


//========================================
//     HEADER ICON DROPDOWN CARD
//========================================
$('.header-widget').on('click', function () {
    $(this).next('.dropdown-card').slideToggle();

    var dropdownCard = $(this).next('.dropdown-card');
    if ($('.dropdown-card:visible')) {
        $('.dropdown-card').hide();
        dropdownCard.show();
    }
    else if ($('.dropdown-card:hidden')) {
        dropdownCard.show();
    }
});


//========================================
//        DROPDOWN CATEGORY MENU
//========================================
$(function () {
    $(".navbar-dropdown a").click(function () {
        $(this).next().toggle();
        if ($('.dropdown-list:visible').length > 1) {
            $('.dropdown-list:visible').hide();
            $(this).next().show();
        }
    });
});


//========================================
//         NASTED DROPDOWN MENU
//========================================
$(function () {
    $(".nasted-menu").click(function () {
        $(this).next().toggle();
        if ($('.nasted-menu-list:visible').length > 1) {
            $('.nasted-menu-list:visible').hide();
            $(this).next().show();
        }
    });
});


//========================================
//        FEATURE WISHLIST ACTIVE
//========================================
$('.feature-wish').on('click', function () {
    $(this).toggleClass('active');
});


//========================================
//     PRODUCT CARD WISHLIST ACTIVE
//========================================
$('.product-btn .fa-heart').on('click', function () {
    $(this).toggleClass('fas');
});


//========================================
//      LANGUAGE OR CURRENCY ACTIVE
//========================================
$('.modal-link').on('click', function () {
    $('.modal-body').children().removeClass('active');
    $(this).addClass('active');
});


//========================================
//        PRODUCT WIDGET CATEGORY
//========================================
$('.product-widget-link').on('click', function () {
    const dropdown = $(this).next('.product-widget-dropdown');

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        dropdown.slideUp('slow');
    }

    else {
        $('.product-widget-link').removeClass('active');
        $('.product-widget-dropdown').slideUp('slow');

        $(this).addClass('active');
        dropdown.slideDown('slow');
    }
});

//========================================
//        PRODUCT WIDGET BUTTON
//========================================
$('.product-widget-button').on('click', function () {
    $('.product-widget-button').removeClass('active');
    $(this).addClass('active');
});


//========================================
//        PASSWORD HIDE & SHOW
//========================================
$(".eye").on('click', function () {
    $(".eye").toggleClass("fa-eye-slash");
    $(".eye").toggleClass("fa-eye");

    var input = $("#pass");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    }
    else {
        input.attr("type", "password");
    }
});


//========================================
//        SIDEBAR TAB TOGGLE
//========================================
$(".navbar-widget li").on("click", function () {
    $(".navbar-widget li").removeClass("active");
    $(this).addClass("active");
});


//========================================
//        SIDEBAR HIDE & SHOW
//========================================
$(".navbar-user").on("click", function () {
    $(".sidebar-part").addClass("active");
    $(".cross-btn").on('click', function () {
        $(".sidebar-part").removeClass("active");
    });
});


//========================================
//        USER EDIT OPTION
//========================================
$(".edit-btn").on('click', function () {
    $(".edit-option").addClass("active");
    $(".cancel").on('click', function () {
        $(".edit-option").removeClass("active");
    });
});


//========================================
//        MESSAGE SEARCH BAR
//========================================
$('.message-filter-btn').on('click', function () {
    $('.message-filter-src').toggleClass('active');
    $(this).children('.fa-search').toggleClass('fa-times');
});


//========================================
//        MESSAGE ACTIVE LIST
//========================================
$('.message-item').on('click', function () {
    $('.message-list li').removeClass('active');
    $(this).addClass('active');
});


//========================================
//        FOLLOW AUTHOR ACTIVE
//========================================
$('.author-widget .follow').on('click', function () {
    $(this).toggleClass('active');
});


//========================================
//        WISHLIST ACTIVE
//========================================
$('.wish').on('click', function () {
    $(this).toggleClass('active');
});


//========================================
//        REVIEW WIDGET MENU
//========================================
$('.review-dots-btn').on('click', function () {
    $(this).next('.review-widget-list').toggleClass('active');
});


//========================================
//        PRICE RANGE SLIDER
//========================================
let priceGap = 500;

document.querySelectorAll(".price-range-wrapper").forEach(wrapper => {
    const isRTL = getComputedStyle(wrapper).direction === "rtl";

    const rangeSlider = wrapper.querySelector(".slider-container .price-slider");
    const rangeInputs = wrapper.querySelectorAll(".range-input input");
    const priceInputs = wrapper.querySelectorAll(".price-input input");

    priceInputs.forEach(input => {
        input.addEventListener("input", e => {
            let minp = parseInt(priceInputs[0].value);
            let maxp = parseInt(priceInputs[1].value);
            let diff = maxp - minp;

            if (minp < 0) {
                alert("Minimum price cannot be less than 0");
                priceInputs[0].value = 0;
                minp = 0;
            }

            if (maxp > 10000) {
                alert("Maximum price cannot be greater than 10000");
                priceInputs[1].value = 10000;
                maxp = 10000;
            }

            if (minp > maxp - priceGap) {
                priceInputs[0].value = maxp - priceGap;
                minp = maxp - priceGap;

                if (minp < 0) {
                    priceInputs[0].value = 0;
                    minp = 0;
                }
            }

            if (diff >= priceGap && maxp <= rangeInputs[1].max) {
                if (e.target.classList.contains("min-input")) {
                    rangeInputs[0].value = minp;
                    if (isRTL) {
                        rangeSlider.style.right = `${(minp / rangeInputs[0].max) * 100}%`;
                    } else {
                        rangeSlider.style.left = `${(minp / rangeInputs[0].max) * 100}%`;
                    }
                } else {
                    rangeInputs[1].value = maxp;
                    if (isRTL) {
                        rangeSlider.style.left = `${100 - (maxp / rangeInputs[1].max) * 100}%`;
                    } else {
                        rangeSlider.style.right = `${100 - (maxp / rangeInputs[1].max) * 100}%`;
                    }
                }
            }
        });
    });

    rangeInputs.forEach(input => {
        input.addEventListener("input", e => {
            let minVal = parseInt(rangeInputs[0].value);
            let maxVal = parseInt(rangeInputs[1].value);
            let diff = maxVal - minVal;

            if (diff < priceGap) {
                if (e.target.classList.contains("min-range")) {
                    rangeInputs[0].value = maxVal - priceGap;
                } else {
                    rangeInputs[1].value = minVal + priceGap;
                }
            } else {
                priceInputs[0].value = minVal;
                priceInputs[1].value = maxVal;

                if (isRTL) {
                    rangeSlider.style.right = `${(minVal / rangeInputs[0].max) * 100}%`;
                    rangeSlider.style.left = `${100 - (maxVal / rangeInputs[1].max) * 100}%`;
                } else {
                    rangeSlider.style.left = `${(minVal / rangeInputs[0].max) * 100}%`;
                    rangeSlider.style.right = `${100 - (maxVal / rangeInputs[1].max) * 100}%`;
                }
            }
        });
    });
});


//========================================
//        FILTERING WIDGET ITEMS
//========================================
function searchFilter(inputElement, textElements, hideElement) {
    const input = document.querySelector(inputElement);
    const allText = document.querySelectorAll(textElements);


    input?.addEventListener('keyup', function () {
        const value = input.value.toLowerCase().trim();

        allText.forEach(function (text) {
            const parent = text.closest(hideElement);

            if (text.textContent.toLowerCase().includes(value)) {
                parent.style.display = 'block';
            } else {
                parent.style.display = 'none';
            }
        });
    });
}
searchFilter(
    '.category-search-input',
    '.category-search-text',
    '.product-widget-dropitem',
)
searchFilter(
    '.popular-search-input',
    '.popular-search-text',
    '.popular-search-item',
)
searchFilter(
    '.city-search-input',
    '.city-search-text',
    '.city-search-item',
)

document.getElementById("contactForm").addEventListener("submit", function (e) {

    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let subject = document.getElementById("subject").value.trim();
    let message = document.getElementById("message").value.trim();

    // Validation
    if (name === "") {
        alert("Please enter your name.");
        return;
    }

    if (email === "") {
        alert("Please enter your email.");
        return;
    }

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    if (subject === "") {
        alert("Please enter the subject.");
        return;
    }

    if (message === "") {
        alert("Please enter your message.");
        return;
    }

    let whatsappMessage =
        `*New Contact Form Enquiry*

*Name:* ${name}
*Email:* ${email}
*Subject:* ${subject}

*Message:*
${message}`;

    let url = "https://wa.me/971564527879?text=" + encodeURIComponent(whatsappMessage);

    window.open(url, "_blank");

});

const input = document.getElementById("images");
const preview = document.getElementById("preview-container");

if (input && preview) {

    input.addEventListener("change", function () {

        preview.innerHTML = "";

        Array.from(this.files).forEach(file => {

            const div = document.createElement("div");
            div.className = "preview-item";

            // Image Preview
            if (file.type.startsWith("image/")) {

                const reader = new FileReader();

                reader.onload = function (e) {

                    div.innerHTML = `
                        <img src="${e.target.result}" alt="${file.name}">
                        <p>${file.name}</p>
                    `;

                    preview.appendChild(div);
                };

                reader.readAsDataURL(file);
            }

            // PDF Preview
            else if (file.type === "application/pdf") {

                div.innerHTML = `
                    <div class="pdf-preview">
                        <i class="fa fa-file-pdf-o" style="font-size:50px;color:#dc3545;"></i>
                        <p>${file.name}</p>
                    </div>
                `;

                preview.appendChild(div);
            }

        });

    });

}

// const input = document.getElementById("images");
// const preview = document.getElementById("preview-container");

// input.addEventListener("change", function () {

//     preview.innerHTML = "";

//     Array.from(this.files).forEach(file => {

//         const reader = new FileReader();

//         reader.onload = function (e) {

//             const div = document.createElement("div");
//             div.className = "preview-item";

//             div.innerHTML = `
//                 <img src="${e.target.result}">
//             `;

//             preview.appendChild(div);

//         }

//         reader.readAsDataURL(file);

//     });

// });



