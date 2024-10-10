"use strict"
// BURGER
const burger = document.querySelector('.burger__menu');
const burgerMenu = document.querySelector('.main__aside');

burger.addEventListener('click', function() {
    burger.classList.toggle('_active');
    burgerMenu.classList.toggle('_active');
      const isActive = burger.classList.contains('_active') || burgerMenu.classList.contains('_active');
      document.body.style.overflow = isActive ? 'hidden' : '';
});

const dateInput = document.getElementById('dob');
    const indicator = dateInput.querySelector('::-webkit-calendar-picker-indicator');

    dateInput.addEventListener('click', () => {
        dateInput.classList.toggle('rotate-indicator');
});