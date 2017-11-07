<?php


/**
 * Custom Callback Function for Comment layout
 *
 * @param $comment
 * @param $args
 * @param $depth
 */
function codexin_comment_function( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
            <div class="comment-single">
                <div class="comment-single-left comment-author vcard">
                    <?php echo get_avatar( $comment, $size='90' ); ?>
                </div>

                <div class="comment-single-right comment-info">
                <?php printf( '<span class="fn" itemprop="name">%s</span>', get_comment_author_link() ); ?>
                    <div class="comment-text" itemprop="text">
                        <?php comment_text(); ?>
                    </div>

                    <div class="comment-meta">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                            <time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished">
                                <?php printf( esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time() ); ?>
                            </time>
                        </a>
                        <?php edit_comment_link( esc_html__( '(Edit)', 'reveal' ),'  ','' ) ?>
                        <span class="comment-reply">
                            <?php 
                            comment_reply_link( array_merge( $args, 
                                array( 
                                    'depth' => $depth, 
                                    'max_depth' => $args['max_depth'], 
                                    'before' => ' &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;' 
                                ) 
                            ) ); 
                            ?>
                        </span>
                    </div>

                    <?php if ($comment->comment_approved == '0') { ?>
                        <div class="moderation-notice"><em><?php echo esc_html__('Your comment is awaiting moderation.', 'reveal') ?></em></div>
                    <?php } ?>

                </div>
            </div>     
        </div>

 <?php
}