/*
	ЯНДЕКС ДИСК -------------------------------------------------------
*/
	let token = 'AQAAAAAZ1hl4AAShVoKCipTju0UCkzxMLQBHMNo';
// инфа по диску https://cloud-api.yandex.net/v1/disk/
	$.ajax({
		url: 'https://cloud-api.yandex.net:443/v1/disk/resources/files',
		type: 'GET',
		dataType: 'json',
		headers: {
		"Authorization": "OAuth AQAAAAAZ1hl4AAShVgItX7r5uk10uQGfmwlvZJ0"
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
		$(document).ready(function(){ $("p").append("<br>Folders <br>")});
		folders = unique(folders);
		console.log(content);
		// Содержание папок
		x = 0;
		var y = 1;
		for (var i = folders.length - 1; i >= 0; i--) {
			$(document).ready(function(){ $("p").append('<b>' +folders[i] + '</b>' + '<br>')});
			for (var j = content.length - 1; j >= 0; j--) {
				if(content[j][0] == folders[i]){
					$(document).ready(function(){ $("p").append(content[j][1] + '<br>')});
				}
			}
		}
		// Без нихуя
		$(document).ready(function(){ $("p").append('<b>Без нихуя</b>' + '<br>')});
		for (var i = noFolder.length - 1; i >= 0; i--) {
			$(document).ready(function(){ $("p").append(noFolder[i] + '<br>')});
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