<?php
namespace App\Service;

use App\Repository\FacebookFriendsRepository;
use SplQueue;

class GraphGenerator
{
    private $friendRepository;

    public function __construct(FacebookFriendsRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;

    }

    public function getFriendsIds(int $startId, int $endId) : array
    {
        $graph = $this->createGraph($startId, $endId);

        return $this->bfsWithPath($graph, $startId, $endId);
    }

    public function createGraph(int $firstId, int $endId) : array
    {
        $args[$firstId] = $firstId;
        $usedArgs[$firstId] = $firstId;
        $graph = [];
        $i = 0;
        while ($i < 4) {
            $friends = $this->friendRepository->findAllCouple($args);
            $args = [];
            foreach ($friends as $k => $v) {
                $graph[$v['user_id']][] = (int)$v['friend_id'];
                if ((int)$v['friend_id'] == $endId) {
                    $i = 4;
                    break;
                }

                if (!isset($usedArgs[$v['friend_id']])) {
                    $args[$v['friend_id']] = (int)$v['friend_id'];
                    $usedArgs[$v['friend_id']] = (int)$v['friend_id'];
                }
            }
            $i++;
        }

        return $graph;
    }

    public function bfsWithPath(array $graph, int $start, int $end): array
    {
        $queue = new SplQueue();
        $queue->enqueue([$start]);
        $visited = [$start];

        while ($queue->count() > 0) {
            $path = $queue->dequeue();
            $node = $path[sizeof($path) - 1];
            if ($node === $end) {
                return $path;
            }

            if (isset($graph[$node])) {
                foreach ($graph[$node] as $neighbour) {
                    if (!in_array($neighbour, $visited)) {
                        $visited[] = $neighbour;
                        $newPath = $path;
                        $newPath[] = $neighbour;
                        $queue->enqueue($newPath);
                    }
                }
            }
        }

        return [];
    }

    public function newSQL() {
        var_dump($this->friendRepository->testTeothy());
        die();
    }
}
