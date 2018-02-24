@extends('Superauth::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{trans('Superauth::auth.profile')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ trans('Superauth::auth.youAreLoggedIn') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
