
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Question Paper</h3>
                    </div>

                    <div>
                    @if (session()->has('success'))<div class="alert alert-success">{{ session('success') }}</div> @endif
                        <form method="post" action="{{route("store.question-paper")}}">
                            @csrf
                            <div class="card">
                                <div class="card-header">

                                    <div class="form-row">
                                        <div class="col">
                                            <select class="form-control" id="category" name="category" onchange="subjectList(this)" required>
                                                <option value="">SELECT TYPE</option>
                                                @foreach($categories as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="subjectData" name="subject" onchange="courseList(this)" required>
                                                <option value="">SELECT SUBJECT</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <select class="form-control" id="courseData" name="course" required>
                                                <option value="">SELECT COURSE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-3">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="question_name" placeholder="Question Name" required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="duration" placeholder="Duration in minutes" required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="point" placeholder="Point" required>
                                        </div>

                                    </div>
                                </div>


                            <div class="card card-default">
     {{-- 
                                <div class="card-header">
                                    <h3 class="card-title">Duallistbox</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="row">
                                     <div class="col-12">
                                            <div class="form-group">
                                                <label>Multiple</label>
                                                <select class="duallistbox" name="question_list[]" id="questionListSet"  multiple="multiple">
                                                    <option selected>Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>

                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
--}}

                                <div class="card-body">
                                    <div>
                                        <div class="col">
                                            <h5>Select Question</h5>
                                            <select class="form-control selectData" name="question_list[]" id="questionListSet" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>


                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success"> Create Question Paper</button>
                                    </div>
                                    {{-- <div>--}}

                                    {{-- <form>--}}
                                    {{-- <div class="form-group">--}}
                                    {{-- <label for="exampleFormControlSelect1">Question Title</label>--}}
                                    {{-- <input type="text" class="form-control" name="question" id="question">--}}
                                    {{-- </div>--}}

                                    {{-- <div id="questionList">--}}

                                    {{-- </div>--}}

                                    {{-- <div class="d-flex justify-content-center mt-3">--}}
                                    {{-- <span onclick="addNewQuestion()">Add new</span>--}}
                                    {{-- </div>--}}

                                    {{-- <div> <span onclick="submitQuestion()">Save</span></div>--}}

                                    {{-- </form>--}}

                                    {{-- <div style="display: none" id="questionans">--}}
                                    {{-- <div class="input-group mt-3">--}}
                                    {{-- <div class="input-group-prepend">--}}
                                    {{-- <span class="input-group-text" id="">Qus ans</span>--}}
                                    {{-- </div>--}}
                                    {{-- <input type="text" class="form-control" name="question_ans[]">--}}
                                    {{-- <input type="radio" name="ans[]" class="form-control">--}}
                                    {{-- </div>--}}
                                    {{-- </div>--}}
                                    {{-- </div>--}}

                                </div>
                            </div>
                            <!-- /.card -->

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.min.css" integrity="sha512-BcFCeKcQ0xb020bsj/ZtHYnUsvPh9jS8PNIdkmtVoWvPJRi2Ds9sFouAUBo0q8Bq0RA/RlIncn6JVYXFIw/iQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/jquery.bootstrap-duallistbox.min.js" integrity="sha512-l/BJWUlogVoiA2Pxj3amAx2N7EW9Kv6ReWFKyJ2n6w7jAQsjXEyki2oEVsE6PuNluzS7MvlZoUydGrHMIg33lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready( function(){
    //Bootstrap Duallistbox
     $('.duallistbox').bootstrapDualListbox()
    })

    $('.summernote').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('details', contents);
            }
        }
    });

    function subjectList(data) {
        var categoryId = $(data).val()
        $.ajax({
            url: "{{url('/admin/category-subject')}}",
            type: "get",
            data: {
                data: categoryId,
            },
            success: function(response) {
                $('#subjectData').html(response)
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }

    function courseList(data) {
        var subjectId = $(data).val();
        $.ajax({
            url: "{{url('/admin/subject-course')}}",
            type: "get",
            data: {
                data: subjectId,
            },
            success: function(response) {

                $('#courseData').html(response)
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });






        $.ajax({
            url: "{{url('/admin/course-question')}}",
            type: "get",
            data: {
                data: subjectId,
            },
            success: function(response) {
                $('#questionListSet').html(response)
                // console.log(response);
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }

    function questionListGet(data) {
        var courseId = $(data).val();
        $.ajax({
            url: "{{url('/admin/course-question')}}",
            type: "get",
            data: {
                data: courseId,
            },
            success: function(response) {
                $('#questionListSet').html(response)
                // console.log(response);
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }

    function addNewQuestion() {
        var question = $('#questionans').html();

        $('#questionList').append(question);
    }

    function submitQuestion() {
        var question_ans_values = []; // Array to store input values
        var ans = []; // Array to store input values
        var question = $("#question").val();

        var category = $('#category').val();
        var subject = $('#subjectData').val();
        var course = $('#courseData').val();

        $('input[name="question_ans[]"]').each(function() {
            question_ans_values.push($(this).val()); // Push input value to the array
        });

        $('input[name="ans[]"]').each(function() {

            if ($(this).is(':checked')) {
                ans.push($(this).val()); // Push value to the array if it's checked
            } else {
                ans.push(0);
            }
        });


        $.ajax({
            url: "{{url('/admin/store-question')}}",
            type: "get",
            data: {
                category: category,
                subject: subject,
                course: course,
                question: question,
                question_ans_list: question_ans_values,
                ans: ans,
            },
            success: function(response) {
                $('#question').val("")
                $('#questionList').html("")
                alert('Successfully Created Question')
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });

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