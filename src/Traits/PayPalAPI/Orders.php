<?php

namespace Srmklive\PayPal\Traits\PayPalAPI;

trait Orders
{
    /**
     * Creates an order.
     *
     * @param array $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/orders/v2/#orders_create
     */
    public function createOrder(array $data)
    {
        $this->apiEndPoint = "v2/checkout/orders";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = (object) $data;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    public function updateOrder(string $order_id, array $data)
    {
        $this->apiEndPoint = "v2/checkout/orders/{$order_id}";
        $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

        $this->options['json'] = (object) $data;

        $this->verb = 'patch';

        return $this->doPayPalRequest();
    }
}