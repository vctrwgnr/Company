<?php
session_start();
// $_SESSION['userId'] = 2;
// role = 'admin' darf alles, role = 'verleiher' darf nur in Ausleihe arbeiten: CRUD
// $_SESSION['role'] = 'verleiher';
$_SESSION['role'] = 'admin';
$userRole = $_SESSION['role'];
// echo '<br>';
// print_r($_SESSION);
// echo '</pre>';

try {

    include 'config.php';
    spl_autoload_register(function ($className): void {
        if (substr($className, -10) === 'Controller') {
            include 'controllers/' . $className . '.php';
        } else {
            include 'classes/' . $className . '.php';
        }
    });

// echo '<pre>';
// print_r($_GET);
// echo '<br>';
// print_r($_POST);
// echo '</pre>';

    $action = $_REQUEST['action'] ?? 'showTable'; // Standardwert
    $id = $_REQUEST['id'] ?? null;
    $area = $_REQUEST['area'] ?? 'employee'; // Standardwert

    // nur admins dürfen direkt auf car und employee zugreifen
    $area =  ($userRole !== 'admin')? 'rental' : $area;

    
    


// verkürzt
    $postData = [];
    $postDataNames = ['firstName', 'lastName', 'gender', 'salary', 'maker', 'type', 'numberPlate',
        'area', 'id', 'action', 'employeeId', 'carId', 'startDate', 'endDate'];
    foreach ($postDataNames as $field) {
        $value = $_POST[$field] ?? null;
        if (!empty($value)) {
            $postData[$field] = $value;
        }
    }
    $getData = [];
    $getDataNames = ['id', 'area', 'action'];
    foreach ($getDataNames as $field) {
        $value = $_GET[$field] ?? null;
        if (!empty($value)) {
            $getData[$field] = $value;
        }
    }

// Erstellen des Controllernamens und Aufruf des entsprechenden Controllers
// der controller erstellt auch $view
    $possibleActions = ['showTable', 'showEdit', 'insert', 'update', 'delete'];
    if (in_array($action, $possibleActions)) {
        $controllerName = ucfirst($action) . 'Controller';
        $controller = new $controllerName($area);

        $response = $controller->invoke($getData, $postData);
        $array = $response->getArray();
        $message = $response->getMessage() ?? '';
        $newAction = $response->getAction() ?? '';


        if ($newAction === 'insert') {
            $action = 'insert';
        } elseif ($newAction === 'update') {
            $action = 'update';
        }

    }

// Variablennamen für table (z.B. $employees oder $cars) und Objekte (z.B. $e oder $c)
//echo $view;
    if ($controller->getView() === 'table') {
        $arrayName = $area . 's';
        $$arrayName = $array;
    } elseif ($controller->getView() === 'edit') {
        if ($action === 'update') {
            $objectName = substr($area, 0, 1);
            $$objectName = $array[0];
        } 

    }

    include 'views/' . $controller->getArea() . '/' . $controller->getView() . '.php';
} catch (Exception $e) {
    // Fehlermeldung in log-Datei schreiben
    file_put_contents(LOG_PATH, (new DateTime())->format('Y-m-d H:i:s')
        . ' ' . $e->getMessage() . "\n" . file_get_contents(LOG_PATH));

    // user über AUftauchen eines Fehlers informieren
    include 'views/error.php';
}

