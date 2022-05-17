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
                                <label for="name">Write Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Your Name">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter your password ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number ">
                            </div>
                                                        
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-select form-select-sm" name="gender" style="width:100%;"
                                    id="gender" aria-label=".form-select-sm example">
                                    <option selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
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
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                   placeholder="Select Image">
                            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Add Admin</button>
                    <a href="{{ route('admin.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')
    <script>
        function performStore(){

            let formData = new FormData();
                formData.append('name',document.getElementById('name').value);
                formData.append('email',document.getElementById('email').value);
                formData.append('password',document.getElementById('password').value);
                formData.append('phone',document.getElementById('phone').value);
                formData.append('gender',document.getElementById('gender').value);
                formData.append('status',document.getElementById('status').value);
                formData.append('image',document.getElementById('image').files[0]);

            store('/cms/admin/',formData);
}
</script>
@endsection
