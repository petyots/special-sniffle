 <!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		ActiveLandlord: <?php echo $this->fetch('title'); ?>
	</title>

    <?php
		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

        echo $this->html->script("jquery.js");
        echo $this->Html->script("bootstrap.min.js");

	?>

</head>
<body>
<div class="row">
    <div class ="col-sm-12">

      <div class="col-sm-12">

            <?php echo $this->Session->flash(); ?>

      </div>

      <?php echo $this->fetch('content'); ?>

      </div>
</body>
</html>