<?php
/*==============*
 * Static files *
 *==============*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lxgw-wenkai-screen-webfont/1.7.0/style.min.css" integrity="sha512-uushWJqqsPYQOOyatyQoJ44WljQCC70km/MB94XcZVajojoEWQ7S4DoFMtIh4AqmS0to9mI84jxZHR2aV/OIlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php if($this->options->katex===1||$this->options->katex==='1'):?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.css" integrity="sha512-fHwaWebuwA7NSF5Qg/af4UeDx9XqUpYpOGgubo3yWu+b2IQR4UeQwbb42Ti7gVAjNtVoI/I9TEoYeu9omwcC6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/katex.min.js" integrity="sha512-LQNxIMR5rXv7o+b1l8+N1EZMfhG7iFZ9HhnbJkTp4zjNr5Wvst75AqUeFDxeRUa7l5vEDyUiAip//r+EFLLCyA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.9/contrib/auto-render.min.js" integrity="sha512-iWiuBS5nt6r60fCz26Nd0Zqe0nbk1ZTIQbl3Kv7kYsX+yKMUFHzjaH2+AnM6vp2Xs+gNmaBAVWJjSmuPw76Efg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function LoadLatex() {
        renderMathInElement(document.body, {
          delimiters: [
              {left: '$$', right: '$$', display: true},
              {left: '$', right: '$', display: false},//洛谷KaTeX渲染标志
              {left: '\\(', right: '\\)', display: false},
              {left: '\\[', right: '\\]', display: true}
          ],
          throwOnError : false,
          ignoredClasses:['nokatex'],//禁止渲染katex的类
          ignoredTags:["script", "noscript", "style", "input", "textarea", "pre", "code", "option"]//禁止渲染katex的标签/元素
        });
}
</script>
<?php endif; ?>

<?php if($this->options->twemoji===1||$this->options->twemoji==='1'):?>
<script src="<?php $this->options->themeUrl('static/twemoji.min.js'); ?>" crossorigin="anonymous"></script>
<script>
function LoadTwemoji(){
	twemoji.parse(document.body,  {
    base:'https://cdnjs.cloudflare.com',         // default MaxCDN
    ext: '.svg',          // default ".png"
    className: 'twemoji emoji',    // default "emoji"
    folder: '/ajax/libs/twemoji/15.0.3/svg/'        // in case it's specified
  });
}
</script>
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pjax/0.2.8/pjax.min.js" integrity="sha512-iO07sRG5JOTsN7ndYtu10PsT8Cj1rFyZmIfgtYp5JogZCl7KgSMGcyuMbwVxCJT4oRY5ulCZMEaMdI1Y1HDwbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
//configures
function LoadEx(){
    <?php if($this->options->katex===1||$this->options->katex==='1'):?>
    LoadLatex();
    <?php endif;?>
    <?php if($this->options->twemoji===1||$this->options->twemoji==='1'):?>
    LoadTwemoji();
    <?php endif;?>
}
    document.addEventListener("DOMContentLoaded",LoadEx);
</script>
<style>
img.twemoji{width:1em;height:1em;display:inline-block;margin:0;padding:0 2px;position: relative;
  top: .15em;}
</style>