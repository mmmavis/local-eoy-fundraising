<?php
/**
 * Register RSS Feed and widgetized areas.
 *
 */
function rss_feed_widgets_init() {

  register_sidebar( array(
    'name' => 'RSS Feed Section',
    'id' => 'rss-feed-widget',
    'before_widget' => '<div id="rss-feed-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'rss_feed_widgets_init' );





/**
 * Register Polls and widgetized areas.
 *
 */
function polls_widgets_init() {

  register_sidebar( array(
    'name' => 'Polls Section',
    'id' => 'polls-widget',
    'before_widget' => '<div id="polls-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'polls_widgets_init' );



/**
 * Register Older Blog Post and widgetized areas.
 *
 */
function older_blog_post_widgets_init() {

  register_sidebar( array(
    'name' => 'Older Blog Post Section',
    'id' => 'older-blog-post-widget',
    'before_widget' => '<div id="older-blog-post-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'older_blog_post_widgets_init' );



/**
 * Register Twitter Feed and widgetized areas.
 *
 */
function twitter_feed_widgets_init() {

  register_sidebar( array(
    'name' => 'Twitter Feed Section',
    'id' => 'twitter-feed-widget',
    'before_widget' => '<div id="twitter-feed-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'twitter_feed_widgets_init' );


?>