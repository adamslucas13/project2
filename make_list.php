<?php
require_once('database.php');

// Get all makes
$query = 'SELECT * FROM makes
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
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Part Manager</h1></header>
<main>
    <h1>Make List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($makes as $make) : ?>
        <tr>
            <td><?php echo $make['makeName']; ?></td>
            <td>
                <form action="delete_make.php" method="post"
                      id="delete_part">
                    <input type="hidden" name="make_id"
                           value="<?php echo $make['makeID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        
        <!-- Add a php block with a foreach loop and you will need an echo statement 
		as well see page 151 in the textbook -->
    
    </table>

    <h2>Add Make</h2>
    <form action="add_part.php" method="post"
          id="add_part_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_part_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">parts list</a></p>
    
    <!-- Add a php block with a foreach loop and you will need an echo statement 
		as well see page 151 in the textbook -->
    
    <br>
    <p><a href="index.php">List Parts</a></p>
    

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Dooley's Automotive, Inc.</p>
    </footer>
</body>
</html>