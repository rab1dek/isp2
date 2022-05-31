<!DOCTYPE html>
<html>
<head>
    <title>Spotify Data Import</title>
</head>
    <body>
        <h1>Spotify Data Import</h1>
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="csv_file">Spotify File</label> <br>
            <input type="file" name="csv_file" id="csv_file"/><br><br>

            <button type="submit">Upload</button>
</form>
    </body>
    </html>
