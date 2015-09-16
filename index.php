<?php
	require 'db.php';
	require 'vendor/autoload.php';

	$app = new \Slim\Slim();

	$app->get('/hello/:name', function ($name) {
    	echo "Hello, $name";
	});

	$app->get('/categories','getCategories');
	$app->get('/dataItem','getDataItem');
	$app->get('/dataMap','getDataMap');

	function getCategories() {
		$sql = "SELECT * FROM categories";
		try {
			$db = getDB();
			$stmt = $db->query($sql);
			$categories = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			//echo '{"categories": ' . json_encode($categories) . '}';
			echo json_encode($categories);
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	function getDataItem() {
		$sql = "SELECT * FROM dataItem";
		try {
			$db = getDB();
			$stmt = $db->query($sql);
			$dataItem = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			//echo '{"categories": ' . json_encode($categories) . '}';
			echo json_encode($dataItem);
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	function getDataMap() {
		$sql = "SELECT * FROM dataMap";
		try {
			$db = getDB();
			$stmt = $db->query($sql);
			$dataMap = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			//echo '{"categories": ' . json_encode($categories) . '}';
			echo json_encode($dataMap);
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	$app->run();

?>
