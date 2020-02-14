<?php
// Get the part data

$name = filter_input(INPUT_POST, 'name');


// Validate inputs
if ( $name == null) {
    $error = "Invalid part data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the part to the database  
    $query = 'INSERT INTO makes
                 (  makeName )
              VALUES
                 ( :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the part List page
    include('make_list.php');
}
?>