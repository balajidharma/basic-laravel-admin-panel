
$('#image_upload').on('change',function (e) {
    e.preventDefault();
    var reader = new FileReader();
    reader.onload = function(){
            $('#previews_image_upload').css('background-image','url("'+reader.result+'")')
    };
    reader.readAsDataURL(event.target.files[0]);

})
