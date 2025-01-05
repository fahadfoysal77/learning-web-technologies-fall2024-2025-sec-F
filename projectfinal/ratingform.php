<?php
// Database connection
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and process Job Review
    if (isset($_POST['submit_job'])) {
        $job_title = htmlspecialchars(trim($_POST['job_title']));
        $job_rating = $_POST['job_rating'];
        $job_review = htmlspecialchars(trim($_POST['job_review']));

        if (!empty($job_title) && !empty($job_rating) && !empty($job_review) && $job_rating >= 1 && $job_rating <= 5) {
            $stmt = $conn->prepare("INSERT INTO reviews (review_type, title, rating, review) VALUES ('job', ?, ?, ?)");
            $stmt->bind_param("sis", $job_title, $job_rating, $job_review);
            if ($stmt->execute()) {
                $job_message = "<p style='color:green;'>Job Review Submitted Successfully!</p>";
            } else {
                $job_message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $job_message = "<p style='color:red;'>Please fill in all fields and ensure the rating is between 1 and 5.</p>";
        }
    }

    // Validate and process Website Review
    if (isset($_POST['submit_website'])) {
        $website_rating = $_POST['website_rating'];
        $website_review = htmlspecialchars(trim($_POST['website_review']));

        if (!empty($website_rating) && !empty($website_review) && $website_rating >= 1 && $website_rating <= 5) {
            $stmt = $conn->prepare("INSERT INTO reviews (review_type, rating, review) VALUES ('website', ?, ?)");
            $stmt->bind_param("is", $website_rating, $website_review);
            if ($stmt->execute()) {
                $website_message = "<p style='color:green;'>Website Review Submitted Successfully!</p>";
            } else {
                $website_message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $website_message = "<p style='color:red;'>Please fill in all fields and ensure the rating is between 1 and 5.</p>";
        }
    }

    // Validate and process Profile Review
    if (isset($_POST['submit_profile'])) {
        $profile_name = htmlspecialchars(trim($_POST['profile_name']));
        $profile_rating = $_POST['profile_rating'];
        $profile_review = htmlspecialchars(trim($_POST['profile_review']));

        if (!empty($profile_name) && !empty($profile_rating) && !empty($profile_review) && $profile_rating >= 1 && $profile_rating <= 5) {
            $stmt = $conn->prepare("INSERT INTO reviews (review_type, title, rating, review) VALUES ('profile', ?, ?, ?)");
            $stmt->bind_param("sis", $profile_name, $profile_rating, $profile_review);
            if ($stmt->execute()) {
                $profile_message = "<p style='color:green;'>Profile Review Submitted Successfully!</p>";
            } else {
                $profile_message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $profile_message = "<p style='color:red;'>Please fill in all fields and ensure the rating is between 1 and 5.</p>";
        }
    }
}
?>



<head>

    <title>Rating/Review</title>
    
</head>
<body>
    <!-- Outer Border -->
    <table border="1" width="100%" cellpadding="10">
        <tr>
            <td>
                <!-- Header Section -->
                <table border="1" width="100%">
                    <tr>
                        <td colspan="2" align="left">
                            <strong>Job Publisher</strong>
                        </td>
                        <td align="right">
                            <strong>User</strong>
                        </td>
                    </tr>
                </table>

                <!-- Title -->
                <h2 align="center">Rating/Review</h2>

                <!-- Rating/Review Section -->
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <!-- Job Review -->
                            <fieldset>
                                <legend>Job Review</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Job Title:</td>
                                            <td><input type="text" name="job_title" required></td>
                                        </tr>
                                        <tr>
                                            <td>Rating (1-5):</td>
                                            <td>
                                                <select name="job_rating" required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Review:</td>
                                            <td><textarea name="job_review" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_job" value="Submit Review">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php if (isset($job_message)) echo $job_message; ?>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Website Review -->
                            <fieldset>
                                <legend>Website Review</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Rating (1-5):</td>
                                            <td>
                                                <select name="website_rating" required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Review:</td>
                                            <td><textarea name="website_review" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_website" value="Submit Review">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php if (isset($website_message)) echo $website_message; ?>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Profile Review -->
                            <fieldset>
                                <legend>Profile Review</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Profile Name:</td>
                                            <td><input type="text" name="profile_name" required></td>
                                        </tr>
                                        <tr>
                                            <td>Rating (1-5):</td>
                                            <td>
                                                <select name="profile_rating" required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Review:</td>
                                            <td><textarea name="profile_review" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_profile" value="Submit Review">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php if (isset($profile_message)) echo $profile_message; ?>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
