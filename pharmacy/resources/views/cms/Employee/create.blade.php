@extends('cms.parent')

@section('title' , 'Employees')

@section('main-title' , 'Create Employee')

@section('small-title' , 'Employees')

@section('styles')
<link rel="stylesheet" href="{{ asset('cms/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Employee</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            {{-- <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Role</label>
                                      <select class="form-control select2" name="role_id" style="width: 100%;" id="role_id">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">

                            <div class="form-group col-md-6">
                                <label for="name">Write Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Your Name">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Your Email ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Write Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter Your Password ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="files">Choose File</label>
                                <input type="file" name="files" class="form-control" id="files"
                                   placeholder="Select File">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number ">
                            </div>
                                                        
                               
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                    id="status" aria-label=".form-select-sm example">
                                    <option selected></option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="hire_date">Write Hire Date </label>
                                <input id="hire_date" type="date"  name="hire_date" class="form-control"
                                    placeholder="Enter Hire Date">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="salary">Write Salary</label>
                                <input id="salary" type="number"  name="salary" class="form-control"
                                    placeholder="Enter Salary">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="end_date">Write End Date </label>
                                <input id="end_date" type="date"  name="end_date" class="form-control"
                                    placeholder="Enter End Date">
                            </div>
                            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Add Employee</button>
                    <a href="{{ route('emp.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        function performStore(){

            let formData = new FormData();
                formData.append('name',document.getElementById('name').value);
                formData.append('email',document.getElementById('email').value);
                formData.append('password',document.getElementById('password').value);
                formData.append('files',document.getElementById('files').files[0]);
                formData.append('phone',document.getElementById('phone').value);
                formData.append('gender',document.getElementById('gender').value);
                formData.append('status',document.getElementById('status').value);
                formData.append('hire_date',document.getElementById('hire_date').value);
                formData.append('salary',document.getElementById('salary').value);
                formData.append('end_date',document.getElementById('end_date').value);

            store('/cms/emp', formData);
}
</script>
@endsection
