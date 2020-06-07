<head>
  <meta charset="UTF-8">
  <title>News</title>
  <link rel="stylesheet" href="news/css/style.css">
</head>
<?php $ticim=include('news/inc/rssConfig.php'); ?>

<body>
  <div class="newsblock">
              <?php
					require_once("news/inc/rsslib.php");
					echo RSS_Display ( $ticim['RSSall'], 6 );
			  ?>
</div>
</body>