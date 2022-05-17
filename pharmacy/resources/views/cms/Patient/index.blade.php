@extends('cms.parent')

@section('title' , 'Patient')

@section('main-title' , 'Index Patient')

@section('small-title' , 'patients')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
                <a href="{{ route('patient.create') }}" type="button"  class="btn btn-info">Add new Patient</a>

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
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient )
                  <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->user ? $patient->user->name  : 'NULL' }}</td>
                    <td>{{ $patient->user ? $patient->user->email  : 'NULL' }}</td>
                    <td>{{ $patient->user ? $patient->user->phone : 'NULL' }}</td>
                    <td>{{ $patient->user ? $patient->user->age : 'NULL' }}</td>
                    <td>{{ $patient->user ? $patient->user->gender : 'Null' }}</td>
                    <td>{{ $patient->user ? $patient->user->address : 'NULL' }}</td>
                    <td>{{ $patient->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                        
                            <a href="#" onclick="performDestroy({{ $patient->id }}, this)" class="btn btn-danger">
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
        confirmDestroy('/cms/patient/'+id ,ref);
    }
</script>
@endsection
