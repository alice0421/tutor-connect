<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
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

        <!-- Name Publication -->
        <div class="mt-4">
            <div>
                <span class="text-red-600">*</span><x-input-label :value="__('氏名を公開しますか? (非公開にすると、ニックネームが表示されます)')" class="inline" />
            </div>
            <label class="mr-4"><input type="radio" name="is_name_public" value="1" {{ old('is_name_public') === '1' || old('is_name_public') === null ? 'checked' : '' }} class="mr-1">公開</label>
            <label><input type="radio" name="is_name_public" value="0" {{ old('is_name_public') === '0' ? 'checked' : '' }} class="mr-1">非公開</label>
            <x-input-error :messages="$errors->get('is_name_public')" class="mt-2" />
        </div>

        <!-- Nick Name -->
        <div class="mt-4">
            <x-input-label for="nickname" :value="__('ニックネーム')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" />
            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
        <span class="text-red-600">*</span><x-input-label for="email" :value="__('メールアドレス')" class="inline" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

        <!-- Grade -->
        <div class="mt-4">
            <span class="text-red-600">*</span><x-input-label for="grade" :value="__('学年')" class="inline" />
            <x-select id="grade" class="block mt-1 w-full" name="grade" required>
                <option value="" hidden>--学年を選択してください。--</option>
                <option value="0" {{ old('grade') === '0' ? 'selected' : '' }}>中学1年生</option>
                <option value="1" {{ old('grade') === '1' ? 'selected' : '' }}>中学2年生</option>
                <option value="2" {{ old('grade') === '2' ? 'selected' : '' }}>中学3年生</option>
                <option value="3" {{ old('grade') === '3' ? 'selected' : '' }}>高校1年生</option>
                <option value="4" {{ old('grade') === '4' ? 'selected' : '' }}>高校2年生</option>
                <option value="5" {{ old('grade') === '5' ? 'selected' : '' }}>高校3年生</option>
            </x-select>
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Preferred Class per Day -->
        <div class="mt-4">
            <x-input-label for="preferred_class_per_day" :value="__('1日あたりに希望するコマ数 (90分 / コマ)')" />
            <x-select id="preferred_class_per_day" class="block mt-1 w-full" name="preferred_class_per_day">
                <option value="" hidden>--希望コマ数を選択してください。--</option>
                <option value="1" {{ old('preferred_class_per_day') === '1' ? 'selected' : '' }}>1コマ</option>
                <option value="2" {{ old('preferred_class_per_day') === '2' ? 'selected' : '' }}>2コマ</option>
                <option value="3" {{ old('preferred_class_per_day') === '3' ? 'selected' : '' }}>3コマ</option>
                <option value="4" {{ old('preferred_class_per_day') === '4' ? 'selected' : '' }}>4コマ</option>
                <option value="5" {{ old('preferred_class_per_day') === '5' ? 'selected' : '' }}>5コマ</option>
                <option value="6" {{ old('preferred_class_per_day') === '6' ? 'selected' : '' }}>6コマ</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_class_per_day')" class="mt-2" />
        </div>

        <!-- Preferred Studying Day per Week -->
        <div class="mt-4">
            <x-input-label for="preferred_studying_day_per_week" :value="__('1週間あたりに希望する指導日数')" />
            <x-select id="preferred_studying_day_per_week" class="block mt-1 w-full" name="preferred_studying_day_per_week">
                <option value="" hidden>--希望日数を選択してください。--</option>
                <option value="1" {{ old('preferred_studying_day_per_week') === '1' ? 'selected' : '' }}>1日</option>
                <option value="2" {{ old('preferred_studying_day_per_week') === '2' ? 'selected' : '' }}>2日</option>
                <option value="3" {{ old('preferred_studying_day_per_week') === '3' ? 'selected' : '' }}>3日</option>
                <option value="4" {{ old('preferred_studying_day_per_week') === '4' ? 'selected' : '' }}>4日</option>
                <option value="5" {{ old('preferred_studying_day_per_week') === '5' ? 'selected' : '' }}>5日</option>
                <option value="6" {{ old('preferred_studying_day_per_week') === '6' ? 'selected' : '' }}>6日</option>
                <option value="7" {{ old('preferred_studying_day_per_week') === '7' ? 'selected' : '' }}>7日</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_studying_day_per_week')" class="mt-2" />
        </div>

        <!-- Purpose -->
        <div class="mt-4">
            <x-input-label for="purpose" :value="__('目的')" />
            <x-select id="purpose" class="block mt-1 w-full" name="purpose">
                <option value="" hidden>--目的を選択してください。--</option>
                <option value="0" {{ old('purpose') === '0' ? 'selected' : '' }}>学習フォロー</option>
                <option value="1" {{ old('purpose') === '1' ? 'selected' : '' }}>高校受験</option>
                <option value="2" {{ old('purpose') === '2' ? 'selected' : '' }}>大学受験</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_class_per_day')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('ログイン') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
