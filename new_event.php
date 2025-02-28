<div class="col-lg-12">
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Form Title -->
            <?php if ($_SESSION['login_user_id'] == 1 || $_SESSION['login_user_id'] == 2): ?>
                <h3 class="text-center mb-4">New Event</h3>
                <form id="eventForm">
                <?php
                    // Include database connection
                    include('db_connect.php');

                    // Fetch all organizers from the database
                    $organizerQuery = "SELECT user_id, name FROM users_database WHERE user_type = 2"; // Assuming user_type = 1 is for organizers
                    $organizerResult = mysqli_query($conn, $organizerQuery);

                    // Fetch all clients from the database
                    $clientQuery = "SELECT user_id, name FROM users_database WHERE user_type = 3"; // Assuming user_type = 3 is for clients
                    $clientResult = mysqli_query($conn, $clientQuery);
                ?>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 border-right">
                            <div class="form-group">
                                <label for="eventname" class="control-label">Event Name</label>
                                <input type="text" name="eventname" id="eventname" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="eventtype" class="control-label">Event Type</label>
                                <select name="eventtype" id="eventtype" class="form-control form-control-sm border border-dark rounded" required>
                                    <option value="1">Conference</option>
                                    <option value="2">Seminar</option>
                                    <option value="3">Workshop</option>
                                    <option value="4">Webinar</option>
                                    <option value="5">Festival</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eventorganizerid" class="control-label">Event Organizer</label>
                                <select name="eventorganizerid" id="eventorganizerid" class="form-control form-control-sm border border-dark rounded" required>
                                    <!-- Fetching organizers from the database -->
                                    <?php if ($_SESSION['login_user_id'] == 2): ?>
                                        <option value="<?php echo $_SESSION['login_user_id']; ?>"><?php echo $_SESSION['login_name']; ?></option>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['login_user_id'] != 2): ?>
                                        <?php while ($organizer = mysqli_fetch_assoc($organizerResult)): ?>
                                            <option value="<?php echo $organizer['user_id']; ?>"><?php echo $organizer['name']; ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eventclientid" class="control-label">Event Client</label>
                                <select name="eventclientid" id="eventclientid" class="form-control form-control-sm border border-dark rounded" required>
                                    <!-- Fetching clients from the database -->
                                    <?php while ($client = mysqli_fetch_assoc($clientResult)): ?>
                                        <option value="<?php echo $client['user_id']; ?>"><?php echo $client['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <!-- Event Completed Dropdown -->
                            <div class="form-group">
                                <label for="eventcompleted" class="control-label">Event Completed</label>
                                <select name="eventcompleted" id="eventcompleted" class="form-control form-control-sm border border-dark rounded" disabled>
                                    <option value="true">True</option>
                                    <option value="false" selected>False</option>
                                </select>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="eventphotos" class="control-label">Event Photos</label>
                                <input type="file" name="eventphotos[]" id="eventphotos" class="form-control form-control-sm border border-dark rounded" multiple>
                            </div>
                            <div class="form-group">
                                <label for="eventdate" class="control-label">Event Date</label>
                                <input type="date" name="eventdate" id="eventdate" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="eventticketsellcount" class="control-label">Event Ticket Sell Count</label>
                                <input type="number" name="eventticketsellcount" id="eventticketsellcount" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="eventtotalearning" class="control-label">Event Total Earning</label>
                                <input type="number" name="eventtotalearning" id="eventtotalearning" class="form-control form-control-sm border border-dark rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="eventcompletepercentage" class="control-label">Event Completion Percentage</label>
                                <input type="number" name="eventcompletepercentage" id="eventcompletepercentage" class="form-control form-control-sm border border-dark rounded" required min="0" max="100">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Buttons -->
                    <div class="col-lg-12 text-right justify-content-center d-flex">
                        <button type="submit" class="btn btn-primary mx-10" id="btnadd">Save</button>
                        <button class="btn btn-secondary mx-10" type="button" onclick="location.href = 'index.php?page=list_event'">Cancel</button>
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
        $('#eventcompletepercentage').on('input', function() {
            var eventCompletePercentage = $(this).val();
            if (eventCompletePercentage > 100) {
                $('#eventcompletepercentage').val('100'); // Set the 'Event Completed' dropdown to 'True' if percentage is 100
            }
            eventCompletePercentage = $(this).val();
            if (eventCompletePercentage == 100) {
                $('#eventcompleted').val('true'); // Set the 'Event Completed' dropdown to 'True' if percentage is 100
            } else {
                $('#eventcompleted').val('false'); // Set the 'Event Completed' dropdown to 'False' otherwise
            }

        });

        $('#eventForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form from submitting the traditional way

            var formData = new FormData(this); // Serialize form data, including files

            $.ajax({
                type: 'POST',
                url: 'operations/insert_event.php',
                data: formData,
                processData: false, // Required for file uploads
                contentType: false, // Required for file uploads
                success: function(response) {
                    if (response == 1) {
                        $('#responseMessage').html('<div class="alert alert-success">Event added successfully!</div>');
                        $('#eventForm')[0].reset(); // Reset the form
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
