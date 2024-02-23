<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
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
<nav id="pagination">
 <?php $this->pageNav('<i class="fas fa-chevron-left fa-fw"></i>', '<i class="fas fa-chevron-right fa-fw"></i>', 1, '...', ['wrapTag' => 'div', 'wrapClass' => 'pagination', 'itemTag' => '', 'prevClass' => 'extend prev', 'nextClass' => 'extend next', 'currentClass' => 'page-number current']); ?>
</nav>
</div><!-- end #main-->