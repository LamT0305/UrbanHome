function onPress() {
    const prices = document.querySelectorAll("#price");
    const quantities = document.querySelectorAll("#quantity");
    const totals = document.querySelectorAll("#total");
    const ids = document.querySelectorAll("#productId")
    const totalMoney = document.getElementById("total_money");
  
    let total = 0;
  
    for (var i = 0; i < prices.length; i++) {
      if (quantities[i].value <= 0) {
        let confirmed = confirm("are you sure ?");
        if (!confirmed) {
          quantities[i].value = 1;
        } else {

          prices[i].parentElement.parentElement.parentElement.remove()

          $.ajax({
            url: 'product-function.php',
            type:'POST',
            data:{method:'delete', id:ids[i].innerText},
            success: function(data){
                console.log(data)
            }
          })
        }
        console.log(confirmed);
      } else {
        // Tính giá tiền cho từng sản phẩm
        var price = prices[i].innerText * quantities[i].value;
        console.log(prices[i].innerText);
        console.log(quantities[i].value);
        
        console.log(price);
  
        // Hiển thị giá tiền cho từng sản phẩm
        totals[i].innerText = price;
  
        // Tính tổng tiền
        total += price;
      }
    }
    // Hiển thị tổng tiền
    // totalMoney.innerText = total;
  }
  window.onload = onPress();
  
//   let ul = document.getElementById("suggestedSample");
  
//   function addToCart(event) {
//     if (event.target.classList.contains("add")) {
//       let price = event.target.previousElementSibling;
//       let name = price.previousElementSibling;
  
//       console.log(name);
//       console.log(price);
  
//       let div = document.createElement("div");
//       div.innerHTML = `
//       <div id="orderlist" style="display: flex; justify-content: space-around">
//             <p id="productName">${name.innerText}</p>
//             <p id="price">${price.innerText}</p>
//             <input type="number" id="quantity" onchange="onPress()" value="1" />
      
//             <p id="total">${price.innerText}</p>
//           </div>`;
  
//       let listProduct = document.getElementById("list-products");
//       listProduct.appendChild(div);
//       onPress();
//     }
//   }
  
//   ul.addEventListener("click", addToCart);
  //set up clik event cho ul => khi click vao button add
  //=>get  name + price cua product do
  //=> tao 1 div moi
  //=> them div moi vao trong div list-product
  //=> tinh tong so tien