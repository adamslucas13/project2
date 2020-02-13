<?php
require_once('database.php');

// Get make ID
if (!isset($make_id)) {
    $make_id = filter_input(INPUT_GET, 'make_id', 
            FILTER_VALIDATE_INT);
    if ($make_id == NULL || $make_id == FALSE) {
        $make_id = 1;
    }
}
// Get name for selected make
$querymake = 'SELECT * FROM makes
                  WHERE makeID = :make_id';
$statement1 = $db->prepare($querymake);
$statement1->bindValue(':make_id', $make_id);
$statement1->execute();
$make = $statement1->fetch();
$make_name = $make['makeName'];
$statement1->closeCursor();


// Get all makes
$query = 'SELECT * FROM makes
                       ORDER BY makeID';
$statement = $db->prepare($query);
$statement->execute();
$makes = $statement->fetchAll();
$statement->closeCursor();

// Get parts for selected make
$queryparts = 'SELECT * FROM parts
                  WHERE makeID = :make_id
                  ORDER BY partID';
$statement3 = $db->prepare($queryparts);
$statement3->bindValue(':make_id', $make_id);
$statement3->execute();
$parts = $statement3->fetchAll();
$statement3->closeCursor();
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
    <h1>Part List</h1>

    <aside>
        <!-- display a list of makes -->
        <h2>Makes</h2>
        <nav>
        <ul>
            <?php foreach ($makes as $make) : ?>
            <li><a href=".?make_id=<?php echo $make['makeID']; ?>">
                    <?php echo $make['makeName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of parts -->
        <h2><?php echo $make_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($parts as $part) : ?>
            <tr>
                <td><?php echo $part['partCode']; ?></td>
                <td><?php echo $part['partName']; ?></td>
                <td class="right"><?php echo $part['listPrice']; ?></td>
                <td><form action="delete_part.php" method="post">
                    <input type="hidden" name="part_id"
                           value="<?php echo $part['partID']; ?>">
                    <input type="hidden" name="make_id"
                           value="<?php echo $part['makeID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_part_form.php">Add Part</a></p>
        <p><a href="make_list.php">List Makes</a></p>        
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Dooley's Automotive, Inc.</p>
</footer>
</body>
</html>