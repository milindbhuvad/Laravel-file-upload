<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
</head>
<body>
    <div class="container">
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Choose file to upload</label>
                    <input type="file" class="form-control" name="file" id="file">
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="/files-upload" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Choose multiple files to upload</label>
                    <input type="file" class="form-control" name="files[]" id="file" multiple>
                    <span class="text-danger">{{ $errors->first('files') }}</span>
                    <span class="text-danger">{{ $errors->first('files.*') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Multiple Upload</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>