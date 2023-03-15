<?php
    // Gets all image id in the database
    $sql = "SELECT imageId, imageData FROM tbl_image ORDER BY imageId DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<?php
    // Show all images from the database one by one for reducing overcharge
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Show only images that contain imageData in the database 
            if($row["imageData"]){
            ?>
            <?php ?>
                <!--- Display uploaded blob images in a gallery --->
                <img src="imageView.php?image_id=<?php echo $row["imageId"];?>">
            <?php
            }
        }
    }
?>