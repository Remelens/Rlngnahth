<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $siteInfo = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'siteInfo',
        null,
        null,
        _t('全站公告'),
        _t('在侧栏显示全站公告，留空则不显示')
    );

    $form->addInput($siteInfo);

    $listAllBlog = new \Typecho\Widget\Helper\Form\Element\Radio(
        'listAllBlog',
        [
            'Show100Chars'=>_t('截断前100字符'),
            'ShowDiv'=>_t('摘要分割线'),
            'ShowAll'=>_t('全部输出'),
        ],
        'Show100Chars',
        _t('博客摘要输出')
    );

    $form->addInput($listAllBlog);
    $avatar = new \Typecho\Widget\Helper\Form\Element\Select(
        'avatar',
        [
            '官方源',
            'Gravatar CN',
            '七牛云',
            '极客族',
            '禾令奇',
            '九月的风',
            'loil'
        ],
        '七牛云',
        _t('gravatar服务'),
        _t('自定义gravatar源')
    );
    $form->addInput($avatar);

    $siteHeader = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'siteHeader',
        null,
        null,
        _t('自定义head标签'),
        _t('插入你需要的样式')
    );

    $form->addInput($siteHeader);

    $siteFooter = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'siteFooter',
        null,
        null,
        _t('自定义footer'),
        _t('您可以在此插入备案号等信息')
    );

    $form->addInput($siteFooter);

    $pjax = new \Typecho\Widget\Helper\Form\Element\Select(
        'pjax',
        [
            '关闭',
            '启用'
        ],
        '启用',
        _t('使用pjax'),
        _t('全站无刷新加载页面')
    );
    $form->addInput($pjax);

    $pjaxCallback = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'pjaxCallback',
        null,
        null,
        _t('pjax回调'),
        _t('插入js代码，解决pjax导致的新页面js不执行')
    );

    $form->addInput($pjaxCallback);

    $katex = new \Typecho\Widget\Helper\Form\Element\Select(
        'katex',
        [
            '关闭',
            '启用'
        ],
        '启用',
        _t('启用KaTeX'),
        _t('在你的博文里插入数学公式')
    );
    $form->addInput($katex);

    $twemoji = new \Typecho\Widget\Helper\Form\Element\Select(
        'twemoji',
        [
            '关闭',
            '启用'
        ],
        '启用',
        _t('启用TwEmoji'),
        _t('推特同款emoji-干碎丑陋的系统样式')
    );
    $form->addInput($twemoji);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowRss'          => _t('显示RSS地址'),
            'ShowAdmin'          => _t('显示登录地址（建议关闭）')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowRss'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}
function themeFields($layout)
{
    $Thumbnail = new \Typecho\Widget\Helper\Form\Element\Text(
        'Thumbnail',
        null,
        null,
        _t('文章略缩图'),
        _t('如果留空则采用文章内第一张图片')
    );
    $layout->addItem($Thumbnail);
    $license = new \Typecho\Widget\Helper\Form\Element\Select(
        'license',
        [
            'CC-BY-SA-4.0',
            'CC-BY-4.0',
            'CC-BY-NC-SA-4.0',
            'CC0',
            'Copyright'
        ],
        'CC-BY-SA-4.0',
        _t('协议'),
        _t('自定义文章许可协议')
    );
    $layout->addItem($license);
}
function themeInit($archive) {
    if ($archive->is('category', 'archive')) {
        $archive->parameter->pageSize = 10;
    }
}
function getPostImg($archive)
{
    $img = array();
    preg_match_all("/<img.*?src=\"(.*?)\".*?\/?>/i", $archive->content, $img);
    if (count($img) > 0 && count($img[0]) > 0) {
        return $img[1][0];
    } else {
        return 'none';
    }
}
function get_ArticleThumbnail($widget){
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    if ($widget->fields->Thumbnail) {
        return $widget->fields->Thumbnail;
    } else if (preg_match_all($pattern, $widget->content, $thumbUrl) && strlen($thumbUrl[1][0]) > 7) {
        return $thumbUrl[1][0];
    } else {
        return false;
    }
}
function displayLicense($widget){
    if(!$widget->fields->license){
        echo '采用 <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">CC-BY-SA-4.0</a> 许可协议，转载请注明出处。';
        return;
    }
    switch($widget->fields->license){
        case 0:
            echo '采用 <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">CC-BY-SA-4.0</a> 许可协议，转载请注明出处。';break;
        case 1:
            echo '采用 <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">CC-BY-4.0</a> 许可协议，转载请注明出处。';break;
        case 2:
            echo '采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">CC-BY-NC-SA-4.0</a> 许可协议，转载请注明出处。';break;
        case 3:
            echo '采用 <a href="https://creativecommons.org/public-domain/cc0/" target="_blank">CC0</a> 许可协议。';break;
        case 4:
            echo '保留所有权利。';break;
        default:
            echo '<b>Debug:</b>'.$widget->fields->license[0].'<br>';
    }
}
function changeAvatar(){
    switch(Helper::options()->avatar){
        case 0:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://en.gravatar.com/avatar/');
            break;
        case 1:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cravatar.cn/avatar/');
            break;
        case 2:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://dn-qiniu-avatar.qbox.me/avatar/');
            break;
        case 3:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://sdn.geekzu.org/avatar/');
            break;
        case 4:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cdn.helingqi.com/avatar/');
            break;
        case 5:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cdn.sep.cc/avatar/');
            break;
        case 6:
            define('__TYPECHO_GRAVATAR_PREFIX__', 'https://gravatar.loli.net/avatar/');
            break;
    }
}
//评论自定义
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
            <span itemprop="image"><?php $comments->gravatar('64', ''); ?></span>
            <cite class="fn">
                <span class="author"><?php $comments->author(); ?></span>
                <span class="comment-meta"><a href="<?php $comments->permalink(); ?>"><time itemprop="commentTime" datetime="<?php $comments->date(); ?>"><?php $comments->date('Y-m-d H:i'); ?></time></a></span>
            </cite>
        </div>
        <div class="comment-content"><?php $comments->content(); ?></div>
        <div class="comment-reply"><?php $comments->reply(); ?></div>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php 
}
function getArchives($widget) {
        $db = Typecho_Db::get();
        $rows = $db->fetchAll($db->select()
        ->from('table.contents')
         ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->where('table.contents.type = ?', 'post')
        ->where('table.contents.status = ?', 'publish'));
          
        $stat = array();
        foreach ($rows as $row) {
            $row = $widget->filter($row);
            $arr = array(
                'title' => $row['title'],
                'permalink' => $row['permalink']
            );
            $stat[date('Y', $row['created'])][$row['created']] = $arr;
        }
        return $stat;
}
