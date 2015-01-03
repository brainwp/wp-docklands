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
get_sidebar( 'left' );
?>

	<div id="primary" class="col-sm-9">
		<div id="content" class="site-content" role="main">

			<div class="col-sm-12 slider-home">
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

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
