let image = document.getElementById('image');
let images = ['dog4.jpg', 'dog7.jpg', 'dog8.jpg', 'dog9.jpg', 'dog2.jpg']
setInterval(function(){
    let random = Math.floor(Math.random() * 4);
    image.src = images[random]
}, 5000);