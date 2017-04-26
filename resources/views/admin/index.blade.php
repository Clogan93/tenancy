@extends('dashboard')

@section('content')

  @if (Session::has('message'))
    <div class="flash alert alert-info">
      <p>{{ Session::get('message') }}</p>
    </div>
  @endif

  <!-- Content Wrapper. Contains page content -->

  <div class="row">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

          <!-- TABLE: List of Users-->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Users</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(sizeof($users) <= 0)
                    <tr>
                      <td colspan = "6" align="center"><h3>There are no users</h3></td>
                    </tr>
                  @else
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>
                          @if($user->admin == 1)
                            <span class="label label-success">Administrator</span>
                          @elseif($user->admin == 0)
                            <span class="label label-primary">Tenant Manager</span>
                          @endif
                        </td>
                        <td>
                          @if($user->deleted == 1)
                            <span class="label label-success">Deleted</span>
                          @elseif($user->deleted == 0)
                            <span class="label label-primary">Published</span>
                          @endif
                        </td>
                        <td>
                          <div style = "float:left">
                            <a href="{{action('AdminController@edit', [$user->id])}}" class = "btn btn-primary btn-xs">Edit</a>
                          </div>
                          @if($user->deleted !== 1 && $user->admin !== 1)
                            <div style = "float:left; margin-left:20px">
                              {{ Form::open([ 'method'  => 'delete', 'route' => [ 'admin.destroy', $user->id ] ])
       }}
                                  {{ Form::hidden('user', $user->id) }}
                                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
                              {{ Form::close() }}
                            </div>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{action('AdminController@create')}}" class="btn btn-sm btn-info btn-flat pull-right">Create New User</a>
            </div>
            <!-- /.box-footer -->
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

@section('js')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{ asset('/bower_components/AdminLTE/dist/js/pages/dashboard2.js') }}" type="text/javascript"></script>

@endsection