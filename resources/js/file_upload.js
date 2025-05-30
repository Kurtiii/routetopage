// on click on btnAttachFile, open file input
document.addEventListener('DOMContentLoaded', function () {
    const btnAttachFile = document.getElementById('btnAttachFile');
    const fileInput = document.getElementById('inputFile');
    const form = document.getElementById('fileUploadForm');

    if (btnAttachFile && fileInput) {
        btnAttachFile.addEventListener('click', function () {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                btnAttachFile.innerHTML = `<span class="loading loading-spinner loading-xs"></span> Uploading...`;
                btnAttachFile.disabled = true;
                form.submit();
            }
        });
    }

    const toggleTTL = document.getElementById('toggleTTL');
    const ttlInput = document.getElementById('ttlInput');
    const routeExpiration = document.getElementById('routeExpiration');
    const btnSaveConfig = document.getElementById('btnSaveConfig');

    if (toggleTTL && ttlInput) {
        toggleTTL.addEventListener('change', function () {
            if (this.checked) {
                ttlInput.disabled = false;
                ttlInput.focus();
            } else {
                ttlInput.disabled = true;
                ttlInput.value = '';
            }
        });
    }

    if (btnSaveConfig) {
        btnSaveConfig.addEventListener('click', function () {
            if (routeExpiration) {
                routeExpiration.value = ttlInput.value;
                document.getElementById('modal_configure').close();
            }
        });
    }

    // standard set expiration time to 24 hours
    if (ttlInput && !ttlInput.value) {
        const now = new Date();
        now.setHours(now.getHours() + 24);
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        ttlInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        routeExpiration.value = ttlInput.value;
    }

});
