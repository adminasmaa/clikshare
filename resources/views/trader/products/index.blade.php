@extends('layouts.master')
@section('css')
<!-- Style css -->
    <link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css-rtl/dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">

    <!-- Animate css -->
    <link href="{{ asset('assets/css-rtl/animated.css') }}" rel="stylesheet" />

    <!--Sidemenu css -->
    <link  href="{{ asset('assets/css-rtl/sidemenu.css') }}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar-rtl.css') }}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{ asset('assets/css-rtl/icons.css') }}" rel="stylesheet" />

    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar-rtl.css') }}">

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="{{ asset('assets/colors-rtl/color1.css') }}" rel="stylesheet" type="text/css"/>

    <!-- new Css -->
    <link href="{{ asset('assets/pro.css') }}" rel="stylesheet" type="text/css"/>

    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <style>
        body,h1,h2.h3,h4,h5,h6,a,p{
            font-family: 'Cairo', sans-serif;
        }
        .shape-text{
            left: -40px;
            top: -4px;
        }

        .badgeCard {
            position: absolute;
            z-index: 100;
            right: -19px;
            top: -20px;
        }
        .modal-title {
            font-family: 'Cairo', sans-serif;
            font-size: 23px;
        }

        .filterBtn .header-option{
            display: none !important;
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
            <h4 class="page-title mb-0">{{ __('trader.Products List') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('trader.dashboard') }}"><i class="fe fe-home ml-2 fs-14 float-right "></i>{{ __('trader.Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ __('trader.Products') }}</a></li>
            </ol>
        </div>

        <!-- Serach  -->
        <div class="page-centerheader">
            <div class="mt-1">
                <form class="form-inline">
                    <div class="search-element mt-1 d-none d-lg-flex">
                        <input id="search" type="search" class="form-control header-search" placeholder="بحث عن منتج…" aria-label="Search" tabindex="1">
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Serach  -->

        <!-- btn Header for filter and Add New Product -->
        {{-- <div class="page-rightheader">
            <div class="d-flex">
                <form class="pl-3 pr-3" action="{{ url('/trader/products/filter') }}" method="POST">
                    @csrf
                    <select class="form-control" name="status">
                        <option value="0">فلترة</option>
                        <option value="1" {{ isset($status) && $status == '1' ? 'selected' : '' }}>تحت المعاينة</option>
                        <option value="2" {{ isset($status) && $status == '2' ? 'selected' : '' }}>المرفوضة</option>
                        <option value="3" {{ isset($status) && $status == '3' ? 'selected' : '' }}>المقبولة</option>
                        <option value="4" {{ isset($status) && $status == '4' ? 'selected' : '' }}>عرض الكل</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2" id="make_filter">بحث</button>
                    <a href="{{ route('trader.products.index') }}" class="btn btn-secondary mt-2 {{ Request::method() == "POST" ? '' : 'd-none' }}">حذف الفلتر</a>
                </form>
                @if (auth()->user()->can('View Product'))
                    <a class="modal-effect btn btn-indigo"  data-effect="effect-rotate-bottom" data-toggle="modal" href="#modaldemo8"><i class="fe fe-plus mr-1"></i> إضافة منتج </a>
                @endif
            </div>
        </div> --}}
        <!-- Header for filter and Add New Product -->
        <div class="page-rightheader">
            <form class="d-flex align-items-center mr-auto" action="{{ url('/trader/products/filter') }}" method="POST">
                @csrf
                <div class="btn-group mr-2">
                    <select class="form-control" name="status">
                        <option value="0">فلترة</option>
                        <option value="1" {{ isset($status) && $status == '1' ? 'selected' : '' }}>تحت المعاينة</option>
                        <option value="2" {{ isset($status) && $status == '2' ? 'selected' : '' }}>المرفوضة</option>
                        <option value="3" {{ isset($status) && $status == '3' ? 'selected' : '' }}>المقبولة</option>
                        <option value="4" {{ isset($status) && $status == '4' ? 'selected' : '' }}>عرض الكل</option>
                    </select>
                    <button type="submit" class="btn btn-primary ml-2 me-2" id="make_filter">بحث</button>
                </div>
                @if (auth()->user()->can('View Product'))
                <a class="modal-effect btn btn-indigo"  data-effect="effect-rotate-bottom" data-toggle="modal" href="#modaldemo8"><i class="fe fe-plus mr-1"></i> إضافة منتج </a>
                @endif
            </form>
        </div>
        <!-- End Header for filter and Add New Product -->
        <!-- End btn Header for filter and Add New Product -->
    </div>
    <!--End Page header-->

    <!-- add New Product Modal -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <form action="{{ route('trader.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h2 class="modal-title">إضافة منتج جديد</h2><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="file" name="product_photo" class="dropify" data-height="80%" />
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">الاقسام</label>
                                            <select name="category_id" id="select-countries" class="form-control custom-select select2">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">إسم المنتج <span class="text-red">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="اسم المنتج">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">سعر المنتج <span class="text-red">*</span></label>
                                            <input type="number" name="price" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">الكمية<span class="text-red">*</span></label>
                                            <input type="number" name="qty" class="form-control" placeholder="0" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">وصف المنتج<span class="text-red">*</span></label>
                                            <textarea name="description" class="form-control" rows="6" placeholder="وصف المنتج..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-indigo" type="submit">إضافة المنتج</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End add Product Modal -->
    <!-- End Page -->

    <!-- All Product  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($products as $product)
                    <!-- Product -->
                    <div class="col-xl-3 col-md-6 ProductDetails">
                        <div class="card item-card">
                            <div class="card-body pb-0">
                                <div class="text-center">
                                    <img src="{{ asset('ProductsAttachments/'.$product->product_photo) }}" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="card-body px-0 ">
                                    <div class="cardtitle">
                                        <div>
                                            <a href="#"> {{ $product->category?->name }}</a>
                                        </div>
                                        <a class="shop-title">{{ $product->name }}</a>
                                    </div>
                                    <div class="cardprice">
                                        <span class="number-font">{{ $product->price }} ريال</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product Button -->
                            <div class="text-center pb-4 pl-4 pr-4">
                                @if (auth()->user()->can('View Product'))
                                    <a href="#Product_1{{$product_id = $product->id}}" class="btn btn-primary btn-block mb-2" data-effect="effect-rotate-bottom" data-toggle="modal"><i class="fe fe-eye mr-1"></i> إظهار التفاصيل</a>
                                @endif
                                @if (auth()->user()->can('Delete Product'))
                                    <form action="{{ route('trader.products.destroy', [$product->id]) }}" method="post" onsubmit="return confirm('Are you sure tou want to delete this?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-secondary btn-block" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"><i class="fe fe-trash mr-1"></i>حذف المنتج</a>
                                    </form>
                                @endif
                            </div>
                            <!-- End Product Button -->
                            <!-- product status -->
                            @if ($product->status === 1)
                                <span class="badge badgeCard badge-default mt-2">تحت المعاينة</span>
                            @elseif ($product->status === 2)
                                <span class="badge badgeCard badge-danger mt-2" style="font-size: 16px;">مرفوض</span>
                            @elseif ($product->status === 3)
                                <span class="badge badgeCard badge-success mt-2" style="font-size: 16px;">مقبول</span>
                            @endif
                        </div>
                        <!-- Product Details Modal -->
                        <div class="modal" id="Product_1{{$product_id}}">
                            @php $product_detail = \App\Models\Product::where('id',$product_id)->first(); @endphp
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">التفاصيل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox card">
                                                    <div class="card-body">
                                                        <div class="ibox-content">
                                                            <div class="row mb-3">
                                                                <div class="col-md-12 col-lg-12">
                                                                    <div class="row">
                                                                        <!-- product status -->
                                                                        @if ($product_detail->status === 1)
                                                                            <span class="badge badgeCard badge-default mt-2">تحت المعاينة</span>
                                                                        @elseif ($product_detail->status === 2)
                                                                            <span class="badge badgeCard badge-danger mt-2" style="font-size: 16px;">مرفوض</span>
                                                                        @elseif ($product_detail->status === 3)
                                                                            <span class="badge badgeCard badge-success mt-2" style="font-size: 16px;">مقبول</span>
                                                                        @endif
                                                                        <div class="col-md-4">
                                                                            <div class="bg-light text-center br-4">
                                                                                <div class="p-2">
                                                                                    <img src="{{ asset('ProductsAttachments/'.$product_detail->product_photo) }}" alt="img" class="img-fluid w-100">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <h3 class="mb-1">
                                                                                <a href="#" class="text-navy">
                                                                                    {{ $product_detail->name }}
                                                                                </a>
                                                                            </h3>
                                                                            <div class="mb-3">
                                                                            </div>
                                                                            <div>
                                                                                <h5>وصف المنتج</h5>
                                                                                <p>{{ $product_detail->description }}</p>
                                                                            </div>
                                                                            <h3 class="font-weight-bold mt-3 fs-30">{{ $product_detail->price }} ريال</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5>التفاصيل</h5>
                                                        <table class="table table-striped table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">قسم المنتج</th>
                                                                    <td>{{ $product->category?->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">الكمية</th>
                                                                    <td>{{ $product_detail->qty }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">حالة المنتج</th>
                                                                    <td>
                                                                        @if ($product_detail->status === 1)
                                                                            تحت المعاينة
                                                                        @elseif ($product_detail->status === 2)
                                                                            مرفوض
                                                                        @elseif ($product_detail->status === 3)
                                                                            مقبول
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">السبب</th>
                                                                    <td> {{ $product_detail->reject_reason ?? '' }} </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Details Modal -->
                    </div>
                    <!-- End Product -->
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <ul class="pagination mb-5">
                    {{ $products->links() }}
                </ul>
            </div>
        </div>
    </div>
    <!-- End All Product  -->
@endsection

@push('scripts')

		<!-- P-scroll js-->
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scroll1-rtl.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scrollbar/p-scroll-rtl.js') }}"></script>

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

		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

		<!-- New js-->
		<script src="{{ asset('assets/js/pro.js') }}"></script>



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


		<script src="{{ asset('assets/js/pro.js') }}"></script>

        <script>
            /*=============Search==============*/
            const search = document.querySelector("#search");
            const titlehead = document.querySelectorAll(".ProductDetails .cardtitle");
            const titleCat = document.querySelectorAll(".ProductDetails .text-navy");
            const searchfilter = (e) => {
            const txt = e.target.value;
            Array.from(titlehead).forEach((item) => {
                const con = item.textContent;
                if (con.toLowerCase().indexOf(txt) != -1) {
                item.parentElement.parentElement.parentElement.parentElement.style.display = "block";
                } else {
                item.parentElement.parentElement.parentElement.parentElement.style.display = "none";
                }
            });
            };
            search.addEventListener("keyup", searchfilter);

            $(document).on('click', '#make_filter', function (e) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/trader/products/filter') }}",
                    success: function(msg) {}
                });
            });
        </script>
@endpush
