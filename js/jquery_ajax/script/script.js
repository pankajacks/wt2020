let url1 = "http://localhost/wt2020/js/jquery_ajax/text.json";

let url2 = "https://davids-restaurant.herokuapp.com/menu_items.json";

// let stateDiv = document.querySelector("#state");

document.querySelector("#state").addEventListener("change",loadCity);

let state_city_list;

$('document').ready(function(){

    $.get(url1, function(data, status){
        if (status == "success") {
            state_city_list = data;
            for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].state
                opt.value = key; 
                document.querySelector('#state').appendChild(opt);
                console.log(key, data[key].state);
            }

            // let str_json = JSON.stringify(data);
            // console.log(str_json);
            // console.log(JSON.parse(str_json));
        }
    });
});

function loadCity(e) {
    let city = document.querySelector("#city");
    city.textContent = "<option>Select City</option>";
    let state = e.target.value;

    for (const cityName of state_city_list[state].city) {
        let opt = document.createElement("option");
        opt.textContent = cityName
        city.appendChild(opt);
        // console.log(cityName);
    }

}