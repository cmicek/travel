<?php get_header();
  $header_img = get_header_image();
  if(get_the_post_thumbnail() && is_single()){
    $header_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );

  }
?>
  <header class="site-header">
    <div class="site-header--title container">
      <a href="<?php  bloginfo('url'); ?>" class="site-header--link"><?php  bloginfo('name'); ?></a>
      <span class="site-nav--toggle js-site-nav--toggle"><i class="hamburger"></i>  Menu</span>
    </div>
    <figure class="site-header--background" style="background-image: url(<?= $header_img; ?>)" ></figure>
  </header>
  <section class="site-content">
     <?php if (have_posts()){
        while (have_posts()) {
          the_post();
          $tags = get_the_tags();
          $cats = get_the_category();
          $comments_count = wp_count_comments($post->ID); ?>
          <article <?php post_class(); ?>>
            <header class="post--header">
              <h1 class="post--title">
                <?php if(is_single() || is_page()){ ?>
                  <?php the_title(); ?>
                <?php  }else{ ?>
                  <a href="<?php the_permalink()?>" title="View post"><?php the_title(); ?></a>
                 <?php } ?>
              </h1>
              <?php if (!is_page()) { ?>
                <ul class="post--meta">
                  <?php if($cats[0]->slug != 'uncategorized' || count($cats) > 1) { ?>
                    <?php foreach ($cats as $cat) { 
                      if($cat->slug != 'uncategorized'){
                      ?>
                        <li class="post--meta--item"><a class="post--meta--link" href="<?= get_tag_link($cat->ID)?>"><?= $cat->name?></a></li>
                      <?php }
                    } ?> 
                  <?php } ?>
                  <li class="post--meta--item"><?php the_date(); ?></li>
                  <li class="post--meta--item">by <?php the_author(); ?></li>
                </ul>
              <?php } ?>
              
            </header>
          <div class="post--content">
            <?php
              the_content();
            ?>
          </div>
          
          <?php if($tags) { ?>
            <div class="post--tags">
              <?php  foreach ($tags as $tag) { ?>
                <a class="post--tag" href="<?= get_tag_link($tag->ID)?>"><?= $tag->name?></a>
              <?php } ?>
            </div>
          <?php } ?>
            <div class="post--comments">
                <?= $comments_count->approved == 1 ? '<a href="" class="post--comments--count js-post--comments--count">Show 1 Comment </a><small>or</small>' : '' ?> <?= $comments_count->approved > 1 ? '<a href="" class="post--comments--count">Show ' . $comments_count->approved . ' Comments <small>or</small></a>' : '' ?>
                <a href="" class="js-comment--toggle">Leave a Comment</a>
            </div>
            <aside class="comment--form">
              <?php 
                $comments_args = array(
                  // change the title of send button 
                  'label_submit'=>'Send',
                  // change the title of the reply section
                  'title_reply'=>'Write a Reply or Comment',
                  // remove "Text or HTML to be displayed after the set of comment fields"
                  'comment_notes_after' => '',
                  // redefine your own textarea (the comment body)
                  'comment_field' => '<p class="`comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
                );

                    comment_form($comments_args);
                ?>
            </aside>
            <aside class="comment--list">
              <?php comments_template( '', true ); ?>
            </aside>


          </article>
      <?php } ?>
      <div class="pagination text--center">
           <?php posts_nav_link(); ?>
      </div>
  <?php  } ?>
  </section>
<?php get_footer(); ?>