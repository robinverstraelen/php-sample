<?php
error_reporting(E_ALL);
echo "Connecting<br/>";

$dbhost = "%DB_TIER_IP%";
$dbuser = "appuser";
$dbpass = "C1sco123&";
$db = "employees";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

echo "Connected Successfully<br/>";
$emp_no = $_GET["id"];

if (empty($_GET["id"])) {
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
?>

