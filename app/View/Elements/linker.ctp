<div class="col-sm-12">



<?php if($data['type'] === 'added'): ?>
<p class="bg-success">

<br />
To view the record press <a href="<?php echo h($data['urlToId']); ?>" class="btn btn-primary" role="button">Here</a>


<br />
<br />
To add new record press <a href="<?php echo h($data['urlToAction']); ?>" class="btn btn-success" role="button">Here</a>
</p>

<?php endif; ?>


<?php if($data['type'] === 'fail'): ?>
<p class="text-danger">
<h5>There was an error while trying to save a record... !</h5>
<br />
To try again press <a href="<?php echo h($data['urlToAction']); ?>" class="btn btn-success" role="button">Here</a>

<?php endif; ?>



</div>