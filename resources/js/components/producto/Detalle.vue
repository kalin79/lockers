<template>
     <div class="boxDetalleProduct">
          <div class="container">
               <div class="pContent">
                    <div class="row">
                         <div class="col-12 col-lg-6">
                              <div class="boxSlider">
                                   <div id="slider-1" class="owl-carousel owl-carouselInterno owl-theme">
                                        <div class="item relative" v-for="(galeria,index) in galerias" :key="index">
                                             <div class="imageFullScreem">
                                                  <picture>
                                                       <source media="(min-width: 992px)" :srcset="galeria.foto">
                                                       <img :src="galeria.foto" />
                                                  </picture>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="boxSliderThum mt-3">
                                   <div id="slider-2" class="owl-carousel owl-carouselInterno2 owl-theme">
                                        <div class="item relative"  v-for="(galeria,index) in galerias" :key="index">
                                             <div class="imageFullScreem">
                                                  <picture>
                                                       <source media="(min-width: 992px)" :srcset="galeria.foto">
                                                       <img :src="galeria.foto" alt="">
                                                  </picture>
                                             </div>
                                        </div>
                                        
                                   </div>
                              </div>
                              
                         </div>
                         <div class="col-1 d-none d-xl-block col-xl-1"></div>
                         <div class="col-12 col-lg-5">
                              <div class="boxTitle separate">
                                   <h2 class="mediun">{{ producto.nombre }}</h2>
                                   <h4>{{ producto.subtitulo }}</h4>
                              </div>
                              <div class="accordion mt-3" id="accordionPanelsStayOpenProduct">
                                   <div class="accordion-item mb-1">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                             Descripción
                                             </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                             <div class="accordion-body">
                                                  <p>
                                                       {{ producto.descripcion }}
                                                  </p>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="accordion-item mb-1">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                             Usos
                                             </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                             <div class="accordion-body">
                                                  <p>
                                                       {{ producto.usos }}
                                                  </p>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="accordion-item mb-1">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                             Ficha Técnica
                                             </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                             <div class="accordion-body">
                                                  <table class="table table-striped">
                                                       <tbody>
                                                            <tr v-if="(producto.altura != null ) && (producto.altura != '')">
                                                                 <td width="50%"><p class="bold">Alto:</p></td>
                                                                 <td><p >{{ producto.altura }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.ancho != null ) && (producto.ancho != '')">
                                                                 <td ><p class="bold">Ancho:</p></td>
                                                                 <td><p>{{ producto.ancho }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.fondo != null ) && (producto.fondo != '')">
                                                                 <td><p class="bold">Fondo:</p></td>
                                                                 <td><p>{{ producto.fondo }}</p></td>
                                                            </tr>
                                                            <tr v-if="puertas.length > 0 ">
                                                                 <td><p class="bold">Cantidad de puertas:</p></td>
                                                                 <td>
                                                                      <p v-for="(puerta, index) in puertas" :key="index" >{{ puerta.nombre }}</p>
                                                                 </td>
                                                            </tr>
                                                            <tr v-if="(producto.alto != null ) && (producto.alto != '')">
                                                                 <td><p class="bold">Alto de puerta:</p></td>
                                                                 <td><p>{{ producto.alto }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.ancho_puerta != null ) && (producto.ancho_puerta != '')">
                                                                 <td><p class="bold">Ancho de puerta:</p></td>
                                                                 <td><p>{{ producto.ancho_puerta }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.material != null ) && (producto.material != '')">
                                                                 <td><p class="bold">Material:</p></td>
                                                                 <td><p>{{ producto.material }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.pintura != null ) && (producto.pintura != '')">
                                                                 <td><p class="bold">Pintura:</p></td>
                                                                 <td><p>{{ producto.pintura }}</p></td>
                                                            </tr>
                                                            <tr  v-if="colores.length > 0">
                                                                 <td><p class="bold">Colores:</p></td>
                                                                 <td>
                                                                      <div class="d-flex">
                                                                           <div class="boxColor" v-for="(color,index) in colores" :key="index" :style="`background: ${color.valor}`"></div>
                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                            <tr v-if="(producto.puertas_reforzadas != null ) && (producto.puertas_reforzadas != '')">
                                                                 <td><p class="bold">Puertas reforzadas:</p></td>
                                                                 <td><p>{{ producto.puertas_reforzadas }}</p></td>
                                                            </tr>
                                                            <tr v-if="chapas.length > 0">
                                                                 <td><p class="bold">Tipo de cerradura:</p></td>
                                                                 <td>
                                                                      <p v-for="(chapa, index) in chapas" :key="index">{{ chapa.nombre }}</p>
                                                                 </td>
                                                            </tr>
                                                            <tr v-if="cuerpos.length > 0">
                                                                 <td><p class="bold">Cuerpos:</p></td>
                                                                 <td>
                                                                      <p v-for="(cuerpo, index) in cuerpos" :key="index">{{ cuerpo.nombre }}</p>
                                                                 </td>
                                                            </tr>
                                                            <tr v-if="(producto.bisagras != null ) && (producto.bisagras != '')">
                                                                 <td><p class="bold">Bisagras:</p></td>
                                                                 <td><p>{{ producto.bisagras }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.accesorios != null ) && (producto.accesorios != '')">
                                                                 <td><p class="bold">Accesorios:</p></td>
                                                                 <td><p>{{ producto.accesorios }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.garantia != null ) && (producto.garantia != '')">
                                                                 <td><p class="bold">Garant&iacute;a:</p></td>
                                                                 <td><p>{{ producto.garantia }}</p></td>
                                                            </tr>
                                                            <tr v-if="(producto.ficha != null ) && (producto.ficha != '')">
                                                                 <td><p class="bold">Descarga ficha t&eacute;cnica:</p></td>
                                                                 <td><p><a :href="producto.ficha" target="_blank">click aqu&iacute;</a></p></td>
                                                            </tr>
                                                            
                                                       </tbody>
                                                  </table>
                                                  
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="d-flex justify-content-between align-items-start mt-4">
                                   <div class="boxCount">
                                        <div class="d-flex">
                                             <a href="javascript:void(0)" class="left" v-on:click="disminuirItem()">-</a>
                                             <div class="boxNumber">{{ cantidad }}</div>
                                             <a href="javascript:void(0)" class="right" v-on:click="aumentarItem()">+</a>
                                        </div>
                                   </div>
                                   <div class="boxBotonAccess">
                                        <div class="boxButton large">
                                             <button v-on:click="abrirCotizador()">Pide tu Cotización</button>
                                        </div>
                                        <div class="boxButtonLink mt-2 large">
                                             <a :href="url" target="_blank" class="btnWhatsapp">
                                                  <div class="d-flex justify-content-center align-items-center">
                                                       <img src="/frontend/images/whatsapp_icon.png" >
                                                       <span>Quiero un Asesor</span>
                                                  </div>
                                             </a>
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
     data() {
          return {
               sync1: $("#slider-1"),
               sync2: $("#slider-2"),
               syncedSecondary: false,
               url: ""
          }
     },
     computed: {
          ...mapGetters({
               producto: 'product/getProducto',
               galerias: 'product/getGalerias',
               colores: 'product/getColores',
               chapas: 'product/getChapas',
               puertas: 'product/getPuertas',
               cuerpos: 'product/getCuerpos',
               cantidad: 'product/getCantidad',
          })
     },
     mounted: function() {
         this.sync1 =  $("#slider-1");
         this.sync2 =  $("#slider-2");
         this.syncedSecondary = true;
         let _this = this;
         setTimeout(function(){
              _this.activeAllCarousel()
              _this.goWhatsApp()
         },1000)
         
         
     },
     methods: {
          goWhatsApp: function(){
               console.log(this.producto.nombre)
               let miproducto = this.producto.nombre
               let espacio = "%20"
               this.url = `https://api.whatsapp.com/send?phone=51938256301&text=Hola${espacio}Locker+Plus,${espacio}te${espacio}escribo${espacio}desde${espacio}la${espacio}web.${espacio}Estoy${espacio}interesado${espacio}en${espacio}el${espacio}producto:${espacio}${miproducto}${espacio},`
               
          },
          aumentarItem: function(){
               
               this.$store.commit('product/setCantidad', (this.cantidad + 1))
          },
          disminuirItem: function(){
               if (this.cantidad  >= 2)
                    this.$store.commit('product/setCantidad', (this.cantidad - 1))
          },
          abrirCotizador: function(){
               $("#boxFormCotizadorProducto").addClass('active')
          },
          syncPosition2: function(){
               if (this.syncedSecondary) {
                    var number = e.item.index;
                    this.sync1.data('owl.carousel').to(number, 100, true);
               }
          },
          syncPosition: function(e){
               //if you set loop to false, you have to restore this next line
               //var current = el.item.index;

               //if you disable loop you have to comment this block
               // console.log(e.item)
               // var count = e.item.count - 1;
               var count = e.item;
               // console.log(count.index)
               var current = count.index
               var current = Math.round(current - (e.item.count / 2) - .5);

               if (current < 0) {
                    current = count;
               }
               if (current > count) {
                    current = 0;
               }

               //end block

               this.sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");

               let onscreen = this.sync2.find('.owl-item.active').length - 1;
               let start = this.sync2.find('.owl-item.active').first().index();
               let end = this.sync2.find('.owl-item.active').last().index();

               if (current > end) {
                    this.sync2.data('owl.carousel').to(current, 100, true);
               }
               if (current < start) {
                    this.sync2.data('owl.carousel').to(current - onscreen, 100, true);
               }
          },
          activeAllCarousel: function () {
               let slidesPerPage = 3; //globaly define number of elements per page
               const _this = this;
               // console.log(this.sync1)
               this.sync1.owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: true,
                    margin: 10,
                    autoplay: false, 
                    dots: true,
                    loop: true,
                    responsiveRefreshRate: 200,
               }).on('changed.owl.carousel', _this.syncPosition);

               this.sync2
                    .on('initialized.owl.carousel', function() {
                         _this.sync2.find(".owl-item").eq(0).addClass("current");
                    })
                    .owlCarousel({
                         // items: slidesPerPage,
                         dots: false,
                         nav: false,
                         smartSpeed: 200,
                         margin: 10,
                         slideSpeed: 500,
                         slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                         responsiveRefreshRate: 200,
                         responsive:{
                         0:{
                              items: 3,
                              slideBy: 3,
                         },
                         992:{
                              items: slidesPerPage,
                              slideBy: slidesPerPage,
                         }
                    }
                    }).on('changed.owl.carousel', _this.syncPosition2);

               this.sync2.on("click", ".owl-item", function(e) {
                    e.preventDefault();
                    let number = $(this).index();
                    _this.sync1.data('owl.carousel').to(number, 300, true);
               });
               
          }
     }
}
</script>
