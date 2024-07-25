<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 style="text-align:center"><span class="text-success"><b>Contacts</b></span></h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                data-bs-target="#addContactModal">Add Contact</button>
        </div>
        <!-- search contact -->
        <!-- <div class="search-contact" style="width:280px; margin-left:450px; margin-top:150px">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search Contact" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div> -->
        <!-- display structure -->
        <div class="display-table">
            <table class="table table-dark table-striped" style=" margin-top:20px">
                <thead>
                    <tr>
                        <th scope="col">S. No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require '../connection.php';
                    $sql = "SELECT * FROM `contact_details`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = $result->fetch_array()) {
                            // $id = $row["id"];
                            // echo "$id";
                            ?>
                            <tr>
                                <th scope="row"><?= $count++ ?></th>
                                <td><?= $row['firstname'] ?>         <?= $row['lastname'] ?></td>
                                <td><?= $row['mobile'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary view" data-id="<?= $row['id']; ?>">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-primary delete" data-id="<?= $row['id']; ?>">
                                        Delete
                                    </button>
                                    <button type="button" class="btn btn-primary edit" data-id="<?= $row['id']; ?>">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- add modal -->
        <!-- Modal -->
        <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="" style="">
                            <div class=" form-group">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="First Name">

                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Last Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="Contact Number">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address">
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="save" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="" style="">
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="First Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Last Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="Contact Number">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address">
                            </div>
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary editContact">Edit
                            Contact</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- view modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact...</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="text-success"><b>Name</b></span> <br>

                                </li>
                                <li class="list-group-item"><span class="text-success"><b>Phone Number</b></span><br>

                                </li>
                                <li class="list-group-item"><span class="text-success"><b>Email Address</b></span> <br>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<script>

    $(document).ready(function () {
        $("#save").click(function (event) {
            // console.log($(this).serialize());
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'firstname=' + firstname + '&lastname=' + lastname + '&mobile=' + mobile + '&email=' + email;
            if (firstname == '' || lastname == '' || mobile == '' || email == '') {
                alert("All fields are mandetory");
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "../controller.php",
                    // data: "firstname=" + $(this).data('firstname') + "lastname=" + $(this).data('lastname') + "mobile" + $(this).data('mobile') + "email" + $(this).data('email') + '&mode=add',
                    data: dataString + '&mode=add',
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status == 1) {
                            alert(response.message);
                            location.reload();
                        }
                    }
                })
            }
        });

        $(".view").click(function () {
            $.ajax({
                type: "POST",
                url: "../controller.php",
                data: "id=" + $(this).data('id') + "&mode=view",
                success: function (data) {
                    var response = JSON.parse(data);
                    // console.log(response.data.firstname);
                    // $('.list-group-flush').html('');

                    $('.list-group-flush').html(`<li class="list-group-item"><span class="text-success"><b>Name</b><span><br>
                    ${response.data.firstname + ' ' + response.data.lastname}
                    </li>
                    <li class="list-group-item"><span class="text-success"><b>Phone Number</b></span><br>
                    ${response.data.mobile}
                    </li>
                    <li class="list-group-item"><span class="text-success"><b>Email Address</b></span> <br>
                    ${response.data.email}
                    </li>`)

                    $('#viewModal').modal('show');
                }
            })
        });

        $(".delete").click(function (event) {
            // alert($(this).data('id'));
            $.ajax({
                type: "POST",
                url: "../controller.php",
                data: "id=" + $(this).data('id') + "&mode=delete",
                success: function (data) {
                    // console.log(data);
                    var response = JSON.parse(data);
                    if (response.status == 1) {
                        location.reload();  //it is used to view the updated data on the display
                    }
                }
            })
        });

        $(".edit").click(function () {
            // alert($(this).data('id'));
            $.ajax({
                type: "POST",
                url: "../controller.php",
                data: "id=" + $(this).data('id') + "&mode=edit",
                success: function (data) {
                    var response = JSON.parse(data);
                    // console.log(response);
                    $('.modal-body').html(`
                    <input type="hidden" name="id" id="id" value="${response.data.id}"/>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="First Name" value="${response.data.firstname}" > 
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Last Name" value="${response.data.lastname}" >  
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="Contact Number" value="${response.data.mobile}">  
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address" value="${response.data.email}">  
                            </div>`)
                    $('#editModal').modal('show');

                }
            })
        });

        $(".editContact").click(function (event) {
            // console.log($(this).data('id'));
            var firstname = $('#editModal').find("#firstname").val();
            var lastname = $('#editModal').find("#lastname").val();
            var mobile = $('#editModal').find("#mobile").val();
            var email = $('#editModal').find("#email").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = '&firstname=' + firstname + '&lastname=' + lastname + '&mobile=' + mobile + '&email=' + email;
            $.ajax({
                type: "POST",
                url: "../controller.php",
                data: "id=" + $('#id').val() + dataString + '&mode=update',
                success: function (data) {
                    alert("Contact Updated");
                    location.reload();
                }
            })
        });

    });

</script>