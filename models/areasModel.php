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

    function insArea(){
        
    }

    function updArea(){

    }

    function delArea(){

    }

}
?>