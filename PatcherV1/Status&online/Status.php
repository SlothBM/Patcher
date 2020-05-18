<?php
include("inc/config.php");

$Status = ServerStatus();
/*
 * HTML Content (Edit what you wont)
 */
// Start HTML ?>

<table border="0">
  <tr>
    <td><?php echo $Str_Loginsrv; ?></td>
    <td><?php echo $Status[0]; ?></td>
  </tr>
  <tr>
    <td><?php echo $Str_Charsrv; ?></td>
    <td><?php echo $Status[1]; ?></td>
  </tr>
  <tr>
    <td><?php echo $Str_Mapsrv; ?></td>
    <td><?php echo $Status[2]; ?></td>
  </tr>
  <tr>
      <td><?php echo $Str_onlinepl; ?></td>
      <td><?php echo PlayerCount(); ?></td>
  </tr>
</table>

<?php // End HTML


/*
 * Functions (Script by EaScriptable.de.vu)
 * Non Licensed (do what you want)
 */

    /*
     * Server Status (Return Array of Login,Char,Map State)
     */
    function ServerStatus() {
        Global $Srv_Host, $Srv_Login, $Srv_Char, $Srv_Map, $Str_Online, $Str_Offline;
        // Disable Error Reporting (for this function)
        error_reporting(0);
        
        $Status = array();
        $LoginServer = fsockopen($Srv_Host, $Srv_Login, $errno, $errstr, 1);
        $CharServer = fsockopen($Srv_Host, $Srv_Char, $errno, $errstr, 1);
        $MapServer = fsockopen($Srv_Host, $Srv_Map, $errno, $errstr, 1);
        if(!$LoginServer){ $Status[0]= $Str_Offline;  } else { $Status[0] = $Str_Online; };
        if(!$CharServer){ $Status[1] = $Str_Offline;  } else { $Status[1] = $Str_Online; };
        if(!$MapServer){ $Status[2] = $Str_Offline;  } else { $Status[2] = $Str_Online; };
        return $Status;
    }
    
    /*
     * Online Player count (Return Array of Player Count as integer)
     */
    function PlayerCount() {
    Global $Srv_Host, $Srv_Username,$Srv_Password,$Srv_Database;           
    $Connection = mysql_connect($Srv_Host, $Srv_Username, $Srv_Password) or die(mysql_error());
    mysql_select_db($Srv_Database, $Connection);
    $query = "SELECT COUNT(*) as total FROM `char` WHERE online = '1'";
    $cresult = mysql_query($query, $Connection);
    mysql_close($Connection);
    $resarray = mysql_fetch_array($cresult);
    $playeronline = $resarray["total"];
    return $playeronline;
    }
?>
