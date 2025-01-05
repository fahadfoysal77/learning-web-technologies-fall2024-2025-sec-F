<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';

    // Create directory if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $messages = [];

    // Handle Admit Card Upload
    if (!empty($_FILES['admit_card']['name'])) {
        $admitCardPath = $uploadDir . basename($_FILES['admit_card']['name']);
        if (move_uploaded_file($_FILES['admit_card']['tmp_name'], $admitCardPath)) {
            $messages[] = "Admit Card uploaded successfully!";
        } else {
            $messages[] = "Failed to upload Admit Card.";
        }
    }

    // Handle Job Result Upload
    if (!empty($_FILES['job_result']['name'])) {
        $jobResultPath = $uploadDir . basename($_FILES['job_result']['name']);
        if (move_uploaded_file($_FILES['job_result']['tmp_name'], $jobResultPath)) {
            $messages[] = "Job Result uploaded successfully!";
        } else {
            $messages[] = "Failed to upload Job Result.";
        }
    }

    // Handle Job Notice Upload
    if (!empty($_FILES['job_notice']['name'])) {
        $jobNoticePath = $uploadDir . basename($_FILES['job_notice']['name']);
        if (move_uploaded_file($_FILES['job_notice']['tmp_name'], $jobNoticePath)) {
            $messages[] = "Job Notice uploaded successfully!";
        } else {
            $messages[] = "Failed to upload Job Notice.";
        }
    }

    // Display messages
    foreach ($messages as $message) {
        echo "<p>$message</p>";
    }
}
?>
