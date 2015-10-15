<?php
/*
Template Name: Global Movement
 */
get_header(); ?>

    <div id="global_page_content" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="entry">
        <?php the_content(); ?>
    </div><!--entry-->
  
    <?php endwhile; endif; ?>
</div>

  <!--content-->

<!--World News-->
<div id="world_news">
        <h1 style="color: #f96e08">World News</h1>
        <?php $args = array(
              'post_type'=> 'articles',
              'article_categories' => 'world-news',
              'posts_per_page' => 3,
            );              
            $the_query = new WP_Query( $args );
            $first = true;
            if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
            if ( $first ): ?>
            <?php $first = false; 
            endif;
            ?>
            <div class="world_news_article row">
                <div class="world_news_article_img col-xs-12 col-sm-2"> 
              <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'recipe-feature-home' ); } ?></a>
                                    </div>

                                    <div class="world_news_article_content col-xs-10 col-sm-10">
                                    <p class="world_news_article_title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></p>
           
            <p class="world_news_article_excerpt">
              <?php if(get_post_meta($post->ID, 'mm_article_excerpt', true)) {
              echo get_post_meta($post->ID, 'mm_article_excerpt', true);
            } else { 
              the_excerpt(); 
            }?>
          <a href="<?php the_permalink(); ?>" class="world-news-read-more">Read More</a>
          </p>
                                         
                                      </div>
            </div>
            <?php  endwhile; endif;?>
      </div>
<!--End of World News-->
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup" class="row"><form id="mc-embedded-subscribe-form" class="validate" action="//meatlessmonday.us1.list-manage.com/subscribe/post?u=8f9935158441b7563030ecd70&amp;id=28d068a3e2" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
  <div id="mc_embed_signup_scroll">
    <div class="mc-field-group">
      <div id="form-container">
        <div id="global-form-title" class="col-xs-12 col-sm-7">
          <h3>Sign Up for the Meatless Monday Global Newsletter</h3>
        </div>
        <div id="global-form-input" class="col-xs-12 col-sm-3"> 
          <input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="Email Address" />
        </div>
        <div id="global-form-submit" class="col-xs-12 col-sm-2">
          <input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit" value="Sign Up!" />
        </div>
      </div>
    </div>
  </div>
  <div id="mce-responses" class="clear">
  </div>
<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
  <div style="position: absolute; left: -5000px;">
    <input tabindex="-1" name="b_8f9935158441b7563030ecd70_28d068a3e2" type="text" value="" />
  </div>
  <div class="clear">
    <div class="response" id="mce-error-response" style="display:none">
    </div>
    <div class="response" id="mce-success-response" style="display:none">
    </div>
  </div>
</div>
  </form>
</div>
<script src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js" type="text/javascript"></script><script type="text/javascript">// <![CDATA[
(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);
// ]]></script>
<!--End mc_embed_signup-->

  
    <div id="global-posts">
    <h3 class="header">Meatless Monday Global Connect</h3>
    <?php $args = array(
              'post_type'=> 'global_logos',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'ASC'
            );              
            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
            <div class="single-global-content">
              <div class="mm-gobal-partners-logo">
                <a href="<?php if(get_post_meta($post->ID, 'mm_global_link', true)) {
                echo get_post_meta($post->ID, 'mm_global_link', true); } ?>" alt="<?php the_title();?>" title="<?php the_title();?>"><?php the_post_thumbnail();?></a>
              </div>

              <div class="mm-gobal-partners-logo-content">  
                  <h3><a href="<?php if(get_post_meta($post->ID, 'mm_global_link', true)) {
                  echo get_post_meta($post->ID, 'mm_global_link', true); } ?>">
                  <?php the_title();?> <?php if ( get_post_meta($post->ID, 'mm_global_flag', true) ) : ?>
                <img src="<?php bloginfo('wpurl'); ?><?php echo get_post_meta($post->ID, 'mm_global_flag', true);?> " class="content-flag"/>
                <?php endif; ?></a></h3>
                  <?php the_content();?>
                 <?php if( get_field('hidden_content') ): ?>
                    <p><a href="javascript:void(0);" class="expand-link">Read More</a></p>
                    <div class="additional-content">
                        <?php the_field('hidden_content'); ?>
                        <p><a href="javascript:void(0);" class="collapse-link">Hide This Content</a></p>
                    </div>
                  <?php endif; ?>
              </div>
            </div>  
            <?php  endwhile; endif; wp_reset_query();?>

    </div>
     
  <script type="text/javascript">
  $('.additional-content').hide();
  $('.expand-link').click(function(){
    $(this).toggle();
    $(this).parent().next('.additional-content').toggle();
  })
   $('.collapse-link').click(function(){
    $(this).closest('.additional-content').toggle();
    $(this).closest('.mm-gobal-partners-logo-content').find('.expand-link').toggle();
  })

  </script>

  <?php get_footer();?>