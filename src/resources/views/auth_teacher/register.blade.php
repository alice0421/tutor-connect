<x-guest-layout>
    <form method="POST" action="{{ route('teacher.register') }}">
        @csrf

        <p>※ <span class="text-red-600">*</span>が付いているものは必須事項です。</p>

        <!-- Family Name -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="family_name" :value="__('姓')" class="inline" />
            <x-text-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('family_name')" class="mt-2" />
        </div>

        <!-- First Name -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="first_name" :value="__('名')" class="inline" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autocomplete="given-name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="email" :value="__('メールアドレス')" class="inline" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="password" :value="__('パスワード')" class="inline" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="password_confirmation" :value="__('パスワード再入力')" class="inline" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="gender" :value="__('性別')" class="inline" />
            <x-select id="gender" class="block mt-1 w-full" name="gender" required>
                <option value="" hidden>--性別を選択してください。--</option>
                <option value="0" {{ old('gender') === '0' ? 'selected' : '' }}>男</option>
                <option value="1" {{ old('gender') === '1' ? 'selected' : '' }}>女</option>
                <option value="2" {{ old('gender') === '2' ? 'selected' : '' }}>その他</option>
            </x-select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Affiliation -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="affiliation" :value="__('所属大学')" class="inline" />
            <x-text-input id="affiliation" class="block mt-1 w-full" type="text" name="affiliation" :value="old('affiliation')" required autocomplete="organization" />
            <x-input-error :messages="$errors->get('affiliation')" class="mt-2" />
        </div>

        <!-- Grade -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="grade" :value="__('学年')" class="inline" />
            <x-select id="grade" class="block mt-1 w-full" name="grade" required>
                <option value="" hidden>--学年を選択してください。--</option>
                <option value="0" {{ old('grade') === '0' ? 'selected' : '' }}>学部1年生</option>
                <option value="1" {{ old('grade') === '1' ? 'selected' : '' }}>学部2年生</option>
                <option value="2" {{ old('grade') === '2' ? 'selected' : '' }}>学部3年生</option>
                <option value="3" {{ old('grade') === '3' ? 'selected' : '' }}>学部4年生</option>
                <option value="4" {{ old('grade') === '4' ? 'selected' : '' }}>修士1年生</option>
                <option value="5" {{ old('grade') === '5' ? 'selected' : '' }}>修士2年生</option>
            </x-select>
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Teaching History -->
        <div class="mt-4">
            <x-input-label for="teaching_history" :value="__('指導歴')" />
            <x-select id="teaching_history" class="block mt-1 w-full" name="teaching_history">
                <option value="" hidden>--指導歴を選択してください。--</option>
                <option value="0" {{ old('teaching_history') === '0' ? 'selected' : '' }}>1年未満</option>
                <option value="1" {{ old('teaching_history') === '1' ? 'selected' : '' }}>1年以上2年未満</option>
                <option value="2" {{ old('teaching_history') === '2' ? 'selected' : '' }}>2年以上3年未満</option>
                <option value="3" {{ old('teaching_history') === '3' ? 'selected' : '' }}>3年以上4年未満</option>
                <option value="4" {{ old('teaching_history') === '4' ? 'selected' : '' }}>4年以上5年未満</option>
                <option value="5" {{ old('teaching_history') === '5' ? 'selected' : '' }}>5年以上</option>
            </x-select>
            <x-input-error :messages="$errors->get('teaching_history')" class="mt-2" />
        </div>

        <!-- Achievement -->
        <div class="mt-4">
            <x-input-label for="achievement" :value="__('経歴')" />
            <x-textarea id="achievement" class="block mt-1 w-full h-40" name="achievement">{{ old('achievement') }}</x-textarea>
            <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
        </div>
        
        <!-- Introduction -->
        <div class="mt-4">
            <x-input-label for="introduction" :value="__('自己紹介')" />
            <x-textarea id="introduction" class="block mt-1 w-full h-40" name="introduction">{{ old('introduction') }}</x-textarea>
            <x-input-error :messages="$errors->get('introduction')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('teacher.login') }}">
                {{ __('ログイン') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
