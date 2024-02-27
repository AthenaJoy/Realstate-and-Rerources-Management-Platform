<?php
// Function to retrieve notifications for a specific seller
function getSellerNotifications($sellerId, $limit = 10) {
    global $connect; // Assuming $connect is your database connection

    $sql = "SELECT * FROM seller_notifications WHERE seller_id = $sellerId ORDER BY created_at DESC LIMIT $limit";
    $result = mysqli_query($connect, $sql);

    $notifications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = $row;
    }

    return $notifications;
}

// Function to mark a notification as read
function markNotificationAsRead($notificationId) {
    global $connect;

    $sql = "UPDATE seller_notifications SET status = 'read' WHERE id = $notificationId";
    $result = mysqli_query($connect, $sql);

    return $result;
}

// Function to create a new notification for a seller
function createSellerNotification($sellerId, $message) {
    global $connect;

    $message = mysqli_real_escape_string($connect, $message);
    $sql = "INSERT INTO seller_notifications (seller_id, message, created_at) VALUES ($sellerId, '$message', NOW())";
    $result = mysqli_query($connect, $sql);

    return $result;
}
?>
