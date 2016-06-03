	<?php
		header("Content-Type:application/json");
		$sales = array(array('tahun','bulan'));
		$col1 = array('id'=>'','label'=>'Month','pattern'=>'','type'=>'string');
		$col2 = array('id'=>'','label'=>'Total Sales','pattern'=>'','type'=>'number');
		$cols = array($col1,$col2);
		$rows = array();
		//$count = 100;
	
	?>
	
	{exp:channel:entries channel="reports_sales" limit="200" category="{segment_3}" dynamic="off" orderby="entry_id" sort="asc" status="Open|Closed|Diterima|Terbalas|Pending" site="indoteknikcom"}
		<?php 
			$total = 0;
		?>
		{sales_departement}
			<?php 
			$total = $total + '{sales_departement:total_sales}';
			?>
		{/sales_departement}		

		<?php
		// echo $total;
			// $count += 100;
			$row["c"] = array( array("v" => '{entry_id}' , "f" => '{periode_bulan} - {periode_tahun}') , array("v" => $total , "f" => number_format($total)) );
			array_push($rows, $row);
		?>
		{!-- {periode_tahun} {periode_bulan}, &nbsp;&nbsp; --}
			 
	{/exp:channel:entries}
	<?php 
		// echo "<pre>",print_r($sales),"</pre>"
		$data = array('cols' => $cols, 'rows' => $rows);
		echo json_encode($data);
	?>