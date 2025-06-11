<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <!-- buttons -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdn.datatables.net/plug-ins/1.10.24/dataRender/datetime.js"></script>
</head>

<body>
    <br /><br />
    <div class="container">
        <h1 align="center">
            </h3><br />
            <h3 align="center"></h3><br />
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>pdv</th>
                        <th>Nome Fantasia</th>
                        <th>Contatos</th>
                        <th>Data do envio</th>
                    </tr>
                </thead>
            </table>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $('#myTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            "ajax": "https://app-bot-wpp-production.up.railway.app/api/read.php",
            "columns": [
                {
                    "data": "pdv"
                },
                {
                    "data": "nome_fantasia"
                },
                {
                    "data": "contatos"
                },
                {
                    "data": "created",
                }
            ],
            columnDefs: [{
                targets: 3,
                render: function(data) {
                    return moment(data).format('DD/MM/YYYY HH:mm:ss');
                }
            }]
        });

    });
</script>