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
            $stmt = $db->prepare("INSERT INTO `utilisateur`(`firstname`, `lastname`, `username`,`email`) VALUES (:firstname,:lastname, :username, :email)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

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
              $stmt = $db->query("SELECT * 
                                         FROM article
                                         ");
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              echo "Error fetching articles: " . $e->getMessage();
          }
      }
      public function deleteArticle($articleId) {
        try {
          $db=$this->db_connect();
            $stmt = $db->prepare("DELETE FROM `article` WHERE Id = :Id");
            $stmt->bindParam(':Id', $articleId);
            $stmt->execute();
            echo "<script>alert('Article deleted successfully!')</script>";
        } catch (PDOException $e) {
            echo "Error deleting article: " . $e->getMessage();
        }
    }
    }
?>