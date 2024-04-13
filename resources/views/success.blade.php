<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    
</head>
<body>
    
    <script>
        // Display congratulations message as a popup
        alert('Congratulations! Your payment was successful.');
        // Redirect to the homepage after a short delay
        @if ($user && $coach->social_link)
            // If user has social_link, redirect to that URL
            setTimeout(function() {
                window.location.href = "{{ $coach->social_link }}";
            }, 1000);
        @else
            // If social_link is null or user is null, redirect to the homepage
            setTimeout(function() {
                window.location.href = "{{ route('home') }}"; 
            }, 1000);
        @endif
        
    </script>

</body>
</html>
