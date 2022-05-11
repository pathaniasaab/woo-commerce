<?php
get_header();
?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-12">
                    <!-- Featured blog post-->
                    <?php
if(have_posts()){
    while(have_posts()){
        
        the_post();
        //$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID),"thumbnail");
        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),"thumbnail"));
        ?>
        <article class="">
                        <a href="#!"><img class="card-img-top" src="<?php echo $url ?>" alt="..." /></a>
                       <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <a href="<?php the_permalink() ?>">Read more →</a>
                    </article>
        <?php
    }
}

                     ?>
                    
                    <!-- Nested row for non-featured blog posts-->
                    
                        
                    <!-- Pagination-->
                    
                <!-- Side widgets-->
                
                    <!-- Categories widget-->
                    
                    <!-- Side widget-->
                    
        <!-- Footer-->
        </div>
            </div>
        </div>
<?php
get_footer();
?>