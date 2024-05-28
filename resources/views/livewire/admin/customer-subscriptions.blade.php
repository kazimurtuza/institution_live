@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Subscriptions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Course Title</th>
                 <th>Customer Name</th>
                  <th>Payment Amount</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$data->title}}</td>
                  <td>{{$AdminDashboard->customer_name($data->customer_id)}}</td>
                  <td>@if($data->payment_type == 'Free') Free @else {{$data->price}} @endif</td>
                  <td>{{$data->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Course Title</th>
                    <th>Customer Name</th>
                    <th>Payment Amount</th>
                    <th>Date</th>
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