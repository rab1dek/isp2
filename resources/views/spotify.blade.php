<!DOCTYPE html>
<html>
<head>
    <title>Spotify Data Import</title>
</head>
    <body>
        <h1>Spotify Data Import</h1>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="csv_file">Spotify File</label> <br>
            <input type="file" name="csv_file" id="csv_file"/><br><br>

            <button type="submit">Upload</button>
</form>
    </body>
    <br>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Position</th>
                <th>Track Name</th>
                <th>Artist</th>
                <th>Streams</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spotify as $spoticsv)
            <tr>
                <td>{{ $spoticsv->Position }}</td>
                <td>{{ $spoticsv->{'Track Name'} }}</td>
                <td>{{ $spoticsv->Artist }}</td>
                <td>{{ $spoticsv->Streams }}</td>
                <td>{{ $spoticsv->Date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $spotify->links() }}
    </html>
