<div class="grid grid-cols-3 gap-4 justify-items-center">
    @foreach ($teachers_10 as $teacher)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex justify-end px-4 pt-4">
                <span class="text-xl mr-2">☆</span>
                <span class="text-xl">♡</span>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="sample.png" />
                <h5 class="mb-2 px-4 text-xl font-medium text-gray-900 border-b border-gray-300">
                    {{ $teacher->family_name }} {{ $teacher->first_name }}
                    <span class="text-xs">講師<span>
                </h5>
                <div class="flex justify-center mb-4 text-sm text-gray-500">
                    <span class="mr-2">{{ $teacher->affiliation }}</span>
                    <span>指導歴{{ $teacher->teaching_history }}年</span>
                </div>
                <!-- 最終的に、担当科目の生徒が多い順3位までのみ表示したい -->
                <p class="text-xs text-gray-400 mb-1">下記科目を担当</p>
                <div class="flex flex-wrap justify-center w-4/5 text-center">
                    @foreach ($teacher->subjects as $subject)
                        <span class="w-1/3 text-sm text-gray-500">{{ $subject->name }}</span>
                    @endforeach
                </div>
                <div class="flex mt-4 space-x-3">
                    <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">指導申請</a>
                    <a href="" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">講師詳細</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
