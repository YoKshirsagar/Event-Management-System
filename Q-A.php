<div class="chat-container">
    <div class="chat-header">
        CHAT / Q & A
    </div>
    <div class="chat-box" id="chat-box">
        <!-- Messages will be loaded here -->
    </div>
    <div class="chat-input">
        <input type="text" id="message" placeholder="Type a message..." onkeydown="handleEnter(event)" />
        <button id="send-button" onclick="sendMessage()">Send</button>
    </div>
</div>

<style>
    /* Your existing styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f8ff;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
        max-width: 800px;
        margin: auto;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .chat-header {
        background: linear-gradient(90deg, #25d366, #128c7e);
        padding: 20px;
        text-align: center;
        color: white;
        font-size: 1.8rem;
        font-weight: bold;
    }

    .chat-box {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background-color: #f9f9f9;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    .chat-box .message {
        margin: 10px 0;
        padding: 10px 15px;
        border-radius: 15px;
        max-width: 75%;
        font-size: 1rem;
    }

    .chat-box .message.sent {
        margin-left: auto;
        background-color: #dcf8c6;
        color: #333;
    }

    .chat-box .message.received {
        margin-right: auto;
        background-color: #e6e6e6;
        color: #333;
    }

    .chat-input {
        display: flex;
        padding: 15px;
        background-color: #ffffff;
        border-top: 1px solid #ddd;
    }

    .chat-input input {
        flex: 1;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 25px;
        font-size: 1rem;
        margin-right: 10px;
    }

    .chat-input button {
        background: linear-gradient(90deg, #25d366, #128c7e);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .chat-input button:hover {
        background: #075e54;
    }

    /* Scrollbar styling */
    .chat-box::-webkit-scrollbar {
        width: 8px;
    }

    .chat-box::-webkit-scrollbar-thumb {
        background-color: #25d366;
        border-radius: 10px;
    }

    .chat-box::-webkit-scrollbar-thumb:hover {
        background-color: #128c7e;
    }
</style>

<script>

// Fetch messages every 2 seconds
setInterval(fetchMessages, 2000);

function fetchMessages() {
    const chatBox = document.getElementById('chat-box');
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "operations/fetch_messages.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            chatBox.innerHTML = xhr.responseText;
            chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
        }
    };
    xhr.send();
}

function sendMessage() {
    const messageInput = document.getElementById('message');
    const sendButton = document.getElementById('send-button');
    const message = messageInput.value.trim();

    if (message === '') return; // Prevent empty messages

    // Disable the send button to prevent multiple submissions
    sendButton.disabled = true;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "operations/send_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            messageInput.value = ''; // Clear the input field
            fetchMessages(); // Refresh messages
            sendButton.disabled = false; // Re-enable the send button
        }
    };
    xhr.send("message=" + encodeURIComponent(message));
}

function handleEnter(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}
</script>