$(document).ready(function(){
    fetch_user();
    setInterval(function(){
		//update_last_activity();
		//fetch_user();
		update_chat_history_data();
		//fetch_group_chat_history();
	}, 5000);
    
   function fetch_user(){ $.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#v-pills-tab').html(data);
			}
		});}
});	

$(document).on('click',function(){
		$('.user_dialog').dialog('destroy').remove();
	});
function make_chat_dialog_box(to_user_id, to_user_name)
	{
        var modal_content = '<div class="tab-pane fade show active" id="'+to_user_id+'" role="tabpanel" aria-labelledby="'+to_user_name+'">'+fetch_user_chat_history(to_user_id)+'</div>';
        createinputarea(to_user_id);
		/*var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';*/
        return modal_content;
	}
function createinputarea(to_user_id){
    var inputstyle = '<div class="bg-secondary p-3"><div class="input-group"><input type="text" id="chat_message_'+to_user_id+'" class="form-control" placeholder="Type something here"><div class="input-group-append"><button class="input-group-text dend_chat" id="'+to_user_id+'"><i class="fa fa-paper-plane"></i></button></div></div></div>';
    document.getElementById('inputarea').innerHTML = inputstyle;
}

	$(document).on('click', '.nav-link', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
        document.getElementById('v-pills-tabContent').innerHTML = make_chat_dialog_box(to_user_id, to_user_name);
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});

    
    	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
                    fetch_user_chat_history(to_user_id);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});
    
    	function update_chat_history_data()
	{
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
	}
    
    function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#'+to_user_id).html(data);
                console.log(data);
			}
		})
	}