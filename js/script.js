$(document).ready(function(){
	var base_url = 'yourdomain'; //no slash at the end

	$("#create_post_old_fuck_not_fucking_working_fuck_this_code_3_days_of_figuring_out").click(function(e){
		var post_title = document.getElementById("post_title").value;
		var post_image = document.getElementById("post_image").value;
		var post_content = document.getElementById("post_content").value;
		var post_labels = document.getElementById("post_labels").value;
		if(post_title === "" && post_content === ""){
			return;
		}else{
			$.ajax({
				type: "post",
				url: "./create/process_create",
				enctype: 'multipart/form-data',
				data: "post_title="+post_title+"&post_image="+post_image+"&post_content="+post_content+"&post_labels="+post_labels,
				success: function(data){
					$('#stage').hide();
					var stage = document.getElementById('stage');
					stage.innerHTML = data;
					$('#stage').show(500);
				}
			});
		}
	});
	
	
	$("#create_post_working").click(function(e){
		var formData = new FormData($("#data")[0]);
		$.ajax({
			url: "./create/process_create",
			type: 'POST',
			data: formData, 
			async: false,
			success: function(data){
					$('#stage').hide();
					var stage = document.getElementById('stage');
					stage.innerHTML = data;
					$('#stage').show(500);
			},
			cache: false,
			contentType: false,
			processData: false
		});

		return false;
	});
	
	$("#create_post").click(function(e){
		var frameObj = document.getElementById('post_content_ifr');
		var frameContent = frameObj.contentWindow.document.body.innerHTML;
		$("#post_content").html(frameContent);
		var formData = new FormData($("#data")[0]);
		$.ajax({
			url: "./create/process_create",
			type: 'POST',
			data: formData, 
			async: false,
			success: function(data){
					$('#stage').hide();
					var stage = document.getElementById('stage');
					stage.innerHTML = data;
					$('#stage').show(500);
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
	});
	
	//scripts for update page
		//remove image
	$('#remove_image_working').click(function(e){
		var image = document.getElementById('image').name;
		$.ajax({
			type: "post",
			url: base_url+"/update/image_remove",
			data:"image="+image,
			success: function(data){
				$('#image_result_stage').hide();
				var stage = document.getElementById('image_result_stage');
				stage.innerHTML = data;
				$('.img-wrapper').hide();
				$('#image_result_stage').show(500);
				$('#image_result_stage').hide(2000);
				$('.img_upload_form').show(2000);
			}
	});
	});
	
	$('#remove_image').click(function(e){
		var image = document.getElementById('image').name;
		$.ajax({
			type: "post",
			url: base_url+"/update/image_remove",
			data:"image="+image,
			success: function(data){
				$('#image_result_stage').hide();
				var stage = document.getElementById('image_result_stage');
				stage.innerHTML = data;
				$('.img-wrapper').hide("slow",function(){
					$('#image_result_stage').show("slow",function(){
						$('#image_result_stage').hide("slow",function(){
							$('.img_upload_form').show(1000);
						});
					});
				});
			}
	});
	});
		
		//upload new image
	$('#upload_new_image').click(function(e){
		var formData = new FormData($("#update_image")[0]);
		$.ajax({
			url: base_url+"/update/update_new_image",
			type: 'POST',
			data: formData,
			async: false,
			success: function(data){
				/*$('#upload_new_image').hide();
				$('.img_upload_form').hide();
				$('#show_remove_image_btn').show();
				$('#remove_image_final_btn_wrapper').hide();
				$('#image_result_stage').hide();
				$('#image_result_stage').show("slow", function(){
					$('.img-wrapper').show();
				});*/
				$('#upload_new_image').hide(function(){
					$('.img_upload_form').hide(function(){
						$('#show_remove_image_btn').show(function(){
							$('#remove_image_final_btn_wrapper').hide(function(){
								$('#image_result_stage').hide(function(){
									$('#image_result_stage').show("slow", function(){
										$('.img-wrapper').show(function(){
											var stage = document.getElementById('image_result_stage');
											stage.innerHTML = data;
											var image_url = document.getElementById('new_image').value;
											$('#image').prop('src', image_url + '?' + Math.random())
										});
									});
								});
							});
						});
					});
				});
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
	});
	
	$('#image_update').change(function(){
		$('#upload_new_image').show();
	});
	
		//update the edited post
	$('#update_post').click(function(e){
		var frameObj = document.getElementById('post_content_ifr');
		var frameContent = frameObj.contentWindow.document.body.innerHTML;
		$("#post_content").html(frameContent);
		var post_url = document.getElementById('url').value;
		var post_title = document.getElementById("post_title").value;
		var post_content = document.getElementById("post_content").value;
		var post_labels = document.getElementById("post_labels").value;
		var post_type = $( "#post_type" ).val();
		if(post_title === "" && post_content === ""){
			return;
		}else{
			$.ajax({
				type: "post",
				url: base_url+"/update/update_post",
				data: "post_type="+post_type+"&post_url="+post_url+"&post_title="+post_title+"&post_content="+post_content+"&post_labels="+post_labels,
				success: function(data){
					$('#stage').hide();
					var stage = document.getElementById('stage');
					stage.innerHTML = data;
					$('#stage').show(500);
					$('#hidden_update_buttons').hide(function(){
						$('#show_update_post_buttons').show();
					});
				}
			});
		}
	});
	
		//confirm update buttons
	$('#show_remove_image_btn').click(function(e){
		$(this).hide(function(){
			$('#remove_image_final_btn_wrapper').show(500);
		});
	});
	
	$('#remove_image_cancel').click(function(e){
		$('#remove_image_final_btn_wrapper').hide(function(){
			$('#show_remove_image_btn').show(200);
		});
	});
	
	$('#show_update_post_buttons').click(function(){
		$(this).hide(200, function(){
			$('#hidden_update_buttons').show(200);
		});
	});
	
	$('#update_post_cancel').click(function(){
		$('#hidden_update_buttons').hide(200, function(){
			$('#show_update_post_buttons').show(200);
		});
	});
	
	//register
	$("#submit-form").click(function(e){

		var formData = new FormData($("#data")[0]);
		
		$.ajax({
			url: base_url+'/'+document.getElementById('post_url').value,
			type: 'POST',
			data: formData,
			async: false,
			success: function(data){
					$('#stage').hide('fast');
					var stage = document.getElementById('result-stage');
					stage.innerHTML = data;
					$('#result-stage').show(function(){
						var signal = document.getElementById('success_signal').value;
						if(signal='success'){
							$('#data').hide();
						}
					});
			},
			cache: false,
			contentType: false,
			processData: false
		});

		return false;
	});
	
	//login
	$("#login").click(function(e){
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		if(username === "" && password === ""){
			return;
		}else{
			$.ajax({
				type: "post",
				url: base_url+"/login",
				data: "username="+username+"&password="+password,
				success: function(data){
					var stage = document.getElementById('result-stage');
					stage.innerHTML = data;
					$('#result-stage').hide('fast',function(){
						$('#result-stage').show('slow');
					});
				}
			});
		}
	});
	
	//dashboard
	$('.show_delete').click(function(){
		$(this).hide('slow', function(){
			$(this).prevAll('span').fadeIn('slow');		
		});
	});
	
	$('.cancel_delete').click(function(){
		$(this).parent('span').fadeOut(function(){
			$(this).nextAll('.show_delete').fadeIn('slow');
		});
	});
	
	$(".confirm_delete").click(function(e){
		$url = this.getAttribute('data');
		var child = this;
		$.ajax({
			context:this,
			type: "post",
			url: $url,
			success: function(data){
				var stage = document.getElementById('result-stage');
				stage.innerHTML = data;
				$('.result-stage').hide('fast',function(){
					$('.result-stage').show('slow', function(){
						$(child).closest('tr').remove();
					});
				});
			}
		});
	});
});