        <?php
        include "config.php";
        $db = new Database();
        $update= new Database();
        if(isset($_POST['idd'])){
            $ID=$_POST['idd'];
            $nouveau_titre=$_POST['nouveau_titre'];
            $nouveau_contenu=$_POST['nouveau_contenu'];
            
            $update->updateArticle($ID,$nouveau_titre,$nouveau_contenu);
        }
        header("Location: insert.php");
        ?>
        