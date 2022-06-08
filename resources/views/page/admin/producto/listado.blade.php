@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Gestor de Productos</h1>
                         <a href="{{ url('/admin/productos/crear') }}">
                              <button class="btn btn-primary">Crear Producto</button>
                         </a>
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
                                                                 <th>Categoria</th>
                                                                 <th>Complementarios</th>
                                                                 <th></th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach($productos as $producto)
                                                                 <tr>
                                                                      <td>{{ $producto->nombre }}</td>
                                                                      <td>{{ $producto->categoria->nombre }}</td>
                                                                      <td align="center">
                                                                           <a href="{{ url('/admin/productos/complementarios/'.$producto->id) }}" class="boxCountComple">
                                                                           
                                                                                {{ count($producto->complementarios) }}
                                                                           </a>
                                                                      </td>
                                                                      <td>
                                                                           <div class="list-icon d-flex">
                                                                                <div class="list-item">
                                                                                     @if ( $producto->activo != 1)

                                                                                          <form method="post" action="{{ url('/admin/productos/publicar') }}">
                                                                                               @csrf
                                                                                               <button type="submit" class="btn btn-warning">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                                                                         <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                                                                         <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                                                                         <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                                                                    </svg>
                                                                                               </button>
                                                                                               <input type="hidden" name="id" value="{{ $producto->id }}">
                                                                                               <input type="hidden" name="activo" value="1">
                                                                                          </form>

                                                                                          
                                                                                     @else
                                                                                          <form method="post" action="{{ url('/admin/productos/publicar') }}">
                                                                                               @csrf
                                                                                               <button type="submit" class="btn btn-success">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                                         <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                                                         <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                                                    </svg>
                                                                                               </button>
                                                                                               <input type="hidden" name="id" value="{{ $producto->id }}">
                                                                                               <input type="hidden" name="activo" value="0">
                                                                                          </form>
                                                                                     @endif
                                                                                </div>
                                                                                <div class="list-item">
                                                                                     <a href="{{ url('/admin/productos/editar/'.$producto->id) }}" class="btn btn-primary">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                                          </svg>
                                                                                     </a>
                                                                                </div>
                                                                                <div class="list-item">
                                                                                     <a href="{{ url('/admin/productos/galerias/'.$producto->id) }}" class="btn btn-info">
                                                                                          <i class="far fa-images"></i>
                                                                                     </a>
                                                                                </div>
                                                                                <div class="list-item">
                                                                                     <form method="post" action="{{ url('/admin/productos/papelera') }}">
                                                                                          @csrf
                                                                                          <button type="submit" class="btn btn-danger">
                                                                                               <i class="fa fa-trash"></i>
                                                                                          </button>
                                                                                          <input type="hidden" name="id" value="{{ $producto->id }}">
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
