function previewFile() {
    const imageInput = document.querySelector('#imageInput');
    const imagePreview = document.querySelector('#imagePreview');

    const fileImage = new FileReader();
    fileImage.readAsDataURL(imageInput.files[0]);
    fileImage.onload= function (e) {
        imagePreview.src = e.target.result;
    }
}

previewFile();