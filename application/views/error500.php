<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 500</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="<?= base_url('assets/') ?>css/custom/error.css" rel="stylesheet">
</head>

<body>
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="error-500">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-bold text-404">500</h1>
                    <!-- <h1 class="font-weight-bold text-uppercase text-error mb-5">error</h1> -->
                    <h4 class="lead text-error mb-4">Maaf, sedang terjadi kerusakan internal</h4>
                    <a href="<?= base_url(); ?>" class="btn btn-light"><i class="fas fa-home"></i> Back to
                        dashboard</a>
                </div>
            </div>
        </div>
    </header>
    <script src="https://kit.fontawesome.com/9a93c12b0e.js"></script>
</body>

</html>