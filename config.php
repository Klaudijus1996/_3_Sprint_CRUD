<?php 
if (!isset($_SESSION['db_gen'])) {
$servername = "localhost";
$username = "root";
$password = "mysql";
$conn = mysqli_connect($servername, $username, $password); // Create connection
if (!$conn) {
    die("<h1>Connection failed: " . mysqli_connect_error().'</h1>');
}
$sql = "CREATE DATABASE crud";
    if (mysqli_query($conn, $sql)) {
$sql = "CREATE TABLE crud.`projects` (
    `project_id` INT NOT NULL AUTO_INCREMENT,
    `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `project_deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`project_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
      mysqli_query($conn, $sql);
      $sql = "CREATE TABLE crud.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` INT DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BA82C300166D1F9C` (`project_id`),
  CONSTRAINT `FK_BA82C300166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
      mysqli_query($conn, $sql);
      $sql = "INSERT INTO crud.`projects` VALUES (102,'Bugati Simulator','2020-08-29'),
      (104,'Rise Of Pantheon','2020-11-22'),
      (105,'Big boy','2020-10-18'),
      (106,'Mister Bunbasti','2023-05-04');";
      mysqli_query($conn, $sql);
      $sql = "INSERT INTO crud.`employees` VALUES (1,'Tadas','Blinda','Associate VFX Artist',102),
      (2,'Robin','Hood','Concept Artist',104),
      (3,'Sylvester','Stalone','Character Artist',105),
      (4,'John','Doe','Senior Software Engineer',NULL),
      (5,'Marry','Poppins','Level Designer',102),
      (6,'Cherry','Lady','Motion Designer',NULL),
      (7,'Ajaxa','Xunamun','Warrior',106);";
      mysqli_query($conn, $sql);
    } else {
$sql = "CREATE TABLE crud.`projects` (
    `project_id` INT NOT NULL AUTO_INCREMENT,
    `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `project_deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`project_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
      mysqli_query($conn, $sql);
      $sql = "CREATE TABLE crud.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` INT DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BA82C300166D1F9C` (`project_id`),
  CONSTRAINT `FK_BA82C300166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
      mysqli_query($conn, $sql);
      $sql = "INSERT INTO crud.`projects` VALUES (102,'Bugati Simulator','2020-08-29'),
      (104,'Rise Of Pantheon','2020-11-22'),
      (105,'Big boy','2020-10-18'),
      (106,'Mister Bunbasti','2023-05-04');";
      mysqli_query($conn, $sql);
      $sql = "INSERT INTO crud.`employees` VALUES (1,'Tadas','Blinda','Associate VFX Artist',102),
      (2,'Robin','Hood','Concept Artist',104),
      (3,'Sylvester','Stalone','Character Artist',105),
      (4,'John','Doe','Senior Software Engineer',NULL),
      (5,'Marry','Poppins','Level Designer',102),
      (6,'Cherry','Lady','Motion Designer',NULL),
      (7,'Ajaxa','Xunamun','Warrior',106);";
      mysqli_query($conn, $sql);
    }
    $_SESSION['db_gen'] = true;
    mysqli_close($conn);
}
?>