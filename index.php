<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Article Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>Article Management</h1>

    <form action="foodController.php" enctype="multipart/form-data" method="post" class="food-form">
      <input type="hidden" id="foodId">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <span class="error" id="nameError">Required</span>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>
      <span class="error" id="descriptionError">Required</span>

      <label for="origin">Origin:</label>
      <input type="text" id="origin" name="origin" required>
      <span class="error" id="originError">Required</span>

      <label for="category">Category:</label>
      <input type="text" id="category" name="category" required>
      <span class="error" id="categoryError">Required</span>

      <label for="price_range">Price Range:</label>
      <input type="number" id="price_range" name="price_range" required>
      <span class="error" id="priceRangeError">Required</span>

      <label for="image_file">Image:</label>
      <input type="file" id="image_file" name="image_file" accept="image/*" required>
      <img id="image_preview" src="" alt="Image Preview" style="display: none; margin-top: 10px; width: 100px; height: auto;">
      <span class="error" id="imageFileError">Required</span>

      <button type="submit" name="buttonSubmit" value="add">Add Food</button>
    </form>

    <table id="foodTable" class="food-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Origin</th>
          <th>Category</th>
          <th>Price Range</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Food items will be dynamically added here -->
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
  <script src="scripts.js"></script>
</body>

</html>