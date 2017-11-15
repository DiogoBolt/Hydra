@extends('layouts.admin')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="main-contend home-back">
        <div class="main">
            <div class="box">
                <div class="box-body">

                    @include('layouts.info')

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add new Promotion</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="/promotions/create" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Percentage</label>
                                    <input class="form-control" type="number" name="percentage" min="0.00" max="100.00" step="0.10" />
                                </div>
                                <div class="form-group">
                                    <label>From</label>
                                    <input name="from">
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <input name="to">
                                </div>

                                @foreach($categories as $category)
                                    <div class="checkbox-inline">
                                        <label><input type="checkbox" class="check" id="{{$category->id}}">Select all {{$category->name}}</label>
                                    </div>
                                @endforeach
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Img</th>
                                            <th>Select</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->brand->name}}</td>
                                                <td>{{$product->price}}€</td>
                                                <td><img src="/img/{{$product->img}}" width="50px" height="50px"></td>
                                                <td><input name="products[]" value="{{$product->id}}" type="checkbox" class="{{$product->category->id}}"></td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-success" type="submit">Create</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="/assets/plugins/daterangepicker/moment.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<script>
    $('input[name="from"]').datetimepicker({});
    $('input[name="to"]').datetimepicker({});

    $(".check").change(function() {
        if(this.checked)
        {
            $("."+this.id).prop('checked', true);
        }
        });

</script>
@endsection
