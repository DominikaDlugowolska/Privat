<?php
include "./conn.php";


$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

$data = array();

while($row = $result->fetch_assoc()) {
    $data[] = $row;
    /*echo "<div class=\"comment\">";
    echo "id: " . $row["id"]. " - Name: " . $row["user"]. " " . $row["comment"]. "<br>";
    echo "</div>"; */
}
echo json_encode($data);

//$conn->close();
?>