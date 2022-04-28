const slider = document.querySelector(".slider");
const container = document.querySelector(".slider_container");
const slides = document.querySelectorAll(".slide");
const navigations = document.querySelectorAll(".slider_navigation"); // константы для пользования элемантами в определенных классах

let activeOrder = 0; // переменная для активного окна (изображения), которое находится по центру

init();

// основная функция инициализации для удобства пользования всеми функциями
function init() {
    for (let i = 0; i < slides.length; i++) {
        const slide = slides[i]; // пробежка по слайдами

        slide.dataset.order = i; // порядковый номер для каждого слайда с изображениям
        slide.style.transform =  "translate(-50%, -50%)"; // смещение слайдов
        slide.addEventListener('click', clickHandler);
    }

    for (const navigation of navigations) { // пробежка по навигационным кнопкам
        navigation.addEventListener('click', navigationHandler);
    }
    
    activeOrder = Math.floor(slides.length / 2);

    update();
}

// функция для позиционирования всех слайдов
function update() {

    const {width, height} = container.getBoundingClientRect(); // текущее положение элемента относительно страницы (ширина и высота)

    const slideRect = slides[0].getBoundingClientRect();
    
    // углы поворотов слайдов по полуовалу
    const a = width / 2;
    const b = height / 2;
    const delta = Math.PI / slides.length / 4;

    // отображение слайдов по полуовалу
    for (let i = 0; i < slides.length; i++) {

        const leftSlide = document.querySelector (
            `.slide[data-order="${activeOrder - i}"]`
        );
        
        // формулы для вычесления целых углов между карточками и углами поворота для слайдов
        if (leftSlide) {

            leftSlide.style.zIndex =  slides.length - i; // z-index слайдов для корректного отображения
            leftSlide.style.opacity =  1 - (1.5 * i) / slides.length; // скрытие слайдов за блоком

            // ось x
            leftSlide.style.left = `${
                width / 2 + a * Math.cos((Math.PI * 3) / 2 - delta * i * 2)
            }px`;
            
            // ось y
            leftSlide.style.top = `${
                -b * Math.sin((Math.PI * 3) / 2 - delta * i * 2)
            }px`;

        }

        const rightSlide = document.querySelector (
            `.slide[data-order="${activeOrder + i}"]`
        );
        // формулы для вычесления целых углов между карточками и углами поворота для слайдов
        if (rightSlide) {

            rightSlide.style.zIndex =  slides.length - i;
            rightSlide.style.opacity =  1 - (1.5 * i) / slides.length;
            
            // ось x
            rightSlide.style.left = `${
                width / 2 + a * Math.cos((Math.PI * 3) / 2 + delta * i * 2)
            }px`;
            
            // ось y
            rightSlide.style.top = `${
                -b * Math.sin((Math.PI * 3) / 2 + delta * i * 2)
            }px`;

        }
    }
}

function clickHandler() { // функция обработичка смены картинки по нажатию на любую картинку

    const order = parseInt(this.dataset.order, 10);
    activeOrder = order;

    update();

}

function navigationHandler(e) { // функция обработичка смены картинки по нажатию на кнопки
    e.preventDefault();
    const {dir} = this.dataset;

    if (dir == 'aprev') {
        activeOrder = Math.max(0, activeOrder - 1);
    } 
    else if (dir == 'anext') {
        activeOrder = Math.min(slides.length - 1, activeOrder + 1);
    }
    
    update();

}