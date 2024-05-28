
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Testimonials</h3>
              <a style="float:right;" href="{{route('admin.add_testimonial')}}" class="btn btn-success"> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Pic</th>
                 <th>Name</th>
                  <th>Designation</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th>Rating</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td><img width="50" src="{{ asset('storage/app/public/' .$data->pic) }}" alt="" /></td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->designation}}</td>
                  <td>{{$data->title}}</td>
                  <td>{!! Str::of($data->details)->words(10, ' >>>') !!}</td>
                  <td>{{$data->rating}}</td>
                  <td>

                    <a href="{{route('admin.testimonial_update',['test_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('delete.testimonial',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Pic</th>
                 <th>Name</th>
                  <th>Designation</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th>Rating</th>
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