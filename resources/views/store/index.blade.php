@extends('layouts.menu')

@section('menu')

@if (Auth::guest())

<p>Please Login</p>

@else
  
<div  style="margin-left: 17%">
        
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-building"></i> Total Stores</span>
              <div class="count">{{$storecount}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Orders</span>
              <div class="count">{{$orders}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-edit"></i> Total Products</span>
              <div class="count green">{{$products}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Revenue</span>
              <div class="count">{{$revenue}} GHC</div>
              
            </div>
            
            
          </div>
          <!-- /top tiles -->

          
          <br />


          


            <div class="col-md-12 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                            <h2>Your Stores</h2>
                        <ul class="nav navbar-right panel_toolbox">
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                    
                    
                    
                        </ul>
                          <div class="clearfix"></div>
                </div>
                <div class="x_content">
                

                  <!--Display stores created by that user -->
                  @if(count($stores)>0)

                  @foreach($stores as $store)
                  <a href="/products/{{$store-> storeName}}"><h2>{{$store-> storeName}}</h2></a>
                 

                  @endforeach

                  @else
                  <p>You have not created any store. Please click the button below to create a store</p>




                  @endif

                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#storeModal">Create A Store</button>
                  <br>
                  <br>

                                      <!-- Modal -->
                                        <div id="storeModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal Storeform to collect and save store name -->
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Add a Store</h4>
                                                </div>
                                            <div class="modal-body">

                                                <form method="POST" role="form" action="{{ route('stores.store') }}">
                                                      {{ csrf_field() }}
                                                  <p>Enter the name of your store</p>


                                                  <div class="form-group">
                                                      <label for="name">Store Name</label>
                                                        <input type="text" class="form-control" name="storeName" placeholder="Name">
                                                          <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">
                                                  </div>
    
      
      
                                                      <button type="submit" class="btn btn-success" >Save</button>
        
      
                                                </form>
        
                                            </div>
                                            <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                  </div>
                            <!--  End of Modal-->
                      </div><!--End div class x content-->
                    </div><!--End panel tile-->
                  </div>
               <!--End Row -->
                
</div>
</body>
                      

              

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
@endif
@endsection