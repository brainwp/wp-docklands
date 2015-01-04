<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<div id="primary" class="col-sm-12">
		<div id="content" class="site-content home" role="main">

			<?php get_sidebar( 'left' ); ?>

			<div class="col-sm-9 right">

				<div class="slider-home">
				</div><!-- slider-home -->

				<h3 class="bg-title">New Arrivals</h3>
				
				<div class="col-sm-12 arrivals">
					<div class="each col-sm-4">
						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								Dododo dododd, dododododod dododododo.
							</span><!-- desc -->
							
							<div class="preco">
								<span class="string-preco">Our Price </span>
								<span class="moeda-preco"> £ </span>
								<span class="o-preco">23,99</span>
								<span class="imposto-preco">(Inc. Vat £ 28,78)</span>
							</div><!-- preco -->

							<div class="bottom">
								<a href="" class="btn cart">
									Add to cart
								</a>
								<a href="" class="btn details pull-right">
									Details
								</a>
							</div><!-- bottom -->
							
						</div><!-- content -->
					</div><!-- each -->
					<div class="each col-sm-4">
						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								Dododo dododd, dododododod dododododo.
							</span><!-- desc -->
							
							<div class="preco">
								<span class="string-preco">Our Price </span>
								<span class="moeda-preco"> £ </span>
								<span class="o-preco">23,99</span>
								<span class="imposto-preco">(Inc. Vat £ 28,78)</span>
							</div><!-- preco -->

							<div class="bottom">
								<a href="" class="btn cart">
									Add to cart
								</a>
								<a href="" class="btn details pull-right">
									Details
								</a>
							</div><!-- bottom -->
							
						</div><!-- content -->
					</div><!-- each -->
					<div class="each col-sm-4">
						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								Dododo dododd, dododododod dododododo.
							</span><!-- desc -->

							<div class="preco">
								<span class="string-preco">Our Price </span>
								<span class="moeda-preco"> £ </span>
								<span class="o-preco">23,99</span>
								<span class="imposto-preco">(Inc. Vat £ 28,78)</span>
							</div><!-- preco -->

							<div class="bottom">
								<a href="" class="btn cart">
									Add to cart
								</a>
								<a href="" class="btn details pull-right">
									Details
								</a>
							</div><!-- bottom -->
							
						</div><!-- content -->
					</div><!-- each -->
				</div><!-- arrivals -->

			</div><!-- right -->

			<div class="col-sm-12 full">

				<div class="col-sm-6 banner">
					<div class="content">
						BANNER
					</div><!-- content -->
				</div><!-- banner -->

				<div class="col-sm-6 video">
					<div class="content">
						VÍDEO
					</div><!-- content -->
				</div><!-- video -->

				<?php if ( $differential = get_field( 'home_differential', 'options' ) ) : ?>
					
					<div class="differential col-xs-12">
						<h4>Why Docklands are unique:</h4>
						<span><?php echo $differential; ?></span>
					</div><!-- differential -->

				<?php endif ?>

				<?php if ( $banner_2 = get_field( 'home_banner_2', 'options' ) ) : ?>
					
					<div class="banner col-sm-6">
						<img src="<?php echo $banner_2; ?>" alt="">
					</div><!-- banner -->

				<?php endif ?>

				<?php if ( $banner_3 = get_field( 'home_banner_3', 'options' ) ) : ?>
					
					<div class="banner col-sm-6">
						<img src="<?php echo $banner_3; ?>" alt="">
					</div><!-- banner -->

				<?php endif ?>

			</div><!-- full -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
