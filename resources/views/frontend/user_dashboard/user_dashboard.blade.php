@extends('layouts.frontend_base')

@section('content')
@inject('UserPanelStaticValue', 'App\Http\Controllers\Frontend\UserPanel')
<main class="main user-dashboard-main">
  <!-- Dashboard -->
  <section class="dashboard">
    <div class="container">
      <!-- Dashboard Header -->
      <div class="dashboard__header">
        <div class="dashboard__profile flex-ctr">
          <figure class="dashboard__profile-pic">
            @if($user_info->profile_photo_path)
            <img src="{{$user_info->profile_photo_path}}" alt="" />

            @else
            <img src="{{ asset('/assets/frontend/imgs/avt.jpg')}}" alt="" />
            @endif
          </figure>
          <div class="dashboard__profile-context">
            <h3 class="dashboard__profile-name">{{$user_info->name}}</h3>
            <p class="dashboard__profile-info text">{{$user_info->email}}</p>
          </div>

        </div>
        <div>@if (session()->has('success'))<div class="alert alert-success">{{ session('success') }}</div> @endif </div>
        <div class="dashboard__tab-header-wrap">
        <div class="dashboard__tab-header flex-ctr-spb">
          <button class="dashboard__tab-btn tab-trigger" data-target="#dashboard">
            Dashboard
          </button>
          <button class="dashboard__tab-btn tab-trigger active-tab" data-target="#acc-settings">
            Account Settings
          </button>
          <button class="dashboard__tab-btn tab-trigger" data-target="#security">
            Security
          </button>
          <button class="dashboard__tab-btn tab-trigger" data-target="#courses">
            Courses
          </button>
          <button class="dashboard__tab-btn tab-trigger" data-target="#wishlist">
            Wishlist
          </button>
          <button class="dashboard__tab-btn tab-trigger" data-target="#history">
            Purchase History
          </button>
        </div>
        </div>
      </div>
      <!-- Dashboard Body -->
      <div class="dashboard__body">
        <!-- Dashboard -->
        <div class="dashboard__body__tab-content tab-content" id="dashboard">
          <h3 class="tab-content__title">Dashboard</h3>
          <div class="tab-content__blocks flex-auto-spb">
            <div class="tab-content__block flex-ctr">
              <div class="tab-content__block-icon">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="60" height="60" rx="4" fill="white" />
                  <path opacity="0.2" d="M30 18C27.6266 18 25.3066 18.7038 23.3332 20.0224C21.3598 21.3409 19.8217 23.2151 18.9135 25.4078C18.0052 27.6005 17.7676 30.0133 18.2306 32.3411C18.6936 34.6689 19.8365 36.8071 21.5147 38.4853C23.193 40.1635 25.3312 41.3064 27.6589 41.7694C29.9867 42.2324 32.3995 41.9948 34.5922 41.0866C36.7849 40.1783 38.6591 38.6402 39.9776 36.6668C41.2962 34.6935 42 32.3734 42 30C42 28.4241 41.6896 26.8637 41.0866 25.4078C40.4835 23.9519 39.5996 22.629 38.4853 21.5147C37.371 20.4004 36.0481 19.5165 34.5922 18.9134C33.1363 18.3104 31.5759 18 30 18ZM28 34V26L34 30L28 34Z" fill="#FF6636" />
                  <path d="M30 42C36.6274 42 42 36.6274 42 30C42 23.3726 36.6274 18 30 18C23.3726 18 18 23.3726 18 30C18 36.6274 23.3726 42 30 42Z" stroke="#FF6636" stroke-width="2" stroke-miterlimit="10" />
                  <path d="M34 30L28 26V34L34 30Z" stroke="#FF6636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="tab-content__block-context">
                <h3 class="tab-content__block-count">{{$total_subcribed}}</h3>
                <p class="tab-content__block-label text">
                  Enrolled Courses
                </p>
              </div>
            </div>
            <div class="tab-content__block flex-ctr">
              <div class="tab-content__block-icon">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="60" height="60" rx="4" fill="white" />
                  <path opacity="0.2" d="M19.5 19.5V38.5L21.5 40.5H40.5V19.5H19.5Z" fill="#564FFD" />
                  <path d="M19.5 31.9091V20.5C19.5 20.2348 19.6054 19.9804 19.7929 19.7929C19.9804 19.6054 20.2348 19.5 20.5 19.5H39.5C39.7652 19.5 40.0196 19.6054 40.2071 19.7929C40.3946 19.9804 40.5 20.2348 40.5 20.5V39.5C40.5 39.7652 40.3946 40.0196 40.2071 40.2071C40.0196 40.3946 39.7652 40.5 39.5 40.5H30.9545" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M30 33L22 41L18 37" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="tab-content__block-context">
                <h3 class="tab-content__block-count">0</h3>
                <p class="tab-content__block-label text">
                  Completed Courses
                </p>
              </div>
            </div>
            <div class="tab-content__block flex-ctr">
              <div class="tab-content__block-icon">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="60" height="60" rx="4" fill="white" />
                  <path opacity="0.2" d="M21 21V27.887C21 32.8496 24.9693 36.963 29.9318 36.9997C31.1194 37.0088 32.297 36.7826 33.3968 36.3344C34.4966 35.8861 35.4968 35.2246 36.3398 34.388C37.1828 33.5514 37.8518 32.5563 38.3084 31.4599C38.7649 30.3635 39 29.1876 39 28V21C39 20.7348 38.8946 20.4804 38.7071 20.2929C38.5196 20.1054 38.2652 20 38 20H22C21.7348 20 21.4804 20.1054 21.2929 20.2929C21.1054 20.4804 21 20.7348 21 21Z" fill="#1A906B" />
                  <path d="M21 21V27.887C21 32.8496 24.9693 36.963 29.9318 36.9997C31.1194 37.0088 32.297 36.7826 33.3968 36.3344C34.4966 35.8861 35.4968 35.2246 36.3398 34.388C37.1828 33.5514 37.8518 32.5563 38.3084 31.4599C38.7649 30.3635 39 29.1876 39 28V21C39 20.7348 38.8946 20.4804 38.7071 20.2929C38.5196 20.1054 38.2652 20 38 20H22C21.7348 20 21.4804 20.1054 21.2929 20.2929C21.1054 20.4804 21 20.7348 21 21Z" stroke="#1A906B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M26 42H34" stroke="#1A906B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M30 37V42" stroke="#1A906B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M38.7773 30H40.0004C41.0613 30 42.0787 29.5786 42.8288 28.8284C43.579 28.0783 44.0004 27.0609 44.0004 26V24C44.0004 23.7348 43.895 23.4804 43.7075 23.2929C43.52 23.1054 43.2656 23 43.0004 23H39.0004" stroke="#1A906B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M21.2458 30H19.9844C18.9235 30 17.9061 29.5786 17.1559 28.8284C16.4058 28.0783 15.9844 27.0609 15.9844 26V24C15.9844 23.7348 16.0897 23.4804 16.2773 23.2929C16.4648 23.1054 16.7192 23 16.9844 23H20.9844" stroke="#1A906B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="tab-content__block-context">
                <h3 class="tab-content__block-count">{{$get_result}}</h3>
                <p class="tab-content__block-label text">Test Score</p>
              </div>
            </div>
            <div class="tab-content__block flex-ctr">
              <div class="tab-content__block-icon">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="60" height="60" rx="4" fill="white" />
                  <path opacity="0.2" d="M25 34C28.5899 34 31.5 31.0899 31.5 27.5C31.5 23.9101 28.5899 21 25 21C21.4101 21 18.5 23.9101 18.5 27.5C18.5 31.0899 21.4101 34 25 34Z" fill="#FFD05A" />
                  <path d="M25 34C28.5899 34 31.5 31.0899 31.5 27.5C31.5 23.9101 28.5899 21 25 21C21.4101 21 18.5 23.9101 18.5 27.5C18.5 31.0899 21.4101 34 25 34Z" stroke="#FFD05A" stroke-width="2" stroke-miterlimit="10" />
                  <path d="M33.4258 21.2421C34.3198 20.9902 35.2574 20.9328 36.1755 21.0738C37.0936 21.2148 37.9708 21.5509 38.748 22.0595C39.5252 22.568 40.1845 23.2372 40.6813 24.022C41.1781 24.8068 41.501 25.6889 41.6282 26.609C41.7554 27.5291 41.684 28.4658 41.4187 29.3559C41.1534 30.2461 40.7005 31.069 40.0903 31.7694C39.4802 32.4697 38.7271 33.0312 37.8817 33.416C37.0363 33.8007 36.1183 33.9999 35.1895 34" stroke="#FFD05A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16 38.6746C17.0152 37.2306 18.3629 36.052 19.9293 35.2384C21.4958 34.4248 23.235 34.0001 25.0001 34C26.7652 33.9999 28.5045 34.4246 30.071 35.238C31.6375 36.0515 32.9853 37.23 34.0006 38.6739" stroke="#FFD05A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M35.1914 34C36.9567 33.9987 38.6963 34.4228 40.263 35.2364C41.8296 36.05 43.1771 37.2291 44.1914 38.6739" stroke="#FFD05A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="tab-content__block-context">
                <h3 class="tab-content__block-count">{{$total_participants}}</h3>
                <p class="tab-content__block-label text">
                  Test Participate
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Account Settings -->
        <div class="dashboard__body__tab-content tab-content" id="acc-settings">
          <h3 class="tab-content__title">Account Settings</h3>
          <form enctype="multipart/form-data" action="{{route('user.account_update')}}" method="post" class="tab-content__acc-blocks dashboard__form flex-auto-spb form">
            @csrf
            <div class="tab-content__acc-block user-profile">
              <div class="tab-content__uploader">
                <figure class="tab-content__upload-preview">
                  @if($user_info->profile_photo_path)
                  <img src="{{$user_info->profile_photo_path}}" alt="" />
                  @else
                  <img src="{{ asset('/assets/frontend/imgs/avt.jpg')}}" alt="" />
                  @endif
                </figure>
                <label for="profile-photo" class="flex-ctr-ctr">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.0625 7.68647L12 3.75L15.9375 7.68647" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 14.25V3.75276" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.25 14.25V19.5C20.25 19.6989 20.171 19.8897 20.0303 20.0303C19.8897 20.171 19.6989 20.25 19.5 20.25H4.5C4.30109 20.25 4.11032 20.171 3.96967 20.0303C3.82902 19.8897 3.75 19.6989 3.75 19.5V14.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  Upload Photo</label>
                <input type="file" class="file" id="profile-photo" name="image" />
              </div>
              <p class="tab-content__upload-info">
                Image size should be under 1MB and image ration needs to be
                1:1
              </p>
            </div>
            <div class="tab-content__acc-block dashboard__form-fields-block">
              <div class="dashboard__form-fields">
                <div class="form__row flex-auto-spb">
                  <div class="form__field">
                    <label for="first-name" class="form__label">First Name</label><input type="text" class="form__input" id="first-name" name="fname" value="@php $first_name = explode(" ",$user_info->name); echo $first_name[0]; @endphp" placeholder="First Name" />
                  </div>
                  <div class="form__field">
                    <label for="last-name" class="form__label">Last Name</label><input type="text" class="form__input" id="last-name" name="lname" placeholder="Last Name" value="@php $first_name = explode(" ",$user_info->name); echo $first_name[1]; @endphp" />
                  </div>
                </div>
                {{-- <div class="form__field">
                    <label for="username" class="form__label">Username</label>
                    <input
                      type="text"
                      class="form__input"
                      id="Username"
                      placeholder="kevingilbert062"
                    />
                  </div> --}}
                <div class="form__field">
                  <label for="email" class="form__label">Email</label><input type="email" class="form__input" id="email" value="{{$user_info->email}}" readonly />
                </div>
                {{-- <div class="form__field">
                    <label for="title" class="form__label">Designation</label
                    ><input
                      type="text"
                      class="form__input"
                      id="title"
                      placeholder="Web Designer"
                      name="designation"
                    />
                  </div> --}}
              </div>
              <button class="form__submit btn-primary">Save changes</button>
            </div>
          </form>
        </div>

        <!-- Security -->
        <div class="dashboard__body__tab-content tab-content" id="security">
          <h3 class="tab-content__title">Security</h3>

          <form action="{{route('user.account_security')}}" method="post" class="tab-content__security-block">
            @csrf
            <div class="dashboard__form-fields">
              <div class="form__field">
                <label for="current-pass" class="form__label">Current Password</label>
                <input type="password" class="form__input" id="current-pass" placeholder="****************************" name="current_password" />
              </div>
              <div class="form__field">
                <label for="new-pass" class="form__label">New Password</label>
                <input type="password" class="form__input" id="new-pass" placeholder="****************************" name="new_password" />
              </div>
              <div class="form__field">
                <label for="confirm-pass" class="form__label">Confirm Password</label>
                <input type="password" class="form__input" id="confirm-pass" placeholder="****************************" name="confirm_password" />
              </div>
            </div>
            <button class="form__submit btn-primary">
              Change Password
            </button>
          </form>
        </div>

        <!-- Courses -->
        <div class="dashboard__body__tab-content tab-content" id="courses">
          <h3 class="tab-content__title">Courses</h3>

          <div action="#" class="tab-content__courses-block">
            @if($subscribed_courses->count() <= 0 )
              <h2 style="text-align:center;">No data!</h2>
            @endif
            @foreach($subscribed_courses as $course)

            <div class="rate-now-modal" id="rate-now-{{$course->course_id}}" style="display: none;">
              <form action="{{route('customer.courses.rating')}}" method="get" id="full-stars-example-two">
                <span class="modal-close">&times;</span>
                <div>
                  @csrf
                  <input type="hidden" name="course_id" value="{{$course->course_id}}">



                  <div class="star_rating">
                    <input type="radio" id="5-stars-{{$course->course_id}}" name="rating" value="5" />
                    <label for="5-stars-{{$course->course_id}}" class="star">&#9733;</label>
                    <input type="radio" id="4-stars-{{$course->course_id}}" name="rating" value="4" />
                    <label for="4-stars-{{$course->course_id}}" class="star">&#9733;</label>
                    <input type="radio" id="3-stars-{{$course->course_id}}" name="rating" value="3" />
                    <label for="3-stars-{{$course->course_id}}" class="star">&#9733;</label>
                    <input type="radio" id="2-stars-{{$course->course_id}}" name="rating" value="2" />
                    <label for="2-stars-{{$course->course_id}}" class="star">&#9733;</label>
                    <input type="radio" id="1-star-{{$course->course_id}}" name="rating" value="1" />
                    <label for="1-star-{{$course->course_id}}" class="star">&#9733;</label>
                </div>

                  <br />
                  <div>
                    <br />
                    <label for="">Comments</label>
                    <br />
                    <textarea class="form__textarea" name="comments" id="" cols="30" rows="10"></textarea>
                  </div>

                  <div class="btn-wrap">
                    <button type="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-content__course card style-01 flex-ctr-spb">
              <a href="#" class="card__figure"><span class="card__base btn-primary">@if($course->payment_type == 'Free') Free/Scholarship @else {{$course->payment_type}} @endif</span><img src="{{$course->cover}}" alt="" /></a>
              <div class="card__context">
                <div class="card__row flex-ctr">
                  <div class="card__column flex-ctr">

                    <span class="card__column-icon">
                      <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 5.28676C9.05766 3.99295 7.1876 3.27858 5.25 3.28126C4.3295 3.28126 3.44575 3.43876 2.625 3.72926V16.198C3.46817 15.9005 4.35589 15.749 5.25 15.75C7.26688 15.75 9.107 16.5086 10.5 17.7555M10.5 5.28676C11.9423 3.99287 13.8124 3.2785 15.75 3.28126C16.6705 3.28126 17.5542 3.43876 18.375 3.72926V16.198C17.5318 15.9005 16.6441 15.749 15.75 15.75C13.8124 15.7473 11.9423 16.4617 10.5 17.7555M10.5 5.28676V17.7555" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg> </span>{{$course->lesson}} Lessons
                  </div>
                  <div class="card__column flex-ctr">
                    <span class="card__column-icon">
                      <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg> </span>{{$course->course_duration}}
                  </div>
                </div>
                <a href="#" class="card__title">{{$course->title}}</a>
                <p class="card__dsc">
                  {!! $course->summery !!}
                </p>

                @php
                if( $course->avg_rating > 0){
                  $css_style = 'width:' . $course->avg_rating*20 . '%';
                } else {
                  $css_style = '';
                }
                $rating_check = App\Http\Controllers\Frontend\Courses::rating_check($course->id);
                $rating_comment = App\Http\Controllers\Frontend\Courses::rating_comments($course->id);
                @endphp

                <div class="card__column flex-ctr" style="padding-top: 15px;">
                  <div class="course__rating-wrap">

                    <ul class="course__rating main-rating" style="<?php echo $css_style; ?>">
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A"></path>
                        </svg>
                      </li>
                    </ul>
                    <ul class="course__rating default-rating">
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#E7E9EB"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#E7E9EB"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#E7E9EB"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#E7E9EB"></path>
                        </svg>
                      </li>
                      <li>
                        <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#E7E9EB"></path>
                        </svg>
                      </li>
                    </ul>
                  </div>
                  {{$course->avg_rating}}
                  <br />

                </div>
                <div>@if($rating_check)<p>{{$rating_comment}}</p>@endif</div>
              </div>

              <div class="card__row flex-ctr card__btns">

                @php
                  $course_id = $UserPanelStaticValue->get_test_result($course->id);
                @endphp

                @if($course_id)
                  {{-- <a href="/customer/onlineTest?test_id={{$course_id->test_id}}" class="card__btn btn-primary disable">Taken Test </a> --}}
                  <a href="{{route('customer.courses.test',['course_id'=>$course->id])}}" class="card__btn btn-primary">Take Test</a>
                @else
                <a href="{{route('customer.courses.test',['course_id'=>$course->id])}}" class="card__btn btn-primary">Take Test</a>
                @endif
                @if($rating_check == 0)
                <a href="#rate-now-{{$course->course_id}}" class="card__btn btn-primary bg-dark btn-rate-now">Rate Now</a>
                @else
                <a href="#" class="card__btn btn-primary bg-dark btn-rate-now">Already Rated</a>
                @endif
                @if($course_id)
                <a href="{{route('customer.courses.test',['course_id'=>$course->id])}}" class="card__btn btn-primary">Test Results</a>

                @else
                <a href="#" class="card__btn btn-primary disable">Test Results</a>
                @endif
                <a href="{{route('course.details.page',['id'=>$course->id])}}" class="card__btn btn-primary bg-dark">View More</a>

              </div>
            </div>
            @endforeach

          </div>
        </div>

        <!-- Wishlist -->
        <div class="dashboard__body__tab-content tab-content" id="wishlist">
          <h3 class="tab-content__title">Wishlist</h3>

          <div action="#" class="tab-content__wishlist-block">

            @if($wishlists->count() <= 0 )
              <h2 style="text-align:center;">No data!</h2>
            @endif

            @foreach($wishlists as $wishlist)
            <div class="tab-content__course card style-01 flex-ctr-spb">
              <a href="{{ route('course.details.page', $wishlist->course_id) }}" class="card__figure"><span class="card__base btn-primary">@if($wishlist->payment_type == 'Free') Free/Scholarship @else {{$wishlist->payment_type}} @endif</span><img src="{{$wishlist->cover}}" alt="" /></a>
              <div class="card__context">
                <div class="card__row flex-ctr">
                  <div class="card__column flex-ctr">
                    <span class="card__column-icon">
                      <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 5.28676C9.05766 3.99295 7.1876 3.27858 5.25 3.28126C4.3295 3.28126 3.44575 3.43876 2.625 3.72926V16.198C3.46817 15.9005 4.35589 15.749 5.25 15.75C7.26688 15.75 9.107 16.5086 10.5 17.7555M10.5 5.28676C11.9423 3.99287 13.8124 3.2785 15.75 3.28126C16.6705 3.28126 17.5542 3.43876 18.375 3.72926V16.198C17.5318 15.9005 16.6441 15.749 15.75 15.75C13.8124 15.7473 11.9423 16.4617 10.5 17.7555M10.5 5.28676V17.7555" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg> </span>{{$wishlist->lesson}} Lessons
                  </div>
                  <div class="card__column flex-ctr">
                    <span class="card__column-icon">
                      <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg> </span>{{$wishlist->course_duration}}
                  </div>
                  <div class="card__column flex-ctr">
                    <span class="card__column-icon">
                      <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z" fill="#FFD05A" />
                      </svg> </span>{{$wishlist->avg_rating}}
                  </div>
                </div>
                <a href="{{ route('course.details.page', $wishlist->course_id) }}" class="card__title">{{$wishlist->title}}</a>
                <p class="card__dsc">
                  {!! $wishlist->summery !!}
                </p>
              </div>
              <div class="card__row flex-ctr card__btns">
                <a href="{{ route('course.details.page', $wishlist->course_id) }}" class="card__btn btn-primary">Book Now</a>
                <a href="{{ route('course.wishlist_remove', $wishlist->wish_id) }}" class="card__btn btn-primary">Remove</a>

              </div>
            </div>
            @endforeach

          </div>
        </div>

        <!-- Purchase History -->
        <div class="dashboard__body__tab-content tab-content" id="history">
          <h3 class="tab-content__title">Purchase History</h3>
          <div action="#" class="tab-content__histry-block">
            @if($purchase_histories->count() <= 0 )
              <h2 style="text-align:center;">No data!</h2>
            @endif
            @foreach($purchase_histories as $purchase_history)
            <div class="tab-content__histry-item flex-ctr-spb">
              <div class="tab-content__histry-item__left">
                <p class="tab-content__histry-date">
                  {{$purchase_history->created_at}}
                </p>
                <div class="tab-content__histry-info flex-ctr">
                  <p>
                    <span>
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z" stroke="#1A906B" stroke-width="1.3" stroke-miterlimit="10" />
                        <path d="M12.5 10L8.75 7.5V12.5L12.5 10Z" stroke="#1A906B" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                      </svg> </span>1 Courses
                  </p>
                  <p>
                    @if($purchase_history->payment_type == 'Free')
                    Free/Scholarship
                    @else
                    @if($purchase_history->discount_price)
                    AUD <del>{{$purchase_history->price}}</del> {{$purchase_history->discount_price}}
                    @else
                    AUD{{$purchase_history->price}}
                    @endif
                    @endif
                    <span></span>
                  </p>
                  @if($purchase_history->payment_type == 'Free')

                  @else
                  <span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.5 4.375H2.5C2.15482 4.375 1.875 4.65482 1.875 5V15C1.875 15.3452 2.15482 15.625 2.5 15.625H17.5C17.8452 15.625 18.125 15.3452 18.125 15V5C18.125 4.65482 17.8452 4.375 17.5 4.375Z" stroke="#1A906B" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M13.125 13.125H15.625" stroke="#1A906B" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M9.375 13.125H10.625" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M1.875 7.56658H18.125" stroke="#1A906B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> </span>{{$purchase_history->payment_getway}}

                  @endif
                  <p>
                  </p>
                </div>
              </div>
              <div class="tab-content__histry-item__right">
                <button class="btn-primary download-btn">
                  <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.25V20.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M5.25 14L12 20.75L18.75 14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
