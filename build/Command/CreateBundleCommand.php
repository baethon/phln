<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Illuminate\Console\Command;
use function phln\collection\filter;
use function phln\string\match;

class CreateBundleCommand extends Command
{
    protected $signature = 'create:bundle';

    private $filters = [];

    public function __construct()
    {
        parent::__construct();

        $this->filters = [
            'phln_all' => filter(match('#phln\\\w+\\\w+#u')),
            'phln_noncurried' => filter(match('#phln\\\w+\\𝑓\w+#u')),
        ];
    }

    public function handle()
    {
    }
}
