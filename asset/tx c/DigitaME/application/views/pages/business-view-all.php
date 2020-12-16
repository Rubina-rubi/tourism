<?php
	$ses_digime = $this->session->userdata('ses_digime');
	$logged_user_type = $ses_digime['sut_type_key'];
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View all Businesses</h1>
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
			              echo '<div class="alert alert-success" role="alert">System User information successfully updated.</div>';
			            }
			            if ($message=='added') {
			              echo '<div class="alert alert-success" role="alert">New System User successfully added.</div>';
			            }
			        ?>
					<table data-toggle="table" data-url="tables/data1.json"  data-search="true" data-pagination="true" data-sort-name="business-name">
					    <thead>
						    <tr>
						        <th data-field="business-name" data-sortable="true">Business Name</th>
						        <th data-field="customer-admin"  data-sortable="true">Customer Admin</th>
						    <?php
						    	if ($logged_user_type == 'super-admin') {
						    		echo '<th data-field="action"  data-sortable="false">Action</th>';
						    	}
						    ?>
						    </tr>
					    </thead>
				    	<?php
				    		if($businesses){
				    			echo '<tbody>';
				    			foreach ($businesses as $val) {
				    				echo '<tr>
								        <td>'.$val['bi_name'].'</td>
								        <td>'.$val['su_email'].'</td>';
								    if ($logged_user_type == 'super-admin') {
								    	echo '<td><a href="'.site_url('business/add-edit/'.$val['bi_id']).'"><i class="fa fa-edit"></i></a></td>';
								    }								        
								    echo '</tr>';
				    			}
				    			echo '</tbody>';
				    		}// If row more then 1 | END IF
				    	?>
					    </tbody>
					</table>
				</div>
			</div>
		</div><!--/.row-->