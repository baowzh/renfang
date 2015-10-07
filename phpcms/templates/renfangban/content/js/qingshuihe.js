

$(function(){
  $("#tbtn0").mouseover(function(){
      $("#tabzx0").css('display','block');
      $("#tabzx1").css('display','none');
      $("#tabzx2").css('display','none');
      $("#roottab1").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/newbg_01.jpg)"); 
      $("#tbtn0").attr("class" , "p14sycubai");
      $("#tbtn1").attr("class" , "p14sycuhui");
      $("#tbtn2").attr("class" , "p14sycuhui");
      $("#tab1more").attr("href","/index.php?m=content&c=index&a=lists&catid=1240");
  });
  
  $("#tbtn1").mouseover(function(){
      $("#tabzx0").css('display','none');
      $("#tabzx1").css('display','block');
      $("#tabzx2").css('display','none');
      $("#roottab1").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/newbg_02.jpg)"); 
      $("#tbtn0").attr("class" , "p14sycuhui");
      $("#tbtn1").attr("class" , "p14sycubai");
      $("#tbtn2").attr("class" , "p14sycuhui");
      $("#tab1more").attr("href","/index.php?m=content&c=index&a=lists&catid=1241");
  });

  $("#tbtn2").mouseover(function(){
      $("#tabzx0").css('display','none');
      $("#tabzx1").css('display','none');
      $("#tabzx2").css('display','block');
      $("#roottab1").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/newbg_03.jpg)"); 
      $("#tbtn0").attr("class" , "p14sycuhui");
      $("#tbtn1").attr("class" , "p14sycuhui");
      $("#tbtn2").attr("class" , "p14sycubai");
      $("#tab1more").attr("href","/index.php?m=content&c=index&a=lists&catid=1242");
  });

/*
  $("#zbtn1").mouseover(function(){
      $("#zbtn1").attr("class","p14bai");
      $("#zbtn2").attr("class","p14huicuti");
      $("#zbtn1").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/zcfg_red.jpg)");
      $("#zbtn2").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/zcfg_wh.jpg)");
      $("#ztab1").css('display','block');
      $("#ztab2").css('display','none');
      $("#zbtn1link").attr("class","p14bai");
      $("#zbtn2link").attr("class","p14huicuti");      
  });

  $("#zbtn2").mouseover(function(){
      $("#zbtn2").attr("class","p14bai");
      $("#zbtn1").attr("class","p14huicuti");
      $("#zbtn2").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/zcfg_red.jpg)");
      $("#zbtn1").css("background-image" , "url(/phpcms/templates/qingshuihe/content/images/zcfg_wh.jpg)");
      $("#ztab2").css('display','block');
      $("#ztab1").css('display','none');
      $("#zbtn2link").attr("class","p14bai");
      $("#zbtn1link").attr("class","p14huicuti");      
  });
*/
  $("#ftab1").mouseover(function(){
      $("#ftab1body").css('display','block');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  });

  $("#ftab2").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','block');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  }); 

  $("#ftab3").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','block');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  });   

  $("#ftab4").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','block');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  });  

  $("#ftab5").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','block');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  });  

  $("#ftab6").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','block');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','none');
  });  

  $("#ftab7").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','block');
      $("#ftab8body").css('display','none');
  }); 

  $("#ftab8").mouseover(function(){
      $("#ftab1body").css('display','none');
      $("#ftab2body").css('display','none');
      $("#ftab3body").css('display','none');
      $("#ftab4body").css('display','none');
      $("#ftab5body").css('display','none');
      $("#ftab6body").css('display','none');
      $("#ftab7body").css('display','none');
      $("#ftab8body").css('display','block');
  });   


});





$(function(){
  $("#tfv").click(function(){
    window.external.addFavorite('http://www.nmwomen.org.cn','内蒙古妇女网');
    //alert('加入收藏');
  });




$("#tindex").click(function(){
        var url = this.href;
        try {
            this.style.behavior = "url(#default#homepage)";
            this.setHomePage(url);
        } catch (e) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                } catch (e) {
                    alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
                    return false;
                }
                var prefs = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);
                prefs.setCharPref('browser.startup.homepage',url);
            }
        }
        return false;
    });


});


function addEvent(obj,evtType,func,cap){
    cap=cap||false;
if(obj.addEventListener){
     obj.addEventListener(evtType,func,cap);
   return true;
}else if(obj.attachEvent){
        if(cap){
         obj.setCapture();
         return true;
     }else{
      return obj.attachEvent("on" + evtType,func);
   }
}else{
   return false;
    }
}
function getPageScroll(){
    var xScroll,yScroll;
if (self.pageXOffset) {
   xScroll = self.pageXOffset;
} else if (document.documentElement && document.documentElement.scrollLeft){
   xScroll = document.documentElement.scrollLeft;
} else if (document.body) {
   xScroll = document.body.scrollLeft;
}
if (self.pageYOffset) {
   yScroll = self.pageYOffset;
} else if (document.documentElement && document.documentElement.scrollTop){
   yScroll = document.documentElement.scrollTop;
} else if (document.body) {
   yScroll = document.body.scrollTop;
}
arrayPageScroll = new Array(xScroll,yScroll);
return arrayPageScroll;
}
function GetPageSize(){
    var xScroll, yScroll;
    if (window.innerHeight && window.scrollMaxY) { 
        xScroll = document.body.scrollWidth;
        yScroll = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight){
        xScroll = document.body.scrollWidth;
        yScroll = document.body.scrollHeight;
    } else {
        xScroll = document.body.offsetWidth;
        yScroll = document.body.offsetHeight;
    }
    var windowWidth, windowHeight;
    if (self.innerHeight) {
        windowWidth = self.innerWidth;
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) {
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) {
        windowWidth = document.body.clientWidth;
        windowHeight = document.body.clientHeight;
    } 
    if(yScroll < windowHeight){
        pageHeight = windowHeight;
    } else { 
        pageHeight = yScroll;
    }
    if(xScroll < windowWidth){ 
        pageWidth = windowWidth;
    } else {
        pageWidth = xScroll;
    }
    arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
    return arrayPageSize;
}
//广告脚本文件 AdMove.js
/*
例子
<div id="Div2">
    ***** content ******
</div>
var ad=new AdMove("Div2");
ad.Run();
*/
var AdMoveConfig=new Object();
AdMoveConfig.IsInitialized=false;
AdMoveConfig.ScrollX=0;
AdMoveConfig.ScrollY=0;
AdMoveConfig.MoveWidth=0;
AdMoveConfig.MoveHeight=0;
AdMoveConfig.Resize=function(){
    var winsize=GetPageSize();
    AdMoveConfig.MoveWidth=winsize[2];
    AdMoveConfig.MoveHeight=winsize[3];
    AdMoveConfig.Scroll();
}
AdMoveConfig.Scroll=function(){
    var winscroll=getPageScroll();
    AdMoveConfig.ScrollX=winscroll[0];
    AdMoveConfig.ScrollY=winscroll[1];
}
addEvent(window,"resize",AdMoveConfig.Resize);
addEvent(window,"scroll",AdMoveConfig.Scroll);
function AdMove(id){
    if(!AdMoveConfig.IsInitialized){
        AdMoveConfig.Resize();
        AdMoveConfig.IsInitialized=true;
    }
    var obj=document.getElementById(id);
    obj.style.position="absolute";
    var W=AdMoveConfig.MoveWidth-obj.offsetWidth;
    var H=AdMoveConfig.MoveHeight-obj.offsetHeight;
    var x = W*Math.random(),y = H*Math.random();
    var rad=(Math.random()+1)*Math.PI/6;
    var kx=Math.sin(rad),ky=Math.cos(rad);
    var dirx = (Math.random()<0.5?1:-1), diry = (Math.random()<0.5?1:-1);
    var step = 1;
    var interval;
    this.SetLocation=function(vx,vy){x=vx;y=vy;}
    this.SetDirection=function(vx,vy){dirx=vx;diry=vy;}
    obj.CustomMethod=function(){
        obj.style.left = (x + AdMoveConfig.ScrollX) + "px";
        obj.style.top = (y + AdMoveConfig.ScrollY) + "px";
        rad=(Math.random()+1)*Math.PI/6;
        W=AdMoveConfig.MoveWidth-obj.offsetWidth;
        H=AdMoveConfig.MoveHeight-obj.offsetHeight;
        x = x + step*kx*dirx;
        if (x < 0){dirx = 1;x = 0;kx=Math.sin(rad);ky=Math.cos(rad);} 
        if (x > W){dirx = -1;x = W;kx=Math.sin(rad);ky=Math.cos(rad);}
        y = y + step*ky*diry;
        if (y < 0){diry = 1;y = 0;kx=Math.sin(rad);ky=Math.cos(rad);} 
        if (y > H){diry = -1;y = H;kx=Math.sin(rad);ky=Math.cos(rad);}
    }
    this.Run=function(){
        var delay = 10;
        interval=setInterval(obj.CustomMethod,delay);
        obj.onmouseover=function(){clearInterval(interval);}
        obj.onmouseout=function(){interval=setInterval(obj.CustomMethod, delay);}
    }
}



