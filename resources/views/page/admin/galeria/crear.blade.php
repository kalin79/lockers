@extends('layouts.admin')
@section('css')
     <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Crear Galeria</h1>
                    </div><!-- /.col -->
           
               </div><!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
 
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                         <div class="col-12">
                                   <div class="card">
                                             <div class="card-body">
                                                  <form method="post" 
                                                       action="{{ url('admin/crear-galeria') }}" 
                                                       class="dropzone" 
                                                       id="myDropzone">
                                                       <input type="hidden" name="id_producto" value="{{ $id_producto }}">
                                                       <button type="submit">Subir imagenes</button>
                                                  </form>
                                             </div>
                                   </div>
                         </div>
               </div>
          </div><!-- /.container-fluid -->
     </section>
<!-- /.content -->
</div>   
@endsection
@section('scripts')
     <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
     <script>
          //uploadMultiple => si utilizo esto en mi php debo hacer un foreach
          Dropzone.options.myDropzone = {
               headers: {
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
               },
               autoProcessQueue: false,
               uploadMultiple: true,
               dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
               acceptedFiles: "image/*",
               parallelUploads: 6,
               maxFiles: 6,
               paramName: 'foto',
               // The setting up of the dropzone
               init: function() {
                    var _myDropzone = this;

                    // First change the button to actually tell Dropzone to process the queue.
                    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                         // Make sure that the form isn't actually being sent.
                         e.preventDefault();
                         e.stopPropagation();
                         _myDropzone.processQueue();
                    });

                    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                    // of the sending event because uploadMultiple is set to true.
                    this.on("sendingmultiple", function() {
                         // Gets triggered when the form is actually being sent.
                         // Hide the success button or the complete form.
                         console.log(1)
                    });
                    this.on("successmultiple", function(files, response) {
                         // Gets triggered when the files have successfully been sent.
                         // Redirect user or notify of success.
                         console.log(2)
                    });
                    this.on("errormultiple", function(files, response) {
                         console.log(files)
                         console.log(response)
                    });
               }
          };


          // console.log(Dropzone)
     </script>
@endsection