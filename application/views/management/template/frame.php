<?php
echo doctype(get_page_info('doctype'));
echo "\n";
?>
<html lang="en">
	<head>
		<?php
			$meta = get_page_info("meta");
			if($meta&&is_array($meta) && count($meta)>0){
				foreach($meta as $metsi => $mets){
					if(is_array($mets)){
						echo meta($mets);
					}
				}
			}
		?>
		<title><?php echo get_page_info("title");?></title>
		<?php
				
			$stylesheets = get_page_info("stylesheet");
			if(($stylesheets)&&is_array($stylesheets)&&count($stylesheets)>0){
				$si  = 0;
				foreach($stylesheets as $styleshheti => $stylesheet){
					echo ($si>0)?"\t\t":"";
					echo $this->asset->stylesheet($stylesheet,((get_page_info("media",$styleshheti))?get_page_info("media",$styleshheti):false));
					echo "\n";
					$si++;
				}
			}
		?>
		<link href="/assets/bootstrap-v3.3.5/css/bootstrap.css" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body onLoad="" onResize="" class="<?php echo (get_page_content("top_nav"))?'with-top-nav':'without-top-nav'; ?>">
		<!-- body -->
		<div class="<?php echo (get_page_content("container")?get_page_content("container"):"container-fluid"); ?>">
			<div id="page-body-content-wrapper" class="<?php echo (get_page_content("top_nav"))?((get_page_content("collapse_side_nav")&&is_active("collapse_side_nav_link"))?"with-collapse-side-nav":"without-collapse-side-nav"):"without-collapse-side-nav"; ?>  <?php echo (get_page_content("page_footer"))?"with-page-footer":"without-page-footer"; ?> <?php echo (get_page_content("page_header"))?"with-page-header":"without-page-header"; ?> <?php echo (get_page_content("page_top_menu"))?"with-page-top-menu":"without-page-top-menu"; ?>">
				<!-- page body content wrapper  -->
				<?php
					if(get_page_content("top_nav")){
							if(get_page_content("top_nav_container")){
								$this->load->view(get_page_content("top_nav_container"));
							}else{
								$this->load->view('management/template/top_nav/container');
							}
						}
				?>
				<?php
					if(get_page_content("page_header")){
						if(get_page_content("page_header_container")){
							$this->load->view(get_page_content("page_header_container"));
						}else{
							$this->load->view('management/template/page_header/container');
						}
					}
				?>
				<?php
					if(get_page_content("page_top_menu")){
						if(get_page_content("page_top_menu_container")){
							$this->load->view(get_page_content("page_top_menu_container"));
						}else{
							$this->load->view('management/template/page_top_menu/container');
						}
					}
				?>
				<div id="page-content-wrapper" class="">
					<!--  page content wrapper  -->
					<div id='page-content-container' class="" >
						<!--  page content container  -->
						<?php

							if(get_page_content("page_content")){
								if(get_page_content("page_content_container")){
									$this->load->view(get_page_content("page_content_container"));
								}else{
									$this->load->view('management/template/page_content/container');
								}
							}

						?>
					</div ><!--  page content container end -->
					
				</div><!--  page content wrapper end -->
				
				<?php
					if(get_page_content("page_footer")){
						if(get_page_content("page_footer_container")){
							$this->load->view(get_page_content("page_footer_container"));
						}else{
							$this->load->view('management/template/page_footer/container');
						}
					}
				?>
			</div><!-- page body content wrapper end -->
		</div>
		
		<?php
			$stylescripts = get_page_script("style");
			if($stylescripts && is_array($stylescripts) && count($stylescripts)>0){
				echo '<style type="text/css">';
				echo "\n\t";
				foreach($stylescripts as $cssi => $cssscript){
					echo $cssscript;
					echo "\n";
				}
				echo '</style>';
				echo "\n";
			}
		?>
		<script type="text/javascript" src="/assets/js/jquery.1.11.3.min.js"></script>
		<script type="text/javascript" src="/assets/bootstrap-v3.3.5/js/bootstrap.js"></script>

		<?php
		$jsscriptslink = get_page_info("javascript");
		if(($jsscriptslink)&&is_array($jsscriptslink)&&count($jsscriptslink)>0){
				$ji = 0;
			foreach($jsscriptslink as $jsi => $javascript){
				echo ((int)$ji>0)?"\t\t":"";
				echo $this->asset->javascript($javascript);
				echo "\n";
				$ji++;
			}
		}
		?>
		<script	 type="text/javascript">
			<?php
				$jsscriptfunctions = get_page_script("jscriptfunction");

				if(($jsscriptfunctions)&&is_array($jsscriptfunctions)&&count($jsscriptfunctions)>0){
					foreach($jsscriptfunctions as $jsfi => $javascriptf){
						echo ((int)$jsfi>0)?"\t\t":"";
						echo $javascriptf;
						echo "\n";

					}
				}
			?>
			<?php
			if(get_page_script("jalert") || get_page_script("jshowmodal") || get_page_script("jautoscript")){
			
			?>
			$(document).ready(function() {
				<?php
					
					$autoalert = get_page_script("jalert");
					if($autoalert){
						echo 'alert("'.$autoalert.'")';
						echo "\n";	
					}
					$autoshowmodal = get_page_script("jshowmodal");
					if($autoshowmodal){
						echo '$("#'.$autoshowmodal.'").modal("show");';
						echo "\n";	
					}
					$autoscripts = get_page_script("jautoscript");
					if($autoscripts && is_array($autoscripts) && count($autoscripts) > 0){
						foreach($autoscripts as $jsas => $jsascript){
							echo $jsascript;
							echo "\n";
						}
					}
				?>
			});
			<?php
			
			}
			
			?>
		</script>
	</body>
</html>
