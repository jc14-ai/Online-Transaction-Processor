

function selectTab(id){
    document.getElementById("my-account-tab").style.backgroundColor = '';
    document.getElementById("purchases-tab").style.backgroundColor = '';
    document.getElementById("donut-tab").style.backgroundColor = '';
    document.getElementById("kofai-tab").style.backgroundColor = '';
    document.getElementById("bundle-tab").style.backgroundColor = '';
    document.getElementById("cart-tab").style.backgroundColor = '';
    document.getElementById("notifications-tab").style.backgroundColor = '';

    document.getElementById(id).style.backgroundColor = 'rgb(245, 245, 245)';
}

//DONUT FUNCTIONS
function addDonutToCart(){
    // fetch(`/user/boards/add_donut_to_cart.php?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}`)
    // .then(res => res.json())
    // .then()
    donutName = document.getElementById("donut-pop-up-name").textContent;
    donutCount = document.getElementById("donut-count").textContent;

    fetch(`/user/boards/insert_donut_details.php?donut_name=${encodeURIComponent(donutName)}&donut_count=${encodeURIComponent(donutCount)}`)
    .then(res => res.text())
    .then(data =>{
        closeDonutPopUpContainer();
        document.getElementById("donut-added-to-cart-pop-up-text").textContent = data;
        openDonutAddedToCartContainer();
    })
}  
function openDonutAddedToCartContainer(){
    document.getElementById("donut-added-to-cart-pop-up-container").style.display = 'flex';
}
function closeDonutAddedToCartContainer(){
    document.getElementById("donut-added-to-cart-pop-up-container").style.display = 'none';
}
function openDonutPopUpContainer(donutId,donutName,donutPrice, image){
    // fetch(`/user/boards/get_donut_details.php?donut_id=${encodeURIComponent(donutId)}&donut_name=${encodeURIComponent(donutName)}&donut_price=${donutPrice}`)
    // .then(res => res.json())
    // .then(data =>{

    // })
    document.getElementById("donut-pop-up-image").src = `/src/${image}`;
    document.getElementById("donut-pop-up-name").textContent = donutName;
    price = document.getElementById("donut-pop-up-price");
    donutPrice ='P' + parseFloat(donutPrice).toFixed(2);
    price.textContent = donutPrice;

    document.getElementById("donut-pop-up-container").style.display = 'flex';
}
function closeDonutPopUpContainer(){
    document.getElementById("donut-pop-up-container").style.display = 'none';
    document.getElementById("donut-count").textContent = 1;
}   
function decrementDonut(){
    if(document.getElementById("donut-count").textContent == 1){
        return;
    }
    document.getElementById("donut-count").textContent--;

}
function incrementDonut(){
    if(document.getElementById("donut-count").textContent == 99){
        return;
    }
    document.getElementById("donut-count").textContent++;
}


//BUNDLE FUNCTIONS
function addBundleToCart(){
    // fetch(`/user/boards/add_donut_to_cart.php?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}`)
    // .then(res => res.json())
    // .then()
    bundleName = document.getElementById("bundle-pop-up-name").textContent;
    bundleCount = document.getElementById("bundle-count").textContent;

    fetch(`/user/boards/insert_bundle_details.php?bundle_name=${encodeURIComponent(bundleName)}&bundle_count=${encodeURIComponent(bundleCount)}`)
    .then(res => res.text())
    .then(data =>{
        closeBundlePopUpContainer();
        document.getElementById("bundle-added-to-cart-pop-up-text").textContent = data;
        openBundleAddedToCartContainer();
    })
}  
function openBundleAddedToCartContainer(){
    document.getElementById("bundle-added-to-cart-pop-up-container").style.display = 'flex';
}
function closeBundleAddedToCartContainer(){
    document.getElementById("bundle-added-to-cart-pop-up-container").style.display = 'none';
}
function openBundlePopUpContainer(bundleId,bundleName,bundlePrice, image){
    // fetch(`/user/boards/get_donut_details.php?donut_id=${encodeURIComponent(donutId)}&donut_name=${encodeURIComponent(donutName)}&donut_price=${donutPrice}`)
    // .then(res => res.json())
    // .then(data =>{

    // })
    document.getElementById("bundle-pop-up-image").src = `/src/${image}`;
    document.getElementById("bundle-pop-up-name").textContent = bundleName;
    price = document.getElementById("bundle-pop-up-price");
    bundlePrice ='P' + parseFloat(bundlePrice).toFixed(2);
    price.textContent = bundlePrice;

    document.getElementById("bundle-pop-up-container").style.display = 'flex';
}
function closeBundlePopUpContainer(){
    document.getElementById("bundle-pop-up-container").style.display = 'none';
    document.getElementById("bundle-count").textContent = 1;
}   
function decrementBundle(){
    if(document.getElementById("bundle-count").textContent == 1){
        return;
    }
    document.getElementById("bundle-count").textContent--;

}
function incrementBundle(){
    if(document.getElementById("bundle-count").textContent == 99){
        return;
    }
    document.getElementById("bundle-count").textContent++;
}

//KOFAI FUNCTIONS
let kofaiSize = "0oz";
function addKofaiToCart(){ 
    if(kofaiSize === "0oz") return;

    kofaiName = document.getElementById("kofai-pop-up-name").textContent;
    kofaiCount = document.getElementById("kofai-count").textContent;

    fetch(`/user/boards/insert_kofai_details.php?kofai_name=${encodeURIComponent(kofaiName)}&kofai_count=${encodeURIComponent(kofaiCount)}&kofai_size=${encodeURIComponent(kofaiSize)}`)
    .then(res => res.text())
    .then(data =>{
        closeKofaiPopUpContainer();
        document.getElementById("kofai-added-to-cart-pop-up-text").textContent = data;
        kofaiSize = "0oz";
        openKofaiAddedToCartContainer();
    })
}  
function openKofaiAddedToCartContainer(){
    document.getElementById("kofai-added-to-cart-pop-up-container").style.display = 'flex';
}
function closeKofaiAddedToCartContainer(){
    document.getElementById("kofai-added-to-cart-pop-up-container").style.display = 'none';
}

function getSizeListener(){
    const sizeButtons = document.querySelectorAll('.kofai-size-picker-button');
    sizeButtons.forEach(sizeButton =>{
        sizeButton.addEventListener('click',() => {
            sizeButtons.forEach(button => button.classList.remove('kofai-size-picker-button-clicked'));
            sizeButton.classList.add('kofai-size-picker-button-clicked');
        })
    })
}
function openKofaiPopUpContainer(kofaiId,kofaiName, image){
    let num = 0;
    fetch(`/user/boards/get_kofai_size.php?kofai_id=${encodeURIComponent(kofaiId)}`)
    .then(res => res.json())
    .then(data =>{
        buttonContainer = document.getElementById("kofai-size-button-container");
        buttonContainer.innerHTML = "";
        data.forEach(size => {
            buttonContainer.innerHTML += `<button class="kofai-size-picker-button" id="kofai-size-picker-button-${++num}" onclick="selectSize(this.id)">${size.coffee_size}oz</button>`;
        });
        getSizeListener();
    }).catch(error => console.error('Error:', error ));
    document.getElementById("kofai-pop-up-image").src = `/src/${image}`;
    document.getElementById("kofai-pop-up-name").textContent = kofaiName;

    document.getElementById("kofai-pop-up-container").style.display = 'flex';
}

function selectSize(id){
    kofaiSize = document.getElementById(id).textContent;
}

function closeKofaiPopUpContainer(){
    document.getElementById("kofai-pop-up-container").style.display = 'none';
    document.getElementById("kofai-count").textContent = 1;
    kofaiSize = "0oz";
}   

function decrementKofai(){
    if(document.getElementById("kofai-count").textContent == 1){
        return;
    }
    document.getElementById("kofai-count").textContent--;
}

function incrementKofai(){
    if(document.getElementById("kofai-count").textContent == 99){
        return;
    }
    document.getElementById("kofai-count").textContent++;
}

function editInfo(editButton){
    document.getElementById(editButton.id).style.display = 'none';
    document.getElementById("acc-cancel-button").style.display = 'block';
    document.getElementById("acc-save-button").style.display = 'block';

    document.getElementById("selectImageButton").style.display = 'block';

    document.getElementById("acc-username").disabled = false;
    document.getElementById("acc-email").disabled = false;
    document.getElementById("acc-number").disabled = false;
}

function cancelInfo(cancelButton){
    document.getElementById("acc-edit-button").style.display = 'block';
    document.getElementById(cancelButton.id).style.display = 'none';
    document.getElementById("acc-save-button").style.display = 'none';

    document.getElementById("selectImageButton").style.display = 'none';

    document.getElementById("acc-username").disabled = true;
    document.getElementById("acc-email").disabled = true;
    document.getElementById("acc-number").disabled = true;

    location.reload();
}

async function saveInfo(saveButton) {
    const username = document.getElementById("acc-username").value.trim();
    const email = document.getElementById("acc-email").value.trim();
    const number = document.getElementById("acc-number").value.trim();
    const imageFile = document.getElementById("imageInput").files[0];

    if (!username || !email || !number) return;

    const formData = new FormData();
    formData.append("username", username);
    formData.append("email", email);
    formData.append("number", number);
    if (imageFile) formData.append("image", imageFile);

    await fetch("/user/set_profile.php", {
        method: "POST",
        body: formData
    });

    location.reload();
}

// `document.getElementById("selectImageButton").addEventListener("click", function () {
//     document.getElementById("imageInput").click();
// });`
  
// function insertImage(event){
//     const file = event.target.files[0];
//     if (file) {
//       const reader = new FileReader();
//       reader.onload = function (e) {
//         document.getElementById("profileImage").src = e.target.result;
//       };
//       reader.readAsDataURL(file);
//     }
// }

  function countItem(button, userID, productName, unitPrice, quantity, totalPrice){
    let sign = button.textContent;
    let operator = "";
    const row = button.closest('tr');
    const amount = row.querySelector('.number-label');
    if(sign == "-"){
        operator = "minus";
        if(parseInt(amount.textContent) - 1 < 1){
            return; 
        }
    }else if(sign == "+"){
        operator = "add";
        if(parseInt(amount.textContent) + 1 > 99){
            return;
        }
    }

    fetch(`/user/boards/count_item.php?user_id=${encodeURIComponent(userID)}&product_name=${encodeURIComponent(productName)}&unit_price=${encodeURIComponent(unitPrice)}&quantity=${encodeURIComponent(quantity)}&total_price=${encodeURIComponent(totalPrice)}&operator=${encodeURIComponent(operator)}`)
    .then(res => res.json())
    .then(data => {
    
        const total = row.querySelector('.total-price');
        const totallAll = document.getElementById("total-orders-amount");

        amount.textContent = data.quantity;
        total.textContent = `P${data.totalPrice}.00`;
        totallAll.textContent = `P${data.totalAll}`;
        // location.reload();
    })
  }

  function removeOnCart(userID, productName, unitPrice){
    fetch(`/user/boards/remove_on_cart.php?user_id=${encodeURIComponent(userID)}&product_name=${productName}&unit_price=${unitPrice}`)
    .then(res => res.json())
    .then(data => {
        location.reload();
    })
  }

//   function incrementItem(button, userID, productName, unitPrice, quantity, totalPrice){
//     if(quantity >= 99){
//         return;
//     }

//     fetch(`/user/boards/increment_item.php?user_id=${encodeURIComponent(userID)}&product_name=${encodeURIComponent(productName)}&unit_price=${encodeURIComponent(unitPrice)}&quantity=${encodeURIComponent(quantity)}&total_price=${encodeURIComponent(totalPrice)}`)
//     .then(res => res.json())
//     .then(data => {
//         // const container = button.parentElement;
//         // const amount = container.querySelector('.number-label');

//         // let newQuantity = data;
//         // amount.textContent = newQuantity;

//         location.reload();
//     })
//   }

// function changeSize(){  
//     fetch("/user/boards/get_kofai_size.php")
//     .then(res => res.json())
//     .then(data =>{
//         size = document.getElementById("kofai-size-picker-button");

//         //Gotta modify this
//         if(size){

//         }
//         if(size.textContent == "16oz"){
//             size.textContent = "22oz"; 
//         }else{
//             size.textContent = "16oz";
//         }  
//     })
// }

function removeNotification(notificationID, userID){
    fetch(`/user/boards/remove_notification.php?notification_id=${encodeURIComponent(notificationID)}&user_id=${encodeURIComponent(userID)}`)
    .then(res => res.json())
    .then(data =>{
        location.reload();
    });
}

let isLogoutShowing = false;
function showLogout(){
    if(isLogoutShowing){
        document.getElementById("logout-button").style.display = 'none';
    }else if(!isLogoutShowing){
        document.getElementById("logout-button").style.display = 'block';
    }
    isLogoutShowing = !isLogoutShowing;
}

function logout() {
    fetch("logout_user.php?logout=1")
    .then(() => {
        window.location.href = "../site/php/index/body.php";
    });
}
    
async function checkout(userID, total){
    if(total == null){
        return;
    }

    await fetch(`/user/boards/send_orders.php?user_id=${encodeURIComponent(userID)}`)
    .then(res => res.json())
    console.log("inserted");
    // document.getElementById("cart-container").style.display = 'none';
    // document.getElementById("main-checkout-container").style.display = 'flex';

    document.getElementById("checkout-container").submit();
}

//select image for profile

document.getElementById("imageInput").addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            //fix this
            document.getElementById("profileImage").src = e.target.result;
            console.log(file.name);
        };
        reader.readAsDataURL(file);
    }
});

function selectImage(){
    document.getElementById("imageInput").click();
}