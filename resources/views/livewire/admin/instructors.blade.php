
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Instructors</h3>
              <a style="float:right;" href="{{route('admin.add_instructor')}}" class="btn btn-success"> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Pic</th>
                 <th>Name</th>
                 <th>Specialization</th>
                 <th>Location</th>
                  <th>About Info</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td><img width="50" src="{{ asset('storage/app/public/' .$data->pic) }}" alt="" />
                    </td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->specialization}}</td>
                  <td>{{$data->location}}</td>
                  <td>{!! Str::of($data->details)->words(10, ' >>>') !!}</td>
                  <td>

                    <a href="{{route('admin.instructor_update',['ins_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('delete.instructor',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Pic</th>
                  <th>Name</th>
                  <th>Specialization</th>
                  <th>Location</th>
                   <th>About Info</th>
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