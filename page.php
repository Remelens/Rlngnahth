<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="post-page main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <article class="post page-content" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
        <div class="post-content main-post" itemprop="articleBody">
<?php 
//echo $this->content;
echo contentReplace($this->content);
?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
