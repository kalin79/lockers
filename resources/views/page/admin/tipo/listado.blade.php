@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Gestor de Tipos</h1>
                         <a href="{{ url('/admin/tipos/crear') }}">
                              <button class="btn btn-primary">Crear Tipo</button>
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
                                                                 <th>Categoria</th>
                                                                 <th>Nombre</th>
                                                                 <th>Valor</th>
                                                                 <th></th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach($tipos as $tipo)
                                                                 <tr>
                                                                      <td>{{ $tipo->categoria->nombre }}</td>
                                                                      <td>{{ $tipo->nombre }}</td>
                                                                      
                                                                      <td>{{ $tipo->valor }}</td>
                                                                      <td>
                                                                           <div class="d-flex boxIcons">
                                                                                <a href="{{ url('/admin/tipos/editar/'.$tipo->id) }}" class="btn btn-primary">
                                                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                                     </svg>
                                                                                </a>
                                                                                <form method="post" action="{{ url('/admin/tipos/papelera') }}">
                                                                                     @csrf
                                                                                     <button type="submit" class="btn btn-danger">
                                                                                          <i class="fa fa-trash"></i>
                                                                                     </button>
                                                                                     <input type="hidden" name="id" value="{{ $tipo->id }}">
                                                                                </form>
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
