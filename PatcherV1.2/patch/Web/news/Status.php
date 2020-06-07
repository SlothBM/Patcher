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
header("Refresh:15");
include("inc/config.php");

$Status = ServerStatus();
?>
    <div class="status"><?php echo $Status[0]; ?></div>

<?php
    function ServerStatus() {
        Global $Srv_Host, $Srv_Login, $Srv_Char, $Srv_Map, $Str_Online, $Str_Offline;
        error_reporting(0);
        
        $Status = array();
        $MapServer = fsockopen($Srv_Host, $Srv_Map, $errno, $errstr, 1);
        if(!$MapServer){ $Status[0] = $Str_Offline;  } else { $Status[0] = $Str_Online; };
        return $Status;
    }
?>
