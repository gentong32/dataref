<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?=base_url()?>/template/css/tabby.css">
<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<li><a href="http://www.jqueryscript.net/layout/Simple-Toggle-Tabs-Plugin-with-jQuery-HTML5-Tabby.html">Download This Plugin</a></li>
<li><a href="http://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
</ul>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
	<div class="container" style="margin-top:150px;">
<h1 style="text-align:center; margin:20px auto;">jQuery Tabby Basic Demo</h1>

		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">

					<nav id="tabby-1" class="tabby-tabs" data-for="example-tab-content">
						<ul>
							<li><a data-target="tab1" class="active" href="#">Tab 1</a></li>
							<li><a data-target="tab2" href="#">Tab 2</a></li>
							<li><a data-target="tab3" href="#">Tab 3</a></li>
						</ul>
					</nav>

					<div class="tabby-content" id="example-tab-content">
						<div data-tab="tab1">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit, lectus ut gravida iaculis, arcu libero vulputate nisi, non placerat quam erat at lacus. Proin finibus nisi lectus, sed vehicula mi sodales eu. Sed in interdum nisl. Vivamus tristique quam magna, eget malesuada nunc lobortis et. Nulla ornare, elit vel sagittis imperdiet, mauris eros condimentum orci, id ultrices dolor massa sed est. Mauris finibus, lectus sed placerat consectetur, odio augue tristique ex, lobortis posuere magna ipsum at felis. Morbi congue lobortis turpis, a feugiat ante interdum ut. Proin vel orci leo. Integer a aliquet tortor. Vivamus sed metus ac mauris varius feugiat. Suspendisse dictum tortor ac nisl ultrices porta.</p>
						</div>
						<div data-tab="tab2">
							<p>Donec quis mattis nulla. Nullam lobortis diam ut rhoncus pulvinar. Nulla vulputate id nisl sit amet vehicula. Aliquam urna elit, blandit quis sagittis nec, lacinia at lacus. Vivamus diam sapien, efficitur vel turpis non, ultricies commodo nibh. Sed ac turpis quis diam luctus rhoncus a eu felis. Curabitur dictum feugiat auctor. Donec ac tempus quam. Donec eu felis id eros commodo convallis. Ut at maximus nisi. Duis a ante et mauris lobortis rhoncus eget id orci. Integer condimentum vulputate mi ac interdum. Maecenas non cursus sem, rutrum efficitur neque.</p>
						</div>
						<div data-tab="tab3" data-ajaxcontent="ajaxcontent.html"><div class="loading"></div></div>
					</div>


			</div>
		</div>

		
	</div>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="<?=base_url()?>/template/js/jquery.tabby.js"></script>
	<script>
		$(document).ready(function(){
			$('#tabby-1').tabby();
		});
	</script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?= $this->endSection() ?>

<?= $this->section('scriptpeta') ?>
<script>
    var map = L.map('maps').setView({lat:<?=$datasekolah->lintang?>, lon:<?=$datasekolah->bujur?>}, 8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'}).addTo(map);
    L.marker({lat:<?=$datasekolah->lintang?>, lon:<?=$datasekolah->bujur?>}).bindPopup('<?=$datasekolah->nama?>').addTo(map);
    
</script>
<?= $this->endSection() ?>