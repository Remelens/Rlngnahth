<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
if($this->options->pjax===0||$this->options->pjax==='0')exit;
?>
<script id="pjax-script">
var pjax = new Pjax({
  selectors: ["#main",'.tumbhead','#sidebar','title'],
  cacheBust:false
});
var pjld,pjldnum=0;
function pjaxadd(){
    document.getElementById('pjax-load').style.background=`linear-gradient(to right,var(--sidebar-title) ${pjldnum}%,#0000 ${pjldnum}%)`;
    if(pjldnum<95){
        pjldnum+=1;
    }else{
        clearInterval(pjld);
    }
}
document.addEventListener("pjax:complete", function () {
  pjldnum=0;
  clearInterval(pjld);
  document.getElementById('pjax-load').classList.remove('onload');
  document.getElementById('pjax-load').style.background=`linear-gradient(to right,var(--sidebar-title) 0%,#0000 0%)`;
  LoadEx();
<?php echo $this->options->pjaxCallback;?>
});
document.addEventListener("pjax:send", function () {
  pjldnum=0;
  var thumb=document.getElementById('pjax-load');
  thumb.classList.add('onload');
  pjld=setInterval(()=>pjaxadd(),20);
});
</script>