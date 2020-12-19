let menu = document.querySelector('.hamburger'),
    menuNav = document.querySelector('.nav-main'),
    menuNavDouble = document.querySelector('.nav-main_double'),
    menuNavDoubleNext = document.querySelector('.nav-main_double_next'),
    slideNumArea = document.querySelector('.swiper-num-area'),
    slideNumAreaProg = document.querySelector('.programs-slider .swiper-num-area')
    

menu.addEventListener('click', () => {
  if (document.body.clientWidth <= 768) {
    menu.classList.toggle('active');
    document.querySelector('body').classList.toggle('active');
  }
})

if (document.querySelector('.article')) {

  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs,
    },
  });

}


if (document.querySelector('.hero')) {
// tabs

  let tab = document.getElementsByClassName('info-header-tab');
  tabs = document.querySelectorAll('.info-header-tab');
  tabcontent = document.getElementsByClassName('info-tabcontent');
  info = document.getElementsByClassName('info-header')[0];

  function hideTabContent(a) {
    for (let i = a; i < tabcontent.length; i++) {
      tabcontent[i].classList.remove('show');
      tabcontent[i].classList.add('hide');
    }
  }

  hideTabContent(1);

  function showTabContent(b) {
    if (tabcontent[b].classList.contains('hide')) {
      hideTabContent(0);
      tabcontent[b].classList.remove('hide');
      tabcontent[b].classList.add('show');
    }
  }

  info.addEventListener('click', (event) => {
    let target = event.target;
    for (let i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove('active')
    }
    target.classList.add('active')

    if (target.classList.contains('info-header-tab')) {

      for (let i = 0; i < tabcontent.length; i++) {
        if (target == tab[i]) {
          showTabContent(i);
          break;
        }
      }
    }
  })



  var andSwiper = new Swiper('.section-slider', {
    speed: 700,
    direction: 'horizontal',
    spaceBetween: 30,
    slidesPerView: 1,
    clickable: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        speed: 700,
        direction: 'horizontal',
        clickable: true,
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
      }
    }
  })

  var progSwiper = new Swiper('.programs-slider', {
    speed: 700,
    direction: 'horizontal',
    spaceBetween: 30,
    slidesPerView: 1,
    clickable: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.programs-slider .swiper-button-next',
      prevEl: '.programs-slider .swiper-button-prev',
    },
    breakpoints: {
      768: {
        speed: 700,
        direction: 'horizontal',
        clickable: true,
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: '.programs-slider .swiper-button-next',
          prevEl: '.programs-slider .swiper-button-prev',
        }
      }
    }
  })

  andSwiper.on('slideChange', function () {
       setTimeout(function () {
        let slideNum = document.querySelector('.swiper-slide-active');
        slideNumArea.innerHTML = slideNum.getAttribute('data-num') + '/'
    }, 1000);
    
  });

  progSwiper.on('slideChange', function () {
    setTimeout(function () {
     let slideNum = document.querySelector('.programs-slider .swiper-slide-active');
     slideNumAreaProg.innerHTML = slideNum.getAttribute('data-num') + '/'
 }, 1000);
 
});
  // window.onresize = function () {
  //   setTimeout(function () {
  //     var andSwiper = new Swiper('.section-slider', {
  //       speed: 700,
  //       direction: 'horizontal',
  //       spaceBetween: 30,
  //       slidesPerView: 2,
  //       clickable: true,
  //       spaceBetween: 20,
  //       pagination: {
  //         clickable: true,
  //         el: '.mainlp-swiper_pagination'
  //       },
  //       breakpoints: {
  //         768: {
  //           speed: 700,
  //           direction: 'horizontal',
  //           clickable: true,
  //           slidesPerView: 4,
  //           spaceBetween: 30,
  //           allowSlidePrev: true,
  //           allowSlideNext: true,
  //           pagination: false,
  //           navigation: {
  //             nextEl: '.swiper-button-next',
  //             prevEl: '.swiper-button-prev',
  //           }
  //         }
  //       }
  //     })
  //   }, 1000);
  // }

}

//  Скрипт для изменения svg картинок на инлайн svg
$(document).ready(function() {
  $('img[src$=".svg"]').each(function() {
      var $img = jQuery(this);
      var imgURL = $img.attr('src');
      var attributes = $img.prop("attributes");

      $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');

          // Remove any invalid XML tags
          $svg = $svg.removeAttr('xmlns:a');

          // Loop through IMG attributes and apply on SVG
          $.each(attributes, function() {
              $svg.attr(this.name, this.value);
          });

          // Replace IMG with SVG
          $img.replaceWith($svg);
      }, 'xml');
  });
});



