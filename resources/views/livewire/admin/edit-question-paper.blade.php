<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Question <Paper>{{$paperInfo->name}}</h3>
                    </div>

                    <div>
                    @if (session()->has('success'))<div class="alert alert-success">{{ session('success') }}</div> @endif
                        <form method="post" action="{{route("update.question-paper")}}" >
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="hidden" name="question_paper_id" value="{{$paperInfo->id}}">
                                            <h6 >Type</h6>
                                            <select class="form-control" id="category" name="category" onchange="subjectList(this)" required>
                                                <option value="">SELECT TYPE</option>
                                                @foreach($categories as $value)
                                                    <option value="{{$value->id}}"   @if($category==$value->id) selected @endif >{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <h6 >Subject</h6>
                                            <select class="form-control" id="subjectData" name="subject" onchange="courseList(this)" required>
                                                <option value="">SELECT SUBJECT</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <h6 >Course</h6>
                                            <select  class="form-control" id="courseData" name="course"  required>
                                                <option value="">SELECT COURSE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-3">

                                        <div class="col-4">
                                            <h6 >Question Name</h6>
                                            <input type="text" class="form-control" name="question_name" value="{{$paperInfo->name}}" placeholder="Question Name" required>
                                        </div>
                                        <div class="col-4">
                                            <h6 >Duration in minutes</h6>
                                            <input type="text" class="form-control" name="duration" value="{{$paperInfo->duration}}" placeholder="Duration in minutes" required>
                                        </div>
                                        <div class="col-4">
                                            <h6>Point par question</h6>
                                            <input type="text" class="form-control" name="point" value="{{$paperInfo->unit_point}}" placeholder="Point" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="col">
                                            <h5>Select Question</h5>
                                            <select class="form-control selectData" name="question_list[]" id="questionListSet" multiple="multiple" required>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success"> Update Question Paper</button>
                                    </div>
                                    {{--                                <div>--}}

                                    {{--                                    <form>--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label for="exampleFormControlSelect1">Question Title</label>--}}
                                    {{--                                            <input type="text" class="form-control" name="question" id="question">--}}
                                    {{--                                        </div>--}}

                                    {{--                                        <div id="questionList">--}}

                                    {{--                                        </div>--}}

                                    {{--                                        <div class="d-flex justify-content-center mt-3">--}}
                                    {{--                                            <span onclick="addNewQuestion()">Add new</span>--}}
                                    {{--                                        </div>--}}

                                    {{--                                        <div> <span onclick="submitQuestion()">Save</span></div>--}}

                                    {{--                                    </form>--}}

                                    {{--                                    <div style="display: none" id="questionans">--}}
                                    {{--                                        <div class="input-group mt-3">--}}
                                    {{--                                            <div class="input-group-prepend">--}}
                                    {{--                                                <span class="input-group-text" id="">Qus ans</span>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <input type="text" class="form-control" name="question_ans[]">--}}
                                    {{--                                            <input type="radio" name="ans[]" class="form-control">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@push('summernote')
    <script>
        $('.summernote').summernote({
            height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                @this.set('details', contents);
                }
            }
        });

        function subjectList(data){
            var categoryId=$(data).val()
            $.ajax({
                url: "{{url('/admin/category-subject')}}",
                type: "get",
                data: {
                    data:categoryId,
                },
                success: function(response) {
                    $('#subjectData').html(response);

                },
                error: function(xhr) {
                    //Do Something to handle error
                }});

            $.ajax({
                url: "{{url('/admin/course-question')}}",
                type: "get",
                data: {
                    data:subjectId,
                },
                success: function(response) {
                    $('#questionListSet').html(response)
                    // console.log(response);
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }

        // subject selected
        $.ajax({
            url: "{{url('/admin/category-subject')}}",
            type: "get",
            data: {
                data:{{$category}},
            },
            success: function(response) {
                console.log(response)
                $('#subjectData').html(response)


            },
            error: function(xhr) {
                //Do Something to handle error
            }});
        //

        // course selected
        $.ajax({
            url: "{{url('/admin/subject-course')}}",
            type: "get",
            data: {
                data:{{$subject}},
            },
            success: function(response) {

                $('#courseData').html(response)

                $('#subjectData').val({{$subject}})
                $('#courseData').val({{$course}})
            },
            error: function(xhr) {
                //Do Something to handle error
            }});



        // course selected

        // question list
        $.ajax({
            url: "{{url('/admin/course-question')}}",
            type: "get",
            data: {
                data:{{$subject}},
            },
            success: function(response) {
                $('#questionListSet').html(response)
                console.log(response);

                var selectedValues = @json($selectedQuestion); // Replace these with your desired option values
                $('.selectData').val(selectedValues).trigger('change');
            },
            error: function(xhr) {
                //Do Something to handle error
            }});
        // question list



        function courseList(data){
            var subjectId=$(data).val();
            $.ajax({
                url: "{{url('/admin/subject-course')}}",
                type: "get",
                data: {
                    data:subjectId,
                },
                success: function(response) {

                    console.log(response)

                    $('#courseData').html(response)
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});

            $.ajax({
                url: "{{url('/admin/course-question')}}",
                type: "get",
                data: {
                    data:subjectId,
                },
                success: function(response) {
                    $('#questionListSet').html(response)
                    // console.log(response);
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }

        function questionListGet(data){
            var courseId=$(data).val();
            $.ajax({
                url: "{{url('/admin/course-question')}}",
                type: "get",
                data: {
                    data:courseId,
                },
                success: function(response) {
                    $('#questionListSet').html(response)
                    // console.log(response);
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }

        function addNewQuestion(){
            var question= $('#questionans').html();

            $('#questionList').append(question);
        }

        function submitQuestion(){
            var question_ans_values = []; // Array to store input values
            var ans = []; // Array to store input values
            var question=$("#question").val();

            var category=$('#category').val();
            var subject=$('#subjectData').val();
            var course=$('#courseData').val();

            $('input[name="question_ans[]"]').each(function() {
                question_ans_values.push($(this).val()); // Push input value to the array
            });

            $('input[name="ans[]"]').each(function() {

                if ($(this).is(':checked')) {
                    ans.push($(this).val()); // Push value to the array if it's checked
                }else{
                    ans.push(0);
                }
            });


            $.ajax({
                url: "{{url('/admin/store-question')}}",
                type: "get",
                data: {
                    category:category,
                    subject:subject,
                    course:course,
                    question:question,
                    question_ans_list:question_ans_values,
                    ans:ans,
                },
                success: function(response) {
                    $('#question').val("")
                    $('#questionList').html("")
                    alert('Successfully Created Question')
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});

        }

        // $(".js-example-basic-multiple-limit").select2({
        //     maximumSelectionLength: 2
        // });



        $('.selectData').select2({
            placeholder: 'This is my placeholder',
            allowClear: true
        })


    </script>

@endpush

