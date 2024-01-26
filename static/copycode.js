function showCopyButton(){
    var pre=document.getElementsByTagName('pre');
    for(let i=0;i<pre.length;i++){
        pre[i].innerHTML+=`<button class="copycode" onclick="CopyCode(${i});">Copy</button>`;
    }
}
function CopyCode(num){
    var btn=document.getElementsByTagName('pre')[num].querySelector('.copycode');
    navigator.clipboard.writeText(document.getElementsByTagName('pre')[num].querySelector('code').innerText);
    btn.innerHTML='Copied!';
    setTimeout(()=>btn.innerHTML='Copy',1000);
}
