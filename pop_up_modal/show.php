<?php
include('connect.php');

$sql = "SELECT * FROM report_by_sn";
$stmt = $conn->query($sql);

// Check if the query was successful
if ($stmt) {
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        echo "<table>"; // Add this line to start the table

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td><button class='openFormBtn' data-id=''>" . $row['id_RQ'] . "</button></td>";
            echo "<td>" . $row['cuscode_id'] . "</td>";
            echo "<td>" . $row['date_app'] . "</td>";
            echo "<td>" . $row['sum_sn'] . "</td>";
            echo "<td>" . $row['Store'] . "</td>";
            echo "<td><button>" . $row['acknowledge'] . "</button></td>";
            echo "</tr>";
        }

        echo "</table>"; // Add this line to close the table
    } else {
        echo "No rows found.";
    }
} else {
    // Handle query error
    $errorInfo = $conn->errorInfo();
    echo "Query failed: " . $errorInfo[2];
}
?>
