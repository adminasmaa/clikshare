@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers ml-2 fs-14 float-right  mt-1"></i>{{ __('admin.Roles') }}</a></li>
								</ol>
							</div>
							<div class="page-rightheader">
								<div class="btn btn-list">
                                    @if (auth()->user()->can('Add Role'))
    									<a href="{{ route('admin.roles.create') }}" class="btn btn-primary"><i class="fe fe-plus mr-1"></i>{{ __('admin.add new role') }}</a>
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
                <div class="card-title">{{ __('admin.Roles') }}</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{ __('admin.Role Name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('admin.Employees Count') }}</th>
                                <th class="wd-20p border-bottom-0">{{ __('admin.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @php
                                            $role = \Spatie\Permission\Models\Role::find($role->id);
                                            $rolePermissions =  \DB::table("users")->where('user_type', $role->user_type)->get();
                                        @endphp
                                        {{ count($rolePermissions) }}
                                    </td>
                                    <td class="d-flex">
                                        @if (auth()->user()->can('View Role'))
                                            <a class="btn btn-info mr-1 ml-1" href="{{ route('admin.roles.show',$role->id) }}">{{ __('admin.Show') }}</a>
                                        @endif
                                        @if (auth()->user()->can('Edit Role'))
                                            <a class="btn btn-primary mr-1 ml-1" href="{{ route('admin.roles.edit',$role->id) }}">{{ __('admin.Edit') }}</a>
                                        @endif
                                        @if (auth()->user()->can('Delete Role'))
                                            <form action="{{ route('admin.roles.destroy', [$role->id]) }}" method="post" onsubmit="return confirm('Are you sure tou want to delete this?')">
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


{!! $roles->render() !!}


@endsection
