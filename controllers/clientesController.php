<?php
    require_once "../models/clientesModel.php";
    if( isset($_POST['opc']) ){
        $opc = filter_var($_POST['opc'],FILTER_SANITIZE_NUMBER_INT);

        switch( $opc )
        { 
            case 1: $objC = new Clientes();
                    $arClientes = json_decode($objC->getClientes());
                    for ($i=0; $i < count($arClientes) ; $i++) { 
                        echo '<tr>';
                            echo '<td>'.$arClientes[$i]->idCliente.'</td>';
                            echo '<td>'.$arClientes[$i]->nomCliente.'</td>';
                            echo '<td>'.$arClientes[$i]->dirCliente.'</td>';
                            echo '<td>'.$arClientes[$i]->emailCliente.'</td>';
                            echo '<td>'.$arClientes[$i]->telCliente.'</td>';
                            echo '<td><button type="button" class="btn btn-primary" onclick="verEdicion(\''.$arClientes[$i]->idCliente.'\',\''.$arClientes[$i]->nomCliente.'\',\''.$arClientes[$i]->dirCliente.'\',\''.$arClientes[$i]->emailCliente.'\',\''.$arClientes[$i]->telCliente.'\')">Editar</button></td>';
                            echo '<td><button type="button" class="btn btn-danger" onclick="eliminarCliente(\''.$arClientes[$i]->idCliente.'\')">Borrar</button></td>';
                        echo '</tr>';
                    }
                    break;
            case 2: // INSERTAR CLIENTE
                    $arrCampos = array();
                    $arrCampos['idCliente'] = 0;
                    $arrCampos['nomCliente'] = $_POST['txtNomCliente'];
                    $arrCampos['dirCliente'] = $_POST['txtDirCliente'];
                    $arrCampos['emailCliente'] = $_POST['txtEmailCliente'];
                    $arrCampos['telCliente'] = $_POST['txtTelCliente'];
                    $objC = new Clientes();
                    $objC->insCliente($arrCampos);
                    break;
            case 3: // ACTUALIZAR CLIENTE
                    $arrCampos = array();
                    $arrCampos['nomCliente'] = $_POST['txtNomCliente'];
                    $arrCampos['dirCliente'] = $_POST['txtDirCliente'];
                    $arrCampos['emailCliente'] = $_POST['txtEmailCliente'];
                    $arrCampos['telCliente'] = $_POST['txtTelCliente'];
                    $objC = new Clientes();
                    $objC->updCliente($_POST['txtIdCliente'],$arrCampos);
                    break;
            case 4: // ELIMINAR CLIENTE
                    $objC = new Clientes();
                    $objC->delCliente($_POST['idCliente']);
        }
    }
    else
        header('Location:../views/page_404.html');
?>