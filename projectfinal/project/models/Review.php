<?php
class Review {
    private $conn;
    private $table = "reviews";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addReview($type, $title, $rating, $review) {
        $query = "INSERT INTO {$this->table} (review_type, title, rating, review) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssis", $type, $title, $rating, $review);
        return $stmt->execute();
    }
}
?>
