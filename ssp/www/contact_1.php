<?php

$to = 'aravind@praneraservices.com';
$subject = 'Hello!';

$headers = 'From: aravindsprint@gmail.com' . "\r\n" .
           'MIME-Version: 1.0' . "\r\n" .
           'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$message = '
<html>
<head>
    <title>Review Request Reminder</title>
</head>
<body>
    <p>Here are the cases requiring your review in December:</p>
    <table>
        <tr>
            <th>Case title</th><th>Category</th><th>Status</th><th>Due date</th>
        </tr>
        <tr>
            <td>Case 1</td><td>Development</td><td>pending</td><td>Dec-20</td>
        </tr>
        <tr>
            <td>Case 2</td><td>DevOps</td><td>pending</td><td>Dec-21</td>
        </tr>
    </table>
</body>
</html>
';

$result = mail($to, $subject, $message, $headers);

if ($result) {
    echo 'Success!' . PHP_EOL;
} else {
    echo 'Error.' . PHP_EOL;
}
