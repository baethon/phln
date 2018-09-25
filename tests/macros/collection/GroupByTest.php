<?php

use const phln\collection\groupBy;

class GroupByTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return groupBy;
    }

    /** @test  */
    public function it_groups_by_given_fn()
    {
        $list = [
            ['name' => 'Jon', 'score' => 64],
            ['name' => 'Array', 'score' => 91],
            ['name' => 'Sansa', 'score' => 80],
            ['name' => 'Tyrion', 'score' => 64],
            ['name' => 'Joffrey', 'score' => 0],
            ['name' => 'Ned', 'score' => 71],
        ];

        $expected = [
            'F' => [
                ['name' => 'Jon', 'score' => 64],
                ['name' => 'Tyrion', 'score' => 64],
                ['name' => 'Joffrey', 'score' => 0],
            ],
            'A' => [
                ['name' => 'Array', 'score' => 91],
            ],
            'B' => [
                ['name' => 'Sansa', 'score' => 80],
            ],
            'C' => [
                ['name' => 'Ned', 'score' => 71],
            ],
        ];

        $this->assertEquals($expected, $this->callFn($this->getScoreFn(), $list));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn($this->getScoreFn());

        $list = [
            ['name' => 'Jon', 'score' => 70],
        ];

        $expected = [
            'C' => [
                ['name' => 'Jon', 'score' => 70],
            ],
        ];

        $this->assertEquals($expected, $f($list));
    }

    private function getScoreFn()
    {
        $scoresTable = [
            [90, 'A'],
            [80, 'B'],
            [70, 'C'],
            [65, 'D'],
            [0, 'F'],
        ];

        return function ($student) use ($scoresTable) {
            $score = $student['score'];

            foreach ($scoresTable as $item) {
                list ($minScore, $grade) = $item;

                if ($score >= $minScore) {
                    return $grade;
                }
            }
        };
    }
}
