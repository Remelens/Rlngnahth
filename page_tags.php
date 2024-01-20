<?php 
/**
 * 标签云
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $this->need('sidebar.php'); ?>

<div class="main" id="main" role="main">
    <?php $this->need('topbar.php'); ?>
	<div class="page-content tags">
	  <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=0&desc=0&limit=2000')->to($tags); 	
	   if($tags->have()): ?>
	   <h2>标签云</h2>
	   <ul class="tags-list">
		<?php while ($tags->next()): ?>
    		<li><a style="color:rgb(<?php echo(rand(0,255)); ?>,<?php echo(rand(0,255)); ?>,<?php echo(rand(0, 255)); ?>)" rel="tag" class="tagslink" href="<?php $tags->permalink(); ?>"  title="<?php $tags->name(); ?>" style='display: inline-block; margin: 0 5px 5px 0;'><?php $tags->name(); ?></a></li>
		<?php endwhile; ?>
    	   </ul>
	   <?php endif; ?>
	</div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
