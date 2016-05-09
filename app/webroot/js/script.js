function ajax_delete(id)
{
	var delid=jQuery(id).data('id');
	
	var data={'id':delid};
	jQuery.post(baseUrl+'/question/deleteoption/?id='+delid,data,function(data){
		jQuery(id).remove();
	});
}

function add_attr(id)
{
var val=jQuery(id).parent().parent().attr('id');
	var arr=val.split("0");
	if(jQuery(id).is(':checked')) {
		jQuery(id).attr('value',  arr[1]);
		jQuery(id).attr('name',  'data[Question][option]['+arr[1]+']');
	}else{
		jQuery(id).attr('name', 'data[Question][option][]');
	}
	console.log(arr[1]);
}

jQuery(function($){

	//var removeLink = '<a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
	//$('a.copy').relCopy({append: removeLink,clearInputs: true});


 /*/*$("#QuestionDescription").rules("add", {
		required:true,

	});*/



		var i=0;
		$('body').on('click','#addScnt', function() {
			var edit_value=$(this).data('count');
			var edit=0;
			if(edit_value != undefined){i=edit_value; edit=1;}
			
				i++;
			$.ajax({
				type: "POST",
				url: App.basePath+"admin/tests/add_new_row",
				data: {fetch:i,edit:edit},
				success: function(result){

					$(".add_clone").append(result);
				},
			});

		});



	$( "#TestStartDate, #fromdateOne" ).datepicker({
		defaultDate: "+1w",
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		//numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#TestEndDate, #todateOne" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#TestEndDate, #todateOne" ).datepicker({
		defaultDate: "+1w",
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		//numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#TestStartDate, #fromdateOne" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
});