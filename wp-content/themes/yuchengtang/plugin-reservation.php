<?php
define('YCT_RESERVE_DAILY_MAX', 200);
/**
 * 注册预约类型Post Type
 */
function yct_reservation_post_type() {
    $labels = array(
        'name'               => _x( '观展预约', 'post type 名称' ),
        'singular_name'      => _x( '观展预约', 'post type 单个 item 时的名称，因为英文有复数' ),
        'add_new'            => _x( '新建预约', '添加新内容的链接名称' ),
        'add_new_item'       => __( '新建一个预约' ),
        'edit_item'          => __( '编辑预约' ),
        'new_item'           => __( '新预约' ),
        'all_items'          => __( '所有预约' ),
        'view_item'          => __( '查看预约' ),
        'search_items'       => __( '搜索预约' ),
        'not_found'          => __( '没有找到有关预约' ),
        'not_found_in_trash' => __( '回收站里面没有相关预约' ),
        'parent_item_colon'  => '',
        'menu_name'          => '观展预约'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '预约信息',
        'public'        => true,
        'menu_position' => 5,
    	'menu_icon' 	=> 'dashicons-calendar-alt',
        'supports'      => ['title', 'editor'],
        'has_archive'   => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // Removes support for the "Add New" function, including Super Admin's
        ),
        'map_meta_cap' => true, // Set to false, if users are not allowed to edit/delete existing posts
    );
    register_post_type( 'yct_reservation', $args );
    
    // 检查附加表是否创建
    global $wpdb, $table_prefix;
    $wpdb->query("CREATE TABLE `{$table_prefix}yct_reserve_stats` (
    	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    	`reserve_date` date NOT NULL,
    	`reserve_count` int UNSIGNED NOT NULL DEFAULT 0,
    	PRIMARY KEY (`id`),
        UNIQUE KEY `U_date` (`reserve_date`)
        ) COMMENT='';");
}
add_action( 'init', 'yct_reservation_post_type' );

add_action("manage_yct_reservation_posts_custom_column",  "yct_reservation_custom_columns");
add_filter("manage_yct_reservation_posts_columns", "yct_reservation_edit_columns");

function yct_reservation_translation($slug)
{
	$translation = [
		'group' => '团体',
		'individual' => '个人',
		'afternoon' => '下午',
		'morning' => '上午',
	];
	
	return $translation[$slug];
}

function yct_reservation_custom_columns($column){
    global $post;
    $content = json_decode($post->post_content, true);
    
    if ($column == 'reserve_type') {
        echo yct_reservation_translation($content[$column]);
    } elseif ($column == 'reserve_date') {
    	echo $content[$column] . '/' . yct_reservation_translation($content['reserve_time']);
    } else {
        echo $content[$column];
    }
}

function yct_reservation_edit_columns($columns){
	$columns['id_no'] = '身份证号';
    $columns['reserve_date'] = '预约时间';
    $columns['reserve_type'] = '预约类型';
    $columns['reserve_number'] = '预约人数';
    return $columns;
}

// Handler ajax request
add_action( 'wp_ajax_reservation_create', 'yct_ajax_reservation_create' );
add_action( 'wp_ajax_nopriv_reservation_create', 'yct_ajax_reservation_create' );

function yct_ajax_reservation_create() {
    @session_start();
    
    // Store data
    if (empty($_POST) || empty(intval($_POST['reserve_number'])) || strtotime($_POST['reserve_date']) < strtotime('-1 days')) {
        echo json_encode(['err' => 1, 'msg' => '数据无效']);
        wp_die();
    }
    if (empty($_SESSION['verify_code']) || $_SESSION['verify_code'] != $_POST['_verify_code']) {
        echo json_encode(['err' => 1, 'msg' => '验证码不正确']);
        wp_die();
    }
    
    if (empty($_POST['id_no']) || !validateIDCard($_POST['id_no']))
    {
    	echo json_encode(['err' => 1, 'msg' => '身份证号无效']);
    	wp_die();
    }
    
    global $wpdb, $table_prefix;
    $reserveStats = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$table_prefix}yct_reserve_stats WHERE reserve_date = %s", $_POST['reserve_date']));
    if (!empty($reserveStats) && YCT_RESERVE_DAILY_MAX < ($reserveStats->reserve_count + $_POST['reserve_number'])) {
        echo json_encode(['err' => 1, 'msg' => '预约人数已满']);
        wp_die();
    }
    
    $form_data= array_filter($_POST, function ($key) {
        return in_array($key, ['name', 'mobile', 'reserve_date', 'reserve_time', 'reserve_type', 'reserve_number', 'id_no']);
    }, ARRAY_FILTER_USE_KEY);
        
    $postId = wp_insert_post([
    	'post_status' => 'publish',
        'post_title' => $form_data['name'] . '-' . $form_data['mobile'],
        'post_type' => 'yct_reservation',
        'post_content' => json_encode($form_data, JSON_UNESCAPED_UNICODE),
    ]);
    
    if (empty($reserveStats)) {
        $wpdb->insert("{$table_prefix}yct_reserve_stats", ['reserve_date' => $_POST['reserve_date'], 'reserve_count' => $_POST['reserve_number']]);
    } else {
        $wpdb->update("{$table_prefix}yct_reserve_stats", ['reserve_count' => $reserveStats->reserve_count + $_POST['reserve_number']], ['reserve_date' => $reserveStats->reserve_date]);
    }
   
    echo json_encode(['err' => 0, 'data' => ['post_id' => $postId]]);
    wp_die();
}

/**
 * Hook Page Request
 */
add_filter( 'request', function($request) {
    //echo "i am filter";
    return $request;
} );