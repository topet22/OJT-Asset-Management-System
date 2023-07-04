<?php
$servername = "localhost";
$username = "AMS_User";
$password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    session_start(); 

    if(!isset($_SESSION['SAuser_name'])){
        header("location:../");
    }
    else
    {
        $_SESSION['SAuser_name'];
    }
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="Resources/JS/SupAdmin.js"></script>

</head>
    <title>IHOMS IMS</title>
<body>
    <div id="AddDepartment">
        <label for="dept-name">Department Name:</label>
        <input type="text" id="dept_name">
        <button id = "save_dept">Add Department</button>
    </div>
    <select id="DRPDepartment">
        <option value="--SELECT--">--SELECT DEPARTMENT--</option>
    </select>
</body>
</html>