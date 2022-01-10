// // ===================back to top ====================
// home page
$(window).on('load', function() {
    $(".load-wrap").fadeOut(1000);
    $(".main").fadeIn(1000);
});

//=======================img show list===============

function actionSlideShow(options) {
    let imgIndex =2;
    const formElement =document.querySelector(options.form);
    if(formElement){
        const slideImgs=formElement.querySelectorAll(options.elementShowClass);
        function slideShow() {
                const slideImgFirst = formElement.querySelector(`${options.elementShowClass}.first`);
                const slideImgSecond = formElement.querySelector(`${options.elementShowClass}.second`);
                const slideImgThird = slideImgs[imgIndex]
                const slideImgFourth = slideImgs[imgIndex === slideImgs.length -1 ?  0 : imgIndex + 1]
                slideImgFourth.classList.replace('fourth', 'third')
                slideImgThird.classList.replace('third', 'second')
                slideImgSecond.classList.replace('second', 'first')
                slideImgFirst.classList.replace('first', 'fourth')
                imgIndex++;
                if(imgIndex >= slideImgs.length) { //imgIndex: 0-7, slideImgs.length: 8
                    imgIndex = 0;
                }
                setTimeout(slideShow,`${options.iterationTime}`)
            }
            slideShow();
        
    }
}


$('#list-item__showlisttour_1').slick({

    cssEase: 'linear',
    infinite: true,
    arrows: false,
    initialSlide: 0,
    pauseOnFocus: true, 
    speed: 1000,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll:3,
    cssEase: 'linear',
    autoplaySpeed: 6000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
                dots:true
            }
        }

    ]
});
$('#list-item__showlisttour_2').slick({
    infinite: true,
    arrows: false,
    initialSlide: 0,
    pauseOnFocus: true, 
    speed: 1000,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll:3,
    cssEase: 'linear',
    autoplaySpeed: 8000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
                dots:true,
            }
        }

    ]
});
$('#list-item__showlisttour').slick({
    infinite: true,
    arrows: false,
    initialSlide: 0,
    pauseOnFocus: true, 
    speed: 1000,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll:3,
    cssEase: 'linear',
    autoplaySpeed: 9000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 1000,
                dots:true
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
                dots:true
            }
        }

    ]
});

$('#form1').css({"margin-left":"-200%"});   
$('.listItemHot1').css({"margin-left":"115%","transition": "all 2s",});

window.addEventListener('scroll', () => {
    const listItemHot=$('#form1');
    const listItemHot1=$('.listItemHot1');
    const listItemHot2Ringht=$('#form2');
    const listItemHot2Left=$('.listItemHot2');
    const listItemHot3Ringht=$('#form3');
    const listItemHot3Left=$('.listItemHot3');

    let scrolLength = window.pageYOffset;
    if(scrolLength>300){
        listItemHot1.css({"margin-left":"0","transition": "all 1.5s"});
        listItemHot.css({"margin-left":"0","transition": "all 1s"});
    }else{
        listItemHot.css({"margin-left":"-200%","transition": "all 2s",});
        listItemHot1.css({"margin-left":"115%","transition": "all 2s",});
    }
    if(scrolLength>650){
        listItemHot2Ringht.css({"margin-left":"0","transition": "all 1.5s"});
        listItemHot2Left.css({"right":"0","transition": "all 1s"});
    }
    else{
        listItemHot2Ringht.css({"margin-left":"150%","transition": "all 2s",});
        listItemHot2Left.css({"right":"115%","transition": "all 2s",});
    }
    if(scrolLength>1050){
        listItemHot3Ringht.css({"margin-left":"0","transition": "all 1.5s"});
        listItemHot3Left.css({"margin-left":"0","transition": "all 1s"});
    }
    else{
        listItemHot3Ringht.css({"margin-left":"-200%","transition": "all 2s",});
        listItemHot3Left.css({"margin-left":"115%","transition": "all 2s",});
    }
});
//more-blog
$(function() {
    const heightElement=$(".content-detial_blog").height();
    if(heightElement >= 1000){
        $(".content-detial_blog").addClass('showmore');
        $('.btn-read_more-detail_blog').css({"display":"flex"});
    }
    $(".btn-read_more-icondown").addClass("moreactive");
    let changeText= $('.btn-read_more.btn-read_more-down');
    changeText.cliked=1;
    changeText.click(function() {
        $(".btn-read_more-icondown").toggleClass("moreactive");
        $(".btn-read_more-iconup").toggleClass("moreactive");
        $(".content-detial_blog.showmore").toggleClass("moreactive");
        $(".btn-read_more.btn-read_more-down").text((changeText.cliked++ % 2 == 0) ? "Thêm" : "Thu gọn");
    })   
})
// </img show list>
var btn = $('#button-back-top');
var btn = $('#button-back-top');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});
// // =================scoll header====================
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    var height = "200px"
    header.classList.toggle("sticky", window.scrollY > 0);
});

// fillter location
// selectedLocation.addEventListener("click", () => {
//     ContainerLocation.classList.add("active");
// });

// listOptionLocation.forEach(o => {
//     o.addEventListener("click", () => {
//         selectedLocation.innerHTML = o.querySelector("label").innerHTML;
//         ContainerLocation.classList.remove("active");
//     })
// });

$('#slider').slick({
    fade: !0,
    cssEase: 'linear',
    touchMove: true,
    speed: 600,
    autoplay: true,
    autoplaySpeed: 6000,
    pauseOnHover: false,
    useTransform: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrows: true,
            speed: 600,
            autoplay: true,
            autoplaySpeed: 6000,
        }
    }],
    responsive: [{
        breakpoint: 740,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrows: false,
            speed: 600,
            autoplay: true,
            autoplaySpeed: 6000,
        }
    }]
});

// /// list tour product

$('.list-tour').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    arrows: false,
    dots: true,
    speed: 1000,
    autoplay: false,
    autoplaySpeed: 4000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: false,
                speed: 1000,
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 1000,
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
            }
        }

    ]
});

// //stamp
$('.stamp-photo-list').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    arrows: false,
    dots: false,
    arrows: true,
    speed: 2000,
    autoplay: false,
    autoplaySpeed: 4000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: false,
                speed: 1000,
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 1000,
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
            }
        }

    ]
});


$('.review__slide').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    dots: true,
    speed: 2000,
    autoplay: false,
    autoplaySpeed: 4000,
    touchMove: true,
    responsive: [{
            breakpoint: 1324,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                speed: 1000,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: false,
                speed: 1000,
            }
        },
        {
            breakpoint: 739,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
            }
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 1000,
            }
        }

    ]
});

//tab login
// const a = document.querySelector.bind(document)
// const aa = document.querySelectorAll.bind(document)
// var tabsh = document.querySelectorAll('.form-header__action')
// var panes = document.querySelectorAll('.form-body')

// tabsh.forEach((tabsk, index) => {
//     const panel = panes[index];
//     tabsk.onclick = function() {
//         var tabpl = document.querySelector('.form-header__action.active')
//         var formgt = document.querySelector('.form-body.active')
//         tabpl.classList.remove('active')
//         formgt.classList.remove('active')

//         this.classList.add('active')
//         panel.classList.add('active')
//     }
// });


var onChange = document.querySelectorAll('.form-header__action');
  var onChange1 = document.querySelectorAll('.form-body');
  for(var i=0; i<onChange.length;i++){
    const addactive = onChange1[i];
    onChange[i].onclick = function(){
      var onChange1 = document.querySelector('.form-body.active');
      for(var i=0; i<onChange.length;i++){
        onChange[i].classList.remove('active');
        onChange1.classList.remove('active');
      }
      this.classList.add('active');
      addactive.classList.add('active');
    }
  }

// // ====================== tab login================
