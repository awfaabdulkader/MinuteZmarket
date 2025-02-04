document.addEventListener('DOMContentLoaded', function () {
    const deleteForm = document.getElementById('deleteForm');
    const confirmDeleteButton = document.getElementById('confirmDeleteButton');

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const action = button.getAttribute('data-action');
            deleteForm.setAttribute('action', action);
        });
    });

    confirmDeleteButton.addEventListener('click', function () {
        deleteForm.submit();
    });
});
