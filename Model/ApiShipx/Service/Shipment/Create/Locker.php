<?php

namespace Smartmage\Inpost\Model\ApiShipx\Service\Shipment\Create;

use Smartmage\Inpost\Model\ApiShipx\Service\Shipment\AbstractCreate;

class Locker extends AbstractCreate
{

    public function createBody($data, $order)
    {
        $this->requestBody = [
            "receiver" => [
                "email" => $data['email'],
                "phone" => $data['phone'],
            ],
            "parcels" => [
                "template" => $data['size'],
            ],
            "custom_attributes" => [
                "target_point" => $data['target_locker'],
            ],
        ];

        if (strpos($data['service'], 'eow') !== false) {
            $this->requestBody['end_of_week_collection'] = true;
        }

        parent::createBody($data, $order);
    }

    public function setSampleData()
    {
        $this->requestBody = [
            "receiver" => [
                "email" => "receiver@example.com",
                "phone" => "888000000",
            ],
            "parcels" => [
                "template" => "small",
            ],
            "insurance" => [
                "amount" => 25,
                "currency" => "PLN"
            ],
            "cod" => [
                "amount" => 12.50,
                "currency" => "PLN"
            ],
            "custom_attributes" => [
                "sending_method" => "parcel_locker",
                "target_point" => "KRA012",
                "dropoff_point" => "BBI02A"
            ],
            "service" => "inpost_locker_standard",
            "reference" => "Test",
            "comments" => "dowolny komentarz"
        ];

        return $this;
    }
}
