<template>
     <div class="boxPageProducto">
          <banner-interno-producto></banner-interno-producto>
          <div class="boxContent">
               <producto-detalle></producto-detalle>
               <productos-complementarios></productos-complementarios>
          </div>
     </div>
</template>
<script>
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     props: ['slug'],
     name: 'PageProduct',
     created(){
          this.dameProducto()
     },
     methods: {
          async dameProducto(){
               try{
                    // Obtenemos la Filtros
                    let sendSolicitud = await axios.get(`/api/v1/producto/${this.slug}`)
                    // console.log(sendSolicitud.data.data.producto[0])
                    console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         this.$store.commit('product/setProducto', sendSolicitud.data.data.producto)
                         this.$store.commit('product/setComplementarios', sendSolicitud.data.data.complementarios)
                         this.$store.commit('product/setGalerias', sendSolicitud.data.data.galerias)
                         this.$store.commit('category/setCategoria', sendSolicitud.data.data.categoria)
                         this.$store.commit('product/setColores', sendSolicitud.data.data.colores)
                         this.$store.commit('product/setChapas', sendSolicitud.data.data.chapas)
                         this.$store.commit('product/setPuertas', sendSolicitud.data.data.puertas)
                         this.$store.commit('product/setCuerpos', sendSolicitud.data.data.cuerpos)
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          }
     },
}
</script>
