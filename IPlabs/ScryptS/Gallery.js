const sliderMain = new Swiper('.slider_main', {
	freeMode: true,
	centeredSlides: true,
	parallax: true,
	mousewheel: true,
	breakpoints: {
		0: {
			slidesPerView: 2,
			spaceBetween: 20
		},
		680: {
			slidesPerView: 3,
			spaceBetween: 60
		}
	}

});

const sliderBg = new Swiper('.slider_bg', {
	freeMode: true,
	centeredSlides: true,
	parallax: true,
	spaceBetween: 60,
	slidesPerView: 3
});
sliderMain.controller.control = sliderBg;
document.querySelectorAll('.slider__item').forEach(item => {
	item.addEventListener('click', event => {
		item.classList.toggle('opened')
	});
});

let desk = document.querySelector('.l_type');

sliderMain.on('slideChange', e => {
	if (sliderMain.activeIndex > 0) {
		desk.classList.add('hidden');
	} else { 
		desk.classList.remove('hidden');
	}
});