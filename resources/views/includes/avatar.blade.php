@if(Auth::user()->image)
  <div class="container-avatar">
    {{-- con url --}}
    {{-- <img src="{{url('/user/avatar/'.Auth::user()->image)}}" alt="avatar"> --}}
    {{-- con route --}}
    <img class="avatar" src="{{ route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="avatar">
  </div>
@endif