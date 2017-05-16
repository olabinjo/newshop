@extends('layouts.storemenu')
<?php $helper = new App\Helper(); ?>
@section('content')

    <body>
    <div class="container"> 
    <div class="navbar-wrapper">
    <ul class="nav nav-pills">
    <li role="presentation"><a href="/{{$store_name}}" class="active">Home</a></li>
    @foreach($categorys as $category)
    <li role="presentation" ><a href="/{{$category->store_name}}/{{$category->name}}/">{{$category->name}}</a>      </li>
        @endforeach
            </ul>
        

        


        
    </div>
    </div>

    
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <h1>{{ ucwords($store_name) }} - {{ $product->product_name }}</h1>


                <?php $productImage = $helper->get_images_by_id($product->id); ?>
                
                    <div class="col-xs-4 col-md-2">

                     

                     <div class="row"> 
                        @foreach($images as $image)<img src="/uploads/{{ $image->original_filename }}"
                                                         alt="{{ $product->product_name }}"
                                                         class="thumbnail img-responsive img-circle" width="300px" height="300px">
                     </div>    
                     @endforeach 


                     <iframe width="854" height="480" src="https://www.youtube.com/embed/{{$product->youtube_id}}" frameborder="0" allowfullscreen></iframe>

                 <div class="container">                                   

                    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{$product->product_name}}</h3>
  </div>
  <div class="panel-body">
    {{ $product->description }}
    <p>Price: GHC {{$product->price}}</p>
  </div>

  <p><a href="#" class="btn btn-primary add-to-cart" role="button" data-product="{{ $product }}">Add
                                to
                                Cart</a></p>
</div>

</div> 
                        

                   

                </div>
            @endforeach


        </div>
    </div>

    <br/>
    <br/>
    <span></span>

    <div class="container">

        <h4>Related Products</h4>

        @foreach($relateds as $related)
            <?php $productImage = $helper->get_images_by_id($related->id); ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    @if(isset($productImage[0]))<img src="/uploads/{{ $productImage[0]->original_filename }}"
                                                     alt="{{ $related->product_name }}">@endif


                    <div class="caption">
                        <h3>
                            <a href="/{{$store_name}}/{{$related->category}}/{{$related->id}}">{{ $product->product_name }}</a>
                        </h3>
                        <h3>Price: GHC{{ $product->price }}</h3>

                    </div>
                </div>
            </div>
        @endforeach

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
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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