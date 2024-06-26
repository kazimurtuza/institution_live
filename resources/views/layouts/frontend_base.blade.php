<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />

    <link rel="icon" type="image/x-icon" href="{{ asset('storage/app/public/' .$settings->favicon) }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/user-dashboard.css')}}" />
    <title>@if($metaTitle) {{$metaTitle}} @else International Islamic Institute @endif</title>
    <meta name="description" content="@if($metaContent) {{$metaContent}} @else International Islamic Institute @endif">
    <style>
      .alert.alert-success {
    color: #fff;
    background: green;
    padding: 10px;
    margin: 10px;
    /* text-align: center; */
}
.error-log {
  color: red;
}
    </style>
  </head>
  <body>
    <!-- Mobile Offcanvas -->
    <div class="mbl-offcanvas">
      <div class="mbl-offcanvas__close flex-ctr-ctr">×</div>
      <div class="mbl-offcanvas__inner">
        <div class="mbl-offcanvas__logo">
          <a href="index.html"><img src="{{ asset('/assets/frontend/imgs/logo-dark.webp')}}" alt="logo" /></a>
        </div>
        <nav class="mbl-offcanvas__nav">
          <ul class="mbl-offcanvas__nav-list parent-list">

            <li><a href="/" class="mbl-offcanvas__nav-link {{ (request()->segment(1) == '') ? 'active-link' : '' }}">Home</a></li>
            <li><a href="/about_us" class="mbl-offcanvas__nav-link {{ (request()->segment(1) == 'about_us') ? 'active-link' : '' }}">About Us</a></li>
            <li><a href="/courses/" class="mbl-offcanvas__nav-link {{ (request()->segment(1) == 'courses' and request()->segment(2) == '') ? 'active-link' : '' }}">Courses</a></li>
            <li><a href="/courses/course-offers" class="mbl-offcanvas__nav-link {{ (request()->segment(2) == 'course-offers') ? 'active-link' : '' }}">Course Offers</a></li>
            <li><a href="/faq/" class="mbl-offcanvas__nav-link {{ (request()->segment(1) == 'faq') ? 'active-link' : '' }}">Faq</a></li>
            <li><a href="/contact" class="mbl-offcanvas__nav-link">Contact</a></li>
          </ul>
        </nav>

        @auth

          <div class="header__btns flex-ctr">
            <a href="/user/dashboard" class="header__btn">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" class="header__btn btn-primary flex-ctr-spb"
                    onclick="event.preventDefault();
                          this.closest('form').submit();">
                    <span>{{ __('Log Out') }}</span>
                    <span class="icon">

                    </span>
                </x-dropdown-link>
            </form>
          </div>

          @else

          <div class="header__btns flex-ctr">
            <a href="/login" class="header__btn">Log In</a
            ><a href="/register" class="header__btn btn-primary">Sign Up</a>
          </div>

          @endauth
      </div>
    </div>

    <!-- Header -->
    <header class="header">
      <div class="header__top">
        <div class="container flex-ctr-spb">
          <ul class="header__top__left flex-ctr">
            <li class="flex-ctr">
              <span class="icon">
                <svg
                  width="21"
                  height="21"
                  viewBox="0 0 21 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.0975 19.5571L10.1587 19.5921L10.1832 19.6061C10.2804 19.6587 10.3891 19.6862 10.4996 19.6862C10.61 19.6862 10.7187 19.6587 10.8159 19.6061L10.8404 19.593L10.9025 19.5571C11.2447 19.3542 11.5787 19.1376 11.9035 18.9079C12.7444 18.3142 13.5302 17.6459 14.2511 16.9111C15.9521 15.1699 17.7188 12.5536 17.7188 9.1875C17.7188 7.27297 16.9582 5.43685 15.6044 4.08307C14.2506 2.72929 12.4145 1.96875 10.5 1.96875C8.58547 1.96875 6.74935 2.72929 5.39557 4.08307C4.04179 5.43685 3.28125 7.27297 3.28125 9.1875C3.28125 12.5528 5.04875 15.1699 6.74887 16.9111C7.46956 17.6458 8.25499 18.3141 9.09563 18.9079C9.42075 19.1376 9.75498 19.3542 10.0975 19.5571ZM10.5 11.8125C11.1962 11.8125 11.8639 11.5359 12.3562 11.0437C12.8484 10.5514 13.125 9.88369 13.125 9.1875C13.125 8.49131 12.8484 7.82363 12.3562 7.33134C11.8639 6.83906 11.1962 6.5625 10.5 6.5625C9.80381 6.5625 9.13613 6.83906 8.64384 7.33134C8.15156 7.82363 7.875 8.49131 7.875 9.1875C7.875 9.88369 8.15156 10.5514 8.64384 11.0437C9.13613 11.5359 9.80381 11.8125 10.5 11.8125Z"
                    fill="white"
                  />
                </svg> </span
              >{{$settings->address}}
            </li>
            <li>
              <a href="mailto:{{$settings->email}}" class="header__top__link flex-ctr"
                >
                <span class="icon">
                <svg width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ffffff" d="M255.4 48.2c.2-.1 .4-.2 .6-.2s.4 .1 .6 .2L460.6 194c2.1 1.5 3.4 3.9 3.4 6.5v13.6L291.5 355.7c-20.7 17-50.4 17-71.1 0L48 214.1V200.5c0-2.6 1.2-5 3.4-6.5L255.4 48.2zM48 276.2L190 392.8c38.4 31.5 93.7 31.5 132 0L464 276.2V456c0 4.4-3.6 8-8 8H56c-4.4 0-8-3.6-8-8V276.2zM256 0c-10.2 0-20.2 3.2-28.5 9.1L23.5 154.9C8.7 165.4 0 182.4 0 200.5V456c0 30.9 25.1 56 56 56H456c30.9 0 56-25.1 56-56V200.5c0-18.1-8.7-35.1-23.4-45.6L284.5 9.1C276.2 3.2 266.2 0 256 0z"/></svg>
                </span>
                {{$settings->email}}</a
              >
            </li>
          </ul>
          <ul class="header__top__right header__top__socials flex-ctr">
            @if($settings->facebook)
            <li class="header__top__social">
              <a target="_blank" href="{{$settings->facebook}}" class="header__top__social__link">
                <svg
                  width="20"
                  height="21"
                  viewBox="0 0 20 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M14.3447 11.6068L14.863 8.19417H11.621V5.98058C11.621 5.04672 12.0731 4.13592 13.5251 4.13592H15V1.23058C15 1.23058 13.6621 1 12.3836 1C9.71233 1 7.96804 2.63483 7.96804 5.5932V8.19417H5V11.6068H7.96804V19.857C8.56393 19.9516 9.17352 20 9.79452 20C10.4155 20 11.0251 19.9516 11.621 19.857V11.6068H14.3447Z"
                    fill="white"
                  />
                </svg>
              </a>
            </li>
            @endif
            @if($settings->twitter)
            <li class="header__top__social">
              <a target="_blank" href="{{$settings->twitter}}" class="header__top__social__link">
                <svg
                  width="20"
                  height="21"
                  viewBox="0 0 20 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.5475 6.48396C17.5552 6.65996 17.5552 6.82796 17.5552 7.00396C17.563 12.34 13.6426 18.5 6.47319 18.5C4.35865 18.5 2.2827 17.868 0.5 16.684C0.808692 16.724 1.11738 16.74 1.42608 16.74C3.1779 16.74 4.88343 16.132 6.26483 15.004C4.59789 14.972 3.1316 13.844 2.62226 12.196C3.20877 12.316 3.81072 12.292 4.3818 12.124C2.56824 11.756 1.26401 10.1 1.2563 8.17197C1.2563 8.15597 1.2563 8.13997 1.2563 8.12397C1.79651 8.43597 2.40617 8.61197 3.02356 8.62797C1.31803 7.44396 0.78554 5.08396 1.81966 3.23595C3.80301 5.76396 6.72015 7.29196 9.85337 7.45996C9.53696 6.05996 9.96913 4.58796 10.9801 3.59595C12.5467 2.06795 15.0162 2.14795 16.498 3.77195C17.37 3.59595 18.2112 3.25995 18.9752 2.78795C18.682 3.72395 18.0723 4.51596 17.262 5.01996C18.0337 4.92396 18.79 4.70796 19.5 4.38795C18.9752 5.20396 18.3115 5.90796 17.5475 6.48396Z"
                    fill="white"
                  />
                </svg>
              </a>
            </li>
            @endif

            @if($settings->instagram)
            <li class="header__top__social">
              <a target="_blank" href="{{$settings->instagram}}" class="header__top__social__link">
                <svg
                  width="20"
                  height="21"
                  viewBox="0 0 20 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_24_507)">
                    <path
                      d="M10 2.3023C12.6717 2.3023 12.9853 2.31421 14.0413 2.36185C15.0179 2.40552 15.5459 2.56828 15.8992 2.70722C16.3676 2.88984 16.7011 3.10421 17.0504 3.45355C17.3998 3.8029 17.6181 4.13636 17.7968 4.6048C17.9317 4.95812 18.0985 5.48611 18.1421 6.46268C18.1898 7.51866 18.2017 7.83227 18.2017 10.504C18.2017 13.1757 18.1898 13.4893 18.1421 14.5453C18.0985 15.5218 17.9357 16.0498 17.7968 16.4031C17.6141 16.8716 17.3998 17.205 17.0504 17.5544C16.7011 17.9037 16.3676 18.1221 15.8992 18.3007C15.5459 18.4357 15.0179 18.6024 14.0413 18.6461C12.9853 18.6937 12.6717 18.7056 10 18.7056C7.32831 18.7056 7.01469 18.6937 5.95872 18.6461C4.98214 18.6024 4.45415 18.4397 4.10084 18.3007C3.6324 18.1181 3.29893 17.9037 2.94959 17.5544C2.60024 17.205 2.3819 16.8716 2.20326 16.4031C2.06828 16.0498 1.90155 15.5218 1.85788 14.5453C1.81024 13.4893 1.79833 13.1757 1.79833 10.504C1.79833 7.83227 1.81024 7.51866 1.85788 6.46268C1.90155 5.48611 2.06431 4.95812 2.20326 4.6048C2.38587 4.13636 2.60024 3.8029 2.94959 3.45355C3.29893 3.10421 3.6324 2.88587 4.10084 2.70722C4.45415 2.57225 4.98214 2.40552 5.95872 2.36185C7.01469 2.31024 7.33228 2.3023 10 2.3023ZM10 0.5C7.28464 0.5 6.94324 0.511909 5.87535 0.559547C4.81144 0.607185 4.08496 0.777888 3.44978 1.02402C2.79079 1.27809 2.23502 1.62346 1.67924 2.17924C1.12346 2.73501 0.782057 3.29476 0.524018 3.94978C0.277888 4.58495 0.107185 5.31143 0.0595475 6.37932C0.0119095 7.44323 0 7.78464 0 10.5C0 13.2154 0.0119095 13.5568 0.0595475 14.6247C0.107185 15.6886 0.277888 16.415 0.524018 17.0542C0.778087 17.7132 1.12346 18.269 1.67924 18.8247C2.23502 19.3805 2.79476 19.7219 3.44978 19.98C4.08496 20.2261 4.81144 20.3968 5.87932 20.4444C6.94721 20.4921 7.28464 20.504 10.004 20.504C12.7233 20.504 13.0607 20.4921 14.1286 20.4444C15.1925 20.3968 15.919 20.2261 16.5582 19.98C17.2172 19.7259 17.7729 19.3805 18.3287 18.8247C18.8845 18.269 19.2259 17.7092 19.4839 17.0542C19.7301 16.419 19.9008 15.6925 19.9484 14.6247C19.996 13.5568 20.008 13.2193 20.008 10.5C20.008 7.78067 19.996 7.44323 19.9484 6.37535C19.9008 5.31143 19.7301 4.58495 19.4839 3.94581C19.2299 3.28682 18.8845 2.73104 18.3287 2.17527C17.7729 1.61949 17.2132 1.27809 16.5582 1.02005C15.923 0.773918 15.1965 0.603216 14.1286 0.555578C13.0568 0.511909 12.7154 0.5 10 0.5Z"
                      fill="white"
                    />
                    <path
                      d="M10 2.3023C12.6717 2.3023 12.9853 2.31421 14.0413 2.36185C15.0179 2.40552 15.5459 2.56828 15.8992 2.70722C16.3676 2.88984 16.7011 3.10421 17.0504 3.45355C17.3998 3.8029 17.6181 4.13636 17.7968 4.6048C17.9317 4.95812 18.0985 5.48611 18.1421 6.46268C18.1898 7.51866 18.2017 7.83227 18.2017 10.504C18.2017 13.1757 18.1898 13.4893 18.1421 14.5453C18.0985 15.5218 17.9357 16.0498 17.7968 16.4031C17.6141 16.8716 17.3998 17.205 17.0504 17.5544C16.7011 17.9037 16.3676 18.1221 15.8992 18.3007C15.5459 18.4357 15.0179 18.6024 14.0413 18.6461C12.9853 18.6937 12.6717 18.7056 10 18.7056C7.32831 18.7056 7.01469 18.6937 5.95872 18.6461C4.98214 18.6024 4.45415 18.4397 4.10084 18.3007C3.6324 18.1181 3.29893 17.9037 2.94959 17.5544C2.60024 17.205 2.3819 16.8716 2.20326 16.4031C2.06828 16.0498 1.90155 15.5218 1.85788 14.5453C1.81024 13.4893 1.79833 13.1757 1.79833 10.504C1.79833 7.83227 1.81024 7.51866 1.85788 6.46268C1.90155 5.48611 2.06431 4.95812 2.20326 4.6048C2.38587 4.13636 2.60024 3.8029 2.94959 3.45355C3.29893 3.10421 3.6324 2.88587 4.10084 2.70722C4.45415 2.57225 4.98214 2.40552 5.95872 2.36185C7.01469 2.31024 7.33228 2.3023 10 2.3023Z"
                      fill="white"
                    />
                    <path
                      d="M10 5.367C7.16554 5.367 4.86304 7.66553 4.86304 10.504C4.86304 13.3424 7.16157 15.6409 10 15.6409C12.8384 15.6409 15.137 13.3424 15.137 10.504C15.137 7.66553 12.8384 5.367 10 5.367ZM10 13.8346C8.158 13.8346 6.66534 12.342 6.66534 10.5C6.66534 8.65799 8.158 7.16534 10 7.16534C11.842 7.16534 13.3347 8.65799 13.3347 10.5C13.3347 12.342 11.842 13.8346 10 13.8346Z"
                      fill="#1A906B"
                    />
                    <path
                      d="M15.3395 6.35945C16.0016 6.35945 16.5384 5.82269 16.5384 5.16056C16.5384 4.49843 16.0016 3.96167 15.3395 3.96167C14.6774 3.96167 14.1406 4.49843 14.1406 5.16056C14.1406 5.82269 14.6774 6.35945 15.3395 6.35945Z"
                      fill="white"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_24_507">
                      <rect
                        width="20"
                        height="20"
                        fill="white"
                        transform="translate(0 0.5)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </a>
            </li>
            @endif
            @if($settings->linkdin)
            <li class="header__top__social">
              <a target="_blank" href="{{$settings->linkdin}}" class="header__top__social__link">
                <svg
                  width="20"
                  height="21"
                  viewBox="0 0 20 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_24_508)">
                    <path
                      d="M18.5236 0.5H1.47639C1.08483 0.5 0.709301 0.655548 0.432425 0.932425C0.155548 1.2093 0 1.58483 0 1.97639V19.0236C0 19.4152 0.155548 19.7907 0.432425 20.0676C0.709301 20.3445 1.08483 20.5 1.47639 20.5H18.5236C18.9152 20.5 19.2907 20.3445 19.5676 20.0676C19.8445 19.7907 20 19.4152 20 19.0236V1.97639C20 1.58483 19.8445 1.2093 19.5676 0.932425C19.2907 0.655548 18.9152 0.5 18.5236 0.5ZM5.96111 17.5375H2.95417V7.98611H5.96111V17.5375ZM4.45556 6.6625C4.11447 6.66058 3.7816 6.55766 3.49895 6.36674C3.21629 6.17582 2.99653 5.90544 2.8674 5.58974C2.73826 5.27404 2.70554 4.92716 2.77336 4.59288C2.84118 4.2586 3.0065 3.9519 3.24846 3.71148C3.49042 3.47107 3.79818 3.30772 4.13289 3.24205C4.4676 3.17638 4.81426 3.21133 5.12913 3.34249C5.44399 3.47365 5.71295 3.69514 5.90205 3.97901C6.09116 4.26288 6.19194 4.59641 6.19167 4.9375C6.19488 5.16586 6.15209 5.39253 6.06584 5.604C5.97959 5.81547 5.85165 6.00742 5.68964 6.16839C5.52763 6.32936 5.33487 6.45607 5.12285 6.54096C4.91083 6.62585 4.68389 6.66718 4.45556 6.6625ZM17.0444 17.5458H14.0389V12.3278C14.0389 10.7889 13.3847 10.3139 12.5403 10.3139C11.6486 10.3139 10.7736 10.9861 10.7736 12.3667V17.5458H7.76667V7.99306H10.6583V9.31667H10.6972C10.9875 8.72917 12.0042 7.725 13.5556 7.725C15.2333 7.725 17.0458 8.72083 17.0458 11.6375L17.0444 17.5458Z"
                      fill="white"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_24_508">
                      <rect
                        width="20"
                        height="20"
                        fill="white"
                        transform="translate(0 0.5)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </a>
            </li>
            @endif
            @if($settings->snapchat)
            <li class="header__top__social">
              <a target="_blank" href="{{$settings->snapchat}}" class="header__top__social__link">
                <svg
                  width="20"
                  height="21"
                  viewBox="0 0 20 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M18.7422 15.0023C15.5861 13.4989 15.0831 11.1777 15.0607 11.0055C15.0336 10.797 15.0029 10.633 15.2367 10.4209C15.4622 10.2159 16.4625 9.60668 16.74 9.41607C17.1988 9.10043 17.4008 8.7853 17.2519 8.39793C17.1477 8.12994 16.8942 8.029 16.627 8.029C16.5428 8.02925 16.4588 8.03853 16.3766 8.05667C15.8725 8.16427 15.383 8.41279 15.0998 8.47991C15.0657 8.48855 15.0308 8.49319 14.9956 8.49375C14.8446 8.49375 14.7873 8.42765 14.8019 8.24882C14.8373 7.7067 14.9123 6.6486 14.8254 5.66018C14.7061 4.30027 14.2604 3.62646 13.7319 3.03054C13.4762 2.74155 12.289 1.5 9.99782 1.5C7.70667 1.5 6.52101 2.74155 6.2669 3.02695C5.73681 3.62287 5.2916 4.29668 5.1734 5.65659C5.08644 6.64501 5.16455 7.7026 5.19683 8.24523C5.20725 8.41535 5.15413 8.49016 5.00313 8.49016C4.96798 8.48957 4.93303 8.48493 4.89898 8.47633C4.61624 8.4092 4.12677 8.16069 3.62271 8.05308C3.54049 8.03495 3.45651 8.02567 3.37225 8.02541C3.10408 8.02541 2.85154 8.12789 2.7474 8.39434C2.59847 8.78172 2.79947 9.09684 3.25978 9.41248C3.53732 9.60309 4.53761 10.2118 4.76308 10.4173C4.99636 10.6294 4.96616 10.7934 4.93908 11.0019C4.91669 11.1767 4.41316 13.4978 1.25763 14.9987C1.07278 15.0868 0.758268 15.2733 1.31283 15.5746C2.18346 16.0481 2.76302 15.9973 3.21343 16.2827C3.59564 16.5251 3.36965 17.0478 3.64771 17.2363C3.9893 17.4684 4.99896 17.2199 6.30335 17.6437C7.39685 17.9983 8.06128 19 10.0004 19C11.9396 19 12.6233 17.9936 13.6975 17.6437C14.9993 17.2199 16.011 17.4684 16.3531 17.2363C16.6307 17.0478 16.4052 16.5251 16.7874 16.2827C17.2378 15.9973 17.8169 16.0481 18.688 15.5746C19.2415 15.2769 18.927 15.0904 18.7422 15.0023Z"
                    fill="white"
                  />
                </svg>
              </a>
            </li>
            @endif
            @if($settings->youtube)
                <li>
                  <a target="_blank" href="{{$settings->youtube}}" class="footer__social-link">
                    <svg xmlns="http://www.w3.org/2000/svg
" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                  </a>
                </li>
              @endif
          </ul>
        </div>
      </div>
      <div class="header__main">
        <div class="container flex-ctr-spb">
          <a href="/" class="heder__logo"
            ><img src="{{$settings->logo}}" alt="Logo"
          /></a>
          <nav class="header__nav">
            <ul class="header__nav-list flex-ctr">
              <li><a href="/" class="header__nav-link {{ (request()->segment(1) == '') ? 'active-link' : '' }}">Home</a></li>
              <li><a href="/about_us" class="header__nav-link {{ (request()->segment(1) == 'about_us') ? 'active-link' : '' }}">About Us</a></li>

              <li>
                <a href="/courses/" class="header__nav-link {{ (request()->segment(1) == 'courses' and request()->segment(2) == '') ? 'active-link' : '' }}"
                  >Courses
                  <span class="icon"
                    ><svg
                      width="22"
                      height="22"
                      viewBox="0 0 22 22"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M17.2466 7.71875L10.6841 14.2812L4.12158 7.71875"
                        stroke="#06241B"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg> </span
                ></a>
              </li>
              <li><a href="/courses/course-offers" class="header__nav-link {{ (request()->segment(2) == 'course-offers') ? 'active-link' : '' }}">Course Offers</a></li>
              {{-- <li><a href="{{route('customer.courses')}}" class="header__nav-link {{ (request()->segment(1) == 'online-test') ? 'active-link' : '' }}">My Courses</a></li>
              <li><a href="/online-test/index" class="header__nav-link {{ (request()->segment(1) == 'online-test') ? 'active-link' : '' }}">Online Test</a></li> --}}
              <li><a href="/faq/" class="header__nav-link {{ (request()->segment(1) == 'faq') ? 'active-link' : '' }}">Faq</a></li>
              <li><a href="/contact" class="header__nav-link">Contact</a></li>
            </ul>
          </nav>
          @auth

          <div class="header__btns flex-ctr">
            <a href="/user/dashboard" class="header__btn">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" class="header__btn btn-primary flex-ctr-spb"
                    onclick="event.preventDefault();
                          this.closest('form').submit();">
                    <span>{{ __('Log Out') }}</span>
                    <span class="icon">

                    </span>
                </x-dropdown-link>
            </form>
          </div>

          @else

          <div class="header__btns flex-ctr">
            <a href="/login" class="header__btn">Log In</a
            ><a href="/register" class="header__btn btn-primary">Sign Up</a>
          </div>

          @endauth

          <a href="#" class="header__offcanvas offcanvas-trigger">
            <svg
              width="40px"
              height="40px"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M22 18.0048C22 18.5544 21.5544 19 21.0048 19H12.9952C12.4456 19 12 18.5544 12 18.0048C12 17.4552 12.4456 17.0096 12.9952 17.0096H21.0048C21.5544 17.0096 22 17.4552 22 18.0048Z"
                fill="#ffffff"
              />
              <path
                d="M22 12.0002C22 12.5499 21.5544 12.9954 21.0048 12.9954H2.99519C2.44556 12.9954 2 12.5499 2 12.0002C2 11.4506 2.44556 11.0051 2.99519 11.0051H21.0048C21.5544 11.0051 22 11.4506 22 12.0002Z"
                fill="#ffffff"
              />
              <path
                d="M21.0048 6.99039C21.5544 6.99039 22 6.54482 22 5.99519C22 5.44556 21.5544 5 21.0048 5H8.99519C8.44556 5 8 5.44556 8 5.99519C8 6.54482 8.44556 6.99039 8.99519 6.99039H21.0048Z"
                fill="#ffffff"
              />
            </svg>
          </a>
        </div>
      </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
      <div class="footer__bg">
        <img src="{{ asset('/assets/frontend/imgs/footer-bg.webp')}}" alt="" />
      </div>
      <div class="footer__main">
        <div class="container">
          <div class="footer__widgets flex-auto-spb">
            <div class="footer__widget footer__brand-info">
              <a href="#" class="footer__logo"
                ><img src="{{ asset('storage/app/public/' .$settings->logo) }}" alt=""
              /></a>
              <p class="footer__dsc">
                {{$settings->fotter_summery}}
              </p>
              <ul class="footer__social flex-ctr">
                @if($settings->facebook)
                <li>
                  <a target="_blank" href="{{$settings->facebook}}" class="footer__social-link">
                    <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14.3447 11.6068L14.863 8.19417H11.621V5.98058C11.621 5.04672 12.0731 4.13592 13.5251 4.13592H15V1.23058C15 1.23058 13.6621 1 12.3836 1C9.71233 1 7.96804 2.63483 7.96804 5.5932V8.19417H5V11.6068H7.96804V19.857C8.56393 19.9516 9.17352 20 9.79452 20C10.4155 20 11.0251 19.9516 11.621 19.857V11.6068H14.3447Z"
                        fill="#06241B"
                      />
                    </svg>
                  </a>
                </li>
                @endif
                @if($settings->twitter)
                <li>
                  <a target="_blank" href="{{$settings->twitter}}" class="footer__social-link">
                    <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M17.5475 6.48396C17.5552 6.65996 17.5552 6.82796 17.5552 7.00396C17.563 12.34 13.6426 18.5 6.47319 18.5C4.35865 18.5 2.2827 17.868 0.5 16.684C0.808692 16.724 1.11738 16.74 1.42608 16.74C3.1779 16.74 4.88343 16.132 6.26483 15.004C4.59789 14.972 3.1316 13.844 2.62226 12.196C3.20877 12.316 3.81072 12.292 4.3818 12.124C2.56824 11.756 1.26401 10.1 1.2563 8.17197C1.2563 8.15597 1.2563 8.13997 1.2563 8.12397C1.79651 8.43597 2.40617 8.61197 3.02356 8.62797C1.31803 7.44396 0.78554 5.08396 1.81966 3.23595C3.80301 5.76396 6.72015 7.29196 9.85337 7.45996C9.53696 6.05996 9.96913 4.58796 10.9801 3.59595C12.5467 2.06795 15.0162 2.14795 16.498 3.77195C17.37 3.59595 18.2112 3.25995 18.9752 2.78795C18.682 3.72395 18.0723 4.51596 17.262 5.01996C18.0337 4.92396 18.79 4.70796 19.5 4.38795C18.9752 5.20396 18.3115 5.90796 17.5475 6.48396Z"
                        fill="#06241B"
                      />
                    </svg>
                  </a>
                </li>
                @endif
                @if($settings->instagram)
                <li>
                  <a target="_blank" href="{{$settings->instagram}}" class="footer__social-link">
                    <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_24_507)">
                        <path
                          d="M10 2.3023C12.6717 2.3023 12.9853 2.31421 14.0413 2.36185C15.0179 2.40552 15.5459 2.56828 15.8992 2.70722C16.3676 2.88984 16.7011 3.10421 17.0504 3.45355C17.3998 3.8029 17.6181 4.13636 17.7968 4.6048C17.9317 4.95812 18.0985 5.48611 18.1421 6.46268C18.1898 7.51866 18.2017 7.83227 18.2017 10.504C18.2017 13.1757 18.1898 13.4893 18.1421 14.5453C18.0985 15.5218 17.9357 16.0498 17.7968 16.4031C17.6141 16.8716 17.3998 17.205 17.0504 17.5544C16.7011 17.9037 16.3676 18.1221 15.8992 18.3007C15.5459 18.4357 15.0179 18.6024 14.0413 18.6461C12.9853 18.6937 12.6717 18.7056 10 18.7056C7.32831 18.7056 7.01469 18.6937 5.95872 18.6461C4.98214 18.6024 4.45415 18.4397 4.10084 18.3007C3.6324 18.1181 3.29893 17.9037 2.94959 17.5544C2.60024 17.205 2.3819 16.8716 2.20326 16.4031C2.06828 16.0498 1.90155 15.5218 1.85788 14.5453C1.81024 13.4893 1.79833 13.1757 1.79833 10.504C1.79833 7.83227 1.81024 7.51866 1.85788 6.46268C1.90155 5.48611 2.06431 4.95812 2.20326 4.6048C2.38587 4.13636 2.60024 3.8029 2.94959 3.45355C3.29893 3.10421 3.6324 2.88587 4.10084 2.70722C4.45415 2.57225 4.98214 2.40552 5.95872 2.36185C7.01469 2.31024 7.33228 2.3023 10 2.3023ZM10 0.5C7.28464 0.5 6.94324 0.511909 5.87535 0.559547C4.81144 0.607185 4.08496 0.777888 3.44978 1.02402C2.79079 1.27809 2.23502 1.62346 1.67924 2.17924C1.12346 2.73501 0.782057 3.29476 0.524018 3.94978C0.277888 4.58495 0.107185 5.31143 0.0595475 6.37932C0.0119095 7.44323 0 7.78464 0 10.5C0 13.2154 0.0119095 13.5568 0.0595475 14.6247C0.107185 15.6886 0.277888 16.415 0.524018 17.0542C0.778087 17.7132 1.12346 18.269 1.67924 18.8247C2.23502 19.3805 2.79476 19.7219 3.44978 19.98C4.08496 20.2261 4.81144 20.3968 5.87932 20.4444C6.94721 20.4921 7.28464 20.504 10.004 20.504C12.7233 20.504 13.0607 20.4921 14.1286 20.4444C15.1925 20.3968 15.919 20.2261 16.5582 19.98C17.2172 19.7259 17.7729 19.3805 18.3287 18.8247C18.8845 18.269 19.2259 17.7092 19.4839 17.0542C19.7301 16.419 19.9008 15.6925 19.9484 14.6247C19.996 13.5568 20.008 13.2193 20.008 10.5C20.008 7.78067 19.996 7.44323 19.9484 6.37535C19.9008 5.31143 19.7301 4.58495 19.4839 3.94581C19.2299 3.28682 18.8845 2.73104 18.3287 2.17527C17.7729 1.61949 17.2132 1.27809 16.5582 1.02005C15.923 0.773918 15.1965 0.603216 14.1286 0.555578C13.0568 0.511909 12.7154 0.5 10 0.5Z"
                          fill="#06241B"
                        />
                        <path
                          d="M10 2.3023C12.6717 2.3023 12.9853 2.31421 14.0413 2.36185C15.0179 2.40552 15.5459 2.56828 15.8992 2.70722C16.3676 2.88984 16.7011 3.10421 17.0504 3.45355C17.3998 3.8029 17.6181 4.13636 17.7968 4.6048C17.9317 4.95812 18.0985 5.48611 18.1421 6.46268C18.1898 7.51866 18.2017 7.83227 18.2017 10.504C18.2017 13.1757 18.1898 13.4893 18.1421 14.5453C18.0985 15.5218 17.9357 16.0498 17.7968 16.4031C17.6141 16.8716 17.3998 17.205 17.0504 17.5544C16.7011 17.9037 16.3676 18.1221 15.8992 18.3007C15.5459 18.4357 15.0179 18.6024 14.0413 18.6461C12.9853 18.6937 12.6717 18.7056 10 18.7056C7.32831 18.7056 7.01469 18.6937 5.95872 18.6461C4.98214 18.6024 4.45415 18.4397 4.10084 18.3007C3.6324 18.1181 3.29893 17.9037 2.94959 17.5544C2.60024 17.205 2.3819 16.8716 2.20326 16.4031C2.06828 16.0498 1.90155 15.5218 1.85788 14.5453C1.81024 13.4893 1.79833 13.1757 1.79833 10.504C1.79833 7.83227 1.81024 7.51866 1.85788 6.46268C1.90155 5.48611 2.06431 4.95812 2.20326 4.6048C2.38587 4.13636 2.60024 3.8029 2.94959 3.45355C3.29893 3.10421 3.6324 2.88587 4.10084 2.70722C4.45415 2.57225 4.98214 2.40552 5.95872 2.36185C7.01469 2.31024 7.33228 2.3023 10 2.3023Z"
                          fill="#06241B"
                        />
                        <path
                          d="M10 5.367C7.16554 5.367 4.86304 7.66553 4.86304 10.504C4.86304 13.3424 7.16157 15.6409 10 15.6409C12.8384 15.6409 15.137 13.3424 15.137 10.504C15.137 7.66553 12.8384 5.367 10 5.367ZM10 13.8346C8.158 13.8346 6.66534 12.342 6.66534 10.5C6.66534 8.65799 8.158 7.16534 10 7.16534C11.842 7.16534 13.3347 8.65799 13.3347 10.5C13.3347 12.342 11.842 13.8346 10 13.8346Z"
                          fill="white"
                        />
                        <path
                          d="M15.3395 6.35945C16.0016 6.35945 16.5384 5.82269 16.5384 5.16056C16.5384 4.49843 16.0016 3.96167 15.3395 3.96167C14.6774 3.96167 14.1406 4.49843 14.1406 5.16056C14.1406 5.82269 14.6774 6.35945 15.3395 6.35945Z"
                          fill="#06241B"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_24_507">
                          <rect
                            width="20"
                            height="20"
                            fill="#06241B"
                            transform="translate(0 0.5)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                </li>
                @endif
                @if($settings->linkdin)
                <li>
                  <a target="_blank" href="{{$settings->linkdin}}" class="footer__social-link">
                    <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_24_508)">
                        <path
                          d="M18.5236 0.5H1.47639C1.08483 0.5 0.709301 0.655548 0.432425 0.932425C0.155548 1.2093 0 1.58483 0 1.97639V19.0236C0 19.4152 0.155548 19.7907 0.432425 20.0676C0.709301 20.3445 1.08483 20.5 1.47639 20.5H18.5236C18.9152 20.5 19.2907 20.3445 19.5676 20.0676C19.8445 19.7907 20 19.4152 20 19.0236V1.97639C20 1.58483 19.8445 1.2093 19.5676 0.932425C19.2907 0.655548 18.9152 0.5 18.5236 0.5ZM5.96111 17.5375H2.95417V7.98611H5.96111V17.5375ZM4.45556 6.6625C4.11447 6.66058 3.7816 6.55766 3.49895 6.36674C3.21629 6.17582 2.99653 5.90544 2.8674 5.58974C2.73826 5.27404 2.70554 4.92716 2.77336 4.59288C2.84118 4.2586 3.0065 3.9519 3.24846 3.71148C3.49042 3.47107 3.79818 3.30772 4.13289 3.24205C4.4676 3.17638 4.81426 3.21133 5.12913 3.34249C5.44399 3.47365 5.71295 3.69514 5.90205 3.97901C6.09116 4.26288 6.19194 4.59641 6.19167 4.9375C6.19488 5.16586 6.15209 5.39253 6.06584 5.604C5.97959 5.81547 5.85165 6.00742 5.68964 6.16839C5.52763 6.32936 5.33487 6.45607 5.12285 6.54096C4.91083 6.62585 4.68389 6.66718 4.45556 6.6625ZM17.0444 17.5458H14.0389V12.3278C14.0389 10.7889 13.3847 10.3139 12.5403 10.3139C11.6486 10.3139 10.7736 10.9861 10.7736 12.3667V17.5458H7.76667V7.99306H10.6583V9.31667H10.6972C10.9875 8.72917 12.0042 7.725 13.5556 7.725C15.2333 7.725 17.0458 8.72083 17.0458 11.6375L17.0444 17.5458Z"
                          fill="#06241B"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_24_508">
                          <rect
                            width="20"
                            height="20"
                            fill="#06241B"
                            transform="translate(0 0.5)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                </li>
                @endif
                @if($settings->snapchat)
                <li>
                  <a target="_blank" href="{{$settings->snapchat}}" class="footer__social-link">
                    <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M18.7422 15.0023C15.5861 13.4989 15.0831 11.1777 15.0607 11.0055C15.0336 10.797 15.0029 10.633 15.2367 10.4209C15.4622 10.2159 16.4625 9.60668 16.74 9.41607C17.1988 9.10043 17.4008 8.7853 17.2519 8.39793C17.1477 8.12994 16.8942 8.029 16.627 8.029C16.5428 8.02925 16.4588 8.03853 16.3766 8.05667C15.8725 8.16427 15.383 8.41279 15.0998 8.47991C15.0657 8.48855 15.0308 8.49319 14.9956 8.49375C14.8446 8.49375 14.7873 8.42765 14.8019 8.24882C14.8373 7.7067 14.9123 6.6486 14.8254 5.66018C14.7061 4.30027 14.2604 3.62646 13.7319 3.03054C13.4762 2.74155 12.289 1.5 9.99782 1.5C7.70667 1.5 6.52101 2.74155 6.2669 3.02695C5.73681 3.62287 5.2916 4.29668 5.1734 5.65659C5.08644 6.64501 5.16455 7.7026 5.19683 8.24523C5.20725 8.41535 5.15413 8.49016 5.00313 8.49016C4.96798 8.48957 4.93303 8.48493 4.89898 8.47633C4.61624 8.4092 4.12677 8.16069 3.62271 8.05308C3.54049 8.03495 3.45651 8.02567 3.37225 8.02541C3.10408 8.02541 2.85154 8.12789 2.7474 8.39434C2.59847 8.78172 2.79947 9.09684 3.25978 9.41248C3.53732 9.60309 4.53761 10.2118 4.76308 10.4173C4.99636 10.6294 4.96616 10.7934 4.93908 11.0019C4.91669 11.1767 4.41316 13.4978 1.25763 14.9987C1.07278 15.0868 0.758268 15.2733 1.31283 15.5746C2.18346 16.0481 2.76302 15.9973 3.21343 16.2827C3.59564 16.5251 3.36965 17.0478 3.64771 17.2363C3.9893 17.4684 4.99896 17.2199 6.30335 17.6437C7.39685 17.9983 8.06128 19 10.0004 19C11.9396 19 12.6233 17.9936 13.6975 17.6437C14.9993 17.2199 16.011 17.4684 16.3531 17.2363C16.6307 17.0478 16.4052 16.5251 16.7874 16.2827C17.2378 15.9973 17.8169 16.0481 18.688 15.5746C19.2415 15.2769 18.927 15.0904 18.7422 15.0023Z"
                        fill="#06241B"
                      />
                    </svg>
                  </a>
                </li>
                @endif
                @if($settings->youtube)
                <li>
                  <a target="_blank" href="{{$settings->youtube}}" class="footer__social-link">
                    <svg xmlns="http://www.w3.org/2000/svg
" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                  </a>
                </li>
                @endif
              </ul>
            </div>
            <div class="footer__widget">
              <h3 class="footer__widget-title">Company</h3>
              <ul class="footer__links">
                <li><a href="about_us" class="footer__link">About Us</a></li>
                <li><a href="/courses/" class="footer__link">Courses</a></li>
                <li><a href="/register" class="footer__link">SignUp</a></li>
                <li><a href="/login" class="footer__link">SignIn</a></li>
              </ul>
            </div>
            <div class="footer__widget">
              <h3 class="footer__widget-title">Support</h3>
              <ul class="footer__links">
                <li><a href="/faq/" class="footer__link">FAQ’s</a></li>
                <li><a href="/term-condition" class="footer__link">Terms & Conditions</a></li>
                <li><a href="/privecy-policy" class="footer__link">Privacy Policy</a></li>
                <li><a href="/contact" class="footer__link">Contact Us</a></li>
              </ul>
            </div>
            <div class="footer__widget">
              <h3 class="footer__widget-title">Address</h3>
              <ul class="footer__links">
                <li><b>Location:</b> {{$settings->address}}</li>
                <li>
                  <b> Email:</b>  <a href="mailto:{{$settings->email}}" class="footer__link"
                    >{{$settings->email}}</a
                  >
                </li>
                <li>
                  <a href="tel:{{$settings->phone}}" class="footer__link"
                    ><b>Phone:</b> {{$settings->phone}}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__copywrite">
        <div class="container">
          <p class="footer__copywrite-text">
            {{$settings->copyright}}
          </p>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('/assets/frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/frontend/js/slick.min.js')}}"></script>
    <script src="{{ asset('/assets/frontend/js/main.js')}}"></script>
    @yield('script')
  </body>
</html>
