<?php
	require("../conn.php");
//	$sjc=$_POST['sjc'];
	$gcid=$_POST['gcid'];
	$sqldate="";
	$sql = "select * from 材料送检  where id='".$gcid."' ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"时间戳":"'.$row["时间戳"].'","工程单状态":"'.$row["工程单状态"].'","取样类型":"'.$row["取样类型"].'","规格":"'.$row["规格"].'","数量":"'.$row["数量"].'","生产厂家":"'.$row["生产厂家"].'","取样人":"'.$row["取样人"].'","见证人":"'.$row["见证人"].'","取样日期":"'.$row["取样日期"].'","送样日期":"'.$row["送样日期"].'","收样日期":"'.$row["收样日期"].'","送样单位":"'.$row["送样单位"].'","见证单位":"'.$row["见证单位"].'","收样单位":"'.$row["收样单位"].'","送样人":"'.$row["送样人"].'","检测单位":"'.$row["检测单位"].'","场景照片":"'.$row["场景照片"].'","样品照片":"'.$row["样品照片"].'","收样照片":"'.$row["收样照片"].'","检测照片":"'.$row["检测照片"].'","样品编号":"'.$row["样品编号"].'","退厂记录":"'.$row["退厂记录"].'","处理照片":"'.$row["处理照片"].'","复检编号":"'.$row["复检编号"].'","使用部位":"'.$row["使用部位"].'","合格证编号":"'.$row["合格证编号"].'","进场日期":"'.$row["进场日期"].'","经销商单位":"'.$row["经销商单位"].'","备注":"'.$row["备注"].'","检测报告编号":"'.$row["检测报告编号"].'"},';
		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
?>