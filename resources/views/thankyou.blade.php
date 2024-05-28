@extends('layouts.frontend_base')

@section('content')
<main class="main thanks-main">
    <!-- Thank You Area -->
    <section class="thanks">
      <div class="container flex-ctr-ctr">
        <div class="thanks__inner">
          <h1 class="thanks__title section-title">
            Thank You For Your Order
          </h1>
          <figure class="thanks__thumb">
            <img src="{{ asset('/assets/frontend/imgs/thanks-thumb.webp')}}" alt="" />
          </figure>
          <p class="thanks__dsc">
            You can view the course information from your account backend
          </p>
          <a href="/" class="thanks__btn btn-primary">Back to Homepage</a>
        </div>
      </div>
    </section>
  </main>
@endsection