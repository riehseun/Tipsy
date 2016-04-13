<?php
// Crawing Products
/*
$fp = fopen('/var/www/html/liakada/lcbo/product.json', 'w');
fwrite($fp, '{"results":[');
$link1 = file_get_contents('http://lcboapi.com/products?page=1&access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
$info1 = json_decode($link1, true);
$pages1 = $info1["pager"]["total_pages"];
$total1 = $info1["pager"]["total_record_count"];
$product = array();
$save1 = 0;
for ($j=1;$j<=$pages1;$j++) {
	$link1= file_get_contents('http://lcboapi.com/products?page='.$j.'&access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
	$products = json_decode($link1, true);
	for ($i=0; $i<sizeof($products["result"]); $i++) {
		$product[$i] = array(
			"alcohol_content" => $products["result"][$i]["alcohol_content"],
			"bonus_reward_miles" => $products["result"][$i]["bonus_reward_miles"],
			"bonus_reward_miles_ends_on" => $products["result"][$i]["bonus_reward_miles_ends_on"],
			"description" => $products["result"][$i]["description"],
			"has_bonus_reward_miles" => $products["result"][$i]["has_bonus_reward_miles"],
			"has_limited_time_offer" => $products["result"][$i]["has_limited_time_offer"],
			"has_value_added_promotion" => $products["result"][$i]["has_value_added_promotion"],
			"id" => $products["result"][$i]["id"],
			"inventory_count" => $products["result"][$i]["inventory_count"],
			"is_dead" => $products["result"][$i]["is_dead"],
			"is_discontinued" => $products["result"][$i]["is_discontinued"],
			"is_kosher" => $products["result"][$i]["is_kosher"],
			"is_seasonal" => $products["result"][$i]["is_seasonal"],
			"is_vqa" => $products["result"][$i]["is_vqa"],
			"limited_time_offer_ends_on" => $products["result"][$i]["limited_time_offer_ends_on"],
			"limited_time_offer_savings_in_cents" => $products["result"][$i]["limited_time_offer_savings_in_cents"],
			"name" => $products["result"][$i]["name"],
			"origin" => $products["result"][$i]["orgin"],
			"package" => $products["result"][$i]["package"],
			"package_unit_type" => $products["result"][$i]["package_unit_type"],
			"package_unit_volume_in_milliliteres" => $products["result"][$i]["package_unit_volume_in_milliliteres"],
			"price_in_cents" => $products["result"][$i]["price_in_cents"],
			"primary_category" => $products["result"][$i]["primary_category"],
			"producer_name" => $products["result"][$i]["producer_name"],
			"product_no" => $products["result"][$i]["product_no"],
			"regular_price_in_cents" => $products["result"][$i]["regular_price_in_cents"],
			"secondary_category" => $products["result"][$i]["secondary_category"],
			"serving_suggestion" => $products["result"][$i]["serving_suggestion"],
			"style" => $products["result"][$i]["style"],
			"tertiary_category" => $products["result"][$i]["tertiary_category"],
			"image_thumb_url" => $products["result"][$i]["image_thumb_url"],
			"image_url" => $products["result"][$i]["image_url"],
			"stock_type" => $products["result"][$i]["stock_type"],
			"sugar_in_grams_per_liter" => $products["result"][$i]["sugar_in_grams_per_liter"],
			"tags" => $products["result"][$i]["tags"],
			"total_package_units" => $products["result"][$i]["total_package_units"],
			"updated_at" => $products["result"][$i]["tupdated_at"],
			"value_added_promotion_description" => $products["result"][$i]["value_added_promotion_description"],
			"volume_in_milliliters" => $products["result"][$i]["volume_in_milliliters"]
		);
		$save1 = $save1 + 1;
		fwrite($fp, json_encode($product[$i]));
		if ($save1 < $total1) {
			fwrite($fp, ",");
		}
	}
}
fwrite($fp, "]}");
fclose($fp);
*/

// Crawing Stores
$fp = fopen('/var/www/html/liakada/tipsy/lcbov2/store.json', 'w');
fwrite($fp, '{"data":[');
$link2 = file_get_contents('http://lcboapi.com/v2/stores?page=&access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');

echo $link2;

$info2 = json_decode($link2, true);
$pages2 = $info2["meta"]["pagination"]["total_pages"];
$total2 = $info2["meta"]["pagination"]["total_records"];
$store = array();
$save2 = 0;
for ($j=1;$j<=$pages2;$j++) {
	$link2= file_get_contents('http://lcboapi.com/v2/stores?page='.$j.'&access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
	$stores = json_decode($link2, true);
	for ($i=0; $i<sizeof($stores["data"]); $i++) {
		$store[$i] = array(
			"id" => $stores["data"][$i]["id"],
			"is_dead" => $stores["data"][$i]["is_dead"],
			"name" => $stores["data"][$i]["name"],
			"address_line_1" => $stores["data"][$i]["address_line_1"],
			"address_line_2" => $stores["data"][$i]["address_line_2"],
			"city" => $stores["data"][$i]["city"],
			"postal_code" => $stores["data"][$i]["postal_code"],
			"telephone" => $stores["data"][$i]["telephone"],
			"fax" => $stores["data"][$i]["fax"],
			"latitude" => $stores["data"][$i]["latitude"],
			"longitude" => $stores["data"][$i]["longitude"],
			"tags" => $stores["data"][$i]["tags"],
			"has_parking" => $stores["data"][$i]["has_parking"],
			"has_special_occasion_permits" => $stores["data"][$i]["has_special_occasion_permits"],
			"sunday_open" => $stores["data"][$i]["sunday_open"],
			"sunday_close" => $stores["data"][$i]["sunday_close"],
			"monday_open" => $stores["data"][$i]["monday_open"],
			"monday_close" => $stores["data"][$i]["monday_close"],
			"tuesday_open" => $stores["data"][$i]["tuesday_open"],
			"tuesday_close" => $stores["data"][$i]["tuesday_close"],
			"wednesday_open" => $stores["data"][$i]["wednesday_open"],
			"wednesday_close" => $stores["data"][$i]["wednesday_close"],
			"thursday_open" => $stores["data"][$i]["thursday_open"],
			"thursday_close" => $stores["data"][$i]["thursday_close"],
			"friday_open" => $stores["data"][$i]["friday_open"],
			"friday_close" => $stores["data"][$i]["friday_close"],
			"saturday_open" => $stores["data"][$i]["saturday_open"],
			"saturday_close" => $stores["data"][$i]["saturday_close"],
			"updated_at" => $stores["data"][$i]["updated_at"],
			"created_at" => $stores["data"][$i]["created_at"]
		);
		$save2 = $save2 + 1;
		fwrite($fp, json_encode($store[$i]));
		if ($save2 < $total2) {
			fwrite($fp, ",");
		}
	}
}
fwrite($fp, "]}");
fclose($fp);


/*
$fp = fopen('/var/www/html/liakada/lcbo/inventory.json', 'w');
fwrite($fp, '{"results":[');
// Crawing Inventories
$link3 = file_get_contents('http://lcboapi.com/inventories?access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
$info3 = json_decode($link3, true);
$pages3 = $info3["pager"]["total_pages"];
$total3 = $info3["pager"]["total_record_count"];
$inventory = array();
for ($j=1;$j<$pages3;$j++) {
	$link3= file_get_contents('http://lcboapi.com/inventories?page='.$j.'&access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
	$inventories = json_decode($link3, true);
	for ($i=0; $i<sizeof($inventories["result"]); $i++) {
		$inventory[$i] = array(
			"product_id" => $inventories["result"][$i]["product_id"],
			"store_id" => $inventories["result"][$i]["store_id"],
			"is_dead" => $inventories["result"][$i]["is_dead"],
			"quantity" => $inventories["result"][$i]["quantity"],
			"updated_on" => $inventories["result"][$i]["updated_on"],
			"updated_at" => $inventories["result"][$i]["updated_at"],
			"product_no" => $inventories["result"][$i]["product_no"],
			"store_no" => $inventories["result"][$i]["store_no"]
		);
		fwrite($fp, json_encode($inventory[$i]));
		if ($i < sizeof($inventories["result"]) - 1) {
			fwrite($fp, ",");
		}
	}
}
fwrite($fp, "]}");
fclose($fp);
*/

//$link4= file_get_contents('http://lcboapi.com/datasets?access_key=MDphZDlkY2Y2NC01MTk4LTExZTUtODRiOC0wYmI3ZDJlYjRlNjE6bTlrdE44eHZpdFlkcEhQNEhHbGhUZERTRE1iUXJTSjRhbzBB');
//echo $link4;
?>


