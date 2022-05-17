@extends('cms.parent')

@section('title' , 'Supplier')

@section('main-title' , 'Index Supplier')

@section('small-title' , 'suppliers')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
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
                <th>Medicin Name</th>
                <th>Medicin Type</th>
                <th>Medicin Quantity</th>
                <th>Production Date</th>
                <th>Expired Date</th>
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>Discount Price</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($meds as $med )
                  <tr>
                    <td>{{ $med->id }}</td>
                    <td>{{ $med->name }}</td>
                    <td>{{ $med->type }}</td>
                    <td>{{ $med->quantity }}</td>
                    <td>{{ $med->prod_date }}</td>
                    <td>{{ $med->exp_date }}</td>
                    <td>{{ $med->cost_price }}</td>
                    <td>{{ $med->sell_price }}</td>
                    <td>{{ $med->discount_price }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('medicin.edit', $med->id) }}" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                        
                            <a href="#" onclick="performDestroy({{ $med->id }}, this)" class="btn btn-danger">
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
        confirmDestroy('/cms/medicin/'+id ,ref);
    }
</script>
@endsection
