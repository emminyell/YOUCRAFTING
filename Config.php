<?php
class Database{
    private String $host;
    private string $user;
    private string $pass;
    private string  $db;
  
    public function __construct() {
      $this->db_connect();
    }
  
    public function db_connect(){
      $this->host = '127.0.0.1:3307';
      $this->user = 'root';
      $this->pass = '';
      $this->db = 'youcrafting';
  
      try {
        return new PDO("mysql:host=127.0.0.1:3307;dbname=youcrafting", $this->user, $this->pass);
 
        } catch (PDOException $pe) {
        return 'xcvbn,';
        }
      }
      public function CreateUser($firstname,$lastname,$username,$email,$titre,$contenu,$date_creation){
        try{
            $db=$this->db_connect();
            $stmt = $db->prepare("INSERT INTO `utilisateur`(`firstname`, `lastname`, `username`,`email`,`password`) VALUES (:firstname,:lastname, :username, :email , :password)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            // Récupérer l'ID de l'utilisateur nouvellement inséré
        $userId = $db->lastInsertId();
        $date_creation=date('y_m_d h:i:s');

        // Insérer dans la table "article" avec l'ID de l'utilisateur associé
        $stmtArticle = $db->prepare("INSERT INTO `article`(`user_id`, `titre`, `contenu`, `date_de_creation`) VALUES (:user_id, :titre, :contenu,:date_creation)");
        $stmtArticle->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtArticle->bindParam(':titre', $titre);
        $stmtArticle->bindParam(':contenu', $contenu);
        $stmtArticle->bindParam(':date_creation', $date_creation);
        $stmtArticle->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        }
        public function getAllArticlesWithUser() {
          try {
            $db=$this->db_connect();
              $stmt = $db->query("SELECT utilisateur.username, article.titre, article.contenu, article.date_de_creation 
                                         FROM utilisateur
                                         JOIN article ON utilisateur.user_id = article.user_id");
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              echo "Error fetching articles: " . $e->getMessage();
          }
      }
      public function deleteArticle($articleId) {
        try {
          $db=$this->db_connect();
            $stmt = $db->prepare("DELETE FROM `article` WHERE Id = :Id");
            $stmt->bindParam(':Id', $articleId, PDO::PARAM_INT);
            $stmt->execute();
            echo "<script>alert('Article deleted successfully!')</script>";
        } catch (PDOException $e) {
            echo "Error deleting article: " . $e->getMessage();
        }
    }
        public function createArticle($titre, $contenu, $dateCreation) {
          try {
            $db=$this->db_connect();
  
              // Insérer dans la table "article" avec le titre, le contenu et la date de création
              $stmtArticle = $db->prepare("INSERT INTO `article`(`user_id`, `titre`, `contenu`, `date_de_creation`) VALUES (:user_id, :titre, :contenu, :date_creation)");
              $stmtArticle->bindParam(':user_id', $userId, PDO::PARAM_INT);
              $stmtArticle->bindParam(':titre', $titre);
              $stmtArticle->bindParam(':contenu', $contenu);
              $stmtArticle->bindParam(':date_creation', $date_creation);
              $stmtArticle->execute();
          } catch (PDOException $e) {
              echo "Erreur lors de la création de l'article : " . $e->getMessage();
          }
      }
    }
  // $objet = new Database();
  // var_dump($objet->db_connect());
?>