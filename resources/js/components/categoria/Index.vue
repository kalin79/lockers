<template>
     <div class="boxPageCategoria">
          <banner-interno></banner-interno>
          <div class="container">
               <div class="boxContentInterno">
                    <div class="row">
                         <div class="col-12 col-xl-3">
                              <categoria-filtros></categoria-filtros>
                         </div>
                         <div class="col-12 col-xl-9">
                              <categoria-productos></categoria-productos>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     props: ['slug'],
     name: 'PageCategory',
     computed: {
          // ...mapState('categoria',['category/categoria']),
     },
     mounted(){
     },
     created(){
          this.dameCategoria()
          this.dameCategoriaProductos()
          this.dameFiltros()
     },
     methods: {
          async dameFiltros(){
               try{
                    // Obtenemos la Filtros
                    let sendSolicitud = await axios.get('/api/v1/filtros')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         // console.log(sendSolicitud.data.data.filtros[0].chapas)
                         this.$store.commit('category/setFiltroColors', sendSolicitud.data.data.filtros[0].colors)
                         this.$store.commit('category/setFiltroChapas', sendSolicitud.data.data.filtros[0].chapas)
                         this.$store.commit('category/setFiltroPuertas', sendSolicitud.data.data.filtros[0].puertas)
                         this.$store.commit('category/setFiltroCuerpos', sendSolicitud.data.data.filtros[0].cuerpos)
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          },
          async dameCategoriaProductos(){
               try{
                    // Obtenemos la Prouctos
                    let data = new FormData()
                    data.append('slug',this.slug)
                    let sendSolicitud = await axios.post(`/api/v1/categoria/listado/productos`,data)
                    console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         // console.log(sendSolicitud.data.data)
                         this.$store.commit('category/setProductos', sendSolicitud.data.data.response)
                         this.$store.commit('category/setCantidadProductos', sendSolicitud.data.data.productos.total)
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          },
          async dameCategoria(){
               try{
                    // Obtenemos la Categoria
                    let sendSolicitud = await axios.get(`/api/v1/categoria/${this.slug}`)
                    // console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         // console.log(sendSolicitud.data.data.categoria)
                         this.$store.commit('category/setCategoria', sendSolicitud.data.data.categoria)
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          }
     }
}
</script>