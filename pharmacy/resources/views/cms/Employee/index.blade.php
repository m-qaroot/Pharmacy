@extends('cms.parent')

@section('title' , 'Employee')

@section('main-title' , 'Index Employee')

@section('small-title' , 'employee')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
                <a href="{{ route('emp.create') }}" type="button"  class="btn btn-info">Add new Employee</a>

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
                <th>Qualification</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Hire Date</th>
                <th>Salary</th>
                <th>End Date</th>
                <th>Suppliers</th>
                <th>Medicins</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($emps as $emp )
                <tr>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->user ? $emp->user->name  : 'NULL' }}</td>
                    <td>{{ $emp->user ? $emp->user->email  : 'NULL' }}</td>
                    <td><img class="img-circle img-bordered-sm" src="{{('/storage/files/emps/'.$emp->files)}}" width="50" height="50" alt="Qualification"></td>
                    <td>{{ $emp->user ? $emp->user->phone : 'NULL' }}</td>
                    <td>{{ $emp->user ? $emp->user->gender : 'Null' }}</td>
                    <td>{{ $emp->user ? $emp->user->status : 'NULL' }}</td>
                    <td>{{ $emp->hire_date }}</td>
                    <td>{{ $emp->salary }}</td>
                    <td>{{ $emp->end_date }}</td>
                    <td>
                      <a href="{{ route('indexSupplier' , ['id'=>$emp->id])}}"
                          class="btn btn-primary">
                          ({{ $emp->suppliers_count }}) Supplier/s</a>
                    </td>
                    <td>
                      <a href="{{ route('indexMedicin' , ['id'=>$emp->id])}}"
                          class="btn btn-primary">
                          ({{ $emp->medicins_count }}) Medicin/s</a>
                    </td>
                    <td>
                        <div class="btn-group">

                            <a href="{{ route('emp.edit', $emp->id) }}" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                            
                        <a href="#" onclick="performDestroy({{ $emp->id }}, this)" class="btn btn-danger">
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
        confirmDestroy('/cms/emp/'+id ,ref);
    }
</script>
@endsection
