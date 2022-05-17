@extends('cms.parent')

@section('title' , 'Medicin')

@section('main-title' , 'Create Medicin')

@section('small-title' , 'Medicins')

@section('styles')
<link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                        <h3 class="card-title">Create Medicin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                            <input type="text" name="employee_id" id="employee_id" 
                            value="{{$id}}"
                            class="form-control form-control-solid" hidden/> 

                            <div class="form-group col-md-6">
                                <label for="name">Write Medicin Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Your Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="type">Select Medicin Type</label>
                                <select class="form-select form-select-sm" name="type" style="width: 100%;"
                                    id="type" aria-label=".form-select-sm example">
                                    <option selected></option>
                                    <option value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                    <option value="e">e</option>
                                    <option value="f">f</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="quantity">Enter The Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity"
                                    placeholder="Enter Your Quantity ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="prod_date">Select Production Date</label>
                                <input id="prod_date" type="date"  name="prod_date" class="form-control"
                                    placeholder="Enter Production date">

                            </div><div class="form-group col-md-6">
                                <label for="exp_date">Select Expired Date</label>
                                <input id="exp_date" type="date"  name="exp_date" class="form-control"
                                    placeholder="Enter Expired date">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cost_price">Enter The Cost Price</label>
                                <input type="number" class="form-control" name="cost_price" id="cost_price"
                                    placeholder="Enter Your Cost Price ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sell_price">Enter The Sell Price</label>
                                <input type="number" class="form-control" name="sell_price" id="sell_price"
                                    placeholder="Enter Your Sell Price ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="discount_price">Enter The Value Of Discount </label>
                                <input type="number" class="form-control" name="discount_price" id="discount_price"
                                    placeholder="Enter Your Value Of Discount">
                            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Add Medicin</button>
                    <a href="{{ route('medicin.index') }}" type="button"  class="btn btn-warning">Return To Index</a>

                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')
<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $('.type').select2({
      theme: 'bootstrap4'
    })
function performStore(){
    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('type',document.getElementById('type').value);
    formData.append('quantity',document.getElementById('quantity').value);
    formData.append('prod_date',document.getElementById('prod_date').value);
    formData.append('exp_date',document.getElementById('exp_date').value);
    formData.append('cost_price',document.getElementById('cost_price').value);
    formData.append('sell_price',document.getElementById('sell_price').value);
    formData.append('discount_price',document.getElementById('discount_price').value);
    formData.append('employee_id',document.getElementById('employee_id').value);

    store('/cms/medicin/',formData);
}


</script>
@endsection
