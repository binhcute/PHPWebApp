let arrProduct = JSON.parse(localStorage.getItem("cat"));
let auProduct = arrProduct ? arrProduct : [];
function addProduct(id,Name,Price,ob){
    let index = auProduct.findIndex((item) => {
        if(item.id === id)
            return item;
    });
    if(index === -1){
        console.log(ob);
        let avatar = $(ob).find("#avatar").attr( "data-cus" );
        const a = {'id':id,'name':Name,'price':Price,'quantity':1,'avatar':avatar};
        auProduct.push(a);
    }
    else{
        auProduct[index].quantity+=1;
    }
    localStorage.setItem("cat",JSON.stringify(auProduct));
    alert("Đã thêm vào giỏ hàng");
    let a = JSON.parse(localStorage.getItem("cat"));
    console.log(a,'Array');
}
function removeProduct(id){
    let index = auProduct.findIndex((item) => {
        if(item.id === id)
        return item;
    });
    auProduct.splice(index,1);
    localStorage.setItem("cat",JSON.stringify(auProduct));
    let a = JSON.parse(localStorage.getItem("cat"));
    console.log(a);
    location.reload();
}

function plusProduct(id){
    let index = auProduct.findIndex((item) => {
        if(item.id === id)
            return item;
    });

    auProduct[index].quantity+=1;

    localStorage.setItem("cat",JSON.stringify(auProduct));
    let a = JSON.parse(localStorage.getItem("cat"));
    console.log(a,'Array');
    location.reload();
}

function minusProduct(id){
    let index = auProduct.findIndex((item) => {
        if(item.id === id)
            return item;
    });
    auProduct[index].quantity-=1;
    if(auProduct[index].quantity==0)
    {
        auProduct.splice(index,1);
    } 
    localStorage.setItem("cat",JSON.stringify(auProduct));
    let a = JSON.parse(localStorage.getItem("cat"));
    console.log(a,'Array');
    location.reload();
}
// $("#tru").click(function(){
//     ($("a").parent().attr("name"))
    // let idtru = $(obj).find("#tru").attr("name");
    // let index = auProduct.findIndex((item) => {
    //     if(item.id === idtru)
    //         return item;
    // });
    // auProduct[index].quantity-=1;
    // if(auProduct[index].quantity==0)
    // {
    //     auProduct.splice(index,1);
    // } 
    // localStorage.setItem("cat",JSON.stringify(auProduct));
    // let a = JSON.parse(localStorage.getItem("cat"));
// // console.log(a,'Array');
// })
function changeQuantity(id,obj) {
    let index = auProduct.findIndex(item => item.id === id);
    let itemProduct = auProduct[index]
    itemProduct.quantity = +$(obj).val()
    // $("#enter").click(function(){$("#quantity").val(itemProduct.quantity )})
    localStorage.setItem("cat",JSON.stringify(auProduct));
    let sum = +itemProduct.price*itemProduct.quantity
    $(`#sum-${id}`).html(sum);
    sumMoney();
}

function sumQuantity() {
    auProduct
    let sum = auProduct.reduce((lastSum,currentValue) =>{
        return(+currentValue.quantity)+lastSum;
    },0)
    $('#tongsoluong').html(sum);
    console.log(sum);
}

function updateProduct(){
    location.reload();
}

function sumMoney(){
    auProduct
    let sum = auProduct.reduce((lastSum,currentValue)=>{
        return(+currentValue.price*currentValue.quantity) + lastSum;
    },0)
    $('#tongtien').html(sum);
}

function onSubmit(ob){
    let dataCart = [];
    var firstname = $(ob).parents('#formAdd').find('#firstname').val();
    var lastname = $(ob).parents('#formAdd').find('#lastname').val();
    var email = $(ob).parents('#formAdd').find('#myEmail').val();
    var address = $(ob).parents('#formAdd').find('#myAddress').val();
    var phone = $(ob).parents('#formAdd').find('#phone').val();

    $('input.id-product').each(function(){
        var idproduct = $(this).val();
        var quantity = $(this).parents(".input-quantity").find(".quantity-input").val();
        
        const a = {idproduct: idproduct, quantity: quantity}
        dataCart.push(a);
        
    });
    let op="donhang";
    $.ajax({
            type: 'POST',
            url: '/ajax.php',
            dataType: 'json',
            data: {op,dataCart, firstname,lastname,email,address,phone},
            success: function(data){
                console.log(data);
                    // window.location.href=data['link'];
                }
        })

        if(this) onClear()
    // 
    
}

function onClear(){
    localStorage.clear();
    alert("Đặt hàng thành công, hãy kiểm tra email của bạn")
    location.reload();
}


function handleListCart(){
    let danhsach = JSON.parse(localStorage.getItem("cat"));
    if(danhsach && danhsach.length){
        let phantu = "";
        let tongtien =0
        let tongsoluong =0
        for(let i = 0 ;i <danhsach.length; i++)
            {
                let sum = +danhsach[i].price*danhsach[i].quantity
                // console.log(danhsach[i].id);
                phantu += `<tr>
                    <td><img src="${danhsach[i].avatar}" class="img-thumbnail"></td>
                    <td class="name">${danhsach[i].name}</td>
                    <td class="price" >${danhsach[i].price}</td>
                    <td class="quantity">
                        <div class="product-quantity">
                        <span class="qty-btn minus"><i class="ti-minus"></i></span>
                        <div class="cart-item__cell-quantity">
                            <div class="_16mL_A input-quantity">
                                <a type="button" onclick="minusProduct('${danhsach[i].id}')" class="btn btn-outline-success">
                                   -
                                </a>
                                <input type="text" class="quantity-input" onchange="changeQuantity('${danhsach[i].id}',this)" value="${danhsach[i].quantity}">
                                <input type="hidden" class="id-product" value="${danhsach[i].id}" />
                                <a type="button" class="btn btn-outline-success" onclick="plusProduct('${danhsach[i].id}')">
                                   +
                                </a>
                            </div>
                        </div>
                        <span class="qty-btn plus"><i class="ti-plus"></i></span>
                         </div>
                    </td>
                    <td class="subtotal"><span id ="sum-${danhsach[i].id}">${sum}</span> </td>
                    <td><a class="btn btn-light" onclick="removeProduct('${danhsach[i].id}')"><i class="fas fa-trash-alt"></i></a></td>
                    <td hidden>${tongsoluong += +danhsach[i].quantity}</td>
                    <td hidden>${tongtien +=sum}</td>
                   
                </tr>`
            }
            document.getElementById("tongsoluong").innerHTML = tongsoluong
            document.getElementById("tongtien").innerHTML = tongtien
            document.getElementById("mang").innerHTML = phantu
    }
}

handleListCart();