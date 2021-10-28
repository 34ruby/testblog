<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('자동차 정보 게시') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-primary">
        돌아가기</button>

    </div>
</x-slot>
<div class="m-4 p-4">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


        <form class="row g-3" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- 자동차 사진 --}}
            <div class="col-12 m-2">
            <label for="image" class="form-label">사진첨부</label>
            <input type="file" name="image" class="form-control" id="image" value="{{ old('image')}}">
            </div>
            @error('image')
            <div class="text-red-800">
                <span>{{ $message }}</span>
            </div>
            @enderror
            {{-- 자동차 회사 --}}
             <div class="col-12 m-2">
             <label for="company" class="form-label">제조회사</label>
             <input type="text" name="company" class="form-control" id="company" value="{{ old('company') }}">
             @error('company')
             <div class="text-red-800">
             <span>{{ $message }}</span>
             </div>
             @enderror
            {{-- 자동차 이름 --}}
            <div class="col-12 m-2">
            <label for="name" class="form-label">자동차 이름</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="text-red-800">
                <span>{{ $message }}</span>
            </div>
            @enderror
                        {{-- 제조년도 --}}
                        <div class="col-12 m-2">
                            <label for="year" class="form-label">제조년도</label>
                            <input type="text" name="year" class="form-control" id="year" value="{{ old('year') }}">
                            </div>
                            @error('year')
                            <div class="text-red-800">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        {{-- 자동차 가격 --}}
                        <div class="col-12 m-2">
                            <label for="price" class="form-label">가격</label>
                            <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}">
                            </div>
                            @error('price')
                            <div class="text-red-800">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        {{-- 자동차 타입 --}}
                        <div class="col-12 m-2">
                            <label for="type" class="form-label">차종</label>
                            <input type="text" name="type" class="form-control" id="type" value="{{ old('type') }}">
                            </div>
                            @error('type')
                            <div class="text-red-800">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        {{-- 자동차 외형 --}}
                        <div class="col-12 m-2">
                            <label for="shape" class="form-label">외형</label>
                            <input type="text" name="shape" class="form-control" id="shape" value="{{ old('shape') }}">
                            </div>
                            @error('type')
                            <div class="text-red-800">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror

            </div>
            <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary">저장하기</button>
            </div>
        </form>
    </div>
</div>
</div>
    </div>
</x-app-layout>
