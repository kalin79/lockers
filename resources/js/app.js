require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;
try {
     require('jquery-validation/dist/jquery.validate.js');
 } catch (e) {}

 import { gsap, Power4 } from 'gsap';
import Scrolltrigger from 'gsap/ScrollTrigger';
import ScrollToPlugin from 'gsap/ScrollToPlugin';
import EasePack from 'gsap/EasePack';
import EaselPlugin from 'gsap/EasePack';

gsap.registerPlugin(Scrolltrigger);
gsap.registerPlugin(ScrollToPlugin);
gsap.registerPlugin(EasePack);
gsap.registerPlugin(EaselPlugin);

global.gsap = gsap
global.Power4 = Power4


import { createApp } from 'vue';
import  store  from './store/index';


import FooterMain from './components/footer/Footer.vue';
import HeaderNav from './components/header/Nav.vue';

import Home from './components/home/Index.vue';
import Banner from './components/home/Banner.vue';
import Intro from './components/home/Intro.vue';
import CategoriaHome from './components/home/Categoria.vue';
import CalidadHome from './components/home/Calidad.vue';
import Categoria from './components/categoria/Index.vue';
import CategoriaProductos from './components/categoria/listado.vue';
import CategoriaFiltros from './components/categoria/filtros.vue';
import Producto from './components/producto/Index.vue';
import ProductoDetalle from './components/producto/Detalle.vue';
import ProductosComplementarios from './components/producto/Complementario.vue';
import BannerInterno from './components/banner/index.vue';
import BannerInternoProducto from './components/banner/producto.vue';
import Cotizador from './components/cotizador/Cotizador.vue';
import Contacto from './components/contacto/Index.vue';
import BannerContacto from './components/banner/contacto.vue';
import FormularioContacto from './components/contacto/Formulario.vue';
import MapaContacto from './components/contacto/Mapa.vue';


const app = createApp({});

app.component('footer-main',FooterMain);
app.component('header-nav',HeaderNav);
app.component('home-main',Home);
app.component('home-banner',Banner);
app.component('home-intro',Intro);
app.component('cateogria-home',CategoriaHome);
app.component('calidad-home',CalidadHome);
app.component('categoria-main',Categoria);
app.component('categoria-productos',CategoriaProductos);
app.component('categoria-filtros',CategoriaFiltros);
app.component('banner-interno',BannerInterno);
app.component('banner-interno-producto',BannerInternoProducto);
app.component('producto-main',Producto);
app.component('producto-detalle',ProductoDetalle);
app.component('productos-complementarios',ProductosComplementarios);
app.component('cotizador',Cotizador);
app.component('contacto-main',Contacto);
app.component('banner-contact',BannerContacto);
app.component('formulario-contact',FormularioContacto);
app.component('mapa-contact',MapaContacto);
app.use(store);
app.mount('#app');