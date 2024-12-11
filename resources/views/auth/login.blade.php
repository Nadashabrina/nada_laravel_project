<x-guest-layout>
    <style>
        body {
            background-color: #0e1117;
            color: #d1d1d1;
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
            margin: 0;
        }

        /* General Form Styling */
        form {
            background-color: #1c2230;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.6);
            max-width: 400px;
            margin: auto;
            margin-top: 15vh;
            position: relative;
            overflow: visible;
            opacity: 0;
            transform: translateY(30px);
            animation: formAppear 0.8s ease-out forwards;
        }

        @keyframes formAppear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Decorative Background Gradient */
        form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 255, 255, 0.3), rgba(255, 0, 255, 0.3));
            z-index: 0;
            border-radius: 12px;
        }

        /* Labels and Text */
        .text-gray-600, .text-gray-400, label {
            color: #a5b0be;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        /* Input Fields */
        .block.mt-1.w-full {
            background-color: #1e2532;
            border: 1px solid #2b3a4b;
            color: #d1d1d1;
            border-radius: 6px;
            padding: 0.75rem;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .block.mt-1.w-full:focus {
            border-color: #00f0ff;
            box-shadow: 0 0 0 3px rgba(0, 240, 255, 0.3);
            transform: scale(1.05);
            background-color: #1c1f2b;
        }

        /* Input Field Animations */
        .block.mt-1.w-full:focus + label {
            color: #00f0ff;
        }

        /* Checkboxes */
        input[type="checkbox"] {
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        input[type="checkbox"]:checked {
            transform: scale(1.2);
            animation: checkboxAnim 0.3s ease;
        }

        @keyframes checkboxAnim {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.2);
            }
        }

        /* Remember Me Checkbox Label */
        .ml-2 {
            color: #a5b0be;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        /* Links */
        a {
            color: #00f0ff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            color: #ff00ff;
            text-decoration: underline;
            transform: scale(1.05);
        }

        /* Button */
        .primary-button {
            background-color: #00f0ff;
            color: #1e2532;
            padding: 0.75rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .primary-button:hover {
            background-color: #00c8c8;
            transform: translateY(-2px) scale(1.05);
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            form {
                padding: 1.5rem;
            }

            .primary-button {
                padding: 0.5rem;
            }
        }

    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="primary-button">
                {{ __('Log in') }}
            </button>
        </div>

        <!-- Forgot Password Link -->
        <div class="forgot-password">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
