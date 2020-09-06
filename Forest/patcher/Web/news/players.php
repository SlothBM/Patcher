<style type="text/css">
body{   
	margin:0 ;
    overflow:hidden;
	padding-left: 5px;
	background: transparent url(http://127.0.0.1/patcher/players.jpg) no-repeat;
	background-attachment: fixed;
	border: 0; 
	outline: 0;
}
.players{
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
