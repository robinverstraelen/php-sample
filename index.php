<?php
print("It works!! :)");
print(getHostByName(getHostName()));
$db_ip = "%DB_TIER_IP%";
print($db_ip);

function OpenCon(){
    $dbhost = "%DB_TIER_IP%";
    $dbuser = "appuser";
    $dbpass = "C1sco123&";
    $db = "employees";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}
 
function CloseCon($conn){
    $conn -> close();
}

$conn = OpenCon();
echo "Connected Successfully<br/>";
$emp_no = $_GET["id"];

if (empty($_GET)) {
    echo "No id provided";
}
else {
    $sql = "SELECT first_name, last_name, salary FROM employees INNER JOIN salaries ON employees.emp_no = salaries.emp_no WHERE salaries.to_date like '%9999%' AND employees.emp_no = $emp_no";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["first_name"] . " " . $row["last_name"] . " - " . "Salary: " . $row["salary"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}
CloseCon($conn);
?>

