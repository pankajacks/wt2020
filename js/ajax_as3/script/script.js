let url = "https://davids-restaurant.herokuapp.com/menu_items.json"

let data = null;
let buyItemList = [];

$("document").ready(function(){
    $.get(url,function(jsonObj,success){
        data = jsonObj.menu_items;
        console.log(data.length);
    });

    let itemNode = document.querySelector("#item");
    itemNode.addEventListener("keyup", createList);

    let addItemButton = document.querySelector("#addButton");
    addItemButton.addEventListener('click',addItem);

    function createList(e) {
        if (e.target.value.length >= 3 && data!=null) {
            let itemArray = [];
            for (const item in data) {
                let temp = data[item].name.toLowerCase();
                if ( temp.includes(e.target.value) ) {
                    itemArray.push(item);
                }
            }

            if (itemArray.length > 0 ) {
                // console.log("add li");
                createListItem(itemArray);
            }
        }
    }

    function createListItem(itemList) {
        let itemListNode = document.querySelector("#itemList");
        itemListNode.innerHTML = "";

        for (const itemIndex of itemList) {
            let itemObj = data[itemIndex];
            let li = document.createElement("li");
            let chkbox = document.createElement("input");
            chkbox.type = 'checkbox';
            chkbox.value = itemIndex;
            let label = document.createElement('label');
            label.appendChild(chkbox);
            label.appendChild(document.createTextNode(itemObj.name));
            li.appendChild(label);
            itemListNode.appendChild(li);

        }
    }

    function addItem() {
        let selectedItems = document.querySelectorAll("#itemList input:checked");
        for(const chkBoxNode of selectedItems) {
            buyItemList.push(data[chkBoxNode.value]);
        }
        addFoodItem(buyItemList);
    }

    function addFoodItem(selectedItems) {
        let i = 0, totPrice = 0;
        let myOrderListNode = document.querySelector("#myOrderList");
        myOrderListNode.innerHTML = "<tr><td>Sr</td><td>Name</td><td>Price</td><td>&nbsp;</td></tr>";

        for (const item of selectedItems) {
            let tr = document.createElement("tr");
            let tdSr = document.createElement("td");
            tdSr.textContent = ++i;
            tr.appendChild(tdSr);
            
            let tdName = document.createElement("td");
            tdName.textContent = item.name;
            tr.appendChild(tdName);

            let tdPrice = document.createElement("td");
            tdPrice.textContent = item.price_large;
            totPrice += item.price_large;
            tr.appendChild(tdPrice);

            let tdAction = document.createElement("td");
            let actButton = document.createElement("button");
            actButton.setAttribute("class","buttonX");
            actButton.setAttribute("id", "tr"+i);
            actButton.addEventListener('click',deleteItem);
            actButton.textContent = "X";
            tdAction.appendChild(actButton);

            tr.appendChild(tdAction);

            myOrderListNode.appendChild(tr);
            // console.log();
        }


        let trLastRow = document.createElement("tr");
        let tdTotalLabel = document.createElement("td");
        tdTotalLabel.setAttribute('colspan','2')
        tdTotalLabel.textContent = `Total Price (${i} items)`;
        trLastRow.appendChild(tdTotalLabel);

        let tdTotalPrice = document.createElement("td");
        tdTotalPrice.setAttribute('colspan','2')
        tdTotalPrice.textContent = Math.round(totPrice);
        trLastRow.appendChild(tdTotalPrice);

        myOrderListNode.appendChild(trLastRow);

        let itemListNode = document.querySelector("#itemList");
        itemListNode.innerHTML = "";
    }

    function deleteItem(e) {
        let index = Number(e.target.id.replace("tr",""))-1;
        // console.log(index);
        buyItemList.splice(index,1);
        addFoodItem(buyItemList);
    }

});