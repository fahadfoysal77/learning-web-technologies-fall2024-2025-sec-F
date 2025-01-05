<?php
include 'controllers/ReviewController.php';
include 'controllers/AuthController.php';

function handleRoute($route, $db) {
    switch ($route) {
        case 'signup':
            include 'views/signup.php';
            break;

        case 'signin':
            include 'views/signin.php';
            break;

        case 'submit_review':
            $controller = new ReviewController($db);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $type = $_POST['review_type'] ?? 'general';
                $success = $controller->submitReview($type, $_POST);
                echo $success ? "Review submitted!" : "Failed to submit review.";
            }
            break;

        default:
            include 'views/rating.php';
            break;
    }
}
?>
