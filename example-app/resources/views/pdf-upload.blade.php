<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Display PDF</title>
</head>
<body>
    <h1>Upload a PDF file</h1>

    <!-- Form to upload PDF -->
    <form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdf_file" accept="application/pdf">
        <button type="submit">Upload PDF</button>
    </form>

    <!-- Display errors if any -->
    @if($errors->any())
        <div>
            <strong>Error:</strong> {{ $errors->first() }}
        </div>
    @endif

    <!-- Display the uploaded PDF -->
    @if(isset($pdfPath))
        <h2>Uploaded PDF:</h2>
        <iframe src="{{ asset('storage/' . $pdfPath) }}" width="1300" height="500"></iframe>
    @endif
</body>
</html>
