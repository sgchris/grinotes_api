<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Grinotes API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Open Sans', sans-serif;
                margin: 0;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>GriNotes API</h1>
        <hr />
        <h2>Authentication</h2>
        <p>
            Authentication token is in the headers:<br />
            access-token: {facebook-auth-token}
        </p>
        
        <h2>/files</h2>
        <p>All user files. params: limit (50), offset (0)</p>

        <h2>/files/{file-id}</h2>
        <p>User file data</p>

        <h2>/files/{file-id}/versions</h2>
        <p>User file all versions. params: limit (20), offset (0)</p>

        <h2>/files/{file-id}/versions/{version-id}</h2>
        <p>User file data at specific version</p>
    </body>
</html>
