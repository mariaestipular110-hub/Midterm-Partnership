<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Library TPS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <nav class="mb-4">
    <a class="btn btn-outline-primary" href="{{ route('books.index') }}">Books</a>
    <a class="btn btn-outline-primary" href="{{ route('members.index') }}">Members</a>
    <a class="btn btn-outline-primary" href="{{ route('borrows.index') }}">Borrowed</a>
  </nav>

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
  </div>
</body>
</html>
