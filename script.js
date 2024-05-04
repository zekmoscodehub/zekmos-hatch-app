// Function to create events in Google Calendar using API key
function createEventInGoogleCalendar(formData, apiKey) {
    // Extract form data values
    const dateLoaded = formData['dateLoaded'];
    let sendNotification = '';
    const eventData = {
        'summary': 'Egg Hatching Event',
        'description': 'Description of the egg hatching event.',
        'start': {
            'date': dateLoaded
        },
        'end': {
            'date': dateLoaded // For simplicity, end date same as start date
        }
    };

    // Construct the request URL with API key parameter
    const calendarId = 'primary'; // Use the primary calendar for simplicity
    const url = `https://www.googleapis.com/calendar/v3/calendars/${calendarId}/events?key=${apiKey}`;

    // Make a POST request to create the event
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(eventData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to create event in Google Calendar.');
        }
        console.log('Event created successfully in Google Calendar.');
    })
    .catch(error => {
        console.error('Error creating event in Google Calendar:', error);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    // Your API key
    const apiKey = 'AIzaSyAXTmbEdjccJtbOmGmYSCh1Os5m8I2jQOA';

    // Event listener for form submission
    eggForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        const formData = new FormData(eggForm); // Capture form data

        // Create events in Google Calendar
        createEventInGoogleCalendar(formData, apiKey); // Pass the API key here
    });
});
// Function to create events in Google Calendar using API key
function createEventInGoogleCalendar(formData, apiKey) {
    // Your Google Calendar event creation code
}

document.addEventListener("DOMContentLoaded", function() {
    const eggForm = document.getElementById("eggForm");
    const enteredList = document.getElementById("enteredList");

    // Function to handle form submission
    function handleFormSubmission(event) {
        event.preventDefault(); // Prevent form submission
        const formData = new FormData(eggForm); // Capture form data
        const formObject = {};
        formData.forEach((value, key) => {
            formObject[key] = value;
        });

      

        // Create events in Google Calendar
        createEventInGoogleCalendar(formObject);

        // Send notification to user about the status of eggs loaded
        sendNotification("Egg Hatching Status", "Your eggs have been successfully loaded.");

        // Display the submitted data in the entered list
        displayEnteredData(formObject);

        // Reset the form after submission if needed
        eggForm.reset();

        // Send form data to server-side script for database insertion
        sendDataToServer(formObject);
    }

    // Add event listener for form submission
    eggForm.addEventListener("submit", handleFormSubmission);

    // Your other event listeners and functions
});
