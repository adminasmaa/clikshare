@extends('layouts.master4')
@section('css')

<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet" />

    <!-- INTERNAl Forn-wizard css-->
    <link
      href="{{ asset('assets/plugins/forn-wizard/css/forn-wizard.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/plugins/formwizard/smart_wizard.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_dots-rtl.css') }}"
      rel="stylesheet"
    />

    <!-- Color Skin css -->
    <link
      id="theme"
      href="{{ asset('assets/colors-rtl/color1.css') }}"
      rel="stylesheet"
      type="text/css" />
    <!-- New css -->
    <link href="{{ asset('assets/css/newStyle.css') }}" rel="stylesheet" />

@endsection

@section('content')
    <!---Global-loader-->
    <div id="global-loader">
        <img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader" />
      </div>
      <!--- End Global-loader-->

      <!-- Page -->
      <div class="page">
        <div class="page-main">
          <!--header-->
          <div class="hor-header header top-header">
            <div class="container">
              <div class="d-flex justify-content-center">
                <!-- <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a> -->
                <a class="header-brand" href="#">
                  <img
                    src="{{ asset('assets/images/logo.svg') }}"
                    class="header-brand-img desktop-lgo"
                    alt="Admitro logo"
                  />
                  <img
                    src="{{ asset('assets/images/logo-02.png') }}"
                    class="header-brand-img dark-logo"
                    alt="Admitro logo"
                  />
                  <img
                    src="../../assets/images/brand/favicon.png"
                    class="header-brand-img mobile-logo"
                    alt="Admitro logo"
                  />
                  <img
                    src="../../assets/images/brand/favicon1.png"
                    class="header-brand-img darkmobile-logo"
                    alt="Admitro logo"
                  />
                </a>
              </div>
            </div>
          </div>
          <!--/header-->

          <div class="d-lg-none" style="height: 100px"></div>

          <!-- Hor-Content -->
          <div class="hor-content main-content d-flex align-items-center vh-100">
            <div class="container">
              <!--Row -->
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">التسجيل</div>
                    </div>
                    <div class="card-body">
                    <form id="wizard2" method="POST" enctype="multipart/form-data" action="{{ route('register.account') }}">
                        @csrf
                        <!-- stage1 -->
                        <h3>تسجيل جديد</h3>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <section>
                          <div class="row d-flex justify-content-center">
                            <div
                              class="col-md-5 col-lg-5 col-sm-5"
                              align="center"
                            >
                              <label class="fCeck">
                                <input
                                  type="radio"
                                  name="is_merchant"
                                  selected
                                  checked
                                  class="card-input-element"
                                  id="ven"
                                  value="1"
                                />
                                <div
                                  class="d-flex justify-content-center align-items-center ceckDiv"
                                >
                                  <i
                                    class="fa fa-briefcase"
                                    data-toggle="tooltip"
                                    title=""
                                    data-original-title="fa fa-briefcase"
                                  ></i>
                                </div>
                                <h1 class="cTitle">تاجر</h1>
                              </label>
                            </div>
                            <div
                              class="col-md-5 col-lg-5 col-sm-5"
                              align="center"
                            >
                              <label class="fCeck">
                                <input
                                  type="radio"
                                  name="is_merchant"
                                  class="card-input-element"
                                  id="ven2"
                                  value="0"
                                />
                                <div
                                  class="d-flex justify-content-center align-items-center ceckDiv"
                                >
                                  <i
                                    class="fa fa-bullhorn"
                                    data-toggle="tooltip"
                                    title=""
                                    data-original-title="fa fa-bullhorn"
                                  ></i>
                                </div>
                                <h1 class="cTitle">مسوق</h1>
                              </label>
                            </div>
                            <div class="col-12 mt-5" align="center">
                              <a class="singIn" href="{{ route('login') }}">تسجيل الدخول</a>
                            </div>
                          </div>
                        </section>

                        <!-- Stage2 -->
                        <h3>معلومات الحساب</h3>
                        <section>
                          <div class="row">
                            <div class="col-md-6 col-lg-12 mt-md-5">
                              <label class="form-control-label"
                                >البريد الالكتروني:
                                <span class="tx-danger">*</span></label
                              >
                              <input
                                class="form-control"
                                id="aEmail"
                                name="email"
                                placeholder="ادخل بريدك الالكتروني"
                                required=""
                                type="email"
                                data-parsley-type-message="قم بكاتبة ايميلك بصورة صحيحة"
                                data-parsley-required-message="بريدك الالكتروني مطلوب"
                              />
                            </div>
                            <div class="col-md-6 col-lg-6 mg-t-20 mt-5">
                              <label class="form-control-label"
                                >كلمة المرور:
                                <span class="tx-danger">*</span></label
                              >
                              <input
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="ادخل كلمة المرور"
                                required=""
                                type="password"
                                data-parsley-minlength="8"
                                data-parsley-minlength-message="يجب ان تتكون كلمة المرور من 8 أحرف"
                                data-parsley-errors-container=".errorspannewpassinput"
                                data-parsley-required
                                data-parsley-required-message="كلمة المرور مطلوبة"
                              />
                            </div>
                            <div class="col-md-6 col-lg-6 mg-t-20 mt-5">
                              <label class="form-control-label"
                                >إعادة كلمة المرور:
                                <span class="tx-danger">*</span></label
                              >
                              <input
                                class="form-control"
                                id="rePassword"
                                name="password_confirmation"
                                data-equalto="#password"
                                data-required="true"
                                placeholder="إعادة كلمة المرور"
                                required=""
                                type="password"
                                data-parsley-minlength="8"
                                data-parsley-errors-container=".errorspanconfirmnewpassinput"
                                data-parsley-required-message="الرجاء قم بإعادة كتابة كلمة المرور."
                                data-parsley-equalto="#password"
                                data-parsley-equalto-message="يجب ان تكون مطابقة لكلمة المرور"
                                data-parsley-required
                              />
                            </div>
                          </div>
                        </section>

                        <!-- Stage3 -->
                        <h3>نوع التسجيل</h3>
                        <section>
                          <div class="row">
                            <div class="col-12">
                              <div class="row">
                                <div class="col-md-6 col-lg-6">
                                  <input
                                    class="inputRadio"
                                    type="radio"
                                    id="control_01"
                                    name="is_est"
                                    value="1"
                                    checked
                                  />
                                  <label class="comp labelinR" for="control_01">
                                    <div
                                      class="d-flex justify-content-around align-content-center overflow-hidden position-relative"
                                    >
                                      <h2><i class="fa fa-group"></i></h2>
                                      <h1>شركة</h1>
                                    </div>
                                  </label>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                  <input
                                    class="inputRadio"
                                    type="radio"
                                    id="control_02"
                                    name="is_est"
                                    value="0"
                                  />
                                  <label class="labelinR" for="control_02">
                                    <div
                                      class="d-flex justify-content-around align-content-center overflow-hidden position-relative"
                                    >
                                      <h2><i class="fa fa-male"></i></h2>
                                      <h1>فرد</h1>
                                    </div>
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="container">
                                <div class="row">
                                  <div class="col-12" id="compD">
                                    <!-- form_Wizard2 -->
                                  </div>
                                  <div class="col-md-6 col-lg-5 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >رقم الجوال<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      id="compMobile"
                                      name="mobile"
                                      placeholder="ادخل رقم الجوال"
                                      required=""
                                      type="text"
                                      data-parsley-type="number"
                                      data-parsley-type-message="ادخل رقم جوال صحيح"
                                      data-parsley-minlength="10"
                                      data-parsley-minlength-message="ادخل رقم جوال يحتوى على 10 ارقام"
                                      data-parsley-maxlength="10"
                                      data-parsley-maxlength-message="يجب الا يكون رقم الجوال اكثر من 10 ارقام"
                                      data-parsley-required
                                      data-parsley-required-message="رقم الجوال مطلوب"
                                    />
                                  </div>
                                  <div class="col-md-6 col-lg-7 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >رقم الهاتف<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      id="compPhone"
                                      name="phone_number"
                                      placeholder="ادخل رقم الهاتف"
                                      required=""
                                      type="text"
                                      data-parsley-type="number"
                                      data-parsley-type-message="ادخل رقم هاتف صحيح"
                                      data-parsley-minlength="10"
                                      data-parsley-minlength-message="ادخل رقم الهاتف يحتوى على 10 ارقام"
                                      data-parsley-maxlength="10"
                                      data-parsley-maxlength-message="يجب الا يكون رقم الهاتف اكثر من 10 ارقام"
                                      data-parsley-required
                                      data-parsley-required-message="رقم الهاتف مطلوب"
                                    />
                                  </div>
                                  <div class="col-md-3 col-lg-3 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >البلد<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      id="compCountry"
                                      name="country_name"
                                      placeholder="ادخل البلد"
                                      required=""
                                      type="text"
                                      data-parsley-minlength="3"
                                      data-parsley-minlength-message="يجب ان تتكون من 3 أحرف او اكثر"
                                      data-parsley-errors-container=".errorspannewpassinput"
                                      data-parsley-required
                                      data-parsley-required-message="البلد مطلوبة"
                                    />
                                  </div>
                                  <div class="col-md-3 col-lg-3 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >المدينة<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      name="city_name"
                                      placeholder="ادخل المدينة"
                                      required=""
                                      type="text"
                                    />
                                  </div>
                                  <div class="col-md-3 col-lg-3 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >العنوان<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      id="compAddress"
                                      name="full_address"
                                      placeholder="ادخل العنوان"
                                      required=""
                                      type="text"
                                    />
                                  </div>
                                  <div class="col-md-3 col-lg-3 mg-t-20 mt-5">
                                    <label class="form-control-label"
                                      >الرمز البريدي<span class="tx-danger"
                                        >*</span
                                      ></label
                                    >
                                    <input
                                      class="form-control"
                                      id="compPostal"
                                      name="postal_code"
                                      placeholder="ادخل الرمز البريدي"
                                      required=""
                                      type="number"
                                    />
                                  </div>
                                  <select multiple="multiple" name="payment_methods_values[]" id="payValueHide" style="visibility: hidden;"></select>
                                  <select multiple="multiple" name="payment_methods_types[]" id="payTypeHide" style="visibility: hidden;"></select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <!-- Stage4 -->
                        <h3>الوثائق الشخصية</h3>
                        <section>
                          <div class="row">
                            <div class="col-12">
                              <div class="container">
                                <div class="row" id="dFile">
                                  <!-- form_Wizard2 -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>

                        <!-- stage5 -->
                        <h3>الوثائق المالية</h3>
                        <section>
                          <div class="row">
                           <!-- FORM  -->
                           <div class="col-md-12">
                              <fieldset>
                                <!-- Text input-->
                                <div class="col-md-12">
                                  <h1>طرق الدفع</h1>
                                  <select class="form-select form-select-lg form-control custom-select select2 select2-hidden-accessible"  style="width:100%;" id="paymentMethod">
                                    @if (count($payment_methods) > 0)
                                        @foreach ($payment_methods as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->payment_title }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                </div>
                                <!-- Prepended text-->
                                <div class="col-md-12 mt-5">
                                  <label class="form-group control-label" for="tPaymentMethod">بيانات طريقة الدفع</label>
                                  <div class="col-md-12">
                                      <input id="tPaymentMethod" name="tPaymentMethod" class="form-control" placeholder="بيانات طريقة الدفع" type="text">
                                      <span id="errorType" class="help-block" style="visibility: hidden; color: red;">الرجاء كتابة البيانات</span>
                                  </div>
                                </div>
                                <!-- Button Add -->
                              </fieldset>
                            <div class="col-md-12 ">
                              <label class=" form-group control-label" for="btn-save"></label>
                              <div class="col-md-12" id="saveupdate">
                                <button type="button" id="btn-save" name="btn-save" class="btn btn-primary btn-lg btn-block" onclick="addMethod()"><i class="fa fa-plus"></i> أضافة الطريقة</button>
                              </div>
                            </div>
                          </div>
                          <!-- LIST -->
                          <div class="col-md-12 mt-5">
                              <h1> طرق الدفع المضافة</h1>
                              <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                  <tr>
                                    <td>الطريقة</td>
                                    <th>البيانات</th>
                                    <th>تعديل | حذف</th>
                                  </tr>

                                </thead>
                                <tbody id="form-list-client-body">
                                </tbody>
                              </table>
                          </div>
                          <br>
                             </div>
                          </div>
                        </section>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/Row-->
            </div>
          </div>
          <!-- End hor-content-->
        </div>
        <div class="d-lg-none" style="height: 180px"></div>
      </div>
      <!-- End Page -->
      <!-- Back to top -->
      <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
@endsection
@section('js')
    <!--Horizontal-menu js-->
    <script src="{{ asset('assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>
    <!-- Sticky js-->
    <script src="{{ asset('assets/js/stiky.js') }}"></script>
    <!-- P-scroll js-->
    <script src="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scrollbar/p-scroll-rtl.js') }}"></script>
    <!-- INTERNAl Jquery.steps js -->
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- INTERNAl Forn-wizard js-->
    <script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('assets/plugins/formwizard/fromwizard.js') }}"></script>
    <!-- INTERNAl Accordion-Wizard-Form js-->
    <script src="{{ asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard-rtl.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard2.js') }}"></script>
    <script src="{{ asset('assets/js/registerForm.js') }}"></script>
    {{-- <script src="{{ asset('script.js') }}"></script> --}}
@endsection
