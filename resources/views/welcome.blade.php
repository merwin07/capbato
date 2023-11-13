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
                const serverTime = new Date(data.time);
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    timeZone: 'Asia/Manila',
                };
                const formattedTime = serverTime.toLocaleString('en-US', options);
                document.getElementById('real-time-clock').innerText = formattedTime;

                // Call the updateClock function again after 1000ms (1 second)
                setTimeout(updateClock, 1000);
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
