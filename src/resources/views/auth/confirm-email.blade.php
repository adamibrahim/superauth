@extends('Superauth::layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ trans('Superauth::auth.emailConfirmation') }}</div>

                <div class="card-body">
                    @include('Superauth::layouts.partials.alerts')
                    <p>{{ trans('Superauth::auth.anEmailHasBeenSentTo') }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ trans('Superauth::auth.pleaseCheckAndClickTheConfirmationLink') }}</p>
                    <form method="POST" action="{{route('confirm.resend')}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('Superauth::auth.resendConfirmationEmail') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
