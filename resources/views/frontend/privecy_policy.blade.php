@extends('layouts.frontend_base')



@section('content')

<!-- Hero Section -->

<section class="hero privacy-hero">

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



  <main class="main privacy-main">

    <!-- Privacy Policy -->

    <section class="privacy-area">

      <div class="container privacy-area__inner">

        <h2 class="privacy-area__title">Privacy <span>Policy</span></h2>





        {!! $page_content->details !!}

      </div>

    </section>

  </main>



@endsection
