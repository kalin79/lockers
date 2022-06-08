@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-12">
                         <h1 class="m-0">{{ $producto->nombre }} :: Prod. Relacionados</h1>
                         <div class="mt-2">
                              <a href="{{ url('/admin/productos/complementarios/'.$producto->id) }}">
                                   <button class="btn btn-primary">Regresar</button>
                              </a>
                         </div>
                         
                    </div><!-- /.col -->
           
               </div><!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     {{-- {{ $producto_relacionados }} --}}
     <!-- Main content -->
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                         <div class="col-12">
                                   <div class="card">
                                             <div class="card-body">
                                                  <table class="table table-bordered table-hover table-striped">
                                                       <thead>
                                                            <tr>
                                                                 <th>Nombre</th>
                                                                 <th>Sub-titulo</th>
                                                                 <th></th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach($producto_relacionados as $prelacion)
                                                                 @if (!is_null($prelacion->dataProducto))
                                                                 <tr>
                                                                      <td>{{ $prelacion->dataProducto->nombre }}</td>
                                                                      <td>{{ $prelacion->dataProducto->subtitulo }}</td>
                                                                      <td>
                                                                           <div class="list-icon d-flex justify-content-center align-items-center">
                                                                                <div class="list-item">
                                                                                     <form method="post" action="{{ url('/admin/productos/complementarios/relacionar') }}">
                                                                                          @csrf
                                                                                          <button type="submit" class="btn btn-info">
                                                                                               <div class="boxIconRelacion d-flex justify-content-start align-items-center">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                                                                                         <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                                                                                    </svg>
                                                                                                    <p>Agregar</p>
                                                                                               </div>
                                                                                          </button>
                                                                                          <input type="hidden" name="id_producto" value="{{ $prelacion->id_producto }}">
                                                                                          <input type="hidden" name="id_producto_relacionado" value="{{ $prelacion->id_producto_relacionado }}">
                                                                                          <input type="hidden" name="estado" value="1">
                                                                                     </form>
                                                                                    
                                                                                </div>
                                                                           </div>
                                                                          
                                                                           
                                                                      </td>
                                                                 </tr>
                                                                 @endif
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
