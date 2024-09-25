<?php

namespace App\Utilities;

readonly class CreativeRoomTitle
{
    public static function generate(): string
    {
        $aData = trans(key: 'word.adjectives', locale: 'en');
        $nData = trans(key: 'word.nouns', locale: 'en');
        $aRand = $aData[array_rand($aData)];
        $nRand = $nData[array_rand($nData)];
        return sprintf('%s%s%s', $aRand, $nRand, now()->format(format: 'ymdhis'));
    }
}
