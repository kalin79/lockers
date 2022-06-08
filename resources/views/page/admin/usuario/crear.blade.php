@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Crear Usuario</h1>
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
                                                  <form method="post" action="{{ url('/admin/usuarios/crear') }}">
                                                       @csrf
                                                       <h2>Nombre</h2>
                                                       <input type="text" name="name" value="" class="form-control" />

                                                       <h2>Email</h2>
                                                       <input type="text" name="email" value="" class="form-control @error('email') is-invalid @enderror" />

                                                       <h2>Clave</h2>
                                                       <input type="password" name="password" value="" class="form-control" />

                                                       <h2>Rol</h2>
                                                       <select name="rol" id="" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Editor">Editor</option>
                                                       </select>

                                                       <div class="mt-3">
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
