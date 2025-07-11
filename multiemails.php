<?php
// multiemails.php
require 'vendor/autoload.php';
header('Content-Type: application/json');

// Database connection
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
if (!$db) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = $_POST['users'] ?? [];
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Validate inputs
    if (empty($users)) {
        echo json_encode(['success' => false, 'error' => 'No recipients selected']);
        exit;
    }
    if (empty($subject)) {
        echo json_encode(['success' => false, 'error' => 'Subject is required']);
        exit;
    }
    if (empty($message)) {
        echo json_encode(['success' => false, 'error' => 'Message is required']);
        exit;
    }

    // Convert JSON string to array if needed
    if (is_string($users)) {
        $users = json_decode($users, true);
    }

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $results = [
        'sent' => 0,
        'failed' => 0,
        'sent_recipients' => [],
        'failed_recipients' => []
    ];

    try {
        // SMTP Configuration (keep your existing settings)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'youthwebdonotreply@gmail.com';
        $mail->Password = 'usfyqiczhkgpijci';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        $mail->setFrom('youthwebdonotreply@gmail.com', 'Youth Website');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        foreach ($users as $user) {
            try {
                $mail->clearAddresses();
                $mail->addAddress($user['email'], $user['name']);
                
                if ($mail->send()) {
                    $results['sent']++;
                    $results['sent_recipients'][] = [
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'id' => $user['id']
                    ];
                } else {
                    $results['failed']++;
                    $results['failed_recipients'][] = [
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'id' => $user['id']
                    ];
                }
            } catch (Exception $e) {
                $results['failed']++;
                $results['failed_recipients'][] = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'id' => $user['id'],
                    'error' => $e->getMessage()
                ];
            }
        }

        // Return success response
        echo json_encode([
            'success' => true,
            'sent_count' => $results['sent'],
            'failed_count' => $results['failed'],
            'sent_recipients' => $results['sent_recipients'],
            'failed_recipients' => $results['failed_recipients']
        ]);

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => 'Mailer Error: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request method'
    ]);
}
?>