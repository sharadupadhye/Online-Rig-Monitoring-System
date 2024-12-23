
<style>
        #status {
            padding: 10px;
            background-color: #f44336;
            color: white;
            text-align: center;
            display: none; /* Initially hidden */
            position: fixed; /* Fix it so it doesn't move the whole page */
            top: 0;
            left: 50%;
            transform: translateX(-50%); /* Center the message */
            z-index: 9999; /* Ensure it's on top of other content */
        }
        .offline {
            background-color: #f44336; /* Red background for offline */
            animation: pulse 1.5s ease-in-out infinite, move 2s ease-in-out infinite alternate;
        }

        @keyframes pulse {
            0% {
                font-size: 16px;
            }
            50% {
                font-size: 24px;
            }
            100% {
                font-size: 16px;
            }
        }

        @keyframes move {
            0% {
                transform: translateX(-50%) translateY(0);
            }
            100% {
                transform: translateX(-50%) translateY(10px);
            }
        }
    </style>


    <div id="status">You are online</div>

    <script>
        function updateOnlineStatus() {
            const statusDiv = document.getElementById('status');
            
            if (navigator.onLine) {
                statusDiv.textContent = "You are online";
                statusDiv.classList.remove('offline');
                statusDiv.style.display = 'block'; // Show the message

                // Hide the message after 3 seconds
                setTimeout(() => {
                    statusDiv.style.display = 'none';
                }, 3000);
            } else {
                statusDiv.textContent = "You are offline";
                statusDiv.classList.add('offline');
                statusDiv.style.display = 'block'; // Show the message and keep it visible
            }
        }

        // Check status on load
        updateOnlineStatus();

        // Listen for connection status changes
        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);
    </script>


