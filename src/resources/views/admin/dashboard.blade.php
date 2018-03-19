@extends('Superauth::admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{trans('Superauth::auth.adminDashboard')}}</div>
                <div class="card-body">
                    <h5>
                        {{ trans('Superauth::auth.welcomeToYour') }}
                        {{ trans('Superauth::auth.dashboard') }}
                    </h5>
                    @include('Superauth::layouts.partials.alerts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
