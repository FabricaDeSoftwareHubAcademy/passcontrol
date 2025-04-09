document.addEventListener("DOMContentLoaded", function () {
    const selectAllCheckbox = document.getElementById("select-all");
    const checkboxes = document.querySelectorAll(".item");

    selectAllCheckbox.addEventListener("change", function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            if (!checkbox.checked) {
                selectAllCheckbox.checked = false;
            } else if (document.querySelectorAll(".item:checked").length === checkboxes.length) {
                selectAllCheckbox.checked = true;
            }
        });
    });
});