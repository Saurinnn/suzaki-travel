<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>
<?php get_header(); ?>

<article>
  <h2>NEWS</h2>

  <?php
  // 現在のページ番号を取得
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // 投稿クエリ設定
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5, // 1ページに表示する件数
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
  );

  $the_query = new WP_Query($args);
  ?>

  <ul>
    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_time('Y/n/j'); ?>　<?php the_title(); ?></a></li>
      <?php endwhile; ?>
    <?php else : ?>
      <li>お探しの記事はありませんでした</li>
    <?php endif; ?>
  </ul>

  <!-- ▼ ページネーション ▼ -->
  <div class="custom-pagination">
    <?php
    if ($the_query->max_num_pages > 1) {
      echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%/',
        'current' => max(1, $paged),
        'total' => $the_query->max_num_pages,
        'mid_size' => 1,
        'prev_text' => '«',
        'next_text' => '»',
      ));
    }
    ?>
  </div>
  <!-- ▲ ページネーション ▲ -->

  <?php wp_reset_postdata(); ?>
</article>
<?php get_footer(); ?>
