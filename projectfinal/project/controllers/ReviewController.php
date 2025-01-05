<?php
include_once 'models/Review.php';

class ReviewController {
    private $reviewModel;

    public function __construct($db) {
        $this->reviewModel = new Review($db);
    }

    public function submitReview($type, $data) {
        if (isset($data['rating']) && $data['rating'] >= 1 && $data['rating'] <= 5 && !empty($data['review'])) {
            $title = $data['title'] ?? '';
            return $this->reviewModel->addReview($type, $title, $data['rating'], $data['review']);
        }
        return false;
    }
}
?>
