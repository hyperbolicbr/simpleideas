<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="si-post">
	<div class="si-post-header"><h1 class="si-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
	<div class="si-post-content">
		<?php the_content(); ?>
	</div>

</div>
<?php endwhile; ?>

<?php get_footer(); ?>
