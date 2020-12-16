<div class="">

    <div class="container" >
     <div class="col-md-12">
        <style type="text/css">
            .table th{
                background: skyblue;
            }
        </style>
        <table class="table table-bordered">
            <thead>
              <tr>

                <th>No</th>
                <th>Name</th>
                <th>Cost</th>
    
              </tr>
            </thead>
        <?php if(!empty($result)){ $i=1;
           foreach($result as $row){ ?>
            <tbody>
            
            <tr>
               <td><?=$i++?></td>
               <td><?=$row['place_name']?></td>
               <td><?=$row['place_cost']?></td>
              <!--   <td>  
                  

                   <?php if ($row['user_status']!='1') { ?>
                     <a data-toggle="tooltip" title="Enable" href="<?=base_url()?>Dashboard/enable_user/<?= $row['id'];?>"><i class="fa fa-check-square-o"></i></a> || 
                      
                  <?php }else{ ?>
                     <a data-toggle="tooltip" title="Disable" href="<?=base_url()?>Dashboard/disable_user/<?= $row['id'];?>"><i class="fa fa-close"></i></a> || <?php }?>

                   

                   <a data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure to Delete it!')" href="<?=base_url()?>Dashboard/del_user/<?= $row['id'];?>"><i class="fa fa-trash-o"></i></a></td>
 -->
            </tr>

                   
            </tbody>
            <?php  } ?>
         </table>
            </div>


            
           
        </div>
        
    </div>
</div>
</div>