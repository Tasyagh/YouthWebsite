<!DOCTYPE html>
<html>

  <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <title>Online Information Website for Youth</title>

    <style>
      .container {
        font-family: Arial;
      }
      .main-content-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
      }
      .table-container {
        width: 79%;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }
      .email-form-container {
        width: 20%;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }
      .msg_container h4 {
        color: #333;
      }
      .msg_container .form-control {
        width: 100%;
        margin-bottom: 15px;
      }
      .msg_container .btn-primary {
        background-color: #2d2d30;
        border-color: #2d2d30;
        width: 100%;
      }
      .msg_container .btn-primary:hover {
        background-color: #444;
        border-color: #444;
      }
      @media (max-width: 992px) {
        .table-container,
        .email-form-container {
          width: 100%;
          margin-right: 0;
        }
        .email-form-container {
          margin-top: 30px;
          position: static;
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
      .main {
        max-width: 1000px;
        margin: auto;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse; 
        width: 100%;
      }
      td, th {
        border: 2px solid white;
        text-align: left;
        padding: 8px;
      }
      th {
        background-color:rgba(41, 41, 41, 0.9);
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
        width : 150px;
        height : 150px;
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
      body {
        font: 400 15px/1.8 Lato, sans-serif;
        color: #777;
      }
      .jumbotron {
        background-color: #2d2d30;
        color: #fff;
        padding: 100px 25px;
        font-family: Montserrat, sans-serif;
      }
      .modal-loading {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
      }
      .modal-content-loading {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 30px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
        border-radius: 5px;
      }
      .loader {
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      .notification-success {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #d6e9c6;
        border-radius: 4px;
      }
      .notification-error {
        background-color: #f2dede;
        color: #a94442;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ebccd1;
        border-radius: 4px;
      }
      .notification-success ul, .notification-error ul {
        margin: 5px 0 0 20px;
        padding-left: 15px;
      }
      .notification-success li, .notification-error li {
        margin-bottom: 3px;
      }
      .subscribed {
        color: green;
        font-weight: bold;
      }
      .unsubscribed {
        color: red;
        font-weight: bold;
      }
    </style>

    <!--Modal Handling For loading, error, etc-->
    <script>
      // Function to show loading modal
      function showLoadingModal() {
          document.getElementById('loadingModal').style.display = 'block';
      }
      // Function to hide loading modal
      function hideLoadingModal() {
          document.getElementById('loadingModal').style.display = 'none';
      }
      // Function to show notification
      function showNotification(message, isSuccess) {
          const notification = document.createElement('div');
          notification.className = isSuccess ? 'notification-success' : 'notification-error';
          notification.innerHTML = message;
          const container = document.querySelector('.msg_container');
          const title = container.querySelector('h4');  
          // Insert after the title (before the next sibling)
          if (title.nextSibling) {
            container.insertBefore(notification, title.nextSibling);
          } else {
            container.appendChild(notification);
          }
          setTimeout(() => notification.remove(), 8000);
      }
      // Modified email sending function
      function multi_email() {
          showLoadingModal();
          const emails = $('#emails').val();
          const subject = $('#subject').val();
          const message = $('#message').val();
          
          // Basic validation
          if (!emails || !subject || !message) {
              hideLoadingModal();
              showNotification('Please fill in all fields', false);
              return;
          }
          
          // Get all checked checkboxes and their associated user data
          const selectedUsers = [];
          $('#alluser tr td input[type="checkbox"]:checked:not(#mcheck)').each(function() {
              const row = $(this).closest('tr');
              selectedUsers.push({
                  email: $(this).val(),
                  name: row.find('td:nth-child(4)').text(),
                  id: row.find('td:nth-child(3)').text()
              });
          });

          $.ajax({
            type: "POST",
            url: "multiemails.php",
            data: {
              users: selectedUsers, // Send the full user data
              subject: subject,
              message: message
            },
            dataType: 'json', success: function(response) {
              hideLoadingModal();
              if (response.success) {
                // Build the success message with details
                let successMessage = `Email successfully sent to ${response.sent_count} recipient(s):<br><ul>`;
                response.sent_recipients.forEach(recipient => {
                  successMessage += `<li>${recipient.name} (${recipient.email})</li>`;
                });
                successMessage += `</ul>`;
                showNotification(successMessage, true);
                if (response.failed_count > 0) {
                  let failedMessage = `${response.failed_count} emails failed to send:<br><ul>`;
                  response.failed_recipients.forEach(recipient => {
                    failedMessage += `<li>${recipient.name} (${recipient.email})</li>`;
                    });
                    failedMessage += `</ul>`;
                          
                          showNotification(failedMessage, false);
                      }
                  } else {
                      showNotification(response.error, false);
                  }
              },
              error: function(xhr, status, error) {
                  hideLoadingModal();
                  showNotification(`Error: ${error}`, false);
              }
          });
      }
    </script>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Loading Modal -->
    <div id="loadingModal" class="modal-loading">
        <div class="modal-content-loading">
            <div class="loader"></div>
            <h3>Sending Emails...</h3>
            <p>Please wait while we send the emails.</p>
            <p>This may take a few moments.</p>
        </div>
    </div>
    <!--navbar-->
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
      <h1> VIEW YOUTH DATA </h1> 
      <p>Display all the youth data and send the email as an update notification to inform user ..</p> 
      <br>
    </div>
    <!--Container for Display user data and email composing-->
    <div class="main-content-container">
      <!--Display User Details-->
      <div class="table-container">
        <?php
          // initializing variables
          $username = "";
          $email    = "";
          $errors = array(); 
          // connect to the database
          $db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
          include 'vendor/autoload.php';
          // Get count of data set first
          $sql = "SELECT * FROM youth ORDER by category";
          $count = $db->query($sql)->num_rows;
          // Initialize a Data Pagination with previous count number
          $pagination = new \yidas\data\Pagination([
            'totalCount' => $count,
            'pergpage' => 10,
          ]);
          // Get range data for the current page
          $sql = "SELECT * FROM youth ORDER by category LIMIT {$pagination->offset}, {$pagination->limit}";
          $rows = $db->query($sql);
        ?>
          <h4>User Details</h4>
          <table>
            <thead>
              <tr>
                    <th></th>
                    <th>Category</th>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Ic Number</th>
                    <th>Subscription Status</th>
                  </tr>
            </thead>
            <tbody id="alluser">
              <tr>
                <?php 
                  while ($row = $rows->fetch_assoc()): 
                ?>		
                  <td><input type="checkbox" value="<?php echo $row['email']; ?>" onclick="updateTextArea();" /></td>
                  <td><?php echo $row['category']; ?></td>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['fullName']; ?></td>
                  <td><?php echo $row['phoneNum']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['icNum']; ?></td>
                  <td class="<?php echo $row['subscribed'] ? 'subscribed' : 'unsubscribed'; ?>">
                    <?php echo $row['subscribed'] ? 'Subscribed' : 'Unsubscribed'; ?>
                  </td>
                <?php 
                  endwhile; 
                ?>
              </tr>
            </tbody>
          </table>
      </div>
      <!--Email Composing-->
      <div class="email-form-container">
        <form action="" method="post" class="msg_container">
          <h4>Compose Email</h4>
          <script>
            $(document).ready(function() {
              $('#message').trumbowyg();      
              // Master checkbox to select/deselect all
              $("#mcheck").on('click', function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
                updateTextArea(); // Update the email list immediately
              });
              // Update email list when any checkbox changes
              $('input[type="checkbox"]').not('#mcheck').change(function() {
                updateTextArea();
              });      
              // Initial update
                updateTextArea();
            });
            // Function to update the email textarea with selected recipients
            function updateTextArea() {
              var allVals = [];       
              // Get all checked checkboxes (except the master checkbox)
              $('#alluser tr td input[type="checkbox"]:checked:not(#mcheck)').each(function() {
                if ($(this).val()) { // Only add if value exists
                  allVals.push($(this).val());
                }
              });
              // Update the email textarea with comma-separated values
              $('#emails').val(allVals.join(','));
            }
          </script>
          <p id="multi-responce"></p>
          <div class="form-group">
            <textarea class="form-control" id="emails" name="emails" placeholder="Email list" style="height: 120px;"></textarea>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea style="height: 220px;" id="message" name="message" class="form-control" placeholder="Your Message" rows="5" required></textarea>
          </div>
          <button type="button" onclick="multi_email();" class="btn btn-primary btn-lg col-lg-12" id="send">Send Now </button>
        </form>
      </div>
    </div>
    <!-- Container (action) -->
    <div style="margin-top:50px;" align="center">
      <div id="action" class="bg-1">
        <div class="container">
          <h3 class="text-center">ADMIN</h3>
          <br>
          <p class="text-center"><em>SELECT WHAT TO DO :</em></p>
          <br>    
          <div class="col-md-12 form-group" >
            <button class="btn pull-center" type="submit" style="width:900px" ><a style="color:grey;font-size:20px;" href="AdminNewsForm.php">CREATE NEWS </a></button>
          </div>
          <div class="col-md-12 form-group" >
            <button class="btn pull-center" type="submit" style="width:900px" ><a style="color:grey;font-size:20px;" href="AdminNewsView.php">VIEW NEWS</button>
          </div>
        </div>
        <br><br>
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
