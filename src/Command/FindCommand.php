<?php
namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\GraphGenerator;

/**
 * @package Command
 */
class FindCommand extends Command
{

    private $graphGenerator;

    public function __construct(GraphGenerator $graphGenerator)
    {
        $this->graphGenerator = $graphGenerator;

        parent::__construct();
    }

    protected static $defaultName = 'app:find-friend';

    protected function configure()
    {
        $this->setName("app:find-friend")
            ->setDescription("getting a list of linking 2 user ids")
            ->addArgument(
                'firstId',
                InputArgument::REQUIRED,
                'first user id'
            )
            ->addArgument(
                'secondId',
                InputArgument::REQUIRED,
                'second user id'
            );
    }

    /**
     * Execute the command if it's called
     */
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $startNode = (int)$input->getArgument('firstId');
        $endNode   = (int)$input->getArgument('secondId');
        $result = $this->graphGenerator->getFriendsIds($startNode, $endNode);
        $output->writeln($result);
        return self::SUCCESS;
    }
}