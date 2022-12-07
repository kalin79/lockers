<template>
     <div>
          <footer>
               <div class="container"  v-if="menu[0]">
                    <div class="boxContentFooter">
                         <div class="row">
                              <div class="col-6 col-md-12 col-xl-3 mb-4">
                                   <div>
                                        <a href="/">
                                             <img src="/frontend/images/logo2.svg" class="logoFooter"/>
                                        </a>
                                        <div class="boxSocial">
                                             <div class="d-flex">
                                                  <a href="https://www.facebook.com/LockerPlusPeru/" target="_blank">
                                                       <img src="/frontend/images/facebook.svg" />
                                                  </a>
                                                  <a href="https://www.instagram.com/locker.plus/" target="_blank">
                                                       <svg height="56.7px" id="Layer_1" style="enable-background:new 0 0 56.7 56.7;" version="1.1" viewBox="0 0 56.7 56.7" width="56.7px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><circle cx="28.1" cy="30" r="4.4"/><path d="M33.6,19.2h-11c-1.6,0-3,0.5-3.9,1.4c-0.9,0.9-1.4,2.3-1.4,3.9v11c0,1.6,0.5,3,1.5,4c1,0.9,2.3,1.4,3.9,1.4h10.9   c1.6,0,3-0.5,3.9-1.4c1-0.9,1.5-2.3,1.5-3.9v-11c0-1.6-0.5-2.9-1.4-3.9C36.6,19.7,35.3,19.2,33.6,19.2z M28.1,36.8   c-3.8,0-6.8-3.1-6.8-6.8c0-3.8,3.1-6.8,6.8-6.8S35,26.2,35,30C35,33.8,31.9,36.8,28.1,36.8z M35.2,24.5c-0.9,0-1.6-0.7-1.6-1.6   s0.7-1.6,1.6-1.6s1.6,0.7,1.6,1.6S36.1,24.5,35.2,24.5z"/><path d="M28.3,5.2c-13.6,0-24.6,11-24.6,24.6c0,13.6,11,24.6,24.6,24.6c13.6,0,24.6-11,24.6-24.6C53,16.2,41.9,5.2,28.3,5.2z    M41.4,35.6c0,2.3-0.8,4.3-2.2,5.7c-1.4,1.4-3.4,2.1-5.6,2.1H22.7c-2.2,0-4.2-0.7-5.6-2.1c-1.5-1.4-2.2-3.4-2.2-5.7v-11   c0-4.6,3.1-7.8,7.8-7.8h11c2.3,0,4.2,0.8,5.6,2.2c1.4,1.4,2.1,3.3,2.1,5.6V35.6z"/></g></svg>
                                                  </a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-md-4 col-xl-3 mb-4">
                                   <div class="d-flex">
                                        <div class="boxIcon">
                                             <img src="/frontend/images/ubi.svg" />
                                        </div>
                                        <div class="boxAccess">
                                             <h2>Oficina Central</h2>
                                             <p class="mt-1">
                                                  Carretera Panamericana Sur Km. 29 Lote 9
                                                  (Frente a Tubisa) Lurín - Lima
                                             </p>
                                             <div class="boxLink">
                                                  <a href="" target="_blank" class="txtUppercase">
                                                       UBICAR EN GOOGLE MAPS
                                                  </a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-md-4 col-xl-3 mb-4">
                                   <div class="d-flex">
                                        <div class="boxIcon">
                                             <img src="/frontend/images/chat.svg" />
                                        </div>
                                        <div class="boxAccess">
                                             <h2>Central de información</h2>
                                             <p class="mt-1">
                                                  51 1 934299111
                                             </p>
                                             <div class="boxLink">
                                                  <a href="mailto:ventas@lockerplus.com.pe" target="_blank" class="nounderline">
                                                  ventas@lockerplus.com.pe
                                                  </a>
                                             </div>
                                             <div class="boxLink">
                                                  <a href="" target="_blank" class="">
                                                       WHATSAPP
                                                  </a>
                                             </div>
                                             
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-md-4 col-xl-3 ">
                                   <div class="d-flex">
                                        <div class="boxIcon">
                                             <img src="/frontend/images/map.svg" />
                                        </div>
                                        <div class="boxAccess d-flex flex-column">
                                             <h2>Mapa de Sitio</h2>
                                             <div class="boxLink">
                                                  <a href="/" class="txtUppercase mt-1">
                                                       Principal
                                                  </a>
                                             </div>
                                             <div class="boxLink">
                                                  <a :href="`/categoria/${menu[0].slug}`" class="txtUppercase">
                                                       {{ dameNombre(menu[0].nombre) }}
                                                  </a>
                                             </div>
                                             <div class="boxLink">
                                                  <a :href="`/categoria/${menu[1].slug}`" class="txtUppercase">
                                                       {{ dameNombre(menu[1].nombre) }}
                                                  </a>
                                             </div>
                                             <div class="boxLink">
                                                  <a :href="`/categoria/${menu[2].slug}`" class="txtUppercase">
                                                       {{ dameNombre(menu[2].nombre) }}
                                                  </a>
                                             </div>
                                             <div class="boxLink">
                                                  <a href="/contactenos" class="txtUppercase">
                                                  Contáctenos
                                                  </a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </footer>
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
          dameNombre(data){
               if (data){
                    let newData = data
                    newData = newData.replace('<br>', ' ');
                    newData = newData.replace('<BR>', ' ');
                    return newData
               }
          },
     }
}
</script>

