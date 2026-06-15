<?php 
/**
 * 归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="post-page main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <div class="page-content lists">
    <h2 id="page-title">所有文章</h2>
    <div class="article-sort">
    <?php $archives = getArchives($this); ?>
    <?php if (!empty($archives)): ?>
        <?php $number = 0; ?>
        <?php foreach ($archives as $year => $posts): ?>
        <?php $open = ($number === 0) ? NULL : ' closed'; ?>
        <div class="list-year<?php echo $open; ?>">
            <h3 class="sort-year"><?php echo $year; ?> 年</h3>
            <?php foreach ($posts as $created => $post): ?>
            <div class="article-sort-item">
                <time class="post-meta-date-created" datetime="<?php echo $created; ?>" title="发表于<?php echo date('Y-m-d', $created); ?>"><?php echo date('m-d', $created); ?></time>
                <a class="article-sort-item-title" href="<?php echo $post['permalink']; ?>" title="<?php echo $post['title']; ?>"><?php echo $post['title']; ?></a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php $number++; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>暂无文章</p>
    <?php endif; ?>
    </div>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
