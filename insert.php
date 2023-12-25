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
<button type="button" class="btn btn-dark"style =" margin:80px;" >
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
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$article['Id']?>">
                      modifier
                    </button>
                  <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?=$article['Id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="update.php" >
                            <input type="hidden" value="<?=$article['Id']?>" name="idd">
                          <div class="container mt-5">
                        <h2>Formulaire d'Article</h2>
                      
                            <div class="form-group">
                                <label for="titre">Titre de l'article :</label>
                                <input type="text" class="form-control" id="titre" name="nouveau_titre" value="<?= $article['titre']; ?>"required>
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu de l'article :</label>
                                <textarea class="form-control" id="contenu" name="nouveau_contenu" rows="5" value="" required><?= $article['contenu']; ?></textarea>
                            </div>
                        
                    </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark" name="Ajouter" >modifier</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
                    
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
