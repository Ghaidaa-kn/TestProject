<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="/login/email" method="POST">
      {{ csrf_field() }}
      <h1 style="text-align: center;">Login Via Email</h1>
      <h4>Email :</h4>
      <div class="mb-3">
          <input type="text" name="email" class="form-control" required>
      </div>
      <h4>Password :</h4>
      <div class="mb-3">
          <input type="password" name="password" class="form-control" required>
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Login</button>
      </div>
    </form>
</div>
</body>
</html>

