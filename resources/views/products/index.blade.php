@extends('layouts.master')
@section('css')
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
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-xl-4">
										<div class="card item-card">
											<div class="card-body pb-0">
												<div class="text-center">
													<img src="{{URL::asset('assets/images/products/1.jpg')}}" alt="img" class="img-fluid w-100">
												</div>
												<div class="card-body px-0 ">
													<div class="cardtitle">
														<div>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-half text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-o text-yellow fs-16"></i></a>
															<a href="#"> (48)</a>
														</div>
														<a class="shop-title">Flower Pot</a>
													</div>
													<div class="cardprice">
														<span class="type--strikethrough number-font">$750</span>
														<span class="number-font">$974</span>
													</div>
												</div>
											</div>
											<div class="text-center pb-4 pl-4 pr-4">
												<a href="{{url('/' . $page='shop-des')}}" class="btn btn-primary btn-block mb-2"><i class="fe fe-eye mr-1"></i>View More</a>
												<a href="{{url('/' . $page='cart')}}" class="btn btn-secondary btn-block"><i class="fe fe-shopping-cart mr-1"></i>Add to Cart</a>
											</div>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="card item-card">
											<div class="card-body pb-0">
												<div class="text-center">
													<img src="{{URL::asset('assets/images/products/2.jpg')}}" alt="img" class="img-fluid w-100">
												</div>
												<div class="card-body px-0 ">
													<div class="cardtitle">
														<div>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-half text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-o text-yellow fs-16"></i></a>
															<a href="#"> (32)</a>
														</div>
														<a class="shop-title">Chair</a>
													</div>
													<div class="cardprice">
														<span class="type--strikethrough number-font">$1,457</span>
														<span class="number-font">$986</span>
													</div>
												</div>
											</div>
											<div class="text-center pb-4 pl-4 pr-4">
												<a href="{{url('/' . $page='shop-des')}}" class="btn btn-primary btn-block mb-2"><i class="fe fe-eye mr-1"></i>View More</a>
												<a href="{{url('/' . $page='cart')}}" class="btn btn-secondary btn-block"><i class="fe fe-shopping-cart mr-1"></i>Add to Cart</a>
											</div>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="card item-card">
											<div class="card-body pb-0">
												<div class="text-center">
													<img src="{{URL::asset('assets/images/products/3.jpg')}}" alt="img" class="img-fluid w-100">
												</div>
												<div class="card-body px-0 ">
													<div class="cardtitle">
														<div>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-half text-yellow fs-16"></i></a>
															<a href="#"><i class="fa fa-star-o text-yellow fs-16"></i></a>
															<a href="#"> (64)</a>
														</div>
														<a class="shop-title">Ladies Shooes</a>
													</div>
													<div class="cardprice">
														<span class="type--strikethrough number-font">$967</span>
														<span class="number-font">$724</span>
													</div>
												</div>
											</div>
											<div class="text-center pb-4 pl-4 pr-4">
												<a href="{{url('/' . $page='shop-des')}}" class="btn btn-primary btn-block mb-2"><i class="fe fe-eye mr-1"></i>View More</a>
												<a href="{{url('/' . $page='cart')}}" class="btn btn-secondary btn-block"><i class="fe fe-shopping-cart mr-1"></i>Add to Cart</a>
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-end">
									<ul class="pagination mb-5">
										<li class="disabled page-item">
											<a class="page-link" href="#">‹</a>
										</li>
										<li class="active page-item">
											<a class="page-link" href="#">1</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">2</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">3</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">4</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">5</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">›</a>
										</li>
									</ul>
								</div>
							</div>

						</div>
						<!-- End  Row -->

					</div>
				</div><!-- end app-content-->
            </div>
            {!! $products->links() !!}
@endsection
@section('js')
		<!--Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection

