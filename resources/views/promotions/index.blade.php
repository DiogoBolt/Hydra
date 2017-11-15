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

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Promotions</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Begin</th>
                                        <th>End</th>
                                        <th>Edit</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promotions as $promotion)
                                        <tr>
                                            <td>{{$promotion->name}}</td>
                                            <td>{{$promotion->begin}}</td>
                                            <td>{{$promotion->end}}</td>
                                            <td><a class="btn btn-warning" href="/promotions/edit/{{$promotion->id}}">Edit</a></td>
                                            @if($promotion->active == 1)
                                                <td><a class="btn btn-danger" href="/promotions/disable/{{$promotion->id}}">Disable</a></td>
                                                @else
                                                <td><a class="btn btn-success" href="/promotions/enable/{{$promotion->id}}">Enable</a></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="/promotions/new" class="btn btn-sm btn-info btn-flat pull-left">Add New Promotion</a>
                        </div>
                        <!-- /.box-footer -->
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

</script>
@endsection
