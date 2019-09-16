<?php include "db.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INVOICE</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="all" />

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png" style="height:120px;">
      </div>
        <button onClick="downClick()" class="dwn btn btn-block btn-primary">Download</button>
        <script>
            function downClick(){
                document.querySelector(".dwn").style.display = "none";
                window.print();
                window.location.href = "";
            }
        </script>
        <br>
      <h6>Date - </h6>    
      <h6>Invoice Number - </h6>    
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        
    <?php 
            if(isset($_GET['id'])){
        $the_post_id = $_GET['id'];    
    }
        $query = "SELECT * FROM user WHERE id=$the_post_id";
        $select_all_posts = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($select_all_posts))
        {
            $user_id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $address = $row['address'];
            $mail = $row['email'];
            $dob = $row['dob'];
            $plans =$row['plans'];
            $joind =$row['joind'];
            $expd =$row['expd'];
            $trainer = $row['trainer'];
            $user_paid =$row['discc'];
            $user_payment_num = $row['method'];
        }
          
        $query = "SELECT * FROM employee WHERE id=$trainer";
        $get_trainer = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($get_trainer))
        {      
            $trainer_name = $row['name'];
        }  
        if($user_payment_num == 0){
            $user_payment = "Cash";
        } else if($user_payment_num == 1){
            $user_payment = "Card";
        }else{
            $user_payment = "Cheque/UPI";
        }  
        $querys = "SELECT * FROM plan WHERE id=$plans";
        $select_all_posts = mysqli_query($conn,$querys);
        while($row = mysqli_fetch_assoc($select_all_posts))
        {
            $planC = $row['category'];
            $user_env_fees = 0;
            $user_plan_fees =$row['price'];
            $user_due = 0;
        }
        
          
        $queryy = "SELECT * FROM tax";
        $select_all_posts = mysqli_query($conn,$queryy);
        while($row = mysqli_fetch_assoc($select_all_posts))
        {
            $user_cgst =$row['cgst'];
            $user_sgst =$row['sgst'];
        }
        $user_total =$user_plan_fees;  
        $user_plan_fees = $user_plan_fees - ((($user_cgst+$user_sgst)/100)*$user_plan_fees); 
        $joind = strtotime($joind); 
        $expd = strtotime($expd)  
        ?>
        <div style="font-size: 1.2em;">Leon Maestro De Fitness</div>
        <div style="padding-top:10px;font-size: 1em;">No 36, 1st Floor<br />Arogyapa Layout</div>
        <div style="padding-top:10px;font-size: 1em;">1234567891 </div>
        <div style="padding-top:10px;font-size: 1em;">Client Representative -<?php echo $trainer_name; ?></div>
        <div style="padding-top:10px;font-size: 1em;"><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project" style="font-size: 0.2em;">
          <div style="padding-top:10px;font-size:5px;"><span>Member Details</span></div>
    
                
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">CLIENT ID</span><span style="width:120px;text-align:left"><?php echo $user_id; ?></span></div>  
          
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">CLIENT NAME</span><span style="width:120px;text-align:left"><?php echo $name; ?></span></div>  
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">ADDRESS</span><span style="width:120px;text-align:left"><?php echo $address; ?></span></div>
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">EMAIL</span><a href="mailto:john@example.com"><span style="width:120px;text-align:left"><?php echo $mail; ?></span></a></div>
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">PHONE</span><span  style="width:120px;text-align:left"><?php echo $phone; ?></span></div>
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">JOINING DATE</span><span style="width:120px;text-align:left"><?php  echo date('d', $joind)."th ".date('M', $joind)." ".date('y', $joind)  ?></span></div>
          
        <div style="padding-top:10px;"><span style="width:120px;text-align:left">EXPIRY DATE</span><span style="width:120px;text-align:left"><?php echo date('d', $expd)."th ".date('M', $expd)." ".date('y', $expd); ?></span></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc">Plan Type</th>
            <th class="desc">Plan Name</th>  
            <th>Plan Fees</th>
            <th>Environmental Fees</th>
            <th>SGST</th>
            <th>CGST</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php echo $planC;?></td>
              <td class="service"><?php echo $planC;?></td>
            <td class="desc"><center><?php echo $user_plan_fees;?></center></td>
              <td class="unit"><center><?php echo $user_env_fees;?></center></td>
              <td class="qty"><center><?php echo $user_cgst; ?></center></td>
              <td class="total"><center><?php echo $user_sgst; ?></center></td>
              <td class="total"><center><?php echo $user_total; ?></center></td>
          </tr>
          <tr>
            <td colspan="6">PAID AMOUNT</td>
            <td class="total"><center><?php echo $user_paid;?></center></td>
          </tr>
          <tr>
            <td colspan="6">DUE AMOUNT</td>
            <td class="total"><center><?php echo $user_due;?></center></td>
          </tr>
          <tr>
            <td colspan="6" class="grand total">PAYMENT MODE</td>
            <td class="grand total"><center><?php echo $user_payment;?></center></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div style="font-size:1.5em;">Terms and Conditions</div>
        <div class="notice" style=" padding-top:9px;">1. Subject to Bangalore Jurisdication.</div>
        <div class="notice"  style=" padding-top:9px;">2. Subject to terms and conditions.</div>
        <div class="notice"  style=" padding-top:9px;">3. We have no refund policy</div>
        <div class="notice"  style=" padding-top:9px;">4. Mangement reserves the right to admission.</div>
        <div class="notice" style=" padding-top:9px;">5. No disputes or argument will be entertained without showing a valid recipt.</div>
        <div class="notice" style=" padding-top:9px;">6. Cheque dishoner charges will be applicable incase of a bounce cheque.</div>
        <div class="notice" style=" padding-top:9px;">7. Payment done for product service can not be adjusted against another product package/service</div>
        <div class="notice" style=" padding-top:9px;">8. The membership is Non transferable to any other individual/agent/instituion</div>
        <div class="notice" style=" padding-top:9px;">9. In case of cheques, please iisue cheques favouring Leon Maestro De Fitness</div>
      </div>
        <br>
<!--        <button onClick="window.print()" class="">Download</button>-->
       <hr>
      <div id="company" class="clearfix">
        
    
        <div style="padding-top:10px;font-size: 1.2em;text-weight:bold;">FOR LEON MAESTRO DE FITNESS</div>
        <div style="padding-top:80px;font-size: 1.5em;">Ajay Kumar </div>
        <div style="padding-top:10px;font-size: 1.2em;">Authorized Signatory</div>

      </div>
      <div id="project" style="font-size: 0.2em;">
    
          <div style="padding-top:100px;font-size:4px;font-weight:bold;"><span>Signature of the memeber</span></div>          
      </div>    
    </main>
      <br>  
  </body>
</html>