

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const img = document.getElementById('imagePreview');
        img.src = reader.result;
        img.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
function newPreviewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const img = document.getElementById('imagePreview');
        const newImg = document.getElementById('newImagePreview');
        img.src = reader.result;
        img.style.display = 'block';
        newImg.style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
}