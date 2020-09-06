<style type="text/css">
body{   
	margin:0 ;
    overflow:hidden;
	padding-left: 5px;
	background: transparent url(http://127.0.0.1/patcher/status.jpg) no-repeat;
	background-attachment: fixed;
	border: 0; 
	outline: 0;
}
.status{
	font-weight: bold;
	font-size: 13px;
	font-family:Tahoma;
	text-align: center;
	padding-top: 7px;
	letter-spacing: 1px;
	color: #646464;
}
</style>

<?php
header("Refresh:15");
include("inc/config.php");

$Status = ServerStatus();
?>
    <div class="status"><?php echo $Status[0]; ?></div>

<?php

    function ServerStatus() {
        Global $S_Host, $S_Login, $S_Char, $S_Map, $S_Online, $S_Offline;
        error_reporting(0);
        $Status = array();
        $MapServer = fsockopen($S_Host, $S_Map, $errno, $errstr, 1);
        if(!$MapServer){ $Status[0] = $S_Offline;  } else { $Status[0] = $S_Online; };
        return $Status;
    }
	
?>
