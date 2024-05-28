@extends('layouts.frontend_base')

@section('content')
@inject('UserPanelStaticValue', 'App\Http\Controllers\Frontend\UserPanel')
    <!-- Hero Section -->
    <section class="hero listing-hero courses-list-hero">
        <div class="hero__bg">
            <img src="{{ asset('/assets/frontend/imgs/hero-bg.webp')}}" alt="" />
        </div>
        <div class="container flex-ctr-ctr">
            <div class="hero__content">
                <h1 class="hero__title section-title">Courses Test List</h1>

            </div>
        </div>
    </section>

    <main class="main listing-main paid courses-list">

    <div class="container flex-ctr-ctr">

    <table>
        <tr>
            <th>Test Name</th>
            <th>Duration</th>
            <th>Marks / Points</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($testList as $list)
        @php $course_id = $UserPanelStaticValue->get_test_check($list->id); @endphp
        <tr>
            <td>{{$list->name}}</td>
            <td>{{$list->duration}} Mins</td>
            <td>{{$list->unit_point}}</td>
            <td>
            @if($UserPanelStaticValue->get_test_check($list->id)) Completed @else @endif
            </td>
            <td>
                <span class="cotent">
                        
                        <a href="{{route('customer.online.test',['test_id'=>$list->id])}}" class="card__btn btn-primary">
                            @if($UserPanelStaticValue->get_test_check($list->id)) Show Result  @else Start Test  @endif
                        </a>
                    </span>
            </td>
        </tr>
        @endforeach
   </table>

    </div>

    
        <!-- <ul class="list-group">
            @foreach($testList as $list)

            @php
                  $course_id = $UserPanelStaticValue->get_test_check($list->id);
                @endphp
                <li class="list-group-item active" aria-current="true">
                    <span class="cotent">
                        {{$list->name}}   &nbsp;
                        <a href="{{route('customer.online.test',['test_id'=>$list->id])}}" class="btn btn-success">
                            @if($UserPanelStaticValue->get_test_check($list->id))
                            Show Result
                            @else

                            Start Test

                            @endif
                        </a>
                    </span>
                </li>
            @endforeach
        </ul> -->

    </main>

    <style>
        table{
            width:100%;
            margin:40px auto;
        }
        td,th{
            padding:10px;
            border:1px solid #ccc;
        }
        th{
            background-color:#1a906b;
            color:#fff;
        }
    </style>

@endsection
