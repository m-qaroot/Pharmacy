@extends('cms.parent')

@section('title' , 'Supplier')

@section('main-title' , 'Create Supplier')

@section('small-title' , 'suppliers')

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
                        <h3 class="card-title">Add Supplier</h3>
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
                            placeholder="Enter Your Name" value="{{$sups->user->name}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email " value="{{$sups->user->email}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number " value="{{$sups->user->phone}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Address Patient " value="{{$sups->user->address}}">
                            </div>
                                                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$sups->id}})" class="btn btn-primary">Update Supplier</button>
                    <a href="{{ route('supplier.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

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
    address: document.getElementById('address').value,
}
let redirectUlr = '/cms/supplier/'
update('/cms/supplier/'+ id, data , redirectUlr);
}
</script>
@endsection
