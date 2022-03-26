<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>hello</title>
</head>
<body>
<h1>Hello {{ $i }} * 2 = {{ $doubled }}.</h1>
<form method="GET">
    <label>
        i
        <input type="text" name="i" value="{{ $i }}">
    </label>
    <button>double</button>
    @error('i')
    <p style="color: red; font-size: 80%;">{{ $message }}</p>
    @enderror
</form>
</body>
</html>
