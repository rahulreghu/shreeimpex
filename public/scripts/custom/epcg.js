//intialize tooltip function
$(document).ready(function() {
	 $('[data-toggle=tooltip]').tooltip();
});

//show the form for selected category
$(document).ready(function(){
	$('input:radio[name="entity[category]"]').change(function(){
		var classname =  $(this).attr('class');
		var classnameprefix = classname.split("_");
		$("[id^="+classnameprefix[0]+"]").hide();
		$("[id^="+classnameprefix[0]+"] :input").attr("disabled", "disabled");
		//$('[id^="+classnameprefix[0]+"] :input').find('input, textarea, button, select').attr('disabled','disabled');
		$("#"+classname).show();
		$("#"+classname+" :input").removeAttr("disabled");
	});
});

//Prevent the form submission with enter key 
$('#iec_form').find('.input').keypress(function(e){
    if ( e.which == 13 ) // Enter key = keycode 13
    {
        return false;
    }
});

//generate the box for enterning branch details
$(document).ready(function(){
	$("#branch_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var branch = '';
			for(i=1; i<count; i++){
				branch += '<table class="table table-bordered"><tr><td rowspan="4"  width="225px">ii. Address of branches,<br /> divisions, units, <br />factories	located <br />in India and abroad:</td>';
				branch += '<td colspan="1"  width="130px">Flat/Plot/Block No:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Flat/Plot/Block No" name="branch'+i+'[address1]" id="branch'+i+'_address1"></td></tr>';
				branch += '<tr><td colspan="1">Street/Area/Locality:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Street/Area/Locality" name="branch'+i+'[address2]" id="branch'+i+'_address2"></td></tr>';
				branch += '<tr><td>State:</td><td><select name="branch'+i+'[state]" id="branch'+i+'_state" class="state_dymselectbox">'+$('#branch_state').html()+'</select></td>';
				branch += '<td>District:</td><td><select name="branch'+i+'[district]" id="branch'+i+'_district" class="district_dymselectbox"><option value="0">--Select--</option></select></td></tr>';
				branch += '<tr><td>City:</td><td><select name="branch'+i+'[city]" id="branch'+i+'_city" class="city_dymselectbox"><option value="0">--Select--</option></select></td>';
				branch += '<td>Pincode:</td><td><input class="input-block-level" type="text" placeholder="Pincode" name="branch'+i+'[pincode]" id="branch'+i+'_pincode"></td></tr></table>';
			}
			$('#branch_details').empty();
			$('#branch_details').append(branch);
		}else{
			$('#branch_details').empty();
		}
	});
});

//generate the box for enterning partner details
$(document).ready(function(){
	$("#partner_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var partner = '';
			for(i=1; i<count; i++){
				partner += '<table class="table table-bordered" >'
				partner += '<tr><td colspan="2">a. Name as in PAN: </td><td colspan="3"><input class="input-block-level" type="text" placeholder="Name as in PAN" name="partner'+i+'[name]" id="partner'+i+'_name"></td></tr>';
				partner += '<tr><td colspan="2">b. Father\'s Name:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Father\'s name" name="partner'+i+'[surname]" id="partner'+i+'_surname"></td></tr>';
				partner += '<tr><td colspan="2">c. Date of Birth (DD/MM/YYYY):</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Date of birth" name="partner'+i+'[dob]" id="partner'+i+'_dob"></td></tr>';
				partner += '<tr><td rowspan="4" width="225px">d. Residential Address:</td><td colspan="1"  width="130px">Flat/Plot/Block No:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Flat/Plot/Block No" name="partner'+i+'[address1]" id="partner'+i+'_address1"></td></tr>';
				partner += '<tr><td colspan="1">Street/Area/Locality:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Street/Area/Locality" name="partner'+i+'[address2]" id="partner'+i+'_address2"></td></tr>';
				partner += '<tr><td>State:</td><td><select name="partner'+i+'[state]" id="partner'+i+'_state" class="state_dymselectbox">'+$('#partner_state').html()+'</select></td>';
				partner += '<td>District:</td><td><select name="partner'+i+'[district]" id="partner'+i+'_district" class="district_dymselectbox"><option value="0">--Select--</option></select></td></tr>';
				partner += '<tr><td>City:</td><td><select name="partner'+i+'[city]" id="partner'+i+'_city" class="city_dymselectbox"><option value="0">--Select--</option></select></td>';
				partner += '<td>Pincode:</td><td><input class="input-block-level" type="text" placeholder="Pincode" name="partner'+i+'[pincode]" id="partner'+i+'_pincode"></td></tr>';
				partner += '<tr><td colspan="2">e. Mobile No:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Mobile no" name="partner'+i+'[mobile]" id="partner'+i+'_mobile"></td></tr>';
				partner += '<tr><td colspan="2">f. PAN:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="PAN" name="partner'+i+'[pan]" id="partner'+i+'_pan"></td></tr>';
				partner += '<tr><td colspan="2">g. Aadhaar Card Number, if available:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Aadhaar card number" name="partner'+i+'[aadhaar_number]" id="partner'+i+'_aadhaarno"></td></tr></table>'
			}
			$('#partner_details').empty();
			$('#partner_details').append(partner);
		}else{
			$('#partner_details').empty();
		}
	});
});

//generate the box for enterning private partner details
$(document).ready(function(){
	$("#privateltd_partner_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var privateltd = '';
			for(i=1; i<count; i++){
				privateltd += '<table  class="table table-bordered"><tr><td width="285px;">a. Name:</td><td><input class="input-block-level" type="text" placeholder="Name of the partner/director" name="privateltd'+i+'[name]" id="privateltd'+i+'_name"></td></tr>';
				privateltd += '<tr><tr><td>b. PAN:</td><td><input class="input-block-level" type="text" placeholder="PAN" name="privateltd'+i+'[pan]" id="privateltd'+i+'_pan"></td></tr>';
				privateltd += '<tr><td>c. Director Identity Number:</td><td><input class="input-block-level" type="text" placeholder="Director identity number"  name="privateltd'+i+'[director_id_number]" id="privateltd'+i+'_director_id"></td></tr>';
				privateltd += '<tr><td >d. Aadhaar Card Number, if available:</td><td ><input class="input-block-level" type="text" placeholder="Aadhaar card number" name="privateltd0[aadhaar_number]" id="privateltd_aadhaarno"></td></tr></table>';		
			}
			$('#privateltd_details').empty();
			$('#privateltd_details').append(privateltd);
		}else{
			$('#privateltd_details').empty();
		}
	});
});

//get the district when state is selected
$('.state_selectbox').on("change",function() {
	var id = $(this).attr('id');
	var district = id.replace("state", "district");
	var city = id.replace("state", "city");
    var data = "<option value='0'>--Select--</option>";
    if($(this).val() != '--Select--'){
    	$.ajax({
            type:"GET",
            url : "/public/epcg/get-districts?id="+$(this).val(),
            dataType : "json",  
            success : function(response) {
            	$.each(response.message, function(key,value){
            		data += '<option value="'+value.id+'">'+value.name+'</option>' ;
            	});
            	$('#'+district).empty();
    			$('#'+district).append(data);
    			$('#'+city).html("<option value='0'>--Select--</option>");
            },
            error: function() {
                alert('Error occured');
            }
        });
    }else{
    	$('#'+district).empty();
    	$('#'+district).append(data);
    	$('#'+city).empty();
    	$('#'+city).append(data);
    }
    
});

//get the cities when district is selected
$('.district_selectbox').on("change",function() {
	var id = $(this).attr('id');
	var city = id.replace("district", "city")
    var data = "<option value='0'>--Select--</option>";
    if($(this).val() != '--Select--'){
    	$.ajax({
            type:"GET",
            url : "/public/epcg/get-cities?id="+$(this).val(),
            dataType : "json",  
            success : function(response) {
            	$.each(response.message, function(key,value){
            		data += '<option value="'+value.id+'">'+value.name+'</option>' ;
            	});
            	$('#'+city).empty();
    			$('#'+city).append(data);
            },
            error: function() {
                alert('Error occured');
            }
        });
    }else{
    	$('#'+city).empty();
    	$('#'+city).append(data);
    }
});

//get the district when state is selected for dynamic fields
$('#branch_details,#partner_details').on("change",".state_dymselectbox",function() {
	var id = $(this).attr('id');
	var district = id.replace("state", "district");
	var city = id.replace("state", "city");
    var data = "<option value='0'>--Select--</option>";
    if($(this).val() != '--Select--'){
    	$.ajax({
            type:"GET",
            url : "/public/epcg/get-districts?id="+$(this).val(),
            dataType : "json",  
            success : function(response) {
            	$.each(response.message, function(key,value){
            		data += '<option value="'+value.id+'">'+value.name+'</option>' ;
            	});
            	$('#'+district).empty();
    			$('#'+district).append(data);
    			$('#'+city).html("<option value='0'>--Select--</option>");
            },
            error: function() {
                alert('Error occured');
            }
        });
    }else{
    	$('#'+district).empty();
    	$('#'+district).append(data);
    	$('#'+city).empty();
    	$('#'+city).append(data);
    }
    
});

//get the cities when district is selected for dynamic fields
$('#branch_details,#partner_details').on("change",".district_dymselectbox",function() {
	var id = $(this).attr('id');
	var city = id.replace("district", "city")
    var data = "<option value='0'>--Select--</option>";
    if($(this).val() != '--Select--'){
    	$.ajax({
            type:"GET",
            url : "/public/epcg/get-cities?id="+$(this).val(),
            dataType : "json",  
            success : function(response) {
            	$.each(response.message, function(key,value){
            		data += '<option value="'+value.id+'">'+value.name+'</option>' ;
            	});
            	$('#'+city).empty();
    			$('#'+city).append(data);
            },
            error: function() {
                alert('Error occured');
            }
        });
    }else{
    	$('#'+city).empty();
    	$('#'+city).append(data);
    }
});

$('#entity_status').on("change",function() {
	var sel_val = $(this).val();
	var iec_id = sel_val.split("_");
	var sel_text = $("#entity_status option:selected").text();
	bootbox.confirm("Are you sure you want to change the status to "+sel_text+" ?",'No','Yes',function(result) {
	    if (result) {
	    	$.ajax({
	            type:"GET",
	            url : "/public/epcg/change-iec-status?id="+iec_id[1]+"&status_id="+iec_id[0],
	            dataType : "json",  
	            success : function(response) {
	            	
	            },
	            error: function() {
	                alert('Error occured');
	            }
	        });
	    } else {
	    	
	    }
	});
});


function epcgValidaion(){
	return false;
}