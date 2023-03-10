<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);
setlocale(LC_TIME, 'es', 'spa', 'es_ES');
$all_posts = [
	[
		'id' => 1,
		'title' => 'Lorem ipsum dolor sit amet',
		'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar turpis',
		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar turpis. Nam ut arcu tellus. Morbi sit amet elit lacinia, tincidunt leo a, posuere mi. Mauris nec odio at quam lacinia consequat. Fusce mattis orci ex, eget accumsan neque vehicula et. Vivamus consectetur tempor lacus, in tincidunt massa rutrum ut. Pellentesque augue felis, iaculis eu interdum et, semper eu purus. Vestibulum a viverra justo.',
		'published_on' => '2017-02-11 10:15:00',
	],
	[
		'id' => 2,
		'title' => 'Nunc eget enim vulputate',
		'excerpt' => 'Integer placerat hendrerit pharetra. Nunc eget enim vulputate, efficitur dolor pretium',
		'content' => 'Integer placerat hendrerit pharetra. Nunc eget enim vulputate, efficitur dolor pretium, pharetra nulla. Proin mattis aliquam sem. Morbi vel mi ac magna consequat tempus vitae eget diam. Aliquam ac sapien a tortor rutrum faucibus nec nec urna. Ut et nisl magna. Vivamus elit risus, rhoncus vitae elit suscipit, porta pulvinar justo. Aliquam sodales urna eu scelerisque ultrices. Fusce et neque id risus gravida vestibulum a et urna. Curabitur aliquam accumsan leo, pharetra tempus velit condimentum et. Donec dapibus faucibus lorem a tincidunt. Donec ultricies id metus et aliquam. Vestibulum dapibus magna nec elit ultrices, ornare pretium nisi dictum.',
		'published_on' => '2018-01-11 10:15:00',
	],
];
define("PI", pi());
$post_found = false;
if (isset($_GET['view'])) {
    $post_id = $_GET['view'];
    foreach($all_posts as $post){
        if($post['id'] == $post_id){
            $all_posts = [$post];
            $post_found = true;
        }
    }
} 
?>
<!-- <h1><?php echo min(5, 1); ?></h1>
<h1><?php echo floor(7 / 3); ?></h1>
<h1><?php echo PI; ?></h1>
<h1><?php echo date('r'); ?></h1>
<h1><?php echo $myVar; ?></h1>
<h1><?php echo date('l, d \of F'); ?></h1> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Micro CMS</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav id="site-navigation" role="navigation" class="row row-center">
	<div class="column">
		<h1>
			<a href="index.php">Micro CMS</a>
		</h1>
		<ul class="main-menu column clearfix">
		</ul>
	</div>
</nav>

<div id="content" >
    <div class="posts">
        <?php foreach ($all_posts as $post): ?> 
        <article class="post">
            <header>
                <h2 class="post-title"><a href="?view=<?php echo $post['id'];?>"><?php echo $post['title'] ?></a></h2>
                <div class="post-content">
                    <?php if($post_found):?>
                        <?php echo $post['content'];?>
                    <?php else:?>
                        <?php echo $post['excerpt'];?>
                    <?php endif;?>
                </div>
                <footer>
                    <span>
                        Publicado en: <?php echo strftime('%A , %e de %b del %Y', strtotime($post['published_on'])); ?>
                        <?php echo $_SERVER['SERVER_PORT']; ?>
                    </span>
                </footer>
            </header>
        </article>
        <?php endforeach;?>
    </div>
</div>

<footer id="footer">
	<div id="inner-footer">
		Curso de Introducción a PHP en Domestika
	</div>
    <div>

    </div>
</footer>
</body>
</html>
