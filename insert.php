<?php
include 'Config.php';
@include "nav.php";

// Instantiate the Database class
$db = new Database();

// Fetch data using a join between 'utilisateur' and 'article' tables
$articles = $db->getAllArticlesWithUser();

if (isset($_POST['Ajouter'])) {
  $titre = $_POST['titre'];
  $contenu =$_POST['contenu'] ;

  // La date de création peut être générée automatiquement
  $date_creation = date('Y-m-d H:i:s');

  // Ajouter des Articles
  if (!empty($titre) && !empty($contenu)) {
      $Article = new Database();
      $Article->createArticle($titre, $contenu, $date_creation);
      echo "<script>alert('Article créé avec succès!')</script>";
  } else {
      echo "<script>alert('Veuillez remplir tous les champs du formulaire.')</script>";
  }
}

$delete= new Database();
$delete->deleteArticle($articleId);

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
<button type="button" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#exampleModal" style =" margin:80px;">
  Ajouter Article
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container mt-5">
    <h2>Formulaire d'Article</h2>
    <form method="post" >
        <div class="form-group">
            <label for="titre">Titre de l'article :</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu de l'article :</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>
    </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" name="Ajouter" ><a href="insert.php">Ajouter</a></button>
      </div>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Auteur</th>
      <th scope="col">titre</th>
      <th scope="col">Contenu</th>
      <th scope="col">date de creation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['username']; ?></td>
                <td><?= $article['titre']; ?></td>
                <td><?= $article['contenu']; ?></td>
                <td><?= $article['date_de_creation']; ?></td>
                <td>
                  <!-- Bouton Modifier -->
                  <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <!-- Bouton Supprimer -->
                    <a href="insert.php?id='.$Id.'" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
