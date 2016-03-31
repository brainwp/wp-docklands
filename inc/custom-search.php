<?php
// custom search
function advanced_search( $query ) {
    if ( is_search() && isset($_GET['instock']) && $_GET['instock'] == 'true' ) {
        $query->set( 'meta_key', '_stock_status' );
        $query->set( 'meta_value', 'instock' );
    }
}
add_action( 'pre_get_posts', 'advanced_search' );
?>
