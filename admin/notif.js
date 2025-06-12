// Start checking for new orders every 5 seconds when the page loads
$(document).ready(function() {
    setInterval(checkForNewOrders, 5000); // Changed interval to 5 seconds
});

function checkForNewOrders() {
    $.ajax({
        url: 'ajax.php?action=check_new',
        type: 'GET',
        success: function(response) {
            if (response > 0) {
                $('.toast-body').text('Yeni Siparişniz var '); // Update the message as needed
                $('.toast').toast('show');
            }
        }
    });
}
