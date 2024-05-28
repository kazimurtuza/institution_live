<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Question </h3>
                    </div>

                    <div>

                        <div class="card">
                            <form method="post" action="{{route("update.data.store")}}">
                                @csrf
                            <div class="card-header">

                                <input type="hidden" name="correct_ans" value="{{$correct_ans}}" id="correct" >
                                <input type="hidden" name="question_id" value="{{$id}}" id="correct" >

                                    <div class="form-row">
                                        <div class="col">

                                            <select name="category" class="form-control" id="category" onchange="subjectList(this)">
                                                <option value="">SELECT CATEGORY</option>
                                                @foreach($categories as $value)
                                                    <option value="{{$value->id}}" @if($question_info->category==$value->id) selected @endif>{{$value->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="subject" class="form-control" id="subjectData" onchange="courseList(this)">
                                                <option value="">SELECT SUBJECT</option>
                                            </select>
                                        </div>

                                        {{--                                        <div class="col">--}}
                                        {{--                                            <select name="" class="form-control" id="courseData">--}}
                                        {{--                                                <option value="">SELECT CATEGORY</option>--}}
                                        {{--                                            </select>--}}
                                        {{--                                        </div>--}}
                                    </div>

                            </div>
                            <div class="card-body">
                                <div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Question Title</label>
                                            <input type="text" class="form-control" name="question" value="{{$question_info->question}}" id="question">
                                        </div>

                                        <div id="questionList">
                                            @foreach($question_option_list as $option)
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="">Qus ans</span>
                                                </div>
                                                <input type="text" value="{{$option->option}}" class="form-control" name="question_ans[{{$option->id}}]">
                                                <input type="radio" name="ans[]"  onclick="selectCorectAns({{$option->id}})" class="form-control" @if($option->is_true==1) checked  @endif>
                                            </div>
                                            @endforeach
                                        </div>

{{--                                        <div class="d-flex justify-content-center mt-3">--}}
{{--                                            <span class="btn btn-success" onclick="addNewQuestion()">Add Question Option</span>--}}
{{--                                        </div>--}}

{{--                                        <div> <span class="btn btn-success" onclick="submitQuestion()">Save</span></div>--}}
                                    <br>
                                        <div> <button type="submit" class="btn btn-success">Submit</button></div>

                                </div>

                            </div>
                            </form>

                        <div style="display: none" id="questionans">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Qus ans</span>
                                </div>
                                <input type="text" class="form-control" name="question_ans_new[]">
                                <input type="radio" name="ans_new[]" class="form-control">
                            </div>
                        </div>
                        </div>
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

        function selectCorectAns(data){
            $('#correct').val(data)
        }

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
                    $('#subjectData').html(response)
                },
                error: function(xhr) {
                    //Do Something to handle error
                }});
        }

        $.ajax({
            url: "{{url('/admin/category-subject')}}",
            type: "get",
            data: {
                data:{{$question_info->category}},
            },
            success: function(response) {
                $('#subjectData').html(response)
            },
            error: function(xhr) {
                //Do Something to handle error
            }});

        function courseList(data){
            var subjectId=$(data).val();
            $.ajax({
                url: "{{url('/admin/subject-course')}}",
                type: "get",
                data: {
                    data:subjectId,
                },
                success: function(response) {

                    $('#courseData').html(response)
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
            var currectAns=false;
            var question=$("#question").val();

            var category=$('#category').val();
            var subject=$('#subjectData').val();
            var course=$('#courseData').val();

            $('input[name="question_ans[]"]').each(function() {
                question_ans_values.push($(this).val()); // Push input value to the array
            });

            $('input[name="ans[]"]').each(function() {

                if ($(this).is(':checked')) {
                    currectAns=$(this).val();
                    ans.push($(this).val()); // Push value to the array if it's checked
                }else{
                    ans.push(0);
                }
            });
            if(!currectAns){
                alert('First Select Correct Ans');
                return false;
            }


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

    </script>

@endpush
