$(document).ready(function(){
    fetch_user();
    console.log(document.getElementById('v-pills-tabContent').clientWidth);
    setInterval(function(){
        //update_last_activity();
		update_chat_history_data();
	}, 5000);
    
   function fetch_user(){ $.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#v-pills-tab').html(data);
			}
		});}
});	

function make_chat_dialog_box(to_user_id, to_user_name)
	{
        var modal_content = '<div class="tab-pane fade show active" id="'+to_user_id+'" role="tabpanel" aria-labelledby="'+to_user_name+'">'+fetch_user_chat_history(to_user_id)+'</div>';
        createinputarea(to_user_id);
        return modal_content;
	}
function createinputarea(to_user_id){
    var inputstyle = '<div class="bg-secondary p-3"><div class="input-group"><input type="text" id="chat_message_'+to_user_id+'" class="form-control chat_message" placeholder="Type something here"><div class="input-group-append"><button type="button" name="send_chat" id="'+to_user_id+'" class="send_chat"><i class="fa fa-paper-plane"></i></button></div></div></div></div></div>';
    document.getElementById('inputarea').innerHTML = inputstyle;
}
function scrolld () {
        $('div,div,div,ul').animate({scrollTop: $(document).height()},0);
    }

	$(document).on('click', '.nav-link', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
        document.getElementById('chatwith').innerHTML = '<div class="text-light ml-5"><h2><b>'+to_user_name+'</b></h2></div>';
        document.getElementById('v-pills-tabContent').innerHTML = make_chat_dialog_box(to_user_id, to_user_name);
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
        setTimeout(function(){ scrolld() }, 1000);
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
            setTimeout(function(){ scrolld() }, 200);
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
        var width = document.getElementById('v-pills-tabContent').clientWidth;
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id,
                 width:width},
			success:function(data){
				$('#'+to_user_id).html(data);
			}
		})
	}