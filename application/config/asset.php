<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Zyght custom configuration file
|--------------------------------------------------------------------------
*/
$config['grado_relevancia_values'] = Array(
            '0' => 'Leve',
            '1' => 'Medio',
            '2' => 'Grave'
           );

$config['estado_values'] = Array(
            '0' => 'Activa',
            '1' => ' Pendiente',
            '2' => 'Controlada',
            '3' => 'Liberada'
           );

$config['location_limit'] = 5;

$config['allowed_types'] =  'jpeg|gif|jpg|png';
$config['alert_photo_maxwidth']  = 600;
$config['alert_photo_maxheight'] = 500;
$config['alert_photo_width']     = 600;
$config['alert_photo_height']    = 500;
$config['alert_photo_maxsize']    = 1024;
$config['alert_photo_maxsizedisplay']    = 1;
$config['alerta_map_height'] = "400px";
