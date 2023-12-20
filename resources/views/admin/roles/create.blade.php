@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>{{ __('admin.add new role') }}</h2>
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
                <form action="{{ route('admin.roles.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group row mb-2">
                                <label class="col-md-3 form-label">{{ __('admin.User Type') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control select2" name="user_type">
                                        <option>{{ __('admin.Choose') }}</option>
                                        <option value="1" {{old ('user_type') == 1 ? 'selected' : ''}}>Admin</option>
                                        <option value="2" {{old ('user_type') == 2 ? 'selected' : ''}}>Moderator</option>
                                        <option value="3" {{old ('user_type') == 3 ? 'selected' : ''}}>Trader</option>
                                        <option value="4" {{old ('user_type') == 4 ? 'selected' : ''}}>Marketer</option>
                                        <option  value="5" {{old ('user_type') == 2 ? 'selected' : ''}}>Call center Supervisor</option>
                                        <option value="6" {{old ('user_type') == 3 ? 'selected' : ''}}>Call Center Employee</option>
                                        <option value="7" {{old ('user_type') == 4 ? 'selected' : ''}}>Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-3 form-label">{{ __('admin.Status') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control select2" name="status">
                                        <option>{{ __('admin.Choose') }}</option>
                                        <option value="1">{{ __('admin.Active') }}</option>
                                        <option value="0">{{ __('admin.In active') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label" for="example-email">{{ __('admin.Role Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="name_ar" name="name_ar" class="form-control" placeholder="{{ __('admin.Role Name (Arabic)') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">{{ __('admin.Description (Arabic)') }}</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="6" name="description_ar" placeholder="{{ __('admin.Role Description') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label" for="example-email">{{ __('admin.Role Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('admin.Role Name (English)') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">{{ __('admin.Description (English)') }}</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="6" name="description_en" placeholder="{{ __('admin.Role Description') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="reset" class="btn btn-secondary pull-right" id="reset">{{ __('admin.Reset') }}</button>
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
                                        @if($value->organization_id==null)
                                            <ul class="list-unstyled detectul{{$value->id}}">
                                                <div id="popover-cnt-detect">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="{{$value->id}}" name="permission[]" class="form-check-input select-all{{$value->id}}" style="margin-right: -20px;" >
                                                            {{$value->name}}
                                                        </label>
                                                    </div>
                                                    @foreach ($permission as $val)
                                                        @if($val->organization_id == $value->id)
                                                            <li class="listitems{{$val->id}} mx-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input id="check{{$val->organization_id}}[]" name="permission[]" value="{{$val->id}}" type="checkbox" class="form-check-input"  style="margin-right: -20px;">
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
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary pull-left">{{ __('admin.Save') }}</button>
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
      for (let i = 1; i < 45; i++) {
        $(document).on('change','.select-all'+i,function(){
          if($(this).is(':checked')) {
              $(`[id="check${i}[]"]`).each(function(){
                  $(this).prop('checked', true);
              });
          } else {
              $(`[id="check${i}[]"]`).each(function(){
                  $(this).prop('checked', false);
              });
          }
      });
      }

        $(function () {
            $('#user_type').on('change', function () {
              if ($('#user_type').val() == 0){
                for (let i = 1; i < 18; i++) {
                  $(`.detectul${i}`).show();
                }

              }
                else if ($('#user_type').val() == 1){
                for (let i = 1; i < 9; i++) {
                  $(`.detectul${i}`).hide();
                }
                $('.detectul14').show();
                $('.detectul16').show();
                $('.detectul17').show();
              }else if($('#user_type').val() ==2){
                for (let i = 1; i < 9; i++) {
                  $(`.detectul${i}`).hide();
                }
                $('.detectul14').show();
                $('.listitems56').hide();
                  $('.listitems58').hide();
                  $('.listitems59').hide();
                  $('.listitems60').hide();

                  }else if($('#user_type').val() ==3){
                    for (let i = 1; i < 9; i++) {
                  $(`.detectul${i}`).hide();
                }

                for (let i = 6; i < 14; i++) {
                  $(`.detectul${i}`).show();

                }
                $('.listitems30').hide();
                  }
            });
        });

    </script>
@endpush