# FindFriends
The small application for finding the shortest path between two participants through their friends

## Requirements
- PHP 7.3 or higher
- Composer installed

## Installation
1. Clone this repo
2. Run `$ composer update`
3. Need to register a connection to your database(DATABASE_URL) in .env 

## How to use
1. Open project root
2. Run `php bin/console app:find-friend <id1> <id2>`

   replace `<id1>` with a id of first user
     and   `<id2>` with a id of second user   

## Frameworks & Libraries
- [Symfony] https://symfony.com/
- [SplQueue] https://www.php.net/manual/en/class.splqueue.php
