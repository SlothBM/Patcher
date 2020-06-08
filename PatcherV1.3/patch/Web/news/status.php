<style type="text/css">

body{   
	margin:0 ;
    overflow:hidden;
	padding-left: 5px;
}

.status{
	font-weight: bold;
	font-size: 10px;
	font-family:Tahoma;
}

</style>

<?php

	header("Refresh:5");
	include("inc/config.php");

$Status = MapStatus();

?>
    <div class="status"><?php echo $Status[0]; ?></div>

<?php
    function MapStatus() {
        Global $S_Host, $S_Login, $S_Char, $S_Map, $S_Online, $S_Offline;
        error_reporting(0);
        $Status = array();
        $MapServer = fsockopen($S_Host, $S_Map, $errno, $errstr, 1);
        if(!$MapServer){ $Status[0] = $S_Offline;  } else { $Status[0] = $S_Online; };
        return $Status;
    }
?>
