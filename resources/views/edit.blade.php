<!DOCTYPE html>
<html>
<head>
    <title>Laravel FORM MESSAGE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="font-weight-bold text-center card-header">
      EDIT THE MESSAGE
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('messages.updateMessage', ['id' => $message->id]) }}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="" value="{{$message->title}}">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Content</label>
          <textarea name="content" class="form-control" required="">{{$message->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>