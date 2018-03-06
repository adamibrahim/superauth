@extends('Superauth::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{ trans('Superauth::auth.profile') }}</div>
                    <div class="card-body">
                        <h5>{{ trans('Superauth::auth.welcomeToYour') }}
                            {{ trans('Superauth::auth.profile') }},
                            {{ trans('Superauth::auth.testUpdatingYourRoles') }}</h5>
                        @include('Superauth::layouts.partials.alerts')
                        <form method="POST" action="{{ route('admin.roles.update') }}">
                            @csrf
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $role->id }}" name='role[]'
                                           value="{{ $role->id }}"{{ (Auth::user()->hasRole($role->id))? ' checked': '' }}>
                                    <label class="form-check-label" for="inlineCheckbox{{ $role->id }}">
                                        {{ $role->name }} | {!!  ($role->moderatorRole())
                                        ? '(<strong>'.trans('Superauth::auth.moderator').'</strong>)'
                                        : '(<strong>'.trans('Superauth::auth.user').'</strong>)'  !!}
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('Superauth::auth.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
