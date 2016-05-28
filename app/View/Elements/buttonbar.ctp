<?php

if(!empty($controller)){
    
    if(isset($pass)){
        
        $pass = $pass;
    }else{
        
        $pass = null;
    }

    $command = array('controller' => $controller,  'action' => 'add',$pass);

}else{
    
    $command = array('action' => 'add');
}

 if(isset($text)){
        
        $text = $text;
    }else{
        
        $text = 'Add';
    }

?>

<div class="panel panel-primary">
<div class="panel-body">
<a href="<?php echo Router::url($command); ?>" class="btn btn-success" role="button"><?php echo $text; ?></a>
</div>
</div>