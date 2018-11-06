
<div class="homepage-content">
    <?php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page'  => 5
        );
        $the_query = new WP_Query( $args );
        $ii = 0 ;
        // The Loop
        if ( $the_query->have_posts() ) {
            echo '<div class="container"><div class="section-blog">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
                    <?php $ii++ ; ?>
                    <div class="blog-item">
                       
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
                            <?php
                                if($ii > 2) {  
                                    the_post_thumbnail('blog2');
                                } else {
                                    the_post_thumbnail('blog1');
                                }
                            ?> 
                        </a>
                        <div class="blog-item-content">
                            <p class="category-name"><?php the_category( ', ' ); ?></p>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        </div>
                    </div> 
                <?php 
            } ?>
                <div class="buttonbj-wapper">
                    <a class="buttonbj" href="/blog" alt="blog">これまでの記事を見る</a>
                </div>
            <?php 
            echo '</div></div>';
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }
    ?>
    <!--  recruit post --> 
    
    <?php 
        $args = array(
            'post_type' => 'recruit',
            'posts_per_page'  => 8
        );
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
            echo '<div class="section-recruit">';
            echo '<div class="container"><div class="header-section"><h2>RECRUIT</h2><h4>採用情報</h4></div></div>';
            get_template_part( 'template-parts/formsearch_recruit');
            echo '<div class="container"><div class="row">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?> 
                    <div class="recruit-item">
                        <div class="recruit-item-box">
                        
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
                                <?php 
                                        the_post_thumbnail('medium'); 
                                ?> 
                            </a>
                            <div class="border-right-recruit">
                                <div class="recruit-item-content"> 
                                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                    <?php the_excerpt(); ?>
                                    <div class="recruit-item-bottom">
                                        <h3> <?php the_field('company'); ?></h3>
                                        <h4>掲載期間 : <?php the_field('date_recruit_start'); ?> まで <?php the_field('date_recruit_end'); ?></h4>
                                        <a class="recruit-reamore" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">></a>
                                    </div>    
                                </div>
                            </div>
                        </div> 
                    </div> 
                <?php 
            } ?>
                <div class="buttonbj-wapper">
                    <a class="buttonbj" href="/recruits/" alt="blog">これまでの採用情報を見る</a>
                </div>
            <?php 
            echo '</div></div></div>';
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }
    ?> 
     
      <!--  recruit post --> 
    
    <?php  
        // The Query
        echo '<div class="section-recruit section-animator">';
        echo '<div class="container"><div class="header-section"><h2>Animator</h2><h4>アニメーター情報</h4></div></div>';
        get_template_part( 'template-parts/formsearch_blog');

        echo '<div class="container"><div class="row">';
        $user_query = new WP_User_Query( array( 'role' => 'Author' ) );

        // User Loop
        if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $user ) {
               // echo get_author_posts_url( $user->id ); 
               // print_r($user);
                
                ?>
               	     <div class="recruit-item">
                        <div class="recruit-item-box">
                            
                            <a href="<?php echo get_author_posts_url( $user->ID ) ?>" title="<?php echo  $user->display_name; ?>">  
                             <?php echo wp_get_attachment_image( get_field('imageuser','user_'.$user->ID) , 'medium' ); ?>
                            </a> 
                            <div class="recruit-item-content"> 
                                <h2> <a href="<?php echo get_author_posts_url( $user->ID ) ?>" title="<?php echo  $user->display_name; ?>"><?php echo  the_field('positionuser','user_'.$user->ID); ?></a> </h2>
                                <p><?php echo  $user->display_name; ?></p>
                                <div class="recruit-item-bottom">
                                    <h3> <?php the_field('age','user_'.$user->ID); ?></h3>
                                    <h4>実績 : <?php the_field('achievements','user_'.$user->ID); ?></h3>
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
            <div class="buttonbj-wapper">
                <a class="buttonbj" href="/animators/" alt="blog">これまでの採用情報を見る</a>
            </div>
        <?php        
        echo '</div></div></div>';
    ?>  
      
     <?php get_template_part( 'template-parts/formcomment'); ?>  

</div>