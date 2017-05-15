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
                            <h1>Edit your Settings</h1>

                        </div>


                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form role="form" method="post" id="userform" action="">
                            {{ csrf_field() }}


                            <div class="form-group">
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>{!! Session::get('success') !!}</h2>

                                    </div>
                                @endif
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="name">Your Name</label>
                                    <input type="text" size="20" class="form-control col-md-7 col-xs-12"
                                           name="name" value="{{Auth::user()->name}}"
                                           id="name">
                                           <input type="hidden" 
                                           name="id" value="{{Auth::user()->id}}"
                                           id="id">
                                </div>

                                <br/><br/>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                @endif
                                <input type="hidden" name="storeUserID" value="{{ Auth::user()->id }}">
                                
                                


                                <br/><br/>



                                @if ($errors->has('size'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('size') }}</strong>
                                                            </span>
                                @endif
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="number" name="amount" class="form-control"
                                           value="{{Auth::user()->phoneNumber}}" required="required">
                                </div>
                                <br/>
                                <br>
                                @if ($errors->has('phoneNumber'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                                                            </span>
                                @endif
                                <br/>
                                <br/>

                                

                                <div class="input-group col-md-6 col-sm-6 col-xs-12">

                                 <label for="email">Your Email Address</label>

                                    
                                    <input type="text" class="form-control" name="price"
                                           value="{{Auth::user()->email}}" required="required">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                    @endif
                                </div>


                                <br>
                                <br>

                             

                                <input type="submit" name="submit" id="submit" class="btn btn-success btn-large"
                                       value="UPDATE">

                            </div><!--End form group class-->
                        </form> <!--- End form-->

                        <script type="text/javascript">

                            $(document).ready(function () {
                                $('#userform').on('submit', function (e) {
                                    e.preventDefault();
                                    var data = $('#useform').serialize();

                                    saveProductToDB(data);
                                });

                                function saveProductToDB(data) {
                                    $.ajax({
                                        method: "post",
                                        url: "/settings/save/",
                                        data: data,
                                        success: function (response) {
                                            alert(response);
                                        }
                                    })

                                }
                            });
                        </script>



                        <br><br>


                        

                                    

                        

                        

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