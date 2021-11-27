<html>
    <h2>All Articles</h2>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>body</th>
            <th>read more</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td>
                        <a href="/articles/{{ $article->slug }}" >read more</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</html>
