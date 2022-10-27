<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css" />


    <title>PHP OOP AJAX DATATABLES SELECT FILTER</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">PHP OOP AJAX DATATABLES SELECT FILTER</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <div class="row">
                    <div class="col-md-12 mt-3 mb-3">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless" id="record_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Names</th>
                                        <th>Standard</th>
                                        <th>Percentage</th>
                                        <th>Result</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>

    <!-- Moment Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script>

    function fetch(std, res) {
        $.ajax({
            url: "records.php",
            type: "post",
            data: {
                std: std,
                res: res
            },
            dataType: "json",
            success: function(data) {
                var i = 1;
                $('#record_table').DataTable({
                    "data": data,
                    "responsive": true,
                    "columns": [{
                            "data": "id",
                            
                        },
                        {
                            "data": "NOM",
                            
                        },
                        {
                            "data": "MAIL",
                            
                        },
                        {
                            "data": "FILIERE",
                           
                        },
                        {
                            "data": "ECOLE"
                        },
                        {
                            "data": "DATE",
                            "render": function(data, type, row, meta) {
                                return moment(row.created_at).format('DD-MM-YYYY');
                            }
                        }
                    ]
                });
            }
        });
    }
    fetch();

    // Filter


    </script>
</body>

</html>