document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.tags-slider').forEach(slider => {
        new Swiper(slider, {
            loop: true,

            wrapperClass: 'tags-slider__wrapper',
            slideClass: 'tags-slider__item',

            pagination: {
                el: '.tags-slider-pagination',
                clickable: true,

                bulletClass: 'tags-slider-pagination__item',
                bulletActiveClass: 'tags-slider-pagination__item_active',

                renderBullet: (index, className) =>
                    `<div class="${className}">
                            ${slider.querySelectorAll(`.tags-slider__item`)[index].dataset.slideName}
                        </div>`
            }
        });
    });
});