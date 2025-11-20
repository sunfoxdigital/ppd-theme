<?php 
get_header(); 
$hero_id = get_post_thumbnail_id();
$hero_src = wp_get_attachment_image_url( $hero_id, 'full' );
$hero_src_1200 = wp_get_attachment_image_url( $hero_id, 'large' );
$hero_webp = wp_get_attachment_image_url( $hero_id, 'full' );

if ( $hero_webp ) {
    $potential_webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $hero_webp);
    // check if the WebP file exists on disk
    $webp_path = str_replace( wp_get_upload_dir()['baseurl'], wp_get_upload_dir()['basedir'], $potential_webp );

    $hero_webp = file_exists( $webp_path ) ? $potential_webp : false;
}

$hero_meta = wp_get_attachment_metadata( $hero_id );
$hero_width = $hero_meta['width'] ?? 1200;
$hero_height = $hero_meta['height'] ?? 800;
?>

<?php if( have_rows('hero_content') ): while( have_rows('hero_content') ): the_row(); ?>
    <section id="hero">
        <div class="hero__contain">
            <div class="hero__content">
                <?php if(get_sub_field('title')) { ?><h1><?php echo get_sub_field('title'); ?></h1><?php }; ?>
                <?php if(get_sub_field('subtitle')) { ?><p class="subtitle"><?php echo get_sub_field('subtitle'); ?></p><?php }; ?>
                <?php if(get_sub_field('cta_button')) { ?><a href="/app" class="cta-button"><?php echo get_sub_field('cta_button');?></a><?php }; ?>
            </div>
            <div class="hero__image">
                <picture>
                    <?php if ( $hero_webp ) : ?>
                        <source
                            srcset="<?php echo esc_url( $hero_webp ); ?>"
                            type="image/webp"
                            sizes="(max-width: 1199px) 100vw, 1199px">
                    <?php endif; ?>

                    <img
                        src="<?php echo esc_url( $hero_src_1200 ); ?>"
                        srcset="<?php echo esc_url( $hero_src_1200 ); ?> 1200w,
                                <?php echo esc_url( $hero_src ); ?> 2000w"
                        sizes="(max-width: 1199px) 100vw, 1199px"
                        alt="<?php echo esc_attr( get_the_title() ); ?>"
                        fetchpriority="high"
                        decoding="async"
                        loading="eager"
                        width="<?php echo esc_attr( $hero_width ); ?>"
                        height="<?php echo esc_attr( $hero_height ); ?>"
                        class="hero-image"
                    />
                </picture>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>

<?php if( have_rows('posts_content') ): while( have_rows('posts_content') ): the_row(); ?>
    <section id="posts" class="container">
        <?php if(get_sub_field('title')) { ?><h2><?php echo get_sub_field('title'); ?></h2><?php }; ?>
        <?php if(get_sub_field('subtitle')) { ?><p class="subtitle"><?php echo get_sub_field('subtitle'); ?></p><?php }; ?>
        <div class="post-teasers">
            <?php
                $args = array(
                    'posts_per_page = 4',
                    'tag__not_in' => array( '14' )
                );

                $all_posts = new WP_Query( $args );
                while ($all_posts -> have_posts()) : $all_posts -> the_post();
                    get_template_part( 'template-parts/blog/component', 'post-teaser' );
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </section>
<?php endwhile; endif; ?>

<?php if( have_rows('cta_content') ): ?>    
    <section id="info">
        <div class="container">
            <?php while( have_rows('cta_content') ): the_row(); ?>
                <div class="ppd-info-action">
                    <div class="info-content">
                        <?php if(get_sub_field('title')) { ?><h3><?php echo get_sub_field('title'); ?></h3><?php }; ?>
                        <?php if(get_sub_field('copy')) { ?><p><?php echo get_sub_field('copy'); ?></p><?php }; ?>
                        <?php get_template_part( 'template-parts/components/component', 'cta-button' ); ?>
                    </div>
                    <div class="info-image">
                        <?php echo wp_get_attachment_image( get_sub_field('image'), 'large', '', array('class' => '') ); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>