 @extends('dashboard')
 @section('content')

  <!-- Content Wrapper. Contains page content -->

  <div class="row">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-md-6" style = "float:none;margin:auto">

         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              {!! Form::open(['action' => ['AdminController@store']]) !!}
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputusername">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputusername" placeholder="Enter Username">
                    {!! $errors->first('username', '<p class="help-block alert-sm">:message</p>') !!}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfullname">Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="exampleInputfullname" placeholder="Enter Full Name">
                    {!! $errors->first('fullname', '<p class="help-block alert-sm">:message</p>') !!}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    {!! $errors->first('password', '<p class="help-block alert-sm">:message</p>') !!}
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="isadmin"> Administrator
                    </label>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              {!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection