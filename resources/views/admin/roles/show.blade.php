@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-2">
        <div class="pull-right">
            <h2>{{ __('admin.Show Role') }}</h2>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> {{ __('admin.Back') }}</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
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
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group row mb-2">
                                <label class="col-md-3 form-label">{{ __('admin.User Type') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control select2" name="user_type" disabled>
                                        <option>{{ __('admin.Choose') }}</option>
                                        <option
                                            value="1" {{ $role->user_type == 1 ? 'selected' : ''}}>Admin</option>
                                        <option
                                            value="2" {{ $role->user_type == 2 ? 'selected' : ''}}>Call center Employee</option>
                                        <option
                                            value="3" {{ $role->user_type == 3 ? 'selected' : ''}}>Call Center Supervisor</option>
                                        <option
                                            value="4" {{ $role->user_type == 4 ? 'selected' : ''}}>Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-3 form-label">{{ __('admin.Status') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control select2" name="status" disabled>
                                        <option>{{ __('admin.Choose') }}</option>
                                        <option value="1" {{ $role->status == 1 ? 'selected' : ''}}>{{ __('admin.Active') }}</option>
                                        <option value="0" {{ $role->status == 0 ? 'selected' : ''}}>{{ __('admin.In active') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label" for="example-email">{{ __('admin.Role Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{ $role->name_ar }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">{{ __('admin.Description (Arabic)') }}</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="6" name="description_ar" readonly>{{ $role->description_ar }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label" for="example-email">{{ __('admin.Role Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">{{ __('admin.Description (English)') }}</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="6" name="description_en" readonly>{{ $role->description_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-status card-status-left br-bl-7 br-tl-7"></div>
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('admin.Permissions') }}</h3>
                                    <div class="card-options">
                                        <a href="#" class="card-options-collapse ml-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($permission as $value)
                                        @if($value->organization_id ==null)
                                            <ul class="list-unstyled detectul{{$value->id}}">
                                                <div id="popover-cnt-detect" class="hide">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="{{$value->id}}" name="permission[]" class="form-check-input select-all{{$value->id}} mx-1" {{in_array($value->id, $rolePermissions) ? "checked" : false}}  style="margin-right: -46px;" disabled>
                                                            {{$value->name}}
                                                        </label>
                                                    </div>
                                                    @foreach ($permission as $val)
                                                        @if($val->organization_id == $value->id)
                                                            <li class="listitems{{$val->id}} mx-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input id="check{{$val->organization_id}}[]" name="permission[]" value="{{$val->id}}" type="checkbox" class="form-check-input" {{in_array($val->id, $rolePermissions) ? "checked" : false}}  style="margin-right: -16px;" disabled>
                                                                        &nbsp;{{$val->name}}
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </ul>
                                        @endif
                                    @endforeach
                                </div>
							</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection