<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール情報') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("あなたの氏名とメールアドレスを更新できます。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Family Name -->
        <div>
            <x-input-label for="family_name" :value="__('姓')" />
            <x-text-input id="family_name" name="family_name" type="text" class="mt-1 block w-full" :value="old('family_name', $user->family_name)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('family_name')" />
        </div>

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('名')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <!-- Name Publication -->
        <div class="mt-4">
            <x-input-label :value="__('氏名を公開しますか? (非公開にすると、ニックネームが表示されます)')" />
            <label class="mr-4"><input type="radio" name="is_name_public" value="1" {{ old('is_name_public, $user->is_name_public') === 1 || old('is_name_public', $user->is_name_public) === null ? 'checked' : '' }} class="mr-1">公開</label>
            <label><input type="radio" name="is_name_public" value="0" {{ old('is_name_public', $user->is_name_public) === 0 ? 'checked' : '' }} class="mr-1">非公開</label>
            <x-input-error :messages="$errors->get('is_name_public')" class="mt-2" />
        </div>

        <!-- Nick Name -->
        <div>
            <x-input-label for="nickname" :value="__('ニックネーム')" />
            <x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" :value="old('nickname', $user->nickname)" required autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('nickname')" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('あなたのメールアドレスは有効ではありません。') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('こちらをクリックして、メールアドレスの有効化リンクを再送信できます。') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('新たな有効化リンクがあなたのメールアドレスに送信されました。') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('性別')" class="inline" />
            <x-select id="gender" class="block mt-1 w-full" name="gender" required>
                <option value="0" {{ old('gender', $user->gender) === 0 ? 'selected' : '' }}>男</option>
                <option value="1" {{ old('gender', $user->gender) === 1 ? 'selected' : '' }}>女</option>
                <option value="2" {{ old('gender', $user->gender) === 2 ? 'selected' : '' }}>その他</option>
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <!-- Grade -->
        <div class="mt-4">
            <x-input-label for="grade" :value="__('学年')" class="inline" />
            <x-select id="grade" class="block mt-1 w-full" name="grade" required>
                <option value="0" {{ old('grade', $user->grade) === 0 ? 'selected' : '' }}>中学1年生</option>
                <option value="1" {{ old('grade', $user->grade) === 1 ? 'selected' : '' }}>中学2年生</option>
                <option value="2" {{ old('grade', $user->grade) === 2 ? 'selected' : '' }}>中学3年生</option>
                <option value="3" {{ old('grade', $user->grade) === 3 ? 'selected' : '' }}>高校1年生</option>
                <option value="4" {{ old('grade', $user->grade) === 4 ? 'selected' : '' }}>高校2年生</option>
                <option value="5" {{ old('grade', $user->grade) === 5 ? 'selected' : '' }}>高校3年生</option>
            </x-select>
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Preferred Class per Day -->
        <div class="mt-4">
            <x-input-label for="preferred_class_per_day" :value="__('1日あたりに希望するコマ数 (90分 / コマ)')" />
            <x-select id="preferred_class_per_day" class="block mt-1 w-full" name="preferred_class_per_day">
                <option value="" hidden>--希望コマ数を選択してください。--</option>
                <option value="1" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 1 ? 'selected' : '' }}>1コマ</option>
                <option value="2" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 2 ? 'selected' : '' }}>2コマ</option>
                <option value="3" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 3 ? 'selected' : '' }}>3コマ</option>
                <option value="4" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 4 ? 'selected' : '' }}>4コマ</option>
                <option value="5" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 5 ? 'selected' : '' }}>5コマ</option>
                <option value="6" {{ old('preferred_class_per_day', $user->preferred_class_per_day) === 6 ? 'selected' : '' }}>6コマ</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_class_per_day')" class="mt-2" />
        </div>

        <!-- Preferred Studying Day per Week -->
        <div class="mt-4">
            <x-input-label for="preferred_studying_day_per_week" :value="__('1週間あたりに希望する指導日数')" />
            <x-select id="preferred_studying_day_per_week" class="block mt-1 w-full" name="preferred_studying_day_per_week">
                <option value="" hidden>--希望日数を選択してください。--</option>
                <option value="1" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 1 ? 'selected' : '' }}>1日</option>
                <option value="2" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 2 ? 'selected' : '' }}>2日</option>
                <option value="3" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 3 ? 'selected' : '' }}>3日</option>
                <option value="4" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 4 ? 'selected' : '' }}>4日</option>
                <option value="5" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 5 ? 'selected' : '' }}>5日</option>
                <option value="6" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 6 ? 'selected' : '' }}>6日</option>
                <option value="7" {{ old('preferred_studying_day_per_week', $user->preferred_studying_day_per_week) === 7 ? 'selected' : '' }}>7日</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_studying_day_per_week')" class="mt-2" />
        </div>

        <!-- Purpose -->
        <div class="mt-4">
            <x-input-label for="purpose" :value="__('目的')" />
            <x-select id="purpose" class="block mt-1 w-full" name="purpose">
                <option value="" hidden>--目的を選択してください。--</option>
                <option value="0" {{ old('purpose', $user->purpose) === 0 ? 'selected' : '' }}>学習フォロー</option>
                <option value="1" {{ old('purpose', $user->purpose) === 1 ? 'selected' : '' }}>高校受験</option>
                <option value="2" {{ old('purpose', $user->purpose) === 2 ? 'selected' : '' }}>大学受験</option>
            </x-select>
            <x-input-error :messages="$errors->get('preferred_class_per_day')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('更新') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('更新完了') }}</p>
            @endif
        </div>
    </form>
</section>
