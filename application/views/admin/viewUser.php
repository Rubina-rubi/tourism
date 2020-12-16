


<table class="table table-bordered" id="myTable" data-toggle="table"  data-search="true" data-pagination="true" data-sort-name="user_name">
            <thead>
              <tr>

                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
    
              </tr>
            </thead>
        <?php if(!empty($result)){ $i=1;
           foreach($result as $row){ ?>
            <tbody>
            
            <tr>
               <td><?=$i++?></td>
               <td><?=$row['user_name']?></td>
               <td><?=$row['user_email']?></td>
               <td><?=$row['user_mobile']?></td>
                <td>  
                  

                   <?php if ($row['user_status']!='1') { ?>
                     <a data-toggle="tooltip" title="Enable" href="<?=base_url()?>Dashboard/enable_user/<?= $row['id'];?>"><i class="fa fa-check-square-o"></i></a> || 
                      
                  <?php }else{ ?>
                     <a data-toggle="tooltip" title="Disable" href="<?=base_url()?>Dashboard/disable_user/<?= $row['id'];?>"><i class="fa fa-close"></i></a> || <?php }?>

                   

                   <a data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure to Delete it!')" href="<?=base_url()?>Dashboard/del_user/<?= $row['id'];?>"><i class="fa fa-trash-o"></i></a></td>

            </tr>

                   
            </tbody>
            <?php  }} ?>
         </table>














<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>