jQuery(document).ready(function($) {
    function updateDateTime() {
        var date = new Date();
        
        // Format date and time
        var dateFormatted = date.toLocaleString('en-US', {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });

        var timeFormatted = date.toLocaleTimeString('en-US');

        // Update the widget
        $('#current-date').text(dateFormatted);
        $('#current-time').text(timeFormatted);
    }

    // Update every second
    setInterval(updateDateTime, 1000);

    // Initial call
    updateDateTime();
});
