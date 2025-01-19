SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
create table `Customer` (
    `id` int(11) NOT NULL,
    `first_name`varchar(30) NOT NULL,
    `last_name`varchar(30) NOT NULL,
    `email`varchar(50) NOT NULL,
    `package`varchar(20) NOT NULL,
    `password`varchar(30) NOT NULL,
    `Joining_date`date NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    INSERT INTO `Customer`(`id`, `first_name`, `last_name`, `email`, `password`, `package`, `Joining_date`) VALUES (
        1,'Mohammed','Edo','moha@gmail.com','Moha123','Buisness Package','01/01/2024'
    );
    ALTER TABLE `Customer` ADD PRIMARY KEY (`id`);
    ALTER TABLE `Customer` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
    COMMIT;