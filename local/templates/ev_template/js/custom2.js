$('.popup-images.popup-images_1').magnificPopup({
  delegate: '.popup-images__item',
  type: 'image'
});

$('.popup-images.popup-images_2').magnificPopup({
  delegate: '.popup-images__item',
  type: 'image',
  image: {
    markup: '<div class="mfp-figure">' +
      '<div class="mfp-close"></div>' +
      '<div class="mfp-img-wrapper">' +
      '<div class="mfp-img"></div><div class="mfp-img-detail"></div></div>' +
      '<div class="mfp-bottom-bar">' +
      '<div class="mfp-title"></div>' +
      '<div class="mfp-counter"></div>' +
      '</div>' +
      '</div>',
    cursor: 'mfp-zoom-out-cur',
    titleSrc: 'title',
    verticalFit: true,
    tError: '<a href="%url%">The image</a> could not be loaded.'
  },
  callbacks: {
    markupParse: (template, _, item) => {
      template.find('.mfp-img-detail')[0].innerHTML = item.el[0].dataset.detail;
    }
  }
});
