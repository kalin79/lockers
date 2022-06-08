@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Crear Categoria</h1>
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
                                                  <form method="post" action="{{ url('/admin/categorias/crear') }}" enctype="multipart/form-data">
                                                       @csrf
                                                       <div class="row">
                                                            <div class="col-6 mb-4">
                                                                 <h2>Nombre</h2>
                                                                 <input type="text" name="nombre" value="" class="form-control" />
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Slug</h2>
                                                                 <input type="text" disabled  class="form-control" />
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Descripcion</h2>
                                                                 <textarea  name="descripcion"  class="form-control" col="10" row="5"></textarea>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Descripcion Corta</h2>
                                                                 <textarea  name="descripcion_corta"  class="form-control" col="10" row="5"></textarea>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Foto</h2>
                                                                 <input type="file" name="foto"/>
                                                            </div>
                                                            <div class="col-6 mb-4">
                                                                 <h2>Banner Principal</h2>
                                                                 <input type="file" name="banner"/>
                                                            </div>
                                                       </div>
                                                       <div class="">
                                                            <button type="submit" class="btn btn-success">Crear</button>
                                                       </div>

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
