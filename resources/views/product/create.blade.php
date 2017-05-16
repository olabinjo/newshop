@extends('layouts.menu')

@section('scripts')

@endsection

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


                            <div class="form-group">
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>{!! Session::get('success') !!}</h2>

                                    </div>
                                @endif
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="product_name">Product name</label>
                                    <input type="text" size="20" class="form-control col-md-7 col-xs-12"
                                           name="product_name" placeholder="Name of Product" required="required"
                                           id="product_name">
                                </div>

                                <br/><br/>
                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                            </span>
                                @endif
                                <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="store_name" value="{{$store_name}}">
                                <input type="hidden" name="product_images" value="" id="product_images"/>
                                <input type="hidden" name="youtube_id" value="" id="youtube_id"/>
                                


                                <br/><br/>

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="description">Product Description</label>
                                    <textarea class="form-control editor-wrapper placeholderText col-md-7"
                                              contenteditable="true" name="description"
                                              placeholder="Enter Description of Product Here"
                                              required="required"></textarea>
                                    </div>
                                </div>

                                <br/>
                                {{-- <!--<div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true" name="description" placeholder="Enter description of product here"></div> -->--}}
                                {{-- <textarea name="desc" id="descr" style="display:none;"></textarea> --}}
                                <br/>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                            </span>


                                @endif
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="category">Product Category</label>
                                    {{--<input type="text" name="category" class="form-control input-sm"--}}
                                    {{--placeholder="category" required="required">--}}
                                    <select required class="form-control" id="select-category" name="category">
                                        <option value=""></option>
                                        <option value="+">Add New Category</option>

                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="text" name="size" class="form-control"
                                           placeholder="Enter product size here if Applicable">
                                </div>


                                @if ($errors->has('size'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('size') }}</strong>
                                                            </span>
                                @endif
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="amount">Product Amount</label>
                                    <input type="number" name="amount" class="form-control"
                                           placeholder="Enter how many units you have here" required="required">
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
                                    <input type="number" class="form-control" name="price"
                                           placeholder="Enter price of the item here" required="required">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                    @endif
                                </div>


                                <br>
                                <br>

                                <div id="buttons">
                                    <label>
                                        <button id="search-button" disabled onclick="search()" type="button"
                                                class="btn btn-success">
                                            Search You Tube to embed youtube video
                                        </button>

                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#imageModal">
                                            Add Images
                                        </button><!--Button to open image modal-->
                                    </label>

                                    <br/><br/>
                                </div>
                                <div id="search-container">
                                </div>

                                <div id="add-image-container" class="images"></div>


                                <!--<button type="submit" name="submit" class="btn btn-success" value="publish" >Publish</button>-->


                                <input type="submit" name="submit" id="submit" class="btn btn-default btn-large"
                                       value="Draft">

                                <input type="submit" name="submit" id="productform" class="btn btn-success btn-large"
                                       value="Publish">

                            </div><!--End form group class-->
                        </form> <!--- End form-->

                        <script type="text/javascript">

                            $(document).ready(function () {
                                $('#productform').on('submit', function (e) {
                                    e.preventDefault();
                                    var data = $('#productform').serialize();

                                    saveProductToDB(data);
                                });

                                function saveProductToDB(data) {
                                    $.ajax({
                                        method: "post",
                                        url: "/product/save",
                                        data: data,
                                        success: function (response) {
                                            alert(response);
                                        }
                                    })

                                }
                            });
                        </script>

                        <!--Re-Open modal after successful upload of images-->


                        @if(!empty(Session::get('error_code')) && Session::get('error_code')==5)
                            <script>
                                $(function () {
                                    $('imageModal').modal('show');
                                });


                            </script>
                        @endif


                        <br><br>


                        <!-- Modal -->
                        <div id="imageModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">


                                <!-- Modal to display User's images and handle upload of new images -->
                                <div class="modal-content" id="add_image_modal">
                                    <!-- Start modal's header-->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Your Images</h4>
                                       
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


                                            <div class="images" id="image_list_cont">
                                                @foreach($images as $image)
                                                    <img class="image" src="/uploads/{{$image-> original_filename}}"
                                                         width="100px" height="100px" data-id="{{$image->id}}">
                                                @endforeach

                                            </div>

                                            <input type="hidden" name="imageID" id="selectedIDs">


                                            <br/><br>


                                            <div class="form-group">

                                                {!!Form::open(array('url'=>'upload/uploadFiles', 'method'=>'Post','files'=>true, 'required'=>'required', 'target'=>"hidden_upload", 'onsubmit'=>"upload_started()")) !!}
                                                {!! Form::file('images[]', array('multiple'=>true)) !!}

                                                <p>{!! $errors->first('images') !!}</p>
                                                @if(Session::has('error'))

                                                    <p>{!! Session::get('error')!!}</p>

                                                @endif
                                                <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="store_name" value="{{$store_name}}">

                                                {!! Form::submit('Upload', array('class'=>'btn btn-default btn-file')) !!}

                                                <button type="button" class="btn btn-success" id="add_images_to_product"
                                                        data-dismiss="modal">Add to Product
                                                </button>

                                                {!! Form:: close()!!}

                                                <iframe id="hidden_upload" name="hidden_upload"
                                                        style="display:none"></iframe>

                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                    <!--End modal body-->

                                    <!---Start modal footer-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>

                                        <br><br/>
                                    </div>
                                    <!--End modal footer-->
                                </div><!--End content in modal-->
                            </div><!--End modal dialog -->
                        </div><!--- End modal -->

                        <!-- Modal -->
                        <div class="modal fade" role="dialog" id="add_category">
                            <div class="modal-dialog">


                                <!-- Modal to display User's images and handle upload of new images -->
                                <div class="modal-content">
                                    <!-- Start modal's header-->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Category</h4>
                                        
                                    </div>
                                    <!--End modal's header-->
                                    <!--Start modal body-->
                                    <div class="modal-body">


                                        {{ csrf_field() }}

                                        <div class="container">


                                            <div class="form-group">
                                                {!!Form::open(array('url'=>'upload/uploadFiles', 'method'=>'Post', 'required'=>'required',  'onsubmit'=>"upload_started()", 'id'=>'add_category_form')) !!}

                                                <input type="hidden" name="store_name" value="{{$store_name}}">

                                                <input type="text" size="20" class="form-control col-md-7 col-xs-12"
                                                       name="category_name" placeholder="Category" required="required"
                                                       id="category_name">

                                                <br/><br/>
                                                {!! Form::submit('Save', array('class'=>'btn btn-success', 'id'=>'add_category_btn')) !!}


                                                {!! Form:: close()!!}

                                            </div>

                                            <script type="text/javascript">

                                                $(document).ready(function () {
                                                    $('#add_category_form').on('submit', function (e) {
                                                        e.preventDefault();
                                                        var data = $('#add_category_form').serialize();

                                                        saveCategoryToDB(data);
                                                    });

                                                    function saveCategoryToDB(data) {
                                                        $.ajax({
                                                            method: "post",
                                                            url: "/category/save",
                                                            data: data,
                                                            success: function (response) {
                                                                $("#select-category").html(response);
                                                                $("#add_category").modal('hide');

                                                                init();
                                                            }
                                                        })

                                                    }
                                                });
                                            </script>

                                        </div>
                                    </div>
                                    <!--End modal body-->

                                    <!---Start modal footer-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>

                                        <br><br/>
                                    </div>
                                    <!--End modal footer-->
                                </div><!--End content in modal-->
                            </div><!--End modal dialog -->
                        </div><!--- End modal -->

                        <script type="text/javascript">

                            $(document).ready(function () {
                                $('#productform').unbind('submit').submit(function () {
                                    var data = $('#productform').serialize();
                                    saveProductToDB(data);

                                    return false;
                                });

                                function saveProductToDB(data) {
                                    $.ajax({
                                        method: "post",
                                        url: "/product/save",
                                        data: data,
                                        success: function (response) {
                                            alert(response);
                                        }
                                    })
                                }
                            });
                        </script>

                    </div><!--End panel tile-->
                </div>
            </div>

            <script type="text/javascript">
                function init() {
                    var images = document.querySelectorAll('.image');
                    for (var i = 0; i < images.length; i++) {
                        images[i].addEventListener('click', function (e) {
                            var selected = document.querySelectorAll('.image.selected');
                            if (e.target.classList.contains('selected')) {
                                e.target.classList.remove('selected');
                                removeID(e.target.id);
                            }
                            else if (!(selected && selected.length >= 4)) {
                                e.target.classList.add('selected');
                                addID(e.target.id);
                            }
                        });
                    }

                    $("#select-category").change(function () {
                        var selectVal = $("#select-category").val();
                        if (selectVal == "+") {
                            console.log("Add new cateogy");
                            $("#add_category").modal('show');
                        }
                    });
                }


                function addID(id) {
                    var oldValue = document.getElementById('selectedIDs').value;
                    if (oldValue.trim() == "") {
                        document.getElementById('selectedIDs').VALUE = id;

                    } else {
                        document.getElementById('selectedIDs').value = oldValue + ',' + id;
                    }


                }

                function removeID(id) {
                    var ids = document.getElementById('selectedIDs').value.split(',');
                    for (var i = 0; i < ids.length; i++) {
                        if (ids[i] == id) {
                            ids.splice(i, 1);
                        }
                    }
                    var newValue = '';
                    for (var i = 0; i < ids.length; i++) {
                        if (i != length - 1) {
                            newValue = newVlaue + ',';
                        }
                    }
                    document.getElementById('selectedIDs').value = newValue
                }

                function upload_started() {
                    console.log("Upload Stated");
                }
                function upload_completed(response) {
                    $("#image_list_cont").html(response);
                    init();
                }


                // After the API loads, call a function to enable the search box.
                function handleAPILoaded() {
                    $('#search-button').attr('disabled', false);
                }

                // Search for a specified string.
                function search() {
                    var q = $('#query').val();
                    var request = gapi.client.youtube.search.list({
                        q: q,
                        part: 'snippet'
                    });

                    request.execute(function (response) {
                        var str = JSON.stringify(response.result);
                        $('#search-container').html('<pre>' + str + '</pre>');
                    });
                }

            </script>


            <script src="{{ asset('vendors/youtube/auth.js')}}"></script>
            <script src="{{ asset('vendors/youtube/search.js')}}"></script>
            <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>

            <script>
                window.addEventListener('load', function () {
                    init();

                    $("#add_images_to_product").click(function () {
                        $("#add-image-container").html('');
                        var images_array = [];

                        $(".image.selected").each(function () {
                            images_array.push($(this).data('id'));
                            $("#add-image-container").append('<img class="image" src="' + $(this).attr('src') + '" width="100px" height="100px">');
                        });

                        $("#product_images").val(images_array.join());

                    });
                });
            </script>


            </body>
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