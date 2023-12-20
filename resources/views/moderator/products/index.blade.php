@extends('layouts.master')
@section('css')
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar-rtl.css') }}">
    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- Color Skin css -->
    <link id="theme" href="{{ asset('assets/colors-rtl/color1.css') }}" rel="stylesheet" type="text/css"/>
    <!-- new Css -->
    <link href="./pro.css') }}" rel="stylesheet" type="text/css"/>
    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min-rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
		body,h1,h2.h3,h4,h5,h6,a,p{
			font-family: 'Cairo', sans-serif;
		}

		.modal-title {
			font-family: 'Cairo', sans-serif;
			font-size: 23px;
		}
	</style>
@endsection
@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3">
        <p>{{ $message }}</p>
    </div>
    @endif

    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">{{ __('moderator.Products') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-home ml-2 fs-14 float-right "></i>{{ __('moderator.Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ __('moderator.Products List') }}</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- All Product  -->
    <div class="row">
        <div class="col-lg-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title ">{{ __('moderator.List of added products') }}</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr  style="background-color: #04B8EA; color: #fff !important;">
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-cube ml-3"></span>{{ __('moderator.Product name') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-user ml-3"></span>{{ __('moderator.Trader name') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-list-ul ml-3"></span>{{ __('moderator.Category') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-info ml-3"></span>{{ __('moderator.Product description') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-check ml-3"></span>{{ __('moderator.Product status') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-cubes ml-3"></span>{{ __('moderator.Quantity') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-dollar ml-3"></span>{{ __('moderator.Product Price') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-calendar ml-3"></span>{{ __('moderator.Creation date') }}</th>
                                        <th class="border-bottom-0 font-weight-bold text-white"><span class="fa fa-cogs ml-3"></span>{{ __('moderator.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product -->
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->trader?->name }}</td>
                                            <td>{{ $product->category?->name }}</td>
                                            <td><a class="modal-effect" data-effect="effect-rotate-bottom" data-toggle="modal" href="#details-{{$product->id}}">{{ substr($product->description, 0, 50) }}...</a></td>
                                            <!-- details Modal -->
                                            <div class="modal" id="details-{{$product->id}}">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('moderator.Details') }} {{ $product->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">التفاصيل <span class="text-red">*</span></label>
                                                            <textarea class="form-control " rows="6" placeholder="" disabled>{{ $product->description }}</textarea>
                                                        </div>
                                                    </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End details Modal -->
                                            <td>
                                                @if ($product->status === 1)
                                                    <span class="badge badge-info">
                                                        تحت المعاينة
                                                    </span>
                                                @elseif ($product->status === 2)
                                                    <span class="badge badge-danger">
                                                        مرفوض
                                                    </span>
                                                @elseif ($product->status === 3)
                                                    <span class="badge badge-success">
                                                        مقبول
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->price }} ريال</td>
                                            <td>{{ \Carbon\Carbon::parse($product->created_on)->format('Y-m-d') }}</td>
                                            <!-- option -->
                                            <td>
                                                @if ($product->status === 1)
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle px-4 py-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="ti ti-more-alt"></span></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item modal-effect" data-effect="effect-rotate-bottom" data-toggle="modal" href="#editProduct{{$product_id = $product->id}}"><span class="fa fa-pencil-square-o ml-3"></span>{{ __('moderator.Edit') }}</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-green" href="{{ route('moderator.approve.product', $product->id) }}"><span class="fa fa-check-square-o ml-3"></span>{{ __('moderator.Approve') }}</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item modal-effect text-red"  data-effect="effect-fall" data-toggle="modal" href="#rejectProduct{{$product_id = $product->id}}"><span class="fa fa-ban ml-3"></span>{{ __('moderator.Reject') }}</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </td>
                                            <!-- end option -->

                                            @if ($product->status === 1)
                                                <!-- Reject Product Modal -->
                                                <div class="modal" id="rejectProduct{{$product_id}}">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('moderator.reject.product', $product_id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('moderator.Reject product') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="form-label">{{ __('moderator.Reject reason') }}<span class="text-red">*</span></label>
                                                                        <textarea name="reject_reason" class="form-control" rows="6" placeholder="{{ __('moderator.Please write the reason for rejection') }}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-indigo" type="submit">{{ __('moderator.Reject product') }}</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">{{ __('moderator.Cancel') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Reject Product Modal -->
                                            @endif

                                            @if ($product->status === 1)
                                                <!-- Edit Product Modal -->
                                                <div class="modal" id="editProduct{{$product_id}}">
                                                    @php $product_detail = \App\Models\Product::where('id',$product_id)->first(); @endphp
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <form action="{{ route('moderator.update.product',$product_detail->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title">{{ $product_detail->name }}</h2><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                                <input name="product_photo" type="file" data-height="80%" data-default-file="{{ asset('ProductsAttachments/'.$product_detail->product_photo) }}"/>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">{{ __('moderator.Categories') }}</label>
                                                                                        <select name="category_id" id="select-countries" class="form-control custom-select select2">
                                                                                            @foreach ($categories as $category)
                                                                                                <option value="{{ $category->id }}" {{ $product_detail->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">{{ __('moderator.Product name') }}<span class="text-red">*</span></label>
                                                                                        <input type="text" name="name" class="form-control" value="{{ $product_detail->name }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">{{ __('moderator.Product Price') }}<span class="text-red">*</span></label>
                                                                                        <input type="number" name="price" class="form-control" value="{{ $product_detail->price }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">{{ __('moderator.Quantity') }}<span class="text-red">*</span></label>
                                                                                        <input type="number" name="qty" class="form-control" value="{{ $product_detail->qty }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">{{ __('moderator.Product details') }}<span class="text-red">*</span></label>
                                                                                        <textarea name="description" class="form-control" rows="6">{{ $product_detail->description }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-indigo" type="submit">{{ __('moderator.Edit product') }}</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">{{ __('moderator.Cancel') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Edit Product Modal -->
                                            @endif
                                        </tr>
                                    @endforeach
                                    <!-- Product -->
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <ul class="pagination mb-5">
                                {{ $products->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <!--div-->
    <!-- End New Add Mo3zFaisal -->
        </div>
    </div>
    <!-- End All Product  -->
@endsection

@push('scripts')
    <!--INTERNAL Peitychart js-->
    <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
    <!--INTERNAL Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <!--INTERNAL ECharts js-->
    <script src="{{ asset('assets/plugins/echarts/echarts.js') }}"></script>
    <!--INTERNAL Chart js -->
    <script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>
    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!--INTERNAL Moment js-->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <!--INTERNAL Index js-->
    <script src="{{ asset('assets/js/index1.js') }}"></script>
    <!-- Simplebar JS -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <!-- New js-->
    <script src="{{ asset('pro.js') }}"></script>
    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!-- INTERNAL File uploads js -->
    <script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/filupload.js') }}"></script>
    <!--INTERNAL Form Advanced Element -->
    <script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ asset('assets/js/form-elements.js') }}"></script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- INTERNAL Data tables -->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>
    <script src="{{ asset('pro.js') }}"></script>
@endpush
