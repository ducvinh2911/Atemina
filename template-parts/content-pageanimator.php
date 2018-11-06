<div class="author-list">
    <?php  
                $number = get_option('posts_per_page');
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $offset = ($paged - 1) * $number;
                $users    = get_users();
				
				$arguser = array( 'role' => 'Author','number' => $number, 'offset' => $offset) ;
				if(isset($_GET['subtypeanimetor']) && !empty($_GET['subtypeanimetor'])) {
					 $arguser['meta_query'][]=array(
						'key'  =>  'user_type',
						'value'     => $_GET['subtypeanimetor'],
						'compare' => '='					
					);
				}
				if(isset($_GET['locationeanimetor']) && !empty($_GET['locationeanimetor'])) {
					 $arguser['meta_query'][]=array(
						'key'  =>  'user_localtion',
						'value'     => $_GET['locationeanimetor'],
						'compare' => '='					
					);
				}
				if(isset($_GET['search']) && !empty($_GET['search'])) {
					 $arguser['search'] = '*'.$_GET['search'].'*' ;
					 $arguser['search_columns'] =array( 'user_login', 'user_email' , 'user_nicename','user_nicename' ) ;
				} 
				
				
                $user_query = new WP_User_Query( $arguser );
                $total_users = count($users);
                $total_query = count($user_query);
                if($number%2==0){
                    $total_pages = intval($total_users / $number);
                }else {
                    $total_pages = intval($total_users / $number)+1;
                }
        // User Loop
        if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $user ) {
               // echo get_author_posts_url( $user->id ); 
               // print_r($user);
              //  print_r(get_user_meta($user->id));
                
                ?>
                     <div class="recruit-item border-right-cs">
                        <div class="recruit-item-box">
                            
                            <a href="<?php echo get_author_posts_url( $user->ID ) ?>" title="<?php echo  $user->display_name; ?>">  
                             <?php echo wp_get_attachment_image( get_field('imageuser','user_'.$user->ID) , 'medium' ); ?>
                            </a> 
                            <div class="recruit-item-content"> 
                                <h2> <a href="<?php echo get_author_posts_url( $user->ID ) ?>" title="<?php echo  $user->display_name; ?>"><?php echo  the_field('positionuser','user_'.$user->ID); ?></a> </h2>
                                <p><?php echo  $user->display_name; ?></p>
                                <div class="recruit-item-bottom">
                                    <h3> <?php the_field('age','user_'.$user->ID); ?></h3>
                                    <h4>実績 : <?php the_field('achievements','user_'.$user->ID); ?></h4>
                                    <a class="recruit-reamore" href="<?php echo get_author_posts_url( $user->ID ) ?>" title="<?php echo  $user->display_name; ?>">></a>
                                </div>    
                            </div>
                        </div> 
                    </div> 
                <?php 
            }
        } else {
            echo 'No users found.';
        }
    ?> 
    <div class="pagination">
        <?php 
        if (function_exists('devvn_wp_corenavi_user')) {
            devvn_wp_corenavi_user($total_users,$total_query,$total_pages);
        }
         ?>
    </div>
</div>
