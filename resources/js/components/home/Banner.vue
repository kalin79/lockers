<template>
     <div>
          <div class="contentCarruselHome">
               <div class="container">
                    <div class="owl-carousel owl-carouselBannerHome owl-theme">
                         <div class="item relative">
                              <div class="imageFullScreem">
                                   <picture>
                                        <source media="(min-width: 992px)" srcset="/frontend/images/banner.jpg">
                                        <img src="/frontend/images/banner.jpg" alt="">
                                   </picture>
                              </div>
                              <div class="contentCarrusel">
                                   <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10 col-xl-6">
                                             <div class="boxBannerTitles">
                                                  <h3 class="txtUppercase" v-if="doneCategory[0]">{{ dameNombre(doneCategory[0].nombre) }}</h3>
                                                  <h2 class="txtUppercase">
                                                       organiza con <br>
                                                       seguridad
                                                  </h2>
                                             </div>
                                             <div class="boxInfo">
                                                  <div class="minilocker">
                                                       <img src="/frontend/images/minilocker.png" alt="">
                                                  </div>
                                                  <p>
                                                       Optimice su espacio y ofrezca seguridad para <br>
                                                       documentos, art&iacute;culos de trabajo u objetos <br>
                                                       personales.
                                                  </p>
                                                  <div class="boxButton bggris mt-3">
                                                       <button v-on:click="irCatalogo(doneCategory[0].slug)">Ver Catálogo</button>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item relative">
                              <div class="imageFullScreem">
                                   <picture>
                                        <source media="(min-width: 992px)" srcset="/frontend/images/banner2.jpg">
                                        <img src="/frontend/images/banner2.jpg" alt="">
                                   </picture>
                              </div>
                              <div class="contentCarrusel">
                                   <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10 col-xl-6">
                                             <div class="boxBannerTitles">
                                                  <h3 class="txtUppercase" v-if="doneCategory[1]">{{ dameNombre(doneCategory[1].nombre) }}</h3>
                                                  <h2 class="txtUppercase">
                                                       resistente y <br>
                                                       todo terreno
                                                  </h2>
                                             </div>
                                             <div class="boxInfo bgAzul">
                                                  <div class="minilocker">
                                                       <img src="/frontend/images/minilocker2.png" alt="">
                                                  </div>
                                                  <p>
                                                       Fabricada en plástico 100% ABS de alta <br>
                                                       resistencia a los golpes de impacto, con <br>
                                                       protección UV, productos totalmente reciclables.
                                                  </p>
                                                  <div class="boxButton bggris mt-3">
                                                       <button v-on:click="irCatalogo(doneCategory[1].slug)">Ver Catálogo</button>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     computed: {
          ...mapGetters({
               doneCategory: 'category/getCategoria'
          })
     },
     mounted: function() {
         this.activeCarouselBannerHome()
     },
     methods: {
          dameNombre(data){
               if (data){
                    let newData = data
                    newData = newData.replace('<br>', ' ');
                    newData = newData.replace('<BR>', ' ');
                    return newData
               }
          },
          irCatalogo(slug){
               top.location.href = `/categoria/${slug}`;
          },
          activeCarouselBannerHome: function () {
               $('.owl-carouselBannerHome').owlCarousel({
                    loop: true,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: true,
                    nav: false,
                    responsive:{
                         0:{
                              items: 1,
                         }
                    }
               })
          }
     }
}
</script>
