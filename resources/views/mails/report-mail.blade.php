<!DOCTYPE html>
<html>
<head>
    <title>{{ __('mail.report.title') }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body dir="{{(app()->getLocale() === 'ar' ? 'rtl' : 'ltr')}}">

<h2>{{ __('mail.report.welcome') }}</h2>

<p>{{ __('mail.report.message') }}</p>

@if(! empty($users))
    <p>{{ __('mail.report.users') }}</p>

    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">{{ __('mail.report.user.username') }}</th>
            <th scope="col">{{ __('mail.report.user.phone') }}</th>
            <th scope="col">{{ __('mail.report.user.email') }}</th>
            <th scope="col">{{ __('mail.report.user.created_at') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['phone'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['created_at'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
@endif

@if(! empty($posts))
    <p>{{ __('mail.report.posts') }}</p>

    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">{{ __('mail.report.post.title') }}</th>
            <th scope="col">{{ __('mail.report.post.author') }}</th>
            <th scope="col">{{ __('mail.report.post.created_at') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['user']['username'] }}</td>
                <td>{{ $post['created_at'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
@endif

<p>{{ __('mail.report.farewell') }}</p>

</body>
</html>
