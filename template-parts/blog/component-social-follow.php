<?php
global $wp;

$current_url = home_url( add_query_arg( array(), $wp->request ) );
$encoded_url = urlencode( $current_url );

$facebook_follow    = "https://www.facebook.com/profile.php?id=100095139456212";
$instagram_follow   = "https://www.instagram.com/planpackdiscover/";
$tiktok_follow   = "https://www.tiktok.com/@planpackdiscover";
$twitter_follow   = "https://x.com/plnpckdiscover";


?>
<div class="social-follow social-icons">
    <div class="ss-icons">
        <span>Follow me:</span>
        <a href="<?php echo $facebook_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-facebook.svg" class="icon" alt="Facebook">
        </a>

        <a href="<?php echo $instagram_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-instagram.svg" class="icon" alt="Instagram">
        </a>

        <a href="<?php echo $tiktok_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-tiktok.svg" class="icon" alt="Instagram">
        </a>

        <a href="<?php echo $twitter_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-twitter.svg" class="icon" alt="Instagram">
        </a>
    </div>
</div>
