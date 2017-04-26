<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("/bower_components/adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{$loginuser[0]->fullname}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search courses"/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="{{ url('/tenant') }}"><span>Tenant</span></a></li>
      <li class="treeview">
        <a href="#"><span>Navigation</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Site home</a></li>
          <li><a href="#">Site pages</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">ACADEMY</a></li>
          <li><a href="#">SOCIAL</a></li>
          <li><a href="#">ENTERPRISE TOOLS</a></li>
          <li><a href="#">ADMINISTRATION</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><span>Administration</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Site Administration</a></li>
          <li><a href="#">Notification</a></li>
          <li><a href="#">Registration</a></li>
          <li><a href="#">Advanced features</a></li>
          <li><a href="#">Users</a></li>
          <li><a href="#">Courses</a></li>
          <li><a href="#">Grades</a></li>
          <li><a href="#">Competencies</a></li>
          <li><a href="#">Badges</a></li>
          <li><a href="#">Location</a></li>
          <li><a href="#">Language</a></li>
          <li><a href="#">Plugins</a></li>
          <li><a href="#">Security</a></li>
          <li><a href="#">Appearance</a></li>
        </ul>
      </li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>