<?php
	$flag = $_POST['flag'];
	
	if($flag == "保存信息"){
		$id = $_POST['id'];
		$songyrq = $_POST['songyrq'];
		$shouyrq = $_POST['shouyrq'];
		$songydw = $_POST['songydw'];
		$jzdw = $_POST['jzdw'];
		$shouydw = $_POST['shouydw'];
		$syr = $_POST['syr'];
		$jzr = $_POST['jzr'];
		$jcbgbh = $_POST['jcbgbh'];
		require('../conn.php');
		$sql = "update  材料自检   set  送样日期='$songyrq',收样日期='$shouyrq',送样单位='$songydw',见证单位='$jzdw',收样单位='$shouydw',送样人='$syr',见证人='$jzr',检测报告编号='$jcbgbh',工程单状态='确定自测' where id='$id' ";
		$result = $conn->query($sql);
		if($result){
			$return['result']='保存成功！';
		}else{
			$return['result']='保存失败！';
		}
		$json = json_encode($return);
		echo $json;
		$conn->close();
	}
?>