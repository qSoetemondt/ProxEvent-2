<?php $this->layout('layout', ['title' => 'Mot de passe perdu']) ?>



<?php $this->start('main_content') ?>

<form method="POST" id="formLogin">
    <div class="row" class="mailOublierow" >
        <div id="mailOublie">
                <label class='labelForm' for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Votr email">
               
            </div>
        </div>
        <div class="row">
            <div id="btnLogin">
               <button type="submit" class="btn btn-primary" id="btnLog" name="reinit">Réinitialisez votre mot de passe.</button>
            </div>
        </div>
        <?php if(isset($errors['email'])){
            echo "<p class='errorForm'>".$errors['email']."</p>";
        }?>
    </div>
 </form>
 
<?php $this->stop('main_content') ?>