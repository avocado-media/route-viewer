<!DOCTYPE html>
<html lang="en">
<head>
    <title>Route list</title>
</head>
<body>
<h1>Route list for</h1>

<ul>
    @foreach($routes as $route)
        <li>
            uri: /{{ $route['uri'] }}
            <br/>

            action: /{{ $route['action'] }}
            <br/>

            MW: @if($route['middleware'] !== [])
                @foreach($route['middleware'] as $middleware)
                    {{ $middleware }}
                @endforeach
            @else
                None
            @endisset
            <br/>

            Methods: @foreach($route['methods'] as $method)
                {{ $method }},
            @endforeach
            <br/>

            Name: {{ $route['name'] }}
        </li>
    @endforeach
</ul>
</body>
</html>
