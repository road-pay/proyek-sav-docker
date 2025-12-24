CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `mahasiswa` (`nama`, `nim`, `jurusan`) VALUES
('Contoh Mahasiswa', '12345678', 'Teknologi Informasi');