import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

let burger = document.querySelector('.burger-menu');
burger.addEventListener('click',function() {
    document.querySelector('.nav-links').classList.toggle('hidden')
    document.querySelector('.nav-links').classList.toggle('flex')
})

let burgerSocial = document.querySelector('.burger-social');
let closeSocial = document.querySelector('.close-social');
burgerSocial.addEventListener('click',function() {
    document.querySelector('.social-media').classList.remove('-right-96')
    document.querySelector('.social-media').classList.add('right-0')
    document.querySelector('#header-overlay').classList.add('block')
    document.querySelector('#header-overlay').classList.remove('hidden')
})
closeSocial.addEventListener('click',function() {
    document.querySelector('.social-media').classList.add('-right-96')
    document.querySelector('.social-media').classList.remove('right-0')
    document.querySelector('#header-overlay').classList.remove('block')
    document.querySelector('#header-overlay').classList.add('hidden')
})
window.addEventListener('scroll',function() {
    document.querySelector('.social-media').classList.add('-right-96')
    document.querySelector('.social-media').classList.remove('right-0')
    document.querySelector('#header-overlay').classList.remove('block')
    document.querySelector('#header-overlay').classList.add('hidden')
    if(this.window.scrollY >= 200) {
      document.getElementById('top').classList.add('opacity-100')
      document.getElementById('top').classList.remove('opacity-0')
      document.getElementById('top').classList.remove('pointer-events-none')
    }
    else{
      document.getElementById('top').classList.add('pointer-events-none')
      document.getElementById('top').classList.add('opacity-0')
      document.getElementById('top').classList.remove('opacity-100')
    }

    if (this.window.scrollY >= 1) {
      var popupElement = document.getElementById('pop-up');
      if (popupElement) {
        popupElement.classList.add('opacity-100');
        popupElement.classList.remove('opacity-0');
        popupElement.classList.remove('pointer-events-none');
      }
    }
    
})

document.getElementById('top').addEventListener('click',function() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
})
var closeButton = document.getElementById('close');

if (closeButton) {
  closeButton.addEventListener('click', function() {
    var popUpElement = document.getElementById('pop-up');
    if (popUpElement) {
      popUpElement.remove();
    }
  });
}


document.querySelector('.search').addEventListener('click',function() {
    document.querySelector('.logo-img').classList.add('hidden')
    document.querySelector('.burger-social').classList.remove('md:block')
    document.querySelector('.nav-links').classList.remove('md:flex')
    document.querySelector('.search-ipt').classList.remove('hidden')
    document.querySelector('.close-search-ipt').classList.remove('hidden')
    // document.querySelector('.logo').classList.add('hidden')
})
document.querySelector('.close-search-ipt').addEventListener('click',function() {
  document.querySelector('.logo-img').classList.remove('hidden')
  document.querySelector('.burger-social').classList.add('md:block')
  document.querySelector('.nav-links').classList.add('md:flex')
  document.querySelector('.search-ipt').classList.add('hidden')
  document.querySelector('.close-search-ipt').classList.add('hidden')
})





