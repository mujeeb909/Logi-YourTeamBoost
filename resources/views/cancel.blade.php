<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failed Payment</title>
    <!-- Add your CSS and JavaScript libraries if needed -->
</head>
<body>
    <script>
        // Display congratulations message as a popup
        alert('Opps! Your payment was not successful.');
        // Redirect to the homepage after a short delay
        setTimeout(function() {
            window.location.href = "{{ route('home') }}"; // Replace 'home' with the actual route name for your homepage
        }, 3000); // Redirect after 3 seconds (adjust as needed)
    </script>
</body>
</html>
