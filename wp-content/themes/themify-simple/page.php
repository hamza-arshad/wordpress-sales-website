<?php
/**
 * Template for page view including query categories
 * @package themify
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php
/** Themify Default Variables
 *  @var object */
global $themify;
$sub_heading = themify_get('page_sub_heading');
?>
<!-- page-title -->
<?php if($themify->page_title != 'yes'): ?>
        <div class="page-category-title-wrap">
            <div class="category-title-overlay"></div>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if($sub_heading):?>
                 <p class="page-category-description"><?php echo $sub_heading?></p>
            <?php endif;?>
        </div>
<?php endif; ?>
<!-- /page-title -->
<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<?php themify_content_before(); // hook ?>
	<!-- content -->
	<div id="content" class="clearfix">
    	<?php themify_content_start(); // hook ?>

		<?php
		/////////////////////////////////////////////
		// 404
		/////////////////////////////////////////////
		if ( is_404() ) : ?>
			<h1 class="page-title"><?php _e( '404','themify' ); ?></h1>
			<p><?php _e( 'Page not found.', 'themify' ); ?></p>
		<?php endif; ?>

		<?php
		/////////////////////////////////////////////
		// PAGE
		/////////////////////////////////////////////
		?>
		<?php if ( ! is_404() && have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="page-<?php the_ID(); ?>" class="type-page">

				<div class="page-content entry-content">

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="post-image"><?php themify_image( "{$themify->auto_featured_image}w={$themify->page_image_width}&h=0&ignore=true" ); ?></figure>
				<?php endif; ?>

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','themify').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<?php edit_post_link(__('Edit','themify'), '[', ']'); ?>

				<!-- comments -->
				<?php if(!themify_check('setting-comments_pages') && $themify->query_category == ""): ?>
					<?php comments_template(); ?>
				<?php endif; ?>
				<!-- /comments -->

			</div>
			<!-- /.post-content -->

			</div><!-- /.type-page -->
		<?php endwhile; endif; ?>

		<?php
		/////////////////////////////////////////////
		// Query Category
		/////////////////////////////////////////////
		?>
		<?php if($themify->query_category != ''): ?>

			<?php query_posts( apply_filters( 'themify_query_posts_page_args', 'cat='.$themify->query_category.'&posts_per_page='.$themify->posts_per_page.'&paged='.$themify->paged.'&order='.$themify->order.'&orderby='.$themify->orderby ) ); ?>

			<?php if(have_posts()): ?>

				<!-- loops-wrapper -->
				<div id="loops-wrapper" class="loops-wrapper <?php echo esc_attr( $themify->layout . ' ' . $themify->post_layout ); ?> <?php echo isset( $themify->query_post_type ) && ! in_array( $themify->query_post_type, array( 'post', 'page' ) ) ? esc_attr( $themify->query_post_type ) : ''; ?>">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'includes/loop', $themify->query_post_type ); ?>

					<?php endwhile; ?>

				</div>
				<!-- /loops-wrapper -->

				<?php if ($themify->page_navigation != 'yes'): ?>
					<?php get_template_part( 'includes/pagination'); ?>
				<?php endif; ?>

			<?php endif; ?>

		<?php endif; ?>

		<?php themify_content_end(); // hook ?>
	</div>
	<!-- /content -->
    <?php themify_content_after(); // hook ?>

	<?php
	/////////////////////////////////////////////
	// Sidebar
	/////////////////////////////////////////////
	if ($themify->layout != 'sidebar-none'): get_sidebar(); endif; ?>

	

</div>
<!-- /layout-container -->

<?php get_footer(); ?>
