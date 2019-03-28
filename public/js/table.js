$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 $(document).ready(function () {
                $(".tbtn").click(function () {
                    $(this).parents(".custom-table").find(".toggler1").removeClass("toggler1");
                    $(this).parents("tbody").find(".toggler").addClass("toggler1");
                    $(this).parents(".custom-table").find(".fa-minus-circle").removeClass("fa-minus-circle");
                    $(this).parents("tbody").find(".fa-plus-circle").addClass("fa-minus-circle");
                });
            });
/* 
 $(document).ready(function handleSelect() {
     if (document.getElementById('type').options[document.getElementById('type').selectedIndex].value== 'admin') {
         document.getElementById('functional_unit').disabled = true;
     } else {
         document.getElementById('functional_unit').disabled = false;
     }
 });*/
/*
$(document).ready(function () {
    $("#type").change(function() {
      if ($(this).val() == "permanent"||$(this).val() == "nonpermanent") {
        document.getElementById('supervisor_id').disabled = false;
       // $('#supervisor_id').disabled=false;
        //$('#otherField').attr('required', '');
        //$('#otherField').attr('data-error', 'This field is required.');
      } else {
        document.getElementById('supervisor_id').disabled = true;
        //$('#otherFieldDiv').disabled=true;
        ///$("#supervisor_id").val(2).;
      
      }
    });
    $("#type").trigger("change");

   
});*/