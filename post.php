<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php if($this->fields->Thumbnail){echo '<img alt="" src="'.$this->fields->Thumbnail.'" class="tumbhead"/>';}?>
<?php $this->need('sidebar.php'); ?>

<div class="main<?php if($this->fields->Thumbnail&&$this->is('post')){echo ' tumb';}?>" id="main" role="main">
    <article class="post blog-content" itemscope itemtype="http://schema.org/BlogPosting">
        <span class="position"><a href="/">首页</a> / <?php $this->category(' / '); ?></span><br>
        <span class="info">由 <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> 发表于<time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>，更新于<time datetime="<?php echo date('c',$this->modified);?>"><?php echo date('Y-m-d H:i:s', $this->modified); ?></time></span>
        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
        <div class="post-content main-post" itemprop="articleBody">
<?php 
echo $this->content;
?>
        </div>
        <div class="info-block main-post">
            <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, '无'); ?></p>
            <div class="license-area">
                <h3>许可协议</h3>
                本文作者 <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> ， <?php displayLicense($this);?>
            </div>
            <hr>
            <div class="share-area">
                <h3>分享本文</h3>
                <?php $this->permalink(); ?>
            </div>
        </div>
        <div class="other-blog">
            <div class="last">
                <span class="other-position">上一篇</span>
                <span class="blog"><?php $this->thePrev('%s', '没有了'); ?></span>
            </div>
            <div class="next">
                <span class="other-position">下一篇</span>
                <span class="blog"><?php $this->theNext('%s', '没有了'); ?></span>
            </div>
        </div>
    </article>

    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
