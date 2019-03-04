<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Robot');
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

class Robot extends \atk4\data\Model {
	public $table = 'robot';
    function init() {
        parent::init();

        $this->addField('index');
        $this->addField('name');
        $this->addField('date', ['type'=>'date']);
    }
}

//session_start();

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

$queury = "select * from robot";
$result = mysqli_query($conn, $queury);

$cnt = 1;
$modelData = [];
while ($data = mysqli_fetch_array($result))
{
	$d = [];
	$d['index'] = $data[id];
	$d['name'] = $data[name];
	$d['date'] = $data[date];

	$modelData['robot'][$cnt] = $d;
	$cnt++;
}

$p = new \atk4\data\Persistence_Array($modelData);
$model = new Robot($p, 'robot');
$crud = $app->add(['CRUD', 'paginator'=>false]);
$crud->setModel($model);

