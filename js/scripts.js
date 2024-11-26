const selectAllCheckbox = document.getElementById('select-all');
const checkboxes = document.querySelectorAll('.checkbox-container .item');

selectAllCheckbox.addEventListener('change', function() {
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
        checkbox.dispatchEvent(new Event('change'));
    });
});
