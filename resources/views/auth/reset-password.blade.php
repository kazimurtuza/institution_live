@extends('layouts.frontend_base')

@section('content')

<main class="main forgot-pass-main">
    <!-- Sign-Up Area -->
    <section class="signup user-management">
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
        <form method="POST" action="{{ route('password.update') }}" class="form forgot-pass-form user-management__form">
            @csrf
          <h1 class="form__title">Reset Password</h1>
          {{-- <p class="form__dsc text">Please enter your email to get the OTP</p> --}}
          <div>
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />
          </div>
          <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                  name="password" required autocomplete="new-password"
                />
              </div>
            </div>
            <div class="form__field">
              <label for="confirm-pass" class="form__label"
                >Confirm Password</label
              >

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
                  id="confirm-pass"
                  placeholder="Confirm Password"
                  name="password_confirmation" required autocomplete="new-password" 
                />
              </div>
            </div>

          <button class="form__submit btn-primary">
            Reset Password<span class="icon">
              <svg
                width="21"
                height="20"
                viewBox="0 0 21 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1.47876 0.404C1.3488 0.366244 1.21104 0.364359 1.08009 0.398543C0.949142 0.432727 0.829884 0.501708 0.734958 0.598171C0.640032 0.694635 0.572976 0.814987 0.5409 0.946468C0.508824 1.07795 0.512923 1.21566 0.552762 1.345L2.98476 9.25H11.5008C11.6997 9.25 11.8904 9.32902 12.0311 9.46967C12.1717 9.61032 12.2508 9.80109 12.2508 10C12.2508 10.1989 12.1717 10.3897 12.0311 10.5303C11.8904 10.671 11.6997 10.75 11.5008 10.75H2.98476L0.552762 18.655C0.513159 18.7843 0.50924 18.9219 0.541421 19.0532C0.573603 19.1845 0.640687 19.3047 0.735574 19.401C0.830462 19.4973 0.949625 19.5662 1.08045 19.6004C1.21128 19.6345 1.3489 19.6327 1.47876 19.595C8.09373 17.6713 14.3317 14.6323 19.9238 10.609C20.0204 10.5395 20.0991 10.4481 20.1534 10.3422C20.2077 10.2363 20.236 10.119 20.236 10C20.236 9.881 20.2077 9.7637 20.1534 9.65781C20.0991 9.55191 20.0204 9.46046 19.9238 9.391C14.3318 5.3673 8.09381 2.32796 1.47876 0.404Z"
                  fill="white"
                />
              </svg>
            </span>
          </button>
       
        </form>
      </div>
    </section>
  </main>

@endsection



