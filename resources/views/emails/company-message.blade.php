<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification: Get jobs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 20px;
        }

        ul {
            padding-left: 20px;
            color: #555;
        }

        li {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .button-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hi {{ $company->name }},</h1>
        <p>Anda telah menerima lamaran pekerjaan dari:</p>
        <ul>
            <li><strong>Nama Pelamar:</strong> {{ $user->first_name . ' ' . $user->last_name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Location:</strong> {{ $user->address }}</li>
            <li><strong>Country:</strong> {{ $user->country }}</li>
            <li><strong>Postal code:</strong> {{ $user->postal_code }}</li>
            <li><strong>City:</strong> {{ $user->city }}</li>
            <li><strong>Phone:</strong> {{ $user->phone }}</li>
        </ul>
        <p>Info lengkap tentang pelamar:</p>
        <ul>
            <li><strong>Personal summary:</strong> {{ $user->profile->personal_summary }}</li>
            <li><strong>Recent education:</strong> {{ $user->profile->recent_education }}</li>
            <li><strong>Recent work:</strong> {{ $user->profile->recent_work }}</li>
            <li><strong>Skills:</strong> {{ $user->profile->skills }}</li>
            <li><strong>Language:</strong> {{ $user->profile->languages }}</li>
            <li><strong>Hobby:</strong> {{ $user->profile->hobbies }}</li>
        </ul>
        <p>Berikut file yang dilampirkan:</p>
        <div class="button-container">
            <a class="btn" href="{{ asset('storage/resume/' . $user->profile->resume) }}">Download Resume</a>
            <a class="btn" href="{{ asset('storage/company/cover_letter/' . $cover_letter) }}">Download Cover Letter</a>
        </div>
    </div>
</body>

</html>