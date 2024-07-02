var tipos = new Array(4);
        tipos[0]=('NT');
        tipos[1]=('PR');
        tipos[2]=('RH');
        tipos[3]=('LD');
function identificaBrowser(){
    var nom = navigator.appName;
    var elem = document.getElementById("div_dest");
    if (nom != "Netscape"){  
        elem.className = 'IE';
    }
    else{  
        elem.className = 'NET';
    }
}

function someBanner(){
        Effect.Fade('div_dest', { from: 1, to: 0.05 });

}

function quebraFluxo(i){
    var url = 'inicio/home.php';
    var params = 'type='+ tipos[i];
    var retorno = new Ajax.Request(
         url, {
	     method: 'post',
	     parameters: params,
	     onComplete: alteraDestaque
          }
    );
    for(j=0;j<4;j++){
        var m=document.getElementById('menu'+tipos[j]);
        m.className = '';
    }
    var m=document.getElementById('menu'+tipos[i]);
        m.className = 'selected';
}

function mudaBanner(){
    if($('div_menu')){
        $('div_dest').setOpacity(0);
        $('div_dest').setStyle({visibility: 'visible'});
        new Effect.Opacity(
           'div_dest', { 
              from: 0.05, 
              to: 1.0
           }
        );
        if(i>3){i=0}
        for(j=0;j<4;j++){
            var m= $('menu'+tipos[j]);
            m.className = '';
        }
        var m= $('menu'+tipos[i]);
            m.className = 'selected';
    	       var url = 'inicio/home.php';
    	       var params = 'type='+ tipos[i];
    	       var retorno = new Ajax.Request(
                     url, {
    			     method: 'post',
    			     parameters: params,
    			     onComplete: alteraDestaque
    		          }
    		      );
            i= i+1;
            setTimeout('someBanner()',5900)       
        	setTimeout('mudaBanner()',7000);
    }
}

function alteraDestaque( resp){
	var elemento=$('div_dest');
		elemento.innerHTML=decodeURI(resp.responseText);
}

function naoLogado(){
    new Effect.Pulsate($('naoLogado'));
}

function limitaImagens(){
        var lMax = 600; 
        elem = document.getElementsByTagName("IMG");
        for(i=0;i<elem.length;i++){
              if (elem[i].offsetWidth > lMax){
                h = elem[i].offsetHeight;
                l = elem[i].offsetWidth;
                elem[i].style.width = lMax;
                elem[i].style.height = (((lMax*100)/l)*h)/100;                   
              }
        }
}

function startTime(){
	var today = new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	
	function checkTime(i){
		if (i<10){
			i="0" + i;
		}
		return i;
	}
    h=checkTime(h);
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
	t=setTimeout('startTime()',900);
}