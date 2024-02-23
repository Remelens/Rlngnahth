<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <h2 class="archive-title"><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ''); ?></h2>
    <?php if ($this->have()): ?>
        <div class="post-list">
        <?php while ($this->next()): ?>
        <?php $tumb_img=get_ArticleThumbnail($this); ?>
        <article class="listblog post<?php if($tumb_img!==false){echo ' tumb-img';}?>" itemscope itemtype="http://schema.org/BlogPosting">
            <?php if($tumb_img!==false):?>
                <a href="<?php $this->permalink() ?>">
                <?php echo '<div class="img"><img class="timg" alt="" src="'.$tumb_img.'"></div>';?>
                </a>
            <?php endif; ?>
            <div class="box">
                <h2 class="post-title" itemprop="name headline"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                <div class="post-content" itemprop="articleBody">
                    <?php if (!empty($this->options->listAllBlog) && $this->options->listAllBlog==='Show100Chars'): ?>
                        <?php $this->excerpt(100, '...'); ?>
                    <?php elseif (!empty($this->options->listAllBlog) && $this->options->listAllBlog==='ShowDiv'): ?>
                        <?php $this->content('- 阅读剩余部分 -'); ?>
                    <?php elseif (!empty($this->options->listAllBlog) && $this->options->listAllBlog==='ShowAll'): ?>
                        <?php $this->content(''); ?>
                    <?php endif; ?>
                </div>
                <span class="post-meta">
                    <a href="<?php $this->permalink() ?>" class="author"><?php $this->author(); ?></a>
                    <?php _e('| 发布于 '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                    <?php _e('| 分类:'); ?><?php $this->category(','); ?>
                    <?php _e('| '); ?><a itemprop="discussionUrl"
                           href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                </span>
            </div>
        </article>
        <?php endwhile; ?>
        </div>
    <?php else: ?>
        <article class="post">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>

<nav id="pagination">
 <?php $this->pageNav('<i class="fas fa-chevron-left fa-fw"></i>', '<i class="fas fa-chevron-right fa-fw"></i>', 1, '...', ['wrapTag' => 'div', 'wrapClass' => 'pagination', 'itemTag' => '', 'prevClass' => 'extend prev', 'nextClass' => 'extend next', 'currentClass' => 'page-number current']); ?>
</nav>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
