<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv='x-dns-prefetch-control' content='on' />
    <meta name="force-rendering" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="HandheldFriendly" content="True" >
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $this->need('static.php');?>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('generator='); ?>
    <!--end-->
    <meta name="theme-color" content="#f8f8f8"><!--TODO-->
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style_dark.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/pages.css'); ?>">
    <script>
console.log(`%c Relonease %c ©Remelens `,'font-size:110%;color:#444;background:#f9fafa;','font-size:110%;color:#ccc;background:#1c1e21;');
function sidebar(){
  if(document.getElementById('sidebar').classList.contains('showsidebar')){
    document.getElementById('sidebar').classList.remove('showsidebar');
  }else{
    document.getElementById('sidebar').classList.add('showsidebar');
  }
}
    </script>
    <?php echo $this->options->siteHeader; ?>
</head>
<body>
<div id="pjax-load"></div>
<div class="mobilebtn">
<button onclick="sidebar()"><?php $this->need('img/bar.svg'); ?></button>
</div>
<div id="body">