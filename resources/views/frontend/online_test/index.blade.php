@extends('layouts.frontend_base')

@section('content')
<main class="main test-main">
    <!-- Test Area -->
    <section class="test">
      <div class="container">
        <form action="#" class="test__block">
          <div class="test__header">
            <h1 class="test__title">
              Subject: {{$questionPaperInfo->name}}
            </h1>
            <p class="test__time"><b>Total Time:</b> {{$questionPaperInfo->duration}} Minutes</p>
            <p class="test__marks"><b>Total Question:</b> {{$total_question}}</p>
          </div>
          <div class="test__body flex-auto-spb">
              <input type="hidden" id="selected_option" >
              <div id="question">
{{--                  <div class="test__qus-block">--}}
{{--                      <h3 class="test__question">--}}
{{--                          <span class="test__question__count">1.</span>--}}
{{--                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed--}}
{{--                          do eiusmod tempor incididunt?--}}
{{--                      </h3>--}}
{{--                      <div class="test__ans-wrap">--}}
{{--                          <div class="test__ans flex-ctr">--}}
{{--                              <input type="radio" name="answer" id="ans1" />--}}
{{--                              <label for="ans1" class="text"--}}
{{--                              >Lorem ipsum dolor sit amet consectetur. Id quam tincidunt--}}
{{--                                  et quis. Pharetra.</label--}}
{{--                              >--}}
{{--                          </div>--}}
{{--                          <div class="test__ans flex-ctr">--}}
{{--                              <input type="radio" name="answer" id="ans2" />--}}
{{--                              <label for="ans2" class="text"--}}
{{--                              >Lorem ipsum dolor sit amet consectetur. Dignissim vel--}}
{{--                                  dignissim aenean laoreet.</label--}}
{{--                              >--}}
{{--                          </div>--}}
{{--                          <div class="test__ans flex-ctr">--}}
{{--                              <input type="radio" name="answer" id="ans3" />--}}
{{--                              <label for="ans3" class="text"--}}
{{--                              >Lorem ipsum dolor sit amet consectetur. Libero quam--}}
{{--                                  praesent ut tortor. Suscipit.</label--}}
{{--                              >--}}
{{--                          </div>--}}
{{--                          <div class="test__ans flex-ctr">--}}
{{--                              <input type="radio" name="answer" id="ans4" />--}}
{{--                              <label for="ans4" class="text"--}}
{{--                              >Lorem ipsum dolor sit amet consectetur. Venenatis ut--}}
{{--                                  pellentesque feugiat enim.</label--}}
{{--                              >--}}
{{--                          </div>--}}
{{--                          <div class="test__ans flex-ctr">--}}
{{--                              <input type="radio" name="answer" id="ans5" />--}}
{{--                              <label for="ans5" class="text"--}}
{{--                              >Lorem ipsum dolor sit amet consectetur. Nisl donec--}}
{{--                                  pharetra vulputate viverra.</label--}}
{{--                              >--}}
{{--                          </div>--}}
{{--                      </div>--}}
{{--                      <div class="test__btns">--}}
{{--                          <button class="test__btn btn-primary skip-btn">Skip</button--}}
{{--                          ><button class="test__btn btn-primary">Next Question</button>--}}
{{--                      </div>--}}
{{--                  </div>--}}
              </div>

            <div class="test__time-counter">
              <h3 class="test__time-counter__label">Time Remaining</h3>
              <div class="test__timer">
                <p class="test__time" id="elapsed-time">00:18:19</p>
                <p class="test__time-units flex-ctr-spb">
{{--                  <span>HOUR</span><span>Min</span><span>Sec</span>--}}
                 <span>Min</span><span>Sec</span>
                </p>
              </div>
              <p class="test__score flex-ctr-spb">
                <b>Correct Answer: </b> <span id="total_correct">0</span>
              </p>
              <p class="test__score flex-ctr-spb">
                <b>Incorrect Answer: </b><span id="total_incorrect">0</span>
              </p>
                <p class="test__score flex-ctr-spb">
                <b>Skip Answer: </b><span id="total_skip">0</span>
              </p>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
@endsection

@section('script')
    <script>
        $.ajax({
            url: "{{url('/customer/question/show')}}",
            type: "get",
            data: {
                data:{{$test_id}},
                student_test_id:{{$studentTestId}},
            },
            success: function(response) {
                console.log(response);
                //

                $totalAns= parseFloat(response.total_skip)+parseFloat(response.total_correct)+parseFloat(response.total_Incorrect);
                $totalquestion=parseFloat({{$total_question}});
                $unsubmited=$totalquestion-$totalAns;

          

                $('#question').html(response.new_question)
                $('#total_correct').html(response.total_correct)
                $('#total_incorrect').html(response.total_Incorrect)
                $('#total_skip').html(response.total_skip)

             

                if($unsubmited==1) {
                    $("#nextbtn").html("Submit")
                };


            },
            error: function(xhr) {
                //Do Something to handle error
            }});

        function submitAns(is_skip){
            var question_id=$('#question_id_info').val();
            var selected_option=$('#selected_option').val();
            if(!selected_option && is_skip==0){
                alert('First Select Question Option')
                return false;
            }
            $.ajax({
                url: "{{url('/question/ans/store')}}",
                type: "get",
                data: {
                    question_id:question_id,
                    selected_option:selected_option,
                    test_id:{{$test_id}},
                    student_test_id:{{$studentTestId}},
                    is_skip:is_skip
                },
                success: function(response) {
                    console.log(response);
                    //



                    $totalAns= parseFloat(response.total_skip)+parseFloat(response.total_correct)+parseFloat(response.total_Incorrect);
                    $totalquestion=parseFloat({{$total_question}});
                    $unsubmited=$totalquestion-$totalAns;


                   $('#total_skip').html(response.total_skip)

                    if(parseFloat(response.new_question)==0){
                        function redirectToNamedRoute() {
                            var routeUrl = "{{ route('test.congratulation',['test_id'=>$test_id]) }}"; // Generate URL for the named route
                            window.location.href = routeUrl; // Redirect to the named route
                        }
                        document.getElementById("elapsed-time").textContent = `00:00`;
                        redirectToNamedRoute()
                        return false
                    };

                    $('#question').html(response.new_question)
                    $('#total_correct').html(response.total_correct)
                    $('#total_incorrect').html(response.total_Incorrect)

                    if($unsubmited==1) {
                    $("#nextbtn").html("Submit")
                     };
                
                    $unsubmited=$totalquestion-$totalAns;

                  {{-- if(response.is_in_time==false){
                        alert('your exam time is over')
                    }  --}}
                    $('#selected_option').val('');
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }

        function selectedans(data){
            $('#selected_option').val(data)

        }



    </script>

    <script>
        // Function to calculate and display the elapsed time
        function calculateElapsedTime(startTimeInSeconds) {
            // Get the current time in seconds
            const currentTimeInSeconds = Math.floor(Date.now() / 1000);
            // Calculate the elapsed time in seconds
            const elapsedTimeInSeconds = currentTimeInSeconds - startTimeInSeconds;
            // Convert seconds to hours, minutes, and seconds
            const hours = Math.floor(elapsedTimeInSeconds / 3600);
            const minutes = Math.floor((elapsedTimeInSeconds % 3600) / 60);
            // const seconds = elapsedTimeInSeconds % 60;
            const seconds = 60 - (elapsedTimeInSeconds % 60);
            // Format the result as hours:minutes:seconds
            let total_munite=(hours*60)+minutes;
            var remainingMinute=parseFloat({{$questionPaperInfo->duration}})-total_munite-1

            // const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            const formattedTime = `${remainingMinute}:${seconds.toString().padStart(2, '0')}`;
            // Display the elapsed time
            if(remainingMinute<=-1){
                function redirectToNamedRoute() {
                    var routeUrl = "{{ route('test.congratulation',['test_id'=>$test_id]) }}"; // Generate URL for the named route
                    window.location.href = routeUrl; // Redirect to the named route
                }
                document.getElementById("elapsed-time").textContent = `00:00`;
                redirectToNamedRoute()
                return false
            };


            {{--if(parseFloat(total_munite)>parseFloat({{$questionPaperInfo->duration}})){--}}
            {{--    alert('your exam time is over');--}}
            {{--    return false--}}
            {{--}--}}
            document.getElementById("elapsed-time").textContent = `${formattedTime}`;
        }
        // Start time in seconds (replace this with your timestamp)
        const startTimeInSeconds = {{$start_time_second}};
        // Call the function to calculate and display elapsed time
        calculateElapsedTime(startTimeInSeconds);

        // Update elapsed time every second
        setInterval(function() {
            calculateElapsedTime(startTimeInSeconds);
        }, 1000);
    </script>

@endsection
