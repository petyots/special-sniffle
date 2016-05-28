<?php

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        
        echo $this->html->script("jquery.js");
        echo $this->Html->script("bootstrap.min.js");
        
	?>
    <style type="text/css">
    
    .nav-sidebar { 
    width: 100%;
    padding: 8px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    -webkit-border-radius: 4px 0 0 4px; 
    -moz-border-radius: 4px 0 0 4px; 
    border-radius: 4px 0 0 4px; 
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #428bca; 
    color: #fff; 
    text-shadow: 1px 1px 1px #666; 
}
.nav-sidebar .active a:hover {
    background-color: #428bca;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}

/* Right-aligned sidebar */
.nav-sidebar.pull-right { 
    border-right: 0; 
    border-left: 1px solid #ddd; 
}
.nav-sidebar.pull-right a {
    -webkit-border-radius: 0 4px 4px 0; 
    -moz-border-radius: 0 4px 4px 0; 
    border-radius: 0 4px 4px 0; 
}
    
    </style>
    
    </head>
<body>




        <div class="container-fluid">
            <div class="row">



    <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a target="_blank" href="#" class="navbar-brand">ActiveLandlord</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo Router::url(array('controller' => 'dashboard')); ?>">Home</a></li>
             </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong><?php echo $this->Session->read('Operator.username') ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>

                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $this->Session->read('Operator.username') ?></strong></p>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="/Operator/logout" role="button" class="btn btn-danger btn-block">LOGOUT</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
       
              
              
              
              
              
              
              
              
              
              
              
              
              <div class="col-sm-12">
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="col-sm-2">
                
                <nav class="nav-sidebar">
                <ul class="nav">
                    <li><a href="<?php echo Router::url(array('controller'=> 'Dashboard', 'action' => 'index')); ?>">Home</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Property', 'action' => 'index')); ?>">Properties</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Room', 'action' => 'index')); ?>">Rooms</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Tenant', 'action' => 'index')); ?>">Tenants</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Rent', 'action' => 'index')); ?>">Rents</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Pending', 'action' => 'index')); ?>">Pending</a></li>
                    <li><a href="<?php echo Router::url(array('controller'=> 'Tenant', 'action' => 'find')); ?>">SEARCH</a></li>
                    <li class="nav-divider"></li>
                    
            </nav>
                </div>
 
                <div class="col-sm-10">
			

            <div class="col-sm-12">

            <?php echo $this->Session->flash(); ?>

            </div>

			<?php echo $this->fetch('content'); ?>

                </div>
		   
           </div>
        </div>
    
    
    
    
    
    </div> <!-- CONTAINER END !-->
       
	
	
</body>
</html>
