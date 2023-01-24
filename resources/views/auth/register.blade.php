@extends('layouts.app')

@section('content')
    <h2 class="h3 text-center mb-3">
        {{__('common.sign_up_to_your_account')}}
    </h2>
    <form action="./" method="get" autocomplete="off" novalidate="">
        <div class="mb-3">
            <label class="form-label">{{__('common.name')}}</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">{{__('common.email_address')}}</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">{{__('common.password')}}</label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="****" autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password"
                     data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle
                            cx="12" cy="12" r="2"></circle><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__('common.confirm_password')}}</label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="****" autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password"
                     data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle
                            cx="12" cy="12" r="2"></circle><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{__('common.register')}}</button>
        </div>
    </form>

@endsection
