-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 08:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profilePicture` BLOB,
  `password` varchar(255) NOT NULL,
  `adminCode` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `review` (
  `rid` INT NOT NULL,
  `username` varchar(255) NOT NULL,
  `reviews` TEXT NOT NULL,
  `datePosted` DATE NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rating` FLOAT NOT NULL,
  `numLikes` INT NULL DEFAULT 0,
  `numSaves` INT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `likes` (
  `rid` INT NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `saves` (
  `rid` INT NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `watchlist` (
  `title` INT NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `movie`(
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `genre2` varchar(255),
  `director` varchar(255) NOT NULL,
  `actors`  TEXT NOT NULL,
  `awards` TEXT,
  `description` TEXT NOT NULL,
  `rdate` TEXT NOT NULL,
  `boxScore` FLOAT,
  `mid` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `username`, `email`, `profilePicture`, `password`, `adminCode`) VALUES
('Bob', 'Bobby', 'bobby1', 'bob@bobby.com', LOAD_FILE('/bob-profile.jpeg'), '0f359740bd1cda994f8b55330c86d845', 'wafs');
INSERT INTO `users` (`firstName`, `lastName`, `username`, `email`, `profilePicture`, `password`, `adminCode`) VALUES
('Rob', 'Robby', 'robby1', 'rob@robby.com', LOAD_FILE('/bob-profile.jpeg'), '0f359740bd1cda994f8b55330c86d845', 'wafwa');
INSERT INTO `users` (`firstName`, `lastName`, `username`, `email`, `profilePicture`, `password`, `adminCode`) VALUES
('Jack', 'Naf', 'jnaf1', 'jn123@kcaj.com', LOAD_FILE('/bob-profile.jpeg'), 'e10adc3949ba59abbe56e057f20f883e', 'NDUIWPFMWI');


INSERT INTO `movie` (`title`, `poster`,  `genre`, `genre2`, `director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES ('Godzilla Vs. Kong', 'godzillaKong.jpeg', 'Action', 'Sci-fi', 'Adam Wingard', 'Millie Bobby Brown, Alexander Skarsgård, Rebecca Hall Julian Dennison', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe. The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.',
'March 31, 2021', '132.7', '13');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('The Joker', 'joker.jpeg', 'Drama', 'Crime', 'Todd Phillips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz, Frances Conroy', 'Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks -- the one he paints for his day job as a clown, and the guise he projects in a futile attempt to feel like hes part of the world around him. Isolated, bullied and disregarded by society, Fleck begins a slow descent into madness as he transforms into the criminal mastermind known as the Joker.', 
'October 2, 2019', '1074', '1');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('Soul', 'soul.jpeg', 'Animation', 'Family', 'Pete Docter', 'Tine Fey, Rachel House, Jamie Foxx, Daveed Diggs', 'A jazz musician, stuck in a mediocre job, finally gets his big break. However, when a wrong step takes him to the Great Before, he tries to help an infant soul in order to return to reality.',
'December 25, 2020', '134.8', '9');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('Yes Day', 'yesDay.jpeg', 'Comedy', 'Drama', 'Miguel Arteta', 'Jenna Ortega, Jennifer Garner, Edgar Ramirez, Juilan Lerner', 'Always feeling like they have to say "no" to their kids, Allison and Carlos decide to give their three kids a "Yes Day," during which the kids have 24 hours to make the rules.',
'March 12, 2021', '30', '12');
INSERT INTO `movie` (`title`, `poster`,  `genre`,`director`,  `actors`,  `description`,  `rdate`, `mid`)
VALUES('To All the Boys: Always and Forever','allTheBoys.jpg', 'Romance', 'Michael Fimognari', 'Noah Centineo, Lana Condor, Anna Cathcart, Ross Butler', 'Senior year of high school takes center stage as Lara Jean returns from a family trip to Korea and considers her college plans -- with and without Peter.',
'February 12, 2021', '10');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `mid`)
VALUES('I Care a Lot', 'care.jpg', 'Thriller', 'Comedy', 'J Blakeson', 'Rosamund Pike, Eiza Gonzalez, Peter Dinklage, Dianne Wiest', 'A shady legal guardian lands in hot water when she tries to bilk a woman who has ties to a powerful gangster.',
'February 18, 2021', '11');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `mid`)
VALUES('Centigrade', 'centigrade.jpg', 'Drama', 'Thriller', 'Brendan Walsh', 'Genesis Rodriquez, Mavis Simpson, Vincent Piazza, Louis Cancelmi', 'A man and his pregnant wife become trapped in their car when a storm buries them underneath layers of snow and ice. As supplies dwindle and temperatures plunge, the couple must battle the elements and hypothermia in a desperate fight for survival.',
'August 28, 2020', '6');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('The Empty Man', 'empty.jpg', 'Horror', 'Thriller', 'David Prior', 'James Badge Dale, Marin Ireland, Stephen Root, Joel Courtney', 'On the trail of a missing girl, an ex-cop comes across a secretive group attempting to summon a terrifying supernatural entity.',
'October 22, 2020', '4.2', '8');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `mid`)
VALUES('Enola Holmes', 'enola.jpg', 'Mystery', 'Adventure', 'Harry Bradbeer', 'Millie Bobby Brown, Louis Partridge, Henry Cavill, Sam Claflin', 'While searching for her missing mother, intrepid teen Enola Holmes uses her sleuthing skills to outsmart big brother Sherlock and help a runaway lord.',
'September 23, 2020', '7');
INSERT INTO `movie` (`title`, `poster`,  `genre`,`director`,  `actors`,  `description`,  `rdate`, `mid`)
VALUES('Kiss the Ground', 'kissGround.jpg', 'Documentary', 'Rebecca Harrell Tickell, Josh Tickell', ' Ian Somerhalder, Woody Harrelson, Gisele Bundchen, Patricia Arquette', 'Activists, scientists, farmers and politicians turn to regenerative agriculture to save the planets topsoil.',
'April 01, 2020', '4');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('Mulan', 'mulan.jpg', 'Action', 'Adventure', 'Niki Caro', 'Liu Yifei, Jet Li, Donnie Yen, Gong Li', 'A girl disguises as a male warrior and joins the imperial army in order to prevent her sick father from being forced to enlist as he has no male heir.',
'March 25, 2020', '70','3');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('Palm Springs', 'palm.jpg', 'Comedy', 'Sci-fi', 'Max Barbakow', 'Andy Samberg, Cristin Milioti, Camila Mendes, Tyler Hoechiln', 'Stuck in a time loop, two wedding guests develop a budding romance while living the same day over and over again.',
'July 10, 2020', '.766','5');
INSERT INTO `movie` (`title`, `poster`,  `genre`,  `genre2`,`director`,  `actors`,  `awards`,  `description`,  `rdate`, `boxScore`, `mid`)
VALUES('Parasite', 'parasite.jpg', 'Thriller', 'Comedy', 'Bong Joon-ho', 'Cho Yeo-Jeong, Park So-dam, Woo-sik Choi, Jeong Ji-so', 'Academy Award for Best Picture', 'A struggling family sees an opportunity when their son starts working for a wealthy family. Eventually, all of them find a way to work within the same household and start living a parasitic life.',
'May 30, 2019','258.8','0');



INSERT INTO `review` (`rid`, `username`, `datePosted`, `title`,  `rating`,`blogTitle`, `reviews`)
VALUES ('1', 'bobby1', '2021-04-13', 'Godzilla Vs. Kong', '9', 'Best Movie Ever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.');
INSERT INTO `review` (`rid`, `username`, `datePosted`, `title`,  `rating`,`blogTitle`, `reviews`)
VALUES ('2', 'robby1', '2021-03-24', 'Godzilla Vs. Kong', '1', 'Worst Movie Ever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `movie`
  ADD PRIMARY KEY (`title`),
  ADD UNIQUE KEY `mid` (`mid`);


ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
