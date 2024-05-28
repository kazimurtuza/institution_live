@inject('AdminDashboard', 'App\Livewire\Admin\AdminDashboard')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Financial Reports</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <form wire:submit.prevent="date_range_filter()" class="dashboard-form flex-ctr-spb">
                  <div class="dashboard-form__fields flex-ctr" style="display: flex;margin-bottom: 25px; justify-content: center; gap: 15px; align-items: flex-end;">


                  <div class="dashboard-form__fields flex-ctr">
                      <span>Start Date</span>
                    <div class="dashboard-form__field">

                      <input type="date"  wire:model="start_range" class="form-control" placeholder="Start Date" />
                     </div>

                  </div>
                  <div class="dashboard-form__fields flex-ctr">
                      <span>End Date</span>
                    <div class="dashboard-form__field">

                      <input type="date"  wire:model="end_range" class="form-control" placeholder="End Date" />
                     </div>

                  </div>


                 <input class="btn btn-primary" type="submit" value="Filter"/>
                  </div>



                </form>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Course</th>
                  <th>Customer</th>
                  <th>Payment Getway</th>
                  <th>Amount</th>
                  <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_data as $data)
                <tr>
                  <td>{{$AdminDashboard->get_course_name($data->course_id)}}</td>
                  <td>{{$AdminDashboard->customer_name($data->customer_id)}}</td>
                  <td>{{$data->payment_getway}}</td>
                  <td>{{$data->course_price}}</td>
                  <td>{{$data->created_at}}</td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Course</th>
                    <th>Customer</th>
                    <th>Payment Getway</th>
                    <th>Amount</th>
                    <th>Created At</th>
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