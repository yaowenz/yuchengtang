<?php
/**
 * 注册预约类型Post Type
 */
function yct_reservation_post_type() {
    $labels = array(
        'name'               => _x( 'Reservations', 'post type 名称' ),
        'singular_name'      => _x( 'Reservation', 'post type 单个 item 时的名称，因为英文有复数' ),
        'add_new'            => _x( '新建电影', '添加新内容的链接名称' ),
        'add_new_item'       => __( '新建一个电影' ),
        'edit_item'          => __( '编辑电影' ),
        'new_item'           => __( '新电影' ),
        'all_items'          => __( '所有电影' ),
        'view_item'          => __( '查看电影' ),
        'search_items'       => __( '搜索电影' ),
        'not_found'          => __( '没有找到有关电影' ),
        'not_found_in_trash' => __( '回收站里面没有相关电影' ),
        'parent_item_colon'  => '',
        'menu_name'          => '预约'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '我们网站的电影信息',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title'],
        'has_archive'   => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // Removes support for the "Add New" function, including Super Admin's
        ),
        'map_meta_cap' => true, // Set to false, if users are not allowed to edit/delete existing posts
    );
    register_post_type( 'yct_reservation', $args );
}
add_action( 'init', 'yct_reservation_post_type' );

add_action("manage_yct_reservation_posts_custom_column",  "yct_reservation_custom_columns");
add_filter("manage_yct_reservation_posts_columns", "yct_reservation_edit_columns");

function yct_reservation_custom_columns($column){
    global $post;
    switch ($column) {
        case "movie_director":
            echo get_post_meta( $post->ID, '_movie_director', true );
            break;
    }
}
function yct_reservation_edit_columns($columns){
    $columns['reserve_at'] = '预约时间';
    $columns['vistor_type'] = '预约时间';
    $columns['vistor_number'] = '预约时间';
    return $columns;
}

// Handler ajax request
add_action( 'wp_ajax_my_ajax', 'my_ajax' );

function my_ajax() {
    die( "Hello World" );
}
add_action( 'wp_ajax_nopriv_add_foobar', 'prefix_ajax_add_foobar' );

/**
 * Hook Page Request
 */
add_filter( 'request', function($request) {
    //echo "i am filter";
    return $request;
} );