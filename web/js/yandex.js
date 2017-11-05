/*
	ЯНДЕКС ДИСК -------------------------------------------------------
*/
function yandex(ret){

	let token = 'AQAAAAAZ1hl4AAShVoKCipTju0UCkzxMLQBHMNo';
	// инфа по диску https://cloud-api.yandex.net/v1/disk/
	$.ajax({
		url: 'https://cloud-api.yandex.net:443/v1/disk/resources/files',
		type: 'GET',
		dataType: 'json',
		headers: {
		"Authorization": "OAuth AQAAAAAZ1hl4AAShVhzqTn55O0oLhyAdDIB2aHY"
		},
		success: function (data) {
		console.log(data);
		yandexDisk(data);
		},
		error: function (error) {
		console.log(error);
		}
	})
	function yandexDisk(json){
		var folders = [];
		var content = [];
		var noFolder = [];
		var x = 0;
		var z = 0;
		for (var i = json.items.length - 1; i >= 0; i--) {
			if(json.items[i].path.replace('disk:/', '').indexOf('/') + 1){
				folders[x] = explode('/', json.items[i].path.replace('disk:/', ''));
				x++;
			}else{
				noFolder[z] = json.items[i].path.replace('disk:/', '');
				z++;
			}
		}
		content = folders;
		// Папка
		//createNote('<br>Folders <br>');
		folders = unique(folders);
		//console.log(content);
		// Содержание папок
		x = 0;
		var y = 1;
		for (var i = folders.length - 1; i >= 1; i--) {
			$("#main table").append('<tr><td><img width="30px" style="padding-bottom: 10px; margin-left: 250px" src="img/folder.png"> '+folders[i]+'</td><th width="30px"><a href="#"><img width="30px" src="img/download.png"></a></th></tr>');			//createNote('<img src="./img/folder.png">'+'<b>' +folders[i] + '</b>' + '<br>');
			for (var j = content.length - 1; j >= 0; j--) {
				if(content[j][0] == folders[i]){
					//createNote(content[j][1] + '<br>');
					
				}
			}
		}
		// Без нихуя
		//createNote('<b>Без ничего</b>' + '<br>');
		for (var i = noFolder.length - 1; i >= 0; i--) {
			if(noFolder[i].indexOf('mp4')+1){
				$("#main table").append('<tr><td><img width="30px" style="padding-bottom: 10px; margin-left: 250px" src="img/mp4.png"> '+noFolder[i]+'</td><th width="30px"><a href="#"><img width="30px" src="img/download.png"></a></th></tr>');			//createNote('<img src="./img/folder.png">'+'<b>' +folders[i] + '</b>' + '<br>');
			}
			if(noFolder[i].indexOf('mp3')+1){
				$("#main table").append('<tr><td><img width="30px" style="padding-bottom: 10px; margin-left: 250px" src="img/mp3.png"> '+noFolder[i]+'</td><th width="30px"><a href="#"><img width="30px" src="img/download.png"></a></th></tr>');			//createNote('<img src="./img/folder.png">'+'<b>' +folders[i] + '</b>' + '<br>');
			}
			if(noFolder[i].indexOf('jpg')+1){
				$("#main table").append('<tr><td><img width="30px" style="padding-bottom: 10px; margin-left: 250px" src="img/jpg.png"> '+noFolder[i]+'</td><th width="30px"><a href="#"><img width="30px" src="img/download.png"></a></th></tr>');			//createNote('<img src="./img/folder.png">'+'<b>' +folders[i] + '</b>' + '<br>');
			}
			if(noFolder[i].indexOf('docx')+1){
				$("#main table").append('<tr><td><img width="30px" style="padding-bottom: 10px; margin-left: 250px" src="img/docx.png"> '+noFolder[i]+'</td><th width="30px"><a href="#"><img width="30px" src="img/download.png"></a></th></tr>');			//createNote('<img src="./img/folder.png">'+'<b>' +folders[i] + '</b>' + '<br>');
			}
			//createNote(noFolder[i] + '<br>');
		}
	}

	function explode( delimiter, string ) {
	var emptyArray = { 0: '' };
	if ( arguments.length != 2
		|| typeof arguments[0] == 'undefined'
		|| typeof arguments[1] == 'undefined' )
	{
		return null;
	}
	if ( delimiter === ''
		|| delimiter === false
		|| delimiter === null )
	{
		return false;
	}
	if ( typeof delimiter == 'function'
		|| typeof delimiter == 'object'
		|| typeof string == 'function'
		|| typeof string == 'object' )
	{
		return emptyArray;
	}
	if ( delimiter === true ) {
		delimiter = '1';
	}
	return string.toString().split ( delimiter.toString() );
}
function unique(arr) {
  var obj = {};

  for (var i = 0; i < arr.length; i++) {
    var str = arr[i][0];
    obj[str] = true;
  }
  return Object.keys(obj);
}
function createNote(text){
            var newLi = document.createElement('li');
            newLi.innerHTML = text;
            list.appendChild(newLi);
        }
}
