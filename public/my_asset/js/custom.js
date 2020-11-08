$(document).ready(function(){

    //alert("ok");
    showData();
    count();

    //add button
    $(".addtocartBtn").click(function (){
        //alert("ok");
        let id = $(this).data("id");
        //alert(id);
        let name = $(this).data("name");
        let codeno = $(this).data("codeno");
        let photo = $(this).data("photo");
        let price = $(this).data("price");
        let discount= $(this).data("discount");
        let description= $(this).data("description");
        
        let qty = 1;

        //console.log();

        let items = {id:id, codeno:codeno, name:name, photo:photo, qty:qty, price:price,discount:discount,description:description}
        console.log(items);
        let itemList = localStorage.getItem("item");

        let itemListId = [];
        let itemListArray;

        if(itemList === null)
        {
            itemListArray = [];
        }
        else
        {
            itemListArray = JSON.parse(itemList);
        }

        let status = false;
        $.each(itemListArray,function (i,v){
            if(v.id === id)
            {
                v.qty++;
                status = true;
            }
        });
        if(status === false)
        {
            itemListArray.push(items);
        }
        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();



    });

    
    function showData() {
        let items = localStorage.getItem("item");
        if(items)
        {
            let itemListArray = JSON.parse(items);
            let html = "";
            let num = 1;
            let total = 0;
            //console.log(itemListArray);
            $.each(itemListArray, function (i, v) {

                var originalPrice;
                var discountPrice;
                if(v.discount != 0 || v.discount != "")
                {
                    var subTotal = v.qty * v.discount;
                    discountPrice = v.discount;
                    originalPrice = v.price;
                }
                else {
                    var subTotal = v.qty * v.price;
                    discountPrice = "0";
                    originalPrice = v.price;
                }

                // console.log(v.qty);
                total += subTotal;
                html += `<tr>
                <td>
                <button data-id="${i}" class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%">
                <h4>x</h3>
                </button>
                </td>
                <td>
                <img src="${v.photo}" class="cartImg" width="200" height="200">
                </td>
                <td>
                <p class="text-info">Item Name : ${v.name}</p>
                <p class="text-info">Item Code : ${v.codeno}</p>
                </td>
                <td>
                <button data-id="${i}" class="btn btn-outline-danger plus_btn">
                <h5>+</h5>
                </button>
                </td>
                <td>
                <p class="text-info">${v.qty}</p>
                </td>
                <td>
                <button data-id="${i}" class="btn btn-outline-danger minus_btn">
                <h5>-</h5>
                </button>
                </td>
                <td>
                <p class="text-success">
                Discount : ${discountPrice} mmk
                </p>
                <p class="font-weight-lighter text-success">
                Price : ${originalPrice} mmk
                </p>
                </td>
                <td class="text-success">
                ${subTotal} mmk
                </td>
                </tr>`;
            });

            //total footer table
            html+= ` <tr>
            <td colspan="8">
            <h3 class="text-right text-success"> Total : ${total} Ks </h3>
            </td>
            </tr>`;
            //defining table
            $("tbody").html(html);
            count();
        }
    }

    //count function
    function count() {
        let totalCount = 0;
        let itemList = localStorage.getItem("item");
        if(itemList)
        {
            let itemListArray = JSON.parse(itemList);
            $.each(itemListArray,function(i,v) {
                totalCount += v.qty;
            });
        }
        $(".cartNoti").html(totalCount);
    }

    //remove btn
    $("tbody").on('click','.remove',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);

        let chk = confirm("Are you sure you want to remove this item ?");
        if(chk === true)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
    });

    
    
    
    //increase btn
    $("tbody").on("click",'.plus_btn',function (){
        // alert('Ok');
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        itemListArray[id].qty++;

        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

    //decrease btn
    $("tbody").on("click",'.minus_btn',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        if(itemListArray[id].qty <= 1)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
        else
        {
            itemListArray[id].qty--;
        }
        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

    $('.checkout').on('click',function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   // alert('ok');
        var notes = $('#notes').val();
       // console.log(notes);
       var order = localStorage.getItem("item");
      
         $.post("/order",{order:order,notes:notes},function (response) {
            console.log(response);
        })



     });

});