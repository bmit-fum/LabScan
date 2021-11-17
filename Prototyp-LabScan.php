<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Datenbank Verbindung</title>
    </head>
    <body>
    <form action="insert.php" method="post">
    <p>
        <label for="Bezeichnung">Bezeichnung:</label>
        <input type="text" name="Bezeichnung" id="Bezeichnung">
    </p>
    <p>
        <label for="Kategorie">Kategorie:</label>
        <input type="text" name="Kategorie" id="Kategorie">
    </p>
    <p>
        <label for="Beschreibung">Beschreibung:</label>
        <input type="text" name="Beschreibung" id="Beschreibung">
    </p>
    <input type="submit" value="Submit">
</form>
    <?php
$username = "root";
$password = "";
$database = "prototyp-labscan";

$mysqli = new mysqli("localhost", $username, $password, $database);


$query = "SELECT * FROM test";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Bezeichnung</font> </td> 
          <td> <font face="Arial">Kategorie</font> </td> 
          <td> <font face="Arial">Beschreibung</font> </td> 
          <td> <font face="Arial">Ausleihstatus</font> </td> 
          <td> <font face="Arial">Ausleihfrist</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1 = $row["Bezeichnung"];
        $field2 = $row["Kategorie"];
        $field3 = $row["Beschreibung"];
        $field4 = $row["Ausleihstatus"];
        $field5 = $row["Ausleihfrist"]; 

        echo '<tr> 
                  <td>'.$field1.'</td> 
                  <td>'.$field2.'</td> 
                  <td>'.$field3.'</td> 
                  <td>'.$field4.'</td> 
                  <td>'.$field5.'</td> 
              </tr>';
    }
    $result->free();
} 

$Bezeichnung = mysqli_real_escape_string($mysqli, $_REQUEST['Bezeichnung']);
$Kategorie = mysqli_real_escape_string($mysqli, $_REQUEST['Kategorie']);
$Beschreibung = mysqli_real_escape_string($mysqli, $_REQUEST['Beschreibung']);
 
// Attempt insert query execution
$sql = "INSERT INTO test (Bezeichnung, Kategorie, Beschreibung) VALUES ('$Bezeichnung', '$Kategorie', '$Beschreibung')";
if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$mysqli->close();
?>
    </body>
    </html>