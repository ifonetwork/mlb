CREATE TABLE `mlb` (
  `GameID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `AwayTeam` varchar(50) NOT NULL,
  `HomeTeam` varchar(50) NOT NULL,
  `StadiumID` int(11) NOT NULL,
   PRIMARY KEY (GameID)
) ;
