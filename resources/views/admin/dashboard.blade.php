@extends('layouts.master')
@section('page-header')
<!--Page header-->
<div class="page-header">
    <div class="page-rightheader">
    </div>
</div>
<!--End Page header-->
@endsection
@section('content')
<!-- Row-1 -->
    {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden dash1-card border-0">
            <div class="card-body">
                <p class=" mb-1 ">Total Sales</p>
                <h2 class="mb-1 number-font">$3,257</h2>
                <small class="fs-12 text-muted">Compared to Last Month</small>
                <span class="ratio bg-warning">76%</span>
                <span class="ratio-text text-muted">Goals Reached</span>
            </div>
            <div id="spark1"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden dash1-card border-0">
            <div class="card-body">
                <p class=" mb-1 ">Total User</p>
                <h2 class="mb-1 number-font">1,678</h2>
                <small class="fs-12 text-muted">Compared to Last Month</small>
                <span class="ratio bg-info">85%</span>
                <span class="ratio-text text-muted">Goals Reached</span>
            </div>
            <div id="spark2"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden dash1-card border-0">
            <div class="card-body">
                <p class=" mb-1 ">Total Income</p>
                <h2 class="mb-1 number-font">$2,590</h2>
                <small class="fs-12 text-muted">Compared to Last Month</small>
                <span class="ratio bg-danger">62%</span>
                <span class="ratio-text text-muted">Goals Reached</span>
            </div>
            <div id="spark3"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden dash1-card border-0">
            <div class="card-body">
                <p class=" mb-1">Total Tax</p>
                <h2 class="mb-1 number-font">$1,954</h2>
                <small class="fs-12 text-muted">Compared to Last Month</small>
                <span class="ratio bg-success">53%</span>
                <span class="ratio-text text-muted">Goals Reached</span>
            </div>
            <div id="spark4"></div>
        </div>
    </div> --}}
{{-- </div> --}}
<!-- End Row-1 -->


{{-- </div> --}}
{{-- </div> --}}
<!-- End app-content-->
{{-- </div> --}}
@endsection
@section('js')

<!--INTERNAL Peitychart js-->
<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!--INTERNAL Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>

<!--INTERNAL ECharts js-->
<script src="{{URL::asset('assets/plugins/echarts/echarts.js')}}"></script>

<!--INTERNAL Chart js -->
<script src="{{URL::asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>

<!--INTERNAL Moment js-->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

<!--INTERNAL Index js-->
<script src="{{URL::asset('assets/js/index1.js')}}"></script>

@endsection
