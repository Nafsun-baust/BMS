<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notice</title>
    <style>
        .show {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>
<?php
include "../database.php";
session_start();

$notice_id = $_GET['notice_id'];
$query = "select * from notice where notice_id = '$notice_id'";
$table = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($table);

?>

<body>
    <embed class="show" src="<?php echo $row['pdf'] ?>" type="application/pdf">
</body>

</html>