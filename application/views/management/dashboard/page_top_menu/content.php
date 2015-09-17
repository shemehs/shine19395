
<?php
	$breadcrumbs = get_breadcrumbs();
	if($breadcrumbs && is_array($breadcrumbs) && count($breadcrumbs)>0){
		echo '<ol class=" breadcrumb">';
		for($bc = (count($breadcrumbs)-1);$bc >= 0; $bc--){
			$is_active = (isset($breadcrumbs[$bc]["name"]) && is_active($breadcrumbs[$bc]["name"]))?true:false;
			if($is_active){
				echo '<li class="active">';
					echo (isset($breadcrumbs[$bc]["text"])?$breadcrumbs[$bc]["text"]:"");
				echo '</li>';
			}else{
				echo '<li class="">';
					echo '<a class="" href="'.((isset($breadcrumbs[$bc]["uri"])?site_url($breadcrumbs[$bc]["uri"]):"")).'">';
						echo (isset($breadcrumbs[$bc]["text"])?$breadcrumbs[$bc]["text"]:"");
					echo '</a>';
				echo '</li>';
			}
		}
		echo '</ol>';
	}
?>

