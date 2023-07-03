<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class ContactRequest {
    #[Type('string')]
    #[NotBlank()]
    protected $name;

    #[Type('string')]
    #[NotBlank()]
    protected $email;

    #[Type('string')]
    #[NotBlank()]
    protected $message;
}
