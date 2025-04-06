window.addEventListener("DOMContentLoaded", () => {
    fetch("pages/home.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("home-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading home.html:", error);
      });

    fetch("pages/aboutUs.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("about-us-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading aboutUs.html:", error);
      });

    fetch("pages/donut.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("donut-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading donut.html:", error);
      });
    
    fetch("pages/coffee.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("coffee-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading coffee.html:", error);
      });

    fetch("pages/reviews.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("reviews-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading reviews.html:", error);
      });
    fetch("pages/contact.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("contact-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading contact.html:", error);
      });
  });