<?php
/**
 * Created by PhpStorm.
 * User: lele
 * Date: 27/12/17
 * Time: 17:23
 */

namespace AppBundle\Serializer;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class JsonSerializer extends Serializer
{

    public function __construct()
    {

        $encoders = array(new JsonEncoder());

        $normalizer = new GetSetMethodNormalizer();

        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        $normalizer->setCallbacks(array('createdAt' => $callback,
            'updatedAt' => $callback
            ));

        parent::__construct([$normalizer], $encoders);
    }

    private function dateFormat($dateTime)
    {
    }
}
