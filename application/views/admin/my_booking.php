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
                <th>Journey Date</th>
                <th>Booking Date</th>
                
               <!-- <th>Place Image</th>-->
               
                

    
              </tr>
            </thead>
        <?php if(!empty($result)){ $i=1;
           foreach($result as $row){ ?>
            <tbody>
            
            <tr>
               <td><?=$i++?></td>
               <td><?=$row['place_name']?></td>
               <td><?=$row['place_cost']?></td>
               <td><?=$row['date']?></td>
                <td><?=$row['b_date']?></td>
               
            <!--  <td><img src="<?=base_url()?>Photo/<?=$row['place_img']?>" height="100" width="200" ></td>-->
                
               
            </tr>

                   
            </tbody>
            <?php  } }?>
         </table>

        
            </div>


            
           
        </div>
        
    </div>
</div>
</div>
