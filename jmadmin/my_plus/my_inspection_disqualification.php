<?php
	$self_timestamp = $_POST['self_timestamp'];
	$date = $_POST['data_sent'];
	
	require('../conn.php');
	$sql = "update 材料自检   set 处理情况 ='$date',工程单状态='不合格' where 时间戳='$self_timestamp'";
	$result = $conn->query($sql);
	
	if($result){
		$return['result'] = "处理成功！";
	}else{
		$return['result'] = "处理失败！";
	}
	
	$json = json_encode($return);
	echo $json;
	
	$conn->close();
?>