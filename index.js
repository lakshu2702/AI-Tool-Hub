document.addEventListener("DOMContentLoaded", () => { 
    // Wait until the DOM content is fully loaded before running the script

    const messagesContainer = document.getElementById('messages');
    // Select the element where messages (user and bot) will be displayed

    const sendButton = document.getElementById('send-button');
    // Select the 'Send' button

    let csvData = [];
    // Initialize an empty array to store CSV data

    // Load CSV data using fetch API
    fetch('data.csv')
        .then(response => {
            if (!response.ok) {
                // Check if the fetch request was successful
                throw new Error('Network response was not ok');
                // If not, throw an error
            }
            return response.text();
            // Return the text data from the response
        })
        .then(data => {
            console.log("CSV Data Loaded: ", data); // Debugging log to check if CSV data is loaded

            const rows = data.trim().split('\n').slice(1);
            // Split CSV data into rows, skip the header row using slice(1)

            for (const row of rows) {
                const columns = row.split(',');
                // Split each row by commas to extract columns

                if (columns.length === 2) {
                    csvData.push({
                        question: columns[0].trim(),
                        answer: columns[1].trim()
                    });
                    // Push each row as a question-answer object into the csvData array
                }
            }
        })
        .catch(error => console.error('Fetch operation problem:', error));
        // Handle fetch errors and log them to the console

    // Function to send a message and trigger the bot's response
    function sendMessage() {
        console.log("Send Message Function Called"); // Debug log to indicate function call

        const inputField = document.getElementById('input');
        // Get the input field where the user types their message

        const input = inputField.value.trim();
        // Get and trim the user input

        inputField.value = ''; // Clear the input field after capturing the message

        if (input === '') return;
        // If the input is empty, exit the function

        // Create a div for the user's message and append it to the messages container
        let userDiv = document.createElement("div");
        userDiv.id = "user";
        userDiv.className = "user response";
        userDiv.innerHTML = `<img src="user.png" class="avatar"><span>${input}</span>`;
        messagesContainer.appendChild(userDiv);

        // Create a bot typing indicator and append it to the messages container
        let botDiv = document.createElement("div");
        let botText = document.createElement("span");
        let botIcon = document.createElement("img");

        botIcon.src = "bot-mini.png"; // Source for bot icon image
        botIcon.className = "bot-icon"; // Add class for bot icon styling

        botDiv.id = "bot";
        botDiv.className = "bot response";
        botText.innerText = "Typing..."; // Display "Typing..." before bot sends a real response

        botDiv.appendChild(botIcon);
        botDiv.appendChild(botText);
        messagesContainer.appendChild(botDiv);

        // Scroll to the bottom of the message container
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // Simulate a delay before the bot's response
        setTimeout(() => {
            let response = getResponse(input); // Get the bot's response based on user input
            botText.innerText = response; // Update the bot's message with the actual response
        }, 2000); // 2-second delay for realism
    }

    // Function to retrieve the bot's response based on user input
    function getResponse(input) {
        for (let row of csvData) {
            // Iterate over each question-answer pair in csvData
            if (input.toLowerCase() === row.question.toLowerCase()) {
                // If the user's input matches the question (case-insensitive)
                return row.answer;
                // Return the corresponding answer
            }
        }
        // If no match is found, return a default response
        return "Sorry, I did not understand that. Can you please type the question correctly?";
    }

    // Event listener for 'Enter' key press to send the message
    document.getElementById('input').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // If 'Enter' is pressed
            event.preventDefault();
            // Prevent the default form submission behavior
            sendMessage();
            // Call the sendMessage function
        }
    });

    // Event listener for the Send button click
    sendButton.addEventListener('click', sendMessage);
    // Call sendMessage function when the send button is clicked
});