// on click on the download button, download the file
document.addEventListener('DOMContentLoaded', function() {
    const downloadButton = document.getElementById('btnDownload');
    const downloadModal = document.getElementById('modal_downloaded');
    if (downloadButton) {
        downloadButton.addEventListener('click', function() {
            const fileUrl = downloadButton.getAttribute('data-file-url');
            if (fileUrl) {
                downloadModal.showModal();

                window.open(fileUrl, '_blank');
            } else {
                console.error('File URL not found.');
            }
        });
    }
});
