<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>
<div class="main" id="main">
    <?php $this->need('topbar.php'); ?>
    <div class="error-page">
        <div class="error-icon">
            <?php $this->need('img/404.svg'); ?>
        </div>
        <div class="error-content">
            <h1 class="post-title"><?php _e('网页被吃掉了~'); ?></h1>
            <p><?php _e('啊啊啊！快去给404喂点催吐剂（（'); ?></p>
        </div>
    </div>

</div><!-- end #content-->
<?php $this->need('footer.php'); ?>
