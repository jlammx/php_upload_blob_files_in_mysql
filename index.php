<?php
require_once __DIR__ . '/db.php';

// Get file count in table
$sql = "SELECT COUNT(*) FROM tbl_image";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_row();
// echo $row[0];

// Validate the limit of files allowed in the database
if($row[0] < 15){
    // Check if $_FILES count items
    if (count($_FILES) > 0) {
        // Check if file was uploaded
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            // Insert image as MySQL BLOB usign file_get_contents() to reads entire file into a string
            $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
            $imgName = $_FILES['userImage']['name'];
            $imgType = $_FILES['userImage']['type'];
            $imgSize = $_FILES['userImage']['size'];
            $imgTmpName = $_FILES['userImage']['tmp_name'];
            $imgError = $_FILES['userImage']['error'];
            $imgURL;
            $sql = "INSERT INTO tbl_image(imageData, imageName, imageType, imageSize, imageTmpName, imageError, imageURL, upload_on) VALUES(?, ?, ?, ?, ?, ?, ?, NOW())";
            $statement = $conn->prepare($sql);
            $statement->bind_param('sssssss', $imgData, $imgName, $imgType, $imgSize, $imgTmpName, $imgError, $imgURL);
            $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
        } 
    }
}else{
    echo "<div style='text-align: center; padding: 30px 0 10px 0; font-size: 20px; color: #c0392b'>
    The allowed file limit has been reached <br/> Uploading more files is not allowed due to my condition code <br/> Thanks for coming!</div>";
}
?>

<HTML>
    <HEAD>
        <TITLE>PHP | BLOB file upload to MySQL</TITLE>
        <meta charset="UTF-8">
        <meta name="description" content="Example MySQL BLOB using PHP">
        <meta name="keywords" content="PHP, MySQL, BLOB">
        <meta name="author" content="JORGE LUIS AGUIRRE MARTINEZ">
        <meta name="publish_date" property="og:publish_date" content="2023-03-10T18:00:00-0600">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/form.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </HEAD>

    <BODY>
        <!--- Upload the image file --->
        <form name="frmImage" enctype="multipart/form-data" action="" method="post">
            <div class="phppot-container tile-container">
                <label>Upload image file:</label>
                <div class="row">
                    <input name="userImage" type="file" class="full-width" />
                </div>
                <div class="row">
                    <input type="submit" value="Submit" />
                </div>
            </div>
            <div class="image-gallery">
                <?php require_once __DIR__ . '/listImages.php'; ?>
            </div>
        </form>
    </BODY>
</HTML>