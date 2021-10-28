<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $posts->links() }}
                    <table class="table table-dark table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">제조회사</th>
                            <th scope="col">자동차명</th>
                            <th scope="col">제조년도</th>
                          </tr>
                        </thead>
                        @foreach ($posts as $post)
                        <tbody>
                          <tr>
                            <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->company }}</a></td>
                            <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->name }}</a></td>
                            <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->year }}</a></td>
                        </tbody>
                        @endforeach
                      </table>

                </div>
            </div>
        </div>
    </div>
<div>
