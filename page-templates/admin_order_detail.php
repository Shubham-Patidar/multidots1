<?php

// $orders = wc_get_order();

$query = new WC_Order_Query( array(
    'limit' => 300,
    'orderby' => 'date',
    'order' => 'ASC',
    'return' => 'ids',
) );
$orders = $query->get_orders();

// echo "<pre>";
// print_r($orders);
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<form action="" style="text-align: center;" id=''>
	<h1>Change Order Status</h1>
<select name="order_id" id="order_id" style="width: 100%;"> 
	<?php foreach ($orders as $key => $value) { ?>
	<option value="<?= $value;?>"><?= $value;?></option>
<?php } ?>
</select>	

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Change Status</button>

<button type="button" class="btn btn-success btn-lg" id="edit-order-btn">Edit</button>
</form>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Change Status</h4>
        </div>
        <div class="modal-body">
<form  method="post" style="text-align: center;" id='order-status'>
    <h1>Change Order Status</h1>
    <textarea id="comments" placeholder="comments" style="width:100%;height: 75px;"></textarea>
<br>
<button type="button" class="btn btn-success btn-lg" id="change-btn">Change Status</button>
</form>          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
</div>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Edit order detail</h4>
        </div>
        <div class="modal-body">
<form  method="post" style="text-align: center;" >
    <h1>Edit Order Detail</h1>
    <label>First Name: <input type="text" id="first_name"></label>
    <label>last Name : <input type="text" id="last_name"></label>
    <label>Contry Name: <input type="text" id="country"></label>
    <label>State Name : <input type="text" id="state"></label>
    <label>City Name : <input type="text" id="city"></label><br>
    <label>passcode : <input type="number" id="passcode"></label>
<br>
<button type="button" class="btn btn-success btn-lg" id="edit-btn">Edit</button>
</form>          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
</div>



<script type="text/javascript">
    jQuery(document).ready(function(){
    var url =" <?php echo site_url().'/wp-admin/admin-ajax.php';?>";

    jQuery("#edit-order-btn").on('click',function(){
    
    var order_id = jQuery("#order_id").val();
        
        jQuery.ajax({
             url: url,
             method: 'POST',
             dataType: "json",
             data: {action:'getorderDetail',order_id:order_id},
             success: function(data) {
                        
               if(data){
                $('#first_name').val(data._billing_first_name);
                $('#last_name').val(data._billing_last_name);
                $('#city').val(data._billing_city);
                $('#state').val(data._billing_state);
                $('#passcode').val(data._billing_postcode);
                $('#country').val(data._billing_country);
                // console.log(old_data);
                $('#myModal1').modal('show');
                }
            },
        });

    });

jQuery("#edit-btn").on('click',function(){
    
                var order_id = jQuery("#order_id").val();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var city = $('#city').val();
                var state = $('#state').val();
                var passcode = $('#passcode').val();
                var country = $('#country').val();
                
           $('#myModal1').modal('hide');
        jQuery.ajax({
             url: url,
             method: 'POST',
             data: {
                action:'updateorderDetail',
                order_id:order_id,
                first_name:first_name,
                last_name:last_name,
                city:city,
                state:state,
                passcode:passcode,
                country:country,
            },
             success: function(data) {
             console.log(data);
               if(data==1){
                alert('Value update successfull');
                }

            },
        });

    });


    

// ------------ status change fun ------------
    jQuery("#change-btn").click(function(){
       $('#myModal').modal('hide');
                
        // event.preventDefault();
        var comments = jQuery("#comments").val();
        var order_id = jQuery("#order_id").val();

        jQuery.ajax({
             url: url,
             method: 'POST',
             data: {action:'changeorderstatus',order_id:order_id,comment:comments},
             success: function(data) {
             
               if(data==1){
                alert('Status Changed');
                jQuery("#comments").val('');
               }else{
                  alert('Status Not Changed');
                  jQuery("#comments").val('');
               }

            },
        });
     });
});
</script>
