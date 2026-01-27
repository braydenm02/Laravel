import $ from 'jquery';

$(() => {
    // Handle the grading form submission
    $('#gradeFormSearch').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: '/grading',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('#searchMessage').html(response.data.serialHTML);
                    $('#gradeResults').html(response.data.printerHTML);
                    $('#gradingform').html(response.data.form);
                } else {
                    $('#searchMessage').html(response.message);
                    $('#gradeResults').empty();
                    $('#gradingform').empty();
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                $('#searchMessage').html('An error occurred. Please try again.');
                $('#gradeResults').empty();
                $('#gradingform').empty();
            }
        });
    });

    /**
     * Handle all grade form submissions
     */
    $(document).on('submit', '.gradeForm', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        console.log(Array.from(formData.entries()));
    });
});