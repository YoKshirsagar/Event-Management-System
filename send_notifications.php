<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f9;
    min-height: 100vh;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.email-container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 600px;
    padding: 20px;
    box-sizing: border-box;
    margin: 20px auto;
}

.email-container h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    position: relative;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-group select,
.form-group input,
.form-group textarea,
.form-group button {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    box-sizing: border-box;
}

.form-group textarea {
    resize: none;
    height: 120px;
}

.form-group button {
    background-color: rgb(11, 162, 112);
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border: none;
}

.form-group button:hover {
    background-color: rgb(11, 150, 100);
}

.form-group .error {
    color: red;
    font-size: 0.9rem;
    margin-top: 5px;
}

#status {
    text-align: center;
    margin-top: 10px;
}

@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    .email-container {
        padding: 15px;
    }

    .form-group button {
        font-size: 0.9rem;
        padding: 10px;
    }
}
</style>
<?php include "db_connect.php"; ?>
<div class="email-container">
    <form id="email-form">
        <h2>Send Email</h2>
        <div class="form-group">
            <label for="recipient">Select Recipient</label>
            <?php 
                if($_SESSION['login_user_type']==1){
                    $sql = "SELECT * FROM users_database WHERE user_type = 2";
                }else if($_SESSION['login_user_type']==2){
                    $sql = "SELECT * FROM users_database WHERE user_type = 3";
                }else if($_SESSION['login_user_type']==3){
                    $sql = "SELECT * FROM users_database WHERE user_type = 4";
                }
                $result = $conn->query($sql);
            ?>
            <select name="recipient" id="recipient" required>
                <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['email']; ?>"> <?php echo $row['name']; ?></option>
                <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" placeholder="Enter email subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" placeholder="Enter your message" required></textarea>
        </div>
        <div class="form-group">
            <button type="button" onclick="sendEmail()">Send Email</button>
        </div>
        <div id="status" class="form-group"></div>
    </form>
</div>

<script>
function sendEmail() {
    const recipient = document.getElementById('recipient').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    const statusDiv = document.getElementById('status');
    statusDiv.innerHTML = `<p style="color: green;">Sending Email</p>`;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_email.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        const statusDiv = document.getElementById('status');
        if (xhr.status === 200) {
            statusDiv.innerHTML = `<p style="color: green;">${xhr.responseText}</p>`;
        } else {
            statusDiv.innerHTML = `<p style="color: red;">Failed to send email. Try again.</p>`;
        }
    };

    const data =
        `recipient=${encodeURIComponent(recipient)}&subject=${encodeURIComponent(subject)}&message=${encodeURIComponent(message)}`;
    xhr.send(data);
}
</script>