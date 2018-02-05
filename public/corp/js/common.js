jQuery(document).ready(function($){
$('.commentlist li').each(function(i){
	
$(this).find('div.commentNumber').text('#'+(i+1));

});
$('#commentform').on('click','#submit',function(i){
	i.preventDefault();
	var comParent = $(this);
	var parent = $('#commentform');
	$('.wrapp-result').css('color','green').text('Cохранение комментария').fadeIn(1000,function(){
		var data = parent.serializeArray();
		$.ajax({
			url: $('#commentform').attr('action'),
			data: data,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type: 'POST',
			datatype: 'JSON',
			success: function(html){
				if(html.error){
					$('.wrapp-result').css('color','red').append('<br /> <strong>Ошибка:</strong>'+html.error.join('</br>'));
					$('.wrapp-result').delay(2000).fadeout(500);
				}else if(html.success){
						$('.wrapp-result').append('<br /> <strong>Сохранено</strong>').delay(2000).fadeOut(500,function(){
							if(html.data.parent_id >0){
									comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
							}else{
								if($.contains('#comments','ol.commentlist')){
									$('ol.commentlist').append(html.comment);
								}else{
									parent.before('<ol class="commentlist group">'+ html.comment +'</ol>');
								}
							}
							$('#cancel-comment-reply-link').click();
														
						});
				}
				
			},
			error: function(){
				$('.wrapp-result').css('color','red').append('<br /> <strong>Ошибка:</strong>');
				$('.wrapp-result').delay(2000).fadeout(500,function(){
					$('#cancel-comment-reply-link').click();
				});
			
		}

		});




	});
});

});