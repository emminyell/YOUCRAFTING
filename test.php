<?php
    @include 'Config.php';
 
    if(ISSET($_POST['insert'])){

    
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

    $objet= new Database();
    $objet->CreateArticle($firstname,$lastname,$username,$email,$password);
        echo "<script>alert('Successfully inserted data!')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body>
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" >
                <div class="modal-header">
                    <h3 class="modal-title">Add User</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input class="form-control" type="text" name="firstname"/>
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input class="form-control" type="text" name="lastname"/>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username"/>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control" type="email" name="email"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password"/>
                        </div>
                    </div>    
                </div>
                <br style="clear:both;"/>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button class="btn btn-primary" name="insert"><span class="glyphicon glyphicon-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>    