const formDatos = document.getElementById("formDatos");
const inputCantidad = document.getElementById("inputCantidad");
const selectDescription = document.getElementById("selectDescription");
const inputunitario = document.getElementById("inputunitario");
const inputtotal = document.getElementById("inputtotal");
const inputsubtotal = document.getElementById("subtotal");

const tbody = document.getElementById("tbody");

function calcularFactura() {

    var sum = 0;
    $('.precioTotal').each(function() {
        sum += parseFloat($(this).text());
    });
    $('#subtotal').val(sum.toFixed(2));
    let sumatotal = sum
    console.log(sum);
}
//** Descripcion obtiene el nombre y precio */
let arregloProductos = [

    { id: 1, nombre: "Masaje", precio: 20.50 },
    { id: 2, nombre: "Depilacion", precio: 15.00 },
    { id: 3, nombre: "Facial", precio: 30.20 },
];


//** Obtiene los datos de id y nombre de la descripcion */
const llenarProductos = () => {
    arregloProductos.forEach((p) => {
        const option = document.createElement("option");
        option.value = p.id;
        option.innerText = p.nombre;
        selectDescription.appendChild(option);

    });
};



llenarProductos();
const getNombreProductoById = (id) => {
    const objProducto = arregloProductos.find((p) => {
        if (p.id === +id) {
            return p; //** retorna la descripcion */
        }

    });

    return objProducto.nombre;

}


const getPrecioProductoById = (id) => {
    const objProducto = arregloProductos.find((p) => {
        if (p.id === +id) {
            return p; //** retorna el precio  */
        }

    });

    return objProducto.precio;
}

const rediseñotabla = () => {
    tbody.innerHTML = ""; /** Agregar nueva producto a la factura sin que se repita el anterior */
    arregloDatos.forEach((datos) => { /** Datos que toma la factura para agregarlos */
        let fila = document.createElement("tr");
        fila.innerHTML =
            `
             <td>${getNombreProductoById(datos.description)}</td> 
             <td>${datos.cant}</td> 
             <td>$ ${datos.pUnit }</td> 
             <td class="precioTotal">${datos.pTotal}</td>`;
        let tdEliminar = document.createElement("td");

        let botonEliminar = document.createElement("button");
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.innerText = ("Eliminar");
        botonEliminar.onclick = () => {
            eliminarDatosById(datos.description);
        }




        tdEliminar.appendChild(botonEliminar);
        fila.appendChild(tdEliminar);
        tbody.appendChild(fila);

    })
    inputsubtotal.textContent = sumatotal;
}
const eliminarDatosById = (id) => { //eliminar productos de la factura
    arregloDatos = arregloDatos.filter((datos) => {
        if (+id !== +datos.description) {
            return datos;
        }
    });
    rediseñotabla();
};



let arregloDatos = [];

const agregarDatos = (objDatos) => {


    //buscar el obj dato que ya existia en el arreglodatos
    //de ser asi sumar las cantidades para que solo aparezca una vez en el arreglo

    const resultado = arregloDatos.find((datos) => { //se busca si el objeto ya existe en la factura
        if (+objDatos.description == +datos.description) {
            return datos;
        }
    });


    if (resultado) {
        arregloDatos = arregloDatos.map((datos) => {
            if (datos.description == +objDatos.description) {
                return {
                    cant: +datos.cant + +objDatos.cant,
                    description: datos.description,
                    pTotal: (+datos.cant + +objDatos.cant) * +datos.pUnit,
                    pUnit: +datos.pUnit,
                    prod: datos.prod,



                };
            }
            return datos;
        });
    } else {
        arregloDatos.push(objDatos);
    }



    console.log(objDatos);


};

formDatos.onsubmit = (e) => {
    e.preventDefault();
    //creando objeto datos con los datos de las const en la factura
    const objDatos = {

        description: selectDescription.value,
        cant: inputCantidad.value,

        pUnit: inputunitario.value,
        pTotal: inputtotal.value,
        subtotal: inputsubtotal.value,
    };
    console.log(objDatos);

    agregarDatos(objDatos);


    console.log(arregloDatos);
    rediseñotabla();
};



selectDescription.onchange = () => {
    if (selectDescription.value == "0") {
        formDatos.reset();
        return;
    }

    const precio = getPrecioProductoById(selectDescription.value);
    if (precio) {
        inputunitario.value = precio;
        calcularTotal();
    }
};

function calculoIva() {

    var tasaIva = 12;
    var monto = document.getElementById("subtotal").value;
    var IVATotal = (monto * tasaIva) / 100;
    iva.value = IVATotal.toFixed(2);
    const a = document.getElementById("subtotal").value;
    const b = document.getElementById("iva").value;
    totalfact.value = ((a - b).toFixed(2));
};

const calcularTotal = () => {
    const cantidad = +inputCantidad.value;
    const pUnit = +inputunitario.value;
    const total = cantidad * pUnit;
    inputtotal.value = total.toFixed(2); //agregat dos valores decimales 
};




inputCantidad.onkeyup = () => { //el valor total cambia cada que se escriba una cantidad
    calcularTotal();
};

inputCantidad.onchange = () => { //el valor total cambia cada que se use el scroll de la cantidad
    calcularTotal();
};

btnguardar.onclick = () => {

    let objFactura = {
        nombre: nombre.value,
        apellido: apellido.value,
        cedula: cedula.value,
        sucursales: sucursales.value,
        correo: correo.value,
        fecha: fecha.value,
        hora: hora.value,
        detalle: arregloDatos,
    }
    console.log(objFactura);

    formCliente.reset();
    formDatos.reset();

    alert("Servicio Registrado!");
}