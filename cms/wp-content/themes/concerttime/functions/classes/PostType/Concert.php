<?php

  namespace ThemeClasses\PostType;

  class Concert
  {
    static protected $postTypeSlug = 'concert';

    public function __construct()
    {
      add_theme_support( 'post-thumbnails');
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      $labels = [
        'name'                  => 'Concerts',
        'singular_name'         => 'Concert',
        'menu_name'             => 'Concerts',
        'name_admin_bar'        => 'Concert',
        'add_new'               => 'Add new concert',
        'add_new_item'          => 'Add new concert',
        'new_item'              => 'New concert',
        'edit_item'             => 'Edit concert',
        'view_item'             => 'View concert',
        'all_items'             => 'All concerts',
        'search_items'          => 'Search concert',
        'parent_item_colon'     => 'Parent concert: ',
        'not_found'             => 'No concerts',
        'not_found_in_trash'    => 'No concerts in trash',
        'archives'              => 'Concert archive',
        'filter_items_list'     => 'Filter concert list',
        'items_list_navigation' => 'Concert list navigation',
        'items_list'            => 'Concert list',
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
        'menu_icon'          => 'dashicons-format-audio',
        'supports'           => ['title', 'author', 'thumbnail', 'revisions'],
      ];

      register_post_type(static::$postTypeSlug, $args);
    }
  }
