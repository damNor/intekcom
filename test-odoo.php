 
{exp:channel:entries channel="products" category="{segment_3}" dynamic="no" limit="500" orderby="entry_id"  status="open|closed|Online Exclusive|Stok Kosong|Ready In Store|Konfirmasi untuk stok|Diskontinue" sort="desc" disable="member_data|trackback|pagination" site="indoteknik_com" } 
	{exp:channel_images:images entry_id="{entry_id}" limit="1"}
	<img src="{image:url:small}" /> <br/>
	<?php $url = '{image:url:small}';$encoded = ( file_get_contents($url) !== false ? base64_encode(file_get_contents($url)) : '') ; echo $encoded;?><br />
{/exp:channel_images:images} 
{/exp:channel:entries} 
{!-- --}