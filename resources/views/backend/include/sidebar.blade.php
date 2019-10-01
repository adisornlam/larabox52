<aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
  
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li><a href="/admin"><i class="fa fa-home"></i> <span>Home</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-list"></i> <span>Content</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('admin/news')}}"><i class="fa fa-list-alt"></i> News</a></li>
              <li><a href="{{url('admin/category')}}"><i class="fa fa-list"></i> Category</a></li>
            </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-picture-o"></i> <span>Photo Slide</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/photoslide')}}"><i class="fa fa-key"></i> Photo Slide</a></li>
              </ul>
            </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>Settings</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('admin/users')}}"><i class="fa fa-user"></i> Users</a></li>
            <li><a href="{{url('admin/roles')}}"><i class="fa fa-key"></i> Roles</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>