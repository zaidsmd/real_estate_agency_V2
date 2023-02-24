<?php
$servername = "localhost";
$user = "root";
$password = '';
$dbname = "world";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};
if (isset($_GET["id"])) {
    $country_id = $_GET["id"];
    $statement = $conn->prepare("SELECT name FROM cities WHERE country_id = $country_id");
    $statement->execute();
    $result = $statement->fetchAll();
    echo json_encode($result);
} else {
    $statement = $conn->prepare("SELECT name , id FROM countries");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $country) {
        ?>
        <option value="<?= $country["id"] ?>"><?= $country["name"] ?></option>
        <?php
    };
}
