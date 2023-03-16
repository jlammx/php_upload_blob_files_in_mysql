# PHP | Upload BLOB files in MySQL

This repository is an example of upload BLOB files in MySQL using PHP.

- HTML form to upload image
- Store image file in database as BLOB
- Retrieve and display image BLOB from database

<br>

Deployed by **[jlammx](https://github.com/jlammx)**
- 🚀 Live: [View deployment](http://demo.pagos.cafisa.org/php_upload_blob_files_in_mysql)

<br>

Generally, when we [upload image file in PHP](https://github.com/jlammx/php_upload_binary_files_to_a_directory), the uploaded image is stored in a [directory of the server](https://github.com/jlammx/php_upload_binary_files_to_a_directory_and_store_target_file_path_in_mysql) and the respective image name is stored in the database. At the time of display, the file is retrieved from the server and the image is rendered on the web page. But, if you don’t want to consume the space of the server, the file can be stored in the database only. You can upload an image without storing the file physically on the server using the MySQL database.

If you’re concerned about the server space and need **free space on your server**, you can insert the image file directly in the database without uploading it to the directory of the server. This procedure helps to optimize the server space because the image file content is stored in the database rather than the server.

<br>

The BLOB is a kind of MySQL datatype referred to as Binary Large Objects. As its name, it is used to store a huge volume of data as binary strings similar to MYSQL BINARY and VARBINARY types.

### Classification of MySQL BLOB

| MySQL BLOB Types  | Maximum Storage Length (in bytes) |
| ----------------  | --------------------------------- | 
| TINYBLOB 	    | ((2^8)-1)                         |
| BLOB 	            | ((2^16)-1)                        |
| MEDIUMBLOB 	    | ((2^24)-1)                        |
| LONGBLOB 	    | ((2^32)-1)                        |


### Steps
1. [Create database and table](assets/database/dev_test_tbl_image.sql)
```mysql
CREATE DATABASE  IF NOT EXISTS `dev_test`;
USE `dev_test`;
--
-- Table structure for table `tbl_image`
--
DROP TABLE IF EXISTS `tbl_image`;
CREATE TABLE `tbl_image` (
  `imageId` int NOT NULL AUTO_INCREMENT,
  `imageData` longblob,
  `imageName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `imageType` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `imageSize` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `imageTmpName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `imageError` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `imageURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `upload_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '1',
  PRIMARY KEY (`imageId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
```
2. [Connect database](db.php)
3. [Upload file](index.php)
4. [Store image in MySQL as BLOB](index.php)
5. [Read image BLOB from database](imageView.php)
6. [Display uploaded blob images in a gallery](listImages.php)


### Screenshots

<p align="left">
	<img src="assets/screenshots/2023-03-10_00_SS.png" height="293" alt="Database structure"/>
	<img src="assets/screenshots/2023-03-10_02_SS.png" alt="Data"/>
    <img src="assets/screenshots/2023-03-10_01_SS.png" height="415" alt="Main"/>
</p>

> 🔴 Live 
<p align="left">
	<a href=https://youtu.be/YXkNRFA0Wq8 target="_blank"><img src="https://markdown-videos.deta.dev/youtube/YXkNRFA0Wq8" height="250"></a></img>
</p>


### Skills
<p align="left">
	<a href="https://dart.dev" target="_blank">
		<img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="PHP" width="40" height="40"/>
	</a> 
    <a href="https://www.mysql.com" target="_blank">
        <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="MySQL" width="40" height="40"/>
    </a>
</p>

<br>


<p align="center">
	<div align="center" inline>
		<span> <a href="https://www.linkedin.com/in/jlammx/" target="_blank">
			<img src="https://content.linkedin.com/content/dam/me/business/en-us/amp/brand-site/v2/bg/LI-Logo.svg.original.svg" alt="Jorge Aguirre" height="25"/></a>
		</span>
		&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
</p>

<p align="center"> Last updated at 15 Mar 2023</p>
