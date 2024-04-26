<?php


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


 class essai_2 extends Model{
public function store(Request $request)
{
    $name = $request->input('name${index}');
    $email = $request->input('email${index}');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pfe";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    $sql = "INSERT INTO table_tests (col1, col2) VALUES ('$name', '$email')";

    if ($conn->query($sql) === true) {
        // Insertion réussie
        echo "Données insérées avec succès";
    } else {
        // Erreur lors de l'insertion
        echo "Erreur lors de l'insertion des données : " . $conn->error;
    }
    
    // Fermer la connexion à la base de données
    $conn->close();
    
}}




?>