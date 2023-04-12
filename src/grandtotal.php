<?php
session_start();
include 'config.php';
if(empty($_SESSION['p_id']))
{
    header("location:error.php");
}
if(!empty($_POST['pid']) && !empty($_POST['pprice']) && !empty($_POST['pqty']) && !empty($_POST['total']) && !empty($_POST['grandTotal']) )
{
    $pid=$_POST['pid'];
$query="SELECT * FROM PRODUCTS WHERE id=$pid";
$res=$conn->query($query);
if($res->num_rows >0)
{
    while($row = $res->fetch_assoc())
    {
      $id=$row['id'];
      $name=$row['name'];
      $qty=$row['quantity'];
      $price=$row['sale_price'];
      $image=$row['image'];

    }
    if(!empty($_COOKIE['cartItem']) && is_array($_COOKIE['cartItem']))
    {
        foreach($_COOKIE['cartItem'] as $name=>$value)
        {
            $mycookie=explode("__", $value);
            $found1=0;
            if($id== $mycookie[5])
            {
                setcookie("cartItem[$name]",$image."__".$name."__".$price."__".$_POST['pqty']."__".$_POST['total']."__".$id."__".$_POST['grandTotal'],time()+1800);
            }
        }
    }
}
}
else{
    header("location:error.php"); 
}



?>