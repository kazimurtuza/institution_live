
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Contact Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$data->fname}}</td>
                  <td>{{$data->lname}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->subject}}</td>
                  <td>{{$data->created_at}}</td>
                  <td><a href="{{route('admin.view_more_contact',['contact_id'=>$data->id])}}" class="btn btn-primary">View More</a></td>
                  
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Created At</th>
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