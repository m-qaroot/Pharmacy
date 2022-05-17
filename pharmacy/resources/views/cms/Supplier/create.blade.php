@extends('cms.parent')

@section('title' , 'Supplier')

@section('main-title' , 'Create Supplier')

@section('small-title' , 'suppliers')

@section('styles')
<link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

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
                        <h3 class="card-title">Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <input type="text" name="employee_id" id="employee_id" value="{{$id}}"
                                class="form-control form-control-solid" hidden/>

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
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Address Patient ">
                            </div>
                                                                                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Add Supplier</button>
                    <a href="{{ route('supplier.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')
<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    //     $('.employee_id').select2({
    //   theme: 'bootstrap4'
    // }
        function performStore(){

            let formData = new FormData();
                formData.append('name',document.getElementById('name').value);
                formData.append('email',document.getElementById('email').value);
                formData.append('phone',document.getElementById('phone').value);
                formData.append('address',document.getElementById('address').value);
                formData.append('employee_id',document.getElementById('employee_id').value);

            store('/cms/supplier/',formData);
}
</script>
@endsection
