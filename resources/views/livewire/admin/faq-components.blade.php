@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Faq</h3>
              <a style="float:right;" href="{{route('admin.faq_component_add')}}" class="btn btn-success"> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Category</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$AdminDashboard->get_faq_category_name($data->cat_name)}}</td>
                  <td>{{$data->question}}</td>
                  <td>{{$data->answer}}</td>
                  <td>

                    <a href="{{route('admin.faq_component_update',['faq_id'=>$data->id])}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('delete.faq',['post_id'=>$data->id])}}" class="btn btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Category</th>
                  <th>Question</th>
                  <th>Answer</th>
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