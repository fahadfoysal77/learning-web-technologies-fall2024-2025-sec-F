<!DOCTYPE html>
<html>
<head>
    <title>Submit Review</title>
</head>
<body>
    <h2>Submit Review</h2>
    <form method="POST" action="?route=submit_review">
        <input type="hidden" name="review_type" value="job">
        <label for="rating">Rating (1-5):</label>
        <select name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <label for="review">Review:</label>
        <textarea name="review" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
