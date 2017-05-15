@extends('layouts.app')
<?php $helper = new App\Helper(); ?>
@section('content')

    <body>
    <div class="navbar-wrapper">
        <div class="container">


        </div>
    </div>
    <div class="container">
        <h1>My Cart</h1>
        <div class="wrapper">
            <div class="row">
                <?php $price = 0; ?>
                @foreach($cart as $c)
                    <?php $price += $c->price; ?>
                    <?php $productImage = $helper->get_images_by_id($c->id); ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            @if(isset($productImage[0]))<img src="/uploads/{{ $productImage[0]->original_filename }}"
                                                             alt="{{ $c->product_name }}">@endif
                            <div class="caption">
                                <h3>{{ $c->product_name }}</h3>
                                <p>{{ $c->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <button type="button" class="btn btn-danger" onclick="checkout()"> Checkout</button>
                </div>

                <form>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                </form>

                <script>
                    function checkout() {
                        $("#checkout_modal").modal('show');
                    }
                    function payWithPaystack() {
                        var d = new Date();
                        var n = d.getTime();
                        var handler = PaystackPop.setup({
                            key: 'pk_test_f910bca3507b8df0e2e652ff8237034cbd6be765',
                            email: $("#buyer_email").val(),
                            amount: '<?php echo($price * 100) ?>',
                            ref: n,
                            metadata: {
                                custom_fields: [
                                    {
                                        display_name: "Mobile Number",
                                        variable_name: "mobile_number",
                                        value: "+2348012345678"
                                    }
                                ]
                            },
                            callback: function (response) {
                                var ref = response.reference;
                                $.ajax({
                                    method: "get",
                                    url: "/ajax/order",
                                    success: function (response) {
                                        alert('success. transaction ref is ' + ref);
                                        $("#checkout_modal").modal('hide');
                                    }
                                });
                            },
                            onClose: function () {
                                alert('window closed');
                            }
                        });
                        handler.openIframe();
                    }
                </script>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="checkout_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal to display User's images and handle upload of new images -->
            <div class="modal-content" id="checkout_modal_content">
                <!-- Start modal's header-->
                <div class="modal-header">
                    <h4 class="modal-title">Details</h4>
                </div>
                <!--End modal's header-->
                <!--Start modal body-->
                <div class="modal-body">

                    {{ csrf_field() }}

                    <div class="container">
                        <form id="pay" method="post">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="product_name">Name</label>
                                    <input type="text" size="20" class="form-control"
                                           name="buyer_name" placeholder="Name" required="required"
                                           id="buyer_name">

                                    <label for="product_name">Email</label>
                                    <input type="text" size="20" class="form-control"
                                           name="buyer_email" placeholder="Email" required="required"
                                           id="buyer_email">

                                    <label for="product_name">Phone Number</label>
                                    <input type="text" size="20" class="form-control"
                                           name="buyer_phone_number" placeholder="Phone Number" required="required"
                                           id="buyer_phone_number">


                                    <button type="button" class="btn btn-danger" onclick="payWithPaystack()"> Pay
                                    </button>
                                </div>
                            </div>
                        </form>

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


    <div class="container marketing">
        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2016 GH Shop &middot; </p>
        </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

@endsection
