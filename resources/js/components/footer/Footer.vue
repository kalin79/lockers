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
                                                  <a href="#">
                                                       <img src="/frontend/images/facebook.svg" />
                                                  </a>
                                                  <a href="#">
                                                       <img src="/frontend/images/insta.svg" />
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
                                                  51 1 938 256 301
                                             </p>
                                             <div class="boxLink">
                                                  <a href="mailto:ventas@lockersplus.com.pe" target="_blank" class="nounderline">
                                                  ventas@lockersplus.com.pe
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

