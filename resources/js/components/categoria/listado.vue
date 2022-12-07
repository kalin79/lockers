<template>
     <div>
          <div class="listProducts">
               <div class="boxHeader mt-3 mt-xl-0">
                    <h2>
                         Se están mostrando {{ cantidadProductos }} productos
                    </h2>
               </div>
               <div class="viewProducts mt-3">
                    <div class="d-flex justify-content-between align-items-star flex-wrap">
                         <a :href="`/producto/${producto.data.slug}`" v-for="(producto, index) in productos" :key="index">
                              <div class="boxImage">
                                   <img :src="`https://locker.codegraph.pe/${producto.imagen}`" :alt="producto.data.nombre">
                                   
                              </div>
                              <div class="boxInfo">
                                   <h3>{{ producto.data.nombre }}</h3>
                                   <!-- {{ producto.data.slug }} -->
                                   <p>
                                       {{ producto.data.descripcion_corta }}
                                   </p>
                              </div>
                         </a>
                    </div>
               </div>
          </div>
     </div>
</template>

<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'

export default {
     computed: {
          ...mapState({
               categoria: state => state.categoria
          }),

          ...mapGetters({
               productos: 'category/getProductos',
               cantidadProductos: 'category/getCantidadProductos',
          })
          

     },
     mounted: function() {
     },
     methods: {
          
     }
}
</script>