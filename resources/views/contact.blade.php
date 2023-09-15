<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Email</title>
</head>

<body>
    <p>Name: {{ $data ?? ''['name'] }}</p>
    <p>Email: {{ $data ?? ''['email'] }}</p>
    <p>Phone: {{ $data ?? ''['phone'] }}</p>
    <p>Message: {{ $data ?? ''['message'] }}</p>
</body>

</html>