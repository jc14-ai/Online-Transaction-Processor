
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
function openDonutPopUpContainer(donutId,donutName,donutPrice){
    // fetch(`/user/boards/get_donut_details.php?donut_id=${encodeURIComponent(donutId)}&donut_name=${encodeURIComponent(donutName)}&donut_price=${donutPrice}`)
    // .then(res => res.json())
    // .then(data =>{

    // })
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
function openBundlePopUpContainer(bundleId,bundleName,bundlePrice){
    // fetch(`/user/boards/get_donut_details.php?donut_id=${encodeURIComponent(donutId)}&donut_name=${encodeURIComponent(donutName)}&donut_price=${donutPrice}`)
    // .then(res => res.json())
    // .then(data =>{

    // })
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
function openKofaiPopUpContainer(kofaiId,kofaiName){
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