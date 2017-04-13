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
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <label for="product_name">Product name</label>
                                                        <input type="text" size="20" class="form-control col-md-7 col-xs-12" name="product_name" placeholder="Name of Product" required="required">
                                                        </div>

                                                        <br/><br/>
                                                        @if ($errors->has('product_name'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                            </span>
                                                            @endif
                                                          <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">

                                                          <br/><br/>

                                                          
                                                        <label for="description">Product Description</label>
                                                        <input type="text" class="form-control input-lg editor-wrapper placeholderText" contenteditable="true" name="description" placeholder="Enter Description of Product Here" required="required">  
                                                        <br/>
                                                        <!--<div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true" name="description" placeholder="Enter description of product here"></div>-->
                                                        <textarea name="desc" id="descr" style="display:none;" ></textarea>
                                                        <br/>
                                                        
                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                            </span>


                                                            @endif
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="category">Product Category</label>
                                                        <input type="text" name="category" class="form-control input-sm" placeholder="category" required="required">
                                                        </div>
                                                        <br/>
                                                        @if ($errors->has('category'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                            </span>
                                                            @endif
                                                        <input type="hidden" name="store_name" value="{{$store_name}}">

                                                        <br/><br>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label for="name">Product Size</label>
                                                        <input type="text" name="size" class="form-control" placeholder="Enter product size here if Applicable">
                                                        </div>
                                                    

                                                        @if ($errors->has('size'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('size') }}</strong>
                                                            </span>
                                                            @endif
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="amount">Product Amount</label>
                                                        <input type="number" name="amount" class="form-control" placeholder="Enter how many units you have here" required="required">
                                                        </div>
                                                        <br/>
                                                        <br>
                                                        @if ($errors->has('amount'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                            </span>
                                                            @endif


                                                            <label for="price">Product Price</label>

                                                        <div class="input-group col-md-6 col-sm-6 col-xs-12">  
                                                        
                                                          <span class="input-group-addon">GHC</span>
                                                          <input type="number" class="form-control" name="price" placeholder="Enter price of the item here" required="required">
                                                          
                                                          @if ($errors->has('price'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>  

                                                        <label class="btn btn-default btn-file">
                                                        Add Images <input type="file" style="display: none;">
                                                        </label>

                                                        <br><br/>

                                                        
                                                  </div>
                                                        
                                
                                                    <input type="submit" name="submit" class="btn btn-default"value="draft">

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