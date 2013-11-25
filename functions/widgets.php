<?php

require_once("widgets/si-facebook-like.php");

function si_register_widgets() {
    register_widget( 'SI_Facebook_Like' );
}
add_action( 'widgets_init', 'si_register_widgets' );