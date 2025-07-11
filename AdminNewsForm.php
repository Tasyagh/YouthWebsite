
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Online Information Website For Youth</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin:0px;
  background-color:white;
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}

* {
box-sizing: border-box;
}

input[type=text] {
  width: 100%;
  height: 40px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 18px;
  box-sizing: border-box;
  color: #242423;
  background-color: rgb(240, 239, 237, 0.95);
}

input[type=date] {
  width: 100%;
  height: 40px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 18px;
  box-sizing: border-box;
  color: #242423;
  background-color: rgb(240, 239, 237, 0.95);
}

input[type=checkbox] {
  width: 15px;
  height: 15px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 18px;
  box-sizing: border-box;
  color: #242423;
  background-color: rgb(240, 239, 237, 0.95);
}

input[type=file] {
  height: 40px;
  margin: 8px 0;
  display: inline-block;
  color: #242423;
  font-size: 14px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 16px;
}

input[type=submit] {
  background-color: #004680;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 18px;
  cursor: pointer;
  float: center;
  margin: 20px 0;
  width: 30%;
}

input[type=submit]:hover {
  background-color: #1b3c57;
}

.container {
  border-radius: 5px;
 /* background-color: rgb(207, 206, 202, 0.95); */
  padding: 20px;
  width: 75%;
}



/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}


* {
box-sizing: border-box;
}



.text-block {
  position: absolute;
  bottom: 40px;
  right: 700px;
  background-color: rgb(43, 43, 43, 0.8);
  color: white;
  padding-left: 40px;
  padding-right: 40px;
  font-size: 20px;
}

.show {
  display: block;
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
    /*-webkit-filter: grayscale(90%);*/
   /* filter: grayscale(90%); make all photos black and white */ 
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
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
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
.jumbotron {
    background-color: #2d2d30;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
</style>
</head>


<!--navbar-->
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
   <b><img src="youthLogoo.png" alt="Logo" style="width:80px;height:20px"> ONLINE INFORMATION WEBSITE FOR YOUTH</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="AdminOptionPage.php">HOME</a></li>
        <li><a href="AdminOptionPage.php">ABOUT US</a></li>
        <li><a href="#action">ACTION</a></li>
		<li><a href="index.php">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>


<!--Big header-->
<div class="jumbotron text-center">
  <h1> Create News </h1> 
  <p>Create new news ..</p> 
  <br>
</div>


<!--newsForm-->
<div class="container" align="center">
    <form action="AdminInsertNews.php" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col">
			<label for="title">Title : </label>
			<input type="text" name="newsTitle" placeholder="The title of the news.." required>
		</div>
		<br>
	</div>
	<div class="row">	
		<div class="col">
			<label for="link">Link : </label>
			<input type="text" id="link" name="newsLink" placeholder="Link for the website.." required>
		</div>
		<br>
	</div>
	<div class="row">
		<div class="col">
			<label for="description">Description : </label>
			<div>
			<textarea id="description" name="newsDescription"  style="width: 1000px; height: 200px;" required>
			</textarea>
			</div>
		</div>
		<br>
    </div>
	<div class="row">
		<div class="col">
			<label for="details">Available on: </label>
		</div>
		<div class="col" align="center">
			<input type="date" id="start" name="startDate" style="width:347px;" required>
			<label align="center"> to </label>
			<input type="date" id="end" name="endDate" style="width:347px;" required>
		</div>
		<br>
	</div>
	
	<div class="row">
		<div class="col">
		<label for="categoryTag">Category Tag : </label>
		<select name="category" class="form-control" required> 
			<option value="">--Please Select Category--</option>
			<option value="Arts, Audio and Communication Technology">Arts, Audio and Communication Technology</option>
			<option value="Business and Marketing">Business and Marketing</option>
			<option value="Architecture and Construction">Architecture and Construction</option>
			<option value="Human Services">Human Services</option>
			<option value="Information Technology (IT)">Information Technology (IT)</option>
			<option value="Logistic">Logistic</option>
			<option value="Agriculture">Agriculture</option>
			<option value="Transportation">Transportation</option>
			<option value="Manufacturing">Manufacturing</option>
		</select>
		</div>
		<br>
	</div>

		
	
	<div class="row">
        <div class="col" align="center">
			<label for="upload">Add photo : </label>
			<center><input type="file" name="image" id="image" / required></center>
			</div>
	</div>
	<div class="row">
		<input type="submit" name="create_news" value="POST">
	</div>
	
	</form>
</div>


<!-- Container (action) -->
<div id="action" class="bg-1" align="center">
  <div class="container">
    <h3 class="text-center">ADMIN</h3> <br>
    <p class="text-center"><em>SELECT WHAT TO DO :</em></p><br>
        
    <div class="col-md-12 form-group" >
      <button class="btn pull-center" type="submit" style="width:900px" ><a style="color:grey;font-size:20px;" href="AdminNewsView.php">VIEW NEWS</button>
    </div>
      
    <div class="col-md-12 form-group" >
      <button class="btn pull-center" type="submit" style="width:900px" ><a style="color:grey;font-size:20px;" href="AdminViewYouthData.php">VIEW YOUTH DATA</button>
    </div><br><br>
  </div>
</div>




<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>


</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#create').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 
