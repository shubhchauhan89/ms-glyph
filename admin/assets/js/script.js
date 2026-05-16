// JavaScript code in the admin dashboard
$(document).ready(function() {
    $('#submitColorBtn').click(function() {
        var colorCode = $('#colorPicker').val();
        $.ajax({
            type: 'POST',
            url: '../../includes/color.php',
            data: { colorCode: colorCode },
            success: function(response) {
                alert(response);
            }
        });
    });
});
