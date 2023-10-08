<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('家庭教師マッチング') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        @if (session('success'))
            <x-flash-message :message="session('success')" type="success" class="animate-flash-message absolute top-[-50px] left-1/4" />
        @endif
        @if (session('info'))
            <x-flash-message :message="session('info')" type="info" class="animate-flash-message absolute top-[-50px] left-1/4" />
        @endif
        @if (session('error'))
            <x-flash-message :message="session('error')" type="error" class="animate-flash-message absolute top-[-50px] left-1/4" />
        @endif
        <div class="w-[1140px] mx-auto px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 text-gray-900">
                    <!-- 検索機能 -->
                    <h1 class="text-2xl font-bold mb-4">検索</h1>
                    @include('matchings.search')

                    <!-- 検索結果 -->
                    <h1 class="text-2xl font-bold mt-10 mb-4">検索結果</h1>
                    @include('matchings.search-result')

                    <!-- おすすめ表示 (該当する希望科目が多い順) -->
                    <h1 class="text-2xl font-bold mt-10 mb-4">あなたへのおすすめ</h1>
                    @include('matchings.recommend')

                    <!-- ランダム講師表示 -->
                    <h1 class="text-2xl font-bold mt-10 mb-4">講師一覧</h1>
                    @include('matchings.random')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
