import * as bootstrap from 'bootstrap'



// document.addEventListener('DOMContentLoaded', function () {
//     var productFieldsContainer = document.getElementById('productFieldsContainer');
//     var addProductButton = document.getElementById('addProductButton');

//     var index = 1; // Índice inicial
//     var productsData = JSON.parse(document.getElementById('productData').textContent);

//     addProductButton.addEventListener('click', function() {
//         var row = document.createElement('div');
//         row.className = 'row';

//         var col1 = document.createElement('div');
//         col1.className = 'col';
//         var productField = document.createElement('div');
//         productField.className = 'form-group';

//         var productSelect = document.createElement('select');
//         productSelect.name = 'finishedProduct_id[]';
//         productSelect.className = 'form-control product';
//         productSelect.placeholder = 'Producto';

//         var defaultOption = document.createElement('option');
//         defaultOption.value = '';
//         defaultOption.textContent = 'Producto';
//         productSelect.appendChild(defaultOption);

//         for (var i = 0; i < productsData.length; i++) {
//             var product = productsData[i];
//             var option = document.createElement('option');
//             option.value = product.id;
//             option.textContent = product.name;
//             productSelect.appendChild(option);
//         }

//         productField.appendChild(productSelect);
//         col1.appendChild(productField);

//         var col2 = document.createElement('div');
//         col2.className = 'col';
//         var quantityField = document.createElement('div');
//         quantityField.className = 'form-group';
//         quantityField.innerHTML = `
//             <label for="quantity-${index}">Cantidad</label>
//             <input type="text" name="amount[]" id="quantity-${index}" class="form-control quantity" placeholder="Cantidad">
//         `;
//         col2.appendChild(quantityField);

//         row.appendChild(col1);
//         row.appendChild(col2);

//         productFieldsContainer.appendChild(row);

//         index++;
//     });
// });
