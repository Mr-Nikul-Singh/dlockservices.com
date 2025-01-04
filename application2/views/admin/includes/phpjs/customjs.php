<script>

function update_(id){
    $('input[data-id="' + id + '"]').prop('disabled', false);
}

$(document).ready(function() {
    $('#file').on('change', function(event) {
        var files = event.target.files;
        var output = $('#output');
        output.empty();
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var img = $('<img>');
        img.attr('src', URL.createObjectURL(file));
        output.append(img);
        }
    });
});

function getImage(el){

    document.getElementById('output').src = window.URL.createObjectURL(el.files[0])
    str = $("#customFile").val();
    $('#titleImage').val(str.split(/[\\/]/).pop()); 
}

function set_limit(val){
    $.post("<?= site_url('setting/pager-limit') ?>",
    {
        limit: val,
    },
    function(data, status){
        location.reload();
    });
}

<?php if(!empty($this->session->tempdata('success'))): ?>
    //Notify
    $.notify({
        icon: 'ti ti-<?= (!empty($this->session->tempdata('icon'))) ? $this->session->tempdata('icon') : 'info' ?>',
        title: '<?= (!empty($this->session->tempdata('success'))) ? $this->session->tempdata('success') : '' ?>',
        message: 'Secured',
    },{
        type: 'info',
        placement: {
            from: "bottom",
            align: "right"
        },
        time: 1000,
    });
<?php endif; ?>





function site_url(url = ''){

	<?php if ($_SERVER['HTTP_HOST'] === 'dlockservices.local:8082') { ?>

		return location.protocol + "//" + location.host + '/' + url;

	<?php } else { ?>

		return location.protocol + "//" + location.host + '/' + url;
		
	<?php } ?>

}




function BulkDelete(deletationRecord_Type){

	var selectedValues = []; // Array to store selected values

	// Get all checkboxes with class 'checkItem'
	var checkboxes = document.querySelectorAll('.checkItem');

	// Loop through each checkbox
	checkboxes.forEach(function(checkbox) {
		// Check if the checkbox is checked
		if (checkbox.checked) {
			// If checked, add its value to the array
			selectedValues.push(checkbox.value);
		}
	});

	if (selectedValues.length < 1) {
		get_message('alert-triangle','Please select record.');
	}else{
		swal({
		title: 'Are you sure?',
		text: "Are you sure you want to delete selected records?",
		type: 'warning',
		icon   : 'warning',
		buttons:{
			confirm: {
				text : 'Yes, delete it!',
				className : 'btn btn-success'
			},
			cancel: {
				visible: true,
				className: 'btn btn-danger'
			}
		}
		}).then((Delete) => {
			if (Delete) {
				
				$.post(site_url('utility/bulk-delete'),
				{
					ids   : selectedValues,
					rtype: deletationRecord_Type
				},
				function(data, status){
					var json = $.parseJSON(data);
					let title_ = '';
					if(json.status == '200') 
					{ 
						title_ = 'Deleted!';
					} 
					if(json.status != '200'){
						title_ = 'Faild!';
					}
					swal({
						title  : title_,
						icon   : json.icon,
						text   : json.message,
						type   : 'success',
						timer: 2000,
						buttons: {
							confirm: {
								className : 'btn btn-success'
							}
						}
					}).then(function() {
						if(json.status == '200') {
							location.reload();
						}
					});
				});

			} else {
				swal.close();
			}
		});
	}
}


function delete_record(id,route = ''){

	swal({
		title: 'Are you sure?',
		text: "Are you sure you want to delete this?",
		type: 'warning',
		icon   : 'warning',
		buttons:{
			confirm: {
				text : 'Yes, delete it!',
				className : 'btn btn-success'
			},
			cancel: {
				visible: true,
				className: 'btn btn-danger'
			}
		}
	}).then((Delete) => {
		if (Delete) {

			$.post(site_url(route),
			{
				id     : id
			},
			function(data, status){
				var json = $.parseJSON(data)
				let title_ = '';
				if(json.status == '200') 
				{ 
					title_ = 'Deleted!';
				} 
				if(json.status != '200'){
					title_ = 'Faild!';
				}
				swal({
					title  : title_,
					icon   : json.icon,
					text   : json.message,
					type   : 'success',
					timer: 5000,
					buttons: {
						confirm: {
							className : 'btn btn-success'
						}
					}
				});
				if(json.status == '200'){
					$('#remove_'+id).remove();
				}
			});

		} else {
			swal.close();
		}
	});


	// var checkstr = confirm('');
	// if(checkstr == true){
	// 	$.post(site_url(route),
	// 	{
	// 		id     : id
	// 	},
	// 	function(data, status){
	// 		var json = $.parseJSON(data)
			
	// 		$.notify({
	// 			icon: 'fa fa-'+json.icon,
	// 			title: json.message,
	// 			message: 'Secured',
	// 		},{
	// 			type: 'info',
	// 			placement: {
	// 				from: "bottom",
	// 				align: "right"
	// 			},
	// 			time: 1000,
	// 		});

	// 		if(json.status == '200'){
	// 			$('#remove_'+id).remove();
	// 		}
	// 	});
	// }
	// else{
	// 	return false;
	// }
}

function remove_property_image(key,id,img){

	var checkstr = confirm('Are you sure you want to delete this?');
	if(checkstr == true){
		$.post(site_url('remove-unit-image'),
		{
			img: img,
			id : id,
		},
		function(data, status){
			var json = $.parseJSON(data)
			
			$.notify({
				icon: 'ti ti-'+json.icon,
				title: json.message,
				message: 'Secured',
			},{
				type: 'info',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 1000,
			});

			if(json.status == '200'){
				$('#_vimg'+key).remove();
			}
		});
	}
	else{
		return false;
	}
}

function remove_project_image(key,id,img){

	var checkstr = confirm('Are you sure you want to delete this?');
	if(checkstr == true){
		$.post(site_url('remove-project-image'),
		{
			img: img,
			id : id,
		},
		function(data, status){
			var json = $.parseJSON(data)
			
			$.notify({
				icon: 'ti ti-'+json.icon,
				title: json.message,
				message: 'Secured',
			},{
				type: 'info',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 1000,
			});

			if(json.status == '200'){
				$('#_vimg'+key).remove();
			}
		});
	}
	else{
		return false;
	}
}

function get_message(icon,str_message,other_msg = 'Secured'){
	
	$.notify({
		icon: 'ti ti-'+icon,
		title: str_message,
		message: other_msg,
	},{
		type: 'info',
		placement: {
			from: "bottom",
			align: "right"
		},
		time: 1000,
	});
}


function show_loading(message,id='loadingAnimation',dots='.') {
  
  var sendButton = document.getElementById('loading');
  var loadingAnimation = document.getElementById(id);

  // Create the loadingText element
  var loadingText = document.createElement('span');
  loadingText.id = 'loadingText';

  // Create the loadingDots element
  var loadingDots = document.createElement('span');
  loadingDots.id = 'loadingDots';

  // Append the loadingText and loadingDots to the loadingAnimation
  loadingAnimation.innerHTML = ''; // Clear any existing content
  loadingAnimation.appendChild(loadingText);
  loadingAnimation.appendChild(loadingDots);

  // Set the message and dots
  loadingText.innerText = message;
  loadingDots.innerText = dots;

  // Hide the button and show the loading animation
  // sendButton.style.display = 'none';
  loadingAnimation.style.display = 'block';
  if(message == 'hide'){
    loadingAnimation.style.display = 'none';
  }
  // Update the dots animation
  var interval = setInterval(function() {
  if (loadingDots.innerText.length < 3) {
      loadingDots.innerText += dots;
  } else {
      loadingDots.innerText = dots;
  }
  }, 100);
}

$(document).on('click','#checkAll',function () {
    $('.checked').not(this).prop('checked', this.checked)
});

$(document).ready(function() {
        // Get the current page name
        var pathname = window.location.pathname;
        var page = pathname.split("/").pop();

        // Loop through each menu item
        $('.nav-item a').each(function() {
            // Get the href attribute and extract the page name
            var href = $(this).attr('href');
            var menuPage = href.split("/").pop();

            // Check if the page name matches and add the active class
            if (menuPage == page) {
            $(this).addClass('active');
            $(this).parents('.collapse').addClass('show');
            $(this).parents('.nav-item').addClass('active');
            }
        });
    });

    function print_box(url_) {
        var wnd = window.open(url_);
        wnd.print();
    }

    function goBack() {
        window.history.back();
    }

    function calculate_file_size(id,placeholer_id) {
        // File input element ko select karein
        var fileInput = document.getElementById(id);

        // File input element par change event listener lagayein
        var file = fileInput.files[0]; // Pehla file ko select karein (multiple file upload ke liye loop ka upayog kar sakte hain)
        // File size ko bytes, kilobytes (KB), megabytes (MB), aur gigabytes (GB) mein convert karein
        var fileSizeInBytes = file.size;
        var fileSizeInKB = fileSizeInBytes / 1024; // Bytes se KB mein convert
        var fileSizeInMB = fileSizeInKB / 1024; // KB se MB mein convert
        var fileSizeInGB = fileSizeInMB / 1024; // MB se GB mein convert

        // File size ko dynamic tarike se display karein
        var sizeToShow = "";
        if (fileSizeInGB >= 1) {
            sizeToShow = fileSizeInGB.toFixed(2) + " GB";
        } else if (fileSizeInMB >= 1) {
            sizeToShow = fileSizeInMB.toFixed(2) + " MB";
        } else if (fileSizeInKB >= 1) {
            sizeToShow = fileSizeInKB.toFixed(2) + " KB";
        } else {
            sizeToShow = fileSizeInBytes + " bytes";
        }

        // File size display karein
        $(placeholer_id).html(sizeToShow);
        // fileInput.value = '';
    }

	$('#p-holder,#p-holder2,#p-holder3,#p-holder4,#p-holder5,#p-holder6,#p-holder7,#p-holder8,#p-holder9,#p-holder10,#p-holder11,#p-holder12,#p-holder13,#p-holder14,#p-holder15').select2({
		placeholder: "Select"
	});
		


</script>