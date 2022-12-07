<template>
     <div>
          <div class="componentComplementario">
               <div class="container">
                    <div class="pContent">
                         <div class="boxSubTitle">
                              <h2>Artículos complementarios</h2>
                         </div>
                         <div class="listProducts">
                              <div class="owl-carousel owl-carouselComplementario owl-theme viewProducts">
                                   <div class="item relative" v-for="(complementario, index) in complementarios" :key="index">
                                        <a :href="`/producto/${complementario.data.slug}`">
                                             <div class="boxImage">
                                                  <img :src="`https://locker.codegraph.pe/${complementario.imagen}`" alt="">
                                             </div>
                                             <div class="boxInfo">
                                                  
                                                  <h3>{{ complementario.data.nombre }}</h3>
                                                  <p>
                                                       {{ complementario.data.descripcion_corta }}
                                                  </p>
                                             </div>
                                        </a>
                                   </div>
                                  
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     computed: {
          ...mapGetters({
               complementarios: 'product/getComplementarios',
          })
     },
     mounted: function() {
         let _this = this;
          setTimeout(function(){
              _this.activeCarouselComplementario()
          },1000)
         
     },
     methods: {
          activeCarouselComplementario: function () {
               $('.owl-carouselComplementario').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: false,
                    autoplayTimeout: 118000,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: false,
                    nav: false,
                    margin: 20,
                    responsive:{
                         0:{
                              items: 1,
                         },
                         768:{
                              items: 2,
                         },
                         992:{
                              items: 3,
                         },
                         1200:{
                              items: 4,
                         },
                         1400:{
                              items: 4,
                         }
                    }
               })
          }
     }
}
</script>