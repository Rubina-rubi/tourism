 <style type="text/css">
.pagination > li > a, .pagination > li > span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #428bca;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
a {
    color: black !important;
}
a {
    color: #428bca;
    text-decoration: none;
}
a {
    background: transparent;
        background-color: transparent;
}
.uk-link, a {
    color: #1d8acb;
    text-decoration: none;
    cursor: pointer;
}
a {
    background:#fff;
}
.uk-link, a {
    color: #07d;
    text-decoration: none;
    cursor: pointer;
}
a {
    background: 0 0;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
</style>
<div class="breadcrumbs">
    <div class="container" >
        <div class="col-lg-12">
            <form style="" action="" method="POST" class="form-group">
                    <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <input style="padding:18px;border-radius: 0px;" type="text" name="place_name" class="form-control" placeholder="Search for...">
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
        <table class="table table-bordered">
            <thead>
              <tr>

                <th>Place Name</th>
                <th>Cost</th>
                <th>Details</th>
              <!--  <th>Image</th>-->
                <th>Actions</th>
    
              </tr>
            </thead>
        <?php if(!empty($result)){ 
           foreach($result as $row){ ?>
            <tbody>
            
            <tr>
               <td><?=$row['place_name']?></td>
                <td><?=$row['place_cost']?></td>
                <td><?=$row['place_details']?></td>
               <!-- <td><img src="<?=base_url()?>Photo/<?=$row['place_img']?>" height="100" width="200" ></td>-->
                <td> <a   data-toggle="tooltip" title="Edit" href="<?=base_url()?>Dashboard/edit_place/<?= $row['p_id'];?>"><i class="fa fa-pencil"></i></a> || 
                   <a  data-toggle="tooltip" title="Delete" onclick="return confirm('Are You Sure to Delete it!')" href="<?=base_url()?>Dashboard/del_place/<?= $row['p_id'];?>"><i class="fa fa-trash-o"></i></a></td>

            </tr>

                   
            </tbody>
            <?php  } ?>
         </table>
            <?php
            echo  $this->pagination->create_links(); }else{
         ?>
        
              
            </div>


            
           
        </div>
        
    </div>
       <div class="alert alert-danger">No Data Found</div>
                <?php } ?>
</div>
</div>