@extends('layouts.frontend_base')

@section('content')
    <main class="main congratulations-main">
        <!-- Congratulations Area -->
        <section class="congratulations">
            <div class="container flex-ctr-ctr">
                <div class="congratulations__inner">
                    <h1 class="congratulations__title section-title">
                        Your Test is completed
                    </h1>
                    <figure class="congratulations__thumb">
                        <img width="300" src="https://3i.technovicinity.com/assets/frontend/imgs/congratulations.webp" alt="" />
                    </figure>
                    <div class="congratulations__box">
                        <p class="congratulations__box__row flex-ctr-spb">
                            Your Score: <span>{{$total_correct}}</span>
                        </p>
                        <p class="congratulations__box__row flex-ctr-spb">
                            Incorrect Answer: <span>{{$total_Incorrect}}</span>
                        </p>
                        <p class="congratulations__box__row flex-ctr-spb">
                            Test Time: <span>00:45:54</span>
                        </p>
                    </div>
                    <p class="congratulations__dsc text">
                        Figma ipsum component variant main layer. Arrange line fill figjam
                        component align. Font reesizing inspect arrow main. Blur inspect
                        prototype pen flows frame ipsum background. Link thumbnail flatten
                        team arrow. Auto opacity vertical text background device.
                        Community line auto create image horizontal align. Comment ellipse
                        font horizontal rotate link.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')



@endsection
