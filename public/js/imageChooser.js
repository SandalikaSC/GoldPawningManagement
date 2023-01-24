let imageChooser = document.getElementById('myfile');
let register = document.getElementById('registerbtn');
let image = '<?php echo URLROOT ?>public/img/image 1.png';
imageChooser.addEventListener('change', () => {
    file = imageChooser.files[0];
    if (file) {
        const fileReader = new FileReader(); //create an object using FileReader class
        fileReader.readAsDataURL(file);
        fileReader.addEventListener('load', () => {
            image = fileReader.result;
            document.getElementById('profile-pic').src = image;
            document.getElementById('imageData').value = image;
        })
    }
})