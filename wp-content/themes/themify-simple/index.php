<?php
/**
 * Template for common archive pages, author and search results
 * @package themify
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<?php
/** Themify Default Variables
 *  @var object */
global $themify;
?>



		<?php
		/////////////////////////////////////////////
		// Author Page
		/////////////////////////////////////////////
		if(is_author()) : ?>
			<div class="page-category-title-wrap">
				<?php
				global $author, $author_name;
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				$author_url = $curauth->user_url;
				?>

				<h1 class="page-category-title"><?php echo esc_html( $curauth->first_name ); ?> <?php echo esc_html( $curauth->last_name ); ?></h1>
				<p class="author-avatar"><?php echo get_avatar( $curauth->user_email, $size = '128' ); ?></p>
				<?php if($author_url != ''): ?><p class="author-url"><a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_url( $author_url ); ?></a></p><?php endif; //author url ?>
				 <div class="page-category-description">
					<?php echo wp_kses_post( $curauth->user_description ); ?>
				</div>
				<!-- /page-category-description -->

			</div>
		<?php endif; ?>

		<?php
		/////////////////////////////////////////////
		// Search Title
		/////////////////////////////////////////////
		?>
		<?php if( is_search() ): ?>

			<div class="page-category-title-wrap"><h1 class="page-category-title"><?php _e('Search Results for:','themify'); ?> <em><?php echo get_search_query(); ?></em></h1></div>

		<?php endif; ?>

		<?php
		/////////////////////////////////////////////
		// Date Archive Title
		/////////////////////////////////////////////
		?>
		<?php if ( is_day() ) : ?>
			<div class="page-category-title-wrap"><h1 class="page-category-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'themify' ), get_the_date() ); ?></h1></div>
		<?php elseif ( is_month() ) : ?>
			<div class="page-category-title-wrap"><h1 class="page-category-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'themify' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'themify' ) ) ); ?></h1></div>
		<?php elseif ( is_year() ) : ?>
			<div class="page-category-title-wrap"><h1 class="page-category-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'themify' ), get_the_date( _x( 'Y', 'yearly archives date format', 'themify' ) ) ); ?></h1></div>
		<?php endif; ?>

		<?php
		/////////////////////////////////////////////
		// Category Title
		/////////////////////////////////////////////
		?>
		<?php if( is_category() || is_tag() || is_tax() ): ?>
                        <div class="page-category-title-wrap">
                            <div class="category-title-overlay"></div>
                            <h1 class="page-category-title"><?php single_cat_title(); ?></h1>
                            <div class="page-category-description"><?php echo strip_tags(themify_get_term_description()); ?></div>
                        </div>
		<?php endif; ?>

		<?php
		/////////////////////////////////////////////
		// Default query categories
		/////////////////////////////////////////////
		?>
		<?php if( !is_search() ): ?>
			<?php
				global $query_string;
				query_posts( apply_filters( 'themify_query_posts_args', $query_string.'&order='.$themify->order.'&orderby='.$themify->orderby ) );
			?>
		<?php endif; ?>

        <?php
        /////////////////////////////////////////////
        // Loop
        /////////////////////////////////////////////
        ?>
     <!-- layout -->
    <div id="layout" class="pagewidth clearfix">
    <!-- content -->
        <?php themify_content_before(); //hook ?>
            <div id="content" class="list-post">
                    <?php themify_content_start(); //hook ?>
                    <?php if (have_posts()) : ?>
                        <!-- loops-wrapper -->
                        <div id="loops-wrapper" class="loops-wrapper <?php echo $themify->layout . ' ' . $themify->post_layout; ?>">

                                <?php while (have_posts()) : the_post(); ?>

                                        <?php if(is_search()): ?>
                                                <?php get_template_part( 'includes/loop' , 'search'); ?>
                                        <?php else: ?>
                                                <?php get_template_part( 'includes/loop' , 'index'); ?>
                                        <?php endif; ?>

                                <?php endwhile; ?>

                        </div>
                        <!-- /loops-wrapper -->

                        <?php get_template_part( 'includes/pagination'); ?>

                <?php
                /////////////////////////////////////////////
                // Error - No Page Found
                /////////////////////////////////////////////
                ?>

                <?php else : ?>
                        <p><?php _e( 'Sorry, nothing found.', 'themify' ); ?></p>
                <?php endif; ?>
        <?php themify_content_end(); //hook ?>
        </div>
        <?php themify_content_after(); //hook ?>
<!-- /#content -->

<?php
/////////////////////////////////////////////
// Sidebar
/////////////////////////////////////////////
if ($themify->layout != 'sidebar-none'): get_sidebar(); endif; ?>

</div>
<!-- /#layout -->

<?php get_footer(); ?>
