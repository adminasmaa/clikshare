@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3">
            <div class="pull-right">
                <h2>{{ __('admin.Add new payment method') }}</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('admin.settings.payment-methods.index') }}"> {{ __('admin.Back') }}</a>
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
                    <form action="{{ route('admin.settings.payment-methods.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 form-label" for="payment_title">{{ __('admin.Payment Method Name') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="payment_title" name="payment_title" class="form-control" placeholder="{{ __('admin.Payment Method Name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-label" for="payment_title">{{ __('admin.Payment Method Description') }}</label>
                            <div class="col-md-9">
                                <textarea id="payment_description" name="payment_description" rows="5" cols="2" class="form-control" placeholder="{{ __('admin.Payment Method Description') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-3 form-label">{{ __('admin.Status') }}</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="payment_status">
                                    <option>{{ __('admin.Choose') }}</option>
                                    <option value="1">{{ __('admin.Active') }}</option>
                                    <option value="0">{{ __('admin.In active') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                            <button type="reset" class="btn btn-secondary pull-right" id="reset">{{ __('admin.Reset') }}</button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary pull-left">{{ __('admin.Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection