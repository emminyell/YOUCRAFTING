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
      public function CreateArticle($firstname,$lastname,$username,$email,$password){
        try{
            $db=$this->db_connect();
            $stmt = $db->prepare("INSERT INTO `utilisateur`(`firstname`, `lastname`, `username`,`email`,`password`) VALUES (:firstname,:lastname, :username, :email , :password)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        }
}
  // $objet = new Database();
  // var_dump($objet->db_connect());
?>