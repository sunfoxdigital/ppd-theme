			<?php
				echo '<div id=main__top>';
				echo '<a href="#content">';
				get_template_part( 'template-parts/svg/arrow-up' );
				echo '</a>';
				echo '</div>';
			?>
			
			</main>

			<footer id="colophon" class="site-footer">
				<div class="container">
					<div class="footer-logo">
						<?php echo wp_get_attachment_image( 872, 'Large', '', array('class' => '') ); ?>
						<h5>Adventure awaits,<br>but preparation comes first.</h5>
					</div>
					<div class="footer-menu">
						<h4>Discover</h4>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'discover-menu',
								)
							);
						?>
					</div>
					<div class="footer-menu">
						<h4>Company</h4>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'company-menu',
								)
							);
						?>
					</div>
					<div class="footer-menu">
						<h4>Follow Us</h4>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-4',
									'menu_id'        => 'social-menu',
								)
							);
						?>
					</div>
				</div>
			</footer>
			
		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>
