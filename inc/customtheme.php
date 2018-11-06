<?php 
add_action( 'init', 'codex_recruit_init' ); 
function codex_recruit_init() {
	$labels = array(
		'name'               => _x( 'Recruits', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Recruit', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Recruits', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Recruit', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Recruit', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Recruit', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Recruit', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Recruit', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Recruit', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Recruits', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Recruits', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Recruits:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Recruits found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Recruits found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recruit' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
	);

	register_post_type( 'recruit', $args );



	 
		register_taxonomy(
			'type',
			'recruit',
			array(
				'label' => __( 'Type' ),
				'rewrite' => array( 'slug' => 'type' ),
				'hierarchical' => true,
			)
		);
		register_taxonomy(
			'location',
			'recruit',
			array(
				'label' => __( 'Location' ),
				'rewrite' => array( 'slug' => 'location' ),
				'hierarchical' => true,
			)
		);
	 


}
 



function ajax_ins_loadjob( $selecetd_post ) {

	// Verify nonce
	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
	  die('Permission denied');
	  $output = '' ;
		$selectvalue = $_POST['selectvalue']; 
		$terms = get_terms( array(
			'taxonomy' => 'type',
			'parent'   => $selectvalue,
			'hide_empty' => false,
		));
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ 
				$output .= '<option value="">職種を選ぶ</option>';
				foreach ( $terms as $term ) {
					$output .= '<option value="'.$term->term_id.'">' . $term->name . '</option>';
				} 
		} 
	  if($output != ''){
			  $result['response'][] = $output ; 
			  $result['status']     = 'success';
		  
	  } else {
			  $result['response'] = '<option value="">職種を選ぶ</option>'; 
			  $result['status']   = '404';
		  
	  }
  
	$result = json_encode($result);
	echo $result;
	die();
  }
  add_action('wp_ajax_ins_loadjob', 'ajax_ins_loadjob');
  add_action('wp_ajax_nopriv_ins_loadjob', 'ajax_ins_loadjob');
  
  // ---------------------------------------------------------------------------------------------------------------------------------
  
function ajax_ins_loadanimation( $selecetd_post ) {

	// Verify nonce
	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
	  die('Permission denied');
	  $output = '<option value="">検索項目</option>' ;
		$selectvalue = $_POST['selectvalue'];  
		
		
		if ( $selectvalue == 'アニメーター' ){ 
				$output .= '<option value="アニメーターの項目">アニメーターの項目</option>
				   <option value="動画マン">動画マン</option>
				   <option value="原画マン">原画マン</option>
				   <option value="動画検査">動画検査</option>
				   <option value="二原画">二原画</option>
				   <option value="レイアウト">レイアウト</option>
				   <option value="演出">演出</option>
				   <option value="絵コンテ">絵コンテ</option>
				   <option value="作画監督">作画監督</option>
				   <option value="総作画監督">総作画監督</option>
				   <option value="キャラクター作画監督">キャラクター作画監督</option>
				   <option value="メカニック作画監督">メカニック作画監督</option>
				   <option value="エフェクト作画監督">エフェクト作画監督</option>
				   <option value="仕上げ（彩色）">仕上げ（彩色）</option>
				   <option value="撮影">撮影</option>
				   <option value="背景">背景</option>';
				 
		} else if( $selectvalue == '声優' ) {
			$output .= '<option value="アニメ">アニメ</option>
				   <option value="ゲーム">ゲーム</option>
				   <option value="吹き替え">吹き替え</option>
				   <option value="ラジオドラマ・ドラマCD" selected="selected" data-i="0">ラジオドラマ・ドラマCD</option>
				   <option value="ナレーション">ナレーション</option>
				   <option value="舞台活動">舞台活動</option>
				   <option value="俳優・タレント活動">俳優・タレント活動</option>
				   <option value="歌手活動">歌手活動</option>
				   <option value="ラジオパーソナリティ">ラジオパーソナリティ</option>
				   <option value="アダルト作品への出演">アダルト作品への出演</option>
				   <option value="特撮番組への出演">特撮番組への出演</option>
				   <option value="人形劇・着ぐるみショー">人形劇・着ぐるみショー</option>';
		} else {
			$output = '';
		}
	  if($output != ''){
			  $result['response'][] = $output ; 
			  $result['status']     = 'success';
		  
	  } else {
			  $result['response'] = '<option value="">検索項目</option>'; 
			  $result['status']   = '404';
		  
	  }
  
	$result = json_encode($result);
	echo $result;
	die();
  }
  add_action('wp_ajax_ins_loadanimation', 'ajax_ins_loadanimation');
  add_action('wp_ajax_nopriv_ins_loadanimation', 'ajax_ins_loadanimation');
  
  
  
add_action( 'init', 'codex_qa_init' ); 
function codex_qa_init() {
	$labels = array(
		'name'               => _x( 'QAs', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'QA', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'QAs', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'QA', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'QA', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New QA', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New QA', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit QA', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View QA', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All QAs', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search QAs', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent QAs:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No QAs found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No QAs found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'qa' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','comments' )
	);

	register_post_type( 'qa', $args );
	
	
	register_taxonomy(
		'tagsQA',
		'qa',
		array(
			'label' => __( 'Tags' ),
			'rewrite' => array( 'slug' => 'tagsqa' ),
			'hierarchical' => false ,
		)
	);
}
