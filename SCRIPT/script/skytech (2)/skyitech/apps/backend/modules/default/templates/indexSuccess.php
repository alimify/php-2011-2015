<?php use_helper('Javascript') ?>
<table>
<tbody>
<tr>
	<td>Server Time</td>
	<td><?php echo date('d M,Y h:i:s',time()); ?></td>
</tr>
<tr>
	<td>Server IP</td>
	<td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
</tr>
<tr>
	<td>Your PC IP</td>
	<td><?php echo $_SERVER['REMOTE_ADDR']; ?></td>
</tr>
<tr>
	<td>Downloads Today</td>
	<td><?php
	$con = Propel::getConnection();
  $sql = "SELECT SUM(today) FROM files";
  $rs = $con->executeQuery($sql, ResultSet::FETCHMODE_NUM);
  $rs->next();
  echo $rs->getString(1);
	?></td>
</tr>
</tbody>
</table>