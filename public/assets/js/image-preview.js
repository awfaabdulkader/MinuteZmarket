document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("input-file").addEventListener("change", function (event) {
        var input = event.target;
        var reader = new FileReader();
        var imgElement = document.getElementById("preview-image");

        if (!imgElement) {
            console.error("Preview image element not found.");
            return;
        }

        reader.onload = function () {
            imgElement.src = reader.result;
            imgElement.style.display = "block"; // Show the image
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    });
});
