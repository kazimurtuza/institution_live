@extends('layouts.frontend_base')



@section('content')

<!-- Hero Section -->

<section class="hero course-details-hero">

    <div class="hero__bg">

      <img src="{{ asset('storage/app/public/' .$page_content->page_banner) }}" alt="" />

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



  <!-- Communicate -->

  <section class="fig-content communicate">

    <div class="container flex-ctr-spb">

      <div class="fig-content__context">

        <h2 class="fig-content__title section-title">

          <span class="highlight-text connect">Connect</span> with us

        </h2>

        <p class="fig-content__dsc text">

          {{$page_content->page_summery}}

        </p>

      </div>

      <figure class="fig-content__thumb">

        <img src="{{ asset('storage/app/public/' .$page_content->thumb_img) }}" alt="" />

      </figure>

    </div>

  </section>



  <!-- Get in Tuch -->

  <section class="git">

    <div class="container">

      <div class="git__header">

        <h2 class="git__title section-title">

          <span class="highlight-text contact">Contact</span> Us

        </h2>

        <p class="git__dsc text">

          {{$page_content->contact_summery}}

        </p>

      </div>

      <div class="git__body flex-auto-spb">

        <div class="git__info">

          <h3 class="git__info__title">

            {{$page_content->contact_head}}

          </h3>

          <div class="git__info__rows">

            <div class="git__info__row">

              <p class="git__info__row__label">Address</p>

              <p class="git__info__row__text">

                <span class="text">{{$page_content->address}}</span>

              </p>

            </div>

            <div class="git__info__row">

              <p class="git__info__row__label">Phone Number</p>

              <p class="git__info__row__text">

                <a class="text" href="tel:{{$page_content->phone}}">{{$page_content->phone}}</a

                >

              </p>

            </div>

            <div class="git__info__row">

              <p class="git__info__row__label">Email address</p>

              <p class="git__info__row__text">

                <a class="text" href="mailto:{{$page_content->email}}"

                  >{{$page_content->email}}</a

                >



              </p>

            </div>

          </div>

        </div>

        <form action="{{route('post_contact.page')}}" method="post" class="git__form form">

          @if (session()->has('success'))<div class="alert alert-success">{{ session('success') }}</div> @endif

          @csrf

          <h3 class="form__title">{{$page_content->form_head}}</h3>

          <p class="form__dsc text">

            {{$page_content->form_summery}}

          </p>

          <div class="form__fields">

            <div class="form__row flex-auto-spb">

              <div class="form__field">

                <label for="first-name" class="form__label">First Name</label

                ><input

                  type="text"

                  class="form__input"

                  id="first-name"

                  placeholder="First Name"

                  name="fname"

                  required

                />

              </div>

              <div class="form__field">

                <label for="last-name" class="form__label">Last Name</label

                ><input

                  type="text"

                  class="form__input"

                  id="last-name"

                  placeholder="Last Name"

                  name="lname"

                  required

                />

              </div>

            </div>

            <div class="form__field">

              <label for="email" class="form__label">Email</label

              ><input

                type="email"

                class="form__input"

                id="email"

                placeholder="Email Address"

                name="email"

                required

              />

            </div>

            <div class="form__field">

              <label for="subject" class="form__label">Subject</label

              ><input

                type="text"

                class="form__input"

                id="subject"

                placeholder="Messages Subject"

                name="subject"

              />

            </div>

            <div class="form__field">

              <label for="message" class="form__label">Message</label>

              <textarea

                name="message"

                id="message"

                class="form__textarea"

                placeholder="Message"

                name="message"

                required

              ></textarea>

            </div>

          </div>



          <button class="form__submit btn-primary">

            Send Message<span class="icon">

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

    </div>

  </section>



  <!-- View Location -->

  <!-- <section class="view-location">

    <iframe

      class="view-location__iframe"

      src="{{$page_content->map_source}}"

      width="600"

      height="450"

      style="border: 0"

      allowfullscreen=""

      loading="lazy"

      referrerpolicy="no-referrer-when-downgrade"

    ></iframe>

  </section> -->



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