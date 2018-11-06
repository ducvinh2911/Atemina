<?php 

// search post
?>
<div class="formsearch-post-blog">
    <div class="container">
    <form action="/recruits/" class="formsearch-post-wapper">
        
        <div class="formsearch-post-row">
            <div class="formsearch-post-item typerecruitbox"> 
                <select name="typerecruit" required>
                     <option value="">制作内容を選ぶ</option> 
                    <?php 
                        $termstypes = get_terms( array(
                            'taxonomy' => 'type', 
                            'hide_empty' => false,
                            'parent'   => 0 ,
                        ) );
                        
                        if ( ! empty( $termstypes ) && ! is_wp_error( $termstypes ) ){
                                foreach ( $termstypes as $termstype ) {
                                    echo '<option value="'.$termstype->term_id.'">' . $termstype->name . '</option>';
                                }  
                        }
                    ?>
                </select> 
            </div>
            
            <div class="disabled formsearch-post-item jobrecruitbox">
                <select name="jobrecruit" required>
                      <option value="">職種を選ぶ</option>
                </select>
            </div>
            
            <div class="disabled formsearch-post-item locationrecruitbox">
                <select name="locationrecruit" >
                      <option value="">職種を選ぶ</option>
                      <?php 
                            $termslocations = get_terms( array(
                                'taxonomy' => 'location', 
                                'hide_empty' => false,
                                'parent'   => 0 ,
                            ) ); 
                            if ( ! empty( $termslocations ) && ! is_wp_error( $termslocations ) ){
                                    foreach ( $termslocations as $termslocation ) {
                                        echo '<option value="'.$termslocation->term_id.'">' . $termslocation->name . '</option>';
                                    }  
                            }
                        ?>
                </select>
            </div>
            
            <div class="formsearch-post-item">
                <input type="text" name="searchrecruit" placeholder="検索">
            </div> 
            <button class="search-button">Search</button>
        </div>
    </form> 
    </div>
</div>
