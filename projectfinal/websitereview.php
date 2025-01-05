<?php
include 'dbconnection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize inputs
    $website_rating = (int)$_POST['website_rating'];
    $website_review = htmlspecialchars(trim($_POST['website_review']));

    // Simple validation
    if (empty($website_review) || $website_rating < 1 || $website_rating > 5) {
        $error_message = "Please fill in all fields with valid data.";
    } else {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO reviews (website_rating, website_review) VALUES (?, ?)");
        $stmt->bind_param("is", $website_rating, $website_review);

        if ($stmt->execute()) {
            $success_message = "Review submitted successfully!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!-- HTML Form for Website Review -->
<?php include 'ratingform.php'; ?>
