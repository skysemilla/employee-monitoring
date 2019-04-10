<script>
$(document).ready(function(){
	//get sem id
	$(#"findBtn").click(function(){
		var sem = $("#semID").val();
		alert(sem);
		$.ajax({
			type: 'get',
			dataType: 'html',
			url: '{{url('/ranking')}}',
			data: 'sem_id' + sem,
			success:function(response){
				console.log(response);
				/*$("#rankingData").html(response);*/
			}
		});
	});
});
</script>