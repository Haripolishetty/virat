<?php
if(isset($_COOKIE['username'])) {
    echo "<table>";
    echo "<tr><th>Username</th></tr>";
    echo "<tr><td>" . $_COOKIE['username'] . "</td></tr>";
    echo "</table>";
} else {
    echo "No user logged in";
}
?>
