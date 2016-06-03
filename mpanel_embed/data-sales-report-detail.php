	<?php
		header("Content-Type:application/json");
		$sales = array(array('tahun','bulan'));
		$col1 = array('id'=>'','label'=>'Category','type'=>'string');
		$col2 = array('id'=>'','label'=>'Total Sales','type'=>'number');
		$cols = array($col1,$col2);
		$rows = array();
		//$count = 100;
	
	?>
	{exp:channel:entries channel="reports_sales" entry_id="{segment_3}" limit="1" status="Open|Closed|Diterima|Terbalas|Pending" site="indoteknikcom"}
		{sales_departement}
			<?php
				// $row["c"] = array( 
				// 			array("v" => '{entry_id}' , "f" => '{periode_bulan} - {periode_tahun}') , 
				// 			array("v" => $total ,       "f" => number_format($total) ) );
		        $total_sales = (int) +'{sales_departement:total_sales}';

				$row["c"] = array( 
							array("v" => '{sales_departement:department}'  ,"f" => '{sales_departement:department}' ) , 
							array("v" =>  $total_sales, 					"f" =>  number_format($total_sales)) );
				array_push($rows, $row);
			?>
		{/sales_departement}		

	{/exp:channel:entries}
	<?php 
		// echo "<pre>",print_r($sales),"</pre>"
		$data = array('cols' => $cols, 'rows' => $rows);
		echo json_encode($data);
	?>