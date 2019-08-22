<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talent DB</title>
</head>
<body>
    <div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <td>Area</td>
                <td>Name</td>
                <td>Birthday</td>
                <td>Gender</td>
                <td>Phone</td>
                <td>Address</td>
                <td>TikTok</td>
                <td>Facebook URL</td>
                <td>Performance</td>
            </tr>
            </thead>
            <tbody>
            @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->area }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->birthday }}</td>
                    <td>{{ $candidate->gender }}</td>
                    <td>{{ $candidate->phone }}</td>
                    <td>{{ $candidate->address }}</td>
                    <td>{{ $candidate->douyin }}</td>
                    <td>{{ $candidate->facebookid }}</td>
                    <td>{{ $candidate->performance }}</td>
                    <td>
                        <form action="{{ url('/destroy', $candidate->id) }}" method="post">
                            @csrf
                            <button class="btn">刪除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
