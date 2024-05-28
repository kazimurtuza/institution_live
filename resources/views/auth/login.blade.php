@extends('layouts.frontend_base')

@section('content')


<main class="main login-main">
    <!-- Login Area -->
    <section class="login user-management">
      <div class="container flex-ctr-spb">
        <div class="user-management__thumb-wrap">
          <figure class="user-management__thumb">
            <img src="{{ asset('/assets/frontend/imgs/user-management.webp')}}" alt="" />

            <span class="user-management__thumb__overlay">
              <svg
                width="770"
                height="992"
                viewBox="0 0 770 992"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  opacity="0.7"
                  width="770"
                  height="992"
                  fill="url(#paint0_linear_76_1411)"
                />
                <defs>
                  <linearGradient
                    id="paint0_linear_76_1411"
                    x1="385"
                    y1="0"
                    x2="385"
                    y2="992"
                    gradientUnits="userSpaceOnUse"
                  >
                    <stop stop-color="#1A906B" stop-opacity="0.78" />
                    <stop offset="1" stop-color="white" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
          </figure>
        </div>

        <form method="POST" action="{{ route('login') }}" class="form login-form user-management__form">
            @csrf
          <h1 class="form__title">Login</h1>
          <p class="form__dsc text">Please enter your details to login</p>
          <div><x-validation-errors class="error-log" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            @if (session()->has('block_error'))<div class="alert alert-danger">{{ session('block_error') }}</div> @endif
          </div>
          <div class="form__fields">
            <div class="form__field">
              <label for="email" class="form__label">Email</label
              ><input
                type="email"
                id="email"
                class="form__input"
                placeholder="Email Address"
                name="email" :value="old('email')" required autofocus autocomplete="username"
              />
            </div>
            <div class="form__field">
              <label for="password" class="form__label">Password</label>
              <div class="password-wrap">
                <button type="button" class="password-eye password-toggler">
                  <svg
                    width="24px"
                    height="24px"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12"
                      stroke="#A0A3BD"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12"
                      stroke="#A0A3BD"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <circle
                      cx="12"
                      cy="12"
                      r="3"
                      stroke="#A0A3BD"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <span class="password-eye__close"></span>
                </button>
                <input
                  type="password"
                  class="form__input password-input"
                  id="password"
                  placeholder="Password"
                  name="password" required autocomplete="current-password"
                />
              </div>
            </div>
          </div>

          <div class="form__text-row flex-ctr-spb">
            <div class="form__text-col check-btn">
              <input
                type="checkbox"
                id="remember-pass"

              />
              <label for="remember-pass">Rememeber password</label>
            </div>
            <div class="form__text-col">
              <a href="/forgot-password" class="form__link">Forgot password?</a>
            </div>
          </div>
          <button class="form__submit btn-primary">
            Login<span class="icon">
              <svg
                width="20"
                height="10"
                viewBox="0 0 20 10"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M14.72 0.719996C14.8606 0.579546 15.0512 0.500656 15.25 0.500656C15.4488 0.500656 15.6394 0.579546 15.78 0.719996L19.53 4.47C19.6705 4.61062 19.7493 4.80125 19.7493 5C19.7493 5.19875 19.6705 5.38937 19.53 5.53L15.78 9.28C15.7113 9.35368 15.6285 9.41279 15.5365 9.45378C15.4445 9.49477 15.3452 9.51681 15.2445 9.51859C15.1438 9.52036 15.0438 9.50184 14.9504 9.46412C14.857 9.4264 14.7722 9.37025 14.701 9.29903C14.6297 9.22782 14.5736 9.14298 14.5359 9.04959C14.4982 8.9562 14.4796 8.85618 14.4814 8.75547C14.4832 8.65477 14.5052 8.55546 14.5462 8.46346C14.5872 8.37146 14.6463 8.28866 14.72 8.22L17.19 5.75H1C0.801088 5.75 0.610322 5.67098 0.46967 5.53033C0.329018 5.38967 0.25 5.19891 0.25 5C0.25 4.80108 0.329018 4.61032 0.46967 4.46967C0.610322 4.32901 0.801088 4.25 1 4.25H17.19L14.72 1.78C14.5795 1.63937 14.5007 1.44875 14.5007 1.25C14.5007 1.05125 14.5795 0.860621 14.72 0.719996Z"
                  fill="white"
                />
              </svg>
            </span>
          </button>
          <p class="form__text">
            Don’t have an account? <a href="/register" class="form__link">Register</a>
          </p>
        </form>
      </div>
    </section>
  </main>


{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
@endsection