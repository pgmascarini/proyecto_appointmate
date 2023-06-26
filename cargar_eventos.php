<?php

include 'connect.php';

$query_events = "SELECT id, nombre, apellido, empresa, telefono, motivo_reunion, apuntes, fecha_reunion FROM events"; //crea query
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while ($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)) {
    $id = $row_events['id'];
    $nombre = $row_events['nombre'];
    $apellido = $row_events['apellido'];
    $empresa = $row_events['empresa'];
    $telefono = $row_events['telefono'];
    $motivo_reunion = $row_events['motivo_reunion'];
    $apuntes = $row_events['apuntes'];
    $fecha_reunion = $row_events['fecha_reunion'];
    $extendedProps = (object) [
        "apellido" => $apellido,
        "empresa" => $empresa,
        "telefono" => $telefono,
        "motivo_reunion" => $motivo_reunion,
        "apuntes" => $apuntes
    ];

    // $eventos[] = [
    //     'id' => $id,
    //     'nombre' => $nombre,
    //     'apellido' => $apellido,
    //     'empresa' => $empresa,
    //     'telefono' => $telefono,
    //     'motivo_reunion' => $motivo_reunion,
    //     'apuntes' => $apuntes,
    //     'fecha_reunion' => $fecha_reunion,
    // ];
    $eventos[] = [
        'id' => $id,
        'title' => $nombre,
        'start' => $fecha_reunion,
        'extendedProps' => $extendedProps
    ];
}

echo json_encode($eventos);