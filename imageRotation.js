// imageRotation.js

// Arrays of image URLs
var images = [
    "image/addSale.jpg",
    "image/addsale1.png",
    "image/addsale2.jpg",
    "image/addsale3.jpg",
    "image/addsale4.png"
    // Add more image URLs as needed for set 1
  ];

  var currentIndex = 0; // Variable to keep track of the current image index for set 1


  // Function to change the image for set 1 every 5 seconds
  function changeImage() {
    var adImage = document.getElementById("adImage");
    adImage.src = images[currentIndex];
    currentIndex = (currentIndex + 1) % images.length; // Move to the next image
  }

  // Call the changeImage functions every 5 seconds
  setInterval(changeImage, 1000);
