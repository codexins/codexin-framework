<?php



if (!function_exists('codexin_meta')){
    /**
     *  get meta data
     */
    function codexin_meta( $key, $args = array(), $post_id = null ){
        if(function_exists('rwmb_meta')){
            return rwmb_meta( $key, $args, $post_id );
        }else{
            return null;
        }
    }
}



if ( ! function_exists( 'codexin_option' ) ) {
    /**
     * Helper Function for declaring Global Variable for theme options
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function codexin_option( $option = false, $default = false ){

        if( $option === false ) {
            return false;
        }
        $codexin_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
        if( ! $codexin_options ) {
            $codexin_options = get_option( CODEXIN_THEME_OPTIONS );
            wp_cache_delete( CODEXIN_THEME_OPTIONS );
            wp_cache_add( CODEXIN_THEME_OPTIONS, $codexin_options );
        }

        if( isset( $codexin_options[$option] ) && $codexin_options[$option] !== '' ) {
            return $codexin_options[$option];
        } else {
            return $default;
        }

    }
}



if ( ! function_exists( 'codexin_comments_navigation' ) ) {
    /**
     * Displays previous/next comments navigation if needed
     *
     */
    function codexin_comments_navigation() {

        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav id="comment-nav-below" class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'reveal' ); ?></h2>
                <div class="nav-links reveal-color-0 reveal-primary-btn">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&laquo; Older Comments', 'reveal' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &raquo;', 'reveal' ) ); ?></div>
                </div><!-- end of nav-links -->
            </nav><!-- end of #comment-nav-below -->
        <?php
        endif;
    }
}

