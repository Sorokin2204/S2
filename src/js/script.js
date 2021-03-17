var image_field;
$(function () {
  $('.slider__box').slick({
    infinite: false,
    variableWidth: true,

    prevArrow: '.slider__nav-left',
    nextArrow: '.slider__nav-right',

    responsive: [
      {
        breakpoint: 640,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  $('.reason__slider-box').slick({
    variableWidth: true,
    slidesToShow: 1,
    prevArrow: '.reason__nav-left',
    nextArrow: '.reason__nav-right',

    responsive: [
      {
        breakpoint: 640,
        settings: {
          variableWidth: false,
        },
      },
    ],
  });

  $('.comments__slider-box').slick({
    prevArrow: '.comments__nav-left',
    nextArrow: '.comments__nav-right',
  });

  $('.slider-img').slick({
    arrows: false,
    dots: true,
  });

  $('.header__top-inner')
    .clone()
    .appendTo('.header__top .container')
    .addClass('header__top-inner--mobile')
    .css('display', 'none')
    .find('.menu')
    .addClass('menu--mobile')
    .find('.sub-menu')
    .addClass('sub-menu--mobile');

  $('.header__top-inner--mobile').find('.menu-btn').addClass('menu-btn--close');

  $('.menu__item').each(function () {
    if ($(this).find('.sub-menu').length !== 0) {
      $(this).addClass('menu__item--sub-menu');
      $(this).click(function (e) {
        if ($(this).parent().hasClass('menu--mobile')) {
          // //    $(this).attr('aria-expanded', false);
          // $(this).attr('disabled', true);
          // var dropDown = $(this).find('sub-menu--mobile');
          // $(this).parent().find('.sub-menu--mobile').not(dropDown).slideUp();
          // if ($(this).hasClass('.menu-item--active')) {
          //   $(this).removeClass('menu-item--active');
          // } else {
          //   $(this)
          //     .parent()
          //     .find('menu-item--active')
          //     .removeClass('menu-item--active');
          //   $(this).addClass('menu-item--active');
          // }
          // dropDown.stop(false, true).slideToggle();
          // e.preventDefault();
        } else {
          e.stopPropagation();
          $('.menu__item--active')
            .not($(this))
            .find('.sub-menu')
            .toggleClass('sub-menu--active');
          $('.menu__item--active')
            .not($(this))
            .toggleClass('menu__item--active');
          $(this).toggleClass('menu__item--active');
          $(this).find('.sub-menu').toggleClass('sub-menu--active');
        }
      });
    }
  });

  function priceToggle() {
    if ($('#price-toggle').is(':checked')) {
      $('.prices-tariffs__item-price-year').css('display', 'none');
      $('.prices-tariffs__item-price-month').css('display', 'block');
    } else {
      $('.prices-tariffs__item-price-year').css('display', 'block');
      $('.prices-tariffs__item-price-month').css('display', 'none');
    }
  }
  priceToggle();
  $('#price-toggle').on('change', () => {
    priceToggle();
  });

  $(document).on('click', function () {
    $('.menu__item--active').find('.sub-menu').toggleClass('sub-menu--active');
    $('.menu__item--active').toggleClass('menu__item--active');
  });

  $('.accordion a').click(function (j) {});

  $('.menu-btn').on('click', function () {
    $('.menu-over').toggleClass('menu-over--active');
    $('.header__top-inner--mobile').toggleClass(
      'header__top-inner--mobile-active',
    );
  });

  $('.menu-over').on('click', function () {
    $(this).toggleClass('menu-over--active');
    $('.header__top-inner--mobile').toggleClass(
      'header__top-inner--mobile-active',
    );
  });

  $('.select-img').on('click', function (evt) {
    alert('asdf');
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });

  window.send_to_editor = function (html) {
    imgurl = $('img', html).attr('src');
    image_field.val(imgurl);
    tb_remove();
  };

  $('.business-apps-aside__link').on('click', changeCategory);
});

function changeCategory() {
  $('.business-apps-aside__link').removeClass(
    'business-apps-aside__link--active',
  );
  $(this).addClass('business-apps-aside__link--active');

  $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'business_apps_cat',
      category: $(this).data('slug'),
    },
    success: function (data) {
      $('.business-apps__content').html(data);
    },
  });
}

function tariffsContainer() {
  if (window.innerWidth <= 640) {
    $('.tariffs .container').addClass('container--full');
  } else {
    if ($('.tariffs .container').hasClass('container--full')) {
      $('.tariffs .container').removeClass('container--full');
    }
  }
}

function commentsContainer() {
  if (window.innerWidth <= 960) {
    $('.comments .container').addClass('container--full');
  } else {
    if ($('.comments .container').hasClass('container--full')) {
      $('.comments .container').removeClass('container--full');
    }
  }
}

$(window).on('load', () => {
  tariffsContainer();
  commentsContainer();
});
$(window).resize(() => {
  tariffsContainer();
  commentsContainer();
});

window.onload = () => {
  $('.business-apps-aside__link').first().on('click', changeCategory).click();
};
