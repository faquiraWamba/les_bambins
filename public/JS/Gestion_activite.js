function openTab(x){
    let contents = document.querySelectorAll(".tab-content-GA");
    let btns = document.querySelectorAll(".onglet")
    for (let i = 0; i < contents.length; i++ ){
        contents[i].style.display = "none";
        btns[i].classList.remove("active")
    }
    contents[x].style.display = "block";
    btns[x].classList.add("active")
}
openTab(0)


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