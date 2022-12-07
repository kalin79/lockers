<template>
     <div v-if="doneCategory[0]">
          <div class="homeCategoria">
               <div class="container relative">
                    <div class="boxIcon">
                         <img src="/frontend/images/icon-1.png" />
                    </div>
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-12 col-lg-5 mb-4">
                                   <div class="boxImage">
                                        <img :src="`https://locker.codegraph.pe/${doneCategory[0].foto}`" />
                                   </div>
                              </div>
                              <div class="col-12 col-lg-5">
                                   <div class="pContent">
                                        <div class="boxSubTitle">
                                             <h3>
                                                  Línea de Productos
                                             </h3>
                                        </div>
                                        <div class="boxTitle" >
                                             <h2 class="txtUppercase" v-html="doneCategory[0].nombre"></h2>
                                        </div>
                                        <div class="boxDescription mt-3">
                                             <p>
                                                   {{ doneCategory[0].descripcion }}
                                             </p>
                                        </div>
                                        <div class="boxButton mt-4">
                                             <button v-on:click="irCatalogo(doneCategory[0].slug)">
                                                  Ver Catálogo
                                             </button>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-2 d-none d-lg-block"></div>
                         </div>
                         <div class="separate"></div>

                    </div>
               </div>
               <div class="relative">
                    <div class="boxIcon icon2">
                         <img src="/frontend/images/icon-2.png" />
                    </div>
                    <div class="container">
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-2 d-none d-lg-block"></div>
                                   <div class="col-12 col-lg-5 d-block d-lg-none mb-4">
                                        <div class="boxImage">
                                             <img :src="`https://locker.codegraph.pe/${doneCategory[1].foto}`" />
                                        </div>
                                   </div>
                                   <div class="col-12 col-lg-5">
                                        <div class="pContent">
                                             <div class="boxSubTitle">
                                                  <h3>
                                                       Línea de Productos
                                                  </h3>
                                             </div>
                                             <div class="boxTitle" >
                                                  <h2 class="txtUppercase" v-html="doneCategory[1].nombre"></h2>
                                             </div>
                                             <div class="boxDescription mt-3">
                                                  <p>
                                                       {{ doneCategory[1].descripcion }}
                                                  </p>
                                             </div>
                                             <div class="boxButton mt-4">
                                                  <button v-on:click="irCatalogo(doneCategory[1].slug)">
                                                       Ver Catálogo
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-12 col-lg-5 d-none d-lg-block">
                                        <div class="boxImage">
                                             <img :src="`https://locker.codegraph.pe/${doneCategory[1].foto}`" />
                                        </div>
                                   </div>
                              </div>
                              <div class="separate"></div>
                         </div>
                    </div>
               </div>
               <div class="backOverflow relative">
                    <div class="boxIcon icon3">
                         <img src="/frontend/images/icon-1.png" />
                    </div>
                    <div class="container">
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-12 col-lg-5 mb-4">
                                        <div class="boxImage">
                                             <img :src="`https://locker.codegraph.pe/${doneCategory[2].foto}`" />
                                        </div>
                                   </div>
                                   <div class="col-12 col-lg-5">
                                        <div class="pContent">
                                             <div class="boxSubTitle">
                                                  <h3>
                                                       Línea de Productos
                                                  </h3>
                                             </div>
                                             <div class="boxTitle" >
                                                  <h2 class="txtUppercase" v-html="doneCategory[2].nombre"></h2>
                                             </div>
                                             <div class="boxDescription mt-3">
                                                  <p>
                                                       {{ doneCategory[2].descripcion }}
                                                  </p>
                                             </div>
                                             <div class="boxButton mt-4">
                                                  <button v-on:click="irCatalogo(doneCategory[2].slug)">
                                                       Ver Catálogo
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-2 d-none d-lg-block"></div>
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
               doneCategory: 'category/getCategoria'
          })
     },
     methods: {
          irCatalogo(slug){
               top.location.href = `/categoria/${slug}`;
          },
     }
}
</script>