<?php


namespace IikoTransport\dto\Order\CreateDelivery;


use IikoTransport\dto\Order\OrderErrorDto;
use IikoTransport\RestDto;

class CreateDeliveryOrderInfoDto extends RestDto
{
    /**
     * Order ID
     * @var string
     */
    public $id;

    /**
     * Timestamp of most recent order change that took place on server
     * @var int
     */
    public $timestamp;

    /**
     * Enum: "Success" "InProgress" "Error" "TimeoutError" "TimeoutSuccess"
     * Order creation status. In case of asynchronous creation, it allows to track the instance an order was validated/created in iikoFront
     * @var string
     */
    public $creationStatus;

    /**
     * Order check creation error details.
     * @var OrderErrorDto|null
     */
    public $errorInfo;

    /**
     * Order creation details. Field is filled up if creationStatus=Success
     * @var CreateDeliveryOrderDto|null
     */
    protected $order;

    public function __construct()
    {
        if ($this->errorInfo) {
            $this->setPropertyToClassPropertyFromJson('errorInfo', new OrderErrorDto());
        }

        if ($this->order) {
            $this->order = new CreateDeliveryOrderDto($this->order);
        }
    }
}