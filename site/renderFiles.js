window.addEventListener("DOMContentLoaded", () => {
    fetch("/site/pages/home.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("home-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading home.html:", error);
      });

    fetch("/site/pages/aboutUs.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("about-us-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading aboutUs.html:", error);
      });

    fetch("/site/pages/donut.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("donut-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading donut.php:", error);
      });
    
    fetch("/site/pages/coffee.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("coffee-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading coffee.php:", error);
      });

    fetch("/site/pages/reviews.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("reviews-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading reviews.html:", error);
      });
    fetch("/site/pages/contact.html")
      .then(response => response.text())
      .then(data => {
        document.getElementById("contact-page").innerHTML = data;
      })
      .catch(error => {
        console.error("Error loading contact.html:", error);
      });
    // fetch("/site/pages/sign-up.html")
    //   .then(response => response.text())
    //   .then(data => {
    //     document.getElementById("sign-up-page").innerHTML = data;
    //   })
    //   .catch(error => {
    //     console.error("Error loading sign-up.html:", error);
    //   });
  });