<?php

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

if ($make == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    
    $query = "INSERT INTO makes (makeName)
              VALUES (:make)";
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();

    
    include('make_list.php');
}
?>