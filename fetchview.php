<html>
<head>
<title>Display count</title>
<body>
<table id="mytable" border="1" style="width:100%">
<th>Message no.</th>
<th>Date</th>
<th>From</th>
<th>Subject</th>
<?php
foreach ($result as $overview) {
$m_no=$overview->msgno;
?>

  	<tr> <td>
	<?php echo $overview->msgno; ?>
    </td><td>
    <?php echo $overview->date; ?>
    </td><td>
    <?php echo $overview->from; ?>
	</td><td>
	<?php echo "<a href='http://localhost/Openmail?m_no=$m_no'> {$overview->subject}</a>"; ?>
	</td></tr>
<?php
} ?>
</table>
			
<?php			
?>
</body>
</html>
