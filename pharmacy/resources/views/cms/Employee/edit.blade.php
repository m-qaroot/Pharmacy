@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Create Admin')

@section('small-title' , 'admins')

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
                        <h3 class="card-title">Create Admin</h3>
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
                                <label for="name">Edit Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter Your Name" value="{{ $emps->user->name }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Edit Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Your Email" value="{{ $emps->user->email }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Edit Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number" value="{{ $emps->user->phone }}">
                            </div>
                                                        
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-select form-select-sm" name="gender" style="width:100%;"
                                    id="gender" aria-label=".form-select-sm example">
                                    <option selected>{{ $emps->user->gender }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                    id="status" aria-label=".form-select-sm example">
                                    <option selected>{{ $emps->user->status }}</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hire_date">Write Hire Date </label>
                                <input id="hire_date" type="date"  name="hire_date" class="form-control"
                                    placeholder="Enter Hire Date" value="{{ $emps->hire_date }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="salary">Write Salary</label>
                                <input id="salary" type="number"  name="salary" class="form-control"
                                    placeholder="Enter Salary" value="{{ $emps->salary }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="end_date">Write End Date </label>
                                <input id="end_date" type="date"  name="end_date" class="form-control"
                                    placeholder="Enter End Date" value="{{ $emps->end_date }}">
                            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{ $emps->id }})" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('emp.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')
    <script>
        function performUpdate(id){

            let data ={
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                gender: document.getElementById('gender').value,
                status: document.getElementById('status').value,
                hire_date: document.getElementById('hire_date').value,
                salary: document.getElementById('salary').value,
                end_date: document.getElementById('end_date').value,
        }
        let redirectUlr = '/cms/emp/'
        update('/cms/emp/'+ id, data , redirectUlr);
}
</script>
@endsection
