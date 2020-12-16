<div class="">
    <div class="container" >
        <div class="col-lg-12">
            <form style="" action="" method="POST" class="form-group">
                    <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <input style="padding:18px;border-radius: 0px;" type="text" name="user_name" class="form-control" placeholder="Search for...">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-4 form-group"> 
                        <button style="margin-top: 10px;" class="form-control btn btn-danger square-btn-adjust" name="submit" value="submit" type="submit">Search</button>
                    </div>
            </form>
        </div>
    </div>
    <div class="container" >
     <div class="col-md-12">
        <style type="text/css">
            .table th{
                background: skyblue;
            }
        </style>
        <table class="table table-bordered" id="myTable">
            <thead>
              <tr>

                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Type</th>
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
                <td><?=$row['user_type']?></td>
                <td>  
                  

                   <?php if ($row['user_status']!='1') { ?>
                     <a data-toggle="tooltip" title="Enable" href="<?=base_url()?>Dashboard/enable_user/<?= $row['id'];?>"><i class="fa fa-check-square-o"></i></a> || 
                      
                  <?php }else{ ?>
                     <a data-toggle="tooltip" title="Disable" href="<?=base_url()?>Dashboard/disable_user/<?= $row['id'];?>"><i class="fa fa-close"></i></a> || <?php }?>
                   <a data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure to Delete it!')" href="<?=base_url()?>Dashboard/del_user/<?= $row['id'];?>"><i class="fa fa-trash-o"></i></a></td>

            </tr>

                   
            </tbody>
            <?php  } }?>
         </table>
          <!-- -->
            </div>


            
           
        </div>
        
    </div>
       
</div>
</div>

<script type="text/javascript">
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
