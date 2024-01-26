<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy;<?php if($this->options->createTime){echo date('Y',strtotime($this->options->createTime)).'-';}?><?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.<br>
    <span class="poweredby">Powered by <a href="https://typecho.org">Typecho</a> and theme <a href="https://github.com/Remelens/Rlngnahth" target="_blank">Rlngnahth</a></span><br>
    <?php echo $this->options->siteFooter; ?>
</footer><!-- end #footer -->
<?php $this->need('pjax.php'); ?>
<?php $this->footer(); ?>
</body>
</html>
