@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-12">
                         <h1 class="m-0">Complementarios :: {{ $producto->nombre }}</h1>
                         <div class="mt-2">
                              <a href="{{ url('/admin/productos/complementarios/relacionar/'.$producto->id) }}">
                                   <button class="btn btn-primary">Relacionar Productos</button>
                              </a>
                         </div>
                         
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
                                                                 <tr>
                                                                      <td>{{ $prelacion->dataProducto->nombre }}</td>
                                                                      <td>{{ $prelacion->dataProducto->subtitulo }}</td>
                                                                      <td>
                                                                           <div class="list-icon d-flex justify-content-center align-items-center">
                                                                                <div class="list-item">
                                                                                     <form method="post" action="{{ url('/admin/productos/complementarios/relacionar') }}">
                                                                                          @csrf
                                                                                          <button type="submit" class="btn btn-danger">
                                                                                               <div class="boxIconRelacion d-flex justify-content-start align-items-center">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                                                                         <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                                                         <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                                                    </svg>
                                                                                                    <p>Quitar</p>
                                                                                               </div>
                                                                                          </button>
                                                                                          <input type="hidden" name="id_producto" value="{{ $prelacion->id_producto }}">
                                                                                          <input type="hidden" name="id_producto_relacionado" value="{{ $prelacion->id_producto_relacionado }}">
                                                                                          <input type="hidden" name="estado" value="0">
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
