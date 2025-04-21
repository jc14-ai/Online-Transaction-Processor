function addDonutToCart(donutId,name,price){
    // fetch(`/user/boards/add_donut_to_cart.php?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}`)
    // .then(res => res.json())
    // .then()
}  

function openDonutPopUpContainer(donutId,donutName,donutPrice){
    document.getElementById("donut-pop-up-container").style.display = 'flex';
}

function closeDonutPopUpContainer(){
    document.getElementById("donut-pop-up-container").style.display = 'none';
}