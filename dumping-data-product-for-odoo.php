<?php header('Content-Description: File Transfer');header('Content-Type: application/force-download');header('Content-Disposition: attachment; filename={segment_4}.csv');?>id,active,property_account_expense_id/id,property_account_income_id/id,available_in,weight,standard_price,purchase_ok,property_cost_method,sale_ok,ean13,pricelist_id/id,list_price,lst_price,image,categ_id/id,default_code,valuation,track_outgoing,mes_type,description,property_stock_inventory/id,property_stock_procurement/id,name,company_id/id,income_pdt,expense_pdt,pos_categ_id/id,route_ids/id,uom_id/id,type,to_weight,track_incoming,waranty
{exp:channel:entries channel="products" category="{segment_3}" dynamic="no" limit="200" orderby="entry_id"  status="open|closed|Online Exclusive|Stok Kosong|Ready In Store|Konfirmasi untuk stok|Diskontinue" sort="desc" disable="member_data|trackback|pagination" site="indoteknik_com" }"",TRUE,<?php $data='{categories}{kategori-expense-odoo}{/categories}';$exploded = explode("|",$data); echo trim($exploded[0]);?>,<?php $data='{categories}{kategori-income-odoo}{/categories}';$exploded = explode("|",$data); echo trim($exploded[0]); ?>,TRUE,{if product_weight != ''}{product_weight}{if:else}1{/if},{if product_price:numeric != ""}{product_price:numeric}{if:else}0{/if},TRUE,Standard Price,TRUE,"","",{if product_price:numeric != ""}{product_price:numeric}{if:else}0{/if},{if product_price:numeric != ""}{product_price:numeric}{if:else}0{/if},{exp:channel_images:images entry_id="{entry_id}" limit="1"}<?php $url = '{image:url:medium}';$encoded = ( file_get_contents($url) !== false ? base64_encode(file_get_contents($url)) : '') ; echo $encoded;?>{/exp:channel_images:images},<?php $data = '{categories}{kategori-produk-odoo}{/categories}';$exploded=explode("|",$data); echo trim($exploded[0]); ?>,{entry_id},manual_periodic,FALSE,fixed,"",stock.location_inventory,stock.location_procurement, <?php $name = '{title}';$name = str_replace(",","",$name) ; $trimmed = trim ( $name , " \t\n\r\0\x0B" );echo $trimmed; ?>,base.main_company,TRUE,TRUE,<?php $data = '{categories}{kategori-produk-pos-odoo}{/categories}';$exploded = explode("|",$data);?>__export__.pos_category_<?php echo trim($exploded[0]); ?>,purchase.route_warehouse0_buy,product.product_uom_unit,Stockable Product,FALSE,FALSE,""<?php echo "\r\n" ?>
{/exp:channel:entries}