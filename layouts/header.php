<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php theme_view("commons/meta"); ?>
</head>
<body onLoad="renderDate()">
	<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	<div class="container"style="background-color: #f6f6f6;">
		<header id="header">
			<?php theme_view("partials/header"); ?>
		</header>
		<div id="navarea">
			<?php theme_view("partials/menu_head"); ?>
		</div>
		<section>
			<div class="content_middle">
			</div>
			<div class="content_bottom">
				<div class="col-lg-12 col-md-12">
					<div class="content_left">
					<?= view('admin.layouts.components.token') ?>
