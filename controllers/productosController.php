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
                            echo '<td><button type="button" class="btn btn-danger" onclick="eliminarProducto(\''.$arProductos[$i]->idProducto.'\')">Borrar</button></td>';
                        echo '</tr>';
                    }
                    break;
            case 2: // INSERTAR PRODUCTO
                    $arrCampos = array();
                    $arrCampos['idProducto']    = 0;
                    $arrCampos['nomProducto']   = $_POST['txtNomProducto'];
                    $arrCampos['existencia']    = intval($_POST['txtExistencia']);
                    $arrCampos['reorden']       = intval($_POST['txtReorden']);
                    $arrCampos['comprometidas'] = 0; //$_POST['txtComprometidas'];
                    $arrCampos['vigente']       = ( $_POST['txtVigente'] ) ? true : false;
                    
                    $path = "../images/";
                    $path.= $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $path);
                    $arrCampos['imagen']        = $_FILES['file']['name'];
                    
                    $objC = new Productos();
                    $objC->insProducto($arrCampos);
                    break;
            case 3: // ACTUALIZAR PRODUCTO
                    $arrCampos = array();
                    $arrCampos['nomProducto']   = $_POST['txtNomProducto'];
                    $arrCampos['existencia']    = intval($_POST['txtExistencia']);
                    $arrCampos['reorden']       = intval($_POST['txtReorden']);
                    $arrCampos['comprometidas'] = intval($_POST['txtComprometidas']);
                    $arrCampos['vigente']       = ( $_POST['txtVigente'] ) ? true : false;

                    /*$path = "../images/";
                    $path.= basename($_FILES['txtImagen']['name']);
                    move_uploaded_file($_FILES['txtImagen']['tmp_name'], $target_path);
                    $arrCampos['imagen']        = $_FILES['txtImagen']['name'];*/
                    $objP = new Productos();
                    $objP->updProducto($_POST['txtIdProducto'],$arrCampos);
                    break;
            case 4: // ELIMINAR PRODUCTO
                    $objP = new Productos();
                    $objP->delProducto($_POST['idProducto']);
        }
    }
    else
        header('Location:../views/page_404.html');
?>