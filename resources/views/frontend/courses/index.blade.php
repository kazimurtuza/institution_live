@extends('layouts.frontend_base')

@section('content')

 <!-- Hero Section -->
 <section class="hero listing-hero">
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

  <main class="main listing-main paid">
    <!-- Listing Items -->
    <div class="listing-items">
      <div class="container">
         <form action="{{route('filter_courses')}}" method="post" class="listing-items__filter filter">
          @csrf
          <div class="filter__row flex-ctr-spb">
            <div class="filter__col flex-ctr">
              <div class="filter__block status-block flex-ctr">
                <span class="icon">
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M12.0001 11.25L12.0001 20.25"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M12.0001 3.75L12.0001 8.25"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M18.7501 18.75L18.7502 20.25"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M18.7502 3.75L18.7501 15.75"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M21.0001 15.75H16.5001"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M5.25007 15.75L5.25 20.25"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M5.25 3.75L5.25007 12.75"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M3.00012 12.75H7.50012"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M14.2501 8.25H9.75012"
                      stroke="#1A906B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg> </span
                ><span class="text">Filter</span><span class="base">0</span>
              </div>
              {{-- <div class="filter__block flex-ctr">
                <button class="filter__submit">
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M10.875 18.75C15.2242 18.75 18.75 15.2242 18.75 10.875C18.75 6.52576 15.2242 3 10.875 3C6.52576 3 3 6.52576 3 10.875C3 15.2242 6.52576 18.75 10.875 18.75Z"
                      stroke="#06241B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M16.4431 16.4438L20.9994 21.0001"
                      stroke="#06241B"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg></button
                ><input
                  type="text"
                  class="filter__input"
                  placeholder="Quran Learning"
                />
              </div> --}}
            </div>
            <div class="filter__col flex-ctr">
              <label for="sort" class="filter__block-label">Sort by</label>
              <div class="select-wrap">
                <select required name="payment_type" class="filter__block select">
                  <option>Select Type</option>
                  <option @if($payment_type == 'Paid') selected @endif value="Paid">Paid</option>
                  <option @if($payment_type == 'Free') selected @endif value="Free"> Free/Scholarship </option>
                </select>

              </div>
              <input value="Go" type="submit" class="card__btn btn-primary">
            </div>
          </div>

          <div class="filter__row flex-ctr-spb">
            <div class="filter__col">
              <ul class="flex-ctr filter__tags">
                <li>Suggestion:</li>
                @foreach($all_subjects as $subject)
                <li>
                  <a href="{{route('courses_subject',['post_id'=>$subject->id])}}"><label for="tag1">{{$subject->name}}</label></a>

                </li>
                @endforeach
              </ul>
            </div>
            <div class="filter__col">
              <p class="filter__result-text">
                <b>{{$data->count()}} results</b>
              </p>
            </div>
          </div>
        </form>
        <div id="get_courses" class="listing-cards">

            @foreach ($data as $course)

            <div class="listing-card card style-01">
                <a href="{{ route('course.details.page', $course->id) }}" class="card__figure"
                  ><span class="card__base btn-primary">@if($course->payment_type == 'Free') Free/Scholarship @else {{$course->payment_type}} @endif</span
                  ><img src="{{$course->cover}}" alt=""
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
                      >{{$course->lesson}} Lessons
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
                      >{{$course->course_duration}}
                    </div>
                    <div class="card__column flex-ctr">
                    <div class="course__rating-wrap">
              <ul class="course__rating main-rating" style="width: {{ $course->avg_rating*100/5 }}%">
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
                      {{$course->avg_rating}}
                    </div>
                  </div>
                  <a href="{{ route('course.details.page', $course->id) }}" class="card__title"
                    >{{$course->title}}</a
                  >
                  <p class="card__dsc">
                    {!! $course->summery !!}
                  </p>
                  <div class="card__row flex-ctr-spb">
                    <p class="card__price">
                      @if($course->payment_type == 'Free')
                      Free/Scholarship
                      @else
                        @if($course->discount_price)
                        AUD <del>{{$course->price}}</del> {{$course->discount_price}}
                        @else
                        AUD{{$course->price}}
                        @endif
                      @endif
                    </p>
                    <a href="{{ route('course.details.page', $course->id) }}" class="card__btn btn-primary">  Book Now</a>
                  </div>
                </div>
              </div>

            @endforeach


        </div>

        {{$data->links()}}

        {{-- <ul class="listing-pagination pagination flex-ctr-ctr">
          <li class="pagination__item">
            <a href="#" class="pagination__link flex-ctr-ctr">
              <svg
                width="9"
                height="16"
                viewBox="0 0 9 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0.275 8.90006C0.0991344 8.72441 0.000218815 8.48612 0 8.23756V7.76256C0.00288001 7.51454 0.101395 7.27721 0.275 7.10006L6.7 0.68756C6.81735 0.569239 6.9771 0.502686 7.14375 0.502686C7.3104 0.502686 7.47015 0.569239 7.5875 0.68756L8.475 1.57506C8.59258 1.69026 8.65884 1.84795 8.65884 2.01256C8.65884 2.17717 8.59258 2.33485 8.475 2.45006L2.9125 8.00006L8.475 13.5501C8.59332 13.6674 8.65987 13.8272 8.65987 13.9938C8.65987 14.1605 8.59332 14.3202 8.475 14.4376L7.5875 15.3126C7.47015 15.4309 7.3104 15.4974 7.14375 15.4974C6.9771 15.4974 6.81735 15.4309 6.7 15.3126L0.275 8.90006Z"
                  fill="#6D737A"
                />
              </svg>
            </a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link active flex-ctr-ctr">1</a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link flex-ctr-ctr">2</a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link flex-ctr-ctr">3</a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link flex-ctr-ctr">4</a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link flex-ctr-ctr">5</a>
          </li>
          <li class="pagination__item">
            <a href="#" class="pagination__link inable flex-ctr-ctr">
              <svg
                width="9"
                height="16"
                viewBox="0 0 9 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M8.725 8.90006C8.90087 8.72441 8.99978 8.48612 9 8.23756V7.76256C8.99712 7.51454 8.8986 7.27721 8.725 7.10006L2.3 0.68756C2.18265 0.569239 2.0229 0.502686 1.85625 0.502686C1.6896 0.502686 1.52985 0.569239 1.4125 0.68756L0.525 1.57506C0.40742 1.69026 0.341161 1.84795 0.341161 2.01256C0.341161 2.17717 0.40742 2.33485 0.525 2.45006L6.0875 8.00006L0.525 13.5501C0.406679 13.6674 0.340126 13.8272 0.340126 13.9938C0.340126 14.1605 0.406679 14.3202 0.525 14.4376L1.4125 15.3126C1.52985 15.4309 1.6896 15.4974 1.85625 15.4974C2.0229 15.4974 2.18265 15.4309 2.3 15.3126L8.725 8.90006Z"
                  fill="#6D737A"
                />
              </svg>
            </a>
          </li>
        </ul> --}}
      </div>
    </div>

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
