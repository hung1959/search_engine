<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    <h2 style="text-align: center">
        @php
            if (isset($message))
            { 
                  echo $message;
            }   
        @endphp
    </h2>
    <form action="{{ route('crawling-data') }}" method="post">
        @csrf
        <input type="text" name="keyword" />
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
