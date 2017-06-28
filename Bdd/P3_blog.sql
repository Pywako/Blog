-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 28 juin 2017 à 13:19
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p3_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_chapitre`
--

CREATE TABLE `t_chapitre` (
  `chap_id` int(11) NOT NULL,
  `chap_numero` float NOT NULL,
  `chap_titre` varchar(100) NOT NULL,
  `chap_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chap_contenu` varchar(10000) NOT NULL,
  `chap_nbcom` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_chapitre`
--

INSERT INTO `t_chapitre` (`chap_id`, `chap_numero`, `chap_titre`, `chap_date`, `chap_contenu`, `chap_nbcom`) VALUES
(1, 1, 'Préface', '2017-05-29 10:22:13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.\r\n\r\nAenean non mi nec mi ornare fermentum et laoreet massa. Suspendisse ac orci dictum, consequat arcu eget, accumsan lacus. Cras blandit arcu in ipsum blandit tincidunt. Suspendisse porta vulputate mauris tincidunt vehicula. Mauris hendrerit, erat eu molestie tincidunt, urna orci accumsan urna, eget pretium tortor leo vitae orci. Sed accumsan eros rhoncus nisl consequat, eget tincidunt lorem auctor. Pellentesque cursus ultrices blandit. Quisque lacinia massa felis, vitae faucibus nibh bibendum vitae. Sed hendrerit semper est, at hendrerit neque pulvinar eu.\r\n\r\nSuspendisse eleifend nibh a ante sollicitudin, id gravida leo pulvinar. Sed vestibulum, tellus in blandit commodo, nibh arcu dignissim velit, quis fermentum arcu elit at nibh. Ut mollis imperdiet rhoncus. Sed gravida ut tortor quis scelerisque. Maecenas dignissim tellus non dictum luctus. Nam eget tortor ut neque mattis aliquet gravida et mi. Morbi sodales auctor arcu varius ultricies. Fusce varius sem magna. Quisque ultricies velit massa, nec sodales metus vulputate eu. Morbi eget mauris metus. Aliquam vel dui ut turpis pellentesque aliquam eget sed nibh.', 10),
(2, 2, 'Un début mouvementé ', '2017-05-29 10:23:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.', 9),
(3, 3, 'un drôle de compagnon', '2017-06-11 23:00:08', '<p>Duis commodo nulla ligula, at molestie sem vestibulum et. Pellentesque vitae neque arcu. Curabitur nec enim et sem malesuada commodo. Vivamus at elit mattis, imperdiet lacus facilisis, porta leo. Vestibulum eget ligula imperdiet massa tincidunt condimentum. Nunc nec orci lacus. Donec hendrerit lectus sem, ac vestibulum lectus convallis sed. Morbi id sem in odio maximus convallis. Nullam volutpat lacus non dui suscipit molestie. Nullam et feugiat nulla, sit amet elementum ante.</p>\r\n<p><strong>Cras bibendum lectus nec varius gravida. Duis a justo mollis, dignissim turpis eget, dapibus lorem. Ut vel ante sed turpis consectetur hendrerit vitae et orci. Donec tempor, augue ut blandit ultrices, diam risus facilisis erat, id feugiat diam massa quis ex. Integer eu sagittis justo. Sed purus dui, euismod sit amet purus et, lacinia interdum erat. Maecenas porta at augue vitae tempus. Pellentesque vestibulum facilisis augue in ullamcorper. Phasellus ac lacus fermentum, iaculis purus non, tristique mi.</strong></p>\r\n<p>Vestibulum turpis est, dignissim eget ullamcorper nec, venenatis vel quam. Donec id rhoncus elit. Nullam arcu lacus, molestie quis pulvinar at, lacinia id ipsum. Duis in ligula nec enim fermentum finibus. Nam pulvinar nec nisi sit amet dictum. Duis erat libero, viverra ut malesuada non, maximus sed ante. Duis non rutrum velit, vel feugiat nisi. Fusce molestie lorem massa, non laoreet mauris ullamcorper ultricies. Pellentesque finibus congue erat a eleifend. Pellentesque consequat convallis purus nec pellentesque. Donec consequat feugiat sodales. Donec id cursus tellus.</p>', 7),
(5, 4, 'La découverte', '2017-06-26 15:10:15', '<p>Cras metus lorem, commodo a ex non, mattis vulputate tellus. Vestibulum egestas consequat diam, ut laoreet mi hendrerit et. Praesent fermentum efficitur vehicula. Aliquam erat volutpat. Phasellus at orci eros. Sed auctor arcu laoreet luctus tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel justo nec dolor pulvinar feugiat. Suspendisse vel aliquet ligula, a scelerisque magna. Praesent sodales suscipit mi, placerat mollis mi finibus nec. Vivamus vehicula, purus ut posuere luctus, velit nisl fermentum neque, condimentum vestibulum massa eros eu leo. Phasellus ultrices enim sapien, venenatis blandit felis consectetur ut.</p>\r\n<p>Pellentesque nec purus a mauris tincidunt tincidunt ac aliquam augue. Mauris sodales non quam eu sodales. Pellentesque sodales justo sed lacus commodo porta. Fusce placerat, tellus quis egestas euismod, sapien nibh porta tortor, in vehicula tellus est et sem. Quisque ut mattis nulla. Pellentesque laoreet rhoncus odio non sagittis. Curabitur aliquam faucibus vehicula. Duis dui lectus, aliquet at elit et, porta pellentesque quam. Donec sit amet euismod erat. Donec iaculis sit amet nunc eget blandit. Vestibulum malesuada fermentum augue, et venenatis nisl ornare eu. In commodo lorem et sapien rutrum, eu tempor sem venenatis. Aenean malesuada sem et vehicula aliquam.</p>\r\n<p>Vivamus vestibulum eros lacus, vehicula pulvinar lectus faucibus nec. Nunc sed mauris sit amet felis hendrerit euismod. Vivamus vitae tincidunt justo, quis tempor turpis. Nam eu nunc erat. Vivamus a nulla lorem. Sed cursus, tortor volutpat elementum condimentum, dui neque vulputate eros, nec condimentum quam ex quis turpis. Donec in libero ligula. Duis aliquet sem neque, sit amet faucibus augue pellentesque eu. Donec non pellentesque elit. Nam iaculis quam ac cursus sollicitudin. Suspendisse nisl tortor, fermentum non lacinia ac, ornare eu ligula.</p>', 1),
(6, 5, 'Sans détour', '2017-06-26 15:10:19', '<p>Pellentesque nec purus a mauris tincidunt tincidunt ac aliquam augue. Mauris sodales non quam eu sodales. Pellentesque sodales justo sed lacus commodo porta. Fusce placerat, tellus quis egestas euismod, sapien nibh porta tortor, in vehicula tellus est et sem. Quisque ut mattis nulla. Pellentesque laoreet rhoncus odio non sagittis. Curabitur aliquam faucibus vehicula. Duis dui lectus, aliquet at elit et, porta pellentesque quam. Donec sit amet euismod erat. Donec iaculis sit amet nunc eget blandit. Vestibulum malesuada fermentum augue, et venenatis nisl ornare eu. In commodo lorem et sapien rutrum, eu tempor sem venenatis. Aenean malesuada sem et vehicula aliquam.</p>\r\n<p>Vivamus vestibulum eros lacus, vehicula pulvinar lectus faucibus nec. Nunc sed mauris sit amet felis hendrerit euismod. Vivamus vitae tincidunt justo, quis tempor turpis. Nam eu nunc erat. Vivamus a nulla lorem. Sed cursus, tortor volutpat elementum condimentum, dui neque vulputate eros, nec condimentum quam ex quis turpis. Donec in libero ligula. Duis aliquet sem neque, sit amet faucibus augue pellentesque eu. Donec non pellentesque elit. Nam iaculis quam ac cursus sollicitudin. Suspendisse nisl tortor, fermentum non lacinia ac, ornare eu ligula.</p>\r\n<p>Etiam vestibulum laoreet neque mollis laoreet. Integer sed dolor a augue elementum cursus vulputate viverra neque. Cras ac sapien vitae sapien ultrices ullamcorper nec varius leo. Duis pellentesque consequat ultricies. Vestibulum auctor eget mauris eu varius. In dignissim ac metus sed faucibus. Curabitur non ligula pellentesque, pretium dui at, pharetra libero. Suspendisse nec ante molestie, pretium diam vitae, commodo erat. Praesent hendrerit semper diam, scelerisque tincidunt ligula congue dignissim. Curabitur vel turpis neque. Integer non purus efficitur, aliquet ex quis, convallis elit. In id mi facilisis, rhoncus justo sed, finibus nisi.</p>', 1),
(7, 6, 'Une cabane', '2017-06-26 15:10:23', '<p>Nulla et nunc tellus. Praesent sed mauris eros. Nam nec viverra nisl. Integer aliquet urna neque, sed pellentesque eros consectetur ut. Donec porttitor leo vel lectus tincidunt cursus. Aenean tincidunt porttitor erat quis vehicula. Maecenas rhoncus id enim tristique consectetur. In eleifend justo in finibus mattis. Fusce lobortis eget sem et cursus. Fusce elementum mauris sed urna convallis, at ultrices metus porta.</p>\r\n<p>Etiam neque urna, convallis in hendrerit ut, cursus vitae lectus. Sed pellentesque, diam quis commodo ultricies, justo libero pulvinar sem, euismod suscipit orci erat ac tellus. Aenean ullamcorper ligula ac dignissim mattis. Pellentesque est libero, pretium sit amet rhoncus vel, pulvinar ac velit. Nunc vitae leo convallis erat auctor sagittis. Mauris sed porttitor eros. Nunc sit amet justo sit amet massa tincidunt vulputate. Duis eget congue leo. Praesent ac tortor et quam posuere semper.</p>\r\n<p>Etiam id mi non velit cursus lobortis id feugiat nunc. Proin a mauris facilisis, finibus justo ut, mollis ligula. Maecenas neque eros, sollicitudin iaculis porttitor sed, vehicula auctor leo. Fusce placerat arcu non vulputate tristique. Vestibulum sagittis nulla eget lacus imperdiet euismod. Aenean quis metus ac tellus feugiat egestas. Nullam velit nibh, scelerisque sed mollis ut, faucibus id sapien. Integer vehicula enim mauris, vitae tristique orci lacinia eu. Proin aliquet nunc a volutpat tincidunt. Vestibulum nec mauris quis massa iaculis gravida. Maecenas at volutpat urna. Nulla facilisi.</p>\r\n<p>Suspendisse vestibulum pharetra sapien id auctor. Integer blandit, augue vitae egestas tincidunt, dui eros tincidunt eros, sed volutpat ligula leo vitae ex. Nunc rhoncus viverra sagittis. Phasellus hendrerit fringilla risus. Quisque et accumsan lorem. Praesent viverra sem varius rutrum molestie. Cras finibus viverra convallis.</p>', 0),
(8, 7, 'Sauvage', '2017-06-26 15:10:28', '<p>Proin volutpat sagittis nunc pharetra scelerisque. Sed venenatis ante eu nulla cursus faucibus. Ut varius tincidunt laoreet. Mauris porta libero id erat aliquet pharetra. Donec consequat mollis ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras tempor augue sit amet sapien consectetur ultricies. Vivamus sed ex eget ante tincidunt pretium. Quisque vel mi arcu.</p>\r\n<p>Sed in venenatis ante. Nulla quis rutrum tellus, sit amet malesuada felis. Vestibulum a nulla in urna varius dapibus at id velit. Curabitur nisi enim, ultrices in gravida id, ultricies vitae augue. Etiam ultricies diam at elit ultrices posuere. Vivamus imperdiet faucibus velit, nec scelerisque ante dictum sed. Maecenas quis molestie eros.</p>\r\n<p>In bibendum varius risus sodales imperdiet. Sed eu ullamcorper purus, nec consectetur felis. Sed porta, dui vitae lobortis cursus, nisi mauris posuere augue, ut gravida ante leo sit amet nunc. Nulla vestibulum commodo metus, eu vulputate nunc ultrices non. Etiam iaculis ligula risus, non auctor felis tempus eget. Sed ullamcorper viverra leo a placerat. Suspendisse ipsum nisl, tincidunt in finibus ac, imperdiet dapibus dui. Curabitur eu tortor nisi. Sed fermentum at lacus a dignissim. Duis eu ligula ut mauris imperdiet laoreet et finibus odio. Nam ullamcorper justo in magna tempus, eu blandit nulla mattis. Nullam nec nulla sed velit varius feugiat. Integer sagittis elit sed massa ultricies, vulputate tristique lorem vehicula. Aliquam rutrum at lorem ut scelerisque. Donec vel feugiat ligula, id euismod magna.</p>', 0),
(9, 8, 'Les éléments s\'en mêlent', '2017-06-26 15:10:32', '<p>Etiam neque urna, convallis in hendrerit ut, cursus vitae lectus. Sed pellentesque, diam quis commodo ultricies, justo libero pulvinar sem, euismod suscipit orci erat ac tellus. Aenean ullamcorper ligula ac dignissim mattis. Pellentesque est libero, pretium sit amet rhoncus vel, pulvinar ac velit. Nunc vitae leo convallis erat auctor sagittis. Mauris sed porttitor eros. Nunc sit amet justo sit amet massa tincidunt vulputate. Duis eget congue leo. Praesent ac tortor et quam posuere semper.</p>\r\n<p>Etiam id mi non velit cursus lobortis id feugiat nunc. Proin a mauris facilisis, finibus justo ut, mollis ligula. Maecenas neque eros, sollicitudin iaculis porttitor sed, vehicula auctor leo. Fusce placerat arcu non vulputate tristique. Vestibulum sagittis nulla eget lacus imperdiet euismod. Aenean quis metus ac tellus feugiat egestas. Nullam velit nibh, scelerisque sed mollis ut, faucibus id sapien. Integer vehicula enim mauris, vitae tristique orci lacinia eu. Proin aliquet nunc a volutpat tincidunt. Vestibulum nec mauris quis massa iaculis gravida. Maecenas at volutpat urna. Nulla facilisi.</p>\r\n<p>Suspendisse vestibulum pharetra sapien id auctor. Integer blandit, augue vitae egestas tincidunt, dui eros tincidunt eros, sed volutpat ligula leo vitae ex. Nunc rhoncus viverra sagittis. Phasellus hendrerit fringilla risus. Quisque et accumsan lorem. Praesent viverra sem varius rutrum molestie. Cras finibus viverra convallis.</p>\r\n<p>Aenean at sodales lectus. Phasellus sed finibus magna, quis vestibulum dui. Curabitur pharetra hendrerit odio ut viverra. Aenean euismod fermentum elit eget accumsan. Duis sed ipsum non lorem laoreet scelerisque porttitor ut augue. Duis vel mi vitae mauris eleifend blandit. Etiam rhoncus nec ligula in faucibus. Nullam condimentum ac nibh venenatis elementum. Nulla sit amet dui non est vestibulum ultricies maximus sed ex.</p>\r\n<p>Integer eget ante et libero malesuada</p>', 0),
(10, 9, 'Pain, Pin, Pinte !', '2017-06-26 15:10:36', '<p>Sed in venenatis ante. Nulla quis rutrum tellus, sit amet malesuada felis. Vestibulum a nulla in urna varius dapibus at id velit. Curabitur nisi enim, ultrices in gravida id, ultricies vitae augue. Etiam ultricies diam at elit ultrices posuere. Vivamus imperdiet faucibus velit, nec scelerisque ante dictum sed. Maecenas quis molestie eros.</p>\r\n<p>In bibendum varius risus sodales imperdiet. Sed eu ullamcorper purus, nec consectetur felis. Sed porta, dui vitae lobortis cursus, nisi mauris posuere augue, ut gravida ante leo sit amet nunc. Nulla vestibulum commodo metus, eu vulputate nunc ultrices non. Etiam iaculis ligula risus, non auctor felis tempus eget. Sed ullamcorper viverra leo a placerat. Suspendisse ipsum nisl, tincidunt in finibus ac, imperdiet dapibus dui. Curabitur eu tortor nisi. Sed fermentum at lacus a dignissim. Duis eu ligula ut mauris imperdiet laoreet et finibus odio. Nam ullamcorper justo in magna tempus, eu blandit nulla mattis. Nullam nec nulla sed velit varius feugiat. Integer sagittis elit sed massa ultricies, vulputate tristique lorem vehicula. Aliquam rutrum at lorem ut scelerisque. Donec vel feugiat ligula, id euismod magna.</p>\r\n<p>Nulla et nunc tellus. Praesent sed mauris eros. Nam nec viverra nisl. Integer aliquet urna neque, sed pellentesque eros consectetur ut. Donec porttitor leo vel lectus tincidunt cursus. Aenean tincidunt porttitor erat quis vehicula. Maecenas rhoncus id enim tristique consectetur. In eleifend justo in finibus mattis. Fusce lobortis eget sem et cursus. Fusce elementum mauris sed urna convallis, at ultrices metus porta.</p>\r\n<p>Etiam neque urna, convallis in hendrerit ut, cursus vitae lectus. Sed pellentesque, diam quis commodo ultricies, justo libero pulvinar sem, euismod suscipit orci erat ac tellus. Aenean ullamcorper ligula ac dignissim mattis. Pellentesque est libero, pretium sit amet rhoncus vel, pulvinar ac velit. Nunc vitae leo convallis erat auctor sagittis. Mauris sed porttitor eros. Nunc sit amet justo sit amet massa tincidunt vulputate. Duis eget congue leo. Praesent ac tortor et quam posuere semper.</p>', 1),
(14, 10, 'La rosée', '2017-06-26 15:33:27', '<p>Suspendisse interdum, quam id luctus aliquam, tortor quam tincidunt justo, tempus ultrices felis urna a urna. Morbi faucibus lorem auctor euismod cursus. Cras tempus ultricies quam, vel vulputate nisl mattis a. Nunc vitae purus justo. Maecenas libero mi, sollicitudin nec mauris ut, varius lacinia turpis. Suspendisse eget turpis id lacus varius ornare. Nullam lorem urna, vulputate et euismod nec, semper ac justo. Proin dictum lacinia purus, sed tempor magna consectetur ac. Nullam convallis massa eu leo ultricies laoreet. Sed in nisi vitae turpis tincidunt volutpat vitae a diam. Ut fringilla pulvinar mauris ut pretium. Phasellus ac feugiat massa, sagittis euismod odio. Sed augue velit, viverra ac blandit ac, consectetur et tellus. Ut at varius eros.</p>\r\n<p>Proin sed iaculis odio. Curabitur condimentum nibh sagittis dui rutrum, id sollicitudin felis egestas. Phasellus placerat nulla massa, tincidunt gravida enim tempor quis. Nam et massa tempus, efficitur erat sed, fermentum tellus. Suspendisse facilisis arcu vel mi faucibus posuere. Nullam elementum arcu arcu, ac dapibus est pulvinar in. In tristique nunc a orci elementum, a commodo enim mollis. Phasellus velit ipsum, sodales nec luctus tincidunt, vulputate ut ex. Nam nunc urna, vulputate faucibus purus non, dictum euismod nulla. Donec dignissim, dolor luctus laoreet dictum, nibh mi porttitor ante, tristique semper arcu ante laoreet metus. Sed eu varius velit. Proin blandit, velit et condimentum pulvinar, ipsum lectus malesuada urna, quis feugiat urna augue eu elit. Ut vitae mattis lorem. Suspendisse arcu mi, laoreet et turpis non, mollis cursus lorem. Morbi lacinia semper consectetur.</p>\r\n<p>Vestibulum eu scelerisque tellus. Nunc fringilla feugiat sem ac sagittis. Sed pretium, tortor in aliquam iaculis, urna ex consectetur neque, eu semper est mauris vel sem. Sed ultricies diam et iaculis hendrerit. Aenean viverra metus vel augue posuere, ac sollicitudin neque tempor. Curabitur lobortis congue erat, id varius neque dictum at. Quisque ac cursus massa, a volutpat purus. Nam ultrices tortor ac ex ultricies, eget sagittis nunc fringilla.</p>', 0),
(17, 11, 'Et l\'été', '2017-06-26 15:36:28', '<p>In hac habitasse platea dictumst. Nunc id enim id orci iaculis elementum. Curabitur egestas, velit pellentesque ultrices luctus, tortor mauris facilisis est, nec tempus lacus ex vel ante. Donec varius arcu vel ipsum aliquam, vitae fermentum magna rhoncus. In consequat tellus ac fermentum interdum. Maecenas eu justo nisi. Duis pharetra et tortor eget rutrum. Vestibulum euismod, ipsum vitae fringilla condimentum, erat dui auctor lacus, non porta felis massa quis nisl. Integer ex dui, accumsan vitae odio eu, gravida tempor orci. Vestibulum et odio nisl.</p>\r\n<p>In vel turpis non massa ullamcorper aliquet. Sed sodales justo et eros semper, vel tincidunt dolor sagittis. Donec a justo bibendum, fringilla lacus et, tincidunt massa. Suspendisse potenti. Curabitur lobortis, sapien tristique ultrices dictum, nulla libero bibendum justo, a tristique massa ligula nec neque. In eget nisl a turpis aliquam bibendum. Curabitur tempor elementum viverra. Quisque mauris urna, luctus ac congue sit amet, eleifend sit amet mi. Aenean malesuada, dolor vel malesuada pulvinar, augue eros facilisis odio, molestie fermentum elit nunc eget tortor.</p>\r\n<p>Sed ac felis commodo, tristique magna nec, suscipit urna. Nulla ornare risus eget felis finibus, molestie aliquet ex elementum. Cras ut enim porttitor, dictum mauris ac, feugiat quam. Aliquam sed libero sed ex porta venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque ac dui est. Integer eget urna et lorem varius fermentum a nec mauris. In arcu sem, posuere nec justo in, tristique mollis ligula. Pellentesque tristique neque sed risus vestibulum, id consequat dolor ultrices. Aenean felis erat, venenatis at nisl vel, fermentum porttitor augue. Suspendisse cursus consectetur laoreet.</p>\r\n<p>Aliquam mollis purus in ipsum aliquam feugiat. Cras hendrerit non elit eget sodales. In et odio sed nibh maximus dapibus. Donec pretium ultrices nunc eget rhoncus. Nullam elit nisl, facilisis tincidunt posuere ac, feugiat pulvinar ligula. Integer nec ipsum id tellus sollicitudin pulvinar eget ac dui. Nulla a justo pulvinar, tempor eros ultrices, condimentum sem. Aliquam molestie, ligula et condimentum eleifend, enim ante efficitur metus, ac scelerisque urna massa nec metus. Morbi et dignissim purus. Aliquam rutrum viverra neque quis efficitur. Vivamus volutpat rutrum gravida. Phasellus bibendum, lacus sit amet lobortis hendrerit, metus leo pulvinar tortor, eu malesuada augue magna vitae orci.</p>\r\n<p>In aliquet risus nulla, a interdum nibh lobortis quis. Ut bibendum a orci volutpat mattis. Donec eget nisi velit. Ut rhoncus, elit et tincidunt aliquam, augue libero tristique massa, eu tincidunt augue diam ac nisi. Nam posuere nisi non arcu consectetur, non eleifend odio lacinia. Curabitur dignissim tincidunt convallis. Nullam rutrum vehicula nibh, eget aliquet tellus fermentum luctus. Phasellus euismod orci arcu. Aenean vel ex eget sem venenatis posuere. Duis vitae enim iaculis, ullamcorper tortor vitae, hendrerit orci. In hac habitasse platea dictumst.</p>', 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `com_id` int(11) NOT NULL,
  `com_auteur` varchar(100) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_contenu` varchar(200) NOT NULL,
  `com_signalement` int(11) NOT NULL,
  `chap_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`com_id`, `com_auteur`, `com_date`, `com_contenu`, `com_signalement`, `chap_id`, `parent_id`) VALUES
(1, 'cerise', '2017-06-28 13:09:26', 'Niveau 0', 0, 17, NULL),
(2, 'framboise', '2017-06-28 13:09:40', 'Niveau 1', 0, 17, 1),
(3, 'Cassis', '2017-06-28 13:09:52', 'Niveau 2', 0, 17, 2),
(4, 'myrtille', '2017-06-28 13:11:13', 'niveau 3', 0, 17, 3),
(5, 'pastèque', '2017-06-28 13:11:29', 'Niveau 0', 0, 17, NULL),
(6, 'groseille', '2017-06-28 13:12:08', 'Niveau 2', 0, 17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `util_id` int(11) NOT NULL,
  `util_login` varchar(100) NOT NULL,
  `util_mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`util_id`, `util_login`, `util_mdp`) VALUES
(1, 'jean', '$2y$10$ZwQKzqeSZO7o2CZ6UrC04erttH4wkKh6lnR0Mr/N5JzBxVn6/OsM6'),
(2, 'test', '$2y$10$XaxA.VCZkTvQr1PFXGaDT.BlGC.MSs0WWtWwyLQclWB0IB.nGJ0rq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  ADD PRIMARY KEY (`chap_id`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `PARENT_ID` (`parent_id`),
  ADD KEY `CHAP_ID` (`chap_id`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`util_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  MODIFY `chap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `util_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `t_commentaire_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `t_commentaire` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_commentaire_ibfk_2` FOREIGN KEY (`chap_id`) REFERENCES `t_chapitre` (`chap_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
