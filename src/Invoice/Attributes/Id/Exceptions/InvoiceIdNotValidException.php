<?php

namespace Railken\LaraOre\Invoice\Attributes\Id\Exceptions;

use Railken\LaraOre\Invoice\Exceptions\InvoiceAttributeException;

class InvoiceIdNotValidException extends InvoiceAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'INVOICE_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}