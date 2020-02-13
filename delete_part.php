<?php
require_once('database.php');

// Get IDs
$part_id = filter_input(INPUT_POST, 'part_id', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

// Delete the part from the database
if ($part_id != false && $make_id != false) {
    $query = 'DELETE FROM parts
              WHERE partID = :part_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':part_id', $part_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the part List page
include('index.php');