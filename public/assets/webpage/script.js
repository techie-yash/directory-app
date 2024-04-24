$(document).ready(function(){
  $('.trending-comp-slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  centerPadding: '60px',
  slidesToScroll:2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
});


function toggleIcon(expandIconPlus, expandIconMinus, isOpen) {
if (isOpen) {
    expandIconPlus.style.display = 'none';
    expandIconMinus.style.display = 'block';
} else {
    expandIconPlus.style.display = 'block';
    expandIconMinus.style.display = 'none';
}
}

function createAccordion(el) {
let animation = null;
let isClosing = false;
let isExpanding = false;
const summary = el.querySelector('summary');
const content = el.querySelector('.faq-content');
const expandIconPlus = summary.querySelector('.icon-tabler-circle-plus');
const expandIconMinus = summary.querySelector('.icon-tabler-circle-minus');

function onClick(e) {
    e.preventDefault();
    el.style.overflow = 'hidden';
    if (isClosing || !el.open) {
        open();
    } else if (isExpanding || el.open) {
        shrink();
    }
}

function shrink() {
    isClosing = true;
    const startHeight = `${el.offsetHeight}px`;
    const endHeight = `${summary.offsetHeight}px`;
    if (animation) {
        animation.cancel();
    }
    animation = el.animate({
        height: [startHeight, endHeight]
    }, {
        duration: 400,
        easing: 'ease-out'
    });
    animation.onfinish = () => {
        toggleIcon(expandIconPlus, expandIconMinus, false);
        onAnimationFinish(false);
    };
    animation.oncancel = () => {
        toggleIcon(expandIconPlus, expandIconMinus, false);
        isClosing = false;
    };
}

function open() {
    el.style.height = `${el.offsetHeight}px`;
    el.open = true;
    window.requestAnimationFrame(expand);
}

function expand() {
    isExpanding = true;
    const startHeight = `${el.offsetHeight}px`;
    const endHeight = `${summary.offsetHeight + content.offsetHeight}px`;
    if (animation) {
        animation.cancel();
    }
    animation = el.animate({
        height: [startHeight, endHeight]
    }, {
        duration: 350,
        easing: 'ease-out'
    });
    animation.onfinish = () => {
        toggleIcon(expandIconPlus, expandIconMinus, true);
        onAnimationFinish(true);
    };
    animation.oncancel = () => {
        toggleIcon(expandIconPlus, expandIconMinus, true);
        isExpanding = false;
    };
}

function onAnimationFinish(open) {
    el.open = open;
    animation = null;
    isClosing = false;
    isExpanding = false;
    el.style.height = el.style.overflow = '';
}

summary.addEventListener('click', onClick);
}

document.querySelectorAll('details').forEach(createAccordion);

$(document).ready(function () {
$('.heart').on('click', function () {
   $(this).toggleClass('liked');
});
});

$(".star1").click(function () {
$(".star1").addClass("checked");
$(".star2").removeClass("checked");
$(".star3").removeClass("checked");
$(".star4").removeClass("checked");
$(".star5").removeClass("checked");
var star1 = $(".star1").class();
});
$(".star2").click(function () {
$(".star1").addClass("checked");
$(".star2").addClass("checked");
$(".star3").removeClass("checked");
$(".star4").removeClass("checked");
$(".star5").removeClass("checked");
});
$(".star3").click(function () {
$(".star1").addClass("checked");
$(".star2").addClass("checked");
$(".star3").addClass("checked");
$(".star4").removeClass("checked");
$(".star5").removeClass("checked");
});
$(".star4").click(function () {
$(".star1").addClass("checked");
$(".star2").addClass("checked");
$(".star3").addClass("checked");
$(".star4").addClass("checked");
$(".star5").removeClass("checked");
});
$("star5").click(function () {
$("star1").addClass("checked");
$("star2").addClass("checked");
$("star3").addClass("checked");
$("star4").addClass("checked");
$("star5").addClass("checked");
});

// document.addEventListener("DOMContentLoaded", function() {
//     var shareIcon = document.getElementById("shareIcon");
//     var shareOptions = document.getElementById("shareOptions");

//     shareIcon.addEventListener("click", function(event) {
//         event.preventDefault();
//         shareOptions.style.display = (shareOptions.style.display === 'none' || shareOptions.style.display === '') ? 'block' : 'none';
//     });

//     document.addEventListener("click", function(event) {
//         if (!shareOptions.contains(event.target) && event.target !== shareIcon) {
//             shareOptions.style.display = 'none';
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    var shareIcon = document.getElementById("shareIcon");
    var shareOptions = document.getElementById("shareOptions");

    shareIcon.addEventListener("click", function(event) {
        event.preventDefault();
        shareOptions.style.display = (shareOptions.style.display === 'none' || shareOptions.style.display === '') ? 'block' : 'none';
    });

    // Optional: Close options when clicking outside
    document.addEventListener("click", function(event) {
        if (!shareOptions.contains(event.target) && event.target !== shareIcon) {
            shareOptions.style.display = 'none';
        }
    });
});

function showToastr() {
    // alert('done')
    toastr.error('Please log in first');
}





