@extends('layouts.frontend_base')



@section('content')

<!-- Hero Section -->

<section class="hero terms-hero">

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



  <main class="main terms-main">

    <!-- Terms And Condition -->

    <section class="terms-area">

      <div class="container terms-area__inner">

        <h2 class="terms-area__title"><span>Terms</span> and Condition</h2>

        {!! $page_content->details !!}

      </div>

    </section>

  </main>

@endsection
