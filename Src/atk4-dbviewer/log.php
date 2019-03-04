<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Log');
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

class Log extends \atk4\data\Model {
	public $table = 'log';
    function init() {
        parent::init();

        $this->addField('index');
        $this->addField('name');
        $this->addField('date', ['type'=>'date']);
        $this->addField('message');
        //$this->addField('name');
        //$this->addField('code');
        //$this->addField('country');        
    }
}

//session_start();
//$db = new \atk4\data\Persistence_Array($_SESSION);
//$log = new Log($db, 'Log');
//$crud = $app->add(['CRUD', 'paginator'=>false]);
//$crud->setModel($log);


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

$logQueury = "select * from log where name='Robot1'";
$logResult = mysqli_query($conn, $logQueury);

$cnt = 1;
$logData = [];
while ($data = mysqli_fetch_array($logResult))
{
	$d = [];
	$d['index'] = $data[id];
	$d['name'] = $data[name];
	$d['date'] = $data[date];
	$d['message'] = $data[message];

	$logData['log'][$cnt] = $d;
	$cnt++;
}

$p = new \atk4\data\Persistence_Array($logData);
$log = new Log($p, 'log');
$crud = $app->add(['CRUD', 'paginator'=>false]);
$crud->setModel($log);

