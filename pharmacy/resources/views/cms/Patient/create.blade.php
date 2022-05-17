@extends('cms.parent')

@section('title' , 'Patient')

@section('main-title' , 'Create Patient')

@section('small-title' , 'patients')

@section('styles')

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
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="age" id="age"
                                placeholder="Enter Age Number ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Address Patient ">
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
                            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Add Patient</button>
                    <a href="{{ route('patient.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

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
                formData.append('phone',document.getElementById('phone').value);
                formData.append('gender',document.getElementById('gender').value);
                formData.append('age',document.getElementById('age').value);
                formData.append('address',document.getElementById('address').value);

            store('/cms/patient/',formData);
}
</script>
@endsection
