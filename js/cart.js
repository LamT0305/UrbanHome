function onPress() {
    const prices = document.querySelectorAll("#price");
    const quantities = document.querySelectorAll("#quantity");
    const totals = document.querySelectorAll("#total");
    const ids = document.querySelectorAll("#productId")
    const totalMoney = document.getElementById("total_money");
  
    let total = 0;
  
    for (var i = 0; i < prices.length; i++) {
      if (quantities[i].value <= 0) {
        let confirmed = confirm("Delete item?");
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
      } 
      else {
        // Tính giá tiền cho từng sản phẩm
        var price = prices[i].innerText * quantities[i].value;
        console.log(prices[i].innerText);
        console.log(quantities[i].value);
        
        console.log(price);
  
        // Hiển thị giá tiền cho từng sản phẩm
        totals[i].innerText = price;
  
        // Tính tổng tiền
        total += price;
        $.ajax({
          url: 'product-function.php',
          type: 'POST',
          data:{
            method:'update', 
            cart_item_id:ids[i].innerText,
            new_quantity: quantities[i].value
          },
          success:function(data){
            console.log(data)
          }
        })
      }
    }
    // Hiển thị tổng tiền
    // totalMoney.innerText = total;
   
  }
  window.onload = onPress();
  

//   ul.addEventListener("click", addToCart);
  //set up clik event cho ul => khi click vao button add
  //=>get  name + price cua product do
  //=> tao 1 div moi
  //=> them div moi vao trong div list-product
  //=> tinh tong so tien