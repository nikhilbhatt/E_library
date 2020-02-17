<!DOCTYPE html>
<html lang="en" style="height:100%;">
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] == 'admin')
    require "views/users/navbar.admin.view.php";

else if ($_SESSION['user_type'] == 'reader')
    require "views/users/navbar.reader.view.php";
$list = $app['database']->userList('reader'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reader's List</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="Resources/CSS/searchbar.css">
    <link rel="stylesheet" href="Resources/CSS/floating button.css">
    <link rel="stylesheet" href="Resources/CSS/footer.css">

</head>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<body style="background-color: rgba(101,157,189,0.4);height:100%;">
    <div id="content" class="p-4 p-md-5 pt-5 h-100" style="padding-right:6rem; font-family: 'Open Sans', sans-serif;">
        <div class="searchbar mr-4" style="float: right; max-width:100%;">
            <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>

        <h2 class="mb-5 font-weight-bolder " style="color: darkcyan;font-size:45px; margin-left:30px;"><?= "Our Visitors"  ?> </h2>


        <div class="table-responsive">
            <table class="table mx-auto" style="max-width:95.5%; background-color:rgba(101,157,189,0.4);" id="myTable">
                <thead class="thead" style="background-color:darkcyan !important;">
                    <tr style="color:white;">
                        <th scope="col" style="padding-left:50px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>

                        <th scope="col">Created On</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) : ?>
                        <tr>
                            <th scope="row" style="padding-left:50px;"><?php echo $i++; ?></th>
                            <td><?php echo ($row['name']); ?></td>
                            <td><?php echo ($row['email']); ?></td>

                            <td><?php echo ($row['registration_date']); ?></td>
                            <td><a href="#" data-toggle="modal" data-target="#userdeletemodal<?= $i ?>" class="card-link" style="color:red;">Block user
                                    <div class="modal fade" id="userdeletemodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="background-color:rgba(21,32,43,1);">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel2" style="color: white;font-weight:bold;">Remove user</h5>

                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#1d96e1;">User will no longer be able to access E_Library. </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                                                    <a href="/deleteuser?id=<?php echo $row['id']; ?>" id="exit" class="btn btn-danger">Delete</a>
                                                </div>

                                            </div>
                                        </div>



                                </a></td>

                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
    <?php require "Resources/partials/footer.php" ?>

</body>



</html>