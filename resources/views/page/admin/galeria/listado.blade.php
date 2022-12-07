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
                         <h1 class="m-0">Galeria :: {{ $producto->nombre }}</h1>
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
                                                       action="{{ url('admin/productos/galerias/crear') }}" 
                                                       class="dropzone" 
                                                       id="myDropzone">
                                                       <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                                       <button type="submit">Subir imagenes</button>
                                                  </form>

                                                  <table class="table table-bordered table-hover table-striped">
                                                       <thead>
                                                            <tr>
                                                                 <th>Listado de imagenes</th>
                                                                 <th>Defecto</th>
                                                                 <th></th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach($producto->galeriaMuchos as $galeria)
                                                                 <tr>
                                                                      <td><img src="{{ $galeria->foto }}" class="min-picture"> </td>
                                                                      <td>
                                                                           <div class="list-icon d-flex justify-content-center align-items-center height-picture">
                                                                                <div class="list-item">
                                                                                     <form method="post" action="{{ url('/admin/productos/galerias/default') }}">
                                                                                          @csrf
                                                                                          @if ($galeria->default === 0)
                                                                                          <button type="submit" class="btn btn-warning boxIcons">
                                                                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                                               </svg>
                                                                                          </button>
                                                                                          @else
                                                                                          <button type="submit" class="btn btn-primary boxIcons">
                                                                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                                                               </svg>
                                                                                          </button>
                                                                                          @endif
                                                                                          <input type="hidden" name="id" value="{{ $galeria->id }}">
                                                                                          <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                                                                          <input type="hidden" name="default" value="{{ $galeria->default }}">
                                                                                     </form>
                                                                                </div>
                                                                                
                                                                           </div>
                                                                      </td>
                                                                      <td>
                                                                           <div class="list-icon d-flex justify-content-center align-items-center height-picture">
                                                                                <div class="list-item">
                                                                                     <form method="post" action="{{ url('/admin/productos/galerias/papelera') }}">
                                                                                          @csrf
                                                                                          <button type="submit" class="btn btn-danger">
                                                                                               <i class="fa fa-trash"></i>
                                                                                          </button>
                                                                                          <input type="hidden" name="id" value="{{ $galeria->id }}">
                                                                                          <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                                                                     </form>
                                                                                </div>
                                                                                
                                                                           </div>
                                                                      </td>
                                                                 </tr>
                                                            @endforeach
                                                            
                                                       </tbody>
                                                  </table>
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
                    // alert(1)
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
                         top.location.href = `/admin/productos/galerias/`+{{ $producto->id }};
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