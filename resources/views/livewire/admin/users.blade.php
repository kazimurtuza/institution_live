<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Name</th>
                  <th>Email</th>
                  <th>Email Verified at</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->email_verified_at}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>@if($data->status == 0) Active @else Blocked @endif</td>
                  <td>
                    @if($data->status == 0)
                    <a onclick="confirm('Are You Sure ?')|| event.stopImmediatePropagation()" href="{{ route('user_block', $data->id) }}" class="btn btn-danger">Block</a>
                  @else
                  <a onclick="confirm('Are You Sure ?')|| event.stopImmediatePropagation()" href="{{ route('user_unblock', $data->id) }}" class="btn btn-success">UnBlock</a>
                  @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                  <th>Email</th>
                  <th>Email Verified at</th>
                  <th>Created at</th>
                  <th>Status</th>
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