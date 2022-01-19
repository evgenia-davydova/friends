create if not exists TABLE 'facebook_friends' (
'id' int(11) unsigned NOT NULL AUTO_INCREMENT,
'user_id' bigint(20) DEFAULT NULL,
'friend_id' bigint(20) DEFAULT NULL,
'friend_name' varchar(255) DEFAULT NULL,
PRIMARY KEY ('id'),
KEY 'user_id' ('user_id'),
KEY 'friend_id' ('friend_id'),
KEY 'user_id_2' ('user_id','friend_id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `facebook_friends` (`id`, `user_id`, `friend_id`, `friend_name`) VALUES
(1, 1, 2, 'name2'),
(2, 2, 3, 'name3'),
(3, 1, 3, 'name3'),
(4, 1, 4, 'name4'),
(5, 4, 5, 'name5'),
(6, 4, 6, 'name6'),
(7, 5, 7, 'name7'),
(8, 5, 11, 'name11'),
(9, 5, 9, 'name9'),
(10, 7, 10, 'name10'),
(11, 7, 11, 'name11');


