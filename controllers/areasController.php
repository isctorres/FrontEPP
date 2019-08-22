<?php
    require_once "../models/areasModel.php";
    if( isset($_POST['opc']) ){
        $opc = filter_var($_POST['opc'],FILTER_SANITIZE_NUMBER_INT);

        switch( $opc )
        { 
            case 1: $objA = new Areas();
                    $arAreas = json_decode($objA->getAreas());
                    for ($i=0; $i < count($arAreas) ; $i++) { 
                        echo '<tr>';
                            echo '<td>'.$arAreas[$i]->idArea.'</td>';
                            echo '<td>'.$arAreas[$i]->nomArea.'</td>';
                            echo '<td><button type="button" class="btn btn-primary" onclick="verEdicion(\''.$arAreas[$i]->idArea.'\',\''.$arAreas[$i]->nomArea.'\')">Editar</button></td>';
                            echo '<td><button type="button" class="btn btn-danger" onclick="eliminarArea(\''.$arAreas[$i]->idArea.'\')">Borrar</button></td>';
                        echo '</tr>';
                    }
                    break;
            case 2: // INSERTAR AREA
                    $arrCampos = array();
                    $arrCampos['idArea'] = 0;
                    $arrCampos['nomArea'] = $_POST['txtNomArea'];
                    $objA = new Areas();
                    $objA->insArea($arrCampos);
                    break;
            case 3: // ACTUALIZAR AREA
                    $arrCampos = array();
                    $arrCampos['nomArea'] = $_POST['txtNomArea'];
                    $objA = new Areas();
                    $objA->updArea($_POST['txtIdArea'],$arrCampos);
                    break;
            case 4: // ELIMINAR AREA
                    $objA = new Areas();
                    $objA->delArea($_POST['idArea']);
        }
    }
    else
        header('Location:../views/page_404.html');
?>