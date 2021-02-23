$(function () {
  $('.slider__box').slick({
    infinite: false,
    variableWidth: true,

    prevArrow: '.slider__nav-left',
    nextArrow: '.slider__nav-right',
  });

  $('.header__top-inner')
    .clone()
    .appendTo('.header__top .container')
    .addClass('header__top-inner--mobile')
    .find('.menu')
    .addClass('menu--mobile')
    .find('.sub-menu')
    .addClass('sub-menu--mobile');

  $('.header__top-inner--mobile').find('.menu-btn').addClass('menu-btn--close');

  $('.menu__item').each(function () {
    if ($(this).find('.sub-menu').length !== 0) {
      $(this).addClass('menu__item--sub-menu');
      $(this).click(function (e) {
        e.stopPropagation();
        $('.menu__item--active')
          .not($(this))
          .find('.sub-menu')
          .toggleClass('sub-menu--active');
        $('.menu__item--active').not($(this)).toggleClass('menu__item--active');
        $(this).toggleClass('menu__item--active');
        $(this).find('.sub-menu').toggleClass('sub-menu--active');
      });
    }
  });

  $(document).on('click', function () {
    $('.menu__item--active').find('.sub-menu').toggleClass('sub-menu--active');
    $('.menu__item--active').toggleClass('menu__item--active');
  });

  $('.menu-btn').on('click', function () {
    $('.menu-over').toggleClass('menu-over--active');
    $('.header__top-inner--mobile').toggleClass(
      'header__top-inner--mobile-active',
    );
    $('.menu__item').each(function () {
      if ($(this).find('.sub-menu').length !== 0) {
        $(this).addClass('menu__item--sub-menu');
        $(this).click(function (e) {
          e.stopPropagation();
          //$('.menu__item--active').not($(this)).find('.sub-menu').slideToggle();
          $('.menu__item--active')
            .not($(this))
            .toggleClass('menu__item--active');
          $(this).toggleClass('menu__item--active');
          $(this).find('.sub-menu').slideToggle();
        });
      }
    });
  });

  $('.menu-over').on('click', function () {
    $(this).toggleClass('menu-over--active');
    $('.header__top-inner--mobile').toggleClass(
      'header__top-inner--mobile-active',
    );
  });
});

$(window).resize(function mobileContainer() {
  if (window.innerWidth < 640) {
    $('.header__bottom .container').addClass('container--mobile');
  } else {
    if ($('.header__bottom .container').hasClass('container--mobile')) {
      $('.header__bottom .container').removeClass('container--mobile');
    }
  }
});
