var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){

    	total_page = data.last_page;
    	current_page = data.current_page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;
    });
}

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}

/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
		

		rows = rows + '<td>'+value.first_name+'</td>';
	  	rows = rows + '<td>'+value.last_name+'</td>';
	  	rows = rows + '<td>'+value.phone+'</td>';
		rows = rows + '<td>'+value.email+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<button data-toggle="modal" data-target="#edit-user" class="btn btn-primary edit-user">Edit</button> ';
                rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                rows = rows + '</td>';
				
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-user").find("form").attr("action");
    var first_name = $("#create-user").find("input[name='first_name']").val();
    var last_name = $("#create-user").find("textarea[name='last_name']").val();
    var phone = $("#create-user").find("textarea[name='phone']").val();
    var email = $("#create-user").find("textarea[name='email']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{first_name:first_name, last_name:last_name,phone:phone,email:email}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('User Created Successfully.', 'Success Alert', {timeOut: 5000});
    });

});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: url + '/' + id,
    }).done(function(data){
        c_obj.remove();
        toastr.success('User Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
});

/* Edit Item */
$("body").on("click",".edit-user",function(){
	 
	 var id = $(this).parent("td").data('id');
    var first_name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
	var last_name = $(this).parent("td").prev("td").prev("td").prev("td").text();
	var phone = $(this).parent("td").prev("td").prev("td").text();
    var email = $(this).parent("td").prev("td").text();

    $("#edit-user").find("input[name='first_name']").val(first_name);
    $("#edit-user").find("textarea[name='last_name']").val(last_name);
    $("#edit-user").find("textarea[name='phone']").val(phone);
    $("#edit-user").find("textarea[name='email']").val(email);
	 $("#edit-user").find("form").attr("action",url + '/' + id);
});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    var form_action = $("#edit-user").find("form").attr("action");
    var first_name = $("#edit-user").find("input[name='first_name']").val();
    var last_name = $("#edit-user").find("textarea[name='last_name']").val();
    var phone = $("#edit-user").find("textarea[name='phone']").val();
    var email = $("#edit-user").find("textarea[name='email']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{first_name:first_name, last_name:last_name, phone:phone, email:email}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('User Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
});