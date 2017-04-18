@extends('layouts.app')

@section('content')
  
  <body>
    <div class="navbar-wrapper">
      <div class="container">


      </div>
    </div>


    <!-- Carousel-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Sell your Items</h1>
              <p>Create an e-commerce store and easily sell anything you want to. </p>
              <p><a class="btn btn-lg btn-primary" href="/register" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Reach more Customers</h1>
              <p>Allow people outside your area order and purchase your products online</p>
              <p><a class="btn btn-lg btn-primary" href="/register" role="button">Register Now</a></p>
            </div>
          </div>
        </div>
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <br>
    <br>

    <div class="container marketing">

      <!-- Three columns of text highlighting features of the application -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="img/payment.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Accept Payments</h2>
          <p>You never have to worry about payments. GHShop will handle payments via mobile money for you. All you need to do is upload items and set prices. </p>
          <p></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/website.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Themes</h2>
          <p>Choose from responsive and beautifully designed themes for your website. Only 2 themes are currently available. More are coming soon.</p>
          <p><a class="btn btn-default" href="#" role="button">View Sample Theme &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/stores.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Stores</h2>
          <p>With the free trial, you can create as many stores as you want to. One store for clothes, another for mobile phones, as many as you can think of. </p>
          <p></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      
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
