<?php $this->layout('layout', ['title' => 'Inscription']) ?>



<?php $this->start('main_content') ?>
<form method="POST" id="forminscription">
<div class="row">
    <div class="col-md-offset-1 col-md-5">
        <div class="form-group">
            <label class='labelForm' for="Prenom">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="myForm[username]" value="<?= (isset($_POST['myForm']['username']))?$_POST['myForm']['username']:''?>">
            <span class="info">De 3 à 20 caractères (caractère autorisé alphanumérique - _ @)</span>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label class='labelForm' for="Password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="myForm[password]" value="<?= (isset($_POST['myForm']['password']))?$_POST['myForm']['password']:''?>">
            <span class="info">De 5 à 32 caractères (caractère autorisé alphanumérique - _ @)</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="form-group">
            <label class='labelForm' for="Email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="email" name="myForm[email]" value="<?= (isset($_POST['myForm']['email']))?$_POST['myForm']['email']:''?>">
            <span class="info">Email valide sous format : exemple@exemple.com</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-5 col-md-1">
        <button type="submit" class="btn btn-primary" name="submit">Envoyer mes informations</button>
    </div>
</div>
<?php if(isset($errors['login'])){
                echo "<p class='errorForm'>".$errors['login']."</p>";
            }?>
            <?php if(isset($errors['mdp'])){
                echo "<p class='errorForm'>".$errors['mdp']."</p>";
            }?>
            <?php if(isset($errors['email'])){
                echo "<p class='errorForm'>".$errors['email']."</p>";
            }?>
</form>




<?php $this->stop('main_content') ?>



<?php $this->start('footer') ?>
	
   
<?php $this->stop('footer') ?>
