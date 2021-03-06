@extends('layout')

@section('content')
    <!-- Styles -->
    <style>
        .request-type {
            font-weight: bold;
            display: inline-block;
            margin-right: 10px;
        }
        .request-get { color: darkgreen; }
        .request-post { color: darkblue; }
        .request-put { color: darkorange; }
        .request-delete { color: darkred; }
    </style>
    <h1>GriNotes API</h1>
    <hr />
    <h2>Authentication</h2>
    <p>
        Authentication token is in the headers:<br />
        access-token: {facebook-auth-token}
    </p>

    <hr />

    <h2>Metadata</h2>
    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-post">POST</span> 
        /metadata
    </h3>
    <p>Get or add metadata key-value pair</p>

    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-put">PUT</span> 
        <span class="request-type request-delete">DELETE</span> 
        /metadata/{metadata-key}
    </h3>
    <p>Manage metadata single key-value pair</p>

    <hr />
    <h2>Files</h2>
    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-post">POST</span> 
        /files
    </h3>
    <p>All user files. params: limit (50), offset (0)</p>

    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-put">PUT</span>
        <span class="request-type request-delete">DELETE</span>
        /files/{file-id}
    </h3>
    <p>User file data</p>

    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-post">POST</span> 
        /files/{file-id}/versions
    </h3>
    <p>User file all versions. params: limit (20), offset (0)</p>

    <h3>
        <span class="request-type request-get">GET</span>
        <span class="request-type request-delete">DELETE</span>
        /files/{file-id}/versions/{version-id}
    </h3>
    <p>User file data at specific version</p>
@endsection