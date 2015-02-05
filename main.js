var listaArticulos=[];

function Articulo(titulo, descripcion, link, fecha){
    this.titulo=titulo;
    this.descripcion=descripcion;
    this.link=link;
    this.fecha=fecha;
    
    this.mostrarArticulo = function () {
        //muestra el elemento en el div central
    };
}

function pedirCategorias() {
    $.ajax({
        url: 'cargarCategorias.php?control=categorias',
        success: function (data) {
            var datos=eval("("+data+")");
            rellenarCategorias(datos);
        }
    });
}
function pedirFeedsCategoria(categoria) {
    $.ajax({
        url: 'cargarCategorias.php?control=feeds_Cat&categoria='+categoria,
        success: function (data) {
            var datos=eval("("+data+")");
            mostrarFeedsCategoria(datos);//cuando pulsas una categoria se despliega 
            //y te muestra el nombre de los feeds que contiene
        }
    });
}
function pedirFeed(url) {
    $.ajax({
        url: 'cargarCategorias.php?control=feed&url='+url,
        success: function (data) {
            var datos=eval("("+data+")");
            mostrarFeed(datos); //Muestra los items de cada feed
        }
    });
}

function rellenarCategorias(data){
    //rellenar categorias con sus feeds
}

window.onload=function(){
    //pedirCategorias();
    pedirFeed();
    alert("A Juanfri le mola el sado");
};
