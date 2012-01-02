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
				<li><a href="<?php echo $app->request()->getRootUri(); ?>">Home</a><?php echo ($page > 1) ? '<span class="divider">/</span>' : '' ?></li>
				<?php if($page > 1){ ?> 
				<li><a href="<?php echo $app->urlFor('home', array('page' => $page)); ?>">Page. <?php echo $page; ?></a></li>	
				<?php } ?>
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
			<div class="pagination">
				<ul>
					<li class="prev<?php echo ($page-1 < 1) ? ' disabled' : ''; ?>"><a href="<?php echo $app->urlFor('home', array('page' => $page-1)); ?>">&larr; Previous</a></li>
					<?php 
						$start = 1;
						$maxPage = $totalPage;
						
						if($page > 4){
							$start = $page - 4;
						}
						
						if($totalPage - $page < 5 && $totalPage > 10){
							$start = $totalPage - 9;
							$maxPage = $totalPage;
						}
						
						if($start + 10 <= $totalPage){
							$maxPage = $start + 9;
						}
						
						for($i = $start; $i <= $maxPage; ++$i){ 
					?>
					<li<?php echo ($page == $i) ? ' class="active"' : ''; ?>><a href="<?php echo $app->urlFor('home', array('page' => $i)); ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li class="next<?php echo ($page+1 > $totalPage) ? ' disabled' : ''; ?>"><a href="<?php echo $app->urlFor('home', array('page' => $page+1)); ?>">Next &rarr;</a></li>
				</ul>
			</div>
		</div>

		<footer>
		 <p>&copy; Copyright by Aotoki</p>
		</footer>
	</div>
</body>
</html>
