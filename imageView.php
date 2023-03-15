<?php
    require_once __DIR__ . '/db.php';
    // Read image BLOB to display
    // Get image data stored with the MySQL BLOB field in the database
    if (isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM tbl_image WHERE imageId=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $_GET['image_id']);
        $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
        $result = $statement->get_result();

        $row = $result->fetch_assoc();
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
    }
?>

