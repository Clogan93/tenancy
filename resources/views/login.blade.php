<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Site Main Style -->
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>

  </head>
  <body class="skin-blue login-wrapper">
    <section class="content">  
      <div class="row">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-6" style = "float:none; margin:auto">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Login</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ action('LoginController@signin') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputUsername" class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        @if(sizeof($remembereduser) > 0)
                          <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" value="{{ $remembereduser[0]->username }}">
                        @else
                          <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" value="">
                        @endif
                        {!! $errors->first('username', '<p class="help-block alert-sm">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        @if(sizeof($remembereduser) > 0)
                          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value = "{{$remembereduser[0]->password}}">
                        @else
                          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value = "">
                        @endif
                        {!! $errors->first('password', '<p class="help-block alert-sm">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="inputrememberme"> Remember me
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>

              @if (Session::has('userError'))
                <div class="flash alert alert-danger">
                  <p>{{ Session::get('userError') }}</p>
                </div>
              @endif
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
    </section>
  </body>
</html>