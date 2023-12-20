@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3">
            <div class="pull-right">
                <h2>{{ __('trader.Update User') }}</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('trader.traders.index') }}"> {{ __('admin.Back') }}</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('trader.traders.update', $trader->id) }}" method="POST"
                          enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-3 form-label" for="name">{{ __('trader.User Name') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="form-control"
                                               value="{{ $trader->name }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="example-email">{{ __('trader.User Email') }}</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" name="email" class="form-control"
                                               value="{{ $trader->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="example-email">{{ __('trader.User Mobile') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="mobile" name="mobile" class="form-control"
                                               value="{{ $trader->mobile }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="password">{{ __('trader.User Password') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="password" name="password" class="form-control"
                                               placeholder="{{ __('trader.User Password') }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.company_name') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="company_name" name="company_name" class="form-control"
                                               value="{{ $trader->detail->company_name ?? '' }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.country_name') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="country_name" name="country_name" class="form-control"
                                               value="{{ $trader->detail->country_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-label" for="name">{{ __('trader.address') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="full_address" name="full_address" class="form-control"
                                               value="{{ $trader->detail->full_address ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.name_in_passport') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name_in_passport" name="name_in_passport"
                                               class="form-control"
                                               value="{{ $trader->detail->name_in_passport ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.company_name_in_cr') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="company_name_in_cr" name="company_name_in_cr"
                                               class="form-control"
                                               value="{{ $trader->detail->company_name_in_cr ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.id_document') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="id_document" name="id_document"
                                               class="form-control"
                                               value="{{ $trader->detail->id_document ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.cr_document') }}</label>
                                    <div class="col-md-5">
                                        <input type="file" name="cr_document"
                                               class="form-control"
                                        >
                                    </div>
                                    <div class="col-md-3">
                                        @if(!empty($trader->detail))
                                            <img
                                                src="{{asset('TradersAttachments/'.$trader->detail->cr_document)}}"
                                                onerror="this.src='{{asset('TradersAttachments/default.jpeg')}}'"
                                                class="form-control"
                                            >
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.passport_document') }}</label>
                                    <div class="col-md-5">
                                        <input type="file" name="passport_document"
                                               class="form-control"
                                        >

                                    </div>
                                    <div class="col-md-3">
                                        @if(!empty($trader->detail))

                                            <img
                                                src="{{asset('TradersAttachments/'.$trader->detail->passport_document ?? '')}}"
                                                onerror="this.src='{{asset('TradersAttachments/default.jpeg')}}'"
                                                class="form-control"
                                            >
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label"
                                           for="name">{{ __('trader.vat_document') }}</label>
                                    <div class="col-md-5">
                                        <input type="file" name="vat_document"
                                               class="form-control"
                                        >
                                    </div>
                                    <div class="col-md-3">
                                        @if(!empty($trader->detail))

                                            <img
                                                src="{{asset('TradersAttachments/'.$trader->detail->vat_document ?? '')}}"
                                                onerror="this.src='{{asset('TradersAttachments/default.jpeg')}}'"
                                                class="form-control"
                                            >
                                        @endif
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-secondary pull-right"
                                            id="reset">{{ __('trader.update') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
