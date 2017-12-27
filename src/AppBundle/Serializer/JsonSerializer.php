<?php
/**
 * Created by PhpStorm.
 * User: lele
 * Date: 27/12/17
 * Time: 17:23
 */

namespace AppBundle\Serializer;


use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class JsonSerializer extends Serializer
{

    public function __construct()
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        parent::__construct($normalizers, $encoders);

    }

}