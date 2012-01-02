<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>My 30min Guest Book</title>
	<meta name="description" content="" />
	<meta name="author" content="Aotoki" />

	<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css" />
	<style>
		.container{
			margin:15px auto;
		}
		
		.comment-count{
			margin-bottom: 10px;
		}
		
	</style>
</head>

<body>
	<div class="container">
		<header>
			<h1>Guest Book</h1>
		</header>
		<nav>
			<ul class="breadcrumb">
				<li><a href="<?php echo $app->request()->getRootUri(); ?>">Home</a></li>
			</ul>
		</nav>

		<div>
			<div class="row">
				<div class="span16">
					<form method="post" action="<?php echo $app->urlFor('new'); ?>">
						<fieldset>
							<legend>Leave a Comment</legend>
							<div class="clearfix">
								<label>Nickname</label>
								<div class="input"><input name="nickname" type="text" class="xlarge" /></div>
							</div>
							<div class="clearfix<?php if($errorStatus){ echo ' error'; } ?>">
								<label for="textarea">Content</label>
								<div class="input">
									<textarea name="content" class="xlarge<?php if($errorStatus){ echo ' error'; } ?>"></textarea>
									<?php if($errorStatus){ ?><span class="help-block">You must enter some content.</span> <?php } ?>
								</div>
							</div>
							<div class="actions">
								<button class="btn primary" type="submit">Add Comment</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="comment-count">
				<span class="label notice">Notice</span>
				System has <?php echo intval($totalComments); ?> comments.
			</div>
			<div>
				<?php foreach($comments as $c){ ?>
					<blockquote>
						<p><?php echo $c->content; ?></p>
						<small><?php echo $c->nickname; ?>, <?php echo date('Y-m-d H:i:s', $c->timestamp); ?></small>
					</blockquote>
				<?php } ?>
			</div>
		</div>

		<footer>
		 <p>&copy; Copyright by Aotoki</p>
		</footer>
	</div>
</body>
</html>
