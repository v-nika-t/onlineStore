-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июл 06 2020 г., 13:22
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(128) NOT NULL,
  `login` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_user`
--

INSERT INTO `admin_user` (`id`, `login`, `password`, `salt`) VALUES
(1, 'vt@admin.by', '4afc0f60422ee404756fd9e23f9b3d84', 'VKBdd!zypl');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_basket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_basket`, `id_user`, `id_good`, `count`) VALUES
(107, 1, 3, 1, 1),
(108, 1, 3, 6, 1),
(109, 0, 51, 1, 1),
(110, 0, 51, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `nameGoods` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prices` int(11) NOT NULL,
  `nameImage` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `nameGoods`, `shortDescription`, `fullDescription`, `prices`, `nameImage`) VALUES
(1, 'Товар1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem', 45, 'Машина1.jpg'),
(2, 'Товар2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem', 40, 'Машина2.jpg'),
(3, 'Товар3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem.', 75, 'Машина3.jpg'),
(4, 'Товар4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem.', 45, 'Машина4.jpeg'),
(5, 'Товар5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem', 54, 'Машина5.jpg'),
(6, 'Товар6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem', 34, 'Машина6.jpg'),
(7, 'Товар7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti obcaecati, eos. Quas saepe cupiditate aspernatur quisquam nam autem laudantium veritatis consequuntur, sapiente. Doloremque sit incidunt similique non, hic quas voluptatem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum id iste eum modi perferendis enim mollitia pariatur porro voluptates similique sit, fuga facere sequi tenetur eligendi ad laboriosam, accusantium eveniet. Quos accusantium alias dignissimos doloremque voluptatum, tempora fuga incidunt ratione architecto. Earum neque velit, ut animi a aliquid tempora provident, voluptatibus dolor! Ipsa delectus vero sequi placeat dolorum. Quae, corrupti. Blanditiis sed reiciendis iusto deleniti labore repellendus dolore animi quis consectetur deserunt doloremque consequatur aliquam recusandae maxime quam, dolores numquam nisi mollitia veniam earum facilis in aspernatur dicta. Quasi, dolor. Deserunt debitis voluptatem tempora rem placeat animi numquam sed impedit aspernatur reiciendis, aliquam ipsa perspiciatis perferendis adipisci voluptatum assumenda modi eius quidem sunt quaerat voluptatibus dolores illo? Cupiditate, aut, dolore. Expedita iusto dicta cumque mollitia totam, inventore ab magni quisquam recusandae dignissimos. Aliquam, hic, nobis! Provident dolor dolore perferendis maxime quaerat, consectetur ea quam eum minus architecto fuga. Quas, laboriosam. Fuga praesentium eaque ea veritatis rerum! Quod aut, facilis fugiat praesentium assumenda tempora atque esse nesciunt numquam aspernatur, sunt nihil impedit nemo doloribus incidunt quo alias sequi repellendus voluptate. Doloribus. Sunt quis ipsa eveniet voluptate, magni deserunt assumenda cumque pariatur laboriosam omnis repudiandae libero sapiente veniam minima! Autem in iusto voluptas minima! Unde mollitia amet excepturi iusto eveniet quaerat, distinctio. Deserunt facilis animi inventore voluptates dignissimos, pariatur maxime at, iusto exercitationem impedit quos non consequatur odit. Eligendi delectus iusto deleniti pariatur et, laboriosam fugit a, maiores corrupti. Quos provident, eius. Blanditiis velit assumenda hic, omnis voluptates doloremque numquam magni non dolorem dignissimos fuga cum, nisi quo at, sequi sint reprehenderit ex. Aspernatur quis, quam, fugiat iusto odit dicta eveniet quasi. Corporis nisi dolor alias voluptatum obcaecati similique odit, consequatur repellendus ipsum eum dolores non nemo dignissimos voluptate, molestias magnam, qui reprehenderit itaque suscipit at. Porro doloribus qui repudiandae! Laboriosam, reiciendis! Officiis perspiciatis quisquam accusantium nobis, beatae vero, iure error sit unde! Assumenda voluptate ratione saepe velit similique est, omnis animi aliquid dicta laboriosam nulla beatae labore numquam quod distinctio modi. Cum reprehenderit quam assumenda iusto, excepturi aut rem, aperiam magni enim pariatur, laudantium maxime, repellat vel! Repudiandae minima ducimus eaque ut nam ipsum commodi aspernatur, itaque. Incidunt at animi minus. Vel vero facilis ab consequuntur quia ipsam at aut ut reprehenderit sit id, sint animi eum quas voluptatum iusto obcaecati expedita, eveniet nemo quidem. Optio nemo perspiciatis ipsa veritatis ab. Possimus necessitatibus quibusdam velit est voluptate ullam eveniet porro omnis ipsum, rerum numquam, aperiam tenetur ipsam aspernatur distinctio accusantium debitis minus error ea totam eius impedit cupiditate repudiandae odio. Quidem.', 78, 'Машина7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_orders`, `id_user`, `id_good`, `count`, `id_order_status`) VALUES
(51, 1, 47, 2, 2, 2),
(52, 1, 47, 1, 3, 2),
(53, 1, 47, 3, 4, 2),
(54, 2, 49, 2, 3, 1),
(55, 2, 49, 2, 4, 1),
(56, 3, 50, 2, 2, 2),
(57, 3, 50, 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `order_status_name`) VALUES
(1, 'close'),
(2, 'open');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_adress` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_telephone` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_adress`, `user_login`, `user_telephone`, `user_password`, `salt`) VALUES
(3, 'unregistration', 'unregistration', 'unregistration', 'unregistration', 'unregistration', 'unregistration'),
(47, 'Иванов Иван Иванович', 'Д.Сердича д.36', '12345@tut.by', '+375291111112', '937f08c730124dc7adba778f01c724c8', 'TbV2iF'),
(48, 'Петров Петр', 'г. Минск ул. Жилуновича д.48', 'lkjk4334@tut.by', '+37529319961', '35ff5ed771996e9e1bf0a2a7de6459bd', 'Xi@sOu)Q\"'),
(49, 'Тишелович Елена', 'ул. Руссиянова д.5 к.1', 'fesudfgsu@mail.ru', '+375291213432', 'c7a21229815da3806b64d15c21544da7', ':~@ZD'),
(50, 'Тишелович Вероника', 'ул. Жилуновича д.48', 'vt1@tut.by', '375293199662', '361e95be85f3a02e067d3db6edeb5c4d', 'l3W$uAiz'),
(51, 'Шкатула Юля Ивановна', 'ул. Матусевича д.5', 'sgt@tut.by', '+37529319972', '69c0d9764f00d45f4480e42821b8c46c', 'tw%8L^');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_good` (`id_good`) USING BTREE,
  ADD KEY `key_user_basket` (`id_user`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_order_status` (`id_order_status`),
  ADD KEY `key_user` (`id_user`) USING BTREE,
  ADD KEY `key_orders_good` (`id_good`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `key_good` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `key_user_basket` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `key_order_status` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id_order_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `key_orders_good` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`),
  ADD CONSTRAINT `key_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
