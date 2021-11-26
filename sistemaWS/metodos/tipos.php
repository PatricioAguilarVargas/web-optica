<?php
$server->wsdl->addComplexType(
    'Producto',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'codigo' => array('name' => 'codigo', 'type' => 'xsd:string')
        ,'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string')
        ,'vigencia' => array('name' => 'vigencia', 'type' => 'xsd:string')
        ,'valor' => array('name' => 'valor', 'type' => 'xsd:integer')
        ,'marca' => array('name' => 'marca', 'type' => 'xsd:string')
        ,'modelo' => array('name' => 'modelo', 'type' => 'xsd:string')
        ,'material' => array('name' => 'material', 'type' => 'xsd:string')
        ,'color' => array('name' => 'color', 'type' => 'xsd:string')
		,'forma' => array('name' => 'forma', 'type' => 'xsd:string')
		,'foto1' => array('name' => 'foto1', 'type' => 'xsd:string')
		,'foto2' => array('name' => 'foto2', 'type' => 'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'Productos',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Producto[]')),
    'tns:Producto'
);


$server->wsdl->addComplexType(
    'Respuesta',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Ok' => array('name' => 'Ok', 'type' => 'xsd:boolean')
        ,'Mensaje' => array('name' => 'Mensaje', 'type' => 'xsd:string')
    )
);