<template>
     <div class="boxModal" id="boxFormCotizadorProducto">
          <div class="boxForm d-flex justify-content-end  align-items-start">
               <div class="boxContent relative">
                    <div class="boxCloseCotizador">
                         <a href="javascript:void(0)" v-on:click="closeCotizador()">
                              <div class="d-flex justify-content-center  align-items-center flex-column">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                   </svg>
                              </div>
                              
                         </a>
                    </div>
                    <div class="boxScroll">
                         <div class="boxSubTitle mb-3">
                              <h2>Solicite su cotización</h2>
                         </div>
                         <div class="boxDescripcion mb-3">
                              <p>
                                   ¡Gracias por tu interés en recibir una propuesta de cotización!
                                   Para atender mejor tu requerimiento, por favor proporciona la 
                                   siguiente información precisa que nos permita entregarte la mejor 
                                   propuesta. 
                              </p>
                         </div>
                         <div class="boxInfo d-flex justify-content-between  align-items-stretch mb-4">
                              <div class="boxLeft">
                                   <h3>PRODUCTO PARA COTIZAR</h3>
                                   <h2>{{ producto.nombre }}</h2>
                                   <h4>{{ producto.subtitulo }}</h4>
                              </div>
                              <div class="separate"></div>
                              <div class="boxRight">
                                   <h3 class="txtCenter">CANTIDAD</h3>
                                   <p class="txtNumber txtCenter">{{ cantidad }}</p>
                              </div>
                         </div>
                         <form name="formCotizador" id="formCotizador" v-on:submit.prevent="sendData">
                              <div class="row">
                                   <div class="col-12 mb-4">
                                        <label for="nombre" class="mb-2">Nombres y Apellidos:*</label>
                                        <input type="text" name="nombre" id="nombre" placeholder="Nombres y Apellidos" v-model="form.nombre"/>
                                   </div>
                                   <div class="col-12 mb-4">
                                        <label for="nombre" class="mb-2">RUC / DNI:*</label>
                                        <input type="text" maxlength="9" name="dni" id="dni" placeholder="RUC / DNI" v-model="form.dni"/>
                                   </div>
                                   <div class="col-12 mb-4">
                                        <label for="celular" class="mb-2">Número de celular:*</label>
                                        <input type="text" name="celular" id="celular" placeholder="Número de celular" v-model="form.celular"/>
                                   </div>
                                   <div class="col-12 mb-4">
                                        <label for="email" class="mb-2">Correo electronico:*</label>
                                        <input type="text" name="email" id="email" placeholder="Correo electronico" v-model="form.email"/>
                                   </div>
                                   <div class="col-12 mb-4">
                                        <label for="descripcion" class="mb-2">Descripción del proyecto:*</label>
                                        <textarea name="descripcion" id="descripcion" placeholder="Descripción del proyecto" v-model="form.descripcion"></textarea>
                                   </div>
                                   <div class="col-12 mb-4">
                                        <div class="d-flex justify-content-start align-items-start">
                                             <div class="boxCheckbox ">
                                                  <input type="checkbox" id="agree" name="agree" value="yes">
                                                  <label for="agree"></label>
                                             </div>
                                             <p class="labelP">He leído y aceptado las <a href="terminos-y-condiciones" target="_blank">Políticas de privacidad, los Términos de uso y Aviso de Privacidad</a></p>
                                        </div>
                                        <label class="agree-error msnError">Debe aceptar los Términos y Condiciones </label>

                                   </div>
                                   <div class="col-12 mb-1">
                                        <div class="boxLoadForm">
                                             <div class="d-flex justify-content-center">
                                                  <div class="spinner-border" role="status">
                                                       <span class="visually-hidden">Loading...</span>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="alert ocultar" role="alert">
                                             <p></p>
                                        </div>
                                        <div class="boxButton large boxButtonCotizar">
                                             <button type="submit">Enviar información</button>
                                        </div>
                                   </div>
                                   <div class="col-12">
                                        <p class="legal">*Datos requeridos.</p>
                                   </div>
                              </div>
                              
                         </form>
                    </div>
               </div>
               
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     name: 'PageCotizador',
     data() {
          return {
               form: []
          }
     },
     computed: {
          ...mapGetters({
               producto: 'product/getProducto',
               cantidad: 'product/getCantidad',
          })
     },
     mounted: function() {
          this.loadForm()
          this.validateCamposForm()
     },
     methods: {
          closeCotizador: function() {
               $("#boxFormCotizadorProducto").removeClass('active')
          },
          loadForm: function () {
               $( "#formCotizador" ).validate({
                    rules: {
                         nombre: {
                              required: true,
                         },
                         celular: {
                              required: true,
                         },
                         descripcion: {
                              required: true,
                         },
                         dni: {
                              required: true,
                         },
                         email: {
                              required: true,
                              email: true
                         }
                    },
                    messages: {
                         nombre: {
                              required: "Nombre - es obligatorio",
                         },
                         celular: {
                              required: "Celular - es obligatorio",
                         },
                         descripcion: {
                              required: "Descripción - es obligatorio",
                         },
                         dni: {
                              required: "RUC / DNI - es obligatorio",
                         },
                         email: {
                              required: "Debe completar un correo válido",
                              email: "Debe completar un correo válido"
                         },
                    }
               })
          },
          validateCamposForm: function(){
               $("#celular").keydown(function (e) {
                    if (($("#celular").val().length < 12) || (e.keyCode == 8)){
                         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                              return;
                         }
                         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                              e.preventDefault();
                         }
                    }else{
                         e.preventDefault();
                    }

               })
          },
          async sendData(e) {
               e.preventDefault()
               var _flat_agree = 0
               
               if (!($(".alert").hasClass("ocultar")))
                    $(".alert").addClass("ocultar")

               if ($('#agree').is(':checked') != true ) {
                    // alert('no')
                    $(".agree-error").addClass('errorManual')
                    return false
               }else{
                    _flat_agree = 1
                    $(".agree-error").removeClass('errorManual')
               }
               
               let formData = new FormData()

               // console.log(this.form)
               
               if ($("#formCotizador").valid()) {
                    $(".boxButtonCotizar").addClass("ocultar");
                    $(".boxLoadForm").addClass("active");
                    formData.append("cliente", this.form.nombre)
                    formData.append("dni", this.form.dni)
                    formData.append("email", this.form.email)
                    formData.append("flat_agree", _flat_agree)
                    formData.append("celular", this.form.celular)
                    formData.append("descripcion", this.form.descripcion)
                    formData.append("cantidad", this.cantidad)
                    formData.append("nombre", this.producto.nombre)
                    formData.append("subtitulo", this.producto.subtitulo)
                    // console.log(this.cantidad)
                    // console.log(this.producto.subtitulo)
                    try{
                         let sendSolicitud = await axios.post('/api/v1/mail/cotizar',formData)
                         // console.log(sendSolicitud)
                         if (sendSolicitud.data.code === 200) {
                              $(".alert p").html("Se ha enviado su cotización")
                              $(".alert").addClass("alert-success").removeClass("ocultar")
                              
                              $("#msnSuscripcion").html("Se registro su correo")
                              this.form = []
                              $("#agree").prop( "checked", false )
                         }
                    }catch (error) {
                         console.log(error)
                         $(".alert p").html("Hubo problemas para enviar, intente más tarde")
                         $(".alert").addClass("alert-danger").removeClass("ocultar")
                    } finally {
                         console.log('final')
                         $(".boxButtonCotizar").removeClass("ocultar");
                         $(".boxLoadForm").removeClass("active");
                    }
               }
          },
     },
}
</script>