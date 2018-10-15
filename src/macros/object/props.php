<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('props', function (array $props, $object): array {
    assert_object($object);

    $getProp = P::partial(P::ref('prop'), [P::__, $object]);

    return P::reduce(
        function ($carry, $prop) use ($getProp) {
            return P::append($getProp($prop), $carry);
        },
        [],
        $props
    );
});
