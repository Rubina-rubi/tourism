<?php
	$ses_digime = $this->session->userdata('ses_digime');
	$logged_user_type = $ses_digime['sut_type_key'];
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View all Groups</h1>
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
			              echo '<div class="alert alert-success" role="alert">Group information successfully updated.</div>';
			            }
			            if ($message=='added') {
			              echo '<div class="alert alert-success" role="alert">New Group successfully added.</div>';
			            }
			        ?>
					<table data-toggle="table" data-url="tables/data1.json"  data-search="true" data-pagination="true" data-sort-name="business-name">
					    <thead>
						    <tr>
						        <th data-field="business-name" data-sortable="true">Business Name</th>
						        <th data-field="group-name"  data-sortable="true">Group Name</th>
						        <th data-field="group-status"  data-sortable="true">Status</th>
						        <th data-field="action"  data-sortable="false">Action</th>
						    </tr>
					    </thead>
				    	<?php
				    		if($groups){
				    			echo '<tbody>';
				    			foreach ($groups as $val) {
				    				echo '<tr>
								        <td>'.$val['bi_name'].'</td>
								        <td>'.$val['gi_name'].'</td>
								        <td>'.(($val['gi_status']) ? 'Active' : 'Inactive').'</td>';
								    echo '<td><a href="'.site_url('groups/add-edit/'.$val['gi_id']).'"><i class="fa fa-edit"></i></a></td>';								        
								    echo '</tr>';
				    			}
				    			echo '</tbody>';
				    		}// If row more then 1 | END IF
				    	?>
					</table>
				</div>
			</div>
		</div><!--/.row-->