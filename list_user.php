<?php 
    include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Font Awesome (Using CDN instead of kit) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS (Optional for better styling) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>

<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-primary btn-flat" href="./index.php?page=new_user">
                    <i class="fa fa-plus"></i> Add New User
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sortableTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" onclick="sortTable(0)">#</th>
                            <th onclick="sortTable(1)">Name</th>
                            <th onclick="sortTable(2)">Email</th>
                            <th onclick="sortTable(3)">Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $type = array('', "Admin", "Organizer", "Client", "Attendee");
                            if ($_SESSION['login_user_type'] == 1) {
                                $qry = $conn->query("SELECT * FROM users_database");
                            } else if ($_SESSION['login_user_type'] == 2) {
                                $qry = $conn->query("SELECT * FROM users_database WHERE user_type = 3 OR user_type = 4");
                            } else if ($_SESSION['login_user_type'] == 3) {
                                $qry = $conn->query("SELECT * FROM users_database WHERE user_type = 4");
                            }
                        ?>
                        <?php while ($row = $qry->fetch_assoc()): ?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td><b><?php echo ucwords($row['name']) ?></b></td>
                            <td><b><?php echo $row['email'] ?></b></td>
                            <td><b><?php echo $type[$row['user_type']] ?></b></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger delete_user" 
                                    data-id="<?php echo $row['user_id'] ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Event delegation for dynamically generated elements
    $(document).on('click', '.delete_user', function() {
        var userId = $(this).data('id');
        
        // Confirm deletion
        if (confirm("Are you sure you want to delete this user?")) {
            delete_user(userId);
        }
    });
});

function delete_user(userId) {
    $.ajax({
        url: 'delete_user.php',
        method: 'POST',
        data: {
            id: userId
        },
        success: function(resp) {
            console.log("Server response: " + resp);
            if (resp == 1) {
                alert("User successfully deleted.");
                location.reload(); // Reload the page to see changes
            } else {
                alert("Failed to delete user. Please try again.");
            }
        },
        error: function() {
            alert("An error occurred. Please check your internet connection or try again later.");
        }
    });
}

// Sorting functionality
function sortTable(columnIndex) {
    const table = document.getElementById("sortableTable");
    const rows = Array.from(table.rows).slice(1); // Exclude the header row
    const isAscending = table.getAttribute(`data-sort-${columnIndex}`) !== "asc";

    rows.sort((a, b) => {
        const cellA = a.cells[columnIndex].innerText.trim().toLowerCase();
        const cellB = b.cells[columnIndex].innerText.trim().toLowerCase();

        if (cellA < cellB) return isAscending ? -1 : 1;
        if (cellA > cellB) return isAscending ? 1 : -1;
        return 0;
    });

    rows.forEach(row => table.tBodies[0].appendChild(row));

    // Toggle sort direction
    table.setAttribute(`data-sort-${columnIndex}`, isAscending ? "asc" : "desc");
}
</script>

</body>
</html>
