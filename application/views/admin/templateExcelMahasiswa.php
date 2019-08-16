<!DOCTYPE html>
<html lang="en" xmlns:x="urn:schemas-microsoft-com:office:excel">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    Template Data Mahasiswa
                    <x:WorksheetOptions>
                        <x:Panes>
                        </x:Panes>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <title>Template Data Mahasiswa</title>

</head>

<body>
    <style type="text/css">
        table thead tr th,
        table tbody tr td {
            font-family: 'Calibri', sans-serif;
            color: black;
            font-size: 16px;
            text-align: center;
            border: 0.5px solid black;
        }

        table {
            border: 0.5px solid black;
        }
    </style>

    <?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Mahasiswa.xls");
    ?>

    <table class="table table-report text-wrap">
        <thead class="text-center">
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jenjang</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>Semester</th>
                <th>Jalur</th>
                <th>Konsentrasi</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Asal Studi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</body>

</html>