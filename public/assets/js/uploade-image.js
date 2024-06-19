// document.addEventListener('DOMContentLoaded', function (e) {
//     (function () {
//         const deactivateAcc = document.querySelector('#formAccountDeactivation');

//         // Update/reset user image of account page
//         let accountUserImage = document.getElementById('uploaded-image');
//         const fileInput = document.querySelector('.image-file-input'),
//             resetFileInput = document.querySelector('.image-reset');

//         if (accountUserImage) {
//             const resetImage = accountUserImage.src;
//             fileInput.onchange = () => {
//                 if (fileInput.files[0]) {
//                     accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
//                 }
//             };
//             resetFileInput.onclick = () => {
//                 fileInput.value = '';
//                 accountUserImage.src = resetImage;
//             };
//         }
//     })();
// });


image.addEventListener("change", (e) => {
    document.querySelector('.images_div').innerHTML = ''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.images_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">
                                                    </div>`;
    imageRemove()
})

function imageRemove() {
    if (document.getElementById('image_remove') != null) {
        document.getElementById('image_remove').addEventListener('click', function (e) {
            logo.value = ''
            e.target.parentNode.remove()
        })
    }
}
