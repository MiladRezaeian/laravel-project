@yield('content')
//remove @section('content') because your master does not extends any other layout



<h2>Create Article</h2>
    <form action="/admin/articles/create">
        @csrf
        <lable for=title">title : </lable>
        <input type="text" name="title">
        <button>send</button>
        <h1>test</h1>
    </form>
