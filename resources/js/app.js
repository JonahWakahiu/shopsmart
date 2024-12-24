import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'
import Quill from 'quill';
// import Swiper from 'swiper';
import Swiper from 'swiper/bundle';
import "quill/dist/quill.core.css";
// import 'swiper/css';
import 'swiper/css/bundle';

window.Alpine = Alpine;
window.Quill = Quill;
window.Swiper = Swiper;

Alpine.plugin(collapse)
Alpine.plugin(focus)
Alpine.plugin(persist)
Alpine.start();

