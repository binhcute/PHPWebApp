let arrProduct = JSON.parse(localStorage.getItem("cat"));
let auProduct = arrProduct ? arrProduct : [];
function addProduct(id,Name,Price,img,ob){
    let index = auProduct.findIndex((item) => {
        if(item.id === id)
            return item;
    });
    if(index === -1){
        console.log(ob);
        // let img = $(ob).find("#img").attr( "data-cus" );
        const a = {'id':id,'name':Name,'price':Price,'quantity':1,'img':img};
        auProduct.push(a);
        console.log(a)
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
    var name = $(ob).parents('#formAdd').find('#name').val();
    var email = $(ob).parents('#formAdd').find('#email').val();
    var address = $(ob).parents('#formAdd').find('#address').val();
    var phone = $(ob).parents('#formAdd').find('#phone').val();
    var note = $(ob).parents('#formAdd').find('#note').val();

    $('input.id-product').each(function(){
        var idproduct = $(this).val();
        var quantity = $(this).parents(".input-quantity").find(".quantity-input").val();
        
        const a = {idproduct: idproduct, quantity: quantity}
        dataCart.push(a);
        
    });
    let op="donhang";
    $.ajax({
            type: 'POST',
            url: '/DonHang',
            dataType: 'json',
            data: {op,dataCart, name,email,address,phone,note},
            success: function(data){
                console.log(data);
                    window.location.href=data['link'];
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
                    <td><img src="${danhsach[i].img}" class="img-thumbnail" width="100" height="100"></td>
                    <td class="name">${danhsach[i].name}</td>
                    <td class="price" >${danhsach[i].price}</td>
                    <td class="quantity">
                    <div class="product-quantity">
                        <span class="qty-btn minus" onclick="minusProduct('${danhsach[i].id}')"><i class="ti-minus"></i></span>
                        <input type="text" class="quantity-input text-center" onchange="changeQuantity('${danhsach[i].id}',this)" value="${danhsach[i].quantity}">
                        <input type="hidden" class="id-product" value="${danhsach[i].id}" />
                        <span class="qty-btn plus" onclick="plusProduct('${danhsach[i].id}')"><i class="ti-plus"></i></span>
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