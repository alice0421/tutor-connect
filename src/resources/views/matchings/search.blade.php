<form method="get" action="{{ route('matching.index') }}">
    <!-- 講師名 -->
    <x-input-label for="name" :value="__('講師名')" />
    <x-text-input id="name" type="text" name="name" :value="old('name')" class="block mr-2 w-1/2" />
    <span class="text-gray-400 text-sm">※ 姓名の間にスペースを開けずに検索してください。</span>
    <span class="text-gray-400 text-sm">※ 漢字で検索してください。</span>
    <!-- 科目指定 (複数) -->
    <h2 class="mt-2 font-medium text-sm text-gray-700">指導科目</h2>
    <div class="w-full flex flex-wrap mt-1">
        @foreach ($subjects as $subject)
        <div class="flex w-1/6 mr-2">
            <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" class="mr-1" />
            <x-input-label for="subjects[]" :value="__($subject->name)"/>
        </div>
        @endforeach
    </div>
    <x-primary-button class="mt-2">{{ __('検索') }}</x-primary-button>
</form>
