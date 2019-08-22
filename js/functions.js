function verEdicion(idArea,nomArea){
    $("#spnTitulo").html('Actualizar Area');
    $("#myModal").modal("show");
    $("#txtIdArea").val(idArea);
    $("#txtNomArea").val(nomArea);
    $("#btnActualizar").show()
    $("#btnGuardar").hide()
}

function verModal(){
    $("#spnTitulo").html('Insertar Area');
    $("#myModal").modal("show");
    $("#txtIdArea").val("");
    $("#txtNomArea").val("");
    $("#btnActualizar").hide()
    $("#btnGuardar").show()
}

function insertarArea(){
    var pagina = $("#frmArea").serialize();
    var url = "../controllers/areasController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=2",
        cache: false,
        success: function(data){
            $("#tbAreas").load("../controllers/areasController.php",{opc:'1'});
        }
    });
    $("#myModal").modal("hide");
}

function actualizarArea(){
    var pagina = $("#frmArea").serialize();
    var url = "../controllers/areasController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=3",
        cache: true,
        success: function(data){
            $("#tbAreas").load("../controllers/areasController.php",{opc:'1'});
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    });
    $("#myModal").modal("hide");
}

function eliminarArea(idArea){
    var r = confirm("¿Está seguro de eliminar el area?");
    if( r ){
        var url = "../controllers/areasController.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "opc=4&idArea="+idArea,
            cache: false,
            success: function(data){
                $("#tbAreas").load("../controllers/areasController.php",{opc:'1'});
            }
        });
    }
}
///////////////////////////////////////////////////////////////////////////////////
/// FUNCIONES PARA EL MODULO DE CLIENTES
function verEdicion(idCliente,nomCliente,dirCliente,emailCliente,telCliente){
    $("#spnTitulo").html('Actualizar Cliente');
    $("#myModal").modal("show");
    $("#txtIdCliente").val(idCliente);
    $("#txtNomCliente").val(nomCliente);
    $("#txtDirCliente").val(dirCliente);
    $("#txtEmailCliente").val(emailCliente);
    $("#txtTelCliente").val(telCliente);
    $("#btnActualizar").show()
    $("#btnGuardar").hide()
}

function verModal(){
    $("#spnTitulo").html('Insertar Cliente');
    $("#myModal").modal("show");
    $("#txtIdCliente").val("");
    $("#txtNomCliente").val("");
    $("#txtDirCliente").val("");
    $("#txtEmailCliente").val("");
    $("#txtTelCliente").val("");
    $("#btnActualizar").hide()
    $("#btnGuardar").show()
}

function insertarCliente(){
    var pagina = $("#frmCliente").serialize();
    var url = "../controllers/clientesController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=2",
        cache: false,
        success: function(data){
            $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
        }
    });
    $("#myModal").modal("hide");
}

function actualizarCliente(){
    var pagina = $("#frmCliente").serialize();
    var url = "../controllers/clientesController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=3",
        cache: true,
        success: function(data){
            $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    });
    $("#myModal").modal("hide");
}

function eliminarCliente(idCliente){
    var r = confirm("¿Está seguro de eliminar el cliente?");
    if( r ){
        var url = "../controllers/clientesController.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "opc=4&idCliente="+idCliente,
            cache: false,
            success: function(data){
                $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
            }
        });
    }
}
///////////////////////////////////////////////////////////////////////////////////
/// FUNCIONES PARA EL MODULO DE PRODUCTOS
function verEdicion(idProducto,nomProducto,existencia,reorden,comprometidas,vigente,imagen){
    $("#spnTitulo").html('Actualizar Producto');
    $("#myModal").modal("show");
    $("#txtIdProducto").val(idProducto);
    $("#txtNomProducto").val(nomProducto);
    $("#txtExistencia").val(existencia);
    $("#txtReorden").val(reorden);
    $("#txtComprometidas").val(comprometidas);
    $("#txtVigente").val(vigente);
    //$("#txtImagen").val(telCliente);
    $("#btnActualizar").show()
    $("#btnGuardar").hide()
}

function verModal(){
    $("#spnTitulo").html('Insertar Producto');
    $("#myModal").modal("show");
    $("#txtIdCliente").val("");
    $("#txtNomCliente").val("");
    $("#txtDirCliente").val("");
    $("#txtEmailCliente").val("");
    $("#txtTelCliente").val("");
    $("#btnActualizar").hide()
    $("#btnGuardar").show()
}

function insertarCliente(){
    var pagina = $("#frmCliente").serialize();
    var url = "../controllers/clientesController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=2",
        cache: false,
        success: function(data){
            $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
        }
    });
    $("#myModal").modal("hide");
}

function actualizarCliente(){
    var pagina = $("#frmCliente").serialize();
    var url = "../controllers/clientesController.php";
    $.ajax({
        type: "POST",
        url: url,
        data: pagina+"&opc=3",
        cache: true,
        success: function(data){
            $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    });
    $("#myModal").modal("hide");
}

function eliminarCliente(idCliente){
    var r = confirm("¿Está seguro de eliminar el cliente?");
    if( r ){
        var url = "../controllers/clientesController.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "opc=4&idCliente="+idCliente,
            cache: false,
            success: function(data){
                $("#tbClientes").load("../controllers/clientesController.php",{opc:'1'});
            }
        });
    }
}