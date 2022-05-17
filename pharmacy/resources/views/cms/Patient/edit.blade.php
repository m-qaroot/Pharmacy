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
                        <h3 class="card-title">Add Patient</h3>
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
                            placeholder="Enter Your Name" value="{{$patients->user->name}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email " value="{{$patients->user->email}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number " value="{{$patients->user->phone}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="age" id="age"
                                placeholder="Enter Age Number " value="{{$patients->user->age}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Address Patient " value="{{$patients->user->address}}">
                            </div>
                                                        
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-select form-select-sm" name="gender" style="width:100%;"
                                    id="gender" aria-label=".form-select-sm example">
                                    <option selected>{{$patients->user->gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$patients->id}})" class="btn btn-primary">Update Patient</button>
                    <a href="{{ route('patient.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')
    <script>
        function performUpdate(id){

let data ={
    name: document.getElementById('name').value,
    email: document.getElementById('email').value,
    phone: document.getElementById('phone').value,
    gender: document.getElementById('gender').value,
    age: document.getElementById('age').value,
    address: document.getElementById('address').value,
}
let redirectUlr = '/cms/patient/'
update('/cms/patient/'+ id, data , redirectUlr);
}
</script>
@endsection
