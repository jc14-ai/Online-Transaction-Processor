
//KOFAI FUNCTIONS
function closeKofaiAddContainer(){
    //ADD A REFRESHER HERE
    // console.log(frameSource.src);
   // "/admin/boards/kofai.php";
    document.getElementById("add-kofai-container").style.display = 'none';
}
function openKofaiAddContainer(){
    document.getElementById("add-kofai-container").style.display = 'flex';
}

function closeKofaiDetailsContainer(){
    document.getElementById("details-kofai-container").style.display = 'none';
}

function openKofaiDetailsContainer(name,price,status,size){
    document.getElementById("details-kofai-name-input").value = name;
    document.getElementById("details-kofai-price-input").value = price;
    document.getElementById("details-kofai-status-input").value = status;
    document.getElementById("details-kofai-size-input").value = size;
    
    document.getElementById("details-kofai-container").style.display = 'flex';
}

function changeStatus(){
    if(document.getElementById("add-kofai-status-input").value === "active"){
        document.getElementById("add-kofai-status-input").value = "inactive";
        document.getElementById("hidden-add-kofai-status-input").value = "inactive";
    }else{
        document.getElementById("add-kofai-status-input").value = "active";
        document.getElementById("hidden-add-kofai-status-input").value = "active";
    }
}
function changeSize(){
    if(document.getElementById("add-kofai-size-input").value === "16"){
        document.getElementById("add-kofai-size-input").value = "22";
        document.getElementById("hidden-add-kofai-size-input").value = "22";
    }else{
        document.getElementById("add-kofai-size-input").value = "16";
        document.getElementById("hidden-add-kofai-size-input").value = "16";
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