<?php
session_start();

include_once './connect.php';

$datos = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$data_start = str_replace('/', '-', $datos['fecha_reunion']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));



$query_event = "UPDATE events SET nombre=:nombre, apellido=:apellido, empresa=:empresa, telefono=:telefono, motivo_reunion=:motivo_reunion, apuntes=:apuntes, fecha_reunion=:fecha_reunion WHERE id=:id";

$update_event = $conn->prepare($query_event);
$update_event->bindParam(':id', $datos['id']);
$update_event->bindParam(':nombre', $datos['nombre']);
$update_event->bindParam(':apellido', $datos['apellido']);
$update_event->bindParam(':empresa', $datos['empresa']);
$update_event->bindParam(':telefono', $datos['telefono']);
$update_event->bindParam(':motivo_reunion', $datos['motivo_reunion']);
$update_event->bindParam(':apuntes', $datos['apuntes']);
$update_event->bindParam(':fecha_reunion', $data_start_conv);


if ($update_event->execute()) {
    $resultado = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento ha sido editado con exito!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento ha sido editado con exito!</div>';
} else {
    $resultado = ['sit' => false, 'msgerror' => '<div class="alert alert-danger" role="alert">Erro: No fue posible editar el evento, verifique la fecha y hora.</div>'];
    $_SESSION['msgerror'] = '<div class="alert alert-success" role="alert">No fue posible editar el evento, verifique la fecha y hora.</div>';
}

header('Content-Type: application/json');
echo json_encode($resultado);