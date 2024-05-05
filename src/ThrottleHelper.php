<?php

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;

class ThrottleHelper
{
    /**
     * Throttle a function based on user ID and function name.
     *
     * @param Closure $function The function to be executed.
     * @param int $throttleTime The throttle time duration in seconds.
     * @param string $functionName The name of the function being throttled.
     * @param int $userId The ID of the user calling the function.
     * @return mixed The result of the executed function or a JSON response with a message indicating the throttle time.
     */public static function throttle(Closure $function, $throttleTime, $functionName, $userId)
    {
        // Constructing cache key based on function name and user ID
        $cacheKey = "{$functionName}_{$userId}";

        // Checking if the cache key exists
        if (Cache::has($cacheKey)) {
            // Retrieving the last called time from cache
            $lastCalledTime = Cache::get($cacheKey);

            // Calculating remaining seconds before the function can be called again
            $secondsRemaining = $throttleTime - (Carbon::now()->diffInSeconds($lastCalledTime));

            // Constructing a message indicating the remaining time
            $message = "Please try again in {$secondsRemaining} seconds.";
            return $message;
        }

        // If the cache key doesn't exist, storing the current time in cache
        Cache::put($cacheKey, Carbon::now(), $throttleTime);

        // Executing the provided function
        return $function();
    }
}
