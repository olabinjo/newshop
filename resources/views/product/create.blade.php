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

                 <form role="form" method="post" id="productform" action="">
                                                      {{ csrf_field() }}
                                                  


                                                  <div class="form-group" >
                                                      @if(Session::has('success'))
                                      <div class="alert-box success">
                                       <h2>{!! Session::get('success') !!}</h2>
          
                                      </div>
                                    @endif
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
                                                          <input type="hidden" name="store_name" value="{{$store_name}}">

                                                          {{$store_name}}

                                                         

                                                        


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

                                                        

                                                        
                  <br>
                  <br>

                                                  
                                                    <input type="submit" name="submit" id="submit" class="btn btn-default"value="draft">

                                                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="publish">

                                                    
      
                                                      <!--<button type="submit" name="submit" class="btn btn-success" value="publish" >Publish</button>-->
        
      
                                              

                                    

                  </div><!--End form group class-->
                  </form> <!--- End form-->

                   <script type="text/javascript">


                   $('#productform').on('click', function(e) {
  e.preventDefault();

  var data = $('#form').serialize();

  saveProductToDB(data);
});

function saveProductToDB(data){

  

$(function() {
    $.ajax({
      method: "post",
      url: "/product/store",
      data: {
        _token: $('meta[name=csrf-token]').attr('content'),
        product_name: product_name,
                 description: description,
                 category: category,
                 size: size,
                 amount: amount,
                 price: price,
                 submit: submit,
                 store_name:store_name,
      },
      success: function(response) {
        alert(response);
      }
    })
  }
                           
}
</script>

                    <!--Re-Open modal after successful upload of images-->


                                    @if(!empty(Session::get('error_code'))&&Session::get('error_code')==5)
                                    <script>
                                    $(function(){
                                        $('imageModal').modal('show');


                                     });
                                      


                                    </script>
                                    @endif

                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#imageModal">Add Images</button><!--Button to open image modal-->

                                                  <br><br>



                                      <!-- Modal -->
                                        <div id="imageModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">



                                        

                                          <!-- Modal to display User's images and handle upload of new images -->
                                          <div class="modal-content">
                                              <!-- Start modal's header-->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Your Images</h4>
                                                    {{$store_name}}
                                                </div>
                                                <!--End modal's header-->
                                                <!--Start modal body-->
                                                        <div class="modal-body">

                                                      
                                                      {{ csrf_field() }}

                                                      <div class="container">
                                          @if(Session::has('success'))
                                      <div class="alert-box success">
                                       <h2>{!! Session::get('success') !!}</h2>
          
                                      </div>
                                    @endif

                                   
                                   <div class="images">
                                     

                                   

                       @foreach($images as $image)

                       

                       

                       


                      <img class="image" src="/uploads/{{$image-> original_filename}}" width="100px" height="100px">
                      





                       


                       


                       @endforeach

                       </div>

                       <input type="hidden" name="imageID" id="selectedIDs">



                       

                       <br/><br>

                       
        

                                    <div class="form-group">
                                  
                                {!!Form::open(array('url'=>'upload/uploadFiles', 'method'=>'Post','files'=>true, 'required'=>'required')) !!}
                                  {!! Form::file('images[]', array('multiple'=>true)) !!}

                                <p>{!! $errors->first('images') !!}</p>
                                @if(Session::has('error'))

                                <p>{!! Session::get('error')!!}</p>

                                @endif
                                <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="store_name" value="{{$store_name}}">




                              {!! Form::submit('Upload', array('class'=>'btn btn-default btn-file')) !!}

                              <button type="submit" class="btn btn-success" >Add to Product</button>

                              {!! Form:: close()!!}
        


                                  </div>

      </div>
  
                                                  


                                                        
    
      
      
                                                      
        
      
                                                    </form>
        
                                                  </div>

                                            <!--End modal body-->

                                                          <!---Start modal footer-->
                                                          <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                          <br><br/>
                                                          </div>
                                                          <!--End modal footer-->
                                                  </div><!--End content in modal-->
                                                  </div><!--End modal dialog -->
                                                  </div><!--- End modal -->


                  
                                
                                                    

                

                 



                 

                  

                  
                  
                 

                  

                 
                

                 

                                      
                                        
                    </div><!--End panel tile-->
                  
 	
                </div>

                 
 </div>



 <script type="text/javascript">
                       window.addEventListener('load', function(){

                        var images = document.querySelectorAll('.image');
                        for(var i=0; i < images.length; i++){
                           images[i].addEventListener('click', function(e){
                             var selected = document.querySelectorAll('.image.selected');


                             if(e.target.classList.contains('selected')){

                               e.target.classList.remove('selected');
                               removeID(e.target.id);
                             }

                             else if(!(selected && selected.length >= 4)){

                               e.target.classList.add('selected');
                               addID(e.target.id);

                      




                             }


                           });
                        }


                       });

                       function addID(id){
                        var oldValue = document.getElementByID('selectedIDs').value;
                        if(oldValue.trim() ==""){
                            document.getElementByID('selectedIDs').VALUE = id;

                        } else{
                            document.getElementByID('selectedIDs').value = oldValue + ',' +id;
                        }

                         
                        }

                        function removeID(id){
                           var ids = document.getElementByID('selectedIDs').value.split(',');
                           for(var i=0; i < ids.length; i++){
                                if(ids[i] == id){
                                   ids.splice(i,1);
                                }
                           }
                           var newValue = '';
                           for (var i = 0; i < ids.length; i++) {
                             if(i != length-1){
                              newValue = newVlaue + ',';
                             }
                           }
                           document.getElementByID('selectedIDs').value = newValue
                        }

                       </script>
                       

</body>

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



	

@endif
@endsection