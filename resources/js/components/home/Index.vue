<template>
     <div>
          <h1 style="display:none">Locker + Plus</h1>
          <home-banner></home-banner>    
          <home-intro></home-intro>
          <cateogria-home></cateogria-home>
          <calidad-home></calidad-home>
          
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     props: ['slug'],
     name: 'PageHome',
     created(){
          this.dameTodasCategorias()
     },
     mounted(){
          this.eventHover()
     },
     methods: {
          eventHover(){
               let viewWhatsApp = document.getElementById("boxWhatsApp") 
               let viewHover = $(".boxTextWhatsApp")
               let _this = this
               let hover = gsap.to(viewHover, {x: "-105%", opacity: 1,duration: .5, paused: true, ease: "power1.inOut"})
               viewWhatsApp.addEventListener("mouseenter", function(){
                    hover.play()
               })

               viewWhatsApp.addEventListener("mouseleave", function(){
                    hover.reverse()
               })
               
          },
          async dameTodasCategorias(){
               try{
                    // Obtenemos la Filtros
                    let sendSolicitud = await axios.get('/api/v1/categoria/ver/todas')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.data.code === 200){
                         // console.log(sendSolicitud.data.data.categorias)
                         this.$store.commit('category/setCategoria', sendSolicitud.data.data.categorias)
                        
                    }
               } catch (error) {
                    console.log(error);
               } finally{

               }
          },
     }
}
</script>