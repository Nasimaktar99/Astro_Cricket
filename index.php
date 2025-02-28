<?php
// Get the relative path from the query parameter (e.g., "2504/default_primary.mpd")
$get = $_GET['get'];

// Construct the full MPD URL using the provided base URL.
$mpdUrl = 'https://linearjitp-playback.astro.com.my/dash-wv/linear/' . $get;

// Set up HTTP context with custom headers.
$mpdheads = [
  'http' => [
      'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
      'follow_location' => 1,
      'timeout' => 5
  ]
];

$context = stream_context_create($mpdheads);

// Retrieve the content from the target MPD URL.
$res = file_get_contents($mpdUrl, false, $context);

// Output the MPD data.
echo $res;
?>
