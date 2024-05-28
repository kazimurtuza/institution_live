@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Courses</h3>
              <a style="float:right;" href="{{route('admin.add_courses')}}" class="btn btn-success"> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Title</th>
                  <th>Fee</th>
                  <th>Duration</th>
                  <th>Lesson</th>
                  <th>Language</th>
                  <th>Instructor</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$data->title}}</td>
                  <td>@if($data->payment_type == 'Free') Free/scholarship @else {{$data->payment_type}} @endif</td>
                  <td>{{$data->course_duration}}</td>
                  <td>{{$data->lesson}}</td>
                  <td>{{$data->language}}</td>
                  <td>{{$AdminDashboard->instructor_name($data->instructor)}}</td>
                  <td>

                    <a href="{{route('admin.course_update',['course_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('delete.course',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Fee</th>
                    <th>Duration</th>
                    <th>Lesson</th>
                    <th>Language</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
                </tfoot>
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