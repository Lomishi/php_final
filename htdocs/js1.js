document.addEventListener('DOMContentLoaded', event =>{


});

const bCarrito=document.querySelector('.btn-carrito');

bCarrito.addEventListener('click',event =>{

    const carritoContainer = document.querySelector('#carrito-container');


    if(carritoContainer.style.display == ''){
        
        carritoContainer.style.display = 'block';
        actualizarCarritoUI();
    } else{
        carritoContainer.style.display = '';
    }
})



//para hacer el procedimiento para poder llenar el carrito
function actualizarCarritoUI(){
    fetch('http://localhost/Api/producto_carrito/api_productoC.php?tipo=planeta')
    .then(response => response.json())
    //utilizamos lo siguiente para verlo desde consola y podremos ver como se muestra
    .then(data => {console.log(data);
    
        //esta variable la usaremos para poner el objeto tabla 
         let tablaCont = document.querySelector('#tabla');
        //esta para obtener el precio total
         let precioTotal = '';
        //crear el html
        let html = ''; 
    
        //pasaremos los elementos por un foreach para manejarlos uno a uno
        data.product.forEach(element => {
            html += `
        
            <div class='fila'>
            <div class='imagen'><img src='img/${element.imagen}' width='120' /></div>
            <div class='info'>
                <input type='hidden' value='${element.id}' />
                <div class='nombre'>${element.nombre}</div>
                <div>${element.cantidad} items de € ${element.precio}</div>
                <div>Subtotal: € ${element.subtotal}</div>
                <form action="eliminar.php" method="POST">
                <div class='botones'><button class='btn-remove' name="id" value="${element.id}" >Eliminar</button></div>
                </form>
            </div>
        </div>
            `;
    
            
        });
    
        //precioTotal = `<p>Total: € ${data.info.total}</p>`;
    //aqui mostramos en el carrito  lo que recorre el foreach + el precio total.
        tablaCont.innerHTML = precioTotal + html;
    
    
    
       // document.cookie = `product=${data.info.count}`;
        //bCarrito.innerHTML = `(${data.info.count})Carrito`;
    
    
        //para eliminar
        document.querySelectorAll('.btn-remove').forEach(boton => {
           boton.addEventListener('click', e =>{
               const id = boton.parentElement.parentElement.children[0].value;
    
               //abrimos la funcion
               removeItemFromCarito(id);
           });
        });
    });
    
    
    }

    const botones = document.querySelectorAll('button');


botones.forEach(boton =>{
    const id = boton.parentElement.parentElement.children[0].value;

    boton.addEventListener('click', e =>{

        addItemtoCarito(id);
    });

});








/////////////////////////////////////////AÑADIR/ELIMINAR///////////////////





//funcion eliminar
function removeItemFromCarito(id){

    window.location.href = 'eliminar.php?$id=' +id;



}


//funcion añadir
function addItemtoCarito(id){
    //llamada a api-carrito +la id que corresponde

fetch('http://localhost/Api/carrito/api_carrito.php?action=add&id=' + id)
.then(res => res.json())
.then(data => {console.log(data.status);

    actualizarCarritoUI();
});

}

