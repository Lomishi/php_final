












//este evento nosdejara configurar todas las opciones cuando cargue la pagina.
document.addEventListener('DOMContentLoaded',event =>{
//las cookuies las usaremos para contar

});
//evento para los botones del carrito

const bCarrito =document.querySelector('.btn-carrito');

bCarrito.addEventListener('click',event =>{

    //aqui lo que hacemos es que al pulsar el carrito se abra el panel, y al volver a pulsar se quite.
 const carritoContainer = document.querySelector('#carrito-container');  
//abre carrito
 if(carritoContainer.style.display == ''){
    carritoContainer.style.display = 'block';
    //abrimos la funcion
    actualizarCarritoUI();

     
 }
 //oculta carrito
 else{
     carritoContainer.style.display= '';

 }
 


});


//cargar las apis

//para hacer el procedimiento para poder llenar el carrito
function actualizarCarritoUI(){
fetch('http://localhost/Api/carrito/api_carrito.php?action=mostrar')
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
            <div class='botones'><button class='btn-remove'>Eliminar</button></div>
        </div>
    </div>
        `;

        
    });

    precioTotal = `<p>Total: € ${data.info.total}</p>`;
//aqui mostramos en el carrito  lo que recorre el foreach + el precio total.
    tablaCont.innerHTML = precioTotal + html;



    document.cookie = `product=${data.info.count}`;
    bCarrito.innerHTML = `(${data.info.count})Carrito`;


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

// esto hace referencia con el boton agregar carrito de productos.php



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

    
fetch('http://localhost/Api/carrito/api_carrito.php?action=remove&id=' + id)
.then(res => res.json())
.then(data => {console.log(data.status);

    actualizarCarritoUI();
});


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

