@extends('layouts.frontend_base')

@section('content')

    <!-- Hero Section -->
    <section class="hero listing-hero">
        <div class="hero__bg">
            <img src="{{ asset('/assets/frontend/imgs/hero-bg.webp')}}" alt="" />
        </div>
        <div class="container flex-ctr-ctr">
            <div class="hero__content">
                <h1 class="hero__title section-title">Courses</h1>

            </div>
        </div>
    </section>

    <main class="main listing-main paid">
        <ul class="list-group" style="padding:20px; display: flex;justify-content: center">
            @foreach($courses as $list)
            <li class="list-group-item active" aria-current="true">{{$list->title}}   &nbsp; <a href="{{route('customer.courses.test',['course_id'=>$list->id])}}" class="btn btn-success">Take Test</a></li>
            @endforeach
        </ul>

    </main>

@endsection
