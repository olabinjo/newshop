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
  					            <h1>Edit Product in Store</h1>
  					            
							</div>
                            
                        
                          <div class="clearfix"></div>
                         </div>
                <div class="x_content">

                 <form method="POST" role="form" action="{{ route('product.store') }}">
                                                      {{ csrf_field() }}
                                                  


                                                  <div class="form-group">
                                                      <label for="name">Product name</label>
                                                        <input type="text" size="20" class="form-control" name="product_name" placeholder="Name">
                                                        @if ($errors->has('product_name'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                            </span>
                                                            @endif
                                                          <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">

                                                        <input type="text" class="form-control input-lg" name="description" value="{{$product->description}}">  
                                                        <br/>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                            @endif
                                                        <input type="text" name="category" class="form-control input-sm" value="{{$product->description}}">
                                                        @if ($errors->has('category'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                            </span>
                                                            @endif
                                                        <input type="hidden" name="store_name" value="{{$store_name}}">

                                                        <br/>
                                                        <input type="text" name="size" class="form-control" placeholder="size">
                                                        @if ($errors->has('size'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('size') }}</strong>
                                                            </span>
                                                            @endif

                                                        <input type="number" name="amount" class="form-control" value="{{$product->amount}}">
                                                        @if ($errors->has('amount'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                            </span>
                                                            @endif

                                                        <div class="input-group">  
                                                          <span class="input-group-addon">GHC</span>
                                                          <input type="number" class="form-control" name="price" value="{{$product->number}}">
                                                          @if ($errors->has('price'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>  
                                                  </div>
                                                        
                                
                                                    <input type="submit" name="submit" value="draft">

                                                    <input type="submit" name="submit" class="btn btn-success" value="publish">

                                                    
      
                                                      <!--<button type="submit" name="submit" class="btn btn-success" value="publish" >Publish</button>-->
        
      
                                                </form>

                

                 



                 

                  

                  
                  
                 

                  

                 
                

                 

                                      
                                        
                    </div><!--End panel tile-->
                  <!--</div>--> 
 	
                </div>

                 
 </div>

</body>




	

@endif
@endsection