<!DOCTYPE html>
<html>

<head>
    <title>DataTables with Buttons</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables library -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <table id="your-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i < 20; $i++) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>John Doe <?= $i ?></td>
                    <td><button class="your-button-class">Delete</button></td>
                </tr>
            <?php } ?>
            <!-- Add more table rows here -->
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#your-table').DataTable({
                // DataTables configuration options
                "initComplete": function(settings, json) {
                    // Add event delegation for button clicks
                    $('#your-table').on('click', '.your-button-class', function() {
                        // Handle button click
                        var rowData = $(this).closest('tr').find('td:not(:last-child)').map(function() {
                            return $(this).text();
                        }).get();
                        // Perform the necessary action
                        console.log("Button clicked for row:", rowData);
                    });
                },
                "drawCallback": function(settings) {
                    // Rebind event handlers after the table is updated
                    $('#your-table .your-button-class').off('click').on('click', function() {
                        // Handle button click
                        var rowData = $(this).closest('tr').find('td:not(:last-child)').map(function() {
                            return $(this).text();
                        }).get();
                        // Perform the necessary action
                        console.log("Button clicked for row:", rowData);
                    });
                }
            });
        });
    </script>
</body>

</html>
