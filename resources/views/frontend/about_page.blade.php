@extends('layouts.frontend_base')

@section('content')
 <!-- Hero Section -->
 <section class="hero course-details-hero">
    <div class="hero__bg">
      <img src="{{$page_content->page_banner}}" alt="" />
    </div>
    <div class="container flex-ctr-ctr">
      <div class="hero__content">
        <h1 class="hero__title section-title">{{$page_content->name}}</h1>
        <ul class="hero__breadcrumb flex-ctr-ctr">
          <li><a href="#">Home</a> ></li>
          <li>{{$page_content->name}}</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Chairman Message -->
  <section class="fig-content chairman-msg">
    <div class="container flex-ctr-spb">
      <div class="fig-content__context">
        <h2 class="fig-content__title section-title">
          <span class="highlight-text message">Message</span> From Chairman
        </h2>
        <p class="fig-content__dsc text-dark text">
          {!! $page_content->chairman_short_message !!}
        </p>
        <p class="fig-content__dsc text">
            {!! $page_content->chairman_details_message !!}
        </p>
        <div class="fig-content__stats">
          <div class="fig-content__stats-item">
            <h2 class="fig-content__stats-count section-title">{{$total_subscribed}}</h2>
            <p class="fig-content__stats-label text">Participate Students</p>
          </div>
          <div class="fig-content__stats-item">
            <h2 class="fig-content__stats-count section-title">{{$total_courses}}</h2>
            <p class="fig-content__stats-label text">Offered Courses</p>
          </div>
        </div>
      </div>
      <figure class="fig-content__thumb">
        <img src="{{ asset('storage/app/public/' .$page_content->chairman_pic) }}" alt="" />
      </figure>
    </div>
  </section>

  <!-- Our Vision -->
  <section class="fig-content our-vision">
    <div class="container flex-ctr-spb">
      <figure class="fig-content__thumb">
        <img src="{{$page_content->vission_pic}}" alt="" />
      </figure>
      <div class="fig-content__context">
        <h2 class="fig-content__title section-title">
          Our One Billion
          <span class="highlight-text message">Vision</span>
        </h2>
        <p class="fig-content__dsc text">
          {{$page_content->vission_short_message}}
        </p>
        <p class="fig-content__dsc text-dark text">
            {{$page_content->vission_details_message}}
        </p>
      </div>
    </div>
  </section>

  <!-- Our Vision -->
  <section class="fig-content mission">
    <div class="container flex-ctr-spb">
      <div class="fig-content__context">
        <h2 class="fig-content__title section-title">
          Our One Billion
          <span class="highlight-text message">Mission</span>
        </h2>
        <p class="fig-content__dsc text-dark text">
            {{$page_content->mission_short_message}}
        </p>
        <ul class="mission__list">
          <li class="mission__list-item">
            <span class="mission__list-item__icon">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                  fill="#1A906B"
                  stroke="#1A906B"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16.125 9.75L10.625 15L7.875 12.375"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
            <div class="mission__list-item__text">
              <h3 class="mission__list-item__title">
                {{$page_content->mission_one_title}}
              </h3>
              <p class="mission__list-item__dsc">
                {{$page_content->mission_one_details}}
              </p>
            </div>
          </li>
          <li class="mission__list-item">
            <span class="mission__list-item__icon">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                  fill="#1A906B"
                  stroke="#1A906B"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16.125 9.75L10.625 15L7.875 12.375"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
            <div class="mission__list-item__text">
              <h3 class="mission__list-item__title">
                {{$page_content->mission_two_title}}
              </h3>
              <p class="mission__list-item__dsc">
                {{$page_content->mission_two_details}}
              </p>
            </div>
          </li>
        </ul>
      </div>
      <figure class="fig-content__thumb">
        <img src="{{$page_content->mission_pic}}" alt="" />
      </figure>
    </div>
  </section>

  <!-- Start Exploring -->
  <section class="start-exploring fig-content">
    <div class="container flex-ctr-spb">
      <figure class="fig-content__thumb">
        <img src="{{$settings->new_img}}" alt="" />
      </figure>
      <div class="fig-content__context">
        <h2 class="fig-content__title section-title">
          Join
          <span class="highlight-text">World's largest</span>
          learning platform today
        </h2>
        <p class="fig-content__dsc text">
          {{$settings->new_details}}
        </p>
        <a href="/register" class="fig-content__btn btn-primary">Sign Up for Free</a>
      </div>
    </div>
  </section>

  @endsection
