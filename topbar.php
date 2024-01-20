<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="nav-menu">
    <nav id="nav-menu" class="clearfix" role="navigation">
        <a class="listitem<?php if ($this->is('index')): ?> current<?php endif; ?>"
            href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
        <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
        <?php while ($pages->next()): ?>
        <a class="listitem<?php if ($this->is('page', $pages->slug)): ?> current<?php endif; ?>"
                href="<?php $pages->permalink(); ?>"
                title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
    </nav>
</div>