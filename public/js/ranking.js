
$(document).ready(function(){
	//get sem id
	$("#findBtn").click(function(){
		var sem = $("#semID").val();
		var year = $("#year").val();
		/*alert(year);*/
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        type: 'GET',
	        url: '/headofoffice/ranking/' + sem+"/"+ year,
	        data: sem,
	        success: function() {
	           
	          window.location="/headofoffice/ranking/" + sem+"/"+ year
	        },
	        error: function() {
	            console.log("error");
	        }
    });
		
	});

});

