<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Question</h3>
                        <a style="float:right;" href="{{route('admin.add_question')}}" class="btn btn-success"> Add
                            New</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Type</th>
                                <th>Subject</th>
                                <th>Question</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($question as $key=>$data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->categoryInfo->name}}</td>
                                    <td>{{$data->subjectInfo->name}}</td>
                                    <td>{{$data->question}}</td>
                                    <td>

                                        <a href="{{route("edit.question",['question_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure?')"
                                           href="{{route('delete.question_list',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
{{--                            <tfoot>--}}
{{--                            <tr>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Details</th>--}}
{{--                                <th>Created At</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
