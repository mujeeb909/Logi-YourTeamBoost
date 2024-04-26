<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        .svg {
            height: 1.5rem; /* Adjust the height of the icon as needed */
            width: auto; /* Let the width adjust automatically */
            margin-left: 0.5rem; /* Adjust the spacing between the link and icon */
            vertical-align: middle; /* Align the icon vertically with text */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
    </style>
</head>
<body class="bg-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center text-white">
        <h1 class="text-5xl font-bold mb-8 animate-pulse">Coach Registered Successfully!</h1>
        <p class="text-lg mb-8">
            Players can now use the provided QR code to register. <br>
            Alternatively, you can send this link to your players to register: 
            <div class="flex items-center">
                <a href="{{$link}}" class="text-blue-400 underline mr-2">{{$link}}</a>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="copyToClipboard()">Copy</button>
            </div>
            
        </p>
        <br><br>
        <div class="row">
            <div class="col-md-2">
                <a href="" id="container" style="border-radius: 10px;" >{{$qrcode}}</a><br/>
            </div>
        </div>
        <br>
        <a href="{{ route('home') }}" class="btn py-2 px-3" style="background-color: #FF6F0F;">Go Home</a>
    </div>

    <script>
        function copyToClipboard() {
            var dummy = document.createElement("input");
            document.body.appendChild(dummy);
            dummy.setAttribute("value", "{{$link}}");
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            alert("Link copied to clipboard");
        }
    </script>
</body>
</html>
