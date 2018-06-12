<?php

namespace Railken\LaraOre\InvoiceTax\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\InvoiceTax\Exceptions\InvoiceTaxAttributeException;

class InvoiceTaxCreatedAtNotAuthorizedException extends InvoiceTaxAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'INVOICETAX_CREATED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}