jQuery(function($){
	$('#nav').slicknav();
	$("#product_id").change(function(){
		get_product();
	})
	$("#company_id").change(function(){
		get_company();
	})
	
	$("#vaucher_id").change(function(){
		get_vaucher();
	})
	
	$("#user_id").change(function(){
		get_user();
	})
});

function get_product(){
				
				var product_id = jQuery("#product_id").val();
				if( product_id=="")
				{
					 alert("Give Product Name");
				}
			
				// Returns successful data submission message when the entered information is stored in database.
				var dataString = 'product_id='+product_id; 
				
				// AJAX code to submit form.
				$.ajax({
				type: "POST",
				url: "view_product_a.php",
				data: dataString,
				dataType : 'html',
				cache: false,
				success: function(data) {
				//console.log(data);return;
					   $("#buy_price").val("");
					   $("#sell_price").val("");
					   $("#company_name").val("");
					   $("#company_id").val("");
					   $("#quantity").val("");
					   $("#pay_amount").val("");
					   $("#amount").val("");
					   $("#debit_amount").val("");
					   $("#expire_date").val("");
					   $("#discount").val("");
				
					if(data=="-1"){
						alert("Something went wrong!");
					}else if(data=="-2"){
						alert("No Product Found!");
					}else{
					   var new_data=data.split("-+-"); 
					   $("#buy_price").val(new_data[0]);
					   $("#sell_price").val(new_data[1]);
					   $("#company_name").val(new_data[2]);
					   $("#company_id").val(new_data[3]);
					   $("#pro_quantity").val(new_data[4]);
					   $("#expire_date").val(new_data[5]);
					   $("#discount").val(new_data[6]);
						
					}
				
					}
				});
			}
			
function get_company(){
				
				var company_id = jQuery("#company_id").val();
				if( company_id=="")
				{
					 alert("Give Company Name");
				}
			
				// Returns successful data submission message when the entered information is stored in database.
				var dataString ='company_id='+company_id;
				// AJAX code to submit form.
				$.ajax({
				type: "POST",
				url: "view_company_a.php",
				data: dataString,
				dataType : 'html',
				cache: false,
				success: function(data) {
				//console.log(data);return;
					   $("#c_amount").val("");
					if(data=="-1"){
						alert("Something went wrong!");
					}else if(data=="-2"){
						alert("No Company Found!");
					}else{
					   var new_data=data.split("-+-"); 
					   $("#c_amount").val(new_data[0]);
						
					}
				
					}
				});
			}
			
function get_user(){
				
				var user_id = jQuery("#user_id").val();
				if( user_id=="")
				{
					 alert("Give User Name");
				}
			
				// Returns successful data submission message when the entered information is stored in database.
				var dataString ='user_id='+user_id;
				// AJAX code to submit form.
				$.ajax({
				type: "POST",
				url: "view_user_a.php",
				data: dataString,
				dataType : 'html',
				cache: false,
				success: function(data) {
				//console.log(data);return;
				   $("#salary").val("");
					if(data=="-1"){
						alert("Something went wrong!");
					}else if(data=="-2"){
						alert("No User Found!");
					}else{
					   var new_data=data.split("-+-"); 
					   $("#salary").val(new_data[0]);
						
					}
				
					}
				});
			}
			
			
function get_vaucher(){
				
		
				var vaucher_id = jQuery("#vaucher_id").val();
				if( vaucher_id=="")
				{
					 alert("Give Vaucher Name");
				}
			
				// Returns successful data submission message when the entered information is stored in database.
				var dataString ='vaucher_id='+vaucher_id;
				
				// AJAX code to submit form.
				$.ajax({
				type: "POST",
				url: "view_vaucher_a.php",
				data: dataString,
				dataType : 'html',
				cache: false,
				success: function(data) {
				//console.log(data);return;
					   $("#v_amount").val("");
				
					if(data=="-1"){
						alert("Something went wrong!");
					}else if(data=="-2"){
						alert("No Vaucher Found!");
					}else{
					   var new_data=data.split("-+-"); 
					   $("#v_amount").val(new_data[0]);
						
					}
				
					}
				});
			}
			