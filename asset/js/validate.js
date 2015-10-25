
function validate_nik(selector){
	var nik = selector.val();
	if((nik.length == 16) && (!isNaN(nik))){
		return true;
	}else{
		alert('Inputan NIK tidak valid.');
		return false;
	}
}

function validate_tag(selector){
	var tag = selector.val();
	if(tag.length == 14){
		return true;
	}else{
		alert('Inputan Tag ID tidak valid');
		return false;
	}
}