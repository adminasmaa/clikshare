@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers ml-2 fs-14 float-right  mt-1"></i>{{ __('admin.Payment Methods') }}</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                @if (auth()->user()->can('Add Payment Method'))
                    <a href="{{ route('admin.settings.payment-methods.create') }}" class="btn btn-primary"><i class="fe fe-plus mr-1"></i>{{ __('admin.Add new payment method') }}</a>
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
                    <div class="card-title">{{ __('admin.Payment Methods') }}</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('admin.Payment Method No') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('admin.Payment Method Name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('admin.Payment Method Description') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('admin.Payment Method Status') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('admin.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_methods as $key => $payment_method)
                                    <tr>
                                        <td>{{ $payment_method->id }}</td>
                                        <td>{{ $payment_method->payment_title }}</td>
                                        <td>{{ $payment_method->payment_description }}</td>
                                        <td>
                                            @if($payment_method->payment_status === 1)
                                                <label class="badge badge-success">{{ __('admin.Active') }}</label>
                                            @else
                                                <label class="badge badge-danger">{{ __('admin.In active') }}</label>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            @if (auth()->user()->can('View Payment Method'))
                                                <a class="btn btn-info mr-1 ml-1" href="{{ route('admin.settings.payment-methods.show',$payment_method->id) }}">{{ __('admin.Show') }}</a>
                                            @endif
                                            @if (auth()->user()->can('Edit Payment Method'))
                                                <a class="btn btn-primary mr-1 ml-1" href="{{ route('admin.settings.payment-methods.edit',$payment_method->id) }}">{{ __('admin.Edit') }}</a>
                                            @endif
                                            @if (auth()->user()->can('Delete Payment Method'))
                                                <form action="{{ route('admin.settings.payment-methods.destroy', [$payment_method->id]) }}" method="post" onsubmit="return confirm('Are you sure tou want to delete this?')">
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
        </div>
    </div>
    <!-- /Row -->
    {!! $payment_methods->render() !!}
@endsection
