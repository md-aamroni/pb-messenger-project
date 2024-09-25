<?php

namespace App\Utilities;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

readonly class PasswordLessLogin
{
    /**
     * @param  User   $user
     * @return string
     */
    public static function generate(User $user): string
    {
        return URL::temporarySignedRoute(name: 'login', expiration: Carbon::now()->addMinute(), parameters: [
            'userid' => $user->getAuthIdentifier(),
            'domain' => 'example.com',
            'remote' => false,
            'issued' => $user->getAttribute(key: 'role')
        ]);
    }

    /**
     * @param  Request           $request
     * @return array|object|null
     */
    public static function validate(Request $request): array|object|null
    {
        $query = $request->query() ?? null;
        if (isset($query) && !blank($query)) {
            $array = (object) $request->query();
            $error = (object) self::observer(array: $array, token: $request->fullUrlWithoutQuery('signature'));
            $solve = isset($error->resolve) && $error->resolve === false
                ? ['error' => true, 'token' => $error->message]
                : ['error' => false, 'token' => $array->userid];
            return (object) $solve;
        }
        return $query;
    }

    /**
     * Observe the match statement
     * @param  array|object  $array
     * @param  string        $token
     * @return array|false[]
     */
    private static function observer(array|object $array, string $token): array
    {
        $response = [];
        if (!isset($array->userid, $array->expires, $array->signature, $array->domain)) {
            $response = ['resolve' => false, 'message' => 'Missing required parameters.'];
        }
        if ($array->expires < now()->timestamp) {
            $response = ['resolve' => false, 'message' => 'This link has expired.'];
        }
        // if (!hash_equals(hash_hmac('sha256', $token, config('app.magic_link_secret')), $array->signature)) {
        //     $response = ['resolve' => false, 'message' => 'Invalid magic link signature.'];
        // }
        if (!in_array($array->domain, ['example.com', 'localhost:8000'])) {
            $response = ['resolve' => false, 'message' => 'Invalid domain.'];
        }
        return $response;
    }
}
