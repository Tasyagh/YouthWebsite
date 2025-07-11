<?php
// sendNewsMail.php (updated without image handling)
require_once 'adminserver.php';
require 'vendor/autoload.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Adminloginpage.php');
    exit();
}

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
    mysqli_set_charset($db, 'utf8');
    
    $newsQuery = "SELECT * FROM news WHERE id = $newsId";
    $newsResult = mysqli_query($db, $newsQuery);
    $news = mysqli_fetch_assoc($newsResult);
    
    if ($news) {
        $category = $news['category'];
        // Modified query to only select subscribed users
        $usersQuery = "SELECT email FROM youth WHERE category = '$category' AND subscribed = 1 AND email IS NOT NULL";
        $usersResult = mysqli_query($db, $usersQuery);
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'youthwebdonotreply@gmail.com';
            $mail->Password = 'usfyqiczhkgpijci';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPDebug = 0;
            $mail->CharSet = 'UTF-8';
            
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
            
            $mail->setFrom('youthwebdonotreply@gmail.com', 'Youth Website');
            $mail->isHTML(true);
            
            // Format dates
            $startDate = date('F j, Y', strtotime($news['startDate']));
            $endDate = date('F j, Y', strtotime($news['endDate']));
            
            $subject = "New Update in $category: " . html_entity_decode($news['newsTitle'], ENT_QUOTES, 'UTF-8');
            
            // Construct email body (without image)
            $linkDisplay = !empty($news['newsLink']) ? "<a href='{$news['newsLink']}' style='color:#3498db;'>{$news['newsLink']}</a>" : "Not available";
            
            $body = "
                <html>
                <head>
                    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            line-height: 1.6;
                            color: #333;
                            max-width: 800px;
                            margin: 0 auto;
                            padding: 20px;
                        }
                        .header {
                            color: #2c3e50;
                            border-bottom: 2px solid #eee;
                            padding-bottom: 10px;
                            margin-bottom: 20px;
                        }
                        .footer {
                            margin-top: 30px;
                            padding-top: 10px;
                            border-top: 1px solid #eee;
                            font-size: 0.9em;
                            color: #7f8c8d;
                        }
                    </style>
                </head>
                <body>
                    <div class='header'>
                        <h2>" . htmlspecialchars($news['newsTitle'], ENT_QUOTES, 'UTF-8') . "</h2>
                    </div>
                    
                    <div>
                        <p>" . nl2br(htmlspecialchars($news['newsDescription'], ENT_QUOTES, 'UTF-8')) . "</p>
                        <p><strong>Check Out Now Before:</strong> $endDate</p>
                        <p><strong>For More Information Visit This Link:</strong> $linkDisplay</p>
                    </div>
                    
                    <div class='footer'>
                        This message was sent to you because you are subscribed to $category updates from Online Information Website for Youth.
                        <br><a href='[UNSUBSCRIBE_LINK]' style='color:#7f8c8d;'>Unsubscribe this email from the Online Information Website for Youth > Log In to your account > News > Unsubscribe </a>
                    </div>
                </body>
                </html>
            ";
            
            $recipientCount = 0;
            while ($user = mysqli_fetch_assoc($usersResult)) {
                if (filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
                    $mail->addBCC($user['email']);
                    $recipientCount++;
                }
            }
            
            if ($recipientCount > 0) {
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AltBody = strip_tags(str_replace("<br />", "\n", $body));
                
                if ($mail->send()) {
                    $_SESSION['message'] = "<div class='success-message'>Email successfully sent to $recipientCount subscribed users</div>";
                    $_SESSION['msg_type'] = "success";
                } else {
                    $_SESSION['message'] = "<div class='error-message'>Email could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
                    $_SESSION['msg_type'] = "danger";
                }
            } else {
                $_SESSION['message'] = "<div class='warning-message'>No subscribed recipients found for this category</div>";
                $_SESSION['msg_type'] = "warning";
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "<div class='error-message'>Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</div>";
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "<div class='error-message'>News item not found</div>";
        $_SESSION['msg_type'] = "danger";
    }
    header('location: AdminNewsView.php');
    exit();
}
?>