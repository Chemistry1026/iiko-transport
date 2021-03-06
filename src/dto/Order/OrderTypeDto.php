<?php


namespace IikoTransport\dto\Order;


use IikoTransport\RestDto;

class OrderTypeDto extends RestDto
{
    /**
     * ID
     * @var string
     */
    public $id;

    /**
     * Name
     * @var string
     */
    public $name;

    /**
     * Order type
     * @var string
     */
    public $orderServiceType;
}