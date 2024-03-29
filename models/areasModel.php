<?php
class Areas{

    function __construct(){}

    function getAreas(){
        $curl = curl_init("http://localhost:8888/areas");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    function getArea($idarea){
        $curl = curl_init("http://localhost:8888/areas/".$idarea);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        $res = curl_exec($curl);
        curl_close($curl);
    }

    function insArea($campos){
        $payload = json_encode($campos);
 
        // Prepare new cURL resource
        $ch = curl_init('http://localhost:8888/areas');
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

    function updArea($idArea,$campos){
      
        $url = 'http://localhost:8888/areas/'.$idArea;
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

    function delArea($idArea){
        $ch = curl_init('http://localhost:8888/areas/'.$idArea);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
?>