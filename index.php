<?php
/**
 * 30Min Guest Book
 * 
 * @author Aotoki
 * @version 1.0
 */

//載入 Slim Framework
require_once('lib/Slim/Slim.php');

//載入 Active Mongo (ORM)
require_once('lib/ActiveMongo/ActiveMongo.php');

//載入設定檔
require_once('app/config.inc.php');

//初始化 Slim Framework
$app = new Slim(
	array(
		//'http.version' => '1.0', //在PHPFog或不支援 HTTP 1.1 的伺服器上使用這個設定
		'templates.path' => 'views', //設定 View 資料夾（視圖層）
		'debug' => DEBUG, //從設定檔讀取是否啟用除錯
	)
);

//連接資料庫（MongoDB）
if(DB_USER &&　DB_PASS){
	ActiveMongo::connect(DB_NAME, DB_HOST, DB_USER, DB_PASS); //從設定檔讀取資料庫資訊
}else{
	ActiveMongo::connect(DB_NAME, DB_HOST); //因為ActiveMongo沒有動態設定使用者名稱/密碼的功能，所以另外檢查
}

//載入 Model
require_once(ABSPATH . 'models/Comment.php');

//載入 APPs

//初始化首頁
$app->get('/', function() use ($app){
	//Get Page Number
	$pageNum = intval($app->request()->get('page'));
	$pageNum || $pageNum = 1;
	
	//Make Commetn Query
	$comments = new Comment;	
	$comments->reset();
	$comments->sort('timestamp DESC');
	$comments->limit(10, ($pageNum-1)*10);
	

	$app->render('home.php', array('comments' => $comments, 'app' => $app));
});

//運行 Slim Framework
$app->run();

?>