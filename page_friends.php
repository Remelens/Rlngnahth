<?php 
/**
 * 友链
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="post-page main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <div class="page-content friend-link">
        <h2 id="page-title">友情链接</h2>
        <div class="friend-links">
        <?php echo friendLink($this->options->friendLinks); ?>
        </div>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
