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
                            echo '<td><button type="button" class="btn btn-primary" onclick="editarArea(\''.$arAreas[$i]->idArea.'\')">Editar</button></td>';
                            echo '<td><button type="button" class="btn btn-danger" onclick="eliminarArea(\''.$arAreas[$i]->idArea.'\')">Borrar</button></td>';
                        echo '</tr>';
                    }
            case 2: // CONSULTAR AREA
                    
            case 3: // INSERTAR AREA
                    break;
            case 4: // ACTUALIZAR AREA
                    break;
            case 5: // ELIMINAR AREA

        }
    }
    else
        header('Location:../views/page_404.html');
?>