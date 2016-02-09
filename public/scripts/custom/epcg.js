//intialize tooltip function
$(function(){
	 $('[data-toggle=tooltip]').tooltip();
});

//show the form for selected category
$(function(){
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
$(function(){
	$("#branch_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var branch = '';
			for(i=1; i<count; i++){
				branch += '<table class="table table-bordered"><tr><td rowspan="4"  width="225px">ii. Address of branches,<br /> divisions, units, <br />factories	located <br />in India and abroad:</td>';
				branch += '<td colspan="1"  width="130px">Flat/Plot/Block No:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Flat/Plot/Block No" name="branch['+i+'][address1]" id="branch'+i+'_address1"></td></tr>';
				branch += '<tr><td colspan="1">Street/Area/Locality:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Street/Area/Locality" name="branch['+i+'][address2]" id="branch'+i+'_address2"></td></tr>';
				branch += '<tr><td>State:<span class="required">*</span></td><td><select name="branch['+i+'][state]" id="branch'+i+'_state" class="state_dymselectbox">'+$('#branch0_state').html()+'</select></td>';
				branch += '<td>District:<span class="required">*</span></td><td><select name="branch['+i+'][district]" id="branch'+i+'_district" class="district_dymselectbox"><option value="0">--Select--</option></select></td></tr>';
				branch += '<tr><td>City:<span class="required">*</span></td><td><select name="branch['+i+'][city]" id="branch'+i+'_city" class="city_dymselectbox"><option value="0">--Select--</option></select></td>';
				branch += '<td>Pincode:<span class="required">*</span></td><td><input class="input-block-level" type="text" placeholder="Pincode" name="branch['+i+'][pincode]" id="branch'+i+'_pincode"></td></tr></table>';
			}
			$('#branch_details').empty();
			$('#branch_details').append(branch);
		}else{
			$('#branch_details').empty();
		}
	});
});

//generate the box for enterning partner details
$(function(){
	$("#partner_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var partner = '';
			for(i=1; i<count; i++){
				partner += '<table class="table table-bordered" >'
				partner += '<tr><td colspan="2">a. Name as in PAN:<span class="required">*</span> </td><td colspan="3"><input class="input-block-level" type="text" placeholder="Name as in PAN" name="entity_partnership[partners]['+i+'][name]" id="partner'+i+'_name"></td></tr>';
				partner += '<tr><td colspan="2">b. Father\'s Name:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Father\'s name" name="entity_partnership[partners]['+i+'][surname]" id="partner'+i+'_surname"></td></tr>';
				partner += '<tr><td colspan="2">c. Date of Birth (DD/MM/YYYY):<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Date of birth" name="entity_partnership[partners]['+i+'][dob]" id="partner'+i+'_dob"></td></tr>';
				partner += '<tr><td rowspan="4" width="225px">d. Residential Address:</td><td colspan="1"  width="130px">Flat/Plot/Block No:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Flat/Plot/Block No" name="entity_partnership[partners]['+i+'][address1]" id="partner'+i+'_address1"></td></tr>';
				partner += '<tr><td colspan="1">Street/Area/Locality:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Street/Area/Locality" name="entity_partnership[partners]['+i+'][address2]" id="partner'+i+'_address2"></td></tr>';
				partner += '<tr><td>State:<span class="required">*</span></td><td><select name="entity_partnership[partners]['+i+'][state]" id="partner'+i+'_state" class="state_dymselectbox">'+$('#partner0_state').html()+'</select></td>';
				partner += '<td>District:<span class="required">*</span></td><td><select name="entity_partnership[partners]['+i+'][district]" id="partner'+i+'_district" class="district_dymselectbox"><option value="0">--Select--</option></select></td></tr>';
				partner += '<tr><td>City:<span class="required">*</span></td><td><select name="entity_partnership[partners]['+i+'][city]" id="partner'+i+'_city" class="city_dymselectbox"><option value="0">--Select--</option></select></td>';
				partner += '<td>Pincode:<span class="required">*</span></td><td><input class="input-block-level" type="text" placeholder="Pincode" name="entity_partnership[partners]['+i+'][pincode]" id="partner'+i+'_pincode"></td></tr>';
				partner += '<tr><td colspan="2">e. Mobile No:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="Mobile no" name="entity_partnership[partners]['+i+'][mobile]" id="partner'+i+'_mobile"></td></tr>';
				partner += '<tr><td colspan="2">f. PAN:<span class="required">*</span></td><td colspan="3"><input class="input-block-level" type="text" placeholder="PAN" name="entity_partnership[partners]['+i+'][pan]" id="partner'+i+'_pan"></td></tr>';
				partner += '<tr><td colspan="2">g. Aadhaar Card Number, if available:</td><td colspan="3"><input class="input-block-level" type="text" placeholder="Aadhaar card number" name="entity_partnership[partners]['+i+'][aadhaar_number]" id="partner'+i+'_aadhaarno"></td></tr></table>'
			}
			$('#partner_details').empty();
			$('#partner_details').append(partner);
		}else{
			$('#partner_details').empty();
		}
	});
});

//generate the box for enterning private partner details
$(function(){
	$("#privateltd_partner_total").on( "focusout", function() {
		var count = this.value;  //#branch_details;
		if(count > 1){
			var privateltd = '';
			for(i=1; i<count; i++){
				privateltd += '<table  class="table table-bordered"><tr><td width="285px;">a. Name:<span class="required">*</span></td><td><input class="input-block-level" type="text" placeholder="Name of the partner/director" name="entity_privateltd[partners]['+i+'][name]" id="privateltd'+i+'_name"></td></tr>';
				privateltd += '<tr><tr><td>b. PAN:<span class="required">*</span></td><td><input class="input-block-level" type="text" placeholder="PAN" name="entity_privateltd[partners]['+i+'][pan]" id="privateltd'+i+'_pan"></td></tr>';
				privateltd += '<tr><td>c. Director Identity Number:<span class="required">*</span></td><td><input class="input-block-level" type="text" placeholder="Director identity number"  name="entity_privateltd[partners]['+i+'][director_id_number]" id="privateltd'+i+'_director_id"></td></tr>';
				privateltd += '<tr><td >d. Aadhaar Card Number, if available:</td><td ><input class="input-block-level" type="text" placeholder="Aadhaar card number" name="entity_privateltd[partners]['+i+'][aadhaar_number]" id="privateltd'+i+'_aadhaarno"></td></tr></table>';		
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

$('select[name="entity_status"]').on("change",function() {
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

//submit button validation
function epcgValidaion(){
	var response = true;
	var error = "";
	var category_classname = "";
	var errorPartA = "";
	var errorPartB = "";
	var errorPartC1_C5 = "";
	var phoneRegex = /[0-9 -()+]+$/;
	var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	if($("#entity_name").val() == ""){
		errorPartA += "Entity name cannot be empty"+'<br/>';
		response = false;
	}
	if($("#entity_address1").val() == "" || $("#entity_address2").val() == ""){
		errorPartA += "Address fields cannot be empty"+'<br/>';
		response = false;
	}
	if($("#entity_state").val() == "0" || $("#entity_district").val() == "0" || $("#entity_city").val() == "0"){
		errorPartA += "State/District/City not selected"+'<br/>';
		response = false;
	}
	if($("#entity_telephone").val() != "" ){
		if(($("#entity_telephone").val().length < 6) || (!phoneRegex.test($("#entity_telephone").val()))){
			errorPartA += "Please enter valid landline number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_pincode").val() == ""){
		errorPartA += "Pincode cannot be empty"+'<br/>';
		response = false;
	}
	if($("#entity_mobile1").val() == ""){
		errorPartA += "Mobile number cannot be empty"+'<br/>';
		response = false;
	}else{
		if(($("#entity_mobile1").val().length < 6) || (!phoneRegex.test($("#entity_mobile1").val()))){
			errorPartA += "Please enter valid primary mobile number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_mobile2").val() != "" ){
		if(($("#entity_mobile2").val().length < 6) || (!phoneRegex.test($("#entity_mobile2").val()))){
			errorPartA += "Please enter valid other mobile number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_email1").val() == ""){
		errorPartA += "Email address cannot be empty"+'<br/>';
		response = false;
	}else{
		if(!emailRegex.test($("#entity_email1").val()))
		{
			errorPartA += "Please enter valid primary email address"+'<br/>';
			response = false;
		}
	}
	if($("#entity_email2").val() != "" ){
		if(!emailRegex.test($("#entity_email2").val())){
			errorPartA += "Please enter valid alternate email address"+'<br/>';
			response = false;
		}
	}
	if($("#entity_fax").val() != "" ){
		if(!phoneRegex.test($("#entity_fax").val())){
			errorPartA += "Please enter valid FAX number"+'<br/>';
			response = false;
		}
	}
	if (!$('input[name="entity[category]"]:checked').val()) {
		errorPartA += "Please select the nature of concern/entity"+'<br/>';
		response = false;
	}else{
		category_classname =  $('input:radio[name="entity[category]"]:checked').attr('class');
	}
	if (!$('input[name="entity[activities][]"]:checked').val() && $("#entity_other_activities").val() == "") {
		errorPartA += "Please mention an activity"+'<br/>';
		response = false;
	}
	if($("#bank_account_name").val() == "" || $("#bank_account_number").val() == "" || $("#bank_name").val() == "" || $("#bank_address").val() == "" || $("#bank_ifsc").val() == ""){
		errorPartA += "Bank account details cannot be empty"+'<br/>';
		response = false;
	}
	if($("#branch_total").val() == ""){
		errorPartB += "Please enter total branches"+'<br/>';
		response = false;
	}else if($("#branch_total").val() != null && $.isNumeric($("#branch_total").val())){
		var count = $("#branch_total").val();
		var branch_address=branch_state=branch_pincode = '';
		for(i=0; i<count; i++){
			if($("#branch"+i+"_address1").val() == "" || $("#branch"+i+"_address2").val() == ""){
				branch_address = "Address fields cannot be empty"+'<br/>';
				response = false;
			}
			if($("#branch"+i+"_state").val() == 0 || $("#branch"+i+"_district").val() == 0 || $("#branch"+i+"_city").val() == 0){
				branch_state = "State/District/City not selected"+'<br/>';
				response = false;
			}
			if($("#branch"+i+"_pincode").val() == ""){
				branch_pincode = "Pincode cannot be empty"+'<br/>';
				response = false;
			}
		}
		errorPartB += branch_address+branch_state+branch_pincode;
	}else{
		errorPartB += "Please enter valid number for total branches"+'<br/>';
		response = false;
	}
	
	if(category_classname){
		errorPartC1_C5 = validateCategories(category_classname);
		if(errorPartC1_C5){
			response = false;
		}
	}
	if(response){
		$('#error_message').hide();
		if($('input[name="entity[proof_of_accept]"]:checked').val() != "on"){
			bootbox.alert("Please tick the box as acceptance of declaraion/undertaking.");
			return false;
		}else{
			return true;
		}
	}else{
		var show_target = $("#error_message").offset().top;
		bootbox.alert("Form validaion failed, kindly check the error message before proceeding.",function() {
			$("html, body").animate({ scrollTop: 100 }, "slow");
		});
		//$("html, body").animate({ scrollTop: show_target }, "slow");
		if(errorPartA){
			error += "<b>Part A:</b><br/>"+errorPartA+"<br/>";
		}
		if(errorPartB){
			error += "<b>Part B:</b><br/>"+errorPartB+"<br/>";
		}
		if(errorPartC1_C5){
			error += errorPartC1_C5;
		}
		//$("#error_message").attr('class', 'alert alert-error');
		$('#error_message').show();
		$("#error_message").html(error);
		return false;
	}
}

function validateCategories(category_classname){
	var errorCategory = "";
	var errorResponse = false;
	var phoneRegex = /[0-9 -()+]+$/;
	if(category_classname == "firm_proprietorship"){
		if($("#prop_name").val() == ""){
			errorCategory += "Proprietor name cannot be empty"+'<br/>';
		}
		if($("#prop_address1").val() == "" || $("#prop_address2").val() == ""){
			errorCategory += "Address fields cannot be empty"+'<br/>';
		}
		if($("#prop_state").val() == "0" || $("#prop_district").val() == "0" || $("#prop_city").val() == "0"){
			errorCategory += "State/District/City not selected"+'<br/>';
		}
		if($("#prop_pincode").val() == ""){
			errorCategory += "Pincode cannot be empty"+'<br/>';
		}
		if(errorCategory){
			errorResponse = "<b>Part C1:</b><br/>"+errorCategory+"<br/>";
		}
	}
	if(category_classname == "firm_partnership"){
		if($("#partner_pan_name_entity").val() == "" || $("#partner_incorporation_date").val() == "" || $("#partner_pan_entity").val() == ""){
			errorCategory += "PAN details of the entity cannot be empty for partnership firm"+'<br/>';
		}	
		if($("#partner_total").val() == ""){
			errorCategory += "Please enter total partners"+'<br/>';
		}else if($("#partner_total").val() != null && $.isNumeric($("#partner_total").val())){
			var count = $("#partner_total").val();
			var partner_name = partner_surname = partner_dob = partner_address = partner_state = partner_pincode = partner_mobile = partner_pan = "";
			for(i=0; i<count; i++){
				if($("#partner"+i+"_name").val() == ""){
					partner_name = "Name cannot be empty"+'<br/>';
				}
				if($("#partner"+i+"_surname").val() == ""){
					partner_surname = "Father's name cannot be empty"+'<br/>';
				}
				if($("#partner"+i+"_dob").val() == ""){
					partner_dob = "Date of birth cannot be empty"+'<br/>';
				}else{
					var data = $("#partner"+i+"_dob").val().split("/");
				    if (isNaN(Date.parse(data[2] + "-" + data[1] + "-" + data[0]))) {
				    	partner_dob = "Please enter valid Date of birth"+'<br/>';
				    }
				}
				if($("#partner"+i+"_address1").val() == "" || $("#partner"+i+"_address2").val() == ""){
					partner_address = "Address fields cannot be empty"+'<br/>';
				}
				if($("#partner"+i+"_state").val() == 0 || $("#partner"+i+"_district").val() == 0 || $("#partner"+i+"_city").val() == 0){
					partner_state = "State/District/City not selected"+'<br/>';
				}
				if($("#partner"+i+"_pincode").val() == ""){
					partner_pincode = "Pincode cannot be empty"+'<br/>';
				}
				if($("#partner"+i+"_mobile").val() == ""){
					partner_mobile = "Mobile number cannot be empty"+'<br/>';
				}else{
					if(($("#partner"+i+"_mobile").val().length < 6) || (!phoneRegex.test($("#partner"+i+"_mobile").val()))){
						errorPartA += "Please enter a valid mobile number"+'<br/>';
						response = false;
					}
				}
				if($("#partner"+i+"_pan").val() == ""){
					partner_pan = "PAN cannot be empty"+'<br/>';
				}
			}
			errorCategory += partner_name+partner_surname+partner_dob+partner_address+partner_state+partner_pincode+partner_mobile+partner_pan;
		}else{
			errorCategory += "Please enter a valid number for total partners"+'<br/>';
		}
		if(errorCategory){
			errorResponse = "<b>Part C2:</b><br/>"+errorCategory+"<br/>";
		}
	}
	if(category_classname == "firm_privateltd"){
		if($("#privateltd_pan_name_entity").val() == "" || $("#privateltd_incorporation_date").val() == "" || $("#privateltd_pan_entity").val() == ""){
			errorCategory += "PAN details of the entity cannot be empty"+'<br/>';
		}	
		if($("#privateltd_partner_total").val() == ""){
			errorCategory += "Please enter total partners/directors"+'<br/>';
		}else if($("#privateltd_partner_total").val() != null && $.isNumeric($("#privateltd_partner_total").val())){
			var count = $("#privateltd_partner_total").val();
			var privateltd_partner_name = privateltd_partner_pan = privateltd_partner_director_id = "";
			for(i=0; i<count; i++){
				if($("#privateltd"+i+"_name").val() == ""){
					 privateltd_partner_name = "Name of the partner cannot be empty"+'<br/>';
				}
				if($("#privateltd"+i+"_pan").val() == ""){
					 privateltd_partner_pan = "PAN cannot be empty"+'<br/>';
				}
				if($("#privateltd"+i+"_director_id").val() == ""){
					 privateltd_partner_director_id = "Director identity number cannot be empty"+'<br/>';
				}
			}
			errorCategory += privateltd_partner_name+privateltd_partner_pan+privateltd_partner_director_id;
		}else{
			errorCategory += "Please enter a valid number for partners/directors"+'<br/>';
		}
		if(errorCategory){
			errorResponse = "<b>Part C3:</b><br/>"+errorCategory+"<br/>";
		}
	}
	if(category_classname == "firm_society"){
		if($("#society_pan_name_entity").val() == "" || $("#society_incorporation_date").val() == "" || $("#society_pan_entity").val() == ""){
			errorCategory += "PAN details of the society/trust cannot be empty"+'<br/>';
		}	
		if($("#society_name").val() == ""){
			errorCategory += "Name cannot be empty"+'<br/>';
		}
		if($("#society_address1").val() == "" || $("#society_address2").val() == ""){
			errorCategory += "Address fields cannot be empty"+'<br/>';
		}
		if($("#society_state").val() == "0" || $("#society_district").val() == "0" || $("#society_city").val() == "0"){
			errorCategory += "State/District/City not selected"+'<br/>';
		}
		if($("#society_pincode").val() == ""){
			errorCategory += "Pincode cannot be empty"+'<br/>';
		}
		if(errorCategory){
			errorResponse = "<b>Part C4:</b><br/>"+errorCategory+"<br/>";
		}
	}
	if(category_classname == "firm_huf"){
		if($("#huf_pan_name_entity").val() == "" || $("#huf_incorporation_date").val() == "" || $("#huf_pan_entity").val() == ""){
			errorCategory += "PAN details of the HUF cannot be empty"+'<br/>';
		}	
		if($("#huf_name").val() == ""){
			errorCategory += "Name cannot be empty"+'<br/>';
		}
		if($("#huf_address1").val() == "" || $("#huf_address2").val() == ""){
			errorCategory += "Address fields cannot be empty"+'<br/>';
		}
		if($("#huf_state").val() == "0" || $("#huf_district").val() == "0" || $("#huf_city").val() == "0"){
			errorCategory += "State/District/City not selected"+'<br/>';
		}
		if($("#huf_pincode").val() == ""){
			errorCategory += "Pincode cannot be empty"+'<br/>';
		}
		if(errorCategory){
			errorResponse = "<b>Part C5:</b><br/>"+errorCategory+"<br/>";
		}
	}
	
	return errorResponse;
}

//minimal vaidation
function epcgMinimalValidaion(){
	var response = true;
	var error = "";
	var category_classname = "";
	var errorPartA = "";
	var errorPartB = "";
	var errorPartC1_C5 = "";
	var phoneRegex = /[0-9 -()+]+$/;
	var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	if($("#entity_name").val() == ""){
		errorPartA += "Entity name cannot be empty"+'<br/>';
		response = false;
	}
	if($("#entity_telephone").val() != "" ){
		if(($("#entity_telephone").val().length < 6) || (!phoneRegex.test($("#entity_telephone").val()))){
			errorPartA += "Please enter valid landline number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_mobile1").val() != "" ){
		if(($("#entity_mobile1").val().length < 6) || (!phoneRegex.test($("#entity_mobile1").val()))){
			errorPartA += "Please enter valid primary mobile number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_mobile2").val() != "" ){
		if(($("#entity_mobile2").val().length < 6) || (!phoneRegex.test($("#entity_mobile2").val()))){
			errorPartA += "Please enter valid other mobile number"+'<br/>';
			response = false;
		}
	}
	if($("#entity_email1").val() != "" ){
		if(!emailRegex.test($("#entity_email1").val())){
			errorPartA += "Please enter valid primary email address"+'<br/>';
			response = false;
		}
	}
	if($("#entity_email2").val() != "" ){
		if(!emailRegex.test($("#entity_email2").val())){
			errorPartA += "Please enter valid alternate email address"+'<br/>';
			response = false;
		}
	}
	if($("#entity_fax").val() != "" ){
		if(!phoneRegex.test($("#entity_fax").val())){
			errorPartA += "Please enter valid FAX number"+'<br/>';
			response = false;
		}
	}
	if (!$('input[name="entity[category]"]:checked').val()) {
		errorPartA += "Please select the nature of concern/entity"+'<br/>';
		response = false;
	}
	if($("#branch_total").val() != '') {
		if(!$.isNumeric($("#branch_total").val())){
			errorPartB += "Please enter valid number for total branches"+'<br/>';
			response = false;
		}
		
	}
	if(response){
		$('#error_message').hide();
		/*
		bootbox.confirm("Are you sure you want only to SAVE this form?",'No','Yes',function(result) {
		    if (result) {
		    	alert('hai');
		    	return true;
		    } 
		});*/
		return true;
	}else{
		var show_target = $("#error_message").offset().top;
		bootbox.alert("Form validaion failed, kindly check the error message before proceeding.",function() {
			$("html, body").animate({ scrollTop: 100 }, "slow");
		});
		if(errorPartA){
			error += "<b>Part A:</b><br/>"+errorPartA+"<br/>";
		}
		if(errorPartB){
			error += "<b>Part B:</b><br/>"+errorPartB+"<br/>";
		}
		if(errorPartC1_C5){
			error += errorPartC1_C5;
		}
		//$("#error_message").attr('class', 'alert alert-error');
		$('#error_message').show();
		$("#error_message").html(error);
		return false;
	}
}

//code snippet for image preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#user_images')
                .attr('src', e.target.result)
                .width(140)
                .height(140);
        };
        reader.readAsDataURL(input.files[0]);
  }
}

//submit button validaion
//onsubmit="return epcgValidaion();"
$( "#submit_epcgform" ).click(function() {
	if(true === epcgValidaion()){
		$('#epcg_form').attr('action', 'epcg/addepcg');
		$("#epcg_form").submit();
	}else{
		return false;
	}
});
	
//save button validation
$("#save_epcgform").click(function() {
	if(true === epcgMinimalValidaion()){
		$('#epcg_form').attr('action', 'epcg/addepcg');
		$("#epcg_form").submit();
	}else{
		return false;
	}
});
