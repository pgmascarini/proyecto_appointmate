<?php

session_start();

include_once './connect.php';


$datos = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$data_start = str_replace('/', '-', $datos['fecha_reunion']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));



$query_event = "INSERT INTO events (nombre, apellido, empresa, telefono, motivo_reunion, apuntes, fecha_reunion) VALUES (:nombre, :apellido, :empresa, :telefono, :motivo_reunion, :apuntes, :fecha_reunion)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':nombre', $datos['nombre']);
$insert_event->bindParam(':apellido', $datos['apellido']);
$insert_event->bindParam(':empresa', $datos['empresa']);
$insert_event->bindParam(':telefono', $datos['telefono']);
$insert_event->bindParam(':motivo_reunion', $datos['motivo_reunion']);
$insert_event->bindParam(':apuntes', $datos['apuntes']);
$insert_event->bindParam(':fecha_reunion', $data_start_conv);


if ($insert_event->execute()) {
    $resultado = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento guardado con exito!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento guardado con exito!</div>';
} else {
    $resultado = ['sit' => false, 'msgerror' => '<div class="alert alert-danger" role="alert">Erro: No fue posible guardar el evento, verifique la fecha y hora.</div>'];
    $_SESSION['msgerror'] = '<div class="alert alert-success" role="alert">No fue posible guardar el evento, verifique la fecha y hora.</div>';
}


header('Content-Type: application/json');
echo json_encode($resultado);