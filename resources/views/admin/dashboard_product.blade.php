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
      <th scope="col">Product Name</th>
      <th scope="col">Product Image Path</th>
      <th scope="col">Product Description</th>
      <th scope="col">User name</th>
      <th scope="col">Actions</th>


    </tr>
  </thead>
  <tbody>
      @foreach($prods as $prod)
    <tr>
      <th scope="row">{{$prod->id}}</th>
      <td>{{$prod->name}}</td>
      <td>{{$prod->image}}</td>
      <td>{{$prod->description}}</td>
      <td>{{$prod->user->first_name}}     {{$prod->user->last_name}}</td>
      <td>
      <a href="{{route('show_prod',$prod->id)}}" class="btn btn-primary">Show</a>
        <a href="{{route('edit_prod',$prod->id)}}"  class="btn btn-success">Edit</a>
        <a href="{{route('destroy_prod',$prod->id)}}"  class="btn btn-danger">Delete</a>
        </td>
    </tr>
         @endforeach
  </tbody>
</table>


  </body>
</html>