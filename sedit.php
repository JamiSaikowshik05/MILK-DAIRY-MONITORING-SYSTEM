<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "Milkmanagementsystem";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive form values safely
if (isset($_POST['update'])) {  // Make sure form is submitted

    $ename = $_POST['ename'];
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $designation = $_POST['designation'];
    $idupdate = $_POST['id']; // ID of the employee to update

    // Update the employee details
    $sql = "UPDATE employee 
            SET ename='$ename', phno='$phno', address='$address', salary='$salary', designation='$designation' 
            WHERE eid='$idupdate'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "✅ Employee Updated Successfully!";
    } else {
        echo "❌ Update Failed: " . mysqli_error($conn);
    }
} else {
    echo "No update request received.";
}

$conn->close();
?>
