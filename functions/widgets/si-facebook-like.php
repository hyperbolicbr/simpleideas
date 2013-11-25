<?php
class SI_Facebook_Like extends WP_Widget {

	function __construct() {
		parent::__construct(
			'si_facebook_like', __("Facebook Like Page", "simpleideas"), ''
		);
	}


	public function widget( $args, $instance ) {

		echo $args['before_widget']; ?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=137130576365417";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
	    	<div class="fb-like-box" data-href="<?php echo $instance['page_url']; ?>" data-width="100%" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
		<?php echo $args['after_widget'];
	}


	public function form( $instance ) {
		if ( isset( $instance[ 'page_url' ] ) ) {
			$page_url = $instance[ 'page_url' ];
		}

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php __( 'Facebook Page URL:', "simpleideas" ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" type="text" value="<?php echo esc_attr( $page_url ); ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['page_url'] = ( ! empty( $new_instance['page_url'] ) ) ? strip_tags( $new_instance['page_url'] ) : '';

		return $instance;
	}

}