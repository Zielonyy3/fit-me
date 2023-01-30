@extends('layouts.app')

@section('content')
    <h2 class="h3 text-center mb-3">
        {{__('common.log_in_to_your_account')}}
    </h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3{{ $errors->has('email') ? ' is-invalid' : ''}}">
            {!! Form::label('email', __('common.email_address'), ['class' => 'form-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'twoj@email.pl']) !!}
            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
        </div>
        <div class="mb-2 {{ $errors->has('password') ? ' is-invalid' : ''}}">
            <label class="form-label" for="password">
                {{__('common.password')}}
                <span class="form-label-description">
                  <a href="./forgot-password.html">{{__('common.i_forgot_password')}}</a>
                </span>
            </label>
            <div class="input-group input-group-flat">
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'****']) !!}
                <span class="input-group-text">
                  <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
            </div>
            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
        </div>
        <div class="mb-2">
            <label class="form-check">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label">{{__('common.remember_me')}}</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{__('common.sign_in')}}</button>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        {{__('common.don_have_account_yet')}} <a href="./sign-up.html" tabindex="-1">{{__('common.sign_up')}}</a>
    </div>
@endsection
