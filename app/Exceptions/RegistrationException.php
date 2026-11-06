<?php

namespace App\Exceptions;

use RuntimeException;

// Thrown when a registration breaks a rule (duplicate, course full).
// The message is safe to show to the user.
class RegistrationException extends RuntimeException
{   
}
