<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <form action="/register_request" method="POST">
      {{ csrf_field() }}
      <h1 style="text-align: center;">Redistration Request</h1>
      <h4>First Name :</h4>
      <div class="mb-3">
          <input type="text" name="first_name" class="form-control" required>
      </div>
      <h4>Last Name :</h4>
      <div class="mb-3">
          <input type="text" name="last_name" class="form-control" required>
      </div>
      <h4>Password :</h4>
      <div class="mb-3">
          <input type="text" name="password" class="form-control" required>
      </div>
      <h4>Email Or Phone Number :</h4>
      <div class="mb-3">
        <select name="choose" id="choose" onchange="response()" required>
          <option></option>
          <option value="e">Email</option>
          <option value="p">Phone Number</option>
          <option value="2">Email & Phone</option>
        </select>
      </div>
      <div class="mb-3">
        <div class="email" hidden="hidden">
          <h4>Email :</h4>
          <input type="email" name="email" class="form-control">
        </div>
      </div>
      <div class="mb-3">
        <div class="phone" hidden="hidden">
          <h4>Phone Number :</h4>
          <input type="text" name="phone" class="form-control">
        </div>
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Request</button>
      </div>
    </form>
</div>
</body>

<script type="text/javascript">
    function response(){
        var res = document.getElementById('choose');
        if(res.value == 'e'){
            $('.email').removeAttr('hidden');
            $('.phone').attr('hidden' , 'hidden');
        }else if(res.value == 'p'){
            $('.phone').removeAttr('hidden');
            $('.email').attr('hidden' , 'hidden');
        }else if(res.value == '2'){
          $('.phone').removeAttr('hidden');
          $('.email').removeAttr('hidden');
        }else if(res.value == ''){
          $('.email').attr('hidden' , 'hidden');
          $('.phone').attr('hidden' , 'hidden');
        }
    }
</script>

</html>


