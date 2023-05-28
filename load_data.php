<?php
include("db.php");

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn, $query);

echo "<table style='border: 1px solid black;'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td><button class="deleteData" id=' . $row['id'] . '>Delete</button></td>
            <td><button class="updateData" id=' . $row['id'] . '>Update</button></td>
        </tr>';
}

echo "</table>";
?>
