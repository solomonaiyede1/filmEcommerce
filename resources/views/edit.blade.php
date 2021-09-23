@if(session('success'))
<p class="bg-success text-white">Item saved successfully.</p>
@endif
@foreach($t as $test)
{{$test->id}}
<form method="post" action="{{url('/edit', $test->id)}}">
@csrf
<input type="text" name="name" value='{{$test->name}}'>
<button type="submit">Edit</button>
</form>
@endforeach