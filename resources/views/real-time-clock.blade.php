<!-- resources/views/real-time-clock.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Clock</title>
</head>
<body>

<h1>Real-Time Clock (Philippines): <span id="real-time-clock"></span></h1>

<script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
<script>
    function updateClock() {
        fetch('/real-time-clock')
            .then(response => response.json())
            .then(data => {
                // Adjusting for the timezone offset
                const adjustedTime = moment(data.time).utcOffset(data.utc_offset / 60).format('YYYY-MM-DD HH:mm:ss');
                document.getElementById('real-time-clock').innerText = adjustedTime;

                // Call the updateClock function again after 1000ms (1 second)
                setTimeout(updateClock, 1000);

                // Check if it's time to update the database
                fetch('/update-data-if-needed')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Database updated!');
                        } else {
                            console.log('No database update needed.');
                        }
                    })
                    .catch(error => {
                        console.error('Failed to update database:', error);
                    });
            })
            .catch(error => {
                console.error('Failed to fetch real-time:', error);

                // Retry fetching after 1000ms (1 second) in case of an error
                setTimeout(updateClock, 1000);
            });
    }

    // Initial call to start the real-time clock
    updateClock();

</script>

</body>
</html>
