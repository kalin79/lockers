@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Crear Producto</h1>
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
                                                  <form method="post" action="{{ url('/admin/productos/crear') }}" enctype="multipart/form-data">
                                                       @csrf

                                                       @if ($errors->any())
                                                            @foreach($errors->all() as $error)
                                                                 <p>{{ $error }}</p>
                                                            @endforeach
                                                       @endif
                                                       <div class="row">
                                                            <div class="col-12 mb-4">
                                                                 <h2>Categor&iacute;a </h2>
                                                                 <select name="id_categoria" class="form-control">
                                                                      <option value="">Seleccionar</option>
                                                                      @foreach($categorias as $categoria)
                                                                           <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                                      @endforeach
                                                                 </select>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Nombre</h2>
                                                                 <input type="text" name="nombre" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Sub Titulo</h2>
                                                                 <input type="text" name="subtitulo" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Slug</h2>
                                                                 <input type="text" disabled class="form-control" />
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Descripc&iacute;on</h2>
                                                                 <textarea name="descripcion" cols="20" rows="5"  class="form-control"></textarea>
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Usos</h2>
                                                                 <textarea name="usos" cols="20" rows="5"  class="form-control"></textarea>
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Alto</h2>
                                                                 <input type="text" name="altura" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Ancho</h2>
                                                                 <input type="text" name="ancho" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Fondo</h2>
                                                                 <input type="text" name="fondo" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Alto de puerta</h2>
                                                                 <input type="text" name="alto" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Ancho de puerta</h2>
                                                                 <input type="text" name="ancho_puerta" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Material</h2>
                                                                 <input type="text" name="material" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-9 mb-4">
                                                                 <h2>Pintura</h2>
                                                                 <input type="text" name="pintura" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-3 mb-4">
                                                                 <h2>Puertas reforzadas</h2>
                                                                 <input type="text" name="puertas_reforzadas" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Bisagras</h2>
                                                                 <input type="text" name="bisagras" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Garant&iacute;a</h2>
                                                                 <input type="text" name="garantia" value="" class="form-control" />
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Accesorios</h2>
                                                                 <textarea name="accesorios" cols="20" rows="5"  class="form-control"></textarea>
                                                            </div>

                                                            

                                                            <div class="col-12 col-md-6">
                                                                 <div class="form-group overflow-auto vh-75 ">
                                                                      <h2>Colores</h2>
                                                                      <label class="field select">
                                                                          <select id="cmb_colores" name="color_ids[]" multiple="" class=" form-control " >
                                                                              <option></option>
                                                                              @foreach ($colors as $color)
                                                                                  <option value="{{$color->id}}">{{$color->nombre}}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </label>
                                                                 </div>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                 <div class="form-group overflow-auto vh-75 ">
                                                                      <h2>Tipo de chapas</h2>
                                                                      <label class="field select">
                                                                          <select id="cmb_chapas" name="chapas_ids[]" multiple="" class=" form-control " >
                                                                              <option></option>
                                                                              @foreach ($chapas as $chapa)
                                                                                  <option value="{{$chapa->id}}">{{$chapa->nombre}}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </label>
                                                                 </div>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                 <div class="form-group overflow-auto vh-75 ">
                                                                      <h2>Cantidad de Puertas</h2>
                                                                      <label class="field select">
                                                                          <select id="cmb_puertas" name="puertas_ids[]" multiple="" class=" form-control " >
                                                                              <option></option>
                                                                              @foreach ($puertas as $puerta)
                                                                                  <option value="{{$puerta->id}}">{{$puerta->nombre}}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </label>
                                                                 </div>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                 <div class="form-group overflow-auto vh-75 ">
                                                                      <h2>Cantidad de Cuerpos</h2>
                                                                      <label class="field select">
                                                                          <select id="cmb_cuerpos" name="cuerpos_ids[]" multiple="" class=" form-control " >
                                                                              <option></option>
                                                                              @foreach ($cuerpos as $cuerpo)
                                                                                  <option value="{{$cuerpo->id}}">{{$cuerpo->nombre}}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </label>
                                                                 </div>
                                                            </div>


                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Banner</h2>
                                                                 <input type="file" name="banner"/>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Descripc&iacute;on Corto (Banner) </h2>
                                                                 <textarea name="descripcion_corta" cols="20" rows="5"  class="form-control"></textarea>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Ficha T&eacute;cnica</h2>
                                                                 <input type="file" name="ficha"/>
                                                            </div>

                                                            
                                                       </div>

                                                       <div class="mt-4">
                                                            <button type="submit" class="btn btn-success">Crear</button>
                                                       </div>

                                                       
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
@section('css')
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
     <script>
          $(function() {
               $("#cmb_colores").select2({
                    theme: "classic",
                    allowClear: true,
                    placeholder: "Seleccione Color"
               });

               $("#cmb_chapas").select2({
                    theme: "classic",
                    allowClear: true,
                    placeholder: "Tipos de Chapas"
               });

               $("#cmb_puertas").select2({
                    theme: "classic",
                    allowClear: true,
                    placeholder: "Cantidad de puertas"
               });

               $("#cmb_cuerpos").select2({
                    theme: "classic",
                    allowClear: true,
                    placeholder: "Cantidad de cuerpos"
               });
          });
     </script>
@endsection