<?php $this->layout('layout', ['title' => 'Inscription']) ?>



<?php $this->start('main_content') ?>
<?php if(isset($errors['user'])){
        echo "<h3>".$errors['user']."</h3>";
    }?>
<form method="POST">
<div class="row">
    
    <div class="col-md-offset-2 col-md-3">
        <div class="form-group">
            <label for="Login">Login</label>
            <input type="text" class="form-control" id="login" placeholder="Login" name="myForm[username]" value="<?= (isset($_POST['myForm']['username']))?$_POST['myForm']['username']:''?>">
        </div>
    </div>

    <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
            <label for="Password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="myForm[password]">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-offset-5 col-md-1">
        <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
    </div>
</div>
</form>




<?php $this->stop('main_content') ?>




<?php $this->start('footer') ?>
	
   
<?php $this->stop('footer') ?>
