<?php
// Get the part data
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($make_id == null || $make_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid part data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the part to the database  
    $query = 'INSERT INTO parts
                 (makeID, partCode, partName, listPrice)
              VALUES
                 (:make_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    // Display the part List page
    include('index.php');
}
?>