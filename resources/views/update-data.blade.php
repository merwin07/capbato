<!-- resources/views/update-data.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>

<form id="updateForm">
    <label for="datepicker">Select Date:</label>
    <input type="text" id="datepicker" name="datepicker">

    <!-- Add other input fields for your data -->

    <button type="button" onclick="submitForm()">Update Data</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#datepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    function submitForm() {
        const formData = new FormData(document.getElementById('updateForm'));

        fetch('/update-data', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log('Data updated:', data);
        })
        .catch(error => {
            console.error('Failed to update data:', error);
        });
    }

    // Set up a timer to automatically submit the form every minute
    setInterval(submitForm, 60000);
</script>

</body>
</html>
    