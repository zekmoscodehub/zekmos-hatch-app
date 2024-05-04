<?php
require_once 'vendor/autoload.php'; // Include Google API Client Library

function reminder($dateLoaded, $lockdownDate) {
    // Initialize Google Client
    $client = new Google_Client();
    $client->setApplicationName('zekmos_hatchapp');
    $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
    $client->setAuthConfig('client_secret.json'); // Path to your client secret JSON file
    $client->setAccessType('offline');

    // Authorize access
    $tokenPath = 'client_secret.json'; // Path to your token JSON file
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    } else {
        // Get authorization from user
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);

        // Save the token
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($accessToken));
    }

    // Create Google Calendar service
    $service = new Google_Service_Calendar($client);

    // Create reminder event
    $event = new Google_Service_Calendar_Event(array(
        'summary' => 'Remind me to ' . $dateLoaded,
        'start' => array(
            'dateTime' => $lockdownDate . 'T09:00:00',
            'timeZone' => 'GMT; UTC±00:00',
        ),
        'end' => array(
            'dateTime' => $lockdownDate . 'T17:00:00',
            'timeZone' => 'GMT; UTC±00:00',
        ),
        'reminders' => array(
            'useDefault' => false,
            'overrides' => array(
                array('method' => 'popup', 'minutes' => 60), // 1 hour before the event
            ),
        ),
    ));

    // Calendar ID of the user's primary calendar
    $calendarId = 'primary';

    // Insert the event
    $event = $service->events->insert($calendarId, $event);

    // Output the event ID
    echo 'Event created: ' . $event->getId();
}

// Retrieve form data from submit.php
$dateLoaded = isset($_POST['dateLoaded']) ? $_POST['dateLoaded'] : '';
$lockdownDate = isset($_POST['lockdownDate']) ? $_POST['lockdownDate'] : '';

// Call the reminder function with retrieved data
reminder($dateLoaded, $lockdownDate);
