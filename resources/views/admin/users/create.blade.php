@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>{{ __('admin.add new user') }}</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> {{ __('admin.Back') }}</a>
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
                    <form action="{{ route('admin.users.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-3 form-label" for="name">{{ __('admin.User Name') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('admin.User Name') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-md-3 form-label">{{ __('admin.User Type') }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="user_type" id="user_type">
                                            <option>{{ __('admin.Choose') }}</option>
                                            <option
                                                value="1" {{old ('user_type') == 1 ? 'selected' : ''}}>Admin</option>
                                            <option
                                                value="2" {{old ('user_type') == 2 ? 'selected' : ''}}>Moderator</option>
                                            <option
                                                value="3" {{old ('user_type') == 3 ? 'selected' : ''}}>Trader</option>
                                            <option
                                                value="4" {{old ('user_type') == 4 ? 'selected' : ''}}>Marketer</option>
                                                <option
                                                    value="2" {{old ('user_type') == 5 ? 'selected' : ''}}>Call center Supervisor</option>
                                                <option
                                                    value="3" {{old ('user_type') == 6 ? 'selected' : ''}}>Call Center Employee</option>
                                                <option
                                                    value="4" {{old ('user_type') == 7 ? 'selected' : ''}}>Employee</option>
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
                                    <label class="col-md-3 form-label" for="example-email">{{ __('admin.User Email') }}</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('admin.User Email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label" for="example-email">{{ __('admin.User Mobile') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="{{ __('admin.User Mobile') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-label" for="password">{{ __('admin.User Password') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="password" name="password" class="form-control" placeholder="{{ __('admin.User Password') }}">
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
                                        <h3 class="card-title">{{ __('admin.User Roles') }}</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse ml-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="fixed-height-sm">
                                            <div id="roles" class="form-default">
                                            </div>
                                        </div>
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
<script type="text/javascript">
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    $(function() {
        $('#user_type').change(function(e) {
            e.preventDefault(); 
            var userType = $("#user_type").val();
            $('#loader').show();
            $.ajax({
                type:'POST',
                url:"{{ route('admin.checkRoleType.post') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    userType:userType
                },
            success:function(data)
            {
                $('#roles').empty();
                $.each(data, function(value, text){
                    $("#roles").append('<div class="form-check"><input id="input" class="form-check-input" name="roles[]" type="checkbox" value="'+text.id+'" style="margin-right: -16px;"/>'+text.name + '</div>');
                });
            },
            error: function()
            {
                alert('error...');
            },
            complete: function(){
                $('#loader').hide();
            }
            });
        });
   });
 </script>
 
@endpush