
<?php
ini_set('max_execution_time', 300);
//page migracao
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
$registros = 300;
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
//calcula o número de páginas arredondando o resultado para cima
///$numPaginas = ceil($total/$registros);
///echo 'numero de pagina:'.$numPaginas . '<br><hr>';
//variavel para calcular o início da visualização com base na página atual
$inicio = ($registros*$pagina)-$registros;
$conecta = mysql_connect('localhost', 'maracatu_dockold', '123brasa') or print (mysql_error());
mysql_select_db('maracatu_docklands_migrar', $conecta) or print(mysql_error());
$sql = 'SELECT * FROM temp0 ORDER BY `type` DESC LIMIT '.$inicio.','.$registros;
$result = mysql_query($sql, $conecta);
$pagina_next = intval($pagina) + 1;
/* Escreve resultados até que não haja mais linhas na tabela */

function migrar_array( $consulta ){
	$postdata = array(
		'post_type'  =>  'product',
		'post_title' => $consulta['produto'],
		'post_content' => str_replace('*', '</br>', $consulta['the_content']),
		'post_excerpt' => $consulta['resumo'],
		'post_status' => 'publish'
	);
	if( $consulta['type'] == 'N' ) {
		$postdata['post_type'] = 'product_variation';
		$product = get_page_by_title( $consulta['produto'], OBJECT, 'product' );
		if( $product && is_object( $product ) ) {
			$postdata['post_parent'] = $product->ID;
		}
	}
	$_id = wp_insert_post( $postdata );
	if( !is_wp_error($_id) ) {
			if( $consulta['type'] == 'N' ) {
				$product = get_page_by_title( $consulta['produto'], OBJECT, 'product' );
				if( $product && is_object($product) ){
				wp_set_object_terms( $product->ID, 'variable', 'product_type');
				$thedata = get_post_meta( $product->ID, '_product_attributes', true );

				if( $thedata && !empty( $thedata ) && is_array( $thedata ) ){
					echo 'if thedata = true<br>';
					$colors = explode(' | ', $thedata['pa_color']['value']);
					if( !in_array($consulta['colour'], $colors) ) {
						$thedata['pa_color']['value'] .= ' | ' . $consulta['colour'];
					}
					$sizes = explode(' | ', $thedata['pa_size']['value']);
					if( !in_array($consulta['size'], $sizes) ) {
						$thedata['pa_size']['value'] .= ' | ' . $consulta['size'];
					}
					$models = explode(' | ', $thedata['pa_model']['value']);
					if( !in_array($consulta['the_title'], $models) ) {
						$thedata['pa_model']['value'] .= ' | ' . $consulta['the_title'];
					}
				}
				else{
					echo 'if thedata = false<br>';
					$thedata = array(
						'pa_model' =>
							array(
								'name'=>	__('Model','odin'),
								'value'=>	$consulta['the_title'],
								'is_visible' =>	 1,
        						'is_variation' => 1,
        						'is_taxonomy' => 0
        					),
						'pa_color' =>
							array(
								'name'=>	__('Colors','odin'),
								'value'=>	$consulta['colour'],
								'is_visible' =>	 1,
        						'is_variation' => 1,
        						'is_taxonomy' => 0
        					),
        				'pa_size' =>
							array(
								'name'=>	__('Size','odin'),
								'value'=>	$consulta['size'],
								'is_visible' =>	 1,
        						'is_variation' => 1,
        						'is_taxonomy' => 0
        					),
        			);
				}
				wp_set_object_terms( $_id, $consulta['size'], 'pa_size' );
				wp_set_object_terms( $_id, $consulta['colour'], 'pa_color' );
				wp_set_object_terms( $_id, $consulta['the_title'], 'pa_model' );

        		update_post_meta( $product->ID,'_product_attributes',$thedata);
        		echo 'the_data<br>';
        		var_dump( get_post_meta( $product->ID, '_product_attributes', true ) );
        		echo '<br>';
        		update_post_meta( $_id, 'attribute_colors', $consulta['colour'] );
        		echo 'attr colors<br>';
        		var_dump( get_post_meta( $_id, 'attribute_colors' ) );
        		echo '<br>';

        		update_post_meta( $_id, 'attribute_size', $consulta['size'] );
        		echo 'attr size<br>';
        		var_dump( get_post_meta( $_id, 'attribute_size' ) );
        		echo '<br>';
        		update_post_meta( $_id, 'attribute_model', $consulta['the_title'] );
        		echo 'attr model<br>';
        		var_dump( get_post_meta( $_id, 'attribute_model' ) );
        		echo '<br>';

				$product = get_page_by_title( $consulta['produto'], OBJECT, 'product' );
				if( $product && is_object( $product ) ) {
					$_product = wc_get_product( $product->ID );
        			$_product->variable_product_sync();
        			do_action( 'edit_post', $product->ID, $product );
        			do_action( 'edit_post_product', $product->ID, $product );

        			do_action( "save_post_product", $product->ID, $product, null );
        			do_action( 'save_post', $product->ID, $product, null );

        			do_action( 'pre_post_update', $product->ID );

        			$my_post = array(
        				'ID'           => $product->ID,
        				'post_title'   => $product->post_title,
        			);

        			// Update the post into the database
        			wp_update_post( $my_post );
        		}
        	}
        }
        update_post_meta( $_id, '_sku', $consulta['sku'] );
        echo get_post_meta( $_id, '_sku', true );
		echo 'antes: ' . $consulta['price'] . '<br>';
		$price = substr( $consulta['price'], 1 );
		echo 'dps: ' . $price . '<br>';
		update_post_meta( $_id, '_regular_price', $price );
		update_post_meta( $_id, '_price', $price );
		$price = intval($price);
		if( $price <= 299 ){
			$name = sprintf('Under %s299', get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 300 && $price <= 599 ){
			$name = sprintf('%s300 to %s599', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 600 && $price <= 899 ){
			$name = sprintf('%s600 to %s899', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 900 && $price <= 1199 ){
			$name = sprintf('%s900 to %s1,199', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 1200 && $price <= 1499 ){
			$name = sprintf('%1,200 to %s1,499', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 1500 && $price <= 1799 ){
			$name = sprintf('%s1,500 to %s1,799', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 1800 && $price <= 2099 ){
			$name = sprintf('%s1,800 to %s2,099', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 2100 && $price <= 2399 ){
			$name = sprintf('%s2,100 to %s2,399', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 2400 && $price <= 2699 ){
			$name = sprintf('%s2,400 to %s2,699', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 2700 && $price <= 3999 ){
			$name = sprintf('%s2,700 to %s3,999', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}
		if( $price >= 4000 ){
			$name = sprintf('Above %s4,000', get_woocommerce_currency_symbol(), get_woocommerce_currency_symbol());
			$search_term = get_term_by( 'name', $name, 'price', OBJECT );
			if($search_term){
				wp_set_post_terms( $_id, $search_term->term_id, 'price' );
			}
			else{
				$term = wp_insert_term( $name, 'price', array());
				wp_set_post_terms( $_id, array($term['term_id']), 'price' );
			}
		}

		$search_term = get_term_by( 'name', $consulta['colour'], 'color', OBJECT );
		if($search_term){
			wp_set_post_terms( $_id, $search_term->term_id, 'color' );
		}
		else{
			$term = wp_insert_term( $consulta['colour'], 'color', array());
			wp_set_post_terms( $_id, $term, 'color' );
		}
		$search_term = get_term_by( 'name', $consulta['brand'], 'brands', OBJECT );
		if($search_term){
			wp_set_post_terms( $_id, $search_term->term_id, 'brands' );
		}
		else{
			$term = wp_insert_term( $consulta['brand'], 'brands', array());
			wp_set_post_terms( $_id, $term, 'brands' );
		}
		$search_term = get_term_by( 'name', 'New', 'product_condition', OBJECT );
		if($search_term){
			wp_set_post_terms( $_id, $search_term->term_id, 'product_condition' );
		}
		else{
			$term = wp_insert_term( 'New', 'product_condition', array());
			wp_set_post_terms( $_id, $term, 'product_condition' );
		}
		$cats = array();
		$search_term = get_term_by( 'name', $consulta['category'], 'product_cat', OBJECT );
		if($search_term){
			$cats[] = $search_term->term_id;
			$father_term = $search_term;
		}
		else{
			$term = wp_insert_term( $consulta['category'], 'product_cat', array());
			$cats[] = $term['term_id'];
			$father_term = $term;
		}
		$search_term = get_term_by( 'name', $consulta['subcat'], 'product_cat', OBJECT );
		if($search_term){
			$cats[] = $search_term->term_id;
			$father_term = $search_term;
		}
		else{
			if( is_object($father_term) ){
				$term = wp_insert_term( $consulta['subcat'], 'product_cat', array('parent' => $father_term->term_id));
			}
			else{
				$term = wp_insert_term( $consulta['subcat'], 'product_cat', array('parent' => $father_term['term_id']));
			}
			$cats[] = $term['term_id'];
			$father_term = $term;
		}
		$search_term = get_term_by( 'name', $consulta['thirdcat'], 'product_cat', OBJECT );
		if($search_term){
			$cats[] = $search_term->term_id;
		}
		else{
			if( is_object($father_term) ){
				$term = wp_insert_term( $consulta['thirdcat'], 'product_cat', array('parent' => $father_term->term_id));
			}
			else{
				$term = wp_insert_term( $consulta['thirdcat'], 'product_cat', array('parent' => $father_term['term_id']));
			}
			$cats[] = $term['term_id'];
		}
		if( $consulta['type'] == 'Y' ){
			wp_set_post_terms( $_id, $cats, 'product_cat' );
		}
		//add thumbnail
		// $filename should be the path to a file in the upload directory.
		$_file = get_template_directory_uri() . '/assets/images/import/' . $consulta['thumbnail'];
		if(!file_exists($_file)){
			echo 'if nao existe<br>';
			$_file = str_replace('JPEG', 'jpg', $_file);
			$_file = str_replace('jpeg', 'jpg', $_file);
			$_file = str_replace('PNG', 'png', $_file);
		}
		$tmp = download_url($_file);
		$file_array = array();
		$file_array['name'] = $_file;
		$file_array['tmp_name'] = $tmp;

		// If error storing temporarily, unlink
		if ( is_wp_error( $tmp ) ) {
			@unlink($file_array['tmp_name']);
			$file_array['tmp_name'] = '';
		}
        // do the validation and storage stuff
	    $img_id = media_handle_sideload( $file_array, $_id, $consulta['the_title'] );

		var_dump($img_id);
		// Check the type of file. We'll use this as the 'post_mime_type'.
		//$filetype = $_file['type'];

		set_post_thumbnail($_id,$img_id);

		// Insert the attachment.
		//$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );

		// Generate the metadata for the attachment, and update the database record
		//$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		//wp_update_attachment_metadata( $attach_id, $attach_data );
		//set_post_thumbnail($_id,$attach_id);

		echo "Created : ". $_id . '<br><hr>';
	}
}
while($consulta = mysql_fetch_array($result)) {
	migrar_array($consulta);
}
mysql_free_result($result);
mysql_close($conecta);
?>
