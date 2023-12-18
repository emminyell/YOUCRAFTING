<?php
include 'Config.php';
include "nav.php";
// Instantiate the Database class
$db = new Database();

// Fetch data 
$articles = $db->getAllArticlesWithUser();

if (isset($_POST['Ajouter'])) {
  $titre = $_POST['titre'];
  $contenu =$_POST['contenu'] ;

  // La date de création 
  $date_creation = date('Y-m-d H:i:s');
  $db->getAllArticlesWithUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#exampleModal" style =" margin:80px;" >
 <a href="index.php">Ajouter Article</a> 
</button>


<table class="table">
  <thead>
    <tr>
      <th scope="col">titre</th>
      <th scope="col">Contenu</th>
      <th scope="col">date de creation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['titre']; ?></td>
                <td><?= $article['contenu']; ?></td>
                <td><?= $article['date_de_creation']; ?></td>
                
                <td>
                  <!-- Bouton Modifier -->
                  <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <!-- Bouton Supprimer -->
                    <a href="delete.php?Id=<?=$article['Id']?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
