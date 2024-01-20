<?php 
/**
 * 归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <div class="page-content lists">
    <h2 id="page-title">所有文章</h2>
    <div class="article-sort">
    <?php 
    $archives = getArchives($this);
    $number = 0;
    foreach($archives as $year => $posts) {
        $open = ($number === 0) ? NULL : ' closed';
        echo '<div class="list-year"><h3 class="sort-year">'.$year.' 年</h3>';
        foreach($posts as $created => $post) {
            echo '<div class="article-sort-item">'.
'<time class="post-meta-date-created" datetime="'.$created.'" title="发表于'.date('Y-m-d',$created).'">'.
date('m-d',$created).
'</time>'.
'<a class="article-sort-item-title" href="'.$post['permalink'].'" title="'.$post['title'].'">
'.$post['title'].
'</a>'.
'</div>'; //输出文章日期和标题
        }
        echo '</div>';
        $number++;
      }
?>
    </div>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
