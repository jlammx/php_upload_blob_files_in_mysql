<?php
require_once __DIR__ . '/db.php';

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
?>

<HTML>
    <HEAD>
        <TITLE>PHP | BLOB file upload to MySQL</TITLE>
        <meta charset="UTF-8">
        <meta name="description" content="Example MySQL BLOB using PHP">
        <meta name="keywords" content="PHP, MySQL, Blob">
        <meta name="author" content="JORGE LUIS AGUIRRE MARTINEZ">
        <meta name="publish_date" property="og:publish_date" content="2023-03-09T02:00:00-0600">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/form.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <style>
            .image-gallery {
                text-align:center;
            }
            .image-gallery img {
                padding: 3px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
                border: 1px solid #FFFFFF;
                border-radius: 4px;
                margin: 20px;
            }
        </style>
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