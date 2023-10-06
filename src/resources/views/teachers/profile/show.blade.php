<x-app-layout>
    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-800 leading-tight">
            <p class="pt-2">
                {{ $teacher->family_name }}{{ $teacher->first_name }}
                <span class="text-xs">講師
            </p>
            <form class="flex space-x-3 ml-4" action="{{ route('matching.apply', ['teacher' => $teacher->id]) }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">指導申請</button>
                <a href="{{ route('matching.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">講師一覧に戻る</a>
            </form>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-8 space-y-6">
            <div class="p-8 bg-white shadow rounded-lg">
                <div class="w-2/3">
                    <h1 class="text-lg font-semibold">講師名</h1>
                    <p>{{ $teacher->family_name }}{{ $teacher->first_name }}</p>

                    <h1 class="mt-4 text-lg font-semibold">所属大学</h1>
                    <p>{{ $teacher->affiliation }}</p>

                    <h1 class="mt-4 text-lg font-semibold">学年</h1>
                    @if ($teacher->grade === 0)
                        <p>学部1年生</p>
                    @elseif ($teacher->grade === 1)
                        <p>学部2年生</p>
                    @elseif ($teacher->grade === 2)
                        <p>学部3年生</p>
                    @elseif ($teacher->grade === 3)
                        <p>学部4年生</p>
                    @elseif ($teacher->grade === 4)
                        <p>修士1年生</p>
                    @else
                        <p>修士2年生</p>
                    @endif

                    <h1 class="mt-4 text-lg font-semibold">指導歴</h1>
                    <p>{{ $teacher->teaching_history }}年</p>

                    <h1 class="mt-4 text-lg font-semibold">指導可能科目</h1>
                    <div class="flex flex-wrap">
                        @foreach ($teacher->subjects as $subject)
                            <span class="w-1/4">{{ $subject->name }}</span>
                        @endforeach
                    </div>

                    <h1 class="mt-4 text-lg font-semibold">実績</h1>
                    <p>{{ $teacher->achievement }}</p>

                    <h1 class="mt-4 text-lg font-semibold">自己紹介</h1>
                    <p>{{ $teacher->introduction }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
