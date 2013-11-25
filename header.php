<!DOCTYPE html>
<html lang="<?php bloginfo("language"); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link href="<?php bloginfo("template_directory"); ?>/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php bloginfo("template_directory"); ?>/style.css" rel="stylesheet" />
    <?php wp_head(); ?>
    

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	
    <!-- Fixed navbar -->
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo("home"); ?>"><?php bloginfo("name"); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<?php
          		$menu_args["theme_location"] = "navigation";
				$menu_args["items_wrap"] = "%3$s";
				wp_nav_menu($menu_args);
			?>
            <?php if ((get_option("si_facebook") != null) || (get_option("si_twitter") != null) || (get_option("si_instagram") != null) || (get_option("si_linkedin") != null)) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-bullhorn si-menu-icon"></b> <?php echo __("Follow us", "simpleideas"); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<?php if (get_option("si_facebook") != null) { ?><li><a href="<?php echo get_option("si_facebook"); ?>">Facebook</a></li><?php } ?>
              	<?php if (get_option("si_twitter") != null) { ?><li><a href="<?php echo get_option("si_twitter"); ?>">Twitter</a></li><?php } ?>
              	<?php if (get_option("si_instagram") != null) { ?><li><a href="<?php echo get_option("si_instagram"); ?>">Instagram</a></li><?php } ?>
              	<?php if (get_option("si_linkedin") != null) { ?><li><a href="<?php echo get_option("si_linkedin"); ?>">LinkedIn</a></li><?php } ?>
              </ul>
            </li>
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="visible-md visible-lg"><b class="glyphicon glyphicon-search"></b> <b class="caret"></b></span><span class="hidden-md hidden-lg"><b class="glyphicon glyphicon-search si-menu-icon"></b> <?php echo __("Search"); ?> <b class="caret"></b></span></a>
              <ul class="dropdown-menu">
				<li class="si-search">
					<form class="form-inline" role="form" method="get">
						<div class="form-group"><input type="text" name="s" placeholder="<?php echo __("Search"); ?>..." class="form-control" /></div>
						<button type="submit" class="btn btn-default">Ok</button>
					</form>
				</li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container si-container">
    	<div class="row">
    		<div class="col-md-3">
    			<div class="si-sidebar affix">
	    			<?php dynamic_sidebar("left-sidebar"); ?>
    			</div>
    		</div>
    		<div class="col-md-9" role="main">
    			