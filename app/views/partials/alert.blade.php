@if(isset($message))
<div class="alert alert-{{ $message->type }} fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ $message->title }}</strong> {{ $message->content}}
</div>
@endif