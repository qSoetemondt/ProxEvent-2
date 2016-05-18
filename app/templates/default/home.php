<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- Appel Google map -->









 <!-- Footer menu -->
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ProxEvent</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
			  <?php if(!isset($_SESSION['user'])){?>
				  <li><a href="<?= $this->url('inscription')?>">Inscription</a></li>
            	  <li><a href="<?= $this->url('login')?>">Login</a></li>
			 <?php }else{ ?>
				 <li><a href="<?= $this->url('logout')?>">Déconnexion</a></li>
				 <li><a href="<?= $this->url('home')?>">Ajout Evénement</a></li>
			<?php } ?>
            
            
          </ul>
        </div>
      </div>
    </nav>

 

 
<?php $this->stop('main_content') ?>

<?php $this->start('footer') ?>
	
   
<?php $this->stop('footer') ?>

    
      
 