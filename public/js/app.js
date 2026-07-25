$(document).ready(function () {

    $('#task-form').on('submit', function (event) {

        event.preventDefault();

        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const title = $('#task-title').val().trim();

        if (!title) {
            return;
        }

        $.ajax({
            url: '/tasks',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                title: title
            },

            success: function (task) {

                $('#task-list').append(`
                    <li class="list-group-item d-flex justify-content-between align-items-center" data-id="${task.id}">
                        <div>
                            <strong>${task.title}</strong>

                            <span class="badge bg-secondary">
                                Pending
                            </span>
                        </div>

                        <div>
                            <button class="btn btn-sm btn-warning">
                                Toggle
                            </button>

                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </div>
                    </li>
                `);

                $('#task-title').val('');
            }
        });
    });


    $('#task-list').on('click', '.btn-danger', function () {

        const taskItem = $(this).closest('li');
        const taskId = taskItem.data('id');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: `/tasks/${taskId}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },

            success: function () {
                taskItem.remove();
            }
        });
    });

    $('#task-list').on('click', '.btn-warning', function () {

        const taskItem = $(this).closest('li');
        const taskId = taskItem.data('id');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: `/tasks/${taskId}/toggle`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },

            success: function (task) {

                const badge = taskItem.find('.badge');

                if (task.is_completed) {
                    badge
                        .removeClass('bg-secondary')
                        .addClass('bg-success')
                        .text('Completed');
                } else {
                    badge
                        .removeClass('bg-success')
                        .addClass('bg-secondary')
                        .text('Pending');
                }

            }
        });

    });
});
