<?php
/**
 * The template for displaying Archive, tag, and category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package lavish
 * @since 1.0.0
 */

get_header(); ?>

<?php get_sidebar( 'top' ); ?>

<section id="la-content-area" class="la-content" role="main">
	<div class="container">
  		<div class="row">
    		<div class="col-md-12">

    
                <header class="page-header">
					<h1 class="page-title">
                        <?php
                            if ( is_category() ) :
                                single_cat_title();
    
                            elseif ( is_tag() ) :
                                single_tag_title();
    
                            elseif ( is_author() ) :
                                printf( __( 'Articles by %s', 'lavish' ), '<span class="vcard">' . get_the_author() . '</span>' );
    
                            elseif ( is_day() ) :
                                printf( __( 'Articles from %s', 'lavish' ), '<span>' . get_the_date() . '</span>' );
    
                            elseif ( is_month() ) :
                                printf( __( 'Articles from %s', 'lavish' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'lavish' ) ) . '</span>' );
    
                            elseif ( is_year() ) :
                                printf( __( 'Articles from %s', 'lavish' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'lavish' ) ) . '</span>' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                _e( 'Asides', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                                _e( 'Galleries', 'lavish');
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                _e( 'Images', 'lavish');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                _e( 'Videos', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                _e( 'Quotes', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                _e( 'Links', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                                _e( 'Statuses', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                                _e( 'Audios', 'lavish' );
    
                            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                                _e( 'Chats', 'lavish' );
    
                            else :
                                _e( 'Archives', 'lavish' );
    
                            endif;
                        ?>
					</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header>



            </div>
        </div>
    </div>
    
 <?php $blogstyle = get_theme_mod( 'blog_style', 'blogright' );

	switch ($blogstyle) {
		// Right Column
		case "blogright" :
			echo '<div class="container"><div class="row"><div class="col-md-8"><div id="la-content" role="main">';
			// get all the posts
				if ( have_posts() ) : while ( have_posts() ) : the_post();				
					// get the article layout
					get_template_part( 'content', get_post_format() );					
				endwhile;
					// get the pagination
					lavish_paging_nav();
				else :
					// if no posts
					get_template_part( 'content', 'none' );					
				endif; 
			echo '</div></div><div class="col-md-4 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';
		break;		
		
		
		// Left Column
		case "blogleft" :
			echo '<div class="container"><div class="row"><div class="col-md-4 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-8"><div id="la-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div></div></div></div>';
		break;		
		
		
		// Left and Right Column
		case "blogleftright" :
			echo '<div class="container"><div class="row"><div class="col-md-4 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-4"><div id="la-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div></div><div class="col-md-4 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;			
	
		
		// Wide Column
		case "blogwide" :
												
			echo '<div class="container"><div class="row"><div class="col-md-12"><div id="la-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			
			echo '</div></div></div></div>';	
		break;	
			
	}
?>   
    
</section><!-- #primary -->

<?php get_footer(); ?>
