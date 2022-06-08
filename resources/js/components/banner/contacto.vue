<template>
     <div>
          <div class="contentCarruselHome bannerInterno">
               <div class="container">
                    <div class="owl-carousel owl-carouselBannerHome owl-theme">
                         <div class="item relative">
                              <div class="imageFullScreem">
                                   <picture>
                                        <source media="(min-width: 992px)" srcset="/frontend/images/bcontacto.jpg">
                                        <img src="/frontend/images/bcontacto.jpg" alt="Contacto">
                                   </picture>
                              </div>
                              <div class="contentCarrusel">
                                   <div class="row">
                                        <div class="col-12 col-md-9">
                                             <div class="boxBannerTitles2">
                                                  <div class="breadcrumbs">
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <a href="/">Principal</a>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                                 <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                            <a href="/contactenos">Contáctenos</a>
                                                            
                                                       </div>
                                                       
                                                  </div>
                                                  <div class="boxContentBanner">
                                                       <h2 class="txtUppercase">
                                                            CONTÁCTENOS
                                                       </h2>
                                                       <p>
                                                            Si deseas información adicional de algunos de nuestros <br>
                                                            productos, no dudes en escribirnos.
                                                       </p>
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
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'

export default {
     computed: {
          ...mapGetters({
               doneProducto: 'product/getProducto',
               doneCategoria: 'category/getCategoria'
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
          activeCarouselBannerHome: function () {
               $('.owl-carouselBannerHome').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: false,
                    autoplayTimeout: 118000,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: false,
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
