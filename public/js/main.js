var postId = 0;
var tempjudul =null;
var tempharga  =null;
var tempdesk = null;
var newpath = null;

$('.isitahu').find('.interaction').find('.edit').on('click',function(){
	
	event.preventDefault();

	
	tempjudul =event.target.parentNode.parentNode.childNodes[1];
	tempdesk  =event.target.parentNode.parentNode.childNodes[3];
	tempharga  =event.target.parentNode.parentNode.childNodes[5];

	var JudulTahu = tempjudul.textContent;
	var Deskripsi = tempdesk.textContent;
	var Harga     = tempharga.textContent;
	var Image_Path = $(this).closest('.isitahu').find('.poto-tahu').attr('src');

	postId =  event.target.parentNode.parentNode.dataset['postid'];

	$('#judul_tahu').val(JudulTahu);
	$('#harga_tahu').val(Harga);
	$('#imagePath').val(Image_Path);
	$('#deskripsi').val(Deskripsi);

	$('#edit-modal').modal();
});


$('#modal-save').on('click',function(){
	$.ajax({
		method: 'POST',
		url: url,
		data : { judul: $('#judul_tahu').val(),
				 desk : $('#deskripsi' ).val(),
				 hrg  : $('#harga_tahu').val(),
				 img  : $('#imagePath' ).val(),
				 postId: postId, _token: token  }
	})

	.done(function(msg){
			
			$(tempjudul).text(msg['judulbaru']);
			$(tempharga).text(msg['hargabaru']);
			$(tempdesk).text(msg['deskripsibaru']);
			
			$('#edit-modal').modal('hide');
			/*
			console.log(msg['message']);
			console.log(msg['message1']);
			console.log(msg['message2']);
			console.log(msg['message3']);
			console.log(msg['message4']);
			console.log(msg['message6']);*/
	});

});