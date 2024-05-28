
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              
                <tbody>
                    <tr>
                        <th>First Name</th>
                        <td>{{$contact_details->fname}}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{$contact_details->lname}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$contact_details->email}}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{$contact_details->subject}}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{$contact_details->message}}</td>
                    </tr>
                    
                </tbody>
               
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