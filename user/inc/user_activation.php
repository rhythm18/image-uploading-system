<?php

$errorFlag=0;

  $sql="select joining_fee from settings where id=1";

  $join_fee=ReturnAnyValue($conn,$sql);
  $paymethod=$_POST['pay_method'];
  $paydetail=$_POST['pay_detail'];
  $pin_no=$_POST['pin_number'];
  $paydate = date("Y-m-d");
  

   if($paymethod==4)
   {
      $sql="select count(*) as cnt_pin from pins where pin_number='$pin_no' and pin_status='0'";
      $cnt_pin=ReturnAnyValue($conn,$sql);

      if($cnt_pin==1)
      {
        $sql="update pins set used_by='$id', used_date='$paydate',pin_status='1' where pin_number='$pin_no'";
        echo $sql;
        mysqli_query($conn,$sql);
      }
      else 
      {
        $errorFlag=1;
        echo "Sorry Invalid Pin !!";

      }
   }

if($errorFlag==0)
{
  $sql="insert into user_payment(user_id,pay_amt,pay_method,pay_detail,pay_date) values ('$id','$join_fee','$paymethod','$paydetail','$paydate')";

  if(mysqli_query($conn,$sql))
      {
          echo " <b>User Payment Detail Updated Successfully !!</b>";
      }
else
    {
      echo "There was some error";
      exit();
    }
  $sql="update users set pay_status='1' ,activation_date='$paydate' where user_id='$id'";
  echo $sql;
  
  if(mysqli_query($conn,$sql))
  {
      $paystatus=1;
  }


  


    if($paystatus==1)
    { 
      $genLVL=1;
      $sponsorID=$id;

      while($genLVL<=10)
      {



      $sql="select sponsor_id from users where user_id=".$sponsorID;
      $spnid=ReturnAnyValue($conn,$sql);
      echo $sql;

      if($spnid==0)
         {
             $genLVL=11;
         }
      else
        {
          $sponsorID=$spnid;
            
       
    

         $sql="select lvl_income from gen_income_setting where lvl_number=".$genLVL;
         $dir_inc=ReturnAnyValue($conn,$sql);

                                                      // insert direct income     
          $dt=date('Y-m-d');

           $sql="INSERT INTO gen_income (`user_id`, `inc_for`, `inc_lvl`, `inc_amt`, `inc_date`) VALUES ( '$spnid', '$id', '$genLVL', '$dir_inc', '$dt');"; 
           echo $sql;
              if(mysqli_query($conn,$sql))
                {
                   $genLVL=$genLVL+1;
                }
              else
              {
                echo "There was an error in generating Generation Income";
                exit();
              }
          }   
                
        }

      }

}