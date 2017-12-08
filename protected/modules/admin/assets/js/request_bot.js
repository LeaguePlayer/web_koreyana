function updateBadges(){

		  $.ajax({
		        url: '/admin/requestsBot/gotNewRecords',
		        dataType: 'json',
		        success: function(data){
		            // console.log(data);
		            if(data.result == 1){
		            	var id_type = $('#id_type').val();
		            		console.log(id_type);
		            	$.each(data.response.data, function(i, v){
		            		$(v.class).text( v.count );

		            		if( id_type == v.id_type && v.count > 0 )
		            			window.location = v.redirect;
		            	});
		            }
		        }
		    });

	}

$(document).ready(function(){
	updateBadges();
	setInterval(updateBadges,3000);
});