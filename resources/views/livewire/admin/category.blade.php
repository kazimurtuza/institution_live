@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Types</h3>
              <a style="float:right;" href="{{route('admin.add_category')}}" class="btn btn-success"> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Name</th>
                  <th>Details</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{!! Str::of($data->details)->words(10, ' >>>') !!}</td>
                  <td>{{$data->created_at}}</td>
                  <td>

                    <a href="{{route('admin.category_update',['cat_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('delete.category',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
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

