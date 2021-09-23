
<form method="post" action="/test" >
<input name="name">
<input type="submit" value="submit1">
</form>

@foreach($t1 as $test)
    {{$test->name}} <a href="{{url('/edit', $test->id)}}">Edit</a> <br>
@endforeach