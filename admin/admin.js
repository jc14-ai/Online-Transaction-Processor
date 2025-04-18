
//KOFAI FUNCTIONS
function closeKofaiAddContainer(){
    document.getElementById("add-kofai-container").style.display = 'none';
}
function openKofaiAddContainer(){
    document.getElementById("add-kofai-container").style.display = 'flex';
}
function closeKofaiAddAlert(){
    document.getElementById("alert-add-kofai").style.display = 'none';
}
function editKofaiDetails(){
    document.getElementById("save-kofai-button").type = 'submit';
    document.getElementById("edit-kofai-button").type = 'hidden';
    document.getElementById("cancel-kofai-button").type = 'button';
    document.getElementById("back-kofai-button").type = 'hidden';
    document.getElementById("details-kofai-name-input").disabled = false;
    document.getElementById("details-kofai-price-input").disabled = false;
    document.getElementById("details-kofai-status-input").disabled = false;
    document.getElementById("details-kofai-size-input").disabled = false;
}
function cancelKofaiDetails(){
    document.getElementById("save-kofai-button").type = 'hidden';
    document.getElementById("edit-kofai-button").type = 'button';
    document.getElementById("cancel-kofai-button").type = 'hidden';
    document.getElementById("back-kofai-button").type = 'button';
    document.getElementById("details-kofai-name-input").disabled = true;
    document.getElementById("details-kofai-price-input").disabled = true;
    document.getElementById("details-kofai-status-input").disabled = true;
    document.getElementById("details-kofai-size-input").disabled = true;

    document.getElementById("details-kofai-container").style.display = 'none';
}

function closeKofaiDetailsContainer(){
    document.getElementById("details-kofai-container").style.display = 'none';
}

function openKofaiDetailsContainer(name,price,status,size,coffeeId,coffeeSizeId){
    document.getElementById("details-kofai-name-input").value = name;
    document.getElementById("details-kofai-price-input").value = price;
    document.getElementById("details-kofai-status-input").value = status;
    document.getElementById("details-kofai-size-input").value = size;

    document.getElementById("old-coffee-id").value = coffeeId;
    document.getElementById("old-coffee-size-id").value = coffeeSizeId;
    
    document.getElementById("details-kofai-container").style.display = 'flex';
}

function changeStatus(actual, hidden){
    if(document.getElementById(actual.id).value === "active"){
        document.getElementById(actual.id).value = "inactive";
        document.getElementById(hidden.id).value = "inactive";
    }else{
        document.getElementById(actual.id).value = "active";
        document.getElementById(hidden.id).value = "active";
    }
}
function changeSize(actual, hidden){
    if(document.getElementById(actual.id).value === "16"){
        document.getElementById(actual.id).value = "22";
        document.getElementById(hidden.id).value = "22";
    }else{
        document.getElementById(actual.id).value = "16";
        document.getElementById(hidden.id).value = "16";
    }
}

//DONUT FUNCTIONS
function closeDonutAddContainer(){
    document.getElementById("add-donut-container").style.display = 'none';
}
function openDonutAddContainer(){
    document.getElementById("add-donut-container").style.display = 'flex';
}

function closeDonutDetailsContainer(){
    document.getElementById("details-donut-container").style.display = 'none';
}
function openDonutDetailsContainer(){
    document.getElementById("details-donut-container").style.display = 'flex';
}

//BUNDLE FUNCTIONS
function closeBundleAddContainer(){
    document.getElementById("add-bundle-container").style.display = 'none';
}
function openBundleAddContainer(){
    document.getElementById("add-bundle-container").style.display = 'flex';
}

function closeBundleDetailsContainer(){
    document.getElementById("details-bundle-container").style.display = 'none';
}
function openBundleDetailsContainer(){
    document.getElementById("details-bundle-container").style.display = 'flex';
}

//VIEW ORDER FUNCTIONS
function viewOrder(){
    document.getElementById("view-order-container").style.display = 'flex';
}
function closeViewOrder(){
    document.getElementById("view-order-container").style.display = 'none';
}