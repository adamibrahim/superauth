@extends('Superauth::layouts.app')
<style>
    .cms-media-img {
        float: left;
        width: 120px;
        margin-right:20px;

    }
    .cms-media-details {
        float: left;
    }
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @include('Superauth::layouts.partials.alerts')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{ asset('img/users/adam.jpg') }}" class="cms-media-img">
                        <div class="cms-media-details">
                            <p>{{ $user->email }}</p>
                            <div class="input-group mb-3">
                                <input type="password" placeholder="{{ trans('Superauth::auth.password') }}" name="password"
                                       aria-describedby="basic-addon2" aria-label="{{ trans('Superauth::auth.password') }}"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-arrow-circle-right"></i> {{ trans('Superauth::auth.login') }}
                                    </button>
                                </div>
                            </div>
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ trans('Superauth::auth.not') }} {{ $user->name }} ?
                            </a>
                        </div>

                        <input  type="hidden" name="email" value="{{ $user->email  }}" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
