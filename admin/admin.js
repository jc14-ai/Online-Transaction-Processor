
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
    document.getElementById("detail-upload-label").style.display = 'inline-block';
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
    document.getElementById("detail-upload-label").style.display = 'none';
    document.getElementById("details-kofai-name-input").disabled = true;
    document.getElementById("details-kofai-price-input").disabled = true;
    document.getElementById("details-kofai-status-input").disabled = true;
    document.getElementById("details-kofai-size-input").disabled = true;

    document.getElementById("details-kofai-container").style.display = 'none';
}

function closeKofaiDetailsContainer(){
    document.getElementById("details-kofai-container").style.display = 'none';
}

function openKofaiDetailsContainer(name,price,status,size,coffeeId,coffeeSizeId, image){

    document.getElementById("detail-image-preview").src = `/src/${image}`;
    document.getElementById("details-kofai-name-input").value = name;
    document.getElementById("details-kofai-price-input").value = price;
    document.getElementById("details-kofai-status-input").value = status;
    document.getElementById("details-kofai-size-input").value = size;

    document.getElementById("hidden-details-kofai-status-input").value = status;
    document.getElementById("hidden-details-kofai-size-input").value = size;

    document.getElementById("old-coffee-id").value = coffeeId;
    document.getElementById("old-coffee-size-id").value = coffeeSizeId;

    console.log(document.getElementById("hidden-details-kofai-status-input").value);
    console.log(document.getElementById("hidden-details-kofai-size-input").value);

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
function closeDonutAddAlert(){
    document.getElementById("alert-add-donut").style.display = 'none';
}
function editDonutDetails(){
    document.getElementById("save-donut-button").type = 'submit';
    document.getElementById("edit-donut-button").type = 'hidden';
    document.getElementById("cancel-donut-button").type = 'button';
    document.getElementById("back-donut-button").type = 'hidden';
    document.getElementById("detail-upload-label").style.display = 'inline-block';
    document.getElementById("details-donut-name-input").disabled = false;
    document.getElementById("details-donut-price-input").disabled = false;
    document.getElementById("details-donut-status-input").disabled = false;
    // document.getElementById("details-donut-size-input").disabled = false;
}
function cancelDonutDetails(){
    document.getElementById("save-donut-button").type = 'hidden';
    document.getElementById("edit-donut-button").type = 'button';
    document.getElementById("cancel-donut-button").type = 'hidden';
    document.getElementById("back-donut-button").type = 'button';
    document.getElementById("detail-upload-label").style.display = 'none';
    document.getElementById("details-donut-name-input").disabled = true;
    document.getElementById("details-donut-price-input").disabled = true;
    document.getElementById("details-donut-status-input").disabled = true;
    // document.getElementById("details-donut-size-input").disabled = true;

    document.getElementById("details-donut-container").style.display = 'none';
}

function closeDonutDetailsContainer(){
    // document.getElementById("save-donut-button").type = 'hidden';
    // document.getElementById("edit-donut-button").type = 'button';
    // document.getElementById("detail-upload-label").style.display = 'none';
    document.getElementById("details-donut-container").style.display = 'none';
}

function openDonutDetailsContainer(name,price,status,donutId,image){
    // fetch(`/admin/boards/get_donut_image.php?id=${donutId}`)
    // .then(res => res.json())
    // .then(data => {
    //     document.getElementById("image-preview").src = `/src/${data.image}`;
    // }); 

    document.getElementById("detail-image-preview").src = `/src/${image}`;
    console.log(image);
    document.getElementById("details-donut-name-input").value = name;
    document.getElementById("details-donut-price-input").value = price;
    document.getElementById("details-donut-status-input").value = status;
    // document.getElementById("details-donut-size-input").value = size;

    document.getElementById("hidden-details-donut-status-input").value = status;
    // document.getElementById("hidden-details-donut-size-input").value = size;
    
    document.getElementById("old-donut-id").value = donutId;

    // console.log(document.getElementById("hidden-details-donut-status-input").value);
    // console.log(document.getElementById("hidden-details-donut-size-input").value);

    document.getElementById("details-donut-container").style.display = 'flex';
}

//BUNDLE FUNCTIONS
function closeBundleAddContainer(){
    document.getElementById("add-bundle-container").style.display = 'none';
}
function openBundleAddContainer(){
    document.getElementById("add-bundle-container").style.display = 'flex';
}
function closeBundleAddAlert(){
    document.getElementById("alert-add-bundle").style.display = 'none';
}
function editBundleDetails(){
    document.getElementById("save-bundle-button").type = 'submit';
    document.getElementById("edit-bundle-button").type = 'hidden';
    document.getElementById("cancel-bundle-button").type = 'button';
    document.getElementById("back-bundle-button").type = 'hidden';
    document.getElementById("detail-upload-label").style.display = 'inline-block';
    document.getElementById("details-bundle-name-input").disabled = false;
    document.getElementById("details-bundle-price-input").disabled = false;
    document.getElementById("details-bundle-status-input").disabled = false;
    // document.getElementById("details-bundle-size-input").disabled = false;
}
function cancelBundleDetails(){
    document.getElementById("save-bundle-button").type = 'hidden';
    document.getElementById("edit-bundle-button").type = 'button';
    document.getElementById("cancel-bundle-button").type = 'hidden';
    document.getElementById("back-bundle-button").type = 'button';
    document.getElementById("detail-upload-label").style.display = 'none';
    document.getElementById("details-bundle-name-input").disabled = true;
    document.getElementById("details-bundle-price-input").disabled = true;
    document.getElementById("details-bundle-status-input").disabled = true;
    // document.getElementById("details-bundle-size-input").disabled = true;

    document.getElementById("details-bundle-container").style.display = 'none';
}

function closeBundleDetailsContainer(){
    document.getElementById("details-bundle-container").style.display = 'none';
}

function openBundleDetailsContainer(name,price,status,bundleId, image){
    document.getElementById("detail-image-preview").src = `/src/${image}`;
    document.getElementById("details-bundle-name-input").value = name;
    document.getElementById("details-bundle-price-input").value = price;
    document.getElementById("details-bundle-status-input").value = status;
    // document.getElementById("details-bundle-size-input").value = size;

    document.getElementById("hidden-details-bundle-status-input").value = status;
    // document.getElementById("hidden-details-bundle-size-input").value = size;
    
    document.getElementById("old-bundle-id").value = bundleId;

    console.log(document.getElementById("hidden-details-bundle-status-input").value);
    // console.log(document.getElementById("hidden-details-bundle-size-input").value);

    document.getElementById("details-bundle-container").style.display = 'flex';
}

//VIEW ORDER FUNCTIONS
function viewOrder(username, orderId) {
    document.getElementById("view-customer-name").innerText = username;

    fetch(`/admin/boards/get_order_details.php?order_id=${orderId}`)
      .then(response => response.json())
      .then(data => {
        const tableBody = document.querySelector("#view-order-container tbody");
        tableBody.innerHTML = "";
  
        data.items.forEach(item => {
          const row = `<tr>
                        <td>${item.product}</td>
                        <td>${item.price}</td>
                        <td>${item.quantity}</td>
                      </tr>`;
          tableBody.innerHTML += row;
        });
  
        const totalRow = `<tr style="font-weight: bold; border-top: 2px solid #000;">
                            <td>Total</td>
                            <td>${data.summary.total_price}</td>
                            <td>${data.summary.total_quantity}</td>
                          </tr>`;
        tableBody.innerHTML += totalRow;
      });
  
    document.getElementById("view-order-container").style.display = "flex";
  }
  
function closeViewOrder(){
    document.getElementById("view-order-container").style.display = 'none';
}

// function switchToUser(){
    
// }

// let isLogoutShowing = false;
// function showLogout(){
//     if(isLogoutShowing){
//         document.getElementById("logout-button").style.display = 'none';
//     }else if(!isLogoutShowing){
//         document.getElementById("logout-button").style.display = 'block';
//     }
//     isLogoutShowing = !isLogoutShowing;
// }

// function logout() {
//     fetch("logout_admin.php?logout=1")
//     .then(() => {
//         window.location.href = "../site/php/index/body.php";
//     });
// }

function completeOrder(orderID){
    fetch(`/admin/boards/complete_orders.php?order_id=${orderID}`)
    .then(res => res.json())
    .then(data => {
        location.reload();
    });
}    

const imageUpload = document.getElementById("image-upload");
const imageContainer = document.getElementById("image-preview");
imageUpload.addEventListener('change', (event) => {
    const  file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function (e) {
            //fix this
            imageContainer.src = e.target.result;
            // console.log(file.name);
        };
        reader.readAsDataURL(file);
    }
}); 

const detailsImageUpload = document.getElementById("detail-image-upload");
const detailsImageContainer = document.getElementById("detail-image-preview");
detailsImageUpload.addEventListener('change', (event) => {
    const  file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function (e) {
            //fix this
            detailsImageContainer.src = e.target.result;
            // console.log(file.name);
        };
        reader.readAsDataURL(file);
    }
});