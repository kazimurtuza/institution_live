@extends('layouts.frontend_base')
@section('content')
@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<!-- Hero Section -->
<section class="hero faq-hero">
    <div class="hero__bg">
      <img src="{{$page_content->page_banner}}" alt="" />
    </div>
    <div class="container flex-ctr-ctr">
      <div class="hero__content">
        <h1 class="hero__title section-title">{{$page_content->name}}</h1>
        <ul class="hero__breadcrumb flex-ctr-ctr">
          <li class="text"><a href="#">Home</a> ></li>
          <li class="text">{{$page_content->name}}</li>
        </ul>
      </div>
    </div>
  </section>

  <main class="main faq-main">
    <!-- FAQ Section -->
    <section class="faq">
      <form action="#" class="container">
        <div class="faq__header flex-ctr-spb">
          <h2 class="faq__title">{{$page_content->name}}</h2>
          <!-- <div class="faq__filter">
            <div class="select-wrap">
              <select name="faq-filter" id="faq-filter" class="faq-select">
                <option value="students">Students</option>
                <option value="teacher">Teacher</option>
              </select>
            </div>
          </div> -->
        </div>
        <div class="faq__body flex-auto-spb tab">
          <nav class="faq__nav tab__header">
            <ul>
              @foreach ($all_faq as $faq)
              <li class="tab-trigger active-tab" data-target="#tab{{$faq->cat_name}}">
                <a href="#" class="faq__nav-link"
                  >
                  {{$AdminDashboard->get_faq_category_name($faq->cat_name)}}
                  </a
                >
              </li>

              @endforeach


            </ul>
          </nav>

          <div class="faq__items tab__body">
            @foreach ($all_faq as $faq)
            <div class="tab-content" id="tab{{$faq->cat_name}}">
              @php
              $all_faq_questions =  App\Http\Controllers\Frontend\Faq::get_all_faq_questions($faq->cat_name);

              @endphp
              @foreach($all_faq_questions as $faq_questions)
              <div class="faq__item">
                <div class="faq__item__header collapse__trigger flex-ctr-spb">
                  <h3 class="faq__item__title">
                    {{$faq_questions->question}}
                  </h3>
                  <div class="faq__item__collapse-icon">
                    <svg
                      width="20"
                      height="20"
                      viewBox="0 0 20 20"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M10 3.125V16.875"
                        stroke="#06241B"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M4.375 11.25L10 16.875L15.625 11.25"
                        stroke="#06241B"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </div>
                </div>
                <div class="faq__item__body">
                  {!! $faq_questions->answer !!}
                </div>
              </div>
              @endforeach

            </div>

            @endforeach

          </div>
        </div>
      </form>
    </section>

    <!-- Start Exploring -->
    <section class="start-exploring fig-content">
      <div class="container flex-ctr-spb">
        <figure class="fig-content__thumb">
          <img src="{{$settings->new_img}}" alt="" />
        </figure>
        <div class="fig-content__context">
          <h2 class="fig-content__title section-title">
            Join <span class="highlight-text">World's largest</span> learning
            platform today
          </h2>
          <p class="fig-content__dsc">
            {{$settings->new_details}}
          </p>
          <a href="/register" class="fig-content__btn btn-primary"
            >Sign Up for Free</a
          >
        </div>
      </div>
    </section>
  </main>
@endsection
