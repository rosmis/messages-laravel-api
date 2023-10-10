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
      Message list api example
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('messages.createMessage') }}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Content</label>
          <textarea name="content" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <div class="card-body">
      @if(count($messages) > 0)
          <ul>
              @foreach($messages as $message)
                <div class="d-flex justify-content-between">
                    <li>
                      <strong>{{ $message->title }}</strong>
                      <p>{{ $message->content }}</p>
                      <p>Publié le: {{ $message->date }}</p>
                    </li>
                    <div class="flex-column gap-2 d-flex align-items-end">
                      <a href="http://127.0.0.1:8000/home/{{ $message->id }}/edit">Edit</a>

                      <form action="{{ route('messages.removeMessage', $message->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                    </form>
                    </div>
                </div>
              @endforeach
          </ul>
      @else
          <p>No messages found.</p>
      @endif
    </div>
</div>  
</body>
</html>