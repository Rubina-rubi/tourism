	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View all Masking</h1>
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
			              echo '<div class="alert alert-success" role="alert">Masking information successfully updated.</div>';
			            }
			            if ($message=='added') {
			              echo '<div class="alert alert-success" role="alert">New Masking successfully added.</div>';
			            }
			        ?>
					<table data-toggle="table" data-url="tables/data1.json"  data-search="true" data-pagination="true" data-sort-name="name">
					    <thead>
						    <tr>
						        <th data-field="miid" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Masking Name</th>
						        <th data-field="mask" data-sortable="true">Mask</th>
						        <th data-field="action" data-sortable="false">Action</th>
						    </tr>
					    </thead>
				    	<?php
				    		if($maskings){
				    			echo '<tbody>';
				    			foreach ($maskings as $val) {
				    				echo '<tr>
								        <td>'.$val['mi_id'].'</td>
								        <td>'.$val['mi_name'].'</td>
								        <td>'.$val['mi_mask'].'</td>
								        <td><a href="'.site_url('masking/add-edit/'.$val['mi_id']).'"><i class="fa fa-edit"></i></a></td>
								      </tr>';
				    			}
				    			echo '</tbody>';
				    		}// If row more then 1 | END IF
				    	?>
					    </tbody>
					</table>
				</div>
			</div>
		</div><!--/.row-->