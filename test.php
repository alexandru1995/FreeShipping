<?php

$sql = "SELECT * from blabla bla WHERE ";

if (isset($_GET["text"])) {
    $sql .= "text = 'test' or ";
}

if (isset($_GET["colet"])) {
    $sql .= " colet = 'test' or ";
}

$sql = rtrim($sql, "or ");

print($sql);


?>