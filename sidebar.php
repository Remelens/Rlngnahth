<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="sidebar<?php if($this->fields->Thumbnail&&$this->is('post')){echo ' tumb';}?>" id="sidebar" role="complementary">
    <header id="header">
        <div class="site-name">
            <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                <?php if ($this->options->logoUrl): ?>
                    <img class="logo" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
                <?php endif; ?>
                <span class="title-box">
                    <span id="site-title"><?php $this->options->title() ?></span>
                    <p class="description"><?php $this->options->description() ?></p>
                </span>
            </a>
        </div>
    </header>
    <div class="site-search">
        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
            <input type="text" id="s" name="s" class="text" placeholder="<?php _e('搜索博客'); ?>"/>
            <?php $this->need('img/search.svg'); ?>
        </form>
    </div>
    <?php if (!empty($this->options->siteInfo)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('全站公告'); ?></a></h3>
            <?php echo $this->options->siteInfo; ?>
        </section>
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title hasrss"><?php _e('最新文章'); ?>
            <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRss', $this->options->sidebarBlock)): ?><a class="rss-link" href="<?php $this->options->feedUrl(); ?>"><?php $this->need('img/rss.svg'); ?></a><?php endif; ?></h3>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title hasrss"><?php _e('最近回复'); ?>
            <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRss', $this->options->sidebarBlock)): ?><a class="rss-link" href="<?php $this->options->commentsFeedUrl(); ?>"><?php $this->need('img/rss.svg'); ?></a><?php endif; ?></h3>
            <ul class="widget-list">
                <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                <?php while ($comments->next()): ?>
                    <li>
                        <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>
    <?php if ($this->options->createTime): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('网站信息'); ?></h3>
<?php
$time_mid=time()-strtotime($this->options->createTime);
$time_yr=intval($time_mid/3600/24/365);
$time_mon=intval($time_mid/3600/24/30)-$time_yr*12+1;
$time_day=intval($time_mid/3600/24)-$time_yr*365-($time_mon-1)*30;
echo '本站已经运行: '.strval($time_yr).'年'.strval($time_mon).'月'.strval($time_day).'天';
?>
        </section>
    <?php endif;?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('分类'); ?></h3>
            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('归档'); ?></h3>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAdmin', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('登录'); ?></h3>
            <ul class="widget-list">
                <?php if ($this->user->hasLogin()): ?>
                    <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>
                            (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </section>
    <?php endif; ?>

</div><!-- end #sidebar -->