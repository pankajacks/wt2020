var container = document.querySelector(".container");
// console.log(container);
container.style.borderColor = "red";

var n1, n2, sum;

function sum() {
    var input = document.querySelectorAll("input");
    
    console.log(input[0]);
    n1 = input[0].value;
    n2 = input[1].value;
    
    sum = Number(n1) + Number(n2);
    
    document.querySelector(".result").textContent = sum;
}
