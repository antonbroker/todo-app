$(document).ready(function () {
    $('#task-form').on('submit', function (event) {
        event.preventDefault();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const title = $('#task-title').val().trim();

        if (!title) {
            return;
        }


    });
});
