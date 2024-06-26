# Echoutilities

Echoutilities is a PHP utility package developed by Echovick that provides various helper functions to simplify common tasks in PHP applications.

## Installation

You can install Echoutilities via Composer. Run the following command in your terminal:

```bash
composer require echovick/helper-utilities
```

## Usage

Currently, Echoutilities includes the `ThrottleHelper` class, which allows you to throttle a function based on user ID and function name.

### ThrottleHelper

The `ThrottleHelper` class provides a way to limit the rate at which a function can be called by a user within a specified time period.

#### Example usage:

```php
use App\Helpers\ThrottleHelper;

// Define your function
$myFunction = function() {
    // Your function logic goes here
};

// Throttle the function
$result = ThrottleHelper::throttle($myFunction, 15, 'myFunction', $userId);

// Check the result
if (is_callable($result)) {
    // Function was executed successfully
} else {
    // Function was throttled, handle accordingly
    echo $result; // Example: "Please try again in 10 seconds."
}
```

### Documentation

For more detailed documentation on how to use Echoutilities, refer to the PHPDoc comments in the source code or visit the [GitHub repository](https://github.com/echovick/echoutilities).

## Contributing

Contributions to Echoutilities are welcome! If you have any suggestions, improvements, or new features to add, please open an issue or submit a pull request on the [GitHub repository](https://github.com/echovick/echoutilities).

## License

Echoutilities is open-source software licensed under the [MIT License](LICENSE).