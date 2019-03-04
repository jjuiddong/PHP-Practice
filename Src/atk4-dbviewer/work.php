<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Work');
$app->initLayout('Admin');


/****************************************************************
 * You can now remove the text below and write your own Web App *
 *                                                              *
 * Thank you for trying out Agile Toolkit                       *
 ****************************************************************/

// Default installation gives warning, so update php.ini the remove this line
date_default_timezone_set('UTC');

$app->layout->leftMenu->addItem(['Front-end demo', 'icon'=>'puzzle'], ['index']);
$app->layout->leftMenu->addItem(['Robot', 'icon'=>'trophy'], ['robot']);
$app->layout->leftMenu->addItem(['Work', 'icon'=>'dashboard'], ['work']);
$app->layout->leftMenu->addItem(['Log', 'icon'=>'book'], ['log']);

class Work extends \atk4\data\Model {
	public $table = 'work';
    function init() {
        parent::init();

        $this->addField('index');
        $this->addField('workname');
        $this->addField('state');
    }
}

// db connection
$servername = "localhost";
$username = "root";
$password = "1111";
$db_name = "acs";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
	die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, $db_name);

$queury = "select * from work";
$result = mysqli_query($conn, $queury);

$cnt = 1;
$modelData = [];
while ($data = mysqli_fetch_array($result))
{
	$d = [];
	$d['index'] = $data[id];
	$d['workname'] = $data[workname];
	$d['state'] = $data[state];

	$modelData['work'][$cnt] = $d;
	$cnt++;
}

$p = new \atk4\data\Persistence_Array($modelData);
$model = new Work($p, 'work');
$crud = $app->add(['CRUD', 'paginator'=>false]);
$crud->setModel($model);
