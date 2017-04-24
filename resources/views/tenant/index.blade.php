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

          <!-- TABLE: List of tenants -->
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
                    <th>Tenant Name</th>
                    <th>Provision Type</th>
                    <th>Domain</th>
                    <th>Manager Name</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($tenants as $tenant)
                    <tr>
                      <td>{{$tenant->id}}</td>
                      <td>{{$tenant->tenantname}}</td>
                      <td>{{$tenant->domaintype}}</td>
                      <td>{{$tenant->domain}}</td>
                      <td>{{$tenant->manager}}</td>
                      <td>
                        <div style = "float:left">
                          <a href="{{action('TenantController@edit', [$tenant->id])}}" class = "btn btn-primary btn-xs">Edit</a>
                        </div>
                        <div style = "float:left; margin-left:20px">
                          {{ Form::open([ 'method'  => 'delete', 'route' => [ 'tenant.destroy', $tenant->id ] ]) }}
                              {{ Form::hidden('tenant', $tenant->id) }}
                              {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
                          {{ Form::close() }}
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{action('TenantController@create')}}" class="btn btn-sm btn-info btn-flat pull-right">Create New Tenant</a>
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