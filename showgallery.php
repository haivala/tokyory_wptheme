<div class="showgallery">
<div id="myCarousel" class="carousel slide">
 <div class="carousel-inner">
  <?php
   $the_query = new WP_Query(array(
    'category_name' => 'Slider',
    'posts_per_page' => 1
    ));
   while ( $the_query->have_posts() ) :
   $the_query->the_post();
  ?>
   <div class="item active">
    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full');?></a>
    <div class="carousel-caption">
     <h4><?php the_title();?></h4>
     <p><?php the_excerpt();?></p>
    </div>
   </div><!-- item active -->
  <?php
   endwhile;
   wp_reset_postdata();
  ?>
  <?php
   $the_query = new WP_Query(array(
    'category_name' => 'Slider',
    'posts_per_page' => 5,
    'offset' => 1
    ));
   while ( $the_query->have_posts() ) :
   $the_query->the_post();
  ?>
   <div class="item">
    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full');?></a>
    <div class="carousel-caption">
     <h4><?php the_title();?></h4>
     <p><?php the_excerpt();?></p>
    </div>
   </div><!-- item -->
  <?php
   endwhile;
   wp_reset_postdata();
  ?>
 </div><!-- carousel-inner -->
 <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
 <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div><!-- #myCarousel -->
</div>
    <script>
        $('#myCarousel').carousel({ interval: 8000 })
    </script>
