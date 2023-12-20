@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3">
            <div class="pull-right">
                <h2>{{ __('admin.Update Category') }}</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('admin.settings.categories.index') }}"> {{ __('admin.Back') }}</a>
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
                    <form class="form">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i>{{ __('admin.Category Data') }}</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">{{ __('admin.Category Name') }}</label>
                                        <input type="text" id="name"
                                            class="form-control"
                                            value="{{ $category->name }}"
                                            name="name">
                                        @error("name")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">{{ __('admin.Category Slug') }}</label>
                                        <input type="text" id="slug"
                                            class="form-control"
                                            value="{{ $category->slug }}"
                                            name="slug">
                                        @error("slug")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('admin.Status') }}</label>
                                        <select class="form-control select2" name="is_active">
                                            <option>{{ __('admin.Choose') }}</option>
                                            <option value="1" {{ $category->is_active == 1 ? 'selected' : '' }}>{{ __('admin.Active') }}</option>
                                            <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>{{ __('admin.In active') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row custom-controls-stacked d-flex">
                                <label class="custom-control custom-radio pl-5 pr-5ss">
                                    <input type="radio" class="custom-control-input" name="type" value="1" {{ is_null($category->parent_id)  ? 'checked' : '' }}>
                                    <span class="custom-control-label">{{ __('admin.Main Category') }}</span>
                                </label>
                                <label class="custom-control custom-radio pl-5 pr-5">
                                    <input type="radio" class="custom-control-input" name="type" value="2" {{ !is_null($category->parent_id) ? 'checked' : '' }}>
                                    <span class="custom-control-label">{{ __('admin.Sub Category') }}</span>
                                </label>
                            </div>
                            <div class="row {{ !is_null($category->parent_id) ? '' : 'd-none' }}" id="cats_list">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">{{ __('admin.Choose the main category') }}
                                        </label>
                                        <select name="parent_id" class="select2 form-control">
                                            <optgroup label="{{ __('admin.Please select category') }}">
                                                @if($categories && $categories -> count() > 0)
                                                    @foreach($categories as $main_category)
                                                        <option
                                                            value="{{$main_category->id }}" {{ $category->parent_id == $main_category->id ? 'selected' : '' }}>{{$main_category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('parent_id')
                                            <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                                    <button type="reset" class="btn btn-secondary pull-right" id="reset">{{ __('admin.Reset') }}</button>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                                    <button type="submit" class="btn btn-primary pull-left mb-3">{{ __('admin.Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $('input:radio[name="type"]').change(
            function(){
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').removeClass('d-none');
                }else{
                    $('#cats_list').addClass('d-none');
                }
            });
    </script>
@endpush