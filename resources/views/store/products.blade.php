@extends('layouts.menu')

@section('menu')




@if (Auth::guest())

<p>Please Login</p>

@else

 <!--Display products in that store -->
 <div style="margin-left: 17%">

 				<div class="row"> 
					<!--<div class="col-md-12 col-sm-12 col-xs-12">-->
                         <div class="x_panel tile fixed_height_320">
                          <div class="x_title">
                             <div class="page-header">
  					            <h1>Products</h1>
  					            <button type="button" class="btn btn-info btn-lg"><a href="/{{$store_name}}/create">Create A Product</a></button>
  					            
							</div>
                            
                        
                          <div class="clearfix"></div>
                         </div>
                <div class="x_content">

                <table class="table table-striped">



                <thead> 

                <th>Product Name</th>
                <th>Product Price</th>
                <th>Category</th>
                <th>Date Updated</th>
                <th>Date Created</th>
                <th>Status</th>

                 </thead>

                 <hr>

                 <tbody>



                 @foreach($products as $product)

                 

                 
                 <tr>
                 	
                 <td>{{$product-> product_name}} </td>
                 <td>{{$product-> price}} </td>
                 <td>{{$product-> category}} </td>
                 <td>{{$product-> amount}} </td>
                 <td>{{$product-> updated_at}} </td>
                 <td>{{$product-> created_at}} </td>
                 <td>{{$product-> status}} </td>
                 <td><a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-warning"><span class="fa fa-edit"></span></a></td>


                 </tr>
                 @endforeach
                 	


                 </tbody>



                </table>

                 



                 

                  

                  
                  
                 

                  

                  
                

                 

                                      
                                        
                    </div><!--End panel tile-->
                  <!--</div>--> 
 	
                </div>

                 
 </div>

</body>




	<!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}} " rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css')}}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('endors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js')}}"></script>

  @endif
@endsection