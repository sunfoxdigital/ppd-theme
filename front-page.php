<?php 
get_header(); 
$hero_id = get_post_thumbnail_id();
$cta_options = get_field('cta_button', 'option');
?>

<?php if( have_rows('hero_content') ): while( have_rows('hero_content') ): the_row(); ?>
    <section id="hero">
        <div class="hero__contain">
            <div class="hero__content">
                <?php if(get_sub_field('title')) { ?><h1><?php echo get_sub_field('title'); ?></h1><?php }; ?>
                <?php if(get_sub_field('subtitle')) { ?><p class="subtitle"><?php echo get_sub_field('subtitle'); ?></p><?php }; ?>
                <?php if(get_sub_field('cta_button')) { ?><a href="<?php echo $cta_options['page']; ?>" class="cta-button"><?php echo get_sub_field('cta_button');?></a><?php }; ?>
            </div>
            <div class="hero__image">
                <?php ppd_render_hero_image( $hero_id ); ?>
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