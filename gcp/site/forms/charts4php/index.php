<?php
/**
 * Charts 4 PHP
 *
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 1.2.3
 * @license: see license.txt included in package
 */
 
// only for free build
define("VERSION","free");

if (!empty($_GET["file"]))
{
	$f = $_GET["file"];
	
	$f = str_replace(".php","",$f);
	
	// remote file inclusion attempt fix
	if (strpos($f,".")!==false)
		die("+1 for you");
		
	$f = "demos/$f.php";

	if (!file_exists($f))
		die("+1 for you");

	$code = file_get_contents($f);
	
	// removed db settings
	$code = preg_replace("/mysql_connect(.*)/i","mysql_connect('localhost','user','pass');",$code);
	
	highlight_string($code);
	echo "<br>&nbsp;";
	die;
}	

/* gets the data from a URL */
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

// check local version with current online

$current_ver = "";
$online_ver = "";
$ver_status = "";

$file = 'lib/inc/chartphp_dist.php';
$contents = file_get_contents($file);
$match = array();
preg_match('/(version)([^*]+)/', $contents, $match);
$current_ver = $match[0];

$fileonline = 'http://www.chartphp.com/demo/demos/basic/line.phps';
$contentsonline = get_data($fileonline);
$match = array();
preg_match('/(version)([^*]+)/', $contentsonline, $match);
if(!empty($match))
	$online_ver = $match[0];

$current_ver = str_replace("&nbsp;"," ",$current_ver);
$online_ver = str_replace("&nbsp;"," ",$online_ver);
$current_ver = str_replace("<br />","",$current_ver);
$online_ver = str_replace("<br />","",$online_ver);
$current_ver = trim($current_ver);
$online_ver = trim($online_ver);

if(!empty($online_ver) && $current_ver!=$online_ver)
	$ver_status = 'New Version Available!';

//RSS Updates
require_once('bootstrap/rss/rss_fetch.inc');
$rssurl = 'http://www.chartphp.com/feed/';
$rss = fetch_rss( $rssurl );
$num_items = 5;
$items = array_slice($rss->items, 0, $num_items);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Charts 4 PHP Demos | Free Charts 4 PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="http://www.chartphp.com/wp-content/uploads/favicon.png">
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
	body {
		padding-top: 60px;
		padding-bottom: 0px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	.nav
	{
		margin-bottom:10px;
	}
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	code
	{
		background: #FFF;
		border:0;
	}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Charts 4 PHP Demos</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
			<?php if ( !empty( $ver_status )) { ?>
				<a href="http://www.chartphp.com/version-update/" target="_blank" style="color:red; margin-right:10px; padding:0 5px; background-color:white; border:2px; font-size:large;"><b><?php echo $ver_status ?></b></a>
			<?php } ?>
              <a href="http://www.chartphp.com" class="navbar-link">www.chartphp.com</a>
			  <img src="http://www.chartphp.com/opentrack.png" style="width:1px; height:1px; display:none;">
            </p>
            <ul class="nav">
				<li><a target="_blank" href="http://www.chartphp.com">Home</a></li>
				<li class="active"><a href="#">Charts Demo</a></li>
				<li><a target="_blank" href="http://www.chartphp.com/demo/apps/dashboard/">Dashboard Demo</a></li>
				<li><a target="_blank" href="http://www.chartphp.com/blog/">Updates</a></li>
				<li><a target="_blank" href="http://www.chartphp.com/docs/">Docs</a></li>
				<?php if (defined("VERSION") && VERSION == "free") { ?>
					<li><a target="_blank" href="http://www.chartphp.com/pricing/">Pricing</a></li>
				<?php } ?>
				<li><a target="_blank" href="http://www.chartphp.com/contact/">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<?php 
	function dirToArray($dir) 
	{
		$result = array();
		$cdir = scandir($dir);
		foreach ($cdir as $key => $value)
		{
		  if (!in_array($value,array(".","..","temp")) && strpos($value,"_") === false && strpos($value,".bak") === false)
		  {
			 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
			 {
				$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
			 }
			 else
			 {
				$result[] = $value;
			 }
		  }
		}

		return $result;
	}
	$samples = dirToArray("demos");
	?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
			<div class="accordion" id="accordion_menu">
				<?php 
				foreach($samples as $k=>$v) 
				{
					if (is_numeric($k)) continue;
					$folder = ucwords($k);
					?>
					<div class="accordion-group">
					<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapse<?php echo $k?>">
					  <strong><?php echo $folder;?></strong>
					</a>
					</div>	
					<div id="collapse<?php echo $k?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<?php
							foreach($v as $f) 
							{
								$fname = str_replace(".php","",$f);
								$fname = str_replace("-"," ",$fname);
								
								if (is_array($fname))
									continue;
									
								$fname = ucwords($fname);
									
								echo "<a href='demos/$k/$f' onclick=\"jQuery('#code').load('index.php?file=/$k/$f'); $('#grid-demo-tabs a:first').tab('show');\" target='demo_frame'> $fname Chart </a><br/>";
							}
							?>
						</div>
					</div>	
					</div>
					<?php
				}
				?>
				<?php if ( !empty( $items )) { ?>
				<div class="accordion-group">
					<div class="accordion-heading">						
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapseupdates">
					  <strong class="text-error">Recent Updates</strong>
					</a>
					</div>	
					<div id="collapseupdates" class="accordion-body collapse">
						<div class="accordion-inner">
							<?php
							foreach ( $items as $item ) {
								$href = $item['link'];
								$title = $item['title'];
								$date = date("M j, Y", strtotime($item['pubdate'])) ;
								echo "&bull; <a href='$href'>$title ($date)</a><br>";
							}
							?>						
						</div>
					</div>								
				</div>
				<?php } ?>
			</div>	  
			
			<?php if (defined("VERSION") && VERSION == "free") { ?>
			<div class="text-info" style="padding:0 5px;">
			For Commercial Use, Visit our <strong><a target="_blank" href="http://www.chartphp.com/pricing/">Pricing Page</a></strong>.
			</div>
			<?php } ?>
			
        </div><!--/span-->
		
        <div class="span10">
          <div class="row-fluid">
            <div class="span6">
			
				<ul class="nav nav-tabs" id="grid-demo-tabs1">
					<li class="active"><a href="#demo" data-toggle="tab">Demo</a></li>
				</ul>
				
				<div class="tab-content" id="grid-demo-tabs-content1">
				  
					<div id="demo" class="tab-pane fade in active">
					<iframe style="overflow:auto" name="demo_frame" id="demo_frame" frameborder="0" width="100%" height="500" src="about:blank"></iframe>
					</div>
				  
				</div>

            </div><!--/span-->
            <div class="span6">
			
				<ul class="nav nav-tabs" id="grid-demo-tabs2">
					<li class="active"><a href="#code" data-toggle="tab">Code</a></li>
				</ul>
				
				<div class="tab-content" id="grid-demo-tabs-content2">

					<div id="code" class="tab-pane fade in active">
					</div>
				  
				</div>

            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
		
		<div class="row-fluid">
			<div class="span12" style="margin-top:20px">
			  <div class="row-fluid">
				<div class="alert alert-info">
					<a name="contact"></a>
				  <h2>Technical Support</h2>
				  <p class="text-info">For technical support query, ask at our <a href="http://www.chartphp.com/contact/">Support Center</a> </p>
				  <p>&copy; <a href="http://www.chartphp.com">www.chartphp.com</a> <?php echo date("Y");?></p>
				</div><!--/span-->
			  </div><!--/row-->
			</div><!--/span-->
		  </div><!--/row-->
		  
      </div><!--/row-->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script>
			
			$('#grid-demo-tabs a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
			})
			
			var demo = location.href.split("#")[1];
			if (!demo)
			{
				demo = 'basic/line.php';
			}

			jQuery('#demo_frame').attr('src','demos/'+demo);
			jQuery('#demo_frame').load(function() { iframeLoaded(this); } );
			
			jQuery('#code').load('index.php?file='+demo);
			
			jQuery('#code').css('height', jQuery(window).height() - 286);
			
			function iframeLoaded(iFrameID,stop) 
			{
				if(iFrameID) 
				{
			        iFrameID.height = "";
					if(iFrameID.contentDocument){
						iFrameID.height = iFrameID.contentDocument.body.offsetHeight + 35 + "px";
					} else {
						iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + 45 + "px";
					}
					
					// alert(parseInt(jQuery('#code').css('height')));
					// alert(parseInt(iFrameID.height));
					
					if (parseInt(jQuery('#code').css('height')) <= parseInt(iFrameID.height))
						{jQuery('#code').css('height',iFrameID.height);}
					else
						{jQuery('#code').css('height', jQuery(window).height() - 286);}
				}
				
				if (!stop)
					setTimeout(function(){iframeLoaded(iFrameID,1);},1000);
			}
			
			var accordion_list = $(".accordion-body");
			accordion_list.first().addClass("in");
		</script>

	</div><!--/.fluid-container-->

	</body>
</html>