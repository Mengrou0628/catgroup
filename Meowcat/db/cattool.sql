-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-01-18 16:59:24
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cattool`
--

-- --------------------------------------------------------

--
-- 表的结构 `flproject`
--

CREATE TABLE `flproject` (
  `file_id` int(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `flproject`
--

INSERT INTO `flproject` (`file_id`, `filename`, `project_id`, `user_id`) VALUES
(1, 'test', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `fltb`
--

CREATE TABLE `fltb` (
  `id` int(10) NOT NULL,
  `source` varchar(20) NOT NULL,
  `target` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `fltb`
--

INSERT INTO `fltb` (`id`, `source`, `target`, `user_id`, `project_id`) VALUES
(1, 'English', 'Chinese', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `fltm`
--

CREATE TABLE `fltm` (
  `ID` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `file_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `fltmproject`
--

CREATE TABLE `fltmproject` (
  `file_id` varchar(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `fltmtemp`
--

CREATE TABLE `fltmtemp` (
  `id` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `target` varchar(100) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `tm_anno` varchar(100) DEFAULT NULL,
  `tb_anno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `fltmtemp`
--

INSERT INTO `fltmtemp` (`id`, `source`, `target`, `user_id`, `file_id`, `tm_anno`, `tb_anno`) VALUES
(1, '吉林疫情防控发布会通报，结合流行病学调查和病毒全基因组测序分析，吉林省本次疫情传播链条清晰，为黑龙江省望奎县无症状感染者输入吉林省后引发本地传播', NULL, 1, 0, NULL, NULL),
(2, '目前报告的114例感染者中，有9例为黑龙江省输入，105例为本地续发感染，在续发感染者中有3例是吉林省外输入感染者的家庭成员，另外102例续发感染者为同一输入病例林某传播', NULL, 1, 0, NULL, NULL),
(3, '\r\n林某从事个体营销职业，为黑龙江籍，近期多次往返于黑吉两省，活动范围较广，接触人员多，1月6日至11日承载公主岭市、通化市开展4次针对中老年人的营销活动', NULL, 1, 0, NULL, NULL),
(4, '病例林某是吉林省发现望奎县输入疫情后，通过排查同城密接人员后及时得以发现', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `profl`
--

CREATE TABLE `profl` (
  `user_id` int(10) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `srclan` varchar(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `tarlan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `profl`
--

INSERT INTO `profl` (`user_id`, `projectname`, `srclan`, `project_id`, `tarlan`) VALUES
(1, 'test', 'english', 1, 'chinese'),
(2, 'test1', 'english', 2, 'chinese');

-- --------------------------------------------------------

--
-- 表的结构 `proofread`
--

CREATE TABLE `proofread` (
  `id` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `review` varchar(100) NOT NULL,
  `team_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `protm`
--

CREATE TABLE `protm` (
  `team_id` int(10) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `srclan` varchar(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `tarlan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `sequence2`
--

CREATE TABLE `sequence2` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `sequence3`
--

CREATE TABLE `sequence3` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `sequence3`
--

INSERT INTO `sequence3` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- 表的结构 `sequence4`
--

CREATE TABLE `sequence4` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teamfl`
--

CREATE TABLE `teamfl` (
  `user_id` int(10) NOT NULL,
  `team_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teampm`
--

CREATE TABLE `teampm` (
  `team_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teamproject`
--

CREATE TABLE `teamproject` (
  `file_id` int(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `project_id` int(10) NOT NULL,
  `team_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teamtb`
--

CREATE TABLE `teamtb` (
  `id` int(10) NOT NULL,
  `source` varchar(20) NOT NULL,
  `target` varchar(20) NOT NULL,
  `team_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teamtm`
--

CREATE TABLE `teamtm` (
  `ID` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `team_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `file_id` int(100) DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `teamtmtemp`
--

CREATE TABLE `teamtmtemp` (
  `id` int(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `target` varchar(100) DEFAULT NULL,
  `team_id` int(10) NOT NULL,
  `file_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `tm_anno` varchar(100) DEFAULT NULL,
  `tb_anno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `duty` varchar(10) NOT NULL,
  `field` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `duty`, `field`) VALUES
(1, 'Jane', '123', '123@qq.com', 'translator', 'economic'),
(2, 'Tom', '1234', '1234@qq.com', 'translator', 'economic');

--
-- 转储表的索引
--

--
-- 表的索引 `flproject`
--
ALTER TABLE `flproject`
  ADD PRIMARY KEY (`file_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- 表的索引 `fltb`
--
ALTER TABLE `fltb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_fltb` (`user_id`),
  ADD KEY `fk_project_fltb` (`project_id`);

--
-- 表的索引 `fltm`
--
ALTER TABLE `fltm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_fltm` (`user_id`),
  ADD KEY `fk_project_fltm` (`project_id`),
  ADD KEY `fk_file_fltm` (`file_id`);

--
-- 表的索引 `fltmproject`
--
ALTER TABLE `fltmproject`
  ADD PRIMARY KEY (`file_id`,`project_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `FL_pro_file` (`project_id`);

--
-- 表的索引 `fltmtemp`
--
ALTER TABLE `fltmtemp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_fltemp` (`user_id`);

--
-- 表的索引 `profl`
--
ALTER TABLE `profl`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 表的索引 `proofread`
--
ALTER TABLE `proofread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_p` (`team_id`),
  ADD KEY `fk_file_project` (`file_id`,`project_id`),
  ADD KEY `fk_id_p` (`user_id`);

--
-- 表的索引 `protm`
--
ALTER TABLE `protm`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `team_id` (`team_id`);

--
-- 表的索引 `sequence2`
--
ALTER TABLE `sequence2`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `sequence3`
--
ALTER TABLE `sequence3`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `sequence4`
--
ALTER TABLE `sequence4`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `teamfl`
--
ALTER TABLE `teamfl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_team` (`team_id`);

--
-- 表的索引 `teampm`
--
ALTER TABLE `teampm`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 表的索引 `teamproject`
--
ALTER TABLE `teamproject`
  ADD PRIMARY KEY (`file_id`,`project_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `tm_pro_file` (`project_id`);

--
-- 表的索引 `teamtb`
--
ALTER TABLE `teamtb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_tb` (`team_id`),
  ADD KEY `fk_id_tb` (`user_id`);

--
-- 表的索引 `teamtm`
--
ALTER TABLE `teamtm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_team_tm` (`team_id`),
  ADD KEY `fk_id_tm` (`user_id`),
  ADD KEY `fk_project_tm` (`project_id`),
  ADD KEY `fk_file_tm` (`file_id`);

--
-- 表的索引 `teamtmtemp`
--
ALTER TABLE `teamtmtemp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_temp` (`team_id`),
  ADD KEY `fk_id_temp` (`user_id`),
  ADD KEY `fk_file_temp` (`file_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `fltb`
--
ALTER TABLE `fltb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `fltm`
--
ALTER TABLE `fltm`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `fltmtemp`
--
ALTER TABLE `fltmtemp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `sequence2`
--
ALTER TABLE `sequence2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `sequence3`
--
ALTER TABLE `sequence3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `sequence4`
--
ALTER TABLE `sequence4`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `teamtb`
--
ALTER TABLE `teamtb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `teamtm`
--
ALTER TABLE `teamtm`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `teamtmtemp`
--
ALTER TABLE `teamtmtemp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 限制导出的表
--

--
-- 限制表 `flproject`
--
ALTER TABLE `flproject`
  ADD CONSTRAINT `flproject_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `profl` (`project_id`);

--
-- 限制表 `fltb`
--
ALTER TABLE `fltb`
  ADD CONSTRAINT `fk_id_fltb` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_project_fltb` FOREIGN KEY (`project_id`) REFERENCES `profl` (`project_id`);

--
-- 限制表 `fltm`
--
ALTER TABLE `fltm`
  ADD CONSTRAINT `fk_file_fltm` FOREIGN KEY (`file_id`) REFERENCES `flproject` (`file_id`),
  ADD CONSTRAINT `fk_id_fltm` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_project_fltm` FOREIGN KEY (`project_id`) REFERENCES `profl` (`project_id`);

--
-- 限制表 `fltmproject`
--
ALTER TABLE `fltmproject`
  ADD CONSTRAINT `fl_pro_file` FOREIGN KEY (`project_id`) REFERENCES `protm` (`project_id`),
  ADD CONSTRAINT `fltmproject_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 限制表 `fltmtemp`
--
ALTER TABLE `fltmtemp`
  ADD CONSTRAINT `fk_id_fltemp` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 限制表 `profl`
--
ALTER TABLE `profl`
  ADD CONSTRAINT `profl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 限制表 `proofread`
--
ALTER TABLE `proofread`
  ADD CONSTRAINT `fk_file_project` FOREIGN KEY (`file_id`,`project_id`) REFERENCES `teamproject` (`file_id`, `project_id`),
  ADD CONSTRAINT `fk_id_p` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_team_p` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);

--
-- 限制表 `protm`
--
ALTER TABLE `protm`
  ADD CONSTRAINT `protm_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);

--
-- 限制表 `teamfl`
--
ALTER TABLE `teamfl`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_team` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);

--
-- 限制表 `teampm`
--
ALTER TABLE `teampm`
  ADD CONSTRAINT `teampm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 限制表 `teamproject`
--
ALTER TABLE `teamproject`
  ADD CONSTRAINT `teamproject_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`),
  ADD CONSTRAINT `tm_pro_file` FOREIGN KEY (`project_id`) REFERENCES `protm` (`project_id`);

--
-- 限制表 `teamtb`
--
ALTER TABLE `teamtb`
  ADD CONSTRAINT `fk_id_tb` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_project_tb` FOREIGN KEY (`project_id`) REFERENCES `protm` (`project_id`),
  ADD CONSTRAINT `fk_team_tb` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);

--
-- 限制表 `teamtm`
--
ALTER TABLE `teamtm`
  ADD CONSTRAINT `fk_file_tm` FOREIGN KEY (`file_id`) REFERENCES `teamproject` (`file_id`),
  ADD CONSTRAINT `fk_id_tm` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_project_tm` FOREIGN KEY (`project_id`) REFERENCES `protm` (`project_id`),
  ADD CONSTRAINT `fk_team_tm` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);

--
-- 限制表 `teamtmtemp`
--
ALTER TABLE `teamtmtemp`
  ADD CONSTRAINT `fk_file_temp` FOREIGN KEY (`file_id`) REFERENCES `teamproject` (`file_id`),
  ADD CONSTRAINT `fk_id_temp` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_team_temp` FOREIGN KEY (`team_id`) REFERENCES `teampm` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
