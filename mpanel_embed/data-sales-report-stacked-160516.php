	<?php
		header("Content-Type:application/json");
		$col1 = array('id'=>'','label'=>'Month','pattern'=>'','type'=>'string');
		$col2 = array('id'=>'','label'=>'Hardware 1','pattern'=>'','type'=>'number');
		$col3 = array('id'=>'','label'=>'Hardware 2','pattern'=>'','type'=>'number');
		$col4 = array('id'=>'','label'=>'Hardware 3','pattern'=>'','type'=>'number');
		$col5 = array('id'=>'','label'=>'Hardware 4','pattern'=>'','type'=>'number');
		$col6 = array('id'=>'','label'=>'Total Sales','pattern'=>'','type'=>'string','role'=>'tooltip');
		$cols = array($col1,$col2,$col3,$col4,$col5,$col6);
		$rows = array();
	?>
	{exp:channel:entries channel="reports_sales" category="{segment_3}" limit="200" dynamic="off" orderby="entry_id" sort="asc"  status="Open|Closed|Diterima|Terbalas|Pending" site="indoteknikcom"}
	     <?php 
	     	$entry_id = '{entry_id}';
	     	$row[$entry_id]["c"][] = array("v" =>  '{periode_bulan}', 					"f" =>  '{periode_bulan}' );
	     ?>
		{sales_departement}
			<?php
		        $total_sales 		   = (int) + '{sales_departement:total_sales}';
				$row[$entry_id]["c"][] = array("v" =>  $total_sales, 					"f" =>  number_format($total_sales) );
			?>
		{/sales_departement}		
		<?php
			$row[$entry_id]["c"][] = array("v" =>  'test', 					"f" =>  'test' );
			$rows[] 				   = $row[$entry_id]; 
		?>
	{/exp:channel:entries}
	<?php 
		// echo "<pre>",print_r($rows),"</pre>";
		$data = array('cols' => $cols, 'rows' => $rows);
		echo json_encode($data);
	?>