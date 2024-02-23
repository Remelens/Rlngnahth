//img-gallery
function imgGallery(){
//fuck u css...
return;
if(document.querySelector('.blog-content')===null){
    return;
}
document.querySelector('.blog-content').addEventListener('click',function(event){
    if(event.target.nodeName==="IMG"){
        var a=document.createElement('div');
        a.id="imggallery";
        a.innerHTML=`<div><a href="${event.target.src}" target="_blank"><img alt="${event.target.alt}" src="${event.target.src}"/></a><span>${event.target.alt}</span></div>`;
        document.body.appendChild(a);
        document.getElementById('imggallery').addEventListener('click',function(event){
            if(event.target.nodeName==="IMG"){return;}
            document.getElementById('imggallery').classList.add("hide");
            setTimeout(()=>document.body.removeChild(document.getElementById('imggallery')),200);
        });
    }
});
}
//sidebar
function sidebar(){
    if(document.getElementById('sidebar').classList.contains('showsidebar')){
        document.getElementById('sidebar').classList.remove('showsidebar');
    }else{
        document.getElementById('sidebar').classList.add('showsidebar');
    }
}
//about
console.log(`%c Relonease %c ©Remelens `,'font-size:110%;color:#444;background:#f9fafa;','font-size:110%;color:#ccc;background:#1c1e21;');
