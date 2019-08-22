<?php
class Clientes{

    function __construct(){}

    function getClientes(){
        $curl = curl_init("http://localhost:8888/clientes");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    function getCliente($idcliente){
        $curl = curl_init("http://localhost:8888/clientes/".$idcliente);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        $res = curl_exec($curl);
        curl_close($curl);
    }

    function insCliente($campos){
        $payload = json_encode($campos);
 
        // Prepare new cURL resource
        $ch = curl_init('http://localhost:8888/clientes');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
         
        // Set HTTP Header for POST request 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );
         
        $result = curl_exec($ch);
        curl_close($ch);
    }

    function updCliente($idCliente,$campos){
      
        $url = 'http://localhost:8888/clientes/'.$idCliente;
        $data_json = json_encode($campos);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);
    }

    function delCliente($idCliente){
        $ch = curl_init('http://localhost:8888/clientes/'.$idCliente);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
?>