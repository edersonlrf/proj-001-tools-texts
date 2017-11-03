SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `categorias` (`id`, `nome`) VALUES
(6, 'Games'),
(7, 'Livros'),
(8, 'Celulares');

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0',
  `isbn` varchar(255) DEFAULT NULL,
  `tipoProduto` varchar(255) DEFAULT NULL,
  `waterMark` varchar(255) DEFAULT NULL,
  `taxaImpressao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`, `isbn`, `tipoProduto`, `waterMark`, `taxaImpressao`) VALUES
(28, 'Livro de CodeIgniter 3', '39.00', 'Livro da casa do cÃ³digo', 7, 0, NULL, NULL, NULL, NULL),
(35, 'iPhone 4s', '999.00', 'Usado', 8, 1, NULL, NULL, NULL, NULL),
(39, 'teste', '1.00', '', 6, 0, NULL, NULL, NULL, NULL);

DROP TABLE IF EXISTS `textos`;
CREATE TABLE IF NOT EXISTS `textos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `ingles` text,
  `portugues` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `textos` (`id`, `numero`, `titulo`, `ingles`, `portugues`) VALUES
(1, 1, 'From Struggle Comes Success', 'From Struggle Comes Success  (Transcrição)\r\n\r\n1 – [Escrita do começo do vídeo] Five years ago, Josef Azam was loading luggage at an airport. Today, he is the CEO of a multi-million dollar marketing and design agency. To date, Josef has generated over 250 million dollars in sales for his clients.\r\n\r\n2 – [Começo da fala] Everybody sees me today in the position I’m in, a fast growing company. They don’t really understand the story and the struggle behind my success; where I’ve come from, and really what it takes to achieve success.\r\n\r\n3 – My story starts like many others around this world; it starts unfortunately growing up in poor situation. I grew up in a pretty wealthy area being poor, and I think there’s nothing worse in life than growing up poor in the face of people having everything.\r\n\r\n4 – It makes you really realize what you don’t have. When you grow up in an area where nobody has anything, you’re kind of all on a level playing field. But when you grow up in a wealthy area where everybody seems to have so much more than you, you know, you know that you don’t have as much as them. You know your parents don’t have as much money. I realize what I don’t have, I realize what I wanted, and I made sure from a very young age that I would succeed at every goal I’ve ever dreamt of.\r\n\r\n5 – Seeing my parents work and struggle inspired me to work. I didn’t have the money like everybody else did when they went to University where their parents paid for them, and they had the nice cars, I worked three jobs to put myself through University. I graduated, and till this day I’m so thankful that I had to go through those experiences because it’s those struggles, and those hardships that define me as a person.\r\n\r\n6 – You need to sacrifice almost everything to achieve your goal. So when people say “You’re lucky,” they don’t know what they’re talking about. And people that say that will never achieve their goal because luck has nothing to do with it because if I was that lucky I wouldn’t have fallen on my face so many times.\r\n\r\n7 – I wouldn’t have failed so many times. I wouldn’t have had so many sleepless nights. Perseverance is the key to success, and then when you succeed people are going to try to justify to you in a very simple way why you succeeded. I know what I’m capable of, I know what I’m going to do, and I know where I want to be, and nothing is going to stop me.\r\n\r\n8 – I look at myself, and I say “Well, what else do I want to achieve?” And the answer is still the same from when I was a kid, I want to achieve greatness. In many people’s eyes, I’ve achieved success, but in my eyes it’s not enough, I want to achieve greatness.\r\n\r\n9 – That is my story in life, it was my story in the past, and it’ll be my story in the future. The ability to never give up, and to always know where I want to go. I will not let anybody deter me from that goal, and I will never let anybody discourage me from achieving my goals.\r\n\r\n[Escrita no final do vídeo] Without ambition, one starts nothing. Without work, one finishes nothing. The prize will not be sent to you. You have to win it.', 'O sucesso vem da luta (Tradução em português)\r\n\r\n1 – [Escrita do começo do vídeo] 5 anos atrás, Josef Azam estava carregando bagagens em um aeroporto. Hoje, ele é o diretor executivo de uma agência multimilionária de marketing e design. Até agora, Josef gerou mais de 250 milhões em vendas para seus clientes.\r\n\r\n2 – [Começo da fala] Todos me veem hoje na posição em que estou, em uma empresa em crescimento acelerado. Eles realmente não entendem a história e a luta por trás do meu sucesso, de onde eu vim, e o que realmente é preciso para atingir o sucesso.\r\n\r\n3 – A minha história começa como muitas outras pelo mundo; ela começa infelizmente crescendo em situação de pobreza. Eu cresci em uma área muito rica sendo pobre, e eu acho que não existe nada pior na vida do que crescer pobre na presença de pessoas que tem tudo.\r\n\r\n4 – Isso te faz perceber o que você não tem. Quando você cresce em um lugar onde ninguém tem nada, vocês meio que estão todos no mesmo nível. Mas quando você cresce em um lugar rico onde todo mundo parece ter muito mais do que você, você sabe, você sabe que você não tem tanto quanto eles. Você sabe que seus pais não têm tanto dinheiro. Eu percebo o que eu não tenho, eu percebo o que eu queria, e eu me certifiquei ainda muito novo de que eu teria sucesso em todo objetivo que eu sempre sonhei.\r\n\r\n5 – Ver os meus pais trabalharem e lutarem me inspirou a trabalhar. Eu não tinha dinheiro como todo mundo tinha quando ia para a universidade que os seus pais pagavam para eles, e eles tinha os carros legais. Eu trabalhava em três empregos para me manter na universidade. Eu me formei, e até hoje sou muito grato porque tive que passar por todas aquelas experiências, porque são aquelas lutas e aquelas dificuldades que me definem como pessoa.\r\n\r\n6 – Você precisa sacrificar quase tudo para alcançar o seu objetivo. Então quando as pessoas dizem “Você é sortudo”, eles não sabem o que estão falando. Pessoas que dizem isso nunca atingirão seus objetivos porque sorte não tem nada a ver com isso, porque se eu  fosse tão sortudo eu não teria quebrado a cara tantas vezes.\r\n\r\n7 – Eu não teria fracassado tantas vezes. Eu não teria ficado tantas noites sem dormir. Perseverança é a chave para o sucesso, e então, quando você tiver sucesso, as pessoas tentarão justificar para você de uma maneira muito simples por que você obteve sucesso. Eu sei do que sou capaz, eu sei o que vou fazer, e eu sei onde eu quero estar e nada vai me parar.\r\n\r\n8 – Eu olho para mim mesmo e digo: “Bom, o que mais eu quero alcançar?” E a resposta ainda é a mesma de quando eu era criança, eu quero atingir a grandeza. Para os olhos de muitas pessoas, eu já alcancei o sucesso, mas aos meus olhos isso não é suficiente, eu quero atingir grandeza.\r\n\r\n9 – Essa é a minha história na vida, essa foi a minha história no passado, e será a minha história no futuro. A habilidade de nunca desistir, e sempre saber aonde quero ir. Eu não deixarei ninguém me desviar desse objetivo, e nunca deixarei ninguém me desencorajar de alcançar os meus objetivos.\r\n\r\n[Escrita no final do vídeo] Sem ambição, não se começa nada. Sem trabalho, não se termina nada. O prêmio não vai ser enviado a você. Você tem de conquistá-lo.');

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(2, 'teste@teste.com', '827ccb0eea8a706c4c34a16891f84e7b');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
