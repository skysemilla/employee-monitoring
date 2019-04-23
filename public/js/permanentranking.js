
$(document).ready(function(){
	//get sem id
	$("#findBtn").click(function(){
		var sem = $("#semID").val();
		var year = $("#year").val();
		/*var type = $("#type").val();*/
		/*alert(year);*/
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        type: 'GET',
	        url: '/headofoffice/permanent-employees/ranking/' + sem+"/"+ year,
	        data: sem,
	        success: function() {
	           
	          window.location="/headofoffice/permanent-employees/ranking/" + sem+"/"+ year
	        },
	        error: function() {
	            console.log("error");
	        }
    });
		
	});

});

