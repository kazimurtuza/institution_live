<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total_users}}</h3>

              <p>Total Active Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/all-users" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$total_courses}}</h3>

              <p>Total Active Courses</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/admin/all-courses" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$total_subscribed}}</h3>

              <p>Total No of Subcription</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/customer_subscriptions" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Aud {{$total_amount_received}}</h3>
  
                <p>Total Payment Received</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/admin/financial-reports" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <!-- /.row -->
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>