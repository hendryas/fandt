<?php
include './koneksi.php';

$buttonSubmit = isset($_POST['buttonSubmit']) ? $_POST['buttonSubmit'] : '';
switch ($buttonSubmit) {
  case 'add':
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $origin = $_POST['origin'];
      $category = $_POST['category'];
      $price_range = $_POST['price_range'];

      // File gambar
      $targetDir = "uploads/"; // Direktori tempat menyimpan gambar
      $fileName = basename($_FILES["image_file"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

      // var_dump($name);
      // var_dump($description);
      // var_dump($origin);
      // var_dump($category);
      // var_dump($price_range);
      // var_dump($targetDir);
      // var_dump($fileName);
      // var_dump($targetFilePath);
      // var_dump($fileType);
      // die;

      // Validasi file
      // Memeriksa tipe file
      $allowTypes = array('jpg', 'jpeg', 'png');
      if (in_array($fileType, $allowTypes)) {
        // Memeriksa ukuran file
        if ($_FILES['image_file']['size'] <= 5000000) { // 5MB (menyesuaikan kebutuhan Anda)
          // Memindahkan file ke direktori yang ditentukan
          if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFilePath)) {
            // Menyimpan data ke database
            $sql = "INSERT INTO Foods (name, description, origin, category, price_range, image_url)
                      VALUES ('$name', '$description', '$origin', '$category', '$price_range', '$fileName')";

            if ($conn->query($sql) === TRUE) {
              // echo "Data baru berhasil ditambahkan.";
              header("Location: index.php");
              exit();
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else {
            echo "Terjadi kesalahan saat mengunggah file.";
          }
        } else {
          echo "Ukuran file terlalu besar. Maksimal 5MB.";
        }
      } else {
        echo "Hanya file JPG, JPEG, dan PNG yang diizinkan.";
      }
    } else {
      echo "File gambar diperlukan.";
    }
    break;

  case 'edit':

    break;

  case 'delete':

    break;

  default:
    # code...
    break;
}
