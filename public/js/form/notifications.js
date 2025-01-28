document.addEventListener("DOMContentLoaded", function() {

    const deleteButtons = document.querySelectorAll('.notification .delete');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const notification = button.closest('.notification');
            notification.remove();
        });
    });
});

