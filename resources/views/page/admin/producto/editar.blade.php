@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-12">
                         <h1 class="m-0">Editar Producto :: {{ $producto->nombre }}</h1>
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
                                                  <form method="post" action="{{ url('/admin/productos/editar') }}" enctype="multipart/form-data">
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
                                                                           <option value="{{ $categoria->id }}" @if($producto->id_categoria === $categoria->id ) selected @endif>{{ $categoria->nombre }}</option>
                                                                      @endforeach
                                                                 </select>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Nombre</h2>
                                                                 <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Sub Titulo</h2>
                                                                 <input type="text" name="subtitulo" value="{{ $producto->subtitulo }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Slug</h2>
                                                                 <input type="text" disabled class="form-control"  value="{{ $producto->slug }}"/>
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Descripc&iacute;on</h2>
                                                                 <textarea name="descripcion" cols="20" rows="5"  class="form-control">{{ $producto->descripcion }}</textarea>
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Usos</h2>
                                                                 <textarea name="usos" cols="20" rows="5"  class="form-control">{{ $producto->usos }}</textarea>
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Alto</h2>
                                                                 <input type="text" name="altura" value="{{ $producto->altura }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Ancho</h2>
                                                                 <input type="text" name="ancho" value="{{ $producto->ancho }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Fondo</h2>
                                                                 <input type="text" name="fondo" value="{{ $producto->fondo }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Alto de puerta</h2>
                                                                 <input type="text" name="alto" value="{{ $producto->alto }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Ancho de puerta</h2>
                                                                 <input type="text" name="ancho_puerta" value="{{ $producto->ancho_puerta }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-4 mb-4">
                                                                 <h2>Material</h2>
                                                                 <input type="text" name="material" value="{{ $producto->material }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-9 mb-4">
                                                                 <h2>Pintura</h2>
                                                                 <input type="text" name="pintura" value="{{ $producto->pintura }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-3 mb-4">
                                                                 <h2>Puertas reforzadas</h2>
                                                                 <input type="text" name="puertas_reforzadas" value="{{ $producto->puertas_reforzadas }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Bisagras</h2>
                                                                 <input type="text" name="bisagras" value="{{ $producto->bisagras }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Garant&iacute;a</h2>
                                                                 <input type="text" name="garantia" value="{{ $producto->garantia }}" class="form-control" />
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                 <h2>Accesorios</h2>
                                                                 <textarea name="accesorios" cols="20" rows="5"  class="form-control">{{ $producto->accesorios }}</textarea>
                                                            </div>

                                                           

                                                            <div class="col-12 col-md-6">
                                                                 <div class="form-group overflow-auto vh-75 ">
                                                                      <h2>Colores</h2>
                                                                      <label class="field select">
                                                                          <select id="cmb_colores" name="color_ids[]" multiple="" class=" form-control " >
                                                                              <option></option>
                                                                              @foreach ($colors as $color) 
                                                                                  <option value="{{$color->id}}" @if(in_array($color->id,$tipos)) selected @endif>{{$color->nombre}}</option>
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
                                                                                  <option value="{{$chapa->id}}" @if(in_array($chapa->id,$tipos)) selected @endif>{{$chapa->nombre}}</option>
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
                                                                                  <option value="{{$puerta->id}}" @if(in_array($puerta->id,$tipos)) selected @endif>{{$puerta->nombre}}</option>
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
                                                                                  <option value="{{$cuerpo->id}}" @if(in_array($cuerpo->id,$tipos)) selected @endif>{{$cuerpo->nombre}}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </label>
                                                                 </div>
                                                            </div>


                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Banner</h2>
                                                                 <input type="file" name="banner"/>
                                                                 {{-- {{ $producto }} --}}
                                                                 <div class="boxPicture big mt-4">
                                                                      <img src="{{ $producto->banner }}" />
                                                                 </div>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Descripc&iacute;on Corto (Banner) </h2>
                                                                 <textarea name="descripcion_corta" cols="20" rows="5"  class="form-control">{{ $producto->descripcion_corta }}</textarea>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-4">
                                                                 <h2>Ficha T&eacute;cnica</h2>
                                                                 <input type="file" name="ficha"/>
                                                                 <div class="boxLink mt-4">
                                                                      <a href="{{ $producto->ficha }}" target="_blank">Ver archivo</a>
                                                                 </div>
                                                            </div>

                                                            
                                                       </div>

                                                       <div class="mt-4">
                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                       </div>

                                                       <input type="hidden" name="id" value="{{ $producto->id }}">

                                                       
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