<?php
spl_autoload_register('route_controller');
if(isset($_POST['trigger']) == true) { 
    $data = [
        "data1" => $_POST['data1'],
        "data2" => $_POST['data2']
    ];
    $callback = new postdataController();
    $callback->create($data);
}

if(isset($_POST['getTrigger']) == true) { 
    $callback = new postdataController();
    $callback->fetchAll();
}

if(isset($_POST['ondeleteTrigger']) == true) { 
    $callback = new postdataController();
    $callback->destroy($_POST['id']);
}

function route_controller() {
    include_once "../Controller/postController.php";
}