<?php
session_start();
require_once("config.php");


//code for table
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding course in table
	case "add":
		if(!empty($_POST["participant"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($con,"SELECT * FROM tblproduct WHERE id='$pid'");
	          while($productByCode=mysqli_fetch_array($result)){
			$itemArray = array($productByCode["coursename"]=>array('teachername'=>$productByCode["teachername"], 'coursename'=>$productByCode["coursename"], 'participant'=>$_POST["participant"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
			if(!empty($_SESSION["coursetable"])) {
				if(in_array($productByCode["coursename"],array_keys($_SESSION["coursetable"]))) {
					foreach($_SESSION["coursetable"] as $k => $v) {
							if($productByCode["coursename"] == $k) {
								if(empty($_SESSION["coursetable"][$k]["participant"])) {
									$_SESSION["coursetable"][$k]["participant"] = 0;
								}
								$_SESSION["coursename"][$k]["participant"] += $_POST["participant"];
							}
					}
				} else {
					$_SESSION["coursetable"] = array_merge($_SESSION["coursetable"],$itemArray);
				}
			}  else {
				$_SESSION["coursetable"] = $itemArray;
			}
		}
	}
	break;

	// code for removing course from table
	case "remove":
		if(!empty($_SESSION["coursetable"])) {
			foreach($_SESSION["coursetable"] as $k => $v) {
					if($_GET["coursename"] == $k)
						unset($_SESSION["coursetable"][$k]);				
					if(empty($_SESSION["coursetable"]))
						unset($_SESSION["coursetable"]);
			}
		}
	break;
	// code for if table is empty
	case "empty":
		unset($_SESSION["coursetable"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Course Table</TITLE>
<link href="courseIndex.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<div class="navbar">
        <ul class="nav">
            <li>Welcome , <?php echo $_SESSION['user']; ?></a></li>
        </ul>
    </div>

<br>
<!-- course Table ---->
<div id="course-table">
<div class="txt-heading">Course Table</div>

<a id="btnEmpty" href="courseIndex.php?action=empty">Empty Table</a>
<?php
if(isset($_SESSION["coursetable"])){
    $total_participant = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">teachername</th>
<th style="text-align:left;">coursename</th>
<th style="text-align:right;" width="5%">participant</th>
<th style="text-align:right;" width="10%">price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["coursetable"] as $item){
        $item_price = $item["participant"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="course-item-image" /><?php echo $item["teachername"]; ?></td>
				<td><?php echo $item["coursename"]; ?></td>
				<td style="text-align:right;"><?php echo $item["participant"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="courseIndex.php?action=remove&code=<?php echo $item["coursename"]; ?>" class="btnRemoveAction"></a></td>
				</tr>
				<?php
				$total_participant += $item["participant"];
				$total_price += ($item["price"]*$item["participant"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_participant; ?></td>
<td align="right" colspan="2">
<strong>
<?php echo "$ ".number_format($total_price, 2);

$_SESSION['totalamount'] = $total_price;


?>

</strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your table is Empty</div>

<?php 
}
?>
</div>




<div id="course-grid">
						<div class="txt-heading">Courses</div>
								<?php

								$course= mysqli_query($con,"SELECT * FROM tblproduct ORDER BY id ASC");
								if (!empty($course)) 
								{ 
									while ($row=mysqli_fetch_array($course))
												{
												
								?>
												<div class="course-item">
													<form method="post" action="productsIndex.php?action=add&pid=<?php echo $row["id"]; ?>">
													<div class="course-image"><img src="<?php echo $row["image"]; ?>"></div>
													<div class="course-tile-footer"><br><br><br>
													<div class="course-title"><?php echo $row["name"]; ?></div>
													<div class="course-desc"><?php echo $row["description"]; ?></div>
													<div class="course-price"><?php echo "$".$row["price"]; ?></div>
													<div class="table-action"><input type="text" class="course-participant" name="participant" value="1" size="2" /><input type="submit" value="Add to table" class="btnAddAction" /></div>
													</div>
													</form>
												</div>
												<?php
												}
								} 
								else
								{
									echo "No Records.";
								}
												?>
							</div>
<div class="footer">


</div>

</BODY>
</HTML>