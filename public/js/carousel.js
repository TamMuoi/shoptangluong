$('.section-1').owlCarousel({
    item:1,
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:true,
    nav:true,
    autoplayHoverPause:true,
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:1 ,
        }
    }
})
$('.fashion').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    // dots:true,
    nav:true,
    autoplay:false,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4 ,
        }
    }
})

$('.contact').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:false,
    nav:false,
    autoplay:false,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:5 ,
        }
    }
})

$('.sp-lienquan').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:true,
    nav:true,
    // autoplay:false,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:5 ,
        }
    }
})
