<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="card" style="width: 100%; margin:10px">
                        <img src="{{'/storage/images/'.$post->image}}" class="card-img-top" style="width:20%; margin:10px" alt="my post image" >
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">제조회사: {{  $post->name }}</li>
                            <li class="list-group-item">자동차명: {{ $post->company  }}</li>
                            <li class="list-group-item">제조년도: {{$post->year }}</li>
                            <li class="list-group-item">가격: {{  $post->price }}</li>
                            <li class="list-group-item">차종: {{  $post->type }}</li>
                            <li class="list-group-item">외형: {{  $post->shape }}</li>
                            <li class="list-group-item">작성자: {{ $post->writer->name }}</li>
                            <li class="list-group-item">등록일: {{ $post->created_at->diffForHumans() }}</li>
                            <li class="list-group-item">수정일: {{ $post->updated_at->diffForHumans() }}</li>
                        </ul>
                        <div class="card-body">

                            <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">수정하기</a>
                            <form method="post" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
                              @csrf
                              @method('delete')
                              {{-- <input type="hidden" name="_method" value="delete"> --}}
                              <button type="submit" onclick="confirmDelete">
                              삭제하기
                          </button>
                            </form>

                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
