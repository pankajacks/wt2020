// global array
let productList = ['Book','Pencil','Scale','Eraser','Sharpner'];

document.querySelector("#pListBtn").addEventListener('click',showProduct);
document.querySelector("#pAddBtn").addEventListener('click',showAddProductForm);
document.querySelector('#pname').addEventListener('keypress',addProduct);
document.querySelector("#insertat").addEventListener('change',positionField);

let output = document.querySelector(".output");
let addProBlock = document.querySelector('.add-product');

let blockList = {
    'list': [output,'Show Prodcut List'],
    'form': [addProBlock,'Add New Product']
};

let ol = document.createElement("ol");
output.appendChild(ol);

productList.forEach(product => {addProductToOL(product);})

function showAddProductForm() {
    showBlock('form');
}

function showProduct() {
    showBlock('list');
}

function addProduct(e) {
    let pname = document.querySelector('#pname').value;
    
    if (e.keyCode != 13 || pname.length<3) {
        return;
    }

    let pos = document.querySelector('#insertat').value;
    let at = -1;

    switch(pos) {
        case 'start':
            at = 0;
            break;

        case 'at':
            at = document.querySelector('#position').value-1;
            break;

        default:
            at = ol.childNodes.length;
            break;
    }

    ol.insertBefore(createLiElement(pname), ol.childNodes[at]);
    restAddForm();
    showBlock('list');
}

function positionField(e) {
    let selPosition = document.querySelector('#position');
    if (e.target.value === 'at' && ol.childNodes.length>0) {
        selPosition.innerHTML = "";
        for(let i=2; i<=ol.childNodes.length; i++) {
            let opt = document.createElement('option');
            opt.value=i;
            opt.textContent = i;
            selPosition.add(opt)
        }
        selPosition.style.display = 'inline';
    } else {
        selPosition.style.display = 'none';
    }
}

function addProductToOL(pname) {
    ol.appendChild(createLiElement(pname));
}

function createLiElement(pname) {
    let li = document.createElement('li');
    li.textContent = convertToUppercase(pname);
    return li;
}

function convertToUppercase(str) {
    let strArray = str.split(' ');
    let outStrArray = [];
    strArray.forEach(txt => {
        outStrArray.push(txt.charAt(0).toUpperCase() + txt.slice(1));
    });
    return outStrArray.join(' ');
}

function setTopic(topicName) {
    let topic = document.querySelector(".topic-head");
    topic.textContent = topicName + ":";
}

function showBlock(id) {
    for (const key in blockList) {
        if (blockList.hasOwnProperty(key)) {
            const element = blockList[key];
            element[0].style.display = (id==key)? 'block' : 'none';
            if (id==key) setTopic(element[1]);
        }
    }
}

function restAddForm() {
    document.querySelector('#position').style.display = "none";
    document.querySelector('#insertat').selectedIndex = 0;
    document.querySelector('#pname').value="";
}