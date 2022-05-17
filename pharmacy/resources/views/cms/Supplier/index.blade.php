@extends('cms.parent')

@section('title' , 'Supplier')

@section('main-title' , 'Index Supplier')

@section('small-title' , 'suppliers')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
                <a href="{{ route('createSupplier' , $id) }}" type="button"  class="btn btn-info">Add New Supplier</a>

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
                <th>Address</th>
                <th>Created At</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sups as $sup )
                  <tr>
                    <td>{{ $sup->id }}</td>
                    <td>{{ $sup->user ? $sup->user->name  : 'NULL' }}</td>
                    <td>{{ $sup->user ? $sup->user->email  : 'NULL' }}</td>
                    <td>{{ $sup->user ? $sup->user->phone : 'NULL' }}</td>
                    <td>{{ $sup->user ? $sup->user->address : 'NULL' }}</td>
                    <td>{{ $sup->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('supplier.edit', $sup->id) }}" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                        
                            <a href="#" onclick="performDestroy({{ $sup->id }}, this)" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
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
        confirmDestroy('/cms/supplier/'+id ,ref);
    }
</script>
@endsection
