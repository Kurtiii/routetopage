document.addEventListener('DOMContentLoaded', function () {
    // Select the privacy notice element
    const privacyNotice = document.getElementById('privacy-notice');
    const privacyNoticeClose = document.getElementById('privacy-notice-close');

    // Check if the privacy notice should be displayed
    if (privacyNotice) {
        // Check if the user has already accepted the privacy notice
        const hasAccepted = localStorage.getItem('privacyNoticeAccepted');

        // If not accepted, show the privacy notice
        if (!hasAccepted) {
            privacyNotice.style.display = 'block';
        }

        // Add click event to the close button
        privacyNoticeClose.addEventListener('click', function () {
            // Hide the privacy notice
            privacyNotice.style.display = 'none';
            // Store acceptance in local storage
            localStorage.setItem('privacyNoticeAccepted', 'true');
        });
    }
});
