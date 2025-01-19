    // Confirm delete action
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", event => {
            if (!confirm("Are you sure you want to delete this record?")) {
                event.preventDefault();
            }
        });
    });