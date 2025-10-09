<?php get_header(); ?>
<article>
  <div class="travel-menu">
    <?php
    if (have_posts()):
      while (have_posts()):
        the_post();
        ?>
        <div class="travel-box">
          <img src="<?php the_field('image'); ?>" width=154 height=154>
          <div class="textarea01">
            <h2><?php the_title(); ?></h2>
            <p><?php the_field('price'); ?>yen</p>
            <p class="detail"><?php the_field('description'); ?></p>
          </div>
        </div>
        <div id="imageModal" class="image-modal hidden">
          <div class="image-modal-content">
            <button class="close-button" id="closeModal">&times;</button>
            <img id="modalImage" src="" alt="拡大画像">
            <p id="modalText">ここに文字が入ります</p>
          </div>
        </div>
        <?php
      endwhile;
    else:
      ?>
      <p>お探しの記事はありませんでした</p>
    <?php endif; ?>
  </div>
</article>
<?php get_footer(); ?>