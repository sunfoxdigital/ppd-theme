<section id="post-hero" class="post__hero">
	<div class="container">
		<?php if ( function_exists('yoast_breadcrumb') ) { 
			yoast_breadcrumb( '<div id="breadcrumbs">','</div>' ); 
		}; ?>
		<div class="post__hero-content">
			<div class="post__hero-content--info">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-meta">
					
					<?php
						echo '<span class="meta-item">By <strong>' . get_the_author() . '</strong></span>';
						echo '<span class="separator mobile-hide-inline"> | </span>';
						echo ' <span class="meta-item"><strong>Published:</strong> ' . get_the_date() . '</span>';

						$u_time = get_the_time('U');
						$u_modified_time = get_the_modified_time('U');
						if ($u_modified_time >= $u_time + 86400) {
							echo '<span class="separator"> | </span><span class="meta-item"><strong>Updated:</strong> ';
            				echo get_the_modified_time('m/d/Y');
							echo '</span>';
						}
					?>
				</div>
				<?php get_template_part( 'template-parts/blog/component', 'social-share' ); ?>
			</div>
			<div class="post__hero-content--image">
				<?php
				if ( has_post_thumbnail() ) {
					ppd_render_hero_image( get_post_thumbnail_id() );
				} else {
					ppd_render_hero_image( 216 );
				};
				?>
			</div>
		</div>
	</div>
</section>