<!DOCTYPE html>
  <html lang="en">
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>
      Online Information Website For Youth
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      body {
        font: 400 15px/1.8 Lato, sans-serif;
        color: #777;
      }
      h3, h4 {
        margin: 10px 0 30px 0;
        letter-spacing: 10px;      
        font-size: 20px;
        color: #111;
      }
      .container {
        padding: 80px 120px;
      }
      .person {
        border: 10px solid transparent;
        margin-bottom: 25px;
        width: 80%;
        height: 80%;
        opacity: 0.7;
      }
      .person:hover {
        border-color: #f1f1f1;
      }
      .carousel-inner img {
        width: 100%; /* Set width to 100% */
        margin: auto;
      }
      .carousel-caption h3 {
        color: #fff !important;
      }
      @media (max-width: 600px) {
        .carousel-caption {
          display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
        }
      }
      .bg-1 {
        background: #2d2d30;
        color: #bdbdbd;
      }
      .bg-1 h3 {
        color: #fff;
      }
      .bg-1 p {
        font-style: italic;
      }
      .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
      }
      .list-group-item:last-child {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
      }
      .thumbnail p {
        margin-top: 15px;
        color: #555;
      }
      .btn {
        padding: 10px 20px;
        background-color: #333;
        color: #f1f1f1;
        border-radius: 0;
        transition: .2s;
      }
      .btn:hover, .btn:focus {
        border: 1px solid #333;
        background-color: #fff;
        color: #000;
      }
      .modal-header, h4, .close {
        background-color: #333;
        color: #fff !important;
        text-align: center;
        font-size: 30px;
      }
      .modal-header, .modal-body {
        padding: 40px 50px;
      }
      .nav-tabs li a {
        color: #777;
      }
      #googleMap {
        width: 100%;
        height: 400px;
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
      }  
      .navbar {
        font-family: Montserrat, sans-serif;
        margin-bottom: 0;
        background-color: #2d2d30;
        border: 0;
        font-size: 11px !important;
        letter-spacing: 4px;
        opacity: 0.9;
      }
      .navbar li a, .navbar .navbar-brand { 
        color: #d5d5d5 !important;
      }
      .navbar-nav li a:hover {
        color: #fff !important;
      }
      .navbar-nav li.active a {
        color: #fff !important;
        background-color: #29292c !important;
      }
      .navbar-default .navbar-toggle {
        border-color: transparent;
      }
      .open .dropdown-toggle {
        color: #fff;
        background-color: #555 !important;
      }
      .dropdown-menu li a {
        color: #000 !important;
      }
      .dropdown-menu li a:hover {
        background-color: red !important;
      }
      footer {
        background-color: #2d2d30;
        color: #f5f5f5;
        padding: 32px;
      }
      footer a {
        color: #f5f5f5;
      }
      footer a:hover {
        color: #777;
        text-decoration: none;
      }  
      .form-control {
        border-radius: 0;
      }
      textarea {
        resize: none;
      }

    </style>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
        
            <a class="navbar-brand" href="#myPage"> 
              <b>
                <img src="youthLogoo.png" alt="Logo" style="width:80px;height:20px"> ONLINE INFORMATION WEBSITE FOR YOUTH
              </b>
            </a>
          </div>

          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#myPage">HOME</a></li>
              <li><a href="#aboutUs">ABOUT US</a></li>
              <li><a href="#login">LOG IN</a></li>
            </ul>
          </div>

        </div>
      </nav>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="b4.jpg" alt="New York" width="1200" height="700">
              <div class="carousel-caption">
                <h3>YOUTH MALAYSIA</h3>
                <p>"The future of the world belong to the youth of the world", Tomm Mann</p>
              </div>      
            </div>

            <div class="item">
              <img src="b2.jpg" alt="Chicago" width="1200" height="700">
              <div class="carousel-caption">
                <h3>YOUTH MALAYSIA</h3>
                <p>We have a powerfull potentional in out youth, and we must have the courage to change old ideas and practices
            so that we may direct their power towards good end", Mary McLeod Bethune</p>
              </div>       
            </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>

      <!-- Container (About us) -->
      <div id="aboutUs" class="container text-center">
        <h3>
          ABOUT US
        </h3>
        <p>
          <em>
            A platform for youth to get new information about their category
          </em>
        </p>
        <p style="font-size:20px;">
          Online Information Website for Youth help youth to register their data online and find the information that they really wants based on their category and fields. 
          Online Information Website for Youth let users to register their information and select the category.
          Soon after that, user can get all their information about their field in this website.
          The information will be sent to their phone number as an email to get them notified.
        </p> 
      </div>

      <!-- Container (Log in) -->
      <div id="login" class="bg-1">
        <div class="container">

          <h3 class="text-center">
            LOG IN
          </h3>
          <br>

          <p class="text-center">
            <em>
              Log in and sign up with us to continue
            </em>
          </p>
          <br>
            
          <div class="col-md-12 form-group" >
            <button class="btn pull-center" type="submit" style="width:900px" >
              <a style="color:grey;font-size:20px;" href="YouthLogIn.php">
                Log In as Youth
              </a>
            </button>
          </div>
          
          <div class="col-md-12 form-group" >
            <button class="btn pull-center" type="submit" style="width:900px" >
              <a style="color:grey;font-size:20px;" href="AdminLoginpage.php">
                Log In as Admin
              </a>
            </button>
          </div>

        </div><br><br>
      </div>

      <script>
        $(document).ready(function()
        {
          $('[data-toggle="tooltip"]').tooltip(); 
          $(".navbar a, footer a[href='#myPage']").on('click', function(event) 
          {
            if (this.hash !== "") 
            {
              event.preventDefault();
              var hash = this.hash;
              $('html, body').animate(
              {
                scrollTop: $(hash).offset().top
              }
              , 900, function()
              {
                window.location.hash = hash;
              });
            }
          });
        })
      </script>

    </body>
</html>
