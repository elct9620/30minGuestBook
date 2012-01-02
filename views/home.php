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
			<div>
				<form method="post" action="/new">
					<div class="clearfix">
						<label>Nickname</label>
						<div class="input"><input name="nickname" type="text" /></div>
					</div>
					<div class="clearfix">
						<label for="textarea">Content</label>
						<div class="input">
							<textarea name="content" class="xxlarge"></textarea>
						</div>
					</div>
					<div class="actions">
						<button class="btn primary" type="submit">Add Comment</button>
					</div>
				</form>
			</div>
			<?php foreach($comments as $c){ ?>
				<blockquote>
					<?php echo $c->content; ?>
					<small><?php echo $c->nickname; ?>, <?php echo date('Y-m-d H:i:s', $c->timestamp); ?></small>
				</blockquote>
			<?php } ?>
		</div>

		<footer>
		 <p>&copy; Copyright by Aotoki</p>
		</footer>
	</div>
</body>
</html>
