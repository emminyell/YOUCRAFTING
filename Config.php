<?php
class Database{
    private String $host;
    private string $user;
    private string $pass;
    private string  $db;
  
    public function __construct() {
      $this->db_connect();
    }
  
    protected function db_connect(){
      $this->host = '127.0.0.1:3307';
      $this->user = 'root';
      $this->pass = '';
      $this->db = 'youcrafting';
  
      try {
        $conn = new PDO("mysql:'$this->host=127.0.0.1:3307';'$this->db=youcrafting'", $this->user, $this->pass);
        echo "Connected to $this->db at $this->host successfully.";
        } catch (PDOException $pe) {
        return;
        }
}
  //   public function create (){
  //     $this->db_connect();
  //   $sql = "INSERT INTO `role`(`titre`, `description`) VALUES ('admin','hello')";
  //   // use exec() because no results are returned

  //   // $conn->exec($sql);
  //   var_dump($conn);
  //   echo "New role created successfully";

  // $conn = null;


  //   }
  }
  // $objet = new Database();
  // $objet->create();
?>