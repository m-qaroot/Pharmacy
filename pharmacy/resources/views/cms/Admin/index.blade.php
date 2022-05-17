@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Index Admin')

@section('small-title' , 'admin')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
                <a href="{{ route('admin.create') }}" type="button"  class="btn btn-info">Add new Admin</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table  table-bordered table-striped table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin )
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->user ? $admin->user->name  : 'NULL' }}</td>
                    <td>{{ $admin->user ? $admin->user->email  : 'NULL' }}</td>
                    <td>{{ $admin->user ? $admin->user->phone : 'NULL' }}</td>
                    <td>{{ $admin->user ? $admin->user->gender : 'Null' }}</td>
                    <td>{{ $admin->user ? $admin->user->status : 'NULL' }}</td>
                    <td><img class="img-circle img-bordered-sm" src="{{('/storage/images/admins/'.$admin->image)}}" width="50" height="50" alt="Admin Image"></td>
                    <td>{{ $admin->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            {{-- @can('Edit-Admin') --}}

                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                            {{-- @endcan --}}
                            {{-- @can('Delete-Admin') --}}

                        <a href="#" onclick="performDestroy({{ $admin->id }}, this)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        {{-- @endcan --}}

                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
        </div>
    </div>
</div>

        <!-- /.card-body -->
      </div>
    </div>

      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , ref){
        confirmDestroy('/cms/admin/'+id ,ref);
    }
</script>
@endsection
