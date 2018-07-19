<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
        @foreach($users as $user)

            <li>
                <a href="/users/{{$user->id}}">
                    {{$user->name}}
                </a>

            </li>

        @endforeach
            
        </ul>
</body>
</html>