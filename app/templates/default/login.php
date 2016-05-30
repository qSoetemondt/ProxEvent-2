<?php $this->layout('layout', ['title' => 'Login']) ?>



<?php $this->start('main_content') ?>

<form method="POST" id="formLogin">
<div class="row">
    
    <div class="col-md-offset-1 col-md-5">
        <div class="form-group">
            <label class='labelForm' for="Login">Login</label>
            <input type="text" class="form-control" id="login" placeholder="Login" name="myForm[username]" value="<?= (isset($_POST['myForm']['username']))?$_POST['myForm']['username']:''?>">
        </div>
    </div>

    <div class=" col-md-5">
        <div class="form-group">
            <label class='labelForm' for="Password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="myForm[password]">
        </div>
    </div>
</div>
<h3 class='errorForm'>
<?php if(isset($errors['user'])){
        echo $errors['user'];
    }?>
</h3>
<div class="row">
    <div id="btnLogin">
        <button class="btn btn-primary" href="<?= $this->url('oublie')?>">Mot de passe oublié ?</a>
        <button type="submit" class="btn btn-primary" id="btnLog" name="connexion">Connexion</button>
    </div>
</div>

</form>





<?php $this->stop('main_content') ?>




<?php $this->start('footer') ?>
	
   
<?php $this->stop('footer') ?>
