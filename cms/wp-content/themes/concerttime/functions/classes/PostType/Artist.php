<?php

  namespace ThemeClasses\PostType;

  class Artist
  {
    static protected $postTypeSlug = 'artist';

    public function __construct()
    {
      add_theme_support( 'post-thumbnails');
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      $labels = [
        'name'                  => 'Artists',
        'singular_name'         => 'Artist',
        'menu_name'             => 'Artists',
        'name_admin_bar'        => 'Artist',
        'add_new'               => 'Add new artist',
        'add_new_item'          => 'Add new artist',
        'new_item'              => 'New artist',
        'edit_item'             => 'Edit artist',
        'view_item'             => 'View artist',
        'all_items'             => 'All artists',
        'search_items'          => 'Search artist',
        'parent_item_colon'     => 'Parent artist: ',
        'not_found'             => 'No artists',
        'not_found_in_trash'    => 'No artists in trash',
        'archives'              => 'Artist archive',
        'filter_items_list'     => 'Filter artist list',
        'items_list_navigation' => 'Artist list navigation',
        'items_list'            => 'Artist list',
      ];

      $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'show_in_rest'       => false,
        'rewrite'            => ['slug' => static::$postTypeSlug],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-microphone',
        'supports'           => ['title', 'author', 'thumbnail', 'revisions'],
      ];

      register_post_type(static::$postTypeSlug, $args);
    }
  }
