<?php
require('database.php');
$query = 'SELECT *
          FROM makes
          ORDER BY makeID';
$statement = $db->prepare($query);
$statement->execute();
$makes = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Dooley's Automotive</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Part Manager</h1></header>

    <main>
        <h1>Add Part</h1>
        <form action="add_part.php" method="post"
              id="add_part_form">

            <label>Make:</label>
            <select name="make_id">
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['makeID']; ?>">
                    <?php echo $make['makeName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add part"><br>
        </form>
        <p><a href="index.php">View Part List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Dooley's Automotive, Inc.</p>
    </footer>
</body>
</html>