<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール情報') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("あなたの氏名とメールアドレスを更新できます。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('teacher.verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('teacher.profile.update') }}" class="mt-6 space-y-6">
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
                            {{ __('こちらをクリックして、あなたのメールアドレスを有効化するメールを再送信できます。') }}
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
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Affiliation -->
        <div class="mt-4">
            <x-input-label for="affiliation" :value="__('所属大学')" class="inline" />
            <x-text-input id="affiliation" class="block mt-1 w-full" type="text" name="affiliation" :value="old('affiliation', $user->affiliation)" required autocomplete="organization" />
            <x-input-error :messages="$errors->get('affiliation')" class="mt-2" />
        </div>

        <!-- Grade -->
        <div class="mt-4">
            <x-input-label for="grade" :value="__('学年')" class="inline" />
            <x-select id="grade" class="block mt-1 w-full" name="grade" required>
                <option value="0" {{ old('grade', $user->grade) === 0 ? 'selected' : '' }}>大学1年生</option>
                <option value="1" {{ old('grade', $user->grade) === 1 ? 'selected' : '' }}>大学2年生</option>
                <option value="2" {{ old('grade', $user->grade) === 2 ? 'selected' : '' }}>大学3年生</option>
                <option value="3" {{ old('grade', $user->grade) === 3 ? 'selected' : '' }}>大学4年生</option>
                <option value="4" {{ old('grade', $user->grade) === 4 ? 'selected' : '' }}>修士1年生</option>
                <option value="5" {{ old('grade', $user->grade) === 5 ? 'selected' : '' }}>修士2年生</option>
            </x-select>
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Teaching History -->
        <div class="mt-4">
            <x-input-label for="teaching_history" :value="__('指導歴')" class="inline" />
            <x-select id="teaching_history" class="block mt-1 w-full" name="teaching_history" required>
                <option value="0" {{ old('teaching_history', $user->teaching_history) === 0 ? 'selected' : '' }}>1年未満</option>
                <option value="1" {{ old('teaching_history', $user->teaching_history) === 1 ? 'selected' : '' }}>1年以上2年未満</option>
                <option value="2" {{ old('teaching_history', $user->teaching_history) === 2 ? 'selected' : '' }}>2年以上3年未満</option>
                <option value="3" {{ old('teaching_history', $user->teaching_history) === 3 ? 'selected' : '' }}>3年以上4年未満</option>
                <option value="4" {{ old('teaching_history', $user->teaching_history) === 4 ? 'selected' : '' }}>4年以上5年未満</option>
                <option value="5" {{ old('teaching_history', $user->teaching_history) === 5 ? 'selected' : '' }}>5年以上</option>
            </x-select>
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Achievement -->
        <div class="mt-4">
            <x-input-label for="achievement" :value="__('経歴')" />
            <x-textarea id="achievement" class="block mt-1 w-full h-40" name="achievement">{{ old('achievement', $user->achievement) }}</x-textarea>
            <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
        </div>
        
        <!-- Introduction -->
        <div class="mt-4">
            <x-input-label for="introduction" :value="__('自己紹介')" />
            <x-textarea id="introduction" class="block mt-1 w-full h-40" name="introduction">{{ old('introduction', $user->introduction) }}</x-textarea>
            <x-input-error :messages="$errors->get('introduction')" class="mt-2" />
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
