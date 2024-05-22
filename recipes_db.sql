-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2024 a las 15:45:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recipes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` enum('italiana','vegana','mexicana','postre','asiática','mediterránea','americana') NOT NULL,
  `ingredients` text NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `difficulty_level` enum('bajo','medio','alto') NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `publish_date`, `category`, `ingredients`, `preparation_time`, `difficulty_level`, `instructions`, `image`) VALUES
(1, 'Espaguetis Carbonara', '2024-05-06 07:30:00', 'italiana', 'Espaguetis, huevos, panceta, queso parmesano, pimienta', 20, 'medio', 'Cocer los espaguetis. Batir los huevos con el queso. Freír la panceta. Mezclar todo junto.', 'carbonara.webp'),
(2, 'Tacos Veganos', '2024-05-05 08:15:00', 'vegana', 'Tortillas, frijoles, aguacate, tomate, lechuga, salsa picante', 15, 'bajo', 'Calentar las tortillas. Preparar los ingredientes. Montar los tacos.', 'tacos_veganos.webp'),
(3, 'Sushi', '2024-05-20 09:00:00', 'asiática', 'Arroz para sushi, alga nori, salmón, aguacate, pepino, vinagre de arroz', 40, 'alto', 'Cocer el arroz. Preparar el relleno. Enrollar el sushi.', 'sushi.webp'),
(4, 'Ensalada Mediterránea', '2024-05-03 10:00:00', 'mediterránea', 'Lechuga, tomate, pepino, aceitunas, queso feta, aceite de oliva', 10, 'bajo', 'Lavar y cortar los ingredientes. Mezclar en un bol. Añadir aceite y sal.', 'ensalada_mediterranea.webp'),
(5, 'Brownie de Chocolate', '2024-05-20 11:00:00', 'postre', 'Chocolate, mantequilla, azúcar, huevos, harina, nueces', 30, 'medio', 'Derretir el chocolate y la mantequilla. Mezclar con azúcar y huevos. Añadir harina y nueces. Hornear.', 'brownie.webp'),
(6, 'Paella', '2024-04-16 12:00:00', 'mediterránea', 'Arroz, azafrán, mariscos, pollo, verduras, caldo de pollo', 60, 'alto', 'Sofreír el pollo y las verduras. Añadir el arroz y el azafrán. Cocer con el caldo y los mariscos.', 'paella.webp'),
(7, 'Hamburguesa Clásica', '2024-04-11 13:00:00', 'americana', 'Carne molida, pan de hamburguesa, lechuga, tomate, queso, salsa', 20, 'bajo', 'Formar las hamburguesas. Cocer a la parrilla. Montar con los demás ingredientes.', 'hamburguesa.webp'),
(8, 'Galletas de Avena', '2024-03-05 15:00:00', 'postre', 'Avena, harina, azúcar, mantequilla, huevos, pasas', 25, 'medio', 'Mezclar los ingredientes secos. Añadir los ingredientes húmedos. Formar y hornear las galletas.', 'galletas_avena.webp'),
(9, 'Sopa de Miso', '2024-03-03 16:00:00', 'asiática', 'Caldo dashi, miso, tofu, algas, cebollino', 15, 'bajo', 'Calentar el caldo dashi en una olla a fuego medio. Agregar el tofu cortado en cubos y las algas al caldo caliente y dejar que se cocinen durante unos minutos. Disolver el miso en un poco de agua caliente y agregarlo a la olla, revolviendo para distribuirlo uniformemente. Cocinar la sopa a fuego lento durante unos minutos más, sin dejar que hierva. Servir caliente, espolvoreado con cebollino fresco picado.', 'sopa_miso.webp'),
(10, 'Pizza Margherita', '2024-04-29 16:00:00', 'italiana', 'Masa de pizza, tomate, mozzarella, albahaca, aceite de oliva', 20, 'medio', 'Extender la masa de pizza sobre una bandeja para hornear y cubrirla con una capa fina de salsa de tomate. Colocar rodajas de mozzarella fresca sobre la salsa de tomate y espolvorear con hojas de albahaca fresca. Rocíar un poco de aceite de oliva sobre la pizza y hornear en un horno precalentado a 220°C durante unos 15-20 minutos o hasta que la masa esté dorada y crujiente y el queso esté burbujeante. Cortar en porciones y servir caliente.', 'pizza_margherita.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_pec3`
--

CREATE TABLE `users_pec3` (
  `username` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_pec3`
--

INSERT INTO `users_pec3` (`username`, `nombre`, `apellidos`, `password`) VALUES
('johndoe', 'John', 'Doe', '$2y$10$SNxX57zhSKKxI2buGzkTv.OCpyftvs8SFXwLJiVSA0odGVjY0cU4m'),
('losorioortega3', 'Lolita', 'Osorio Ortega', '$2y$10$Z5fsAe.TynwnhN/Vdq86h.V4pR0cwEmDfzNsPV2DuJ.sN1mkEN65e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_pec3`
--
ALTER TABLE `users_pec3`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
