var total = document.getElementById('total-factura');
var cant = document.querySelectorAll('.cantidad-producto');
var precio = document.querySelectorAll('.precio');
var subtotal = document.querySelectorAll('.subtotal');

// función que actualiza totales a medida que modifico cantidades
var totalPrice = 0;
for (var i = 0; i < cant.length; i++) {
    cant[i].onchange = function(){
    var array = [];
      for (var i = 0; i < cant.length; i++) {
          console.log(precio[i].value)
          subtotalProd = cant[i].value * precio[i].value;
          subtotal[i].innerHTML = "$" + subtotalProd.toFixed(2).replace (/\./g, ',');
          array.push(subtotalProd);
      }
      totalCart = array.reduce((a,b) => a + b, 0)
       total.innerHTML = "$" + totalCart.toFixed(2).replace (/\./g, ',');
    }
  }

