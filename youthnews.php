<?php require_once 'connect.php'; ?>
<?php 

  if (!isset($_SESSION['username'])) 
  {
      $_SESSION['msg'] = "You must log in first";
      header('location: YouthLogIn.php');
  }

  if (isset($_GET['logout'])) 
  {
      session_destroy();
      unset($_SESSION['username']);
      header("location: FirstPage.php");
  }

  // Get user data
  $currentUser = $_SESSION['username'];
  $userQuery = "SELECT category, subscribed FROM youth WHERE username = '$currentUser'";
  $userResult = mysqli_query($db, $userQuery);
  $userData = mysqli_fetch_assoc($userResult);
  $userCategory = $userData['category'];

  // Set default filter to user's category
  $activeCategory = $userCategory;

  // Check if category filter is set in URL
  if(isset($_GET['category'])) {
      if($_GET['category'] == '') {
          $activeCategory = ''; // Show all categories
      } else {
          $activeCategory = $_GET['category'];
      }
  }

  // Build WHERE clause
  if($activeCategory == '') {
      $categoryFilter = ""; // Show all categories
  } else {
      $categoryFilter = "WHERE category = '".mysqli_real_escape_string($db, $activeCategory)."'";
  }
  
  // Handle subscription nutton changes
  if (isset($_POST['toggle_subscription'])) 
  {
    $newStatus = $userData['subscribed'] ? 0 : 1;
    $updateQuery = "UPDATE youth SET subscribed = $newStatus WHERE username = '$currentUser'";
    mysqli_query($db, $updateQuery);
    $_SESSION['message'] = $newStatus ? "You have successfully subscribed!" : "You have unsubscribed to the news!";
    $_SESSION['msg_type'] = $newStatus ? "success" : "info";
    header("location: ".$_SERVER['PHP_SELF']);
    exit();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Online Information Website for Youth</title>

    <style>

      h3, h4 {
        margin: 10px 0 30px 0;
        letter-spacing: 10px;      
        font-size: 20px;
        color: #111;
      }

      h5 {    
        font-size: 20px;
        color: #111;
        border-bottom: 2px solid #2d2d30;
        padding-bottom: 2px;
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
        width: 100%;
        margin: auto;
      }

      .carousel-caption h3 {
        color: #fff !important;
      }

      @media (max-width: 600px) {
        .carousel-caption {
          display: none;
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
        color: #fff;
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

    .form-control#category {
        height: 38px;
        max-width: 100%;
        padding: 6px 12px;
        font-size: 14px;
    }
        
      textarea {
        resize: none;
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

      .main {
        margin: auto;
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse; 
        width: match-parent;
      }

      td, th {
        border: 2px solid white;
        text-align: center;
        padding: 12px;
      }

      th {  
        color:white;
      }

      td {
        background-color:rgba(252, 252, 252, 0.8);
      }

      input[type=number]{
        width:30%;
        padding: 8px;
      }

      img {
        width : 800px;
        height : 300px;
      }

      .alert {
        font-size : 18px;
        text-align : center;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
      }

      .alert-success {
        background-color: #dff0d8;
        border-color: #d6e9c6;
        color: #3c763d;
      }

      .alert-info {
        background-color:rgb(247, 217, 217);
        border-color:rgb(241, 188, 188);
        color: #a94442;
      }

      .alert-error {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
      }

      .jumbotron {
          background-color: #2d2d30;
          color: #fff;
          padding: 100px 25px;
          font-family: Montserrat, sans-serif;
      }

      .error {
        background:#F2DEDE;
        color:#A94442;
        padding:10px;
        width:wrap-content;
        border-radius: 5px;
        text-align: center;
      }

      .news-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin: 20px 0;
      }

      .news-card {
        flex: 0 0 calc(25% - 12px);
        min-width: 270px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 15px;
      }

      .news-card.expanded {
        flex: 0 0 100%;
        margin-bottom: 30px;
        z-index: 1; 
      }

      .news-card.expanded .news-preview {
        display: none;
      }

      .news-full-content {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background: white;
        z-index: 2;
      }

      .news-card.expanded .news-full-content {
        display: block;
        position: relative; /* Changed from absolute to maintain flow */
      }

      .news-card.expanded .news-content {
        padding: 25px;
      }

      .news-card .news-image-container {
        height: 180px;
        overflow: hidden;
      }

      .news-card.expanded .news-image-container {
        height: 350px;
      }

      .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
      }

      .news-card:hover .news-image {
        transform: scale(1.05);
      }

      .news-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 18px;
        color: #2d2d30;
      }

      .news-card.expanded .news-title {
        font-size: 24px;
        margin-bottom: 15px;
      }

      .news-description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 15px;
        line-height: 1.4;
        color: #555;
        flex-grow: 1;
      }

      .news-card.expanded .news-description {
        -webkit-line-clamp: unset;
        margin-bottom: 20px;
        line-height: 1.6;
      }

      .news-date {
        color: #777;
        font-size: 14px;
        margin-bottom: 10px;
      }

      .news-card.expanded .news-date {
        font-size: 16px;
        margin-bottom: 15px;
      }

      .see-more {
        color: #2d2d30;
        font-weight: bold;
        text-decoration: none;
        align-self: flex-start;
        border-bottom: 2px solid #2d2d30;
        padding-bottom: 2px;
      }

      .news-full-content {
        display: none;
      }

      .news-card.expanded .news-full-content {
        display: block;
      }

      .news-full-content p {
        margin-bottom: 15px;
        line-height: 1.6;
      }

      .news-full-content .full-image {
        display: none; /* We'll use the same image container */
      }

      .news-full-content .news-link {
        display: inline-block;
        background-color: #2d2d30;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
        margin-top: 15px;
      }

      .news-full-content .news-link:hover {
        background-color: #1a1a1a;
      }

      .subscription-panel {
        flex: 0 0 calc(25% - 12px);
        min-width: 280px;
        height: 100%;
        background-color: #f9f9f9;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border: 1px solid #eee;
      }

      .subscription-panel h3 {
        margin-top: 0;
        color: #2d2d30;       
        border-bottom: 2px solid #2d2d30;
        padding-bottom: 10px;
        margin-bottom: 20px;
      }

      .subscription-message {
        margin-bottom: 20px;
        line-height: 1.6;
        color: #555;
      }

      .subscribe-btn {
        background-color: #337ab7;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: bold;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .unsubscribe-btn {
        background-color: #d9534f;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: bold;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .subscribe-btn:hover, .unsubscribe-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }

      .subscribe-btn:hover {
        background-color: #286090;
      }

      .unsubscribe-btn:hover {
        background-color: #c9302c;
      }

      @media (max-width: 1200px) {
        .news-card, .subscription-panel {
          flex: 0 0 calc(50% - 12px); /* 2 items per row */
        }
      }

      @media (max-width: 768px) {
        .news-card, .subscription-panel {
          flex: 0 0 100%; /* 1 item per row */
        }
      }
    </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

    <!--Navbar-->
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
              <li><a href="YouthMainPage.php">HOME</a></li>
              <li><a href="YouthMainPage.php">ABOUT US</a></li>
              <li><a href="YouthRegForm.php">EDIT PROFILE</a></li>
              <li><a href="#news">NEWS</a></li>
              <li><a href="index.php">LOG OUT</a></li>
            </ul>
          </div>
      </div>
    </nav>

    <!--The Grey Banner/Header-->
    <div class="jumbotron text-center">
      <h1> VIEW NEWS </h1> <br>
      <h3 style="color:white;">
        <?php
          $currentUser = $_SESSION['username'];
          $sql = "SELECT * FROM youth WHERE username='$currentUser'";  
          $gotResults = mysqli_query($db,$sql);
      
          if($gotResults) {
            if(mysqli_num_rows($gotResults)>0) {
              while($row = mysqli_fetch_array($gotResults)) {
                echo '<div class="row"><div class="col">';
                echo '<label for="categoryTag"> -- Your current category now is '.$row['category'].' --</label><center>';
                echo '</div></div>';
                }
              }
            }
        ?>
      </h3>
    </div>

    <!--Session Info-->
    <div>
      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>
    </div>

    <div class="container">
      <!--News & Subscription Container-->
      <div class="row">  
        <div class="col-lg-9">
          <!--Filter Function-->
          <div class="filter-section">
            <form method="GET" action="">
              <input type="hidden" name="page" value="news"> 
              <div class="form-group" style="display: flex; align-items: stretch; gap: 10px;">
                <select class="form-control" id="category" name="category" style="height: 38px;" onchange="this.form.submit()">
                  <option value="" <?php echo ($activeCategory === '') ? 'selected' : ''; ?>>All Categories</option>
                  <option value="<?php echo $userCategory; ?>" <?php echo ($activeCategory == $userCategory) ? 'selected' : ''; ?>>
                      <?php echo $userCategory; ?> (Your Category)
                  </option>
                  <?php
                  // Get other categories excluding user's category
                  $otherCategories = mysqli_query($db, "SELECT DISTINCT category FROM news WHERE category != '$userCategory'");
                  while($cat = mysqli_fetch_array($otherCategories)) {
                      echo '<option value="'.$cat['category'].'" '.($activeCategory == $cat['category'] ? 'selected' : '').'>'.$cat['category'].'</option>';
                  }
                  ?>
                </select>
                <!--<button type="submit" style="height: 38px; padding: 6px 16px; background-color: #007bff; color: white; border: none; border-radius: 4px;">Filter</button>-->
              </div>
            </form>
          </div>
          <!--Display news based on choosen category-->
          <div class="news-container">
            <?php
              // If one category selected
              //$categoryFilter = isset($_GET['category']) && $_GET['category'] != ''? "WHERE category = '".mysqli_real_escape_string($db, $_GET['category'])."'" : "";
              // Query to get all news (filtered by category)
              $newsQuery = "SELECT * FROM news $categoryFilter ORDER BY startDate DESC";
              $news = mysqli_query($db, $newsQuery);
              
              if(mysqli_num_rows($news) > 0) {
                while($row = mysqli_fetch_array($news)) {
                  $shortDesc = strlen($row['newsDescription']) > 150 ? substr($row['newsDescription'], 0, 150)."..." : $row['newsDescription'];
                  $formattedDate = date("F j, Y", strtotime($row['startDate']));
                  $formattedEndDate = date("F j, Y", strtotime($row['endDate']));
                  echo '
                    <div class="news-card" data-id="'.$row['id'].'">

                      <div class="news-preview">
                        <div class="news-image-container">
                          <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="news-image" alt="News Image">
                        </div>
                        <div class="news-content">
                          <div class="news-title">'.htmlspecialchars($row['newsTitle']).'</div>
                          <div class="news-date">'.$formattedDate.'</div>
                          <div class="news-description">'.htmlspecialchars($shortDesc).'</div>
                          <span class="see-more" onclick="toggleExpand(event, this)">See more &raquo;</span>
                        </div>
                      </div>
                      
                      <div class="news-full-content">
                        <div class="news-image-container">
                          <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="news-image" alt="News Image">
                        </div>
                        <h2>'.htmlspecialchars($row['newsTitle']).'</h2>
                        <p><strong>Category:</strong> '.htmlspecialchars($row['category']).'</p>
                        <p><strong>Start Date:</strong> '.$formattedDate.'</p>
                        <p><strong>End Date:</strong> '.$formattedEndDate.'</p>
                        <div class="news-description">'.nl2br(htmlspecialchars($row['newsDescription'])).'</div>';
                        if (!empty($row['newsLink'])) {
                          echo '<a href="'.htmlspecialchars($row['newsLink']).'" class="news-link" target="_blank">Read more &raquo;</a>';
                        }
                        echo 
                      '</div>

                    </div>';
                }
              } 
              else {
                if($activeCategory == '') {
                    $noResultsMessage = 'No news available at this time.';
                } elseif($activeCategory == $userCategory) {
                    $noResultsMessage = 'No news available in your category ('.htmlspecialchars($userCategory).') at this time.';
                } else {
                    $noResultsMessage = 'No news found for "'.htmlspecialchars($activeCategory).'" category.';
                }
                
                echo '<div class="col-md-12">
                        <div class="alert alert-info">
                          '.$noResultsMessage.'
                        </div>
                      </div>';
              }

            ?>
          </div>
        </div>
        <!--Subscription Panel-->      
        <div class="col-md-3">
          <div class="subscription-panel">
            <center><h5>EMAIL NOTIFICATION</h5></center>
            <div class="subscription-message">
              <?php 
                if($userData['subscribed']): 
              ?>
                  <p>You are currently <strong>subscribed</strong> to receive email notifications for new updates in the <strong><?php echo $userData['category']; ?></strong> category.</p>
                  <p>You'll receive email alerts whenever new content is added to this category.</p>
              <?php 
                else:
              ?>
                  <p>You are currently <strong>not subscribed</strong> to email notifications.</p>
                  <p>Subscribe to receive email alerts when new content is added to the <strong><?php echo $userData['category']; ?></strong> category.</p>
              <?php 
                endif; 
              ?>
            </div>
            <form method="POST" action="">
              <button type="submit" name="toggle_subscription" class="<?php echo $userData['subscribed'] ? 'unsubscribe-btn' : 'subscribe-btn'; ?>">
                <i class="fa <?php echo $userData['subscribed'] ? 'fa-bell-slash' : 'fa-bell'; ?>"></i> 
                <?php echo $userData['subscribed'] ? 'Unsubscribe' : 'Subscribe'; ?>
              </button>
            </form>
            <div style="margin-top: 15px; font-size: 13px; color: #777;">
              <i class="fa fa-info-circle"></i> You can change your subscription preferences anytime.
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleExpand(event, element) {
        event.stopPropagation();
        const card = element.closest('.news-card');
        const container = card.closest('.news-container');  
        
        // If already expanded, collapse it
        if (card.classList.contains('expanded')) {
          card.classList.remove('expanded');
          return;
        }
          
        // Collapse any other expanded cards first
        document.querySelectorAll('.news-card.expanded').forEach(expandedCard => {
          if (expandedCard !== card) {
            expandedCard.classList.remove('expanded');
          }
        });
          
        // Expand the clicked card
        card.classList.add('expanded');
          
        // Calculate position to scroll to (card's offset minus some padding)
        const scrollPosition = card.offsetTop - 20;
        window.scrollTo({
          top: scrollPosition,
          behavior: 'smooth'
        });
      }

      // Close expanded card when clicking outside
      document.addEventListener('click', function(event) {
        if (!event.target.closest('.news-card') && !event.target.closest('.see-more')) {
          document.querySelectorAll('.news-card.expanded').forEach(card => {
            card.classList.remove('expanded');
          });
        }
      });

      // Allow clicking anywhere on the card to expand
      document.querySelectorAll('.news-card').forEach(card => {
        card.addEventListener('click', function(event) {
          if (!event.target.closest('.see-more')) {
            const seeMore = this.querySelector('.see-more');
            toggleExpand(event, seeMore);
          }
        });
      });
    </script>

  </body>
</html>