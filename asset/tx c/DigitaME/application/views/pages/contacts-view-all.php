<?php
	$ses_digime = $this->session->userdata('ses_digime');
	$logged_user_type = $ses_digime['sut_type_key'];
?>
	<style type="text/css">
	.table th{ text-align:center;}
	.table td{ font-size: 15px;}
	.table td{}

	</style>	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View all Contacts</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="full-body-content">
			        <?php
			            if ($message=='empty-field') {
			              echo '<div class="alert alert-danger"><strong>Error.</strong> Try again. </div>';
			            }
			            if ($message=='updated') {
			              echo '<div class="alert alert-success" role="alert">contact information successfully updated.</div>';
			            }
			            if ($message=='added') {
			              echo '<div class="alert alert-success" role="alert">New contact successfully added.</div>';
			            }
			        ?>
					<?php $i = 0; foreach ($contacts as $result) {   
				   
				   
				    
					
					if($i==0) {
					$temp=$result['bi_name'];
					$temp1=$result['gi_name'];
						echo ' <table class="table table-bordered" id="#myTable">
                        <thead>
                          <tr>
                            <td style="background: #0C5B98;color: white; margin-left: 5px;">Business Name: '.$result['bi_name'].' || Group Name: '.$result['gi_name'].'</td>
                         </tr>                         
                        </thead>
                      </table>

                      <table class="table table-bordered" id="#myTable">
                       <thead>
						    <tr>
						        <th data-field="serial" data-sortable="true">Serial #</th>
						        <th data-field="contact" data-sortable="true">Contact #</th>
						        <th data-field="name" data-sortable="true">Name</th>
						        <th data-field="email" data-sortable="true">Email ID</th>
						        <th data-field="group" data-sortable="true">Group</th>
						        <th data-field="operator" data-sortable="true">Operator</th>
						        <th data-field="status" data-sortable="true">Status</th>
						        <th data-field="status" data-sortable="true">Business Name</th>
						        <th data-field="action" data-sortable="false">Action</th>
						    </tr>
					    </thead>
                         <tbody>';
					
					}
					
					if($result['bi_name']==$temp && $result['gi_name']==$temp1){ }else{ $temp= $result['bi_name'] &&  $temp1= $result['gi_name'];
						echo'</tbody>
                      </table>';
				   ?>
				    	<table class="table table-bordered" id="#myTable">
                        <thead>
                          <tr>
                            <td style="background: #0C5B98; color: white; margin-left: 5px; ">Business Name: <?= $result['bi_name']?> || Group Name: <?= $result['gi_name']; ?></td>
                         </tr>

                                                     
                        </thead>
                      </table>

                      <table class="table table-bordered" id="#myTable">
                         <thead>
						    <tr>
						        <th data-field="serial" data-sortable="true">Serial #</th>
						        <th data-field="contact" data-sortable="true">Contact #</th>
						        <th data-field="name" data-sortable="true">Name</th>
						        <th data-field="email" data-sortable="true">Email ID</th>
						        <th data-field="group" data-sortable="true">Group</th>
						        <th data-field="operator" data-sortable="true">Operator</th>
						        <th data-field="status" data-sortable="true">Status</th>
						        <th data-field="status" data-sortable="true">Business Name</th>
						        <th data-field="action" data-sortable="false">Action</th>
						    </tr>
					    </thead>
                         <tbody>
					<?php } ?>    
                          <tr>
                              <!-- <td><?= $i;?></td> -->
                             
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['ci_id']; ?></td>
                              <td style=" min-width: 30px;max-width: 30px;"><?= $result['mo_code']; ?><?= $result['ci_contact_number']; ?></td>
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['ci_name']; ?></td>
                              <td style=" min-width: 110px;max-width: 110px;"><?= $result['ci_email']; ?></td>
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['gi_name']; ?></td>  
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['mo_name']; ?></td>
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['ci_status']; ?></td>
                              <td style=" min-width: 50px;max-width: 50px;"><?= $result['bi_name']; ?></td>
                              <?php echo '<td><a href="'.site_url('contacts/add-edit/'.$result['ci_id']).'"><i class="fa fa-edit"></i></a></td>';?>


                              
                          </tr>
                   
                        
					  
					   <?php $i++; } ?>

				</div>
			</div>
		</div><!--/.row-->
		<script type="text/javascript">
			
			$(document).ready( function () {
    $('#myTable').DataTable();
} );
		</script>