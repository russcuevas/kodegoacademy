var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.getElementById('notificationIcon').addEventListener('click', function () {
    var notificationPanel = document.getElementById('notificationPanel');

    if (notificationPanel.style.display === 'none' || notificationPanel.style.display === '') {
        notificationPanel.style.display = 'block';
    } else {
        notificationPanel.style.display = 'none';
    }
});

function markNotificationAsSeen(notificationId) {
    console.log('Notification ID:', notificationId);
    $.ajax({
        type: 'POST',
        url: '/notification-mark-seen',
        data: {
            notificationId: notificationId,
        },
        headers: {
            'X-CSRF-TOKEN': csrf_token,
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error("Hello world");
        }
    });
}