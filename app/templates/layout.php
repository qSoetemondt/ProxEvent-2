<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<!-- Appel à notre CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	
</head>
<body>


<div data-role="page">

	<div data-role="header">
		<h1>W :: <?= $this->e($title) ?></h1>
	</div><!-- /header -->
	
	<div role="main" class="ui-content">
		<?= $this->section('main_content') ?>
	</div><!-- /content -->

	<div data-role="footer">
		<?= $this->section('footer')?>
	</div><!-- /footer -->
</div><!-- /page -->

	
</body>
</html> 