<?php
/**
 * Template part for displaying single banner 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>
<?php 
    $post_meta  = get_post_meta( $post->ID );
    $meta_bg    = $post_meta['backgroundimage_74144'][0];
    $title      = $post_meta['title_77276'][0];
    $dsc        = $post_meta['description_68523'][0];
    $copy       = $post_meta['ctacopy_75893'][0];
    $link       = $post_meta['ctalink_39645'][0];
?>
<div class="item large-item" style="background-image: url( <?php echo $meta_bg; ?>  )">
    <div class="img">
        <svg viewBox="0 0 862.29 195.78">
            <use xlink:href="#lca-logo-white"></use>
        </svg>
    </div>
    <div class="info">
        <div class="title">
            <a href=""><?php echo $title; ?></a>
        </div>
        <div class="description">
            <?php echo $dsc; ?>
        </div>
        <a href="<?php echo $link; ?>" class="btn-simple btn-simple--orange btn-simple--big">
            <i class="far fa-calendar-alt btn-simple__icon btn-simple__icon--static"></i>
            <span class="btn-simple__text btn-simple__text--small">
                <?php echo $copy; ?>
            </span>
        </a>
    </div>
</div>