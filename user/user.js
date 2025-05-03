
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
function addKofaiToCart(){
    // fetch(`/user/boards/add_donut_to_cart.php?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}`)
    // .then(res => res.json())
    // .then()
    kofaiName = document.getElementById("kofai-pop-up-name").textContent;
    kofaiCount = document.getElementById("kofai-count").textContent;

    fetch(`/user/boards/insert_kofai_details.php?kofai_name=${encodeURIComponent(kofaiName)}&kofai_count=${encodeURIComponent(kofaiCount)}`)
    .then(res => res.text())
    .then(data =>{
        closeKofaiPopUpContainer();
        document.getElementById("kofai-added-to-cart-pop-up-text").textContent = data;
        openKofaiAddedToCartContainer();
    })
}  
function openKofaiddedToCartContainer(){
    document.getElementById("kofai-added-to-cart-pop-up-container").style.display = 'flex';
}
function closeKofaiAddedToCartContainer(){
    document.getElementById("kofai-added-to-cart-pop-up-container").style.display = 'none';
}
function openKofaiPopUpContainer(kofaiId,kofaiName){
    // fetch(`/user/boards/get_donut_details.php?donut_id=${encodeURIComponent(donutId)}&donut_name=${encodeURIComponent(donutName)}&donut_price=${donutPrice}`)
    // .then(res => res.json())
    // .then(data =>{

    // })
    document.getElementById("kofai-pop-up-name").textContent = kofaiName;

    document.getElementById("kofai-pop-up-container").style.display = 'flex';
}
function closeKofaiPopUpContainer(){
    document.getElementById("kofai-pop-up-container").style.display = 'none';
    document.getElementById("kofai-count").textContent = 1;
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
//select image for profile
document.getElementById("selectImageButton").addEventListener("click", function () {
    document.getElementById("imageInput").click();
  });
  
  document.getElementById("imageInput").addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("profileImage").src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });

function changeSize(){
    size = document.getElementById("kofai-size-picker-button");
    // fetch("")
    // .then(res => res.json())
    // .then(data =>{
    //     if()
    //     if(size.textContent == "16oz"){
    //         size.textContent = "22oz"; 
    //     }else{
    //         size.textContent = "16oz";
    //     }  
    // })
}