

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

$(document).ready(function() {
    $('#choix').select2({
        placeholder: "Sélectionnez des options",
        allowClear: true
    });

    let selectedValues = $('#choix').data('selected'); // Récupère les valeurs stockées en data
    if (selectedValues) {
        $('#choix').val(selectedValues).trigger('change'); // Applique les valeurs sélectionnées
    }
});