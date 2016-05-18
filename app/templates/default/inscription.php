<?php $this->layout('layout', ['title' => 'Inscription']) ?>



<?php $this->start('main_content') ?>

<div class="row">
    <div class="col-md-offset-2 col-md-3">
        <div class="form-group">
            <label for="Prenom">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Pseudo">
        </div>
    </div>

    <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
            <label for="Password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-2 col-md-7">
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="email">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-offset-5 col-md-1">
        <button type="button" class="btn btn-primary" name="submit">Envoyer mes informations</button>
    </div>
</div>





<?php $this->stop('main_content') ?>




<?php $this->start('footer') ?>
	
   
<?php $this->stop('footer') ?>
