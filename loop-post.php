<?php while ( have_posts() ) : the_post(); ?>
<div class="si-post">
	<div class="si-post-header"><h1 class="si-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
	<div class="si-post-meta">
		<span class="si-post-author"><b class="glyphicon glyphicon-user"></b> Por <a href="#"><?php the_author(); ?></a> em <?php echo get_the_date("d/m/Y"); ?></span>
		<span class="si-post-categories"><b class="glyphicon glyphicon-tags"></b> <?php the_category(", "); ?></span>
		<span class="si-post-comments"><?php if (comments_open()) { ?><b class="glyphicon glyphicon-comment"></b> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('no responses', 'simpleideas'), __('one response',  'simpleideas'), __('% responses',  'simpleideas') ); ?></a></span><?php } ?>
	</div>
	<div class="si-post-content">
		<?php if (is_single()) { the_content(); } else { the_excerpt(); } ?>
	</div>

</div>
<?php endwhile; ?>