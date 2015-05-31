<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- jdoc:include type="head" / -->

		<link href="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/css/simple.css" rel="stylesheet" media="screen"/>

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">

	<title>Starter Template for Bootstrap</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

	<?php if ($this->countModules('position-1')) : ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<jdoc:include type="modules" name="position-1" style="none" />
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
	<?php endif; ?>

	<div class="container">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</div><!-- /.container -->


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="jquery.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

