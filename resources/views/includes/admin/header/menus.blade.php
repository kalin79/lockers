 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
          <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin Lockers</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                    <a href="{{ url('/admin/datos') }}" class="d-block">{{ auth()->user()->name }}</a>
               </div>
          </div>
 
     
 
          <!-- Sidebar Menu -->
          <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                         <a href="{{ url('/admin/inicio') }}" class="nav-link {{ (request()->is('admin/inicio')) ? 'active' : '' }}">
                              <i class="nav-icon fas fa-home"></i>
                              <p>
                                   Inicio
                              </p>
                         </a>
                    </li>

                    <li class="nav-item menu-open">
                         <a href="{{ url('/admin/usuarios') }}" class="nav-link {{ (request()->is('admin/usuario*')) ? 'active' : '' }}">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                   Usuarios
                              </p>
                         </a>
                    </li>

                    {{-- <li class="nav-item menu-open">
                         <a href="{{ url('/slide') }}" class="nav-link">
                              <i class="nav-icon fas fa-image"></i>
                              <p>
                                   Slide
                              </p>
                         </a>
                    </li> --}}
                    <li class="nav-item">
                         <a href="javascript:void(0)" class="nav-link {{ ((request()->is('admin/categorias*')) || (request()->is('admin/productos*')) ) ? 'active' : '' }}">
                              <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                              <p>
                                   Productos
                                   <i class="right fas fa-angle-left"></i>
                              </p>
                         </a>
                         <ul class="nav nav-treeview" class="nav-link">
                              <li class="nav-item">
                                   <a href="{{ url('/admin/categorias') }}" class="nav-link {{ (request()->is('admin/categorias*')) ? 'active' : '' }}">
                                        {{-- <i class="nav-icon fas fa-list"></i> --}}
                                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                        <p>
                                             Categorias
                                        </p>
                                   </a>
                              </li>
                              <li class="nav-item">
                                   <a href="{{ url('/admin/productos') }}" class="nav-link {{ (request()->is('admin/productos*')) ? 'active' : '' }}">
                                        {{-- <i class="nav-icon fas fa-bus"></i> --}}
                                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                        <p>
                                             Productos
                                        </p>
                                   </a>
                              </li>
                         </ul>
                    </li>
                   

                    

                    <li class="nav-item menu-open">
                         <a href="{{ url('/admin/tipos') }}" class="nav-link {{ (request()->is('admin/tipos*')) ? 'active' : '' }}">
                              <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                              <p>
                                   Tipos
                              </p>
                         </a>
                    </li>
                    
               </ul>
          </nav>
          <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
</aside>