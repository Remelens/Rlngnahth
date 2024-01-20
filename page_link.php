<?php 
/**
 * 分类
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
    <div class="page-content category">
        <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
