<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <div class="container">
        <h1 class="text-center my-4">Generate Users</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <form action="download.php" method="post">
                        <div class="mb-3">
                            <label for="count" class="form-label">Number of Users:</label>
                            <input type="number" id="count" name="count" min="1" max="100" value="5" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="format" class="form-label">Download Format:</label>
                            <select id="format" name="format" class="form-select">
                                <option value="html">HTML</option>
                                <option value="md">Markdown</option>
                                <option value="json">JSON</option>
                                <option value="txt">Text</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
