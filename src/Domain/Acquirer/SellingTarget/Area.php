<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

enum Area: string
{
    case Hokkaido = '北海道';
    case Tohok = '東北';
    case Kanto = '関東';
    case Chubu = '中部';
    case Tokai = '東海';
    case Kinki = '近畿';
    case Chugoku = '中国';
    case Shikoku = '四国';
    case Kyushu = '九州';
    case Okinawa = '沖縄';
    case Other = '海外';
}
