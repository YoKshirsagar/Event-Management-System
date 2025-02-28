<div class="col-lg-12">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Form Title -->
            <?php if($_SESSION['login_user_type'] != 4): ?>
                <h3 class="text-center mb-4">New User</h3>
                <form id="userForm">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 border-right">
                            <div class="form-group">
                                <label for="name" class="control-label">First Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber" class="control-label">Phone Number</label>
                                <input type="text" name="phonenumber" id="phonenumber" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="category" class="control-label">Category</label>
                                <select name="category" id="category" class="form-control form-control-sm border border-dark rounded" required>
                                <?php if($_SESSION['login_user_type'] == 1): ?>
                                    <option value="1">Admin</option>
                                    <option value="2">Organizer</option>
                                <?php endif; ?>
                                    <option value="3" selected>Client</option>
                                    <option value="4">Attendee</option>
                                </select>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="control-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Buttons -->
                    <div class="col-lg-12 text-right justify-content-center d-flex">
                        <button type="submit" class="btn btn-primary mx-10" id="btnadd">Save</button>
                        <button class="btn btn-secondary mx-10" type="button" onclick="location.href = 'index.php?page=list_user'">Cancel</button>
                    </div>
                </form>
                <div id="responseMessage"></div> <!-- To show success or error messages -->
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form from submitting the traditional way

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: 'operations/insert.php',
                data: formData,
                success: function(response) {
                    if (response == 1) {
                        $('#responseMessage').html('<div class="alert alert-success">User added successfully!</div>');
                        $('#userForm')[0].reset(); // Reset the form
                    } else {
                        $('#responseMessage').html('<div class="alert alert-danger">Error: ' + response + '</div>');
                    }
                },
                error: function() {
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred while submitting the form.</div>');
                }
            });
        });
    });
</script>
