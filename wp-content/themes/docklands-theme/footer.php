<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- #main -->

		<footer id="footer" role="contentinfo">

			<div class="top">

				<div class="col-sm-2">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'first-footer-menu',
								'depth'          => 1,
								'container'      => false,
								'menu_class'     => 'menu-footer',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div>
				<div class="col-sm-2">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'second-footer-menu',
								'depth'          => 1,
								'container'      => false,
								'menu_class'     => 'menu-footer',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div>
				<div class="col-sm-4 contacts">

					<span class="title">Contacts:</span>

					<?php if ( $address = get_field( 'footer_address', 'options' ) ) : ?>
						<span class="address"><?php echo $address; ?></span>
					<?php endif; ?>

					<?php if ( $phone = get_field( 'footer_phone', 'options' ) ) : ?>
						<span class="phone"><?php echo $phone; ?></span>
					<?php endif; ?>

					<?php if ( $fax = get_field( 'footer_fax', 'options' ) ) : ?>
						<span class="fax"><?php echo $fax; ?></span>
					<?php endif; ?>

					<?php if ( $email = get_field( 'footer_email', 'options' ) ) : ?>
						<span class="email"><?php echo $email; ?></span>
					<?php endif; ?>

				</div>

				<div class="col-sm-4 social-media">
					<div class="top">
						<div class="col-sm-3 youtube"></div>
						<div class="col-sm-3 googleplus"></div>
						<div class="col-sm-3 twitter"></div>
						<div class="col-sm-3 facebook"></div>
					</div><!-- top -->
					<div class="bottom col-sm-12">
						<span class="join">Join the Docklands Office Furniture Newsletter:</span>
						<span>Sign up now for our latest offers, news and discounts</span>
					</div><!-- bottom -->
				</div><!-- social-media -->

			</div><!-- top -->

			<div class="clear"></div>

			<div class="site-info">
				<span><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> &copy; <?php echo date( 'Y' ); ?></span>
			</div><!-- .site-info -->
		</footer><!-- #footer -->
	</div><!-- .container -->

	<a href="#header" class="btn back-top"></a>

	<?php wp_footer(); ?>
</body>
</html>
