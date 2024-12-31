<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Shortener</title>
</head>

<body>
    <h1>Encodes a URL to a shortened URL</h1>
    <form action="{{ route('url.encode') }}" method="post">
        @csrf
        <label for="url">Enter URL:</label>
        <input type="text" name="url" id="url" required>
        <button type="submit">Shorten URL</button>
    </form>
    </br>
    <h1>Decodes a shortened URL to its original URL</h1>
    <form action="{{ route('url.decode') }}" method="post">
        @csrf
        <label for="url">Enter URL:</label>
        <input type="text" name="url" id="url" required>
        <button type="submit">Original URL</button>
    </form>
</body>

</html>
