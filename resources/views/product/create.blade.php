@extends('layouts.menu')

@section('menu')


@if (Auth::guest())

<p>Please Login</p>

@else

 <!--Display products in that store -->
 <div style="margin-left: 17%">

 				<div class="row"> 
					<!--<div class="col-md-12 col-sm-12 col-xs-12">-->
                         <div class="x_panel tile">
                          <div class="x_title">
                             <div class="page-header">
  					            <h1>Create A Product</h1>
  					            
							</div>
                            
                        
                          <div class="clearfix"></div>
                         </div>
                <div class="x_content">

                 <form method="POST" role="form" action="{{ route('product.store') }}">
                                                      {{ csrf_field() }}
                                                  


                                                  <div class="form-group">
                                                      <label for="name">Product name</label>
                                                        <input type="text" size="20" class="form-control" name="product_name" placeholder="Name">
                                                          <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">

                                                        <input type="text" class="form-control input-lg" name="description" placeholder="description">  
                                                        <br/>
                                                        <input type="text" name="category" class="form-control input-sm" placeholder="category">
                                                        <input type="hidden" name="store_name" value="{{$store_name}}">

                                                        <br/>
                                                        <input type="text" name="size" class="form-control" placeholder="size">

                                                        <input type="number" name="amount" class="form-control" placeholder="amount">

                                                        <div class="input-group">  
                                                          <span class="input-group-addon">GHC</span>
                                                          <input type="number" class="form-control" name="price" placeholder="price">
                                                        </div>  
                                                  </div>
    
      
      
                                                      <button type="submit" class="btn btn-success" >Publish</button>
        
      
                                                </form>

                

                 



                 

                  

                  
                  
                 

                  

                 
                

                 

                                      
                                        
                    </div><!--End panel tile-->
                  <!--</div>--> 
 	
                </div>

                 
 </div>

</body>




	

@endif
@endsection