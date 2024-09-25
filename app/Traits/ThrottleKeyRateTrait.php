<?php

namespace App\Traits;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait ThrottleKeyRateTrait
{
    /**
     * Ensure the login request is not rate limited
     * @return void
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts(key: $this->throttleKey(), maxAttempts: 5)) {
            return;
        }
        event(new Lockout(request: $this));
        $seconds = RateLimiter::availableIn(key: $this->throttleKey());
        $onError = trans(key: 'auth.throttle', replace: ['seconds' => $seconds, 'minutes' => ceil($seconds / 60)]);
        throw ValidationException::withMessages(messages: ['email' => $onError]);
    }

    /**
     * Get the rate limiting throttle key for the request
     * @return string
     */
    public function throttleKey(): string
    {
        return Str::transliterate(string: Str::lower($this->input(key: 'email')) . '|' . $this->ip());
    }
}
