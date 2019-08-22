<?php
    require_once "../models/productosModel.php";
    if( isset($_POST['opc']) ){
        $opc = filter_var($_POST['opc'],FILTER_SANITIZE_NUMBER_INT);

        switch( $opc )
        { 
            case 1: $objC = new Productos();
                    $arProductos = json_decode($objC->getProductos());
                    for ($i=0; $i < count($arProductos) ; $i++) { 
                        echo '<tr>';
                            echo '<td>'.$arProductos[$i]->idProducto.'</td>';
                            echo '<td>'.$arProductos[$i]->nomProducto.'</td>';
                            echo '<td>'.$arProductos[$i]->existencia.'</td>';
                            echo '<td>'.$arProductos[$i]->reorden.'</td>';
                            echo '<td>'.$arProductos[$i]->comprometidas.'</td>';
                            echo '<td>'.$arProductos[$i]->vigente.'</td>';
                            echo '<td>'.$arProductos[$i]->imagen.'</td>';
                            echo '<td><button type="button" class="btn btn-primary" onclick="verEdicion(\''.$arProductos[$i]->idProducto.'\',\''.$arProductos[$i]->nomProducto.'\',\''.$arProductos[$i]->existencia.'\',\''.$arProductos[$i]->reorden.'\',\''.$arProductos[$i]->comprometidas.'\',\''.$arProductos[$i]->vigente.'\',\'\')">Editar</button></td>';
                            echo '<td><button type="button" class="btn btn-danger" onclick="eliminarCliente(\''.$arProductos[$i]->idProducto.'\')">Borrar</button></td>';
                        echo '</tr>';
                    }
                    break;
            case 2: // INSERTAR PRODUCTO
                    $arrCampos = array();
                    $arrCampos['idProducto']    = 0;
                    $arrCampos['nomProducto']   = $_POST['txtNomCliente'];
                    $arrCampos['existencia']    = $_POST['txtDirCliente'];
                    $arrCampos['reorden']       = $_POST['txtEmailCliente'];
                    $arrCampos['comprometidas'] = $_POST['txtTelCliente'];
                    $arrCampos['vigente']       = $_POST['txtTelCliente'];
                    //$arrCampos['imagen'] = $_POST['txtTelCliente'];
                    $objC = new Productos();
                    $objC->insProducto($arrCampos);
                    break;
            case 3: // ACTUALIZAR PRODUCTO
                    $arrCampos = array();
                    $arrCampos['nomProducto']   = $_POST['txtNomCliente'];
                    $arrCampos['existencia']    = $_POST['txtDirCliente'];
                    $arrCampos['reorden']       = $_POST['txtEmailCliente'];
                    $arrCampos['comprometidas'] = $_POST['txtTelCliente'];
                    $arrCampos['vigente']       = $_POST['txtTelCliente'];
                    //$arrCampos['imagen'] = $_POST['txtTelCliente'];
                    $objP = new Productos();
                    $objP->updProducto($_POST['txtIdCliente'],$arrCampos);
                    break;
            case 4: // ELIMINAR PRODUCTO
                    $objP = new Productos();
                    $objP->delProducto($_POST['idProducto']);
        }
    }
    else
        header('Location:../views/page_404.html');
?>