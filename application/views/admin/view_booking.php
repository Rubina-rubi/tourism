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
            <form style="" action="" method="GET" class="form-group">
                    <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <input name="name" type="text"  value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>" class="top_input form-control input-lg" placeholder="Search..."/>
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
                <th>User Name</th>
                <th>User Mobile</th>
                <th>Booking Date</th>
                <th>Journey Date</th>
                <th>Transaction Id</th>
                <th>Payment Type</th>
    
              </tr>
            </thead>
        <?php if(!empty($result)){ 
           foreach($result as $row){ ?>
            <tbody>
            
            <tr>
               <td><?=$row['place_name']?></td>
                <td><?=$row['place_cost']?></td>
                <td><?=$row['user_name']?></td>
                <td><?=$row['user_mobile']?></td>
                 <td><?=$row['b_date']?></td>
                  <td><?=$row['date']?></td>
                   <td><?=$row['bkash_id']?></td>
                  <td><?=$row['payment_type']?></td>

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