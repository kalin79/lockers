@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-12">
                         <h1 class="m-0">Editar Tipo :: {{ $tipo->nombre }}</h1>
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
                                                  <form method="post" action="{{ url('/admin/tipos/editar') }}" enctype="multipart/form-data">
                                                       @csrf
                                                       <div class="row">
                                                            <div class="col-12 mb-4">
                                                                 <h2>Categor&iacute;a </h2>
                                                                 <select name="id_categoria_tipo" class="form-control">
                                                                      <option value="">Seleccionar</option>
                                                                      @foreach($categorias as $categoria)
                                                                           <option value="{{ $categoria->id }}" @if($tipo->id_categoria_tipo === $categoria->id ) selected @endif>{{ $categoria->nombre }}</option>
                                                                      @endforeach
                                                                 </select>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Nombre</h2>
                                                                 <input type="text" name="nombre" value="{{ $tipo->nombre }}" class="form-control" />
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Valor</h2>
                                                                 <input type="text" name="valor"  class="form-control" value="{{ $tipo->valor }}" />
                                                            </div>
                                                       </div>
                                                       <div class="">
                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                       </div>

                                                       <input type="hidden" name="id" value="{{ $tipo->id }}" />

                                                       @if ($errors->any())
                                                            @foreach($errors->all() as $error)
                                                                 <p>{{ $error }}</p>
                                                            @endforeach
                                                       @endif
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
