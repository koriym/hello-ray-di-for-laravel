<?php

namespace App\Console\Commands;

use App\Domain\Double\DoubleInterface;
use Illuminate\Console\Command;

/**
 * @\Ray\RayDiForLaravel\Attribute\Injectable
 */
class HelloCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello';

    /**
     * @param DoubleInterface $double
     */
    public function __construct(private readonly DoubleInterface $double) {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $doubled = $this->double->double(3);
        $this->line("Hello {$doubled} from a console command.");
        return 0;
    }
}
