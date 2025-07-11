<?php 
require_once 'adminserver.php'; 
?>

<?php 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Adminloginpage.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Admin View News</title>

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    background-color: white;
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
.jumbotron {
    background-color: #2d2d30;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
}
table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
}
th {
    background-color: #2d2d30;
    color: white;
}
tr:hover {
    background-color: #f2f2f2;
}
td img {
    width: 150px;
    height: auto;
}
.action-buttons a {
    margin: 0 5px;
    color: white;
    text-decoration: none;
    font-size: 16px;
    padding: 6px 10px;
    border-radius: 4px;
    display: inline-block;
}
.action-buttons a.edit {
    background-color: #007bff;
}
.action-buttons a.edit:hover {
    background-color: #0056b3;
}
.action-buttons a.delete {
    background-color: #dc3545;
}
.action-buttons a.delete:hover {
    background-color: #a71d2a;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    font-size: 16px;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
.bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
    padding: 50px 0;
}
.bg-1 h3 {
    color: #fff;
}
.bg-1 a {
    color: #fff;
    text-decoration: none;
}
.bg-1 a:hover {
    color: #ddd;
}
.action-buttons a.send-mail {
    background-color: #28a745;
}
.action-buttons a.send-mail:hover {
    background-color: #1e7e34;
}

/* Loading Modal Styles */
.modal-loading {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
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

/* Filter Styles */
.filter-container {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.filter-container label {
    font-weight: bold;
    margin-right: 10px;
}
.filter-container select, .filter-container input {
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
    margin-right: 15px;
}
.filter-container button {
    padding: 8px 15px;
    background-color: #2d2d30;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.filter-container button:hover {
    background-color: #1a1a1c;
}

/* Highlight styles */
.recently-sent {
    background-color: #e8f5e9 !important;
    transition: background-color 2s ease-out;
}
.recently-deleted {
    background-color: #ffebee !important;
    transition: background-color 2s ease-out;
}
.notification-box {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 16px;
    text-align: center;
}
.notification-success {
    background-color: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}
.notification-error {
    background-color: #ffebee;
    color: #c62828;
    border: 1px solid #ffcdd2;
}
</style>
<script>
function confirmAndSend(id, category) {
    if(confirm('Send this news to all users in ' + category + ' category?')) {
        // Show loading modal
        document.getElementById('loadingModal').style.display = 'block';
        
        // Send the request
        window.location.href = 'sendNewsMail.php?id=' + id;
        return true;
    }
    return false;
}

// Function to highlight recently sent emails
function highlightRecentlySent() {
    const urlParams = new URLSearchParams(window.location.search);
    const sentId = urlParams.get('sent');
    
    if (sentId) {
        const row = document.querySelector('tr[data-id="' + sentId + '"]');
        if (row) {
            row.classList.add('recently-sent');
            
            // Remove the highlight after 2 seconds
            setTimeout(function() {
                row.classList.remove('recently-sent');
            }, 2000);
            
            // Remove the sent parameter from URL
            history.replaceState(null, '', window.location.pathname);
        }
    }
}

// Function to highlight recently deleted news
function highlightRecentlyDeleted() {
    const urlParams = new URLSearchParams(window.location.search);
    const deletedId = urlParams.get('deleted');
    
    if (deletedId) {
        // Show notification
        const notification = document.createElement('div');
        notification.className = 'notification-box notification-error';
        notification.innerHTML = 'The news item has been successfully deleted.';
        document.querySelector('.container').insertBefore(notification, document.querySelector('.filter-container'));
        
        // Remove the notification after 3 seconds
        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000);
        
        // Remove the deleted parameter from URL
        history.replaceState(null, '', window.location.pathname);
    }
}

// Function to apply filters
function applyFilters() {
    const category = document.getElementById('categoryFilter').value;
   
    let queryString = '';
    if (category) queryString += '&category=' + category;
    
    window.location.href = window.location.pathname + '?' + queryString;
}

// Function to reset filters
function resetFilters() {
    window.location.href = window.location.pathname;
}

// Check for email sent notification
function checkEmailNotification() {
    const urlParams = new URLSearchParams(window.location.search);
    const sent = urlParams.get('sent');
    const count = urlParams.get('count');
    
    if (sent && count) {
        // Show notification
        const notification = document.createElement('div');
        notification.className = 'notification-box notification-success';
        notification.innerHTML = 'Email successfully sent to ' + count + ' users';
        document.querySelector('.container').insertBefore(notification, document.querySelector('.filter-container'));
        
        // Remove the notification after 3 seconds
        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000);
        
        // Remove the parameters from URL
        history.replaceState(null, '', window.location.pathname);
    }
}

// Run functions when page loads
window.onload = function() {
    highlightRecentlySent();
    highlightRecentlyDeleted();
    checkEmailNotification();
    
    // Set filter values from URL
    const urlParams = new URLSearchParams(window.location.search);
    document.getElementById('categoryFilter').value = urlParams.get('category') || '';
};
</script>
</head>

<body id="myPage">

<!-- Loading Modal -->
<div id="loadingModal" class="modal-loading">
    <div class="modal-content-loading">
        <div class="loader"></div>
        <h3>Sending Emails...</h3>
        <p>Please wait while we send the emails to all recipients.</p>
        <p>This may take a few moments.</p>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">
                <b><img src="youthLogoo.png" alt="Logo" style="width:80px;height:20px"> ONLINE INFORMATION WEBSITE FOR YOUTH</b>
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

<!-- Header Banner -->
<div class="jumbotron text-center">
    <h1>VIEW NEWS</h1>
    <p>All the created news will be displayed here. You can choose to edit or delete the news.</p>
</div>

<!-- Display Message -->
<div class="container">
    <?php 
    if (isset($_SESSION['message'])): 
    ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
            unset($_SESSION['msg_type']);
            ?>
        </div>
    <?php 
    endif 
    ?>

    <!-- Filter Section -->
    <div class="filter-container">
        <div class="row">
            <div  align="right">
                <select id="categoryFilter">
                    <option value="">All Categories</option>
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
                <button onclick="applyFilters()">Apply Filters</button>
                <button onclick="resetFilters()" style="margin-left: 10px;">Reset Filters</button>
            </div>
        </div>
    </div>

    <!-- News Table -->
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th>Image</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
            
            // query for filters
            $query = "SELECT * FROM news WHERE 1=1";
            
            if (isset($_GET['category'])) {
                $category = mysqli_real_escape_string($db, $_GET['category']);
                $query .= " AND category = '$category'";
            }
            
            if (isset($_GET['start_date'])) {
                $start_date = mysqli_real_escape_string($db, $_GET['start_date']);
                $query .= " AND startDate >= '$start_date'";
            }
            
            if (isset($_GET['end_date'])) {
                $end_date = mysqli_real_escape_string($db, $_GET['end_date']);
                $query .= " AND endDate <= '$end_date'";
            }
            
            $query .= " ORDER BY startDate DESC";
            
            $news = mysqli_query($db, $query);
            
            if (!$news) {
                die("Query failed: " . mysqli_error($db));
            }
            
            $no = 1;
            while($row = mysqli_fetch_array($news)) {
                echo "<tr data-id='{$row['id']}'>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>{$row['category']}</td>";
                echo "<td>{$row['newsTitle']}</td>";
                echo "<td style='text-align:left;'>{$row['newsDescription']}</td>";
                echo "<td style='max-width:200px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;'>
                        <a href='{$row['newsLink']}' target='_blank'>{$row['newsLink']}</a>
                      </td>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "'/></td>";
                echo "<td>{$row['startDate']}</td>";
                echo "<td>{$row['endDate']}</td>";
                echo "<td class='action-buttons'>
                        <a class='edit' href='updateNews.php?id={$row['id']}' title='Edit'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a class='delete' href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure to delete this news?');\" title='Delete'><i class='fa-solid fa-trash'></i></a>
                        <a class='send-mail' href='#' onclick=\"return confirmAndSend({$row['id']}, '{$row['category']}');\" title='Send Mail'><i class='fa-solid fa-envelope'></i></a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br><br>
</div>

<!-- Action Section (footer) -->
<div id="action" class="bg-1" align="center"> 
    <div class="container">
        <h3 class="text-center">ADMIN</h3> <br>
        <p class="text-center"><em>SELECT WHAT TO DO :</em></p><br>
        <div class="col-md-12 form-group">
            <button class="btn pull-center" type="submit" style="width:900px">
                <a style="color:grey;font-size:20px;" href="AdminNewsForm.php">CREATE NEWS</a>
            </button>
        </div>
        <div class="col-md-12 form-group">
            <button class="btn pull-center" type="submit" style="width:900px">
                <a style="color:grey;font-size:20px;" href="AdminViewYouthData.php">VIEW YOUTH DATA</a>
            </button>
        </div>
    </div>
</div>

</body>
</html>