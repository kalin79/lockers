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
                                                            <a href="#">
                                                                 <img src="/frontend/images/facebook.svg" />
                                                            </a>
                                                            <a href="#">
                                                                 <img src="/frontend/images/insta.svg" />
                                                            </a>
                                                       </div>
                                                       <div class="d-flex align-items-center justify-content-center mt-4">
                                                            <p>
                                                                 LOCKERS PLUS, Diseño y Calidad Superior. <br>
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

