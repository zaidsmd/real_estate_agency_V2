<?php
$servername = "localhost";
$user = "root";
$password = '';
$dbname = "world";

try {
    $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};
//---------*check if this file is called by get methode or just include*--------
if (isset($_GET["id"])) {
    $country_id = $_GET["id"];
    $statement = $conn1->prepare("SELECT name FROM cities WHERE country_id = $country_id");
    $statement->execute();
    $result = $statement->fetchAll();
    echo json_encode($result);
} else {
    $statement = $conn1->prepare("SELECT name , id FROM countries");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $country) {
        ?>
        <option value="<?= $country["id"] ?>"><?= $country["name"] ?></option>
        <?php
    };
}

