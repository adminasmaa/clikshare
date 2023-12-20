@extends('layouts.master')
@section('css')
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!-- INTERNAL File Uploads css -->
		<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

		<!-- INTERNAL Time picker css -->
		<link href="{{URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet" />

		<!-- INTERNAL Date Picker css -->
		<link href="{{URL::asset('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet" />

		<!-- INTERNAL File Uploads css-->
        <link href="{{URL::asset('assets/plugins/fileupload/css/fileupload.css')}}" rel="stylesheet" type="text/css" />

		<!-- INTERNAL Mutipleselect css-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/multipleselect/multiple-select-rtl.css')}}">

		<!-- INTERNAL Sumoselect css-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">

		<!-- INTERNAL telephoneinput css-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

		<!-- INTERNAL Jquerytransfer css-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/jQuerytransfer/jquery.transfer-rtl.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css')}}">

		<!-- INTERNAL multi css-->
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/multi/multi.min.css')}}">
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Add Invoice</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers ml-2 fs-14 float-right  mt-1"></i>Pages</a></li>
									<li class="breadcrumb-item"><a href="#">Invoice</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Add Invoice</a></li>
								</ol>
							</div>
							<div class="page-rightheader">
								<div class="btn btn-list">
									<a href="#" class="btn btn-info"><i class="fe fe-settings mr-1"></i> General Settings </a>
									<a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
									<a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
								</div>
							</div>
						</div>
                        <!--End Page header-->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
						<!--Row-->
						<div class="row ">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
											Vertical Orientation Wizard
										</div>
									</div>
									<div class="card-body">
										<div id="wizard3">
											<h3>Personal Information</h3>
											<section>
												<div class="control-group form-group">
													<label class="form-label">Name</label>
													<input type="text" class="form-control required" placeholder="Name">
												</div>
												<div class="control-group form-group">
													<label class="form-label">Email</label>
													<input type="email" class="form-control required" placeholder="Email Address">
												</div>
												<div class="control-group form-group">
													<label class="form-label">Phone Number</label>
													<input type="number" class="form-control required" placeholder="Number">
												</div>
												<div class="control-group form-group mb-0">
													<label class="form-label">Address</label>
													<input type="text" class="form-control required" placeholder="Address">
												</div>
											</section>
											<h3>Billing Information</h3>
											<section>
												<div class="table-responsive mg-t-20">
												<div class="form-group mb-0">
															<input id="demo" type="file" name="files" accept=".jpg, .png, .mp4, image/jpeg, image/png" multiple>
														</div>
												</div>
											</section>
											<h3>Payment Details</h3>
											<section>
												<div class="form-group">
													<label class="form-label" >CardHolder Name</label>
													<input type="text" class="form-control" id="name12" placeholder="First Name">
												</div>
												<div class="form-group">
													<label class="form-label">Card number</label>
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Search for...">
														<span class="input-group-append">
															<button class="btn btn-info" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;
															<i class="fa fa-cc-mastercard"></i></button>
														</span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-8">
														<div class="form-group mb-sm-0">
															<label class="form-label">Expiration</label>
															<div class="input-group">
																<input type="number" class="form-control" placeholder="MM" name="expiremonth">
																<input type="number" class="form-control" placeholder="YY" name="expireyear">
															</div>
														</div>
													</div>
													<div class="col-sm-4 ">
														<div class="form-group mb-0">
															<label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
															<input type="number" class="form-control" required="">
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Row -->
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<form method="post" class="card">
									<div class="card-header">
										<h3 class="card-title">File Upload</h3>
									</div>
									<div class=" card-body">
										<div class="form-group mb-0">
											<input id="demo" type="file" name="files" accept=".jpg, .png, .mp4, image/jpeg, image/png" multiple>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- End Row-->
    <form action="{{ route('products.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection
@section('js')
		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/select2.js')}}"></script>

		<!-- INTERNAL Timepicker js -->
		<script src="{{URL::asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/time-picker/toggles.min.js')}}"></script>

		<!-- INTERNAL Datepicker js -->
		<script src="{{URL::asset('assets/plugins/date-picker/date-picker.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

		<!-- INTERNAL File-Uploads Js-->
		<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.j')}}s"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

		<!-- INTERNAL File uploads js -->
        <script src="{{URL::asset('assets/plugins/fileupload/js/dropify.js')}}"></script>
		<script src="{{URL::asset('assets/js/filupload.js')}}"></script>

		<!-- INTERNAL Multipleselect js -->
		<script src="{{URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>

		<!--INTERNAL Sumoselect js-->
		<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

		<!--INTERNAL telephoneinput js-->
		<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

		<!--INTERNAL jquery transfer js-->
		<script src="{{URL::asset('assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>

		<!--INTERNAL multi js-->
		<script src="{{URL::asset('assets/plugins/multi/multi.min.js')}}"></script>

		<!--INTERNAL Form Advanced Element -->
		<script src="{{URL::asset('assets/js/formelementadvnced.js')}}"></script>
		<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
        <script src="{{URL::asset('assets/js/file-upload.js')}}"></script>

				<!-- INTERNAl Jquery.steps js -->
				<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

		<!-- INTERNAl Forn-wizard js-->
		<script src="{{URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/formwizard/fromwizard.js')}}"></script>

		<!-- INTERNAl Accordion-Wizard-Form js-->
		<script src="{{URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/form-wizard-rtl.js')}}"></script>
		<script src="{{URL::asset('assets/js/form-wizard2.js')}}"></script>
        @endsection