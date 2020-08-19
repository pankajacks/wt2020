let url = "https://davids-restaurant.herokuapp.com/menu_items.json";
let menu_items = null;

$('document').ready(function(){
    $.get(url,function(data,success){
        menu_items = data.menu_items;
        console.log(menu_items.length);
        createOptions();
        showDetails(218);
    });
});

function createOptions() {
    let i = 0;
    if (menu_items != null) {
        for (const jsonObj of menu_items) {
            console.log(i++, jsonObj.name);
        }
    }
}

function showDetails(index) {
    // let index = e.traget.value;
    if (menu_items != null) {
        let data = menu_items[index];
        console.log(data);
        document.querySelector("#shortName").textContent = data.short_name;
        document.querySelector("#priceSmall").textContent = data.price_small;
        document.querySelector("#priceLarge").textContent = data.price_large;
    }
}