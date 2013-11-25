
<?php get_header(); ?>
<div class="page-header">
  <h1><?php single_cat_title(); ?></h1>
</div>
<?php get_template_part("loop", "post"); ?>
<?php get_footer(); ?>
