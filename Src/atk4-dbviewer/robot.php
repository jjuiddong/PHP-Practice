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

        $this->addField('name');
        $this->addField('date', ['type'=>'date']);
    }    
}

$db = atk4\data\Persistence::connect(
    'mysql:dbname=acs;host=localhost', 'root', '1111');
$m  = new Robot($db, 'robot');
$crud = $app->add(['CRUD', 'paginator'=>false]);
$crud->setModel($m);
