<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Products</th>
      <th scope="col">Actions</th>


    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->id}}</td>
      <td>
      <a href="{{route('profile',$user->id)}}" class="btn btn-primary">Show</a>
        <a href="{{route('edit_profile',$user->id)}}"  class="btn btn-success">Edit</a>
        <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger">Delete</a>

        
        </td>
    </tr>
         @endforeach
  </tbody>
</table>
{{$users->links()}}

  </body>
</html>