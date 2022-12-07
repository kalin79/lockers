<template>
     <div class="mainNav" v-if="menu[0]">
          <div class="contentMainNav relative">
               <div class="boxBackground d-flex">
                    <div class="boxLeft"></div>
                    <div class="boxRight"></div>
               </div>
               <nav>
                    <div class="container">
                         <div class="d-flex justify-content-between align-items-center">
                              <div class="boxLogo">
                                   <a href="/">
                                        <picture>
                                             <source media="(min-width: 992px)" srcset="/frontend/images/logo.svg">
                                             <img src="/frontend/images/logo.svg" alt="Lockers + Plus">
                                        </picture>
                                   </a>
                              </div>
                              <div class="boxMobileMenu">
                                   <div class="d-flex justify-content-end align-items-center">
                                        <a href="/frontend/pdf/CatalogoProductosLockersPLUS2022.pdf" target="_blank">
                                             <img src="/frontend/images/btn_catalogo.svg" alt="Descargar Catalogo" class="btnCatalogo">
                                        </a>
                                        <a href="javascript:void(0)" v-on:click="viewMenu()">
                                             <img src="/frontend/images/menu.svg" class="btnMenu" />
                                        </a>
                                   </div>
                              </div>
                              <div class="boxNavContent">
                                   <div class="boxCloseNav">
                                        <a href="javascript:void(0)" v-on:click="viewMenu()">
                                             <img src="/frontend/images/close.svg" >
                                        </a>
                                   </div>
                                   <div class="boxNav">
                                        <a href="/" class="logoMovil">
                                             <picture>
                                                  <source media="(min-width: 992px)" srcset="/frontend/images/logo.svg">
                                                  <img src="/frontend/images/logo.svg" alt="Lockers + Plus">
                                             </picture>
                                        </a>
                                        <div class="boxNavegation d-flex align-items-start flex-column flex-xl-row">
                                             <a href="/" class="btnNanv d-flex align-items-center justify-content-start justify-content-xl-center flex-row flex-xl-column ">
                                                  <div class="boxIcon">
                                                       <img src="/frontend/images/home.svg" alt="Principal">
                                                  </div>
                                                  <div class="boxText">
                                                       <span>Principal</span> 
                                                  </div>
                                             </a>
                                             <a :href="`/categoria/${menu[0].slug}`" class="btnNanv d-flex align-items-center justify-content-start justify-content-xl-center flex-row flex-xl-column">
                                                  <div class="boxIcon">
                                                       <img src="/frontend/images/metalico.svg" alt="Lockers Metálicos">
                                                  </div>
                                                  <div class="boxText">
                                                       <span v-html="menu[0].nombre"></span>
                                                  </div>
                                                  
                                             </a>
                                             <a :href="`/categoria/${menu[1].slug}`" class="btnNanv d-flex align-items-center justify-content-start justify-content-xl-center flex-row flex-xl-column">
                                                  <div class="boxIcon">
                                                       <img src="/frontend/images/plastico.svg" alt="Lockers de Plástico">
                                                  </div>
                                                  <div class="boxText">
                                                       <span v-html="menu[1].nombre"></span>
                                                  </div>
                                             </a>
                                             <a :href="`/categoria/${menu[2].slug}`" class="btnNanv d-flex align-items-center justify-content-start justify-content-xl-center flex-row flex-xl-column">
                                                  <div class="boxIcon">
                                                       <img src="/frontend/images/comple.svg" alt="Complementos">
                                                  </div>
                                                  <div class="boxText">
                                                       <span v-html="menu[2].nombre"></span>
                                                  </div>
                                             </a>
                                             <a href="/contactenos" class="btnNanv navLast d-flex align-items-center justify-content-start justify-content-xl-center flex-row flex-xl-column">
                                                  <div class="boxIcon">
                                                       <img src="/frontend/images/contacto.svg" alt="Contáctenos">
                                                  </div>
                                                  <div class="boxText">
                                                       <span>Contáctenos</span>
                                                  </div>
                                             </a>

                                             <div class="btnCatalogoMovil">
                                                  <a href="/frontend/pdf/CatalogoProductosLockersPLUS2022.pdf" target="_blank">
                                                       <img src="/frontend/images/btn_catalogo.svg" alt="Descarga Catalogo">
                                                  </a>
                                             </div>
                                             <div class="boxFooter">
                                                  <div class="boxSocial">
                                                       <div class="d-flex align-items-center justify-content-center">
                                                            <a href="https://www.facebook.com/LockerPlusPeru/" target="_blank">
                                                                 <img src="/frontend/images/facebook.svg" />
                                                            </a>
                                                            <a href="https://www.instagram.com/locker.plus/" target="_blank">
                                                                 <svg height="56.7px" id="Layer_1" style="enable-background:new 0 0 56.7 56.7;" version="1.1" viewBox="0 0 56.7 56.7" width="56.7px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><circle cx="28.1" cy="30" r="4.4"/><path d="M33.6,19.2h-11c-1.6,0-3,0.5-3.9,1.4c-0.9,0.9-1.4,2.3-1.4,3.9v11c0,1.6,0.5,3,1.5,4c1,0.9,2.3,1.4,3.9,1.4h10.9   c1.6,0,3-0.5,3.9-1.4c1-0.9,1.5-2.3,1.5-3.9v-11c0-1.6-0.5-2.9-1.4-3.9C36.6,19.7,35.3,19.2,33.6,19.2z M28.1,36.8   c-3.8,0-6.8-3.1-6.8-6.8c0-3.8,3.1-6.8,6.8-6.8S35,26.2,35,30C35,33.8,31.9,36.8,28.1,36.8z M35.2,24.5c-0.9,0-1.6-0.7-1.6-1.6   s0.7-1.6,1.6-1.6s1.6,0.7,1.6,1.6S36.1,24.5,35.2,24.5z"/><path d="M28.3,5.2c-13.6,0-24.6,11-24.6,24.6c0,13.6,11,24.6,24.6,24.6c13.6,0,24.6-11,24.6-24.6C53,16.2,41.9,5.2,28.3,5.2z    M41.4,35.6c0,2.3-0.8,4.3-2.2,5.7c-1.4,1.4-3.4,2.1-5.6,2.1H22.7c-2.2,0-4.2-0.7-5.6-2.1c-1.5-1.4-2.2-3.4-2.2-5.7v-11   c0-4.6,3.1-7.8,7.8-7.8h11c2.3,0,4.2,0.8,5.6,2.2c1.4,1.4,2.1,3.3,2.1,5.6V35.6z"/></g></svg>
                                                            </a>
                                                       </div>
                                                       <div class="d-flex align-items-center justify-content-center mt-4">
                                                            <p>
                                                                 LOCKER PLUS, Diseño y Calidad Superior. <br>
                                                                 Somos parte del Grupo MALETEK. <br>
                                                                 2022 Todos los Derechos Reservados
                                                            </p>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </nav>
          </div>
     </div>
</template>
<script>
export default {
     data(){
          return {
               menu: []
          }
     },
     created(){
          this.dameTodasCategorias()
     },
     methods: {
          async dameTodasCategorias(){
               try{
                    // Obtenemos la Filtros
                    let sendSolicitud = await axios.get('/api/v1/categoria/ver/todas')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         // console.log(sendSolicitud.data.data.categorias)
                         this.menu = sendSolicitud.data.data.categorias
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          },
          viewMenu: function(){
               console.log(1)
               let menu = $('.boxNavContent')
               if (menu.hasClass('active')){
                    menu.removeClass('active')
               }else{
                    menu.addClass('active')
               }
          }
     }
}
</script>

