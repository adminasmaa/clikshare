@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers ml-2 fs-14 float-right  mt-1"></i>{{ __('admin.Users') }}</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                @if (auth()->user()->can('Add User'))
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fe fe-plus mr-1"></i>{{ __('admin.add new user') }}</a>
                @endif
            </div>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<!-- Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">{{ __('admin.Users') }}</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{ __('admin.User No') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('admin.User Name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('admin.User Email') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('admin.User Role') }}</th>
                                <th class="wd-20p border-bottom-0">{{ __('admin.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @if (auth()->user()->can('View User'))
                                            <a class="btn btn-info mr-1 ml-1" href="{{ route('admin.users.show',$user->id) }}">{{ __('admin.Show') }}</a>
                                        @endif
                                        @if (auth()->user()->can('Edit User'))
                                            <a class="btn btn-primary mr-1 ml-1" href="{{ route('admin.users.edit',$user->id) }}">{{ __('admin.Edit') }}</a>
                                        @endif
                                        @if (auth()->user()->can('Delete User'))
                                            <form action="{{ route('admin.users.destroy', [$user->id]) }}" method="post" onsubmit="return confirm('Are you sure tou want to delete this?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger mr-1 ml-1" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                                    {{ __('admin.Delete') }}
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
</div>
<!-- /Row -->
{!! $users->render() !!}
@endsection
