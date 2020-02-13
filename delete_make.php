<?php

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);


if ($make_id == null || $make_id == false) {
    $error = "Invalid make ID.";
    include('error.php');
} else {
    require_once('database.php');

      
    $query = 'DELETE FROM makes 
              WHERE makeID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();

    
    include('make_list.php');
}
?>