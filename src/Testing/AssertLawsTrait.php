<?php
declare(strict_types = 1);

namespace Baethon\Phln\Testing;

use Baethon\Phln\Structure\Setoid;
use Baethon\Phln\Structure\Apply;

trait AssertLawsTrait
{
    public function assertFunctor($u)
    {
        // u.map(a => a) is equivalent to u (identity)
        $this->assertEquals($u, $u->map(function ($value) {
            return $value;
        }));

        // u.map(x => f(g(x))) is equivalent to u.map(g).map(f) (composition)
        $f = function ($value) {
            return "{$value}_foo";
        };

        $g = function ($value) {
            return "{$value}_bar";
        };

        $this->assertEquals(
            $u->map(function ($value) use ($f, $g) {
                return $f($g($value));
            }),
            $u->map($g)->map($f)
        );

        $this->assertInstanceOf(get_class($u), $u->map($f));
    }

    public function assertApply(Apply $v)
    {
        // v.ap(u.ap(a.map(f => g => x => f(g(x))))) is equivalent to v.ap(u).ap(a) (composition)
        $className = get_class($v);

        $u = $className::of(function ($value) {
            return "{$value}_foo";
        });

        $a = $className::of(function ($value) {
            return "{$value}_bar";
        });

        $this->assertEquals(
            $v->ap($u->ap($a->map(function ($f) {
                return function ($g) use ($f) {
                    return function ($x) use ($f, $g) {
                        return $f($g($x));
                    };
                };
            }))),
            $v->ap($u)->ap($a)
        );

        $this->shouldCheckType(function () use ($v) {
            $v->ap(new class() implements Apply {
                public function ap(Apply $_)
                {
                }

                public function map(callable $_)
                {
                }
            });
        });

        $this->assertInstanceOf($className, $v->ap($a));
    }

    public function assertChain($m)
    {
        // m.chain(f).chain(g) is equivalent to m.chain(x => f(x).chain(g)) (associativity)
        $className = get_class($m);

        $f = function ($value) use ($className) {
            return $className::of("{$value}_foo");
        };

        $g = function ($value) use ($className) {
            return $className::of("{$value}_bar");
        };

        $this->assertEquals(
            $m->chain($f)->chain($g),
            $m->chain(function ($value) use ($f, $g) {
                return $f($value)->chain($g);
            })
        );

        $this->shouldCheckType(function () use ($m) {
            $m->chain(function () {
                return 'foo';
            });
        });
    }

    public function assertApplicative($v)
    {
        // v.ap(A.of(x => x)) is equivalent to v (identity)
        $className = get_class($v);
        $this->assertEquals(
            $v,
            $v->ap($className::of(function ($value) {
                return $value;
            }))
        );

        $f = function ($value) {
            return "{$value}_foo";
        };

        // A.of(x).ap(A.of(f)) is equivalent to A.of(f(x)) (homomorphism)
        $this->assertEquals(
            $className::of('test')->ap($className::of($f)),
            $className::of($f('test'))
        );

        // A.of(y).ap(u) is equivalent to u.ap(A.of(f => f(y))) (interchange)
        $this->assertEquals(
            $className::of('test')->ap($className::of($f)),
            $className::of($f)->ap($className::of(function ($fn) {
                return $fn('test');
            }))
        );

        $this->assertInstanceOf($className, $className::of('test'));
    }

    public function assertSetoid($v)
    {
        // a.equals(a) === true (reflexivity)
        $this->assertTrue($v->equals($v));

        // a.equals(b) === b.equals(a) (symmetry)
        $b = clone $v;
        $this->assertTrue($v->equals($b) === $b->equals($v));

        // if a.equals(b) and b.equals(c), then a.equals(c) (transitivity)
        $c = clone $v;
        $this->assertTrue($v->equals($b) && $b->equals($c) && $c->equals($v));

        // if b is not the same Setoid, behaviour of equals is unspecified (returning false is recommended).
        $this->assertFalse($v->equals(new class () implements Setoid {
            public function equals(Setoid $other): bool
            {
                return false;
            }
        }));
    }

    private function shouldCheckType(callable $fn)
    {
        $error = null;

        try {
            $fn();
        } catch (\Throwable $e) {
            $error = $e;
        }

        $this->assertNotNull($error);
        $this->assertStringStartsWith('assert()', $error->getMessage());
    }
}
