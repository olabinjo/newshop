@extends('layouts.app')
<?php $helper = new App\Helper(); ?>
@section('content')

    <body>
    <div class="navbar-wrapper">
        <div class="container">


        </div>
    </div>
    <div class="container">
        <div class="wrapper">
            <h1>{{ ucwords($store_name) }}</h1>
            <div class="row">
                @foreach($products as $product)
                    <?php $productImage = $helper->get_images_by_id($product->id); ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            @if(isset($productImage[0]))<img src="/uploads/{{ $productImage[0]->original_filename }}"
                                                             alt="{{ $product->product_name }}">@endif
                            <div class="caption">
                                <h3>{{ $product->product_name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><a href="#" class="btn btn-primary add-to-cart" role="button" data-product="{{ $product }}">Add
                                        to
                                        Cart</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

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

    <script>
        $(document).ready(function () {
            $(".add-to-cart").unbind('click').click(function () {
                var product_details = JSON.stringify($(this).data('product'));

                $.ajax({
                    method: "post",
                    url: "/ajax/add-to-cart",
                    data: "product=" + product_details + "&_token=" + "{{ csrf_token() }}",
                    success: function (response) {
                        $(this).fadeOut('fast');
                    }
                });

                return false;
            })
        });
    </script>
    </body>

@endsection
