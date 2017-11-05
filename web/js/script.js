function enter(){
		  if (document.getElementById('drive').checked){ 
	        trySampleRequest();
		  }
		  if(document.getElementById('yand').checked){
		  	window.open('https://oauth.yandex.ru/authorize?response_type=token&client_id=4b479e43e55847a5a5d2eb9a53052e21&display=popuplogin_hint=Никита&force_confirm=yes&state=<произвольная строка>', '_blank');
		  }
	  }
	  function getUrlVars() {
	    var vars = {};
	    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	        vars[key] = value;
	    });
	    return vars;
	}
	 //sessvars.$.prefs.memlimit = '10000';
	 var access_token = getUrlVars()["access_token"];
	 if(access_token.indexOf('ya29.') + 1){
	 	sessvars.google = {access_token: access_token}
	 	alert(sessvars.google['access_token']);
	 }else{
	 	sessvars.yandex = {access_token: access_token}
	 	alert(sessvars.yandex['access_token']);
	 }
	 function checkKek(cloud){
	 	if (!document.getElementById(cloud).checked){ 
	        document.getElementById(cloud).checked = true;
		  }else{
		  	document.getElementById(cloud).checked = false;
		  }
	 }
	 if(sessvars.tok_acc['yandexToken']){
	 	var newLi = document.createElement('button');
        newLi.innerHTML = 'text';
        newLi.onclick = 'window.location.href = "files.php"';
        form.appendChild(newLi);
	 }