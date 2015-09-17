
<?php
	$sub_menu_links = get_page_links("curriculum_sub_menu_links");
	if($sub_menu_links && is_array($sub_menu_links) && count($sub_menu_links)>0){
		foreach($sub_menu_links as $ind => $smlinks){
			echo "\n";
			echo anchor($smlinks["uri"],$smlinks["text"],$smlinks["attributes"]);
			echo "\n";
		}
	}
?>