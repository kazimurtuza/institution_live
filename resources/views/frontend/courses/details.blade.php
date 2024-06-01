@extends('layouts.frontend_base')

@section('content')
@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<!-- Hero Section -->
<section class="hero course-details-hero">
    <div class="hero__bg">
      <img src="{{ asset('/assets/frontend/imgs/hero-bg.webp')}}" alt="" />
    </div>
    <div class="container flex-ctr-ctr">
      <div class="hero__content">
        <h1 class="hero__title section-title">{{$data->title}}</h1>
        <ul class="hero__breadcrumb flex-ctr-ctr">
          <li><a href="#">Home</a> ></li>
          <li>{{$data->title}}</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Course Information -->
  <section class="course-info">
    <div class="container flex-auto-spb">
      <main class="main course-info__main">
        <h2 class="course-info__main__title">
          {{$data->title}}
        </h2>
        <p class="course-info__main__dsc text">
            {!! $data->summery !!}
        </p>
        <div class="course-info__main__row flex-ctr-spb">
          <div class="course-info__main__col course__author flex-ctr">
            <figure class="course__author-img">
              <img src="{{ asset('storage/app/public/' .$AdminDashboard->instructor_pic($data->instructor)) }}" alt="" />
            </figure>
            <div class="course__author-info">
              <p class="course__author-label">Created by: 3i International Islamic Institute</p>
              <p class="course__author-name">{{$AdminDashboard->instructor_name($data->instructor)}}</p>
            </div>
          </div>
          <div class="course-info__main__col ratting-side flex-ctr">
            <div class="course__rating-wrap">
              <ul class="course__rating main-rating" style="width: {{ $data->avg_rating*100/5 }}%">
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg>
                </li>
              </ul>
              <ul class="course__rating default-rating">
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#E7E9EB"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#E7E9EB"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#E7E9EB"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#E7E9EB"
                    />
                  </svg>
                </li>
                <li>
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#E7E9EB"
                    />
                  </svg>
                </li>
              </ul>
            </div>
            <p class="course__rating-text text">
              <b>{{$data->avg_rating}} </b>
            </p>
          </div>
        </div>
        <figure class="course__thumb">
          <img src="{{ asset('storage/app/public/' .$data->cover) }}" alt="" />
        </figure>

        <div class="course-info__main__tab tab">
          <div class="tab__header-wrap">
          <div class="tab__header flex-ctr-spb">
            <button
              class="tab__btn tab-trigger text active-tab"
              data-target="#overview"
            >
              Overview
            </button>
            <button
              class="tab__btn tab-trigger text"
              data-target="#curriculum"
            >
              Curriculum
            </button>
            <button
              class="tab__btn tab-trigger text"
              data-target="#instructor"
            >
              Instructor
            </button>
            <button class="tab__btn tab-trigger text" data-target="#review">
              Review
            </button>
            @auth
          @php

              $subcription_data =  App\Http\Controllers\Frontend\StripeController::subcribtion_check($data->id)
          @endphp

          @if($subcription_data == 0)

          @else
          <button class="tab__btn tab-trigger text" data-target="#course_resources">
            Course Resources
          </button>
          @endif
          @endauth
          </div>
          </div>
          <div class="tab__body">
            <!-- Overview -->
            <div class="tab__body-content tab-content" id="overview">
                {!! $data->overview !!}
            </div>
            <!-- Curriculum -->
            <div class="tab__body-content tab-content" id="curriculum">
                {!! $data->curiculm !!}
            </div>
            <!-- Instructor -->
            <div class="tab__body-content tab-content tab-content-instructor" id="instructor">

              <div class="course-info__main__col course__author flex-ctr item-start">
                <figure class="course__author-img">
                  <img src="{{ asset('storage/app/public/' .$AdminDashboard->instructor_pic($data->instructor)) }}" alt="" />
                </figure>
                <div class="course__author-info">
                  <p class="course__author-label" style="margin-bottom: 5px;">Name: <span>{{$AdminDashboard->instructor_name($data->instructor)}}</span></p>
                  <p class="course__author-label" style="margin-bottom: 5px;">Specialization: <span>{{$AdminDashboard->instructor_specialization($data->instructor)}}</span></p>
                  <p class="course__author-label" style="margin-bottom: 5px;">Location: <span>{{$AdminDashboard->instructor_location($data->instructor)}}</span></p>
                  <p class="course__author-desc">{!! $AdminDashboard->instructor_about_info($data->instructor) !!}</p>
                </div>
              </div>

                <div>

                </div>
            </div>
            <!-- Review -->
            <div class="tab__body-content tab-content" id="review">
              <p>Reviews (<b>{{$data->avg_rating}} </b>)</p>
              <div class="course__rating-wrap">

                <ul class="course__rating main-rating" style="width: {{ $data->avg_rating*100/5 }}%">
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#FFD05A"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#FFD05A"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#FFD05A"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#FFD05A"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#FFD05A"
                      />
                    </svg>
                  </li>
                </ul>
                <ul class="course__rating default-rating">
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#E7E9EB"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#E7E9EB"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#E7E9EB"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#E7E9EB"
                      />
                    </svg>
                  </li>
                  <li>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 21 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                        fill="#E7E9EB"
                      />
                    </svg>
                  </li>
                </ul>
              </div>
              <div>

                <table>
                  @foreach($course_rating_comments as $course_rating_comment)
                    @if($course_rating_comment->comments)
                    <tr>
                      <td> <img src="{{ asset('storage/app/public/' .$AdminDashboard->user_pic($course_rating_comment->user_id)) }}" alt=""></td>
                      <td>{{$course_rating_comment->comments}}</td>
                    </tr>
                    @endif
                  @endforeach
                </table>

              </div>
            </div>
            @auth
            @php

                $subcription_data =  App\Http\Controllers\Frontend\StripeController::subcribtion_check($data->id)
            @endphp

            @if($subcription_data == 0)

            @else
            <div class="tab__body-content tab-content" id="course_resources">
              <h3 class="course-benefits__title">
                Course Resources
              </h3>

              @if($data->resources == 1)

              @foreach($get_course_resources as $get_course_resource)
                   <div class="mySlides">

                            @php

                            //  $fileName = pathinfo($video)['filename'];
                            $extension = pathinfo($get_course_resource->resources, PATHINFO_EXTENSION);




                            @endphp


                            {{-- <video width='1024' height='768' controls autoplay>
                              <source src="{{ asset('/assets/test.mkv')}}" type='video/x-matroska'>
                          </video> --}}

                          @if($extension == 'mp4')
                          {{-- <video width="320" height="240" controls>
                            <source src="{{ asset('/assets/test1.mkv')}}" type="video/mp4">
                          Your browser does not support the video tag.
                          </video> <br/><br/><br/> --}}

                          <video width="320" height="240" controls>
                            <source src="{{ asset('storage/app/public/' .$get_course_resource->resources) }}" type="video/mp4">
                          Your browser does not support the video tag.
                          </video> <br/><br/><br/>

                          @else
                            <a href="{{ asset('storage/app/public/' .$get_course_resource->resources) }}">Download File</a>
                          @endif
                          {{-- <img src="{{ asset('storage/app/public/' .$image) }}" style="width:100%"> --}}
                          </div>


                @endforeach

              @endif


            </div>
            @endif

          @endauth
          </div>

          <div class="course-benefits">
            <div class="course-benefits__inner">
              <h3 class="course-benefits__title">
                What you will learn in this course
              </h3>
              {!! $data->course_points !!}
              {{-- <ul class="course-benefits__list">
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
                <li class="course-benefit">
                  Figma ipsum component variant main layer. Create vector
                  plugin plugin figma boolean community mask.
                </li>
              </ul> --}}
            </div>
          </div>


        </div>
      </main>
      <aside class="aside course-info__aside">
        <div class="aside__block">
          <div class="aside__block__row flex-ctr-spb">
            @if($data->payment_type == 'Free')
              <p class="course-price flex-ctr"> Free/Scholarship </p>
            @else
              @if($data->discount_price)
              <p class="course-price flex-ctr">AUD <del>{{$data->price}}</del> {{$data->discount_price}} </p>
              @else
              <p class="course-price flex-ctr"> AUD{{$data->price}} </p>
              @endif

            @endif
            {{-- <p class="course-price flex-ctr">AUD150 <del>AUD26</del></p>
            <p class="course-discount">56% off</p>
            <p class="aside__block__discount-time">
            <span class="icon">
              <svg
                width="19"
                height="19"
                viewBox="0 0 19 19"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z"
                  stroke="#1A906B"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
            2 days left at this price!
          </p>
            --}}
          </div>

        </div>
        <div class="aside__block">
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 19 19"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Course Duration
            </p>
            <p class="aside__block__text">{{$data->course_duration}}</p>
          </div>
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 21 21"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10.5 5.28676C9.05766 3.99295 7.1876 3.27858 5.25 3.28126C4.3295 3.28126 3.44575 3.43876 2.625 3.72926V16.198C3.46817 15.9005 4.35589 15.749 5.25 15.75C7.26688 15.75 9.107 16.5086 10.5 17.7555M10.5 5.28676C11.9423 3.99287 13.8124 3.2785 15.75 3.28126C16.6705 3.28126 17.5542 3.43876 18.375 3.72926V16.198C17.5318 15.9005 16.6441 15.749 15.75 15.75C13.8124 15.7473 11.9423 16.4617 10.5 17.7555M10.5 5.28676V17.7555"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Lesson
            </p>
            <p class="aside__block__text">{{$data->lesson}} Lessons</p>
          </div>
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 20V10"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M18 20V4"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M6 20V16"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Course Level
            </p>
            <p class="aside__block__text">{{$data->course_level}}</p>
          </div>
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.25 15C10.9424 15 13.125 12.8174 13.125 10.125C13.125 7.43261 10.9424 5.25 8.25 5.25C5.55761 5.25 3.375 7.43261 3.375 10.125C3.375 12.8174 5.55761 15 8.25 15Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                  />
                  <path
                    d="M14.5698 5.43158C15.2403 5.24266 15.9436 5.19962 16.6321 5.30537C17.3207 5.41111 17.9786 5.66318 18.5615 6.04459C19.1444 6.42601 19.6389 6.92791 20.0115 7.5165C20.3841 8.10509 20.6263 8.7667 20.7217 9.45676C20.8171 10.1468 20.7635 10.8493 20.5645 11.5169C20.3655 12.1845 20.0258 12.8018 19.5682 13.327C19.1107 13.8523 18.5458 14.2734 17.9118 14.562C17.2777 14.8505 16.5892 14.9999 15.8926 15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M1.49951 18.5059C2.26089 17.4229 3.27166 16.539 4.4465 15.9288C5.62133 15.3186 6.92574 15.0001 8.24959 15C9.57344 14.9999 10.8779 15.3184 12.0528 15.9285C13.2276 16.5386 14.2385 17.4225 14.9999 18.5054"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M15.8926 15C17.2166 14.999 18.5213 15.3171 19.6962 15.9273C20.8712 16.5375 21.8819 17.4218 22.6426 18.5054"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Students Enrolled
            </p>
            <p class="aside__block__text">{{$total_enrolled}}</p>
          </div>
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10.5 10.5H16.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.5 13.5H16.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M7.5 3.75V20.25"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Language
            </p>
            <p class="aside__block__text">{{$data->language}}</p>
          </div>
          <div class="aside__block__row flex-ctr-spb">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9 12.0005H15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9 15.0005H15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M5.25 3.75055H18.75C18.9489 3.75055 19.1397 3.82957 19.2803 3.97022C19.421 4.11087 19.5 4.30164 19.5 4.50055V18.7505C19.5 19.3473 19.2629 19.9196 18.841 20.3415C18.419 20.7635 17.8467 21.0005 17.25 21.0005H6.75C6.15326 21.0005 5.58097 20.7635 5.15901 20.3415C4.73705 19.9196 4.5 19.3473 4.5 18.7505V4.50055C4.5 4.30164 4.57902 4.11087 4.71967 3.97022C4.86032 3.82957 5.05109 3.75055 5.25 3.75055Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M7.5 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M16.5 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >Subtittle Language
            </p>
            <p class="aside__block__text">{{$data->subtitle_language}}</p>
          </div>
        </div>

        <div class="aside__block">
          @auth
          @php

              $subcription_data =  App\Http\Controllers\Frontend\StripeController::subcribtion_check($data->id)
          @endphp
          @if($subcription_data == 0)
            @if($data->payment_type == 'Free')
            <a href="/customer/course_subscription/{{$data->id}}" class="aside__block__btn book-btn btn-primary"
              >Book Now</a
            >
            @else
            <a href="/customer/stripe/{{$data->id}}" class="aside__block__btn book-btn btn-primary"
                >Book Now</a
              >
            @endif
          @else
            <a href="#" class="aside__block__btn book-btn btn-primary"
              >Subscribed</a
            >
          @endif

          @if (session()->has('success'))<div class="alert alert-success">{{ session('success') }}</div> @endif

          @php

              $wishlist_data =  App\Http\Controllers\Frontend\StripeController::wishlist_check($data->id)
          @endphp
          @if($wishlist_data == 0)
            <a href="/customer/addwishlist/{{$data->id}}" class="aside__block__btn wishlist-btn btn-primary">
              Add to Wishlist
            </a>
          @else
            <a href="#" class="aside__block__btn wishlist-btn btn-primary">
              Wishlist Added
            </a>
          @endif
          @else
          <a href="/login" class="aside__block__btn book-btn btn-primary"
          > Book Now</a
        >
        <a href="/login" class="aside__block__btn wishlist-btn btn-primary">
          Add to Wishlist
        </a>
            @endauth

          <p class="aside__block__note">
            <b>Note:</b> All course have 30-days money-back guarantee
          </p>
        </div>

        <div class="aside__block">
          @if($page_content->lifetime)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 19 19"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->lifetime}}
            </p>
          </div>
          @endif
          @if($page_content->money_back)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 2.25V4.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12 19.5V21.75"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17.25 8.25C17.25 7.75754 17.153 7.26991 16.9645 6.81494C16.7761 6.35997 16.4999 5.94657 16.1517 5.59835C15.8034 5.25013 15.39 4.97391 14.9351 4.78545C14.4801 4.597 13.9925 4.5 13.5 4.5H10.125C9.13044 4.5 8.17661 4.89509 7.47335 5.59835C6.77009 6.30161 6.375 7.25544 6.375 8.25C6.375 9.24456 6.77009 10.1984 7.47335 10.9017C8.17661 11.6049 9.13044 12 10.125 12H14.25C15.2446 12 16.1984 12.3951 16.9017 13.0983C17.6049 13.8016 18 14.7554 18 15.75C18 16.7446 17.6049 17.6984 16.9017 18.4017C16.1984 19.1049 15.2446 19.5 14.25 19.5H9.75C8.75544 19.5 7.80161 19.1049 7.09835 18.4017C6.39509 17.6984 6 16.7446 6 15.75"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->money_back}}
            </p>
          </div>
          @endif
          @if($page_content->excercise)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10.5 10.5H16.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.5 13.5H16.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M7.5 3.75V20.25"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->excercise}}
            </p>
          </div>
          @endif
          @if($page_content->shareable_cer)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M5.25 5.25V10.4153C5.25 14.1372 8.227 17.2222 11.9488 17.2498C12.8395 17.2566 13.7228 17.087 14.5476 16.7508C15.3725 16.4146 16.1226 15.9185 16.7548 15.291C17.3871 14.6636 17.8889 13.9172 18.2313 13.0949C18.5737 12.2727 18.75 11.3907 18.75 10.5V5.25C18.75 5.05109 18.671 4.86032 18.5303 4.71967C18.3897 4.57902 18.1989 4.5 18 4.5H6C5.80109 4.5 5.61032 4.57902 5.46967 4.71967C5.32902 4.86032 5.25 5.05109 5.25 5.25Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9 21H15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12 17.25V21"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M18.5825 12H19.4998C20.2955 12 21.0585 11.6839 21.6211 11.1213C22.1837 10.5587 22.4998 9.79565 22.4998 9V7.5C22.4998 7.30109 22.4208 7.11032 22.2801 6.96967C22.1395 6.82902 21.9487 6.75 21.7498 6.75H18.7498"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M5.43432 12H4.48828C3.69263 12 2.92957 11.6839 2.36696 11.1213C1.80435 10.5587 1.48828 9.79565 1.48828 9V7.5C1.48828 7.30109 1.5673 7.11032 1.70795 6.96967C1.8486 6.82902 2.03937 6.75 2.23828 6.75H5.23828"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->shareable_cer}}
            </p>
          </div>
          @endif
          @if($page_content->access_on)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.5 18L19.5 18C20.3284 18 21 17.3284 21 16.5V6C21 5.17157 20.3284 4.5 19.5 4.5L4.5 4.5C3.67157 4.5 3 5.17157 3 6V16.5C3 17.3284 3.67157 18 4.5 18Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M15 21H9"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->access_on}}
            </p>
          </div>
          @endif
          @if($page_content->subtitle)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9 12.0005H15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9 15.0005H15"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M5.25 3.75055H18.75C18.9489 3.75055 19.1397 3.82957 19.2803 3.97022C19.421 4.11087 19.5 4.30164 19.5 4.50055V18.7505C19.5 19.3473 19.2629 19.9196 18.841 20.3415C18.419 20.7635 17.8467 21.0005 17.25 21.0005H6.75C6.15326 21.0005 5.58097 20.7635 5.15901 20.3415C4.73705 19.9196 4.5 19.3473 4.5 18.7505V4.50055C4.5 4.30164 4.57902 4.11087 4.71967 3.97022C4.86032 3.82957 5.05109 3.75055 5.25 3.75055Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M7.5 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M16.5 2.25055V5.25055"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->subtitle}}
            </p>
          </div>
          @endif
          @if($page_content->online_course)
          <div class="aside__block__row flex-ctr">
            <p class="aside__block__label">
              <span class="icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3 16.5L12 21.75L21 16.5"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M3 12L12 17.25L21 12"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M3 7.5L12 12.75L21 7.5L12 2.25L3 7.5Z"
                    stroke="#1A906B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg> </span
              >{{$page_content->online_course}}
            </p>
          </div>
          @endif
        </div>
      </aside>
    </div>
  </section>

  <!-- Course Carousel -->
  <section class="courses carousel-wrap design01">
    <div class="container">
      <div class="section__row flex-ctr-spb">
        <div class="section__col">
          <h2 class="section-title courses__title">
            Most <span class="related highlight-text">Related</span> Courses
          </h2>
          <p class="courses__dsc text">
            Build new skills with new trendy courses and shine for the next
            future career.
          </p>
        </div>
        <div class="section__col carousel-triggers flex-ctr">
          <button class="carousel-trigger prev-trigger">
            <svg
              width="45"
              height="45"
              viewBox="0 0 45 45"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="22.5" cy="22.5" r="22" stroke="#1A906B" />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M18.7198 23.53C18.5794 23.3894 18.5005 23.1988 18.5005 23C18.5005 22.8013 18.5794 22.6107 18.7198 22.47L26.2198 14.97C26.2885 14.8963 26.3713 14.8372 26.4633 14.7963C26.5553 14.7553 26.6546 14.7332 26.7553 14.7314C26.856 14.7297 26.956 14.7482 27.0494 14.7859C27.1428 14.8236 27.2276 14.8798 27.2989 14.951C27.3701 15.0222 27.4262 15.107 27.464 15.2004C27.5017 15.2938 27.5202 15.3939 27.5184 15.4946C27.5166 15.5953 27.4946 15.6946 27.4536 15.7866C27.4126 15.8786 27.3535 15.9614 27.2798 16.03L20.3098 23L27.2798 29.97C27.3535 30.0387 27.4126 30.1215 27.4536 30.2135C27.4946 30.3055 27.5166 30.4048 27.5184 30.5055C27.5202 30.6062 27.5017 30.7062 27.464 30.7996C27.4262 30.893 27.3701 30.9779 27.2989 31.0491C27.2276 31.1203 27.1428 31.1764 27.0494 31.2142C26.956 31.2519 26.856 31.2704 26.7553 31.2686C26.6546 31.2668 26.5553 31.2448 26.4633 31.2038C26.3713 31.1628 26.2885 31.1037 26.2198 31.03L18.7198 23.53Z"
                fill="#1A906B"
              />
            </svg>
          </button>
          <button class="carousel-trigger next-trigger">
            <svg
              width="45"
              height="45"
              viewBox="0 0 45 45"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="22.5" cy="22.5" r="22" stroke="#1A906B" />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M27.2798 22.47C27.4203 22.6106 27.4992 22.8012 27.4992 23C27.4992 23.1987 27.4203 23.3893 27.2798 23.53L19.7798 31.03C19.6377 31.1625 19.4496 31.2346 19.2553 31.2311C19.061 31.2277 18.8756 31.149 18.7382 31.0116C18.6008 30.8742 18.5221 30.6888 18.5187 30.4945C18.5152 30.3002 18.5874 30.1121 18.7198 29.97L25.6898 23L18.7198 16.03C18.5874 15.8878 18.5152 15.6997 18.5187 15.5054C18.5221 15.3111 18.6008 15.1258 18.7382 14.9883C18.8756 14.8509 19.061 14.7722 19.2553 14.7688C19.4496 14.7654 19.6377 14.8375 19.7798 14.97L27.2798 22.47Z"
                fill="#1A906B"
              />
            </svg>
            <!-- <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="22.5" cy="22.5" r="22.5" fill="#1A906B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M27.2798 22.47C27.4203 22.6106 27.4992 22.8012 27.4992 23C27.4992 23.1987 27.4203 23.3893 27.2798 23.53L19.7798 31.03C19.6377 31.1625 19.4496 31.2346 19.2553 31.2311C19.061 31.2277 18.8756 31.149 18.7382 31.0116C18.6008 30.8742 18.5221 30.6888 18.5187 30.4945C18.5152 30.3002 18.5874 30.1121 18.7198 29.97L25.6898 23L18.7198 16.03C18.5874 15.8878 18.5152 15.6997 18.5187 15.5054C18.5221 15.3111 18.6008 15.1258 18.7382 14.9883C18.8756 14.8509 19.061 14.7722 19.2553 14.7688C19.4496 14.7654 19.6377 14.8375 19.7798 14.97L27.2798 22.47Z" fill="#1A906B"/>
              </svg>                   -->
          </button>
        </div>
      </div>
      <div class="carousel courses__carousel">
        @foreach($related_courses as $related_course)
        <div class="carousel__item course card style-01">
          <a href="{{ route('course.details.page', $related_course->id) }}" class="card__figure"
            ><span class="card__base btn-primary">{{$related_course->payment_type}}</span
            ><img src="{{ asset('storage/app/public/' .$related_course->cover) }}" alt=""
          /></a>
          <div class="card__context">
            <div class="card__row flex-ctr-spb">
              <div class="card__column flex-ctr">
                <span class="card__column-icon">
                  <svg
                    width="21"
                    height="21"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M10.5 5.28676C9.05766 3.99295 7.1876 3.27858 5.25 3.28126C4.3295 3.28126 3.44575 3.43876 2.625 3.72926V16.198C3.46817 15.9005 4.35589 15.749 5.25 15.75C7.26688 15.75 9.107 16.5086 10.5 17.7555M10.5 5.28676C11.9423 3.99287 13.8124 3.2785 15.75 3.28126C16.6705 3.28126 17.5542 3.43876 18.375 3.72926V16.198C17.5318 15.9005 16.6441 15.749 15.75 15.75C13.8124 15.7473 11.9423 16.4617 10.5 17.7555M10.5 5.28676V17.7555"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg> </span
                >{{$related_course->lesson}} Lessons
              </div>
              <div class="card__column flex-ctr">
                <span class="card__column-icon">
                  <svg
                    width="19"
                    height="19"
                    viewBox="0 0 19 19"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.5 4.25V9.5H13.4375M17.375 9.5C17.375 10.5342 17.1713 11.5582 16.7756 12.5136C16.3798 13.4691 15.7997 14.3372 15.0685 15.0685C14.3372 15.7997 13.4691 16.3798 12.5136 16.7756C11.5582 17.1713 10.5342 17.375 9.5 17.375C8.46584 17.375 7.44181 17.1713 6.48637 16.7756C5.53093 16.3798 4.6628 15.7997 3.93153 15.0685C3.20027 14.3372 2.6202 13.4691 2.22445 12.5136C1.82869 11.5582 1.625 10.5342 1.625 9.5C1.625 7.41142 2.45469 5.40838 3.93153 3.93153C5.40838 2.45469 7.41142 1.625 9.5 1.625C11.5886 1.625 13.5916 2.45469 15.0685 3.93153C16.5453 5.40838 17.375 7.41142 17.375 9.5Z"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg> </span
                >{{$related_course->course_duration}}
              </div>
              <div class="card__column flex-ctr">
                <span class="card__column-icon">
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
                      d="M9.43956 2.80871C9.83156 1.86633 11.1686 1.86633 11.5606 2.80871L13.3823 7.18896L18.1108 7.56871C19.1293 7.65008 19.5423 8.92058 18.7662 9.58558L15.1638 12.6717L16.2637 17.2856C16.5008 18.2796 15.4202 19.0645 14.5487 18.5325L10.5001 16.0597L6.45144 18.5325C5.57994 19.0645 4.49931 18.2787 4.73644 17.2856L5.83631 12.6717L2.23394 9.58558C1.45781 8.92058 1.87081 7.65008 2.88931 7.56871L7.61781 7.18896L9.43956 2.80871Z"
                      fill="#FFD05A"
                    />
                  </svg> </span
                >{{$related_course->avg_rating}}
              </div>
            </div>
            <a href="{{ route('course.details.page', $related_course->id) }}" class="card__title"
              >{{$related_course->title}}</a
            >
            <p class="card__dsc">
              {!! $related_course->summery !!}
            </p>
            <div class="card__row flex-ctr-spb">
              <p class="card__price">
                @if($related_course->payment_type == 'Free')
                Free/Scholarship
                @else
                  @if($related_course->discount_price)
                  AUD <del>{{$related_course->price}}</del> {{$related_course->discount_price}}
                  @else
                   AUD{{$related_course->price}}
                  @endif

                 @endif
                </p>
              <a href="#" class="card__btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Start Exploring -->
  <section class="start-exploring fig-content">
    <div class="container flex-ctr-spb">
      <figure class="fig-content__thumb">
        <img src="{{ asset('storage/app/public/' .$settings->new_img) }}" alt="" />
      </figure>
      <div class="fig-content__context">
        <h2 class="fig-content__title section-title">
          Join
          <span class="highlight-text">World's largest</span>
          learning platform today
        </h2>
        <p class="fig-content__dsc">{{$settings->new_details}}</p>
        <a href="/register" class="fig-content__btn btn-primary">Sign Up for Free</a>
      </div>
    </div>
  </section>


@endsection