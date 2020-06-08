<style type="text/css">
body{   
	margin:0 ;
    overflow:hidden;
	padding-left: 5px;
}
.players{
	font-weight: bold;
	font-size: 10px;
	font-family:Tahoma;
	color:green;
}
</style>

<?php
header("Refresh:5");
include("inc/config.php");

?>

    <div class="players">  <?php echo PlayersOnline(); ?></div>

<?php
	function PlayersOnline() {
		Global $S_Host, $DB_Username,$DB_Password,$DB_Database; 
		$Con = mysqli_connect($S_Host, $DB_Username, $DB_Password,$DB_Database ) or die(mysqli_error($Con));
		mysqli_select_db($Con,$DB_Database);
		$query = "SELECT COUNT(*) as total FROM `char` WHERE online = '1'";
		$result = mysqli_query($Con,$query);
		mysqli_close($Con);
		$arrey = mysqli_fetch_array($result);
		$P_online = $arrey["total"];
		return $P_online;
	}
?>

