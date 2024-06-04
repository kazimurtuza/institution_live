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

  <section class="fig-content">
    <div class="container">
        <div>{!! $page_content->first_section !!}</div>
    <div>
        <table border="1">
            <tr>
                <th>Course Types</th>
                {{-- <th>Course Levels</th> --}}
                <th>Course Subject</th>
                <th>Free or Minimum Fees</th>
            </tr>
            <tr>
                <td>{{$page_content->type_one}}</td>
                {{-- <td>{{$page_content->level_one}}</td> --}}
                <td>{{$page_content->sub_one}}</td>
                <td>{{$page_content->fee_one}}</td>
            </tr>
            <tr>
                <td>{{$page_content->type_two}}</td>
                {{-- <td>{{$page_content->level_two}}</td> --}}
                <td>{{$page_content->sub_two}}</td>
                <td>{{$page_content->fee_two}}</td>
            </tr>
            <tr>
                <td>{{$page_content->type_three}}</td>
                {{-- <td>{{$page_content->level_three}}</td> --}}
                <td>{{$page_content->sub_three}}</td>
                <td>{{$page_content->fee_three}}</td>
            </tr>
        </table>
    </div>
    <div>{!! $page_content->last_section !!}</div>
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
