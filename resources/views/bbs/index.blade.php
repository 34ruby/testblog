<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('자동차 갤러리') }}
        </h2>
        <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-primary">
            글쓰기</button>
        </div>
    </x-slot>
    <x-post-list :posts="$posts" />
</x-app-layout>
